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

    $link="exportExcel.php?facultyId=".$_GET['facultyId']."&course=".$_GET['course']."&regulation=".$_GET['regulation']."&branch=".$_GET['branch']."&section=".$_GET['section']."&subject=".$_GET['subject']."&insertDate=".$_GET['insertDate'];

    $sql="select * from attendance_table where faculty_reg_no='".$_GET['facultyId']."' and course='".$_GET['course']."' and regulation='".$_GET['regulation']."' and branch='".$_GET['branch']."' and section='".$_GET['section']."' and subject='".$_GET['subject']."' and insert_time='".$_GET['insertDate']."'";

    $result=mysqli_query($conn, $sql);
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
            <td>".strtoupper($_SESSION['reg_no'])."</td>
            <td>".strtoupper($_SESSION['name'])."</td>
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
            
        $output .="</td>";
        $output.="<td>".$row[]."</td>
        </tr>
        ";

        $total++;
    }
    $output .="</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- google font api -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <style>
        :root
        {
            --primary-color: #183153;
            --grey-color: #e8e8e8fc;
        }
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;
        }

        .export-container
        {
            width: 100%;
            height: 50px;
            background-color: var(--grey-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .export-container a
        {
            width: auto;
            height: auto;
            padding: 10px 20px;
            background-color: var(--primary-color);
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            border: 2px solid var(--primary-color);
        }
        .export-container a:hover
        {
            background-color: #fff;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .table-container
        {
            width: 100%;
            height: auto;
            /* background-color: red; */
            display: flex;
            flex-direction: column;
            justify-content: left;
            overflow: auto;
            padding: 10px 10px;
        }

        .table-container table
        {
            width: 100%;
            height: auto;
            /* border: 1px solid #000; */
            /* background-color: green; */
        }

        .table-container table tr
        {
            width: auto;
            height: 50px;
            min-height: 50px;
        }

        .table-container table tr td
        {
            padding: 10px;
        }


        .table-container table tr:nth-child(even)
        {
            color: var(--primary-color);
        }

        .table-container table tr:nth-child(odd)
        {
            background-color: var(--grey-color);
            color: var(--primary-color);
        }

        .table-container table tr:first-child
        {
            background-color: var(--primary-color);
            color: #fff;
            border: 1px solid #fff;
        }

        table, td, tr, th
        {
            border: 1px solid var(--primary-color);
        }

        table tr:first-child th
        {
            border-right: 1px solid #fff;
        }

        table tr:first-child th:last-child
        {
            border-right: 1px solid var(--primary-color);
        }

        .count-container
        {
            width: 100%;
            height: auto;
            /* margin-top: 10px; */
            /* background-color: yellow; */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .present, .absent, .total
        {
            width: auto;
            min-height: 40px;
            display: flex;
            flex-direction: row;
            justify-content: left;
            align-items: center;
            padding-left: 10px;
        }

        .present p, .absent p, .total p
        {
            font-size: large;
            font-weight: 600;
            color: var(--primary-color);
        }

        .present span, .absent span, .total span
        {
            font-size: large;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="export-container">
        <a href="../index.php">Back</a>
        <a href=<?php echo $link; ?>>Export</a>
    </div>
    <div class="table-container">
        <?php if(isset($output)){echo $output;} ?>
    </div>
    <div class="count-container">
        <div class="total">
            <p>Total Student: &nbsp;</p>
            <span><?php echo $total ?></span>
        </div>
        <div class="present">
            <p>Present Student: &nbsp;</p>
            <span><?php echo $present ?></span>
        </div>
        <div class="absent">
            <p>Absent Student: &nbsp;</p>
            <span><?php echo $absent ?></span>
        </div>
    </div>
</body>
</html>
