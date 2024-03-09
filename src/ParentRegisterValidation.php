<?php
session_start(); 

include "dbconnection.php";

    echo "Connected successfully";
    if($_REQUEST)
    {
       $parentname = $_REQUEST['ParentName'];
       $parentemail = $_REQUEST['Parentemail'];
       $parentpassword = $_REQUEST['ParentPassword'];
       $hashedpassword= password_hash($parentpassword, PASSWORD_DEFAULT);
       $parentsignup = date("d-m-Y h:i:sa");

       $sql = "INSERT INTO parent
       (parent_Name, parent_Email, 
       parent_Password, parent_SignUp)
       VALUES
        ('$parentname', '$parentemail',
        '$hashedpassword','$parentsignup')";

       
       
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


