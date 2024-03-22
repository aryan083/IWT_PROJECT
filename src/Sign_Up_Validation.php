<?
require_once 'dbconnection.php';
{

    if($_REQUEST)
        {
            $email=$_REQUEST['email'];

            if(strpos($email, '@marwadiuniversity.ac.in') == true)//if email is of student
            {
               //student table is to be updated
                $student_name=$_REQUEST['student_name'];
                $enrollment_no=$_REQUEST['enr_no'];
                $student_email=$_REQUEST['email'];
                $student_password=$_REQUEST['password'];
                $hashedpassword= password_hash($student_password, PASSWORD_DEFAULT);
                $student_signup = date("d-m-Y h:i:sa");

                $sql = "INSERT INTO student
                (student_name, snrollment_no ,
                student_email , student_password,
                student_signUp)
                VALUES
                ('$student_name', '$enrollment_no',
                '$student_email', '$hashedpassword',
                '$student_signup'
                )";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }
        
            else if(strpos($email, '@marwadieducation.edu.in') == true)//if email is of faculty
            {
                //faculty table is to be updated
                $faculty_name=$_REQUEST['full_name'];
                $faculty_id=$_REQUEST['fac_id'];
                $faculty_email=$_REQUEST['email'];
                $faculty_password=$_REQUEST['password'];
                $hashedpassword= password_hash($faculty_password, PASSWORD_DEFAULT);
                $faculty_signup = date("d-m-Y h:i:sa");

                $sql = "INSERT INTO faculty
                (faculty_name, faculty_id ,
                faculty_email , faculty_password,
                faculty_signUp)
                VALUES
                ('$faculty_name', '$faculty_id',
                '$faculty_email', '$hashedpassword',
                '$faculty_signup'
                )";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            

            }

            else //if email is of Parent
            {
                //parent table is to be updated
                $parent_name=$_REQUEST['full_name'];
                $child_enrollment_no=$_REQUEST['child_id'];
                $parent_email=$_REQUEST['email'];
                $parent_password=$_REQUEST['password'];
                $hashedpassword= password_hash($parent_password, PASSWORD_DEFAULT);
                $parent_signup = date("d-m-Y h:i:sa");

                $sql = "INSERT INTO parent
                (parent_name, child_enrollment_no ,
                parent_email , parent_password,
                parent_signUp)
                VALUES
                ('$parent_name', '$child_enrollment_no',
                '$parent_email', '$hashedpassword',
                '$parent_signup'
                )";


                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }
            

        }
}