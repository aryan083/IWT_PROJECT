<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login-page.html");
    exit();
}

// Include the database connection file
require_once "dbconnection.php";

// Initialize variables
$email = "";
$username = "";
$profilePic = "";
$userRole = $_SESSION['role'];
$userId = $_SESSION['id'];
$id_column = $_SESSION['id_column'];
$table = $_SESSION['table'];

// Fetch user details
$selectQuery = "SELECT name, email, profile_pic FROM $table WHERE $id_column = ?";
$stmt = $conn->prepare($selectQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Fetch user details
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['name'];
    $email = $row['email'];
    $profilePic = $row['profile_pic'];
}

// Fetch user posts
$userPosts = array();
$selectPostsQuery = "SELECT * FROM spms_posts WHERE user_id = ?";
$stmtPosts = $conn->prepare($selectPostsQuery);
$stmtPosts->bind_param("i", $userId);
$stmtPosts->execute();
$resultPosts = $stmtPosts->get_result();

// Fetch user posts
if ($resultPosts->num_rows > 0) {
    while ($rowPost = $resultPosts->fetch_assoc()) {
        $userPosts[] = $rowPost;
    }
}

// Check if the form to upload a new profile picture is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_pic"])) {
    // Process the uploaded profile picture
    
    // Define the upload directory based on user role and ID
    $uploadDirectory = 'uploads/profilepic/' . $userRole . '/' . $userId . '/';
    
    // Create the upload directory if it doesn't exist
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }
    
    // Generate a unique filename for the uploaded image
    $fileName = uniqid() . '_' . basename($_FILES["profile_pic"]["name"]);
    $targetFilePath = $uploadDirectory . $fileName;
    
    // Move the uploaded file to the upload directory
    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFilePath)) {
        // File uploaded successfully, update the user table with the file path
        
        // Retrieve user details from the database
        $email = $_SESSION['email'];
        
        // Query to update profile picture path
        $updateQuery = "UPDATE $table SET profile_pic = ? WHERE email = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ss", $targetFilePath, $email);
        $stmt->execute();
        
        // Check if profile picture is updated successfully
        if ($stmt->affected_rows > 0) {
            // Fetch updated profile picture path and username from the database
            $selectQuery = "SELECT name, profile_pic FROM $table WHERE email = ?";
            $stmt = $conn->prepare($selectQuery);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Fetch profile picture path and username
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['name'];
                $profilePic = $row['profile_pic'];
            }
        } else {
            echo "Failed to update profile picture.";
        }
    } else {
        // File upload failed, handle the error
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Add your CSS styles for profile picture, form, etc. */
    </style>
</head>
<body>

<!-- Profile Picture Section -->
<div class="profile-pic-section">
    <?php if (!empty($profilePic)) : ?>
        <!-- Display uploaded profile picture -->
        <img src="<?php echo $profilePic; ?>" alt="Profile Picture">
    <?php else : ?>
        <!-- Display default profile picture or a placeholder image -->
        <img src="default-profile-pic.jpg" alt="Default Profile Picture">
    <?php endif; ?>
    <!-- Option to upload a new profile picture -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_pic" accept="image/*">
        <button type="submit">Upload Profile Picture</button>
    </form>
</div>

<!-- User Details Section -->
<div class="user-details-section">
    <h1><?php echo $username; ?></h1>
    <p>Email: <?php echo $email; ?></p>
    <p>ID: <?php echo $_SESSION['id']; ?></p>
    <!-- Add more user details here -->
</div>

<!-- User Posts Section -->
<div class="user-posts-section">
    <h2>User Posts</h2>
    <?php if (!empty($userPosts)) : ?>
        <ul>
            <?php foreach ($userPosts as $post) : ?>
                <li>
                    <p><?php echo $post['caption']; ?></p>
                    <?php 
                        // Fetch media files associated with the post
                        $postId = $post['id'];
                        $selectMediaQuery = "SELECT file_path FROM post_media WHERE post_id = ?";
                        $stmtMedia = $conn->prepare($selectMediaQuery);
                        $stmtMedia->bind_param("i", $postId);
                        $stmtMedia->execute();
                        $resultMedia = $stmtMedia->get_result();

                        // Display media files
                        if ($resultMedia->num_rows > 0) {
                            while ($rowMedia = $resultMedia->fetch_assoc()) {
                                $mediaPath = $rowMedia['file_path'];
                                // Check media type and display accordingly
                                $mediaType = pathinfo($mediaPath, PATHINFO_EXTENSION);
                                if (in_array($mediaType, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    // Display image
                                    echo '<img src="' . $mediaPath . '" alt="Image">';
                                } else if (in_array($mediaType, ['mp4', 'mov', 'avi', 'wmv','mkv'])) {
                                    // Display video
                                    echo '<video controls><source src="' . $mediaPath . '" type="video/mp4"></video>';
                                } else {
                                    // Display other types of media files (e.g., documents)
                                    echo '<a href="' . $mediaPath . '" target="_blank">View Media</a>';
                                }
                            }
                        }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<!-- Add your HTML structure and styles for other user details -->

</body>
</html>
