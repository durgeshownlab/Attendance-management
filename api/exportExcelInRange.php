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
    $output.="
        <table cellpadding=5 border=1 cellspacing=0>
        <tr>
            <th style=\"background-color: #183153; color: #fff;\">Faculty Id</th>
            <th style=\"background-color: #183153; color: #fff;\">Faculty Name</th>
            <th style=\"background-color: #183153; color: #fff;\">Course</th>
            <th style=\"background-color: #183153; color: #fff;\">Regulation</th>
            <th style=\"background-color: #183153; color: #fff;\">Branch</th>
            <th style=\"background-color: #183153; color: #fff;\">Section</th>
            <th style=\"background-color: #183153; color: #fff;\">Subject</th>
        </tr>
        <tr>
            <td>".strtoupper($_SESSION['reg_no'])."</td>
            <td>".strtoupper($_SESSION['name'])."</td>
            <td>".strtoupper($_GET['course'])."</td>
            <td>".strtoupper($_GET['regulation'])."</td>
            <td>".strtoupper($_GET['branch'])."</td>
            <td>".strtoupper($_GET['section'])."</td>
            <td>".strtoupper($_GET['subject'])."</td>
        </tr>
        <tr>
        </tr>
    ";
    $output .="
            <tr>
                <th style=\"background-color: #183153; color: #fff;\">S.no</th>
                <th style=\"background-color: #183153; color: #fff;\">Registration Id</th>
                <th style=\"background-color: #183153; color: #fff;\">Student's Name</th>
                <th style=\"background-color: #183153; color: #fff;\">Present</th>
                <th style=\"background-color: #183153; color: #fff;\">Total</th>
                <th style=\"background-color: #183153; color: #fff;\">Percentage</th>
            </tr>
            ";
    $i=1;
    $totalStudent=0;
    while($row = mysqli_fetch_assoc($studentDetails))
    {
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
            $total++;
        }
        $percentage=intval((($present/$total)*100));
        $output .="
        <tr";
        // if($percentage<75)
        // {
        //     $output.=" style=\"background-color: red; color: #fff;\"";
        // }
        $output.=">
            <td";
            if($percentage<75)
            {
                $output.=" style=\"background-color: red; color: #fff;\"";
            }
            $output.=">".$i."</td>

            <td";
            if($percentage<75)
            {
                $output.=" style=\"background-color: red; color: #fff;\"";
            }
            $output.=">".strtoupper($row['reg_no'])."</td>

            <td";
            if($percentage<75)
            {
                $output.=" style=\"background-color: red; color: #fff;\"";
            }
            $output.=">".ucwords($row['name'])."</td>
            
            <td";
            if($percentage<75)
            {
                $output.=" style=\"background-color: red; color: #fff;\"";
            }
            $output.=">".$present."</td>
            <td";
            if($percentage<75)
            {
                $output.=" style=\"background-color: red; color: #fff;\"";
            }
            $output.=">".$total."</td>
            <td";
            if($percentage<75)
            {
                $output.=" style=\"background-color: red; color: #fff;\"";
            }
            $output.=">".$percentage."%</td>
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
