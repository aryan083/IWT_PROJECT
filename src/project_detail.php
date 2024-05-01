<?php
// Include the database connection file
require_once 'dbconnection.php';

// Function to retrieve media files from a directory
function getMediaFiles($projectId, $mediaType)
{
    // Define media directory based on media type
    $mediaDirectory = 'uploads/' . $projectId . '/' . $mediaType . '/';
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
            echo '<iframe src="' . $mediaFile . '" frameborder="0" allowfullscreen class="media-item"></iframe>';
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
            flex-wrap: wrap;
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
    </style>
</head>
<body>
    <h1>Project Details</h1>
    <?php
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
            echo '<div class="project-details">';
            echo '<h2>' . $project['title'] . '</h2>';
            echo '<p>Description: ' . $project['description'] . '</p>';
            echo '<p>Start Date: ' . $project['start_date'] . '</p>';
            echo '<p>End Date: ' . $project['end_date'] . '</p>';
            echo '<p>Status: ' . $project['status'] . '</p>';
            echo '<h3>Images</h3>';
            echo '<div class="media-container">';
            displayMedia($projectId, 'images');
            echo '</div>';
            echo '<h3>Videos</h3>';
            echo '<div class="media-container">';
            displayMedia($projectId, 'videos');
            echo '</div>';
            echo '<h3>Documents</h3>';
            echo '<div class="media-container">';
            displayMedia($projectId, 'documents');
            echo '</div>';
            echo '</div>';
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?>
</body>
</html>