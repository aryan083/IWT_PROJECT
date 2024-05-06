<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login-page.html");
    exit();
}

// Check if the form to upload a new profile picture is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_pic"])) {
    // Process the uploaded profile picture
    $userId = $_SESSION['id'];
    $userRole = $_SESSION['role'];
    
    // Define the upload directory based on user role and ID
    $uploadDirectory = 'upload/profilepic/' . $userRole . '/' . $userId . '/';
    
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
        require_once "dbconnection.php";
        $email = $_SESSION['email'];
        
        // Update the database with the profile picture path
        $updateQuery = "UPDATE spms_user SET profile_pic = ? WHERE email = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ss", $targetFilePath, $email);
        $stmt->execute();
        
        // Close statement and database connection
        $stmt->close();
        $conn->close();
        
        // Redirect to the profile page after successful upload
        header("Location: profile.php");
        exit();
    } else {
        // File upload failed, handle the error
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
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
        <!-- Display existing profile picture -->
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
    <h1><?php echo $name; ?></h1>
    <p>Email: <?php echo $email; ?></p>
    <!-- Add more user details here -->
</div>

<!-- Add your HTML structure and styles for other user details -->

</body>
</html>
