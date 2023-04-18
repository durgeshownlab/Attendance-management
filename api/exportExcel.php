<?php
    session_start();
    include "../dbconnect/connect.php";

    $sql="select * from attendance_table where faculty_reg_no='".$_GET['facultyId']."' and course='".$_GET['course']."' and regulation='".$_GET['regulation']."' and branch='".$_GET['branch']."' and section='".$_GET['section']."' and subject='".$_GET['subject']."' and insert_time='".$_GET['insertDate']."'";

    $result=mysqli_query($conn, $sql);

    $sql2="select reg_no, name from faculty_table where reg_no='".$_GET['facultyId']."'";
    $result2=mysqli_query($conn, $sql2);
    $row1=mysqli_fetch_assoc($result2);

    $output="";
    $output.="
        <table cellpadding=5 border=1 cellspacing=0>
        <tr>
            <th>Faculty Id</th>
            <th>Faculty Name</th>
            <th>Course</th>
            <th>Regulation</th>
            <th>Branch</th>
            <th>Section</th>
            <th>Subject</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>".strtoupper($row1['reg_no'])."</td>
            <td>".strtoupper($row1['name'])."</td>
            <td>".strtoupper($_GET['course'])."</td>
            <td>".strtoupper($_GET['regulation'])."</td>
            <td>".strtoupper($_GET['branch'])."</td>
            <td>".strtoupper($_GET['section'])."</td>
            <td>".strtoupper($_GET['subject'])."</td>
            <td>".strtoupper($_GET['insertDate'])."</td>
        </tr>
        <tr>
        </tr>

    ";
    $output .="
            <tr>
                <th>S.no</th>
                <th>Registration Id</th>
                <th>Student's Name</th>
                <th>Attendance Status</th>
            </tr>
            ";
    $i=1;
    $absent=0;
    $present=0;
    $total=0;
    while($row = mysqli_fetch_assoc($result))
    {
        // echo $row['student_reg_no'];
        // echo $row['attendance_status'];
        // echo $row['subject'];
        // echo $row['branch'];
        // echo $row['section'];
        // echo $row['insert_time']."<br/>";

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
            <td>".$row['student_reg_no']."</td>";

        $sql1="select name from students_details_table where reg_no='".$row['student_reg_no']."'";
        $result1=mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1)==1)
        {
            $row1=mysqli_fetch_assoc($result1);
    
            $output.="<td>".$row1["name"]."</td>";
        }

        $output .="<td>";
        
        if($row['attendance_status']==1)
        {
           $output .="P";
        }
        else
        {
            $output .="A";
        }
            
        $output .="</td>
        </tr>";

        $total++;
    }

    $output .="<tr></tr>
    <tr><td>total students </td><td>";
    $output .=$total."</td></tr>";

    $output .="<tr><td>Present</td><td>";
    $output .=$present."</td></tr>";

    $output .="<tr><td>Absent </td><td>";
    $output .=$absent."</td></tr>";

    $output .="</table>";

    $filename=$_GET['insertDate']."_".$_GET['regulation']."_".$_GET['branch']."_".$_GET['section']."_".$_GET['subject'].".xls";
    header("Content-Type: application/xls");
    header("Content-Disposition:attechment; filename=$filename");
    
    echo $output;
?>