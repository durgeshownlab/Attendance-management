<?php
    session_start();
    include "../../dbconnect/connect.php";

    $name=$_POST['fname'];
    $email=$_POST['femail'];
    $reg_no=$_POST['freg_no'];
    $number=$_POST['fnumber'];
    $password=$_POST['fpassword'];
    $confirm_password=$_POST['fconfirm_password'];
    $id=$_POST['fid'];
    $branch=$_SESSION['branch'];

    // || !filter_var($email, FILTER_VALIDATE_EMAIL)

    if($name==''){
        echo 0;
    }
    else if($email==''){
        echo 0;
    }
    else if($reg_no==''){
        echo 0;
    }
    else if(strlen($reg_no)!=10){
        echo 0;
    }
    else if($number==''){
        echo 0;
    }
    else if(strlen($number)!=10){
        echo 0;
    }
    else if($password==''){
        echo 0;
    }
    else if(strlen($password)<8){    
        echo 0;
    }
    else if($confirm_password==''){
        echo 0;
    }
    else if($password!=$confirm_password){
        echo 0;
    }
    else{
        $sql="select * from faculty_table where sno <> {$id} and (reg_no='{$reg_no}' or email='{$email}' or mobile_no='{$number}')";
        // $sql="select * from faculty_table where reg_no='{$reg_no}' or email='{$email}' or number='{$number}'";
        // $sql="select * from faculty_table where sno != {$id} and (reg_no='{$reg_no}' or mobile_no='{$number}' or email='{$email}')";

        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!= 0)
        {
            $row=mysqli_fetch_assoc($result);
            echo "Sorry, record allready exist".$row['name'];
        }
        else
        {
            $sql1="update faculty_table set reg_no='{$reg_no}', name='{$name}', mobile_no='{$number}', email='{$email}', password='{$password}' where sno={$id} and branch='{$branch}'";

            $result1=mysqli_query($conn, $sql1);
            if($result1)
            {
                echo 1;
            }
            else
            {
                echo 2;
            }
        }
    }
?>