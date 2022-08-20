<?php
    if(isset($_POST["faculity-login"]))
    {
        $username=$_POST["username"];
        $password=$_POST["password"];

        session_start();

        if($username==" ")
        {
            $_SESSION["error"]="username or password is invalid1";
            header('Location: ../index.php');
        }
        else if($password==" ")
        {
            $_SESSION["error"]="username or password is invalid2";
            header('Location: ../index.php');
        }
        else if(strlen($password)<8)
        {
            $_SESSION["error"]="username or password is invalid3";
            header('Location: ../index.php');
        }
        else
        {
            include "../dbconnect/connect.php";
            $sql="select * from faculity_table where mobile_no=$username and password=$password";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $_SESSION['mobile']=$row["mobile_no"];
            header('Location: ../userEnd/facultyView/faculty.php');
        }
        
        echo "$username"." "."$password";
    }
?>