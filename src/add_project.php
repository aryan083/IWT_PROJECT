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
          // Check if a thumbnail file is uploaded
          if ($_FILES['Thumbnail']['error'] === UPLOAD_ERR_OK) {
            // Handle thumbnail file upload
            $thumbnailName = $_FILES['Thumbnail']['name'];
            $thumbnailTmpName = $_FILES['Thumbnail']['tmp_name'];
            $thumbnailExtension = strtolower(pathinfo($thumbnailName, PATHINFO_EXTENSION));
        
            // Directory to save the thumbnail inside the project folder
            $thumbnailDirectory = 'uploads/project/' . $projectId . '/thumbnails/';
        
            // Create thumbnails directory if it doesn't exist
            if (!file_exists($thumbnailDirectory)) {
                mkdir($thumbnailDirectory, 0777, true);
            }
        
            // Generate a unique name for the thumbnail file
            $thumbnailFileName = uniqid('thumbnail_') . '.' . $thumbnailExtension;
        
            // Move uploaded thumbnail file to the destination directory
            $thumbnailDestination = $thumbnailDirectory . $thumbnailFileName;
            move_uploaded_file($thumbnailTmpName, $thumbnailDestination);
        } else {
            // If no thumbnail is uploaded, set default values
            $thumbnailFileName = ''; // Set to an empty string or any default thumbnail
            $thumbnailExtension = ''; // Set to an empty string or any default thumbnail extension
            $thumbnailDestination = ''; // Set to an empty string or any default thumbnail path
        }
        
        // Insert thumbnail data into spms_projects table
        $insertThumbnailQuery = "UPDATE spms_projects SET thumbnail_name = ?, thumbnail_extension = ?, thumbnail_path = ? WHERE id = ?";
        $stmt = $conn->prepare($insertThumbnailQuery);
        $stmt->bind_param("sssi", $thumbnailFileName, $thumbnailExtension, $thumbnailDestination, $projectId);
        $stmt->execute();
    }
  
    // Close database connection
    $conn->close();

    // Redirect to a success page or do something else
    echo "Project added successfully!";
    header("Location: project_library.php");
    exit();
}
