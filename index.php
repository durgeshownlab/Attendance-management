<?php
session_start();
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
            <form action="api/login.php" method="POST" class="login-page">
                <div class="title-text">
                    <p>Login</p>
                </div>
                <div class="error">
                    <p><?php if(isset($_SESSION["error"])){echo $_SESSION["error"];} ?></p>
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
                        <button id="faculity-login" class="btn" name="faculity-login">Faculity</button>
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