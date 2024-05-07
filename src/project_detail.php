<?php
// Include the database connection file
require_once 'dbconnection.php';

// Function to retrieve media files from a directory
function getMediaFiles($projectId, $mediaType)
{
    // Define media directory based on media type
    $mediaDirectory = 'uploads/' .'project/'. $projectId . '/' . $mediaType . '/';
    // Check if the directory exists
    if (!file_exists($mediaDirectory)) {
        return array(); // Return an empty array if directory doesn't exist
    }

    // Get a list of media files in the directory
    $mediaFiles = glob($mediaDirectory . '*.*');

    // Check if any media files are found
    if (!$mediaFiles) {
        return array(); // Return an empty array if no media files are found
    }

    return $mediaFiles;
}

// Function to display media files
function displayMedia($projectId, $mediaType)
{
    // Get media files
    $mediaFiles = getMediaFiles($projectId, $mediaType);

    // Check if media files are found
    if (empty($mediaFiles)) {
        echo "No $mediaType found for this project.";
        return; // Return if no media files are found
    }

    // Display each media file
    foreach ($mediaFiles as $mediaFile) {
        // Display images using <img> tag
        if ($mediaType == 'images') {
            echo '<img src="' . $mediaFile . '" alt="Image" class="media-item">';
        }
        // Display videos using <iframe> tag
        elseif ($mediaType == 'videos') {
            // Check if the file extension is supported
            $allowedExtensions = array('mp4', 'webm', 'ogg','mkv','mp3'); // Add more formats if needed
            $fileExtension = pathinfo($mediaFile, PATHINFO_EXTENSION);
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                echo '<video controls class="media-item">';
                echo '<source src="' . $mediaFile . '" type="video/' . strtolower($fileExtension) . '">';
                echo 'Your browser does not support the video tag.';
                echo '</video>';
            } else {
                echo 'Unsupported video format: ' . $fileExtension;
            }
        }
        // Display PDF or text documents using <a> tag
        elseif ($mediaType == 'documents') {
            echo '<a href="' . $mediaFile . '" target="_blank" class="media-item">' . basename($mediaFile) . '</a>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <style>
        /* Style for media container */
        .media-container {
            display: flex;
            flex-wrap: wrap;s
            justify-content: center;
            gap: 20px;
        }
        /* Style for media items */
        .media-item {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        body{
    background-color: #6da9e9;;
        }

        </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- <link rel="stylesheet" href="front-end/individual-project-files/individual-project-style.css"> -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #6da9e9;">

    <div class="container d -flex justify-content-center align-items-center min-vh-100">


   
    <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">

            <div class="form-control form-control-lg bg-white "style="text-align: center; border: none; margin:10px">
                <h1><b style="font-weight: 650;">                <?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();
            echo  $project['title'];

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></b></h1>

            </div>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline;">Description</b></h2>
            <h5>    <?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();
            echo  $project['description'];
  
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">
        <h2><b style="font-weight: 550;text-decoration: underline;">Contributors</b></h2>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Fetch contributors for the project from the database
            $query = "SELECT * FROM projects_collaborators WHERE project_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $projectId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No contributors found for this project.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">
        <h2><b style="font-weight: 550;text-decoration: underline;">Faculty</b></h2>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
            // Fetch faculty for the project from the database
            $query = "SELECT * FROM projects_faculty WHERE project_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $projectId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No faculty found for this project.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Start Date</b></h2>
            <h5 style="display: inline;">    <?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();

            echo  $project['start_date'];

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline; display: inline;">End Date</b></h2>
            <h5 style="display: inline;">   <?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();

            echo  $project['end_date'];

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Status</b></h2>
            <h5 style="display: inline;">   <?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();

            echo  $project['status'];

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Photos</b></h2>
            <h5 style="display: inline;">   <?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();

            // echo  $project['start_date'];

            echo '<div class="media-container rounded-3 mt-3">';
            displayMedia($projectId, 'images');
            echo '</div>';

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Videos</b></h2>
            <h5 style="display: inline;"><?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();

            // echo  $project['start_date'];

            echo '<div class="media-container rounded-3 mt-3 ">';
            displayMedia($projectId, 'videos');
            echo '</div>';

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>
            <div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">
            <h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Documents</b></h2>
            <h5 style="display: inline;"><?php
    // Check if the project ID is provided in the URL
   
    if (isset($_GET['project_id'])) {
        $projectId = $_GET['project_id'];

        // Fetch project details from the database
        $query = "SELECT * FROM spms_projects WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the project exists
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();

            // echo  $project['start_date'];

            echo '<div class="media-container rounded-3 mt-3 ">';
            displayMedia($projectId, 'documents');
            echo '</div>';

        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?></h5>
            </div>








    </div>



</body>
</html>
