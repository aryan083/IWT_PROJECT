<?php
session_start();
require_once 'dbconnection.php'; // Include your database connection script

// Get post ID from the request
$postId = $_POST['post_id'];

// Check if the user has already liked the post
$query = "SELECT * FROM likes WHERE post_id = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $postId, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// If user has already liked the post, remove the like; otherwise, add a new like
if ($result->num_rows > 0) {
    // User has already liked the post, so remove the like
    $query = "DELETE FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $postId, $_SESSION['user_id']);
    $stmt->execute();
} else {
    // User has not liked the post, so add a new like
    $query = "INSERT INTO likes (post_id, user_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $postId, $_SESSION['user_id']);
    $stmt->execute();
}

// Fetch updated like count for the post from the database
$query = "SELECT COUNT(*) AS like_count FROM likes WHERE post_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $postId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$likeCount = $row['like_count'];

// Return updated like count as JSON
echo json_encode(array('like_count' => $likeCount));
?>
