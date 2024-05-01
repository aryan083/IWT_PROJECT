<?php

require_once "dbconnection.php";



// Function to check if user does't exists
function isUserExist($conn, $email, $table) {
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function loginUser($conn, $email, $password, $table) {
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])==true) {
            echo "Login successful";
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
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
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