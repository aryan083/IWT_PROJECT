`<?php
require_once 'dbconnection.php';

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check_unique($conn, $table, $column, $value) {
    $sql = "SELECT * FROM $table WHERE $column = '$value'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

if(isset($POST['submit'])){

    if(isset($_POST['studentEmail'])){
        $studentName=validate_input($_POST['full_name']);
        $studentEnrollemntNumber=validate_input($_POST['enr_no']);
        $studentEmail=validate_input($_POST['email']);
        $studentPassword=$_POST['password'];
        $hashedStudentPassword = password_hash($studentPassword, PASSWORD_DEFAULT);

        if(check_unique($conn, 'spms_student', 'student_email', $studentEmail) || 
           check_unique($conn, 'spms_student', 'student_enrollment_number', $studentEnrollemntNumber)) {
            header("Location: sign-up.html?error=email_or_enrollment_number_already_exists");
            exit();
        }

        $sql = "INSERT INTO spms_student
        (student_name, student_enrollment_number, student_email, student_password) VALUES 
        ('$studentName', '$studentEnrollemntNumber', '$studentEmail', '$hashedStudentPassword')";
        mysqli_query($conn, $sql);
        $_SESSION['studentEmail'] = $studentEmail;
        setcookie('studentEmail', $studentEmail, time() + (86400), "/"); // 86400 = 1 day
        header("Location: login-page.html?success=student_registered");
        
        exit();

    }else if(isset($_POST['facultyEmail'])){
        $facultyName=validate_input($_POST['full_name']);
        $facultyID=validate_input($_POST['fac_id']);
        $facultyEmail=validate_input($_POST['email']);
        $facultyPassword=$_POST['password'];
        $hashedFacultyPassword = password_hash($facultyPassword, PASSWORD_DEFAULT);

        if(check_unique($conn, 'spms_faculty', 'faculty_email', $facultyEmail) || 
           check_unique($conn, 'spms_faculty', 'faculty_id', $facultyID)) {
            header("Location: sign-up.html?error=email_or_faculty_id_already_exists");
            exit();
        }

        $sql = "INSERT INTO spms_faculty 
        (faculty_name, faculty_id, faculty_email, faculty_password) VALUES 
        ('$facultyName', '$facultyID', '$facultyEmail', '$hashedFacultyPassword')";
        mysqli_query($conn, $sql);
        
        $_SESSION['facultyEmail'] = $facultyEmail;
        setcookie('facultyEmail', $facultyEmail, time() + (86400), "/"); // 86400 = 1 day

        header("Location: login-page.html?success=faculty_registered");
        exit();

    }else if(isset($_POST['parentEmail'])){
        $parentName=validate_input($_POST["full_name"]);
        $ChildsEnrollID=validate_input($_POST["child_id"]);
        $parentEmail=validate_input($_POST["email"]);
        $parentPassword=$_POST["password"];
        $hashedParentPassword = password_hash($parentPassword, PASSWORD_DEFAULT);

        if(check_unique($conn, 'spms_parent', 'parent_email', $parentEmail) || 
           check_unique($conn, 'spms_parent', 'child_enrollment_id', $ChildsEnrollID)) {
            header("Location: sign-up.html?error=email_or_child_id_already_exists");
            exit();
        }

        $sql = "INSERT INTO spms_parent 
        (parent_name, child_enrollment_id, parent_email, parent_password) VALUES 
        ('$parentName', '$ChildsEnrollID', '$parentEmail', '$hashedParentPassword')";
        mysqli_query($conn, $sql);
       
        $_SESSION['parentEmail'] = $parentEmail;
        setcookie('parentEmail', $parentEmail, time() + (86400), "/"); // 86400 = 1 day

        header("Location: login-page.html?success=parent_registered");
        exit();
    }
}
