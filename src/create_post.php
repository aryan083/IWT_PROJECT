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
    // Get user ID from session
    $userId = $_SESSION['id'];
    $caption = $_POST['caption'];

    // Insert the post into the database
    $insertPostQuery = "INSERT INTO spms_posts (user_id, caption) VALUES (?, ?)";
    $stmt = $conn->prepare($insertPostQuery);
    $stmt->bind_param("is", $userId, $caption);
    $stmt->execute();

    // Check if post was successfully inserted
    if ($stmt->affected_rows > 0) {
        // Get the ID of the newly inserted post
        $postId = $conn->insert_id;

        // Handle media files insertion
        // Example code for handling media files upload
        if (!empty($_FILES['media']['name'][0])) {
            $fileCount = count($_FILES['media']['name']);

            // Loop through each file
            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = $_FILES['media']['name'][$i];
                $fileTmpName = $_FILES['media']['tmp_name'][$i];
                $fileType = $_FILES['media']['type'][$i];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $uploadDirectory = 'uploads/post_media/';

                // Generate a unique filename to avoid conflicts
                $uniqueFileName = uniqid() . '_' . $fileName;
                $destination = $uploadDirectory . $uniqueFileName;

                // Move uploaded file to the destination directory
                move_uploaded_file($fileTmpName, $destination);

                // Insert file data into post_media table
                $insertMediaQuery = "INSERT INTO post_media (post_id, file_name, file_extension, file_path) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($insertMediaQuery);
                $stmt->bind_param("isss", $postId, $fileName, $fileExtension, $destination);
                $stmt->execute();
            }
        }

        // Redirect to the profile page after successful post creation
        header("Location: profile.php");
        exit();
    } else {
        // Handle error if post insertion failed
        echo "Error: Failed to create post.";
    }
} else {
    // Redirect if form submission method is not POST
    header("Location: login-page.html");
    exit();
}
?>
