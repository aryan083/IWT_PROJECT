<?php
require_once 'dbconnection.php';

$sql = "SELECT COUNT(parent_id) as parent_count FROM spms_parent";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_count = $row['parent_count'];

$sql = "SELECT COUNT(id) as project_count FROM spms_projects";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$project_count = $row['project_count'];

$sql = "SELECT COUNT(faculty_id_Employee_code) as faculty_count FROM spms_faculty";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$faculty_count = $row['faculty_count'];

$sql = "SELECT COUNT(student_enrollment_number ) as student_count FROM spms_student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_count = $row['student_count'];

$collaborators_count = 0; // You need to query this count from the appropriate table

// Close connection
$conn->close();

// Prepare the data to be returned
$data = array(
    'project_count' => $project_count,
    'parent_count' => $parent_count,
    'student_count' => $student_count,
    'faculty_count' => $faculty_count,
    'collaborators_count' => $collaborators_count
);

// Output the data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
