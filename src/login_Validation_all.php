<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SPMS";

$conn = mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
else 
{
    echo "Connected successfully"."<br>";

    if($_REQUEST)
    {
        
        $email= $_REQUEST['email'];
        $password = $_REQUEST['password'];
        
            if(strpos($email, '@marwadiuniversity.ac.in') !== false)
            {
                $sql = "SELECT * FROM student
                        WHERE Student_Email='$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) ==1) {
                    $row = mysqli_fetch_assoc($result);
                    $studentpassword_hash = $row['Student_Password'];
                        if (password_verify($password, $studentpassword_hash) && $email == $row['Student_Email']) 
                        { 
                            echo "Login Successful";
                            header("Location: homepage.html");
                            exit();
                        }
                        else 
                        {
                            echo "Invalid password";
                        }
                        } 
                        else 
                        {
                            echo "Invalid email";
                        }
        }
    
        else if(strpos($email, '@marwadieducation.edu.in') == false)
        {
            $sql = "SELECT * FROM faculty
                    WHERE Faculty_Email ='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) ==1) {
                $row = mysqli_fetch_assoc($result);
                $facultypassword_hash = $row['Faculty_Password'];
                    if (password_verify($password, $facultypassword_hash) && $email == $row['Faculty_Email']) 
                    { 
                        echo "Login Successful";
                        header("Location: homepage.html");
                        exit();
                    }
                    else 
                    {
                        echo "Invalid password";
                    }
                    } 
                    else 
                    {
                        echo "Invalid email";
                    }
        }
    
    
        else if(strpos($email, '@gmail.com') !== false)
        {
            $sql = "SELECT * FROM parent
                    WHERE parent_Email ='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) ==1) {
                $row = mysqli_fetch_assoc($result);
                $adminpassword_hash = $row['parent_Password'];
                    if (password_verify($password, $adminpassword_hash) && $email == $row['parent_Email']) 
                    { 
                        echo "Login Successful";
                        header("Location: homepage.html");
                        exit();
                    }
                    else 
                    {
                        echo "Invalid password";
                    }
                    } 
                    else 
                    {
                        echo "Invalid email";
                    }
        }
        else
        {
            echo "Invalid email";
        }

    }
    
}
