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
    <title>Project Library</title>
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
        /* Style for project details */
        .project-details {
            margin-bottom: 20px;
        }
        /* Style for contributors and mentors */
        .contributors-mentors {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Project Library</h1>
    <?php
    // Fetch all projects from the database
    $query = "SELECT * FROM spms_projects";
    $result = $conn->query($query);

    // Check if there are any projects
    if ($result->num_rows > 0) {
        // Output project details and media files
        while ($row = $result->fetch_assoc()) {
            echo '<div class="project-details">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>Description: ' . $row['description'] . '</p>';
            echo '<p>Start Date: ' . $row['start_date'] . '</p>';
            echo '<p>End Date: ' . $row['end_date'] . '</p>';
            echo '<p>Status: ' . $row['status'] . '</p>';
            echo '<h3>Images</h3>';
            echo '<div class="media-container">';
            displayMedia($row['id'], 'images');
            echo '</div>';
            echo '<h3>Videos</h3>';
            echo '<div class="media-container">';
            displayMedia($row['id'], 'videos');
            echo '</div>';
            echo '<h3>Documents</h3>';
            echo '<div class="media-container">';
            displayMedia($row['id'], 'documents');
            echo '</div>';
            echo '<div class="contributors-mentors">';
            // Fetch contributors for this project
            $contributorsQuery = "SELECT name, role FROM projects_collaborators WHERE project_id = " . $row['id'];
            $contributorsResult = $conn->query($contributorsQuery);
            if ($contributorsResult->num_rows > 0) {
                echo '<h3>Contributors</h3>';
                echo '<ul>';
                while ($contributor = $contributorsResult->fetch_assoc()) {
                    echo '<li>' . $contributor['name'] . ' - ' . $contributor['role'] . '</li>';
                }
                echo '</ul>';
            }
            // Fetch mentors for this project
            $mentorsQuery = "SELECT name FROM projects_faculty WHERE project_id = " . $row['id'];
            $mentorsResult = $conn->query($mentorsQuery);
            if ($mentorsResult->num_rows > 0) {
                echo '<h3>Mentors</h3>';
                echo '<ul>';
                while ($mentor = $mentorsResult->fetch_assoc()) {
                    echo '<li>' . $mentor['name'] . '</li>';
                }
                echo '</ul>';
            }
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No projects found.";
    }
    ?>
</body>
</html>