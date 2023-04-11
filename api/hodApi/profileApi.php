<?php
    session_start();
    include "../../dbconnect/connect.php";

    $output ='';
    $sql = "select reg_no, name, mobile_no, email, branch, user_type, profile_img from faculty_table where sno={$_SESSION['sno']} and  reg_no='{$_SESSION['reg_no']}' and mobile_no='{$_SESSION['mobile_no']}' and branch='{$_SESSION['branch']}'";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);
        $output .='
        <div class="profile-tab-container">
                <div class="profile-data">
                    <span>Name :&nbsp </span>'.$row['name'].'
                </div>
                <div class="profile-data">
                    <span>Reg no. :&nbsp </span>'.strtoupper($row['reg_no']).'
                </div>
                <div class="profile-data">
                    <span>Mobile :&nbsp </span>'.$row['mobile_no'].'
                </div>
                <div class="profile-data">
                    <span>Email :&nbsp </span>'.$row['email'].'
                </div>
                <div class="profile-data">
                    <span>Branch :&nbsp </span>'.strtoupper($row['branch']).'
                </div>
                <div class="profile-data">
                    <span>User type :&nbsp </span>'.strtoupper($row['user_type']).'
                </div>
        </div>';
    }

    echo $output;
?>