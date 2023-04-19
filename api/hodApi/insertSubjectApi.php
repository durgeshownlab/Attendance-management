<?php
    session_start();
    include "../../dbconnect/connect.php";

    $reg_no=$_POST['reg_no'];
    $regulation=$_POST['regulation'];
    $subject=$_POST['subject'];
    $course=$_SESSION['course'];
    $branch=$_SESSION['branch'];

    if($reg_no=='')
    {
        echo 0;
    }
    else if($regulation=='')
    {
        echo 0;
    }
    else if($subject=='')
    {
        echo 0;
    }
    else
    {
        $sql="select * from subject_table where faculty_reg_no='{$reg_no}' and course_name='{$course}' and regulation='{$regulation}' and branch='{$branch}' and subject='{$subject}'";

        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=0)
        {
            $row=mysqli_fetch_assoc($result);
            echo "can't add, record allready exist".$row['faculty_reg_no'];
        }
        else
        {
            $sql1="insert into subject_table (faculty_reg_no, course_name, regulation, branch, subject) values ('".$reg_no."', '".$course."', '".$regulation."', '".$branch."', '".$subject."');";

            $result=mysqli_query($conn, $sql1);
            if($result)
            {
                echo 1;
            }
            else
            {
                echo 2;
            }
        }
    }
?>