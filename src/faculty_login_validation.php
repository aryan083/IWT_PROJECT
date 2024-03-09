<?php
session_start(); 

include "dbconnection.php";

if($_REQUEST)
{
    $facultyemail = $_REQUEST['facultyEmail'];
    $facultypassword = $_REQUEST['facultyPassword'];
  
    $sql = "SELECT * FROM faculty WHERE Faculty_Email='$facultyemail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) ==1) {
        $row = mysqli_fetch_assoc($result);
        $facultypassword_hash = $row['Faculty_Password'];
        if (password_verify($facultypassword, $facultypassword_hash) && $facultyemail == $row['Faculty_Email']) 
        { 
            echo "Login Successful";
            $_SESSION['facultyemail'] = $facultyemail;


            header("Location: http://localhost/SPMS/homepage.php");
            exit();

        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email";
    }
}