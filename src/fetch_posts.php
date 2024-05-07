<?php
session_start();
require_once 'dbconnection.php'; // Include your database connection script

// Define the number of posts to fetch per page
$postsPerPage = 10;

// Get the page number from the URL parameter
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset
$offset = ($page - 1) * $postsPerPage;

// Query to fetch posts from the database along with their media files, user information, and like count
$query = "
    SELECT sp.*, pm.file_name, pm.file_extension, pm.file_path, u.name AS user_name, u.profile_pic AS user_profile_pic, COUNT(pl.post_id) AS like_count
    FROM spms_posts sp
    LEFT JOIN post_media pm ON sp.id = pm.post_id
    LEFT JOIN {$_SESSION['table']} u ON sp.user_id = u.{$_SESSION['id_column']}
    LEFT JOIN post_likes pl ON sp.id = pl.post_id
    GROUP BY sp.id, pm.id
    ORDER BY sp.created_at DESC
    LIMIT ?, ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $offset, $postsPerPage);
$stmt->execute();
$result = $stmt->get_result();

// Array to store the fetched posts
$posts = array();

while ($row = $result->fetch_assoc()) {
    // Create a unique key for each post
    $postId = $row['id'];

    // Initialize the post array if it doesn't exist
    if (!isset($posts[$postId])) {
        $posts[$postId] = array(
            'id' => $postId,
            'caption' => $row['caption'],
            'created_at' => $row['created_at'],
            'user_id' => $row['user_id'],
            'user_name' => $row['user_name'],
            'user_profile_pic' => $row['user_profile_pic'],
            'media_files' => array(), // Initialize the media_files array
            'like_count' => $row['like_count']
        );
    }

    // Add each media file to the media_files array of the corresponding post
    if ($row['file_path']) {
        $posts[$postId]['media_files'][] = array(
            'file_name' => $row['file_name'],
            'file_extension' => $row['file_extension'],
            'file_path' => $row['file_path']
        );
    }
}

// Convert the array to JSON and output the result
echo json_encode(array_values($posts));