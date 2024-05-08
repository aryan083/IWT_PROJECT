<?php

require_once "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'student') {
        $table = 'spms_student';
        $password_column = 'student_password';
        $id_column = 'student_enrollment_number';
    } else if ($role == 'faculty') {
        $table = 'spms_faculty';
        $password_column = 'faculty_password';
        $id_column = 'faculty_id_Employee_code';
    } else {
        $table = 'spms_parent';
        $password_column = 'parent_password';
        $id_column = 'parent_id';
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
            $_SESSION['id_column'] =$id_column;
            $_SESSION['table']=$table;
            $_SESSION['id'] = $row[$id_column];
            echo "Login Successful";
            echo "<br>";
            echo "Welcome " . $_SESSION['name'];
            echo $_SESSION['role'];
            echo $_SESSION['id'];
            echo $_SESSION['id_column'];
            echo $_SESSION['table'];


            header("Location: index2.php");

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
