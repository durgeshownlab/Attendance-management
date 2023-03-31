<?php
    session_start();
    include "../../dbconnect/connect.php";

    $name=$_POST['fname'];
    $email=$_POST['femail'];
    $reg_no=$_POST['freg_no'];
    $number=$_POST['fnumber'];
    $password=$_POST['fpassword'];
    $confirm_password=$_POST['fconfirm_password'];
    $branch=$_SESSION['branch'];
    $user_type='faculty';

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
        $sql="select * from faculty_table where reg_no='{$reg_no}' or mobile_no='{$number}' or email='{$email}'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=0)
        {
            $row=mysqli_fetch_assoc($result);
            echo "can't add, record allready exist".$row['name'];
        }
        else
        {
            $sql1="insert into faculty_table (reg_no, name, mobile_no, email, password, branch, user_type) values ('".$reg_no."', '".$name."', '".$number."', '".$email."', '".$password."', '".$branch."', '".$user_type."');";

            $result=mysqli_query($conn, $sql1);
            if($result)
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