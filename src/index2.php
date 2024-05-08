<?php
require_once 'dbconnection.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Calendar/css/style.css">
  <link rel="stylesheet" href="front-end/home-page-files/home-page-styles.css">


</head>

<body style="background-color: #6da9e9">

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
      <a href="login-page.html" class="login-button ">Login</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <br>
  <div class="first-div">
    <div class="calender-div rounded-5" style="background-color: white;">
      <!-- <section class="ftco-section"> -->
        

          <div class="row p-3  ">

            
            <div class="left-box col-md-4">
              <div class="content p-3 w-100 rounded-5">
                <iframe class="w-100 rounded-5 " width="1280" height="720" src="https://www.youtube.com/embed/cIuigNAX8bU" title="Project Fair 2024 || ICT Engineering || Project based Learning" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>

    
            </div>
            <div class="right-box col-md-8 mt-3 ">
              <div class="content w-100 rounded-5">
                <div class="calendar-container">
                  <div class="calendar"> 
                    <div class="year-header"> 
                      <span class="left-button fa fa-chevron-left" id="prev"> </span> 
                      <span class="year" id="label"></span> 
                      <span class="right-button fa fa-chevron-right" id="next"> </span>
                    </div> 
                    <table class="months-table w-100"> 
                      <tbody>
                        <tr class="months-row">
                          <td class="month">Jan</td> 
                          <td class="month">Feb</td> 
                          <td class="month">Mar</td> 
                          <td class="month">Apr</td> 
                          <td class="month">May</td> 
                          <td class="month">Jun</td> 
                          <td class="month">Jul</td>
                          <td class="month">Aug</td> 
                          <td class="month">Sep</td> 
                          <td class="month">Oct</td>          
                          <td class="month">Nov</td>
                          <td class="month">Dec</td>
                        </tr>
                      </tbody>
                    </table> 
                    
                    <table class="days-table w-100"> 
                      <td class="day">Sun</td> 
                      <td class="day">Mon</td> 
                      <td class="day">Tue</td> 
                      <td class="day">Wed</td> 
                      <td class="day">Thu</td> 
                      <td class="day">Fri</td> 
                      <td class="day">Sat</td>
                    </table> 
                    <div class="frame"> 
                      <table class="dates-table w-100"> 
                        <tbody class="tbody">             
                        </tbody> 
                      </table>
                    </div> 
<div class="mt-4">

</div>
                      <button class="button" id="add-button">Add Event</button>

                  </div>
                </div>
                <div class="events-container rounded-3 ">
                </div>
                <div class="dialog rounded-5" id="dialog">
                    <h2 class="dialog-header"> Add New Event </h2>
                    <form class="form" id="form">
                      <div class="form-container" align="center">
                        <label class="form-label" id="valueFromMyButton" for="name">Event name</label>
                        <input class="input" type="text" id="name" maxlength="36">
                        <label class="form-label" id="valueFromMyButton" for="description">Event Description</label>
                        <input class="input" type="text" id="description" maxlength="100">
                        <input type="button" value="Cancel" class="button" id="cancel-button">
                        <input type="button" onclick="callEvent()" value="OK" class="button button-white" id="ok-button">
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>

  </div>
  </div>

  <div class="row text-align-center justify-content-center p-3 w-100">
        <div class="  project-display-project  rounded-3 bg-white p-3 col-md-auto  mb-2 text-align-center" style="margin: 10px;margin-top: 0px;"><?php
require_once 'dbconnection.php';

// Query to get count of 'id' in projects_collaborators table
$sql_collaborators = "SELECT COUNT(id) AS collaborators_count FROM projects_collaborators";
$result_collaborators = $conn->query($sql_collaborators);
$row_collaborators = $result_collaborators->fetch_assoc();
$collaborators_count = $row_collaborators['collaborators_count'];

// Query to get count of 'id' in projects_faculty table
$sql_faculty = "SELECT COUNT(id) AS faculty_count FROM projects_faculty";
$result_faculty = $conn->query($sql_faculty);
$row_faculty = $result_faculty->fetch_assoc();
$faculty_count = $row_faculty['faculty_count'];


$sql= "SELECT COUNT(parent_id) as parent_count FROM spms_parent";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_count = $row['parent_count'];

$sql= "SELECT COUNT(id) as project_count FROM spms_projects";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$project_count = $row['project_count'];

