<?php
session_start();

if(!isset($_SESSION['mobile_no']))
{
    header('Location: ../../index.php');
}

if(isset($_POST["logout-btn"]))
{
    header('Location: ../../api/logout.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>

    <!-- google font api -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- faculty.css added-->

    <link rel="stylesheet" href="../../style/faculty.css">

    <!-- font awosome cdn -->
    <script src="https://kit.fontawesome.com/4b1e45d229.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="faculty-info-container">
        <div class="faculty-info-box">
            <div class="info-box-title">
                <div class="info-title">
                    <p>Profile</p>
                </div>
                <div class="info-close">
                    <button onclick="hideProfileInfo()"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div class="info-box-profile">
                <div class="info">
                    <p> <span>Name : </span> <?php echo $_SESSION["name"];?></p>
                </div>
                <div class="info">
                    <p> <span>Registation No. : </span> <?php echo $_SESSION["reg_no"]?></p>
                </div>

                <div class="info">
                    <p> <span>Mobile : </span> <?php echo $_SESSION["mobile_no"]?></p>
                </div>
                <div class="info">
                    <p> <span>Email : </span> <?php echo $_SESSION["email"]?></p>
                </div>
                <div class="info">
                    <p> <span>Branch : </span> <?php echo $_SESSION["branch"]?></p>
                </div>
            </div>
        </div>
    </div>


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
                    <div class="greet-cotainer">
                        <div class="greet">
                            <p> <span>Hii,&nbsp;</span> <?php echo $_SESSION['name']; ?></p>
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
                                        <button onclick="showProfileInfo()">Profile</button>
                                    </div>
                                    <form method="POST" class="logout">
                                        <button name="logout-btn">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- code for content container -->
        <div class="content-container">
            <div class="fetch-details-container">

                <div class="input-box course-contanier">
                    <select name="course" id="course">
                        <option value="">--Select Course--</option>
                    </select>
                </div>

                <div class="input-box regulation-contanier">
                    <select name="regulation" id="regulation">
                        <!-- <option value="">--select regulation--</option> -->
                    </select>
                </div>

                <div class="input-box branch-contanier">
                    <select name="branch" id="branch">
                        <!-- <option value="">--select branch--</option> -->
                    </select>
                </div>

                <div class="input-box section-contanier">
                    <select name="section" id="section">
                        <!-- <option value="">--select section--</option> -->
                    </select>
                </div>

                <div class="input-box fetch-btn-contanier">
                    <button id="fetch-btn" name="fetch-btn">Fetch Details</button>
                </div>
            </div>
        </div>

        <!-- for all student details  -->
        <div class="students-details-main-container">
            <div class="students-details-title">
                <p>Student List</p>
            </div>
            <div class="students-details-container" id="students-details-container-id">

                <div class="students-details">
                    <div class="registration-no">
                        <p>192H1A05G3</p>
                    </div>
                    <div class="absent-present-box">
                        <input type="checkbox">
                    </div>
                </div>                

            </div>

        </div>
    </div>


    <!-- ajax code  -->
    <script src="../../javascript/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //ajax code for load student data 
            function loadStudentData(course, regulation, branch, section)
            {
                $.ajax({
                    url: "../../api/loadStudentDetail.php",
                    type: "POST",
                    data: {course: course, regulation: regulation, branch: branch, section: section},
                    success: function(data){
                        $("#students-details-container-id").html(data);
                    }
                });
            }

            $("#fetch-btn").on("click", function(){
                let course=$("#course").val();
                let regulation=$("#regulation").val();
                let branch=$("#branch").val();
                let section=$("#section").val();
                console.log("clicked");
                loadStudentData(course, regulation, branch, section);
            });

            // load data function to load data fro database
            function loadData(type, course, regulation, branch)
            {
                $.ajax({
                    url: "../../api/loadInfo.php",
                    type: "POST",
                    data: {type: type, course: course, regulation: regulation, branch: branch},
                    success: function(data){
                        if(type=="regulation")
                        {
                            console.log(data);
                            $("#regulation").html(data);
                        }
                        else if(type=="branch")
                        {
                            console.log(data);
                            $("#branch").html(data);
                        }
                        else if(type=="section")
                        {
                            console.log(data);
                            $("#section").html(data);
                        }
                        else
                        {
                            $("#course").append(data);
                        }
                    }
                });
            }
            
            loadData();
            
            // for course
            $("#course").on("change", function(){
                let course=$("#course").val();
                if(course!="")
                {
                    if(course=="mca" || course=="mba" || course=="m.tech")
                    {
                        $("#branch").attr("disabled", "true");
                        loadData("regulation", course);
                        $("#regulation").html("<option value=\"\">--Select Regulation--</option>");
                        $("#branch").html("<option value=\"\">--Ignore Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                    }
                    else
                    {
                        $("#branch").removeAttr("disabled");
                        loadData("regulation", course);
                        $("#regulation").html("<option value=\"\">--Select Regulation--</option>");
                        $("#branch").html("<option value=\"\">--Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                    }
                }
                else
                {
                    $("#regulation").html("<option value=\"\">--Select Regulation--</option>");
                    $("#branch").html("<option value=\"\">--Select Branch--</option>");
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                }

            });

            // for regulation
            $("#regulation").on("change", function(){
                let regulation=$("#regulation").val();
                let course=$("#course").val();
                if(regulation!="")
                {
                    if(course=="mca" || course=="mba" || course=="m.tech")
                    {
                        loadData("section", course, regulation,"");
                        $("#branch").html("<option value=\"\">--Ignore Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                    }
                    else
                    {
                        loadData("branch", course, regulation);
                        $("#branch").html("<option value=\"\">--Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                    }
                }
                else
                {
                    $("#branch").html("<option value=\"\">--Select Branch--</option>");
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                }
            });

            //for section 

            $("#branch").on("change", function(){
                let regulation=$("#regulation").val();
                let course=$("#course").val();
                let branch=$("#branch").val();

                if(branch!="")
                {
                    loadData("section", course, regulation, branch);
                    $("#section").html("<option value=\"\">--Select Section--</option>");

                }
                else
                {
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                }

            })

        });
    </script>

    <!-- javascript code  -->
    <script>

        // function for toggling the profile dropdown
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
                console.log("profile show");
            }
        }

        // function for hideing the profile container 
        function hideProfileInfo()
        {
            let close=document.querySelector(".faculty-info-container");

            close.style.display="none";
            console.log("profile info Hide");
        }

        // function for showing the profile container 
        function showProfileInfo()
        {
            let close=document.querySelector(".faculty-info-container");
            let profile=document.querySelector(".profile-option-container");

            profile.style.display="none";
            close.style.display="flex";
            console.log("profile info Show");
        }
    </script>
</body>
</html>