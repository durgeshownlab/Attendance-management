<?php
    session_start();
    include '../dbconnect/connect.php';
    for ($i=1; $i <=$_SESSION['no_of_student']; $i++)
    { 
        if(isset($_POST['absent-present-'.$i]))
        {
            // echo $_POST['absent-present-'.$i];
            // printf("\n");
            $sql="insert into attendance_table (student_reg_no, faculty_reg_no, attendance_status, course, regulation, branch, section, subject) values('".$_POST['registration-no-'.$i]."', '".$_SESSION['reg_no']."', 1, '".$_SESSION['take_attendance_course']."', '".$_SESSION['take_attendance_regulation']."','".$_SESSION['take_attendance_branch']."','".$_SESSION['take_attendance_section']."','flat')";

            $result=mysqli_query($conn,$sql);
            
        }
        else
        {
            // echo "0";
            // printf("\n");
            $sql="insert into attendance_table (student_reg_no, faculty_reg_no, attendance_status, course, regulation, branch, section, subject) values('".$_POST['registration-no-'.$i]."', '".$_SESSION['reg_no']."', 0, '".$_SESSION['take_attendance_course']."', '".$_SESSION['take_attendance_regulation']."','".$_SESSION['take_attendance_branch']."','".$_SESSION['take_attendance_section']."','dsa')";

            $result=mysqli_query($conn,$sql);

        }
    }
    mysqli_close($conn);

    // echo "<script>alert('data inserrted successfully');</script>";

    header('Location: ../userEnd/facultyView/faculty.php');

    // echo implode($_POST);
?>