$sql= "SELECT COUNT(faculty_id_Employee_code) as faculty_count FROM spms_faculty";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$faculty_count = $row['faculty_count'];

$sql= "SELECT COUNT(student_enrollment_number ) as student_count FROM spms_student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_count = $row['student_count'];



// Close connection


//Output counts

echo "Projects Done : " . $project_count . "<br>";
// echo "Parents Registered " . $parent_count . "<br>";
// echo "Student Registered " . $student_count . "<br>";
// echo "Faculties Registered " . $faculty_count . "<br>";
// echo "Total Project Collaborators " . $collaborators_count . "<br>";
// echo "Faculties Active in the Projects " . $faculty_count . "<br>";

?> </div>
        <div class="  project-display-parent  rounded-3 bg-white p-3 col-md-auto  mb-2 text-align-center" style="margin: 10px;margin-top: 0px;"><?php
require_once 'dbconnection.php';

// Query to get count of 'id' in projects_collaborators table
$sql_collaborators = "SELECT COUNT(id) AS collaborators_count FROM projects_collaborators";
$result_collaborators = $conn->query($sql_collaborators);
$row_collaborators = $result_collaborators->fetch_assoc();
$collaborators_count = $row_collaborators['collaborators_count'];

// Query to get count of 'id' in projects_faculty table
$sql_faculty = "SELECT COUNT(id) AS faculty_count FROM projects_faculty";
$result_faculty = $conn->query($sql_faculty);
$row_faculty = $result_faculty->fetch_assoc();
$faculty_count = $row_faculty['faculty_count'];


$sql= "SELECT COUNT(parent_id) as parent_count FROM spms_parent";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_count = $row['parent_count'];

$sql= "SELECT COUNT(id) as project_count FROM spms_projects";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$project_count = $row['project_count'];

$sql= "SELECT COUNT(faculty_id_Employee_code) as faculty_count FROM spms_faculty";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$faculty_count = $row['faculty_count'];

$sql= "SELECT COUNT(student_enrollment_number ) as student_count FROM spms_student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_count = $row['student_count'];



// Close connection


//Output counts

// echo "Projects Done: " . $project_count . "<br>";
echo "Parents Registered :  " . $parent_count . "<br>";
// echo "Student Registered " . $student_count . "<br>";
// echo "Faculties Registered " . $faculty_count . "<br>";
// echo "Total Project Collaborators " . $collaborators_count . "<br>";
// echo "Faculties Active in the Projects " . $faculty_count . "<br>";

?> </div>

        <div class="  project-display-parent  rounded-3 bg-white p-3 col-md-auto  mb-2 text-align-center" style="margin: 10px;margin-top: 0px;"><?php
require_once 'dbconnection.php';

// Query to get count of 'id' in projects_collaborators table
$sql_collaborators = "SELECT COUNT(id) AS collaborators_count FROM projects_collaborators";
$result_collaborators = $conn->query($sql_collaborators);
$row_collaborators = $result_collaborators->fetch_assoc();
$collaborators_count = $row_collaborators['collaborators_count'];

// Query to get count of 'id' in projects_faculty table
$sql_faculty = "SELECT COUNT(id) AS faculty_count FROM projects_faculty";
$result_faculty = $conn->query($sql_faculty);
$row_faculty = $result_faculty->fetch_assoc();
$faculty_count = $row_faculty['faculty_count'];


$sql= "SELECT COUNT(parent_id) as parent_count FROM spms_parent";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_count = $row['parent_count'];

$sql= "SELECT COUNT(id) as project_count FROM spms_projects";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$project_count = $row['project_count'];

$sql= "SELECT COUNT(faculty_id_Employee_code) as faculty_count FROM spms_faculty";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$faculty_count = $row['faculty_count'];

$sql= "SELECT COUNT(student_enrollment_number ) as student_count FROM spms_student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_count = $row['student_count'];



// Close connection


//Output counts

// echo "Projects Done: " . $project_count . "<br>";
// echo "Parents Registered " . $parent_count . "<br>";
echo "Student Registered : " . $student_count . "<br>";
// echo "Faculties Registered " . $faculty_count . "<br>";
// echo "Total Project Collaborators " . $collaborators_count . "<br>";

?> </div>
       
        <div class="  project-display-parent  rounded-3 bg-white p-3 col-md-auto  mb-2 text-align-center" style="margin: 10px;margin-top: 0px;"><?php
