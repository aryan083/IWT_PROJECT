<?php
// Connect to the database
require_once 'dbconnection.php';

// Fetch comments for a specific post
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];

    // Query to fetch comments for the post
    $query = "SELECT * FROM post_comments WHERE post_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if comments exist
    if ($result->num_rows > 0) {
        // Fetch comments as an associative array
        $comments = $result->fetch_all(MYSQLI_ASSOC);
        
        // Return comments data as JSON
        echo json_encode($comments);
    } else {
        echo json_encode(array('message' => 'No comments found'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request'));
}
?>
