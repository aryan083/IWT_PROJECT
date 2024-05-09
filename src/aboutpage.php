<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link rel="stylesheet" href="front-end/navbar-styles.css">
    <style>
        h1 {
            text-align: center;
            margin-top: 100px;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="front-end/home-page-files/home-page-styles.css">
  

</head>
<body>
    <!-- write code for about page -->
    
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
     

    <h1>About Page</h1>
    <p>This is the about page of the SPMS project.</p>
    <p>SPMS stands for Student Project Management System.</p>
    <p>It is a platform where students can share their projects with others.</p>


    

</body>
<footer>

  <div class="footer">

    <br>
    Copyrights of Aryan Mahida , Umang Hirani and Shantanusinh Parmar
    <br>
    <br>
  </div>

</footer>

</html>