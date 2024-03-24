<?php
require_once 'dbconnection.php';

// Function to check if a student already exists in the database
function isStudentExists($conn, $enrollment_no, $student_email, $student_personal_email, $student_phone_no) {
    $sql = "SELECT * FROM spms_student WHERE student_enrollment_number = '$enrollment_no'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=student_enrollment_exists");//enollment number already exists in database
        exit();
    }
    $sql = "SELECT * FROM spms_student WHERE OR student_email = '$student_email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=student_email_exists");// collage email already exists in database 
        exit();
    }

    $sql = "SELECT * FROM spms_student WHERE student_personal_email = '$student_personal_email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=student_personal_email_exists");// personal email already exists in database
        exit();
    }
    
    $sql = "SELECT * FROM spms_student WHERE student_phone_no = '$student_phone_no'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=student_phone_no_exists");// phone number already exists in database
        exit();
    }

    return ;
}

// Function to check if a faculty already exists in the database
function isFacultyExists($conn, $faculty_id, $faculty_email) {
    $sql = "SELECT * FROM spms_faculty WHERE faculty_id = '$faculty_id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=faculty_id_exists");//faculty id already exists in database
        exit();
    }
    $sql = "SELECT * FROM spms_faculty WHERE faculty_email = '$faculty_email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=faculty_email_exists");//faculty email already exists in database
        exit();
    }

    return;
}

// Function to check if a parent already exists in the database
function isParentExists($conn, $child_enrollment_no, $parent_email, $parent_phone_no) {
    $sql = "SELECT * FROM spms_parent WHERE child_enrollement_number = '$child_enrollment_no'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=child_enrollment_exists");//child enrollment number already exists in database
        exit();
    }
    $sql = "SELECT * FROM spms_parent WHERE parent_email = '$parent_email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=parent_email_exists");//parent email already exists in database
        exit();
    }
    $sql = "SELECT * FROM spms_parent WHERE parent_phone_number = '$parent_phone_no'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        header("Location: signup-page.html?error=parent_phone_no_exists");//parent phone number already exists in database
        exit();
    }

    return;
}

// Function to insert a new student record
function addStudent($conn, $student_name, $enrollment_no, $student_email, $student_personal_email, $student_phone_no, $student_password) {
    
    isStudentExists($conn, $enrollment_no, $student_email, $student_personal_email, $student_phone_no);
  
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
    
    isFacultyExists($conn, $faculty_id, $faculty_email);

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
    isParentExists($conn, $child_enrollment_no, $parent_email, $parent_phone_no);

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

// Main code block
if (isset($_REQUEST)) 
    {

        $email = $_REQUEST['email'];

        if (strpos($email, '@marwadiuniversity.ac.in') !== false)
        {

            $student_name = filter_var($_REQUEST['full_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $student_enrollment_no = filter_var($_REQUEST['enr_no'], FILTER_SANITIZE_NUMBER_INT);
            $student_email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
            $student_personal_email = filter_var($_REQUEST['personal_email'], FILTER_SANITIZE_EMAIL);
            $student_phone_no = filter_var($_REQUEST['phone_no'], FILTER_SANITIZE_NUMBER_INT);
            $student_password = $_REQUEST['password'];

            $result = addStudent($conn, $student_name, $enrollment_no, $student_email, $student_personal_email, $student_phone_no, $student_password);
        }

        elseif (strpos($email, '@marwadieducation.edu.in') !== false)
        {
            $parent_name = filter_var($_REQUEST['full_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $child_enrollment_no = filter_var($_REQUEST['child_id'], FILTER_SANITIZE_NUMBER_INT);
            $parent_email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
            $parent_phone_no = filter_var($_REQUEST['phone_no'], FILTER_SANITIZE_NUMBER_INT);
            $parent_password = $_REQUEST['password'];

            $result = addFaculty($conn, $faculty_name, $faculty_id, $faculty_email, $faculty_password);
        } 

        else
        {

            $faculty_name = filter_input($_REQUEST['full_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $faculty_id = filter_var($_REQUEST['fac_id'], FILTER_SANITIZE_NUMBER_INT);
            $faculty_email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
            $faculty_password = $_REQUEST['password'];

            $result = addParent($conn, $parent_name, $child_enrollment_no, $parent_email, $parent_phone_no, $parent_password);
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
