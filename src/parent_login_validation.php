<?php
session_start(); 

include "dbconnection.php";

if($_REQUEST)
{
    $parentemail = $_REQUEST['parentEmail'];
    $parentpassword = $_REQUEST['parentPassword'];
  
    $sql = "SELECT * FROM parent WHERE parent_Email='$parentemail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) ==1) {
        $row = mysqli_fetch_assoc($result);
        $perentpassword_hash = $row['parent_Password'];
        if (password_verify($parentpassword, $perentpassword_hash) && $parentemail == $row['parent_Email']) 
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