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

if(isset($_SESSION['data_inserted']) && $_SESSION['data_inserted'])
{
    echo "<script>alert(\"Data Submited Successfully\");</script>";
    unset($_SESSION['data_inserted']);
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

    <!-- jquery ui css -->
    <link rel="stylesheet" href="../../style/jquery-ui.min.css">

</head>
<body>
    <!-- for college watermark  -->
    <div class="watermark-container">
        <div class="watermark">
            <img src="../../img/logo.png">
        </div>
    </div>

    <!-- for showing attendance details in floating window -->
    <div class="attendance-main-container">
        <div class="attendance-container">
            <div class="attendance-title-container">
                <div class="attendance-title">
                    <p>Attendance Details</p>
                    <div class="close-container">
                        <button onclick="hideAttendanceContainer()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="date-picker-container">
                    <div class="from-date-container">
                        <label for="from-date">From</label>
                        <input type="text" name="from-date" id="from-date" autocomplete="off">
                    </div>

                    <div class="to-date-container">
                        <label for="to-date">To</label>
                        <input type="text" name="to-date" id="to-date" autocomplete="off">
                    </div>
                    <div class="fetch-attendance-btn-container">
                        <button id="fetch-attendance-details-btn">Go</button>
                    </div>
                </div>
                <div class="close-container">
                    <button onclick="hideAttendanceContainer()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <div class="attendance-details-container">
                <!-- <div class="date-title">
                    <p>Today's Attendance</p>
                </div>
                <div class="attendance-details-card-container"> -->
                    <!-- card container  -->
                    <!-- <div class="attendance-card">
                        <div class="card-item date-container">
                            <p><span>Date :&nbsp;&nbsp;</span>2000-01-11</p>
                        </div>
                        <div class="card-item course-container">
                            <p><span>Course :&nbsp;&nbsp;</span>B.tech</p>
                        </div>
                        <div class="card-item regulation-container">
                            <p><span>Regulation :&nbsp;&nbsp;</span>R19</p>
                        </div>
                        <div class="card-item branch-container">
                            <p><span>Branch :&nbsp;&nbsp;</span>CSE</p>
                        </div>
                        <div class="card-item section-container">
                            <p><span>Section :&nbsp;&nbsp;</span>C</p>
                        </div>
                        <div class="card-item subject-container">
                            <p><span>Subject :&nbsp;&nbsp;</span>FLAT</p>
                        </div>
                        <div class="card-item view-btn-container">
                            <a href="#">View</a>
                        </div>
                    </div> 
                </div>-->
            </div>
        </div>
    </div>

    <!-- for showing faculty information  in floating window-->
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
                <div class="info">
                    <p> <span>User Type : </span> <?php echo $_SESSION["user_type"]?></p>
                </div>
            </div>
        </div>
    </div>


    <!-- main container -->
    <div class="main-container">

        <!-- nav container -->
        <div class="nav-container">
            <div class="navbar">
                <!-- for logo section  -->
                <div class="logo-container">
                    <div class="logo">
                        <img src="../../img/logo.png">
                    </div>
                </div>
                
                <!-- for college name  -->
                <div class="college-name-title-container">
                    <p>Audisankara Institute of Technology</p>
                </div>

                <!-- for profile container  -->
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
                                    <div class="profile-btn">
                                        <button id="show-attendance-btn" onclick="showAttendanceContainer()">Attendance Details</button>
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

                <div class="input-box subject-contanier">
                    <select name="subject" id="subject">
                        <!-- <option value="">--select subject--</option> -->
                    </select>
                </div>

                <div class="input-box period-contanier">
                    <select name="period" id="period">
                        <!-- <option value="">--select period--</option> -->
                    </select>
                </div>

                <div class="input-box fetch-btn-contanier">
                    <button id="fetch-btn" name="fetch-btn">Fetch Details</button>
                </div>
            </div>
        </div>

        <!-- for all student details  -->
        <form action="../../api/takeAttendance.php" method="POST" onsubmit="return confirm('Are You Sure? You Want to Submit')" class="students-details-main-container" id="students-details-main-container-id">
            <div class="students-details-title">
                <p>Student List</p>
            </div>
            <div class="students-details-container" id="students-details-container-id">

                <!-- <div class="students-details">
                    <div class="registration-no">
                        <p>192H1A05G3</p>
                    </div>
                    <div class="absent-present-box">
                        <input type="checkbox">
                    </div>
                </div>                 -->

            </div>

            <div class="empty-msg">

            </div>

            <div class="submit-attendance-container">
                <button type="submit" id="submit-attendance" name="submit-attendance">Submit Attendance</button>
            </div>
        </form>
    </div>


    <!-- ajax code  -->
    <script src="../../javascript/jquery.js"></script>
    <!-- jquery ui js -->
    <script src="../../javascript/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // code for attendance details floating window
            function loadAttendance(type, course, regulation, branch, section)
            {
                $.ajax({
                    url: "../../api/loadInfo.php",
                    type: "POST",
                    data: {type: type, course: course, regulation: regulation, branch: branch, section: section},
                    success: function(data){
                        if(type=="regulation")
                        {
                            console.log(data);
                            $("#regulation-1").html(data);
                        }
                        else if(type=="branch")
                        {
                            console.log(data);
                            $("#branch-1").html(data);
                        }
                        else if(type=="section")
                        {
                            console.log(data);
                            $("#section-1").html(data);
                        }
                        else if(type=="subject")
                        {
                            console.log(data);
                            $("#subject-1").html(data);
                        }
                        else
                        {
                            $("#course-1").append(data);
                        }
                    }
                });
            }
            
            // loadAttendance();
            // for from date picker 
            $("#from-date").datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true,
                yearRange: "2020:2050"
            });

            //for to date picker
            $("#to-date").datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true,
                yearRange: "2020:2050"
            });

            // fetch-attendance-details-btn on click event 
            function loadAttendanceDetails(fromDate, toDate)
            {
                $.ajax({
                    url: "../../api/getAttendanceDetails.php",
                    type: "POST",
                    data: {fromDate: fromDate, toDate: toDate},
                    success: function(data){
                        $(".attendance-details-container").html(data);
                    }
                });
            }

            $("#fetch-attendance-details-btn").on("click", function(){
                console.log("From "+$("#from-date").val()+" to "+$("#to-date").val());
                let fromDate=$("#from-date").val();
                let toDate=$("#to-date").val();

                if(fromDate=='' || toDate=='')
                {
                    // loadAttendanceDetails();
                    alert("please select Range");
                }
                else
                {

                    console.log(fromDate, toDate);
                    loadAttendanceDetails(fromDate, toDate);
                    loadAttendance("course");
                    console.log("change");
                }
            });

            loadAttendanceDetails();
            
            $(document).on("click", "#show-attendance-btn", function(e){
                loadAttendanceDetails();
            });

            //for attendance course
            // for course
            $(document).on("change","#course-1", function(e){
                // removing existing data from student details container
                let course=$("#course-1").val();
                if(course!="")
                {
                    if(course=="mca" || course=="mba" || course=="m.tech")
                    {
                        $("#branch-1").attr("disabled", "true");
                        loadAttendance("regulation", course);
                        $("#regulation-1").html("<option value=\"\">--Select Regulation--</option>");
                        $("#branch-1").html("<option value=\"\">--Ignore Select Branch--</option>");
                        $("#section-1").html("<option value=\"\">--Select Section--</option>");
                        $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                    }
                    else
                    {
                        $("#branch-1").removeAttr("disabled");
                        loadAttendance("regulation", course);
                        $("#regulation-1").html("<option value=\"\">--Select Regulation--</option>");
                        $("#branch-1").html("<option value=\"\">--Select Branch--</option>");
                        $("#section-1").html("<option value=\"\">--Select Section--</option>");
                        $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                    }
                }
                else
                {
                    $("#regulation-1").html("<option value=\"\">--Select Regulation--</option>");
                    $("#branch-1").html("<option value=\"\">--Select Branch--</option>");
                    $("#-1").html("<option value=\"\">--Select Section--</option>");
                    $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                }

            });

            // for regulation
            $(document).on("change","#regulation-1", function(e){
                let regulation=$("#regulation-1").val();
                let course=$("#course-1").val();
                if(regulation!="")
                {
                    if(course=="mca" || course=="mba" || course=="m.tech")
                    {
                        loadAttendance("section", course, regulation,"");
                        $("#branch-1").html("<option value=\"\">--Ignore Select Branch--</option>");
                        $("#section-1").html("<option value=\"\">--Select Section--</option>");
                        $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                    }
                    else
                    {
                        loadAttendance("branch", course, regulation);
                        $("#branch-1").html("<option value=\"\">--Select Branch--</option>");
                        $("#section-1").html("<option value=\"\">--Select Section--</option>");
                        $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                    }
                }
                else
                {
                    $("#branch-1").html("<option value=\"\">--Select Branch--</option>");
                    $("#section-1").html("<option value=\"\">--Select Section--</option>");
                    $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                }
            });

            //for section 

            $(document).on("change","#branch-1", function(e){

                let regulation=$("#regulation-1").val();
                let course=$("#course-1").val();
                let branch=$("#branch-1").val();

                if(branch!="")
                {
                    loadAttendance("section", course, regulation, branch);
                    $("#section-1").html("<option value=\"\">--Select Section--</option>");
                    $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                }
                else
                {
                    $("#section-1").html("<option value=\"\">--Select Section--</option>");
                    $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                }

            });

            //for subject 

            $(document).on("change","#section-1", function(e){

                let regulation=$("#regulation-1").val();
                let course=$("#course-1").val();
                let branch=$("#branch-1").val();
                let section=$("#section-1").val();

                if(section!="")
                {
                    loadAttendance("subject", course, regulation, branch, section);
                    $("#subject-1").html("<option value=\"\">--Select Subject--</option>");

                }
                else
                {
                    $("#subject-1").html("<option value=\"\">--Select Subject--</option>");
                }

            });

            //for subject change
            $(document).on("change", "#subject-1", function(e){

            });

            $(document).on("click", "#fetch-btn-1", function(e){
                let course=$("#course-1").val();
                let regulation=$("#regulation-1").val();
                let branch=$("#branch-1").val();
                let section=$("#section-1").val();
                let subject=$("#subject-1").val();
                let fromDate=$("#from-date").val();
                let toDate=$("#to-date").val();
                if(course=="")
                {
                    alert("Please select Course");
                }
                if(course=="mca" || course=="mba" || course=="m.tech")
                {
                    if(regulation=="")
                    {
                        alert("Please select Regulation");
                    }
                    else if(section=="")
                    {
                        alert("Please select Section");
                    }
                    else if(subject=="")
                    {
                        alert("Please select Subject");
                    }
                    else
                    {
                        console.log(course, regulation, section, subject);
                        let branch="";
                        let link='/attendance-management/api/viewAttendanceInRange.php?course='+course+'&regulation='+regulation+'&branch='+branch+'&section='+section+'&subject='+subject+'&fromDate='+fromDate+'&toDate='+toDate;
                        window.location=link;
                    }
                }
                else
                {
                    if(regulation=="")
                    {
                        alert("Please select Regulation");
                    }
                    else if(subject=="")
                    {
                        alert("Please select subject");
                    }
                    else if(section=="")
                    {
                        alert("Please select Section");
                    }
                    else if(subject=="")
                    {
                        alert("Please select Subject");
                    }
                    else
                    {
                        console.log(course, regulation, branch, section, subject);
                        let link='/attendance-management/api/viewAttendanceInRange.php?course='+course+'&regulation='+regulation+'&branch='+branch+'&section='+section+'&subject='+subject+'&fromDate='+fromDate+'&toDate='+toDate;
                        window.location=link;
                    }

                }
            });
            // declare var for nothingToShow
            var showHideNotification="Nothing to show";

            //function for notthing to show;
            const nothingToShow = ()=>{
                if($("#students-details-container-id").children().length==0)
                {
                    $(".empty-msg").html(showHideNotification);
                    $(".empty-msg").show();
                }
                else
                {
                    $(".empty-msg").hide();
                }
            }

            setInterval(nothingToShow, 100);
            
            // function for auto refresh
            const ShowHideSubmitButton = ()=>
            {
                if($("#students-details-container-id").children().length>0)
                {
                    $("#submit-attendance").show();
                }
                else
                {
                    $("#submit-attendance").hide();
                }
            }

            setInterval(ShowHideSubmitButton, 100);
            

            //ajax code for load student data 
            function loadStudentData(course, regulation, branch, section, subject, period)
            {
                $.ajax({
                    url: "../../api/loadStudentDetail.php",
                    type: "POST",
                    data: {course: course, regulation: regulation, branch: branch, section: section, subject: subject, period: period},
                    success: function(data){
                        if(data=="already taken")
                        {
                            // console.log(data);
                            showHideNotification="Attendance Already Taken";
                        }
                        else
                        {
                            $("#students-details-container-id").html(data);
                        }
                    }
                });
            }

            $("#fetch-btn").on("click", ()=>{
                let course=$("#course").val();
                let regulation=$("#regulation").val();
                let branch=$("#branch").val();
                let section=$("#section").val();
                let subject=$("#subject").val();
                let period=$("#period").val();
                console.log("clicked");
                
                (subject=="")?alert("Please Select Subject"):loadStudentData(course, regulation, branch, section, subject, period);

                // $("#students-details-container-id").children().length>0?$("#submit-attendance").show():$("#submit-attendance").hide();

            });

            // load data function to load data fro database
            function loadData(type, course, regulation, branch, section)
            {
                $.ajax({
                    url: "../../api/loadInfo.php",
                    type: "POST",
                    data: {type: type, course: course, regulation: regulation, branch: branch, section: section},
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
                        else if(type=="subject")
                        {
                            console.log(data);
                            $("#subject").html(data);
                        }
                        else if(type=="course")
                        {
                            $("#course").append(data)
                            ;
                        }
                    }
                });
            }
            loadData("course");

            //for period loading
            function loadPeriod(course, regulation, branch, section)
            {
                $.ajax({
                    url: "../../api/periodLoad.php",
                    type: "POST",
                    data: {course: course, regulation: regulation, branch: branch, section: section},
                    success: function(data){
                        $("#period").html(data);
                    }
                });
            }
            
            // for course
            $("#course").on("change", function(){
                $("#students-details-container-id").html(""); // removing existing data from student details container
                showHideNotification="Nothing to show";
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
                        $("#subject").html("<option value=\"\">--Select Subject--</option>");
                    }
                    else
                    {
                        $("#branch").removeAttr("disabled");
                        loadData("regulation", course);
                        $("#regulation").html("<option value=\"\">--Select Regulation--</option>");
                        $("#branch").html("<option value=\"\">--Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                        $("#subject").html("<option value=\"\">--Select Subject--</option>");
                    }
                }
                else
                {
                    $("#regulation").html("<option value=\"\">--Select Regulation--</option>");
                    $("#branch").html("<option value=\"\">--Select Branch--</option>");
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                    $("#subject").html("<option value=\"\">--Select Subject--</option>");
                }

            });

            // for regulation
            $("#regulation").on("change", function(){
                $("#students-details-container-id").html(""); // removing existing data from student details container
                showHideNotification="Nothing to show";

                let regulation=$("#regulation").val();
                let course=$("#course").val();
                if(regulation!="")
                {
                    if(course=="mca" || course=="mba" || course=="m.tech")
                    {
                        loadData("section", course, regulation,"");
                        $("#branch").html("<option value=\"\">--Ignore Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                        $("#subject").html("<option value=\"\">--Select Subject--</option>");
                    }
                    else
                    {
                        loadData("branch", course, regulation);
                        $("#branch").html("<option value=\"\">--Select Branch--</option>");
                        $("#section").html("<option value=\"\">--Select Section--</option>");
                        $("#subject").html("<option value=\"\">--Select Subject--</option>");
                    }
                }
                else
                {
                    $("#branch").html("<option value=\"\">--Select Branch--</option>");
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                    $("#subject").html("<option value=\"\">--Select Subject--</option>");
                }
            });

            //for section 

            $("#branch").on("change", function(){
                $("#students-details-container-id").html(""); // removing existing data from student details container
                showHideNotification="Nothing to show";

                let regulation=$("#regulation").val();
                let course=$("#course").val();
                let branch=$("#branch").val();

                if(branch!="")
                {
                    loadData("section", course, regulation, branch);
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                    $("#subject").html("<option value=\"\">--Select Subject--</option>");
                }
                else
                {
                    $("#section").html("<option value=\"\">--Select Section--</option>");
                    $("#subject").html("<option value=\"\">--Select Subject--</option>");
                }

            });

            //for subject 

            $("#section").on("change", function(){
                $("#students-details-container-id").html(""); // removing existing data from student details container
                showHideNotification="Nothing to show";

                let regulation=$("#regulation").val();
                let course=$("#course").val();
                let branch=$("#branch").val();
                let section=$("#section").val();

                if(section!="")
                {
                    loadData("subject", course, regulation, branch, section);
                    $("#subject").html("<option value=\"\">--Select Subject--</option>");

                }
                else
                {
                    $("#subject").html("<option value=\"\">--Select Subject--</option>");
                }

            });

            //for period
            $("#subject").on("change", function(){
                $("#students-details-container-id").html(""); // removing existing data from student details container
                showHideNotification="Nothing to show";

                let regulation=$("#regulation").val();
                let course=$("#course").val();
                let branch=$("#branch").val();
                let section=$("#section").val();
                let subject=$("#subject").val();

                if(subject!="")
                {
                    loadPeriod(course, regulation, branch, section);
                }

            });

            //for subject change
            $("#subject").on("change", function(){
                $("#students-details-container-id").html(""); // removing existing data from student details container
                showHideNotification="Nothing to show";
            });

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

        //function for hiding the attendance container
        function hideAttendanceContainer()
        {
            let detailsContainer=document.querySelector(".attendance-main-container");
            detailsContainer.style.display='none';
        }
        //function for showing the attendance container
        function showAttendanceContainer()
        {
            let profile=document.querySelector(".profile-option-container");
            let detailsContainer=document.querySelector(".attendance-main-container");
            profile.style.display="none";
            detailsContainer.style.display='flex';
        }
    </script>
</body>
</html>