<?php
// Include the database connection file
require_once 'dbconnection.php';

// Parameters for pagination
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$perPage = 10; // Number of projects per page

// Calculate the offset for the SQL query
$offset = ($page - 1) * $perPage;

// Fetch projects from the database with pagination
$query = "SELECT * FROM spms_projects LIMIT ?, ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $offset, $perPage);
$stmt->execute();
$result = $stmt->get_result();

// Display projects with all details
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output project details in HTML format
        echo "<div class='project-container'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p><b>Description:</b> " . $row['description'] . "</p>";
        echo "<p><b>Start Date:</b> " . $row['start_date'] . "</p>";
        echo "<p><b>End Date:</b> " . $row['end_date'] . "</p>";
        echo "<p><b>Status:</b> " . $row['status'] . "</p>";
        
        // Fetch contributors for the project
        $query = "SELECT name, role FROM projects_collaborators WHERE project_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $row['id']);
        $stmt->execute();
        $contributors = $stmt->get_result();
        
        if ($contributors->num_rows > 0) {
            echo "<p><b>Contributors:</b><br>";
            while ($contributor = $contributors->fetch_assoc()) {
                echo $contributor['name'] . " - " . $contributor['role'] . "<br>";
            }
            echo "</p>";
        }

        // Fetch faculty for the project
        $query = "SELECT name FROM projects_faculty WHERE project_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $row['id']);
        $stmt->execute();
        $faculty = $stmt->get_result();
        
        if ($faculty->num_rows > 0) {
            echo "<p><b>Faculty:</b><br>";
            while ($facultyMember = $faculty->fetch_assoc()) {
                echo $facultyMember['name'] . "<br>";
            }
            echo "</p>";
        }

        // Display photos, videos, and documents here
        echo "<p><b>Media Files:</b><br>";
        echo "<div class='media-container'>";

        // Fetch and display photos
        $photos = glob("uploads/project/" . $row['id'] . "/images/*.*");
        foreach ($photos as $photo) {
            echo "<img src='" . $photo . "' alt='Photo'>";
        }

        // Fetch and display videos
        $videos = glob("uploads/project/" . $row['id'] . "/videos/*.*");
        foreach ($videos as $video) {
            echo "<div>";
            echo "<video controls>";
            echo "<source src='" . $video . "'>";
            echo "Your browser does not support the video tag.";
            echo "</video>";
            echo "</div>";
        }
       

        // Fetch and display documents
        $documents = glob("uploads/project/" . $row['id'] . "/documents/*.*");
        foreach ($documents as $document) {
            echo "<a href='" . $document . "' target='_blank'>" . basename($document) . "</a><br>";
        }
        

        echo "</div>";
        echo "</p>";

        echo "</div>";
    }
} else {
    echo "No more projects found.";
}

// Close database connection
$conn->close();
?>
