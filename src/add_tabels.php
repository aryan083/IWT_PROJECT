<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS spms_db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db("spms_db");

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS spms_student (
    student_name VARCHAR(255) NOT NULL,
    student_enrollment_number INT(11) UNIQUE NOT NULL PRIMARY KEY,
    student_email VARCHAR(255) NOT NULL,
    student_password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table spms_student created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS spms_faculty (
    faculty_name VARCHAR(255) NOT NULL,
    faculty_id_Employee_code INT(11) UNIQUE NOT NULL PRIMARY KEY,
    faculty_email VARCHAR(255) NOT NULL,
    faculty_password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table spms_faculty created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS spms_parent (
    parent_id INT AUTO_INCREMENT PRIMARY KEY,
    parent_name VARCHAR(255) NOT NULL,
    child_enrollment_id INT(11) NOT NULL,
    parent_email VARCHAR(255) NOT NULL,
    parent_password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table spms_parent created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
