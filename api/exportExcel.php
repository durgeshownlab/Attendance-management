<?php

    include "../dbconnect/connect.php";

    $sql="select * from attendance_table where faculty_reg_no='".$_GET['facultyId']."' and course='".$_GET['course']."' and regulation='".$_GET['regulation']."' and branch='".$_GET['branch']."' and section='".$_GET['section']."' and subject='".$_GET['subject']."' and insert_time='".$_GET['insertDate']."'";

    $result=mysqli_query($conn, $sql);
    
    $output="
        <table border=1>
            <tr>
                <th>S.no</th>
                <th>Registration Id</th>
                <th>Attendance Status</th>
                <th>Course</th>
                <th>Regulation</th>
                <th>Branch</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Date</th>
            </tr>";
    $i=1;
    $absent=0;
    $present=0;
    $total=0;
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['attendance_status']==1)
        {
            $present++;
        }
        else
        {
            $absent++;
        }
        $output .="
        <tr>
            <td>".$i++."</td>
            <td>".$row['student_reg_no']."</td>
            <td>";
        
        if($row['attendance_status']==1)
        {
            $output .="P";
        }
        else
        {
            $output .="A";
        }

        $output .="</td>
            <td>".$row['course']."</td>
            <td>".$row['regulation']."</td>
            <td>".$row['branch']."</td>
            <td>".$row['section']."</td>
            <td>".$row['subject']."</td>
            <td>".$row['insert_time']."</td>
        </tr>";

        $total++;
    }

    $output .="<tr></tr>
            <tr>
                <th>Total Student</th>
                <td>".$total."</td>
            </tr>
            <tr>
                <th>No. of Present</th>
                <td>".$present."</td>
            </tr>
            <tr>
                <th>No. of Absent</th>
                <td>".$absent."</td>
            </tr>
        ";
    $output .="</table>";

    $filename=$_GET['insertDate']."_".$_GET['regulation']."_".$_GET['branch']."_".$_GET['section']."_".$_GET['subject'].".xls";
    header("Content-Type: application/xls");
    header("Content-Disposition:attechment; filename=$filename");
    
    echo $output;
?>