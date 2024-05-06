<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login-page.html");
    exit();
}

// Include database connection
require_once "dbconnection.php";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['id'];
    $caption = $_POST['caption'];

    // Insert the post into the database
    $insertPostQuery = "INSERT INTO spms_posts (user_id, caption) VALUES (?, ?)";
    $stmt = $conn->prepare($insertPostQuery);
    $stmt->bind_param("is", $userId, $caption);
    $stmt->execute();

    // Get the ID of the newly inserted post
    $postId = $conn->insert_id;

    // Process uploaded media files
    if (!empty($_FILES['media']['name'][0])) {
        $uploadDirectory = 'uploads/post_media/';

        // Create the upload directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        foreach ($_FILES['media']['tmp_name'] as $key => $tmp_name) {
            $mediaName = $_FILES['media']['name'][$key];
            $mediaPath = $uploadDirectory . $mediaName;

            // Move the uploaded media file to the upload directory
            move_uploaded_file($_FILES['media']['tmp_name'][$key], $mediaPath);

            // Insert media path into the post_media table
            $insertMediaQuery = "INSERT INTO post_media (post_id, media_path) VALUES (?, ?)";
            $stmt = $conn->prepare($insertMediaQuery);
            $stmt->bind_param("is", $postId, $mediaPath);
            $stmt->execute();
        }
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to the profile page after successful post creation
    header("Location: profile.php");
    exit();
}
