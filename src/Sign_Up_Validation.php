`<?php
require_once 'dbconnection.php';


function insertUserIds($conn) {
    // Insert user IDs from different tables into user_ids table
    $insertQuery = "INSERT INTO user_ids (user_id, user_role)
                    SELECT student_enrollment_number, 'student' FROM spms_student
                    UNION ALL
                    SELECT faculty_id_Employee_code, 'faculty' FROM spms_faculty
                    UNION ALL
                    SELECT parent_id, 'parent' FROM spms_parent";

    mysqli_query($conn, $insertQuery);
}

function isUserExist($conn, $email, $table){
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

  
    if($_POST['role']=='student'){
        $table = 'spms_student';

        $student_name = $_POST['student_full_name'];
        $student_enrollment_number = $_POST['student_enr_no'];
        $student_email = $_POST['student_email'];
        $student_password = password_hash($_POST['student_password'], PASSWORD_DEFAULT);

        echo $student_name;
        echo $student_enrollment_number;
        echo $student_email;
        echo $student_password;

        if(isUserExist($conn, $student_email, $table)){
            
            header("Location: sign-up.html?error=user_already_exists");

            exit();
        }
        else{
            $sql = "INSERT INTO $table (name, student_enrollment_number, email, student_password) VALUES 
            ('$student_name', '$student_enrollment_number', '$student_email', '$student_password')";
            if(mysqli_query($conn, $sql)){
                header("Location: login-page.html");
                exit();
            }
            else{
                header("Location: sign-up.html?error=sql_error");
                exit();
            }
        }

    }
    else if($_POST['role']=='faculty'){
        $table = 'spms_faculty';

        $faculty_name = $_POST['faculty_full_name'];
        $faculty_id_Employee_code = $_POST['fac_id'];
        $faculty_email = $_POST['faculty_email'];
        $faculty_password = password_hash($_POST['faculty_password'], PASSWORD_BCRYPT);

        if(isUserExist($conn, $faculty_email, $table)){
            header("Location: sign-up.html?error=user_already_exists");
            exit();
        }
        else{
            $sql = "INSERT INTO $table (name, faculty_id_Employee_code, email, faculty_password) VALUES 
            ('$faculty_name', '$faculty_id_Employee_code', '$faculty_email', '$faculty_password')";
            if(mysqli_query($conn, $sql)){
                insertUserIds($conn);
                header("Location: login-page.html");

                exit();
            }
            else{
                header("Location: sign-up.html?error=sql_error");
                exit();
            }
        }

    }
    else if($_POST['role']=='parent'){
        $table = 'spms_parent';

        $parent_name = $_POST['parent_full_name'];
        $child_enrollment_id = $_POST['child_id'];
        $parent_email = $_POST['parent_email'];
        $parent_password = password_hash($_POST['parent_password'], PASSWORD_DEFAULT);

        if(isUserExist($conn, $parent_email, $table)){
            insertUserIds($conn);
            header("Location: sign-up.html?error=user_already_exists");
            exit();
        }
        else{
            $sql = "INSERT INTO $table (name, child_enrollment_id, email, parent_password) VALUES 
            ('$parent_name', '$child_enrollment_id', '$parent_email', '$parent_password')";
            if(mysqli_query($conn, $sql)){
                insertUserIds($conn);
                header("Location: login-page.html");
                exit();
            }
            else{
                header("Location: sign-up.html?error=sql_error");
                exit();
            }
        }
    }
    else{
        header("Location: sign-up.html?error=invalid_role");
        exit();
    }




