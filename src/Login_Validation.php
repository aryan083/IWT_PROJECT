<?php
session_start();
require_once "dbconnection.php";

// Function to check student login
function studentLogin($conn, $email, $password) {
    $sql = "SELECT * FROM spms_student WHERE student_email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $studentpassword_hash = $row['student_pasword'];
        if (password_verify($password, $studentpassword_hash) && $email == $row['student_email']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Function to check faculty login
function facultyLogin($conn, $email, $password) {
    $sql = "SELECT * FROM spms_faculty WHERE faculty_email ='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $facultypassword_hash = $row['faculty_password'];
        if (password_verify($password, $facultypassword_hash) && $email == $row['faculty_email']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Function to check parent login
function parentLogin($conn, $email, $password) {
    $sql = "SELECT * FROM spms_parent WHERE parent_email ='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $parentpassword_hash = $row['parent_password'];
        if (password_verify($password, $parentpassword_hash) && $email == $row['parent_email']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Main code execution
if ($_REQUEST) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if (strpos($email, '@marwadiuniversity.ac.in') !== false) {
        if (studentLogin($conn, $email, $password)) {
            echo "Login Successful";
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid email or password";
        }
    } elseif (strpos($email, '@marwadieducation.edu.in') !== false) {
        if (facultyLogin($conn, $email, $password)) {
            echo "Login Successful";
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid email or password";
        }
    } elseif (strpos($email, '@gmail.com') !== false) {
        if (parentLogin($conn, $email, $password)) {
            echo "Login Successful";
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email";
    }
}

