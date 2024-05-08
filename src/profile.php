<!-- PHP code in profile.php -->
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
$selectPostsQuery = "SELECT spms_posts.*, COUNT(post_likes.post_id) AS like_count 
                     FROM spms_posts 
                     LEFT JOIN post_likes ON spms_posts.id = post_likes.post_id 
                     WHERE spms_posts.user_id = ?
                     GROUP BY spms_posts.id";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="front-end/navbar-styles.css">
<body style='background-color: #6da9e9;'>

<nav class="navbar shadow navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand me-auto fs-3" id="spmsbranding" href="index.html">SPMS</a>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="spmsbranding">SPMS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link mx-lg-2 active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="project_feed.html">Feed</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="project_library.php">Library</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="add_project.html">Add Project</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="about.html">About</a>
            </li>

          </ul>
        </div>
      </div>
      <?php if (isset($_SESSION['email'])): ?>
            <a href="profile.php" class="login-button">Profile</a>
        <?php else: ?>
            <a href="login-page.html" class="login-button">Login</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  



<!-- Profile Picture Section -->
<div class="  d-flex p-4  rounded-5" style="background-color: white; margin:20px;margin-top:120px"><!-- User Details Section -->
<div class="row">
    <div class="col-md-8">
    <div class="user-details-section container"></div>
    <div class="align-items-center justify-content-center mt-3" style="align-items:center;"><h1><?php echo $username; ?></h1></div>
    <div class="mt-3"><p><b>Email:</b> <?php echo $email; ?></p></div>
    <div class="mt-3"><p> <b>ID:</b> <br> <?php echo $_SESSION['id']; ?></p></div>
    <!-- Add more user details here -->
</div>
</div>

</div>
</div>

<div class=" d-flex p-4 mt-5 rounded-5" style="background-color: white; margin:20px"><!-- User Details Section -->


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

                    <!-- Like and Comment Options -->
                    <div>
                        <p>Like Count: <span id="like-count-<?php echo $postId; ?>"><?php echo $post['like_count']; ?></span></p>
                        <button class="like-btn" data-post-id="<?php echo $postId; ?>">Like</button>
                        <button onclick="commentOnPost(<?php echo $postId; ?>)">Comment</button>
                    </div>

                    <!-- Comments Section -->
                    <div>
                        <h3>Comments</h3>
                        <?php 
                            // Fetch comments for the post
                            $selectCommentsQuery = "SELECT * FROM post_comments WHERE post_id = ?";
                            $stmtComments = $conn->prepare($selectCommentsQuery);
                            $stmtComments->bind_param("i", $postId);
                            $stmtComments->execute();
                            $resultComments = $stmtComments->get_result();
                            
                            // Display comments
                            if ($resultComments->num_rows > 0) {
                                while ($rowComment = $resultComments->fetch_assoc()) {
                                    echo '<p><strong>' . $rowComment['commenter_name'] . ':</strong> ' . $rowComment['comment_text'] . '</p>';
                                }
                            } else {
                                echo '<p>No comments yet.</p>';
                            }
                        ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>
</div>



<!-- Add your HTML structure and styles for other user details -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script>

// Function to add a comment to a post
function commentOnPost(postId) {
    // Get the comment text from the user
    var commentText = prompt("Enter your comment:");

    // Send AJAX request to add the comment
    if (commentText != null && commentText.trim() != "") {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_comment.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page to display the new comment
                location.reload();
            }
        };
        xhr.send("post_id=" + postId + "&comment_text=" + encodeURIComponent(commentText));
    }
}

// Function to like a post
function likePost(postId) {
    fetch('like_feed.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ post_id: postId })
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            const likesCount = document.getElementById(`likes-count-${postId}`);
            likesCount.textContent = result.likes_count;
        } else {
            alert('Error liking post');
        }
    })
    .catch(error => console.error('Error liking post:', error));
}


document.addEventListener("DOMContentLoaded", function() {
    // Get all like buttons
    var likeButtons = document.querySelectorAll(".like-btn");

    // Attach click event listener to each like button
    likeButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            // Get the post ID and like count element
            var postId = this.dataset.postId;
            var likeCountElement = this.previousElementSibling.firstElementChild;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open("POST", "like_post.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Define the request parameters
            var params = "post_id=" + encodeURIComponent(postId);

            // Define the callback function when the request is completed
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Update the like count on success
                    likeCountElement.textContent = xhr.responseText;
                } else {
                    // Handle errors
                    console.error("Request failed. Status: " + xhr.status);
                }
            };

            // Send the request
            xhr.send(params);
        });
    });
});
</script>
</body>
</html>


