<?php
    session_start();
    include "../dbconnect/connect.php";

    $sqlSubjectNo="select * from subject_table where faculty_reg_no='".$_SESSION['reg_no']."'";
    $resultSubjectNo=mysqli_query($conn, $sqlSubjectNo);
    $noOfSubject=mysqli_num_rows($resultSubjectNo);
    
    if(!isset($_POST['fromDate']) && !isset($_POST['toDate']))
    {
        $output="";
        $output .="
        <div class=\"date-title\">
            <p>Today's Attendance</p>
        </div>
        <div class=\"attendance-details-card-container\">
        ";

        $sql="select * from attendance_status_table where faculty_reg_no='".$_SESSION['reg_no']."' and insert_date=CURDATE()";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $link="../../api/viewAttendance.php?facultyId=".$_SESSION['reg_no']."&course=".$row['course']."&regulation=".$row['regulation']."&branch=".$row['branch']."&section=".$row['section']."&subject=".$row['subject']."&insertDate=".$row['insert_date'];
            $output .="
            <div class=\"attendance-card\">
                <div class=\"card-item date-container\">
                    <p><span>Date :&nbsp;&nbsp;</span>".$row['insert_date']."</p>
                </div>
                <div class=\"card-item course-container\">
                    <p><span>Course :&nbsp;&nbsp;</span>".strtoupper($row['course'])."</p>
                </div>
                <div class=\"card-item regulation-container\">
                    <p><span>Regulation :&nbsp;&nbsp;</span>".strtoupper($row['regulation'])."</p>
                </div>
                <div class=\"card-item branch-container\">
                    <p><span>Branch :&nbsp;&nbsp;</span>".strtoupper($row['branch'])."</p>
                </div>
                <div class=\"card-item section-container\">
                    <p><span>Section :&nbsp;&nbsp;</span>".strtoupper($row['section'])."</p>
                </div>
                <div class=\"card-item subject-container\">
                    <p><span>Subject :&nbsp;&nbsp;</span>".strtoupper($row['subject'])."</p>
                </div>
                <div class=\"card-item view-btn-container\">
                    <a href=".$link.">View</a>
                </div>
            </div>
            ";
        }

        $output .="
            </div>
        ";

        echo $output;
        
    }
    else
    {
        

    }
?>