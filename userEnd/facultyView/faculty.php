<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- faculty.css added-->

    <link rel="stylesheet" href="../../style/faculty.css">

    <!-- font awosome cdn -->
    <script src="https://kit.fontawesome.com/4b1e45d229.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="main-container">

        <!-- nav container -->
        <div class="nav-container">
            <div class="navbar">
                <div class="logo-container">
                    <div class="logo">
                        <img src="../../img/logo.png">
                    </div>
                </div>
                
                <div class="login-profile-container">
                    <div class="login-cotainer">
                        <div class="login">
                            <button>Login</button>
                        </div>
                    </div>
                    <div class="profile-container">
                        <div class="profile">
                            <button class="profile-icon" onclick="profileToggle()">
                                <i class="fa-solid fa-user"></i>
                            </button>

                            <div class="profile-option-container">
                                <div class="profile-option">
                                    <div class="profile-btn">
                                        <button>Profile</button>
                                    </div>
                                    <div class="logout">
                                        <button>Logout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- code for content container -->
        <div class="content-container">

        </div>
    </div>

    <script>
        function profileToggle()
        {
            let profile=document.querySelector(".profile-option-container");
            if(profile.style.display=="flex")
            {
                profile.style.display="none";
                console.log("profile hide");
            }
            else
            {
                profile.style.display="flex";
                console.log("profile sshow");
            }
        }
    </script>
</body>
</html>