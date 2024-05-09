<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Status</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="front-end/add-project-files/add-project-styles.css">
    <link rel="stylesheet" href="front-end/navbar-styles.css">
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
  

    <div class="container mt-5">
        <h2>Faculty Status</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Action</th>
                    <th>Remarks</th>
                    <th></th> <!-- Add a column for the submit button -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                require_once 'dbconnection.php';

                // Fetch projects from the database
                $query = "SELECT id, title FROM spms_projects";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><a href='project_detail.php?project_id=" . $row['id'] . "'>" . $row['title'] . "</a></td>";
                        echo "<td>
                                <select name='action[]' class='form-select form-select-lg bg-light fs-6 rounded-3'>
                                    <option value='Ongoing'>Ongoing</option>
                                    <option value='Pending'>Pending</option>
                                    <option value='Completed'>Completed</option>
                                </select>
                            </td>";
                        echo "<td><input type='text' name='remarks[]' class='form-control form-control-lg bg-light fs-6' placeholder='Add remarks'></td>";
                        echo "<td><button class='btn btn-primary' onclick='updateStatus(" . $row['id'] . ")'>Submit</button></td>"; // Button to submit status using AJAX
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No projects found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function updateStatus(projectId) {
            var action = document.querySelector("select[name='action[]']").value;
            var remarks = document.querySelector("input[name='remarks[]']").value;

            // AJAX request to update status
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle response if needed
                    console.log(xhr.responseText);
                }
            };
            xhr.send("project_id=" + projectId + "&action=" + action + "&remarks=" + remarks);
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
