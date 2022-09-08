<?php
    // echo $_GET['facultyId'].'<br/>';
    // echo $_GET['course'].'<br/>';
    // echo $_GET['regulation'].'<br/>';
    // echo $_GET['branch'].'<br/>';
    // echo $_GET['section'].'<br/>';
    // echo $_GET['subject'].'<br/>';
    // echo $_GET['insertDate'].'<br/>';
    session_start();
    include "../dbconnect/connect.php";

    //$link="exportExcel.php?facultyId=".$_SESSION['reg_no']."&course=".$_GET['course']."&regulation=".$_GET['regulation']."&branch=".$_GET['branch']."&section=".$_GET['section']."&subject=".$_GET['subject']."&fromDAte=".$_GET['fromDate']."&toDate=".$_GET['toDate'];

    $sql="select * from students_details_table where course='".$_GET['course']."' and regulation='".$_GET['regulation']."' and branch='".$_GET['branch']."' and section='".$_GET['section']."'";
    // $sql="select * from attendance_table where faculty_reg_no='".$_SESSION['reg_no']."' and course='".$_GET['course']."' and regulation='".$_GET['regulation']."' and branch='".$_GET['branch']."' and section='".$_GET['section']."' and subject='".$_GET['subject']."' and insert_time>='".$_GET['fromDate']."' and insert_time<='".$_GET['toDate']."'";

    $studentDetails=mysqli_query($conn, $sql);
    $output="";
    $output .="
        <table cellpadding=5 border=1 cellspacing=0>
            <tr>
                <th>S.no</th>
                <th>Registration Id</th>
                <th>Student's Name</th>
                <th>Course</th>
                <th>Regulation</th>
                <th>Branch</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Total</th>
            </tr>
            ";
    $i=1;
    $totalStudent=0;
    while($row = mysqli_fetch_assoc($studentDetails))
    {
        $absent=0;
        $present=0;
        $total=0;
        $sql2="select * from attendance_table where faculty_reg_no='".$_SESSION['reg_no']."' and student_reg_no='".$row['reg_no']."' and course='".$_GET['course']."' and regulation='".$_GET['regulation']."' and branch='".$_GET['branch']."' and section='".$_GET['section']."' and subject='".$_GET['subject']."' and insert_time>='".$_GET['fromDate']."' and insert_time<='".$_GET['toDate']."'";

        $attendance=mysqli_query($conn, $sql2);
        while($col=mysqli_fetch_assoc($attendance))
        {
            if($col['attendance_status']==1)
            {
                $present++;
            }
            else if($col['attendance_status']==0)
            {
                $absent++;
            }
            $total++;
        }
        $output .="
        <tr>
            <td>".$i."</td>
            <td>".$row['reg_no']."</td>
            <td>".$row['name']."</td>
            <td>".$row['course']."</td>
            <td>".$row['regulation']."</td>
            <td>".$row['branch']."</td>
            <td>".$row['section']."</td>
            <td>".$_GET['subject']."</td>
            <td>".$present."</td>
            <td>".$absent."</td>
            <td>".$total."</td>
        </tr>
        ";

        $totalStudent++;
        $i++;
    }

    $output .="<tr></tr>
            <tr>
                <th>Total Student</th>
                <td>".$totalStudent."</td>
            </tr>
        ";

    $output .="</table>";

    $filename=$_GET['fromDate']."_to_".$_GET['toDate']."_".$_GET['regulation']."_".$_GET['branch']."_".$_GET['section']."_".$_GET['subject'].".xls";
    header("Content-Type: application/xls");
    header("Content-Disposition:attechment; filename=$filename");

    echo $output;
?>
