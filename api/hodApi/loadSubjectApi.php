<?php
    session_start();
    include "../../dbconnect/connect.php";

    $sql="select * from subject_table where branch ='".$_SESSION['branch']."'";
    $result=mysqli_query($conn, $sql);

    $output='';
    
    if(mysqli_num_rows($result)==0)
    {
        $output .='
        <div class="not-found-container">
            <div class="not-found">
                <h2>No Subject Exist</h2>
            </div>
        </div>
        ';
    }
    else
    {
        $output .='<div class="card-container">';
    
        while($row=mysqli_fetch_assoc($result))
        {
            $sql2="select name from faculty_table where reg_no='{$row['faculty_reg_no']}'";
            $result2=mysqli_query($conn, $sql2);
            $row2=mysqli_fetch_assoc($result2);
            $output .='
                <div class="card">
                    <div class="card-upper">
                        <div class="card-upper-left">
                            <div class="card-detail">
                                <span></span>'.strtoupper($row2['name']).'
                            </div>
                            <div class="card-detail">
                                <span></span>'.strtoupper($row['faculty_reg_no']).'
                            </div>
                            <div class="card-detail">
                                <span></span>'.$row['regulation'].'
                            </div>
                            <div class="card-detail">
                                <span></span>'.strtoupper($row['branch']).'
                            </div>
                            <div class="card-detail">
                                <span></span>'.$row['subject'].' 
                            </div>
                        </div>
                    </div>
                    <div class="card-lower">
                        <div class="update-btn-container">
                            <button class="update-subject-btn" data-id="'.$row['subject_id'].'">update</button>                    
                        </div>
                        <div class="delete-btn-container">
                            <button class="delete-subject-btn" data-id="'.$row['subject_id'].'">delete</button>                    
                        </div>
                    </div>
                </div>
            ';
        }
    
        $output .='</div>';
    
        $output .='
        <div class="add-subject-btn-container"><div class="add-subject-btn"><i class="fa-solid fa-book-medical"></i></div></div>';
    }

    echo $output;
?>