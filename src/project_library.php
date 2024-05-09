<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Library</title>
    <!-- <link rel="stylesheet" href="styles.css">  -->
    <link rel="stylesheet" href="project-library-styles.css"> 
    <link rel="stylesheet" href="front-end/navbar-styles.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="front-end/add-project-files/add-project-styles.css">
    <link rel="stylesheet" href="front-end/home-page-files/home-page-styles.css">
  
</head>
<body>

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
  



    <div class=" justify-content-center align-items-center min-vh-100" style="margin-top:120px">
        <div class="row border rounded-5 p-3 bg-white box-area mb-44 mt-4"style="margin:20px">
            
        <div class="form-control form-control-lg bg-white "style="text-align: center; border: none; margin:10px">
            <h1><b style="font-weight: 650;">PROJECT LIBRARY</b></h1>
        </div>
    </div>


    <div class='row border rounded-3 p-3 bg-white  box-area mb-44 mt-4' style='margin:20px'>


    <select class="form-select form-select-lg bg-light fs-6 rounded-3" 
                name="Status" style=" " id="status-filter">
            <option value="">All Status</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>

        <input type="text" class="form-control form-control-lg bg-light fs-6 mt-3" placeholder="Search by project title..." name="Search" id="search-input">
        <button type="button" class="btn btn-primary mt-3" onclick="searchProjects()">Search</button>


    
    



</div>
    <div style="text-align: center; border: none; margin:10px">
    <div class="projects">
            <?php include 'fetch_projects.php'; ?> 
            
        </div>

    </div>



    
    </div>

    <div id="project-list">
  <!-- Project details will be displayed here -->
</div>


    <script>
    function searchProjects() {
        var searchText = document.getElementById("search-input").value.toLowerCase();

        // AJAX request to fetch project data
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "search_project.php?search=" + searchText, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var projects = JSON.parse(xhr.responseText);
                updateProjectList(projects);
            }
        };
        xhr.send();
    }


function updateProjectList(projects) {
  var projectList = document.getElementById("project-list");
  projectList.innerHTML = ""; // Clear existing list

  projects.forEach(function (project) {
    var listItem = document.createElement("li");
    listItem.classList.add("project");
    listItem.innerHTML = `
      <div class="title">${project.title}</div>
      <div class="status">${project.status}</div>
      <!-- Add more project details here as needed -->
    `;
    projectList.appendChild(listItem);
  });
}
    </script>
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
