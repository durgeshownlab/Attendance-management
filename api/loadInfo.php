<?php
    session_start();
    include "../dbconnect/connect.php";

    // for course loading 
    if($_POST['type']=="course")
    {
        $sql="select * from course_table";
        $results=mysqli_query($conn, $sql) or die("query unsuccessful");
        $output = "";
    
        while($row=mysqli_fetch_assoc($results))
        {
            $output .= "<option value='{$row['course_name']}'>".strtoupper($row['course_name'])."</option>";
        }
    }

    // for regulation loading 
    else if($_POST['type']=="regulation")
    {
        $sql="select * from regulation_table where course_name='".$_POST['course']."'";
        $results=mysqli_query($conn, $sql) or die("query unsuccessful");
        $output = "<option value=\"\">--select regulation--</option>";
    
        while($row=mysqli_fetch_assoc($results))
        {
            $output .= "<option value='{$row['regulation']}'>".strtoupper($row['regulation'])."</option>";
        }
    }

    // for branch loading 
    else if($_POST['type']=="branch")
    {
        $sql="select * from branch_table where course_name='".$_POST['course']."' and regulation='".$_POST['regulation']."'";
        $results=mysqli_query($conn, $sql) or die("query unsuccessful");
        $output = "<option value=\"\">--Select Branch--</option>";
    
        while($row=mysqli_fetch_assoc($results))
        {
            $output .= "<option value='{$row['branch']}'>".strtoupper($row['branch'])."</option>";
        }
    }

    //for section loading 

    else if($_POST['type']=="section")
    {
        $sql="select * from section_table where course_name='".$_POST['course']."' and regulation='".$_POST['regulation']."' and branch='".$_POST['branch']."'";
        $results=mysqli_query($conn, $sql) or die("query unsuccessful");
        $output = "<option value=\"\">--Select Section--</option>";
    
        while($row=mysqli_fetch_assoc($results))
        {
            $output .= "<option value='{$row['section']}'>".strtoupper($row['section'])."</option>";
        }
    }

    //for subject loading 

    else if($_POST['type']=="subject")
    {
        $sql="select * from subject_table where course_name='".$_POST['course']."' and regulation='".$_POST['regulation']."' and branch='".$_POST['branch']."' and faculty_reg_no='".$_SESSION['reg_no']."'";
        $results=mysqli_query($conn, $sql) or die("query unsuccessful");
        $output = "<option value=\"\">--Select Subject--</option>";
    
        while($row=mysqli_fetch_assoc($results))
        {
            $output .= "<option value='{$row['subject']}'>".strtoupper($row['subject'])."</option>";
        }
    }

    echo $output;
?>