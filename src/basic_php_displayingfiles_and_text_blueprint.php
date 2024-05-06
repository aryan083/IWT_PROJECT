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
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID is not provided.";
    }
    ?>