<?php
session_start();
require_once "dbconnection.php";

if(isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Clear any existing cookies
    setcookie('studentEmail', '', time() - 3600, '/');
    setcookie('facultyEmail', '', time() - 3600, '/');
    setcookie('parentEmail', '', time() - 3600, '/');

    // Redirect to the login page
    header("Location: login-page.html");
    exit();
}

// Function to validate input data
function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to check if the user exists in the database
function isUserExist($conn, $email, $table) {
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

// Function to perform login
function loginUser($conn, $email, $password, $table) {
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            setcookie('email', $email, time() + (86400), "/"); // Cookie set to expire in 30 days
            
            header("Location: index.html");
            exit();
        } else {
            header("Location: login-page.html?error=incorrect_password");
            exit();
        }
    } else {
        header("Location: login-page.html?error=user_not_found");
        exit();
    }
}

// Main code block for login 
if(isset($_POST['login'])) {
    $email = validate_input($_POST['email']);
    $password = $_POST['password'];

    // Check if the user is a student
    if(strpos($email, '@marwadiuniversity.ac.in') !== false) {
        $table = 'spms_student';
        if(isUserExist($conn, $email, $table)) {
            loginUser($conn, $email, $password, $table);
        } else {
            header("Location: login-page.html?error=user_not_found");
            exit();
        }
    } 
    // Check if the user is a faculty
    elseif(strpos($email, '@marwadieducation.edu.in') !== false) {
        $table = 'spms_faculty';
        if(isUserExist($conn, $email, $table)) {
            loginUser($conn, $email, $password, $table);
        } else {
            header("Location: login-page.html?error=user_not_found");
            exit();
        }
    } 
    // Check if the user is a parent
    else {
        $table = 'spms_parent';
        if(isUserExist($conn, $email, $table)) {
            loginUser($conn, $email, $password, $table);
        } else {
            header("Location: login-page.html?error=user_not_found");
            exit();
        }
    }
}

