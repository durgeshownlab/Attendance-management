<?php
    session_start();
    include '../dbconnect/connect.php';
    for ($i=1; $i <=$_SESSION['no_of_student']; $i++)
    { 
        if(isset($_POST['absent-present-'.$i]))
        {
            $sql="insert into attendance_table (student_reg_no, faculty_reg_no, attendance_status, course, regulation, branch, section, subject, insert_time) values('".$_POST['registration-no-'.$i]."', '".$_SESSION['reg_no']."', 1, '".$_SESSION['take_attendance_course']."', '".$_SESSION['take_attendance_regulation']."','".$_SESSION['take_attendance_branch']."','".$_SESSION['take_attendance_section']."','".$_SESSION['take_attendance_subject']."',CURDATE())";

            $result=mysqli_query($conn,$sql) or die("query failed");
            
        }
        else
        {
            $sql="insert into attendance_table (student_reg_no, faculty_reg_no, attendance_status, course, regulation, branch, section, subject, insert_time) values('".$_POST['registration-no-'.$i]."', '".$_SESSION['reg_no']."', 0, '".$_SESSION['take_attendance_course']."', '".$_SESSION['take_attendance_regulation']."','".$_SESSION['take_attendance_branch']."','".$_SESSION['take_attendance_section']."','".$_SESSION['take_attendance_subject']."',CURDATE())";

            $result=mysqli_query($conn,$sql) or die("query failed");

        }
    }

    $sql="insert into attendance_status_table (faculty_reg_no, course, regulation, branch, section, subject, period, insert_date) values('".$_SESSION['reg_no']."', '".$_SESSION['take_attendance_course']."', '".$_SESSION['take_attendance_regulation']."','".$_SESSION['take_attendance_branch']."','".$_SESSION['take_attendance_section']."','".$_SESSION['take_attendance_subject']."',".$_SESSION['take_attendance_period'].", CURDATE())";

    $result=mysqli_query($conn, $sql);
    

    $_SESSION['data_inserted']=true;
    mysqli_close($conn);

    header('Location: ../userEnd/facultyView/faculty.php');
?>