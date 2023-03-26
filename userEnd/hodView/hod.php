<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD | Dashboard</title>

     <!-- google font api -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- hod.css added-->

    <link rel="stylesheet" href="../../style/hod.css">

    <!-- font awosome cdn -->
    <script src="https://kit.fontawesome.com/4b1e45d229.js" crossorigin="anonymous"></script>

    <!-- jquery ui css -->
    <link rel="stylesheet" href="../../style/jquery-ui.min.css">
</head>
<body>
    <div class="container">
        <div class="left-container">
            <div class="left">
                <div class="logo">
                    <img src="../../img/logo.png" alt="">
                </div>
                <div class="menu-container">
                    <div class="menu active">
                        <span><i class="fa-solid fa-house"></i></span> home 
                    </div>
                    <div class="menu">
                        <span><i class="fa-solid fa-user-group"></i></span>faculty 
                    </div>
                    <div class="menu">
                        <span><i class="fa-solid fa-user"></i></span>profile 
                    </div>
                    <div class="menu">
                        <span><i class="fa-solid fa-address-card"></i></span>attendence 
                    </div>
                    <div class="menu">
                        <span><i class="fa-solid fa-user-shield"></i></span>auth 
                    </div>
                    <div class="menu">
                        <span><i class="fa-solid fa-chart-line"></i></span>analytics 
                    </div>
                </div>
            </div>
        </div>

        <!-- right container coide  -->
        <div class="right-container">
            <div class="header">
                <div class="left-header">
                    <form class="search">
                        <input type="search" placeholder="search">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="right-header">
                    <div class="notification-container">
                        <div class="notification">
                            <span></span>
                            <i class="fa-solid fa-bell"></i>
                        </div>
                    </div>
                    <div class="department-name">
                        <span>CSE</span>
                    </div>
                    <div class="profile-container">
                        <div class="profile">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ajax code  -->
    <script src="../../javascript/jquery.js"></script>
    <!-- jquery ui js -->
    <script src="../../javascript/jquery-ui.min.js"></script>


</body>
</html>