<?php
session_start(); 

include "dbconnection.php";

    echo "Connected successfully";
    if($_REQUEST)
    {
        $facultyname = $_REQUEST['FacultyName'];
        $facultyID = $_REQUEST['FacultyID'];
        $facultyemail = $_REQUEST['FacultyEmail'];
        $facultypassword = $_REQUEST['FacultyPassword'];
        $hashedpassword= password_hash($facultypassword, PASSWORD_DEFAULT);
        $facultySignUp = date("d-m-Y h:i:sa");

        $sql = "INSERT INTO faculty
         (Faculty_Name, Faculty_ID , 
          Faculty_Email , Faculty_Password,
          Faculty_SignUp)
          VALUES
         ('$facultyname', '$facultyID', 
          '$facultyemail', '$hashedpassword',
          '$facultySignUp'
          )";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


