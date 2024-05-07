<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['email'])) {
    require_once "dbconnection.php";

    // Get the post ID and comment text from the AJAX request
    $postId = $_POST['post_id'];
    $commentText = $_POST['comment_text'];

    // Insert the comment into the database
    $insertQuery = "INSERT INTO post_comments (post_id, commenter_name, comment_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iss", $postId, $_SESSION['name'], $commentText);
    $stmt->execute();
}

