

<?php
// Include the database connection file
require_once 'dbconnection.php';

// Fetch project thumbnails and titles from the database
$query = "SELECT id, title,thumbnail_path, description FROM spms_projects";
$result = $conn->query($query);

// Display project thumbnails with titles
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class=' border rounded-3 p-3 bg-white  box-area mb-44 mt-4' style='margin:10px'> ";
        echo "<a style='text-decoration:none; color:black;' class = 'imageimage' href='project_detail.php?project_id=" . $row['id'] . " '>"; // Link to project detail page with project ID
        
        echo "<img  src='" . $row['thumbnail_path'] . "' alt='" . $row['title'] . "' class='thumbnail rounded-3 w-100'>";
        echo "</a>";
        echo "<div class='thumbnail-title mt-3'>" . $row['title'] . "</div>";
        // echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
           

    }
} else {
    echo "No projects found.";
}

// Close database connection
$conn->close();
?>
