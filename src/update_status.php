<?php
// Include the database connection file
require_once 'dbconnection.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required parameters are provided
    if (isset($_POST['project_id']) && isset($_POST['action']) && isset($_POST['remarks'])) {
        // Sanitize the inputs
        $projectId = mysqli_real_escape_string($conn, $_POST['project_id']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

        // Update the status of the project in the database
        $query = "UPDATE spms_projects SET status = '$action', remarks = '$remarks' WHERE id = '$projectId'";
        if ($conn->query($query) === TRUE) {
            // If update is successful, return success message
            echo "Status updated successfully";
        } else {
            // If there's an error, return error message
            echo "Error updating status: " . $conn->error;
        }
    } else {
        // If any required parameter is missing, return error message
        echo "Missing parameters";
    }
} else {
    // If request method is not POST, return error message
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>
