<?php
session_start(); 

include "dbconnection.php";

    echo "Connected successfully";
    if($_REQUEST)
    {
        $studentname = $_REQUEST['StudentName'];
        $studentEnrollemntNumber = $_REQUEST['StudentEnrollmentNumber'];
        $studentGrNo= $_REQUEST['StudentGRNo'];
        $studentemail = $_REQUEST['StudentEmail'];
        $studentpassword = $_REQUEST['StudentPassword'];
        $hashedpassword= password_hash($studentpassword, PASSWORD_DEFAULT);
        $studentsignup = date("d-m-Y h:i:sa");

        $sql = "INSERT INTO student
        (Student_Name, Student_EnrollmentNumber, 
        Student_GRNo, Student_Email, 
        Student_Password, Student_SignUp)
        VALUES
        ('$studentname', '$studentEnrollemntNumber', 
        '$studentGrNo', '$studentemail',
        '$hashedpassword','$studentsignup'
        )";
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

