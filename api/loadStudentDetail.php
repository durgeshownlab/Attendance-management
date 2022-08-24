<?php
    include "../dbconnect/connect.php";
    
    $sql="select * from students_details_table where course='".$_POST['course']."' and regulation='".$_POST['regulation']."' and branch='".$_POST['branch']."' and section='".$_POST['section']."'";

    $output='';

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $output .="<div class=\"students-details\">
                        <div class=\"registration-no\">
                            <p>".strtoupper($row['reg_no'])."</p>
                        </div>
                        <div class=\"absent-present-box\">
                            <input type=\"checkbox\">
                        </div>
                    </div>";
        }
    }

    echo $output;
?>