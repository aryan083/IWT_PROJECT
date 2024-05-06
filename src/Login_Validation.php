<?php

require_once "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'student') {
        $table = 'spms_student';
        $password_column = 'student_password';
    } else if ($role == 'faculty') {
        $table = 'spms_faculty';
        $password_column = 'faculty_password';
    } else {
        $table = 'spms_parent';
        $password_column = 'parent_password';
    }

    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row[$password_column])) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['table']=$table;
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login-page.html?error=invalid_password");
            exit();
        }
    } else {
        header("Location: login-page.html?error=invalid_email");
        exit();
    }
} else {
    header("Location: login-page.html");
    exit();
}
