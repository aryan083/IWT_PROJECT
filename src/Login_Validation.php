<?php
session_start();
require_once "dbconnection.php";


//function to check if student password is incorrect
function isStudentPasswordIncorrect($conn, $email, $password) {
    $sql = "SELECT * FROM spms_student WHERE student_email = '$email' AND student_password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=incorrect_password");//incorrect password
    exit();
}
//function to check if faculty password is incorrect
function isFacultyPasswordIncorrect($conn, $email, $password) {
    $sql = "SELECT * FROM spms_faculty WHERE faculty_email = '$email' AND faculty_password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=incorrect_password");//incorrect password
    exit();
}

//function to check if parent password is incorrect
function isParentPasswordIncorrect($conn, $email, $password) {
    $sql = "SELECT * FROM spms_parent WHERE parent_email = '$email' AND parent_password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        return;
    }
    header("Location: login-page.html?error=incorrect_password");//incorrect password
    exit();
}


//function to check if student email is incorrect
function isStudentEmailIncorrect($conn, $email) {
    $sql = "SELECT * FROM spms_student WHERE student_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=incorrect_email");//incorrect email
    exit();
}

//function to check if faculty email is incorrect
function isFacultyEmailIncorrect($conn, $email) {
    $sql = "SELECT * FROM spms_student WHERE student_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    $sql = "SELECT * FROM spms_faculty WHERE faculty_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=incorrect_email");//incorrect email
    exit();
}

//function to check if parent email is incorrect
function isParentEmailIncorrect($conn, $email) {
    $sql = "SELECT * FROM spms_parent WHERE parent_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=incorrect_email");//incorrect email
    exit();
}


//function to check if student doesn't exist
function isStudentExist($conn, $email) {
    $sql = "SELECT * FROM spms_student WHERE student_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=user_doesnt_exist");//user doesn't exist
    exit();
}


//function to check if faculty doesn't exist
function isFacultyExist($conn, $email) {
    $sql = "SELECT * FROM spms_student WHERE student_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    $sql = "SELECT * FROM spms_faculty WHERE faculty_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=user_doesnt_exist");//user doesn't exist
    exit();
}

//function to check if parent doesn't exist
function isParentExist($conn, $email) {
    $sql = "SELECT * FROM spms_parent WHERE parent_email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return;
    }
    header("Location: login-page.html?error=user_doesnt_exist");//user doesn't exist
    exit();
}

//function for student login
function studentLogin($conn, $email, $password) {
    $sql = "SELECT * FROM spms_student WHERE student_email = '$email' AND student_password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['student_name']=$row['student_name'];
        $_SESSION['enrollment_no']=$row['enrollment_no'];

        header("Location: index.html");
        exit();
    }
}

//function for faculty login
function facultyLogin($conn, $email, $password) {
    $sql = "SELECT * FROM spms_faculty WHERE faculty_email = '$email' AND faculty_password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['faculty_name']=$row['faculty_name'];
        $_SESSION['faculty_id']=$row['faculty_id'];

        header("Location: index.html");
        exit();
    }
}

//function for parent login

function parentLogin($conn, $email, $password) {
    $sql = "SELECT * FROM spms_parent WHERE parent_email = '$email' AND parent_password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['parent_name']=$row['parent_name'];
        $_SESSION['child_enrollment_no']=$row['child_enrollment_no'];

        header("Location: index.html");
        exit();
    }
}

//function to check if user is already logged in


if($_REQUEST['login']){

    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_REQUEST['password'];



    if(strpos($email, '@marwadiuniversity.ac.in') !== false)
    {
        isStudentExist($conn, $email);
        isStudentEmailIncorrect($conn, $email);
        isStudentPasswordIncorrect($conn, $email, $password);
        studentLogin($conn, $email, $password);
    }
    elseif(strpos($email, '@marwadieducation.edu.in') !== false)
    {
        isFacultyExist($conn, $email);
        isFacultyEmailIncorrect($conn, $email);
        isFacultyPasswordIncorrect($conn, $email, $password);
        facultyLogin($conn, $email, $password);
    }
    else
    {
        isParentExist($conn, $email);
        isParentEmailIncorrect($conn, $email);
        isParentPasswordIncorrect($conn, $email, $password);
        parentLogin($conn, $email, $password);
    }

    header("Location: login-page.html?error=login_failed");//login failed
    exit();

}