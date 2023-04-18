<?php
    session_start();
    include "../../dbconnect/connect.php";

    $search=$_POST['search_data'];

    $sql="select * from attendance_status_table where (branch ='".$_SESSION['branch']."') and (faculty_reg_no like '%{$search}%' or course like '%{$search}%' or regulation like '%{$search}%' or branch like '%{$search}%' or section like '%{$search}%' or subject like '%{$search}%' or period like '%{$search}%' or insert_date = '{$search}') order by insert_date desc";
    $result=mysqli_query($conn, $sql);
    
    $output="";
    if(mysqli_num_rows($result)>0)
    {
        $output .="
        <div class=\"attendance-details-container\">
            <div class=\"date-title\">
                <p>Attendance</p>
            </div>
            <div class=\"attendance-details-card-container\">
        ";

        while($row=mysqli_fetch_assoc($result))
        {
            $link="../../api/viewAttendance.php?facultyId=".$row['faculty_reg_no']."&course=".$row['course']."&regulation=".$row['regulation']."&branch=".$row['branch']."&section=".$row['section']."&subject=".$row['subject']."&insertDate=".$row['insert_date'];

            $sql2="select name from faculty_table where reg_no = '{$row['faculty_reg_no']}'";
            $result2=mysqli_query($conn, $sql2);
            $row2=mysqli_fetch_assoc($result2);

            $output .="
            <div class=\"attendance-card\">
                
                <div class=\"card-item faculty-name-container\">
                    <p><span>Faculty Name :&nbsp;&nbsp;</span>".strtoupper($row2['name'])."</p>
                </div>
                <div class=\"card-item reg-no-container\">
                    <p><span>Reg no. :&nbsp;&nbsp;</span>".strtoupper($row['faculty_reg_no'])."</p>
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
                <div class=\"card-item period-container\">
                    <p><span>Period :&nbsp;&nbsp;</span>".strtoupper($row['period'])."</p>
                </div>
                <div class=\"card-item date-container\">
                    <p><span>Date :&nbsp;&nbsp;</span>".$row['insert_date']."</p>
                </div>
                <div class=\"card-item view-btn-container\">
                    <a href=".$link.">View</a>
                </div>
            </div>
            ";
        }

        $output .="
                </div>
            </div>
        ";

        
        
    }
    else
    {
        $output .='
        <div class="not-found-container">
            <div class="not-found">
                <h2>Search Not Found</h2>
            </div>
        </div>
        ';
    }

    echo $output;
?>