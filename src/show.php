<?php
// Include the database connection file
require_once 'dbconnection.php';

// Query to fetch project data along with media files
$query = "SELECT p.*, m.file_name, m.file_extension FROM spms_projects p 
          LEFT JOIN projects_media_files m ON p.id = m.project_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display project details
        echo "<div class='project'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>Description: " . $row['description'] . "</p>";
        echo "<p>Start Date: " . $row['start_date'] . "</p>";
        echo "<p>End Date: " . $row['end_date'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
        
        // Display media files
        if ($row['file_name'] && $row['file_extension']) {
            // Display images
            if (in_array($row['file_extension'], ['jpg', 'jpeg', 'png'])) {
                echo "<img src='uploads/" . $row['id'] . "/images/" . $row['file_name'] . "' alt='Project Image'>";
            }
            // Display videos
            elseif ($row['file_extension'] === 'mp4') {
                echo "<video controls>";
                echo "<source src='uploads/" . $row['id'] . "/videos/" . $row['file_name'] . "' type='video/mkv'>";
                echo "Your browser does not support the video tag.";
                echo "</video>";
            }
            // Provide download link for other file types
            else {
                echo "<a href='uploads/" . $row['id'] . "/documents/" . $row['file_name'] . "' download>" . $row['file_name'] . "</a>";
            }
        }
        
        echo "</div>";
    }
} else {
    echo "No projects found.";
}

// Close database connection
$conn->close();
