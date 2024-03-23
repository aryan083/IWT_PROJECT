<?php
require_once 'dbconnection.php';

// Function to check if a student already exists in the database
function isStudentExists($conn, $enrollment_no, $student_email, $student_personal_email, $student_phone_no) {
    $sql = "SELECT * FROM spms_student WHERE student_enrollment_number = '$enrollment_no' OR student_email = '$student_email' OR student_personal_email = '$student_personal_email' OR student_phone_no = '$student_phone_no'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

// Function to check if a faculty already exists in the database
function isFacultyExists($conn, $faculty_id, $faculty_email) {
    $sql = "SELECT * FROM spms_faculty WHERE faculty_id = '$faculty_id' OR faculty_email = '$faculty_email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

// Function to check if a parent already exists in the database
function isParentExists($conn, $child_enrollment_no, $parent_email, $parent_phone_no) {
    $sql = "SELECT * FROM spms_parent WHERE child_enrollement_number = '$child_enrollment_no' OR parent_email = '$parent_email' OR parent_phone_number = '$parent_phone_no'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

// Function to insert a new student record
function addStudent($conn, $student_name, $enrollment_no, $student_email, $student_personal_email, $student_phone_no, $student_password) {
    if (isStudentExists($conn, $enrollment_no, $student_email, $student_personal_email, $student_phone_no)) {
        return false; // Entry already exists
    }

    // Insert new record
    $hashedpassword = password_hash($student_password, PASSWORD_DEFAULT);
    $student_signup = date("Y-m-d H:i:s");

    $sql = "INSERT INTO spms_student
            (student_name, student_enrollment_number,
            student_email, student_personal_email,
            student_phone_no, student_password,
            student_sign_up)
            VALUES
            ('$student_name', '$enrollment_no',
            '$student_email', '$student_personal_email',
            '$student_phone_no', '$hashedpassword',
            '$student_signup')";

    return mysqli_query($conn, $sql);
}

// Function to insert a new faculty record
function addFaculty($conn, $faculty_name, $faculty_id, $faculty_email, $faculty_password) {
    if (isFacultyExists($conn, $faculty_id, $faculty_email)) {
        return false; // Entry already exists
    }

    // Insert new record
    $hashedpassword = password_hash($faculty_password, PASSWORD_DEFAULT);
    $faculty_signup = date("Y-m-d H:i:s");

    $sql = "INSERT INTO spms_faculty
            (faculty_name, faculty_id,
            faculty_email, faculty_password,
            faculty_sign_up)
            VALUES
            ('$faculty_name', '$faculty_id',
            '$faculty_email', '$hashedpassword',
            '$faculty_signup')";

    return mysqli_query($conn, $sql);
}

// Function to insert a new parent record
function addParent($conn, $parent_name, $child_enrollment_no, $parent_email, $parent_phone_no, $parent_password) {
    if (isParentExists($conn, $child_enrollment_no, $parent_email, $parent_phone_no)) {
        return false; // Entry already exists
    }

    // Insert new record
    $hashedpassword = password_hash($parent_password, PASSWORD_DEFAULT);
    $parent_signup = date("Y-m-d H:i:s");

    $sql = "INSERT INTO spms_parent
            (parent_name, child_enrollement_number,
            parent_email, parent_phone_number, parent_password,
            parent_sign_up)
            VALUES
            ('$parent_name', '$child_enrollment_no',
            '$parent_email', '$parent_phone_no', '$hashedpassword',
            '$parent_signup')";

    return mysqli_query($conn, $sql);
}

// Main code execution
if ($_REQUEST) 
    {

        $email = $_REQUEST['email'];

        if (strpos($email, '@marwadiuniversity.ac.in') !== false)
        {
            $result = addStudent($conn, $_REQUEST['student_name'], $_REQUEST['enr_no'], $_REQUEST['email'], $_REQUEST['personal_email'], $_REQUEST['phone_no'], $_REQUEST['password']);
        } 
        elseif (strpos($email, '@marwadieducation.edu.in') !== false) 
        {
            $result = addFaculty($conn, $_REQUEST['full_name'], $_REQUEST['fac_id'], $_REQUEST['email'], $_REQUEST['password']);
        }
         else 
        {
            $result = addParent($conn, $_REQUEST['full_name'], $_REQUEST['child_id'], $_REQUEST['email'], $_REQUEST['phone_no'], $_REQUEST['password']);
        }

            if ($result) 
            {
                echo "New record created successfully";
            }
            else 
            {
                echo "Error: Unable to create record";
            }
}
