<?php
    session_start();
    include "../../dbconnect/connect.php";

    $search=$_POST['search_data'];
    $output='';

    $sql="select sno, reg_no, name, mobile_no, email, branch, profile_img from faculty_table where (branch ='".$_SESSION['branch']."' and user_type='faculty') and (reg_no like '%{$search}%' or name like '%{$search}%' or mobile_no like '%{$search}%' or email like '%{$search}%')";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0)
    {
        $output .='
        <div class="not-found-container">
            <div class="not-found">
                <h2>Search Not Found</h2>
            </div>
        </div>
        ';
    }
    else
    {
        $output='<div class="card-container">';
    
        while($row=mysqli_fetch_assoc($result))
        {
            $output .='
                <div class="card">
                    <div class="card-upper">
                        <div class="card-upper-left">
                            <div class="card-detail">
                                <span></span>'.strtoupper($row['reg_no']).'
                            </div>
                            <div class="card-detail">
                                <span></span>'.$row['name'].'
                            </div>
                            <div class="card-detail">
                                <span></span>'.$row['mobile_no'].'
                            </div>
                            <div class="card-detail">
                                <span></span>'.$row['email'].' 
                            </div>
                        </div>
                        <div class="card-upper-right">
                            <div class="card-profile-container">
                                <div class="card-profile">
                                    <img src="'.$row["profile_img"].'" alt="">
                                </div>
                            </div>
                            <div class="card-branch">
                                <span></span>'.$row['branch'].' 
                            </div>
                        </div>
                    </div>
                    <div class="card-lower">
                        <div class="update-btn-container">
                            <button class="update-btn" data-id="'.$row['sno'].'">update</button>                    
                        </div>
                        <div class="delete-btn-container">
                            <button class="delete-btn" data-id="'.$row['sno'].'">delete</button>                    
                        </div>
                    </div>
                </div>
            ';
        }
    
        $output .='</div>';
    
        $output .='
        <div class="add-faculty-btn-container"><div class="add-faculty-btn"><i class="fa-solid fa-user-plus"></i></div></div>';

    }


    echo $output;

?>