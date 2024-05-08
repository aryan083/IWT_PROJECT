<?php
require_once 'dbconnection.php'; // Include your database connection script

// Check if the post_id is provided in the request
if(isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Query to fetch the like count for the post
    $selectLikeCountQuery = "SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?";
    $stmtLikeCount = $conn->prepare($selectLikeCountQuery);
    $stmtLikeCount->bind_param("i", $post_id);
    $stmtLikeCount->execute();
    $resultLikeCount = $stmtLikeCount->get_result();

    if ($resultLikeCount->num_rows > 0) {
        $rowLikeCount = $resultLikeCount->fetch_assoc();
        $likeCount = $rowLikeCount['like_count'];
        
        // Return the like count as JSON response
        $response = array(
            'success' => true,
            'like_count' => $likeCount
        );
        echo json_encode($response);
    } else {
        // Unable to fetch like count
        $response = array(
            'success' => false,
            'error' => 'Unable to fetch like count'
        );
        echo json_encode($response);
    }
} else {
    // post_id is not provided
    $response = array(
        'success' => false,
        'error' => 'post_id is missing'
    );
    echo json_encode($response);
}
?>
