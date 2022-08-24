<?php
session_start();

if(isset($_POST["faculty-login"]))
    {
        $username=$_POST["username"];
        $password=$_POST["password"];
        $error=false;
        if($username=="")
        {
            $error=true;
            // header('Location: index.php');
        }
        else if($password=="")
        {
            $error=true;
            // header('Location: index.php');
        }
        else if(strlen($password)<8)
        {
            $error=true;
            // header('Location: index.php');
        }
        else
        {
            include "dbconnect/connect.php";
            $sql="select * from faculty_table where mobile_no='$username' and password='$password'";
            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==1)
            {
                $row=mysqli_fetch_assoc($result);
                $_SESSION['sno']=$row["sno"];
                $_SESSION['reg_no']=$row["reg_no"];
                $_SESSION['name']=$row["name"];
                $_SESSION['mobile_no']=$row["mobile_no"];
                $_SESSION['email']=$row["email"];
                $_SESSION['branch']=$row["branch"];
                header('Location: userEnd/facultyView/faculty.php');
            }
            else
            {
                $error=true;
                // header('Location: index.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>

    <!-- google font api -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- indexstyle.css -->
    <link rel="stylesheet" type="text/css" href="./style/indexStyle.css" />

<body>
    <div class="container">
        <div class="subcontainer">
            <form action="" method="POST" class="login-page">
                <div class="title-text">
                    <p>Login</p>
                </div>
                <div class="error">
                    <?php if(isset($error) && $error){echo '<p style="color: red;">Invalid username or password</p>';}?>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Username" id="username" name="username">
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" minlength="8" maxlength="20" id="password" name="password">
                </div>

                <div class="login-btn-contanier">
                    <div class="login-as">
                        <p>Login as</p>
                    </div>
                    <div class="login-btn">
                        <button id="faculty-login" class="btn" name="faculty-login">Faculity</button>
                    </div>
                    <div class="login-btn">
                        <button id="Hod-login" class="btn" name="hod-login">HOD</button>
                    </div>
                    <div class="login-btn">
                        <button id="Departement-login" class="btn" name="Department-login">Department</button>
                    </div>
                    <div class="login-btn">
                        <button id="student-login" class="btn" name="student-login"> Student</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>