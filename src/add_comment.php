<?php
session_start();

// Check if the request is POST and user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['email'])) {
    require_once "dbconnection.php";

    // Get the post ID and comment text from the AJAX request
    $postId = $_POST['post_id'];
    $commentText = $_POST['comment_text'];


    // Insert the comment into the database
    $insertQuery = "INSERT INTO post_comments (post_id, commenter_name, comment_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iss", $postId, $_SESSION['name'], $commentText);

    // Check if the comment is successfully inserted
    if ($stmt->execute()) {
        // Comment added successfully
        echo json_encode(array('success' => true));
        header("Location: feed.html");
    } else {
        // Error occurred while adding comment
        echo json_encode(array('success' => false, 'message' => 'Error adding comment'));
    }
} else {
    // Invalid request or user not logged in
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
}

?>
