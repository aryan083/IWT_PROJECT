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