<?php
// Connect to the database
require_once 'dbconnection.php';

// Initialize response array
$response = array();

// Fetch comments for a specific post
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];

    $selectCommentsQuery = "SELECT * FROM post_comments WHERE post_id = ?";
    $stmtComments = $conn->prepare($selectCommentsQuery);
    $stmtComments->bind_param("i", $postId);
    $stmtComments->execute();
    $resultComments = $stmtComments->get_result();
    
    // Display comments
    if ($resultComments->num_rows > 0) {
        while ($rowComment = $resultComments->fetch_assoc()) {
            
            // Add each comment to the response array
            $comment = array(
                'commenter_name' => $rowComment['commenter_name'],
                'comment_text' => $rowComment['comment_text']
            );
            
            array_push($response, $comment);
        

        }
    } else {
        echo '<p>No comments yet.</p>';
    }


}

// Return the response as JSON
echo json_encode($response);
?>