require_once 'dbconnection.php';

// Query to get count of 'id' in projects_collaborators table
$sql_collaborators = "SELECT COUNT(id) AS collaborators_count FROM projects_collaborators";
$result_collaborators = $conn->query($sql_collaborators);
$row_collaborators = $result_collaborators->fetch_assoc();
$collaborators_count = $row_collaborators['collaborators_count'];

// Query to get count of 'id' in projects_faculty table
$sql_faculty = "SELECT COUNT(id) AS faculty_count FROM projects_faculty";
$result_faculty = $conn->query($sql_faculty);
$row_faculty = $result_faculty->fetch_assoc();
$faculty_count = $row_faculty['faculty_count'];


$sql= "SELECT COUNT(parent_id) as parent_count FROM spms_parent";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_count = $row['parent_count'];

$sql= "SELECT COUNT(id) as project_count FROM spms_projects";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$project_count = $row['project_count'];

$sql= "SELECT COUNT(faculty_id_Employee_code) as faculty_count FROM spms_faculty";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$faculty_count = $row['faculty_count'];

$sql= "SELECT COUNT(student_enrollment_number ) as student_count FROM spms_student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_count = $row['student_count'];



// Close connection


//Output counts

// echo "Projects Done: " . $project_count . "<br>";
// echo "Parents Registered " . $parent_count . "<br>";
// echo "Student Registered " . $student_count . "<br>";
// echo "Faculties Registered " . $faculty_count . "<br>";
echo "Total Project Collaborators : " . $collaborators_count . "<br>";
// echo "Faculties Active in the Projects " . $faculty_count . "<br>";

?>  </div>

        <div class="  project-display-parent  rounded-3 bg-white p-3 col-md-auto  mb-2 text-align-center" style="margin: 10px;margin-top: 0px;"><?php
require_once 'dbconnection.php';

// Query to get count of 'id' in projects_collaborators table
$sql_collaborators = "SELECT COUNT(id) AS collaborators_count FROM projects_collaborators";
$result_collaborators = $conn->query($sql_collaborators);
$row_collaborators = $result_collaborators->fetch_assoc();
$collaborators_count = $row_collaborators['collaborators_count'];

// Query to get count of 'id' in projects_faculty table
$sql_faculty = "SELECT COUNT(id) AS faculty_count FROM projects_faculty";
$result_faculty = $conn->query($sql_faculty);
$row_faculty = $result_faculty->fetch_assoc();
$faculty_count = $row_faculty['faculty_count'];


$sql= "SELECT COUNT(parent_id) as parent_count FROM spms_parent";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_count = $row['parent_count'];

$sql= "SELECT COUNT(id) as project_count FROM spms_projects";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$project_count = $row['project_count'];

$sql= "SELECT COUNT(faculty_id_Employee_code) as faculty_count FROM spms_faculty";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$faculty_count = $row['faculty_count'];

$sql= "SELECT COUNT(student_enrollment_number ) as student_count FROM spms_student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_count = $row['student_count'];



// Close connection


//Output counts

// echo "Projects Done: " . $project_count . "<br>";
// echo "Parents Registered " . $parent_count . "<br>";
// echo "Student Registered " . $student_count . "<br>";
echo "Faculties Registered : " . $faculty_count . "<br>";
// echo "Total Project Collaborators " . $collaborators_count . "<br>";
// echo "Faculties Active in the Projects " . $faculty_count . "<br>";

?> </div>
      </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="Calendar/js/main.js"></script>
  <script>
    
function callEvent() {
  var name = $("#name").val();
  var description = $("#description").val();
  var date = new Date($(".active-date").text() + " " + $(".active-month").text() + " " + $(".year").text());
  addEvent(name, description, date);
}

function addEvent(name, description, date) {
  // Data to be sent to the server
  var data = {
      name: name,
      description: description,
      date: date
  };


  // AJAX request
  $.ajax({
      type: "POST",
      url: "add_event.php", // Replace "add_event.php" with the URL of your PHP script
      data: data,
      success: function(response) {
          // Handle success response from the server
          console.log("Event added successfully!");
          // Optionally, you can perform additional actions here after successful addition of event
      },
      error: function(xhr, status, error) {
          // Handle error response from the server
          console.error("Error adding event:", error);
          // Optionally, you can display an error message to the user or perform other actions
      }
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