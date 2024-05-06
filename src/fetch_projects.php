

<?php
// Include the database connection file
require_once 'dbconnection.php';

// Fetch project thumbnails and titles from the database
$query = "SELECT id, title, description FROM spms_projects";
$result = $conn->query($query);

// Display project thumbnails with titles
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4' style='margin:10px'> ";
        echo "<a style='text-decoration:none; color:black;' class = ' ' href='project_detail.php?project_id=" . $row['id'] . " '>"; // Link to project detail page with project ID
        
        //echo "<img src='" . $row['thumbnail'] . "' alt='" . $row['title'] . "' class='thumbnail'>";
        echo "<h2>" . $row['title'] . "</h2>";
        // echo "<p>" . $row['description'] . "</p>";
        echo "</a>";
        echo "</div>";
           

    }
} else {
    echo "No projects found.";
}

// Close database connection
$conn->close();
?>
