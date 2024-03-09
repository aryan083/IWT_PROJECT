<?php
session_start(); 

include "dbconnection.php";

if($_REQUEST)
{
    $studentemail = $_REQUEST['studentEmail'];
    $studentpassword = $_REQUEST['studentPassword'];
  
    
    $sql = "SELECT * FROM student WHERE Student_Email='$studentemail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) ==1) {
        $row = mysqli_fetch_assoc($result);
        $studentpassword_hash = $row['Student_Password'];
        if (password_verify($studentpassword, $studentpassword_hash) && $studentemail == $row['Student_Email']) 
        { 
            $_SESSION['StudentName'] = $row['Student_Name'];
            $_SESSION['StudentEmail'] = $row['Student_Email'];
            $_SESSION['StudentEnrollmentNumber'] = $row['Student_EnrollmentNumber'];
            $_SESSION['StudentGRNo'] = $row['Student_GRNo'];
            $_SESSION['StudentSignUp'] = $row['Student_SignUp'];
            echo "Login Successful";
            $_SESSION['studentemail'] = $studentemail;


            header("Location: http://localhost/SPMS/homepage.php");
            exit();

        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email";
    }
}