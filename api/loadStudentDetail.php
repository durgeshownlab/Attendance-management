<?php
session_start();
    include "../dbconnect/connect.php";

    $checkSql="SELECT * FROM attendance_table WHERE faculty_reg_no='".$_SESSION['reg_no']."' and course='".$_POST['course']."' and regulation='".$_POST['regulation']."' and branch='".$_POST['branch']."' and section='".$_POST['section']."' and subject='".$_POST['subject']."' and insert_time=CURDATE()";

    $checkResult=mysqli_query($conn,$checkSql) or die("query unsuccessfull");
    if(mysqli_num_rows($checkResult)>0)
    {
        $output="already taken";
    }
    else
    {
        $sql="select * from students_details_table where course='".$_POST['course']."' and regulation='".$_POST['regulation']."' and branch='".$_POST['branch']."' and section='".$_POST['section']."'";
    
        $output='';
    
        $result=mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result)>0)
        {
            $_SESSION['no_of_student']=mysqli_num_rows($result);
    
            // creating session for take student reference
            $_SESSION['take_attendance_course']=$_POST['course'];
            $_SESSION['take_attendance_branch']=$_POST['branch'];
            $_SESSION['take_attendance_regulation']=$_POST['regulation'];
            $_SESSION['take_attendance_section']=$_POST['section'];
            $_SESSION['take_attendance_subject']=$_POST['subject'];
            $_SESSION['take_attendance_period']=$_POST['period'];
    
    
            $count =1;
            while($row=mysqli_fetch_assoc($result))
            {
                $output .="<div class=\"students-details\" id=\"students-details-{$count}\">
                            <div class=\"registration-no\">
                                <label name=\"registration-no-{$count}\">".strtoupper($row['reg_no'])."</label>
                                <input type=\"text\" name=\"registration-no-{$count}\" id=\"registration-no-{$count}\" value=\"{$row['reg_no']}\" hidden>
                            </div>
                            <div class=\"absent-present-box\">
                                <input type=\"checkbox\" id=\"absent-present-{$count}\" name=\"absent-present-{$count}\" value=\"1\">
                            </div>
                        </div>";
    
                $count=$count+1;
            }
        }
    }

    echo $output;
?>