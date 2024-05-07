<?php
session_start();
require_once 'dbconnection.php'; // Include your database connection script

// Check if the user is logged in and the required data is sent via POST
if(isset($_POST['post_id']) && isset($_SESSION['id']) && isset($_SESSION['role'])) {
    // Assign POST data to variables
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['id'];
    $user_role = $_SESSION['role'];
    
    // Check if the user has already liked the post
    $query = "SELECT * FROM post_likes WHERE post_id = ? AND user_id = ? AND user_role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $post_id, $user_id, $user_role);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        // User already liked the post, so remove the like
        $delete_query = "DELETE FROM post_likes WHERE post_id = ? AND user_id = ? AND user_role = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param("iis", $post_id, $user_id, $user_role);
        
        if($delete_stmt->execute()) {
            // Unlike successful
            // Return the updated like count for the post
            $selectLikeCountQuery = "SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?";
            $stmtLikeCount = $conn->prepare($selectLikeCountQuery);
            $stmtLikeCount->bind_param("i", $post_id);
            $stmtLikeCount->execute();
            $resultLikeCount = $stmtLikeCount->get_result();

            if ($resultLikeCount->num_rows > 0) {
                $rowLikeCount = $resultLikeCount->fetch_assoc();
                $likeCount = $rowLikeCount['like_count'];
                
                // Return the updated like count for the post
                echo json_encode(array('like_count' => $likeCount));
            } else {
                echo "Error: Unable to retrieve like count";
            }
        } else {
            echo "Error: Unable to unlike the post";
        }
    } else {
        // User has not liked the post, so add the like
        $insert_query = "INSERT INTO post_likes (post_id, user_id, user_role) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("iis", $post_id, $user_id, $user_role);
        
        if($insert_stmt->execute()) {
            // Like successful
            // Return the updated like count for the post
            $selectLikeCountQuery = "SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?";
            $stmtLikeCount = $conn->prepare($selectLikeCountQuery);
            $stmtLikeCount->bind_param("i", $post_id);
            $stmtLikeCount->execute();
            $resultLikeCount = $stmtLikeCount->get_result();

            if ($resultLikeCount->num_rows > 0) {
                $rowLikeCount = $resultLikeCount->fetch_assoc();
                $likeCount = $rowLikeCount['like_count'];
                
                // Return the updated like count for the post
                echo json_encode(array('like_count' => $likeCount));
            } else {
                echo "Error: Unable to retrieve like count";
            }
        } else {
            echo "Error: Unable to like the post";
        }
    }
} else {
    // Required data not provided
    echo "Error: Required data missing";
}
?>
