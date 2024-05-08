<?php
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
$conn->close();

//Output counts
echo "Projects Done: " . $project_count . "<br>";
echo "Parents Registered " . $parent_count . "<br>";
echo "Student Registered " . $student_count . "<br>";
echo "Faculties Registered " . $faculty_count . "<br>";
echo "Total Project Collaborators " . $collaborators_count . "<br>";
echo "Faculties Active in the Projects " . $faculty_count . "<br>";

    
    // <h1>Statistics</h1>
    // <p>Projects Done: <?php echo $project_count; ?></p>
    // <p>Parents Registered: <?php echo $parent_count; ?></p>
    // <p>Student Registered: <?php echo $student_count; ?></p>
    // <p>Faculties Registered: <?php echo $faculty_count; ?></p>
    // <p>Total Project Collaborators: <?php echo $collaborators_count; ?></p>
    // <p>Faculties Active in the Projects: <?php echo $faculty_count; ?></p>
