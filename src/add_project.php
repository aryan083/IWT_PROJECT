<?php
// Include the database connection file
require_once 'dbconnection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['ProjectTitle'];
    $description = $_POST['ProjectDescription'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $status = $_POST['Status'];
    $instructions = $_POST['Instructions'];
    $outcomes = $_POST['Outcomes'];
    $recognitions = $_POST['Recognitions'];

    // Insert project data into spms_projects table
    $insertProjectQuery = "INSERT INTO spms_projects (title, description, start_date, end_date, status, instructions, outcomes, recognitions) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertProjectQuery);
    $stmt->bind_param("ssssssss", $title, $description, $startDate, $endDate, $status, $instructions, $outcomes, $recognitions);
    $stmt->execute();
    $projectId = $stmt->insert_id; // Get the ID of the inserted project

    // Insert collaborators into projects_collaborators table
    if (isset($_POST['CollaboratorName']) && isset($_POST['CollaboratorRole'])) {
        $collaboratorNames = $_POST['CollaboratorName'];
        $collaboratorRoles = $_POST['CollaboratorRole'];

        $insertCollaboratorQuery = "INSERT INTO projects_collaborators (project_id, name, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertCollaboratorQuery);
        $stmt->bind_param("iss", $projectId, $collaboratorName, $collaboratorRole);

        // Insert each collaborator
        for ($i = 0; $i < count($collaboratorNames); $i++) {
            $collaboratorName = $collaboratorNames[$i];
            $collaboratorRole = $collaboratorRoles[$i];
            $stmt->execute();
        }
    }

    // Insert faculty into projects_faculty table
    if (isset($_POST['MentorName'])) {
        $mentorNames = $_POST['MentorName'];

        $insertMentorQuery = "INSERT INTO projects_faculty (project_id, name) VALUES (?, ?)";
        $stmt = $conn->prepare($insertMentorQuery);
        $stmt->bind_param("is", $projectId, $mentorName);

        // Insert each mentor
        foreach ($mentorNames as $mentorName) {
            $stmt->execute();
        }
    }

    // Insert external links into projects_external_links table
    if (isset($_POST['Links'])) {
        $externalLinks = $_POST['Links'];

        $insertLinkQuery = "INSERT INTO projects_external_links (project_id, link) VALUES (?, ?)";
        $stmt = $conn->prepare($insertLinkQuery);
        $stmt->bind_param("is", $projectId, $link);

        // Insert each external link
        foreach ($externalLinks as $link) {
            $stmt->execute();
        }
    }

    // echo "<pre>";
    // print_r($_FILES['MediaFiles']);
    // echo "</pre>";
    //   // Handle media files insertion
    //   if ($_FILES['MediaFiles']['error'][0] !== UPLOAD_ERR_OK) {
    //     // Handle the error
    //     echo "File upload failed with error code: "."<br>";
    //     var_dump($_FILES['MediaFiles']['error'])."<br>";;
    //     // You can check the error codes defined in PHP documentation for more specific handling
    // } else 
    {
        $fileCount = count($_FILES['MediaFiles']['name']);
    
        // Create project directory if it doesn't exist
        $projectDirectory = 'uploads/' .'project/'. $projectId . '/';
        if (!file_exists($projectDirectory)) {
            mkdir($projectDirectory, 0777, true);
        }
        // Loop through each file
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['MediaFiles']['name'][$i];
            $fileTmpName = $_FILES['MediaFiles']['tmp_name'][$i];
            $fileType = $_FILES['MediaFiles']['type'][$i];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $mediaFolder = ''; // Initialize media folder variable
    
            // Determine the media folder based on file type
            switch ($fileExtension) {
                case 'mp4':
                case 'mp3':
                case 'mkv':
                    $mediaFolder = 'videos';
                    break;
                case 'jpg':
                case 'jpeg':
                case 'png':
                    $mediaFolder = 'images';
                    break;
                default:
                    $mediaFolder = 'documents';
                    break;
            }
    
            // Create subdirectory based on media folder if it doesn't exist
            $mediaDirectory = $projectDirectory . $mediaFolder . '/';
            if (!file_exists($mediaDirectory)) {
                mkdir($mediaDirectory, 0777, true);
            }
    
            // Move uploaded file to the destination directory
            $destination = $mediaDirectory . $fileName;
            move_uploaded_file($fileTmpName, $destination);
    
            // Insert file data into projects_media_files table
            $insertMediaQuery = "INSERT INTO projects_media_files (project_id, file_name, file_extension, source_directory) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertMediaQuery);
            $stmt->bind_param("isss", $projectId, $fileName, $fileExtension, $destination);
            $stmt->execute();
        }
    }
    // Close prepared statement
    $stmt->close();

    // Close database connection
    $conn->close();

    // Redirect to a success page or do something else
    echo "Project added successfully!";
    //header("Location: success.php");
    exit();
}
