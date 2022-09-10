<?php
    include "../dbconnect/connect.php";

    // $output="<option value=\"1\">".$_POST['course']."</option>";
    // $output.="<option value=\"1\">".$_POST['regulation']."</option>";
    // $output.="<option value=\"1\">".$_POST['branch']."</option>";
    // echo $output;

    $output="";
    $sql="select * from attendance_status_table where course='".$_POST['course']."' and regulation='".$_POST['regulation']."' and branch='".$_POST['branch']."' and section='".$_POST['section']."' and insert_date=CURDATE() order by period asc";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)<1)
    {
        $output.="<option value=\"1\">Period 1</option>";
    }
    else
    {
        $p=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $p=$row['period'];
        }

        $output.="<option value=\"".($p+1)."\">Period ".($p+1)."</option>";
    }

    echo $output;
?>