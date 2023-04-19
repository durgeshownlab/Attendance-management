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
    <!-- container code from here  -->
    <div class="container">
        <!-- left conmtainer code  -->
        <div class="left-container">
            <div class="left">
                <!-- logo code  -->
                <div class="logo">
                    <img src="../../img/logo.png" alt="">
                </div>
                <!-- menu bar code from here  -->
                <div class="menu-container">
                    <div class="menu active" id="home">
                        <span><i class="fa-solid fa-house"></i></span> home 
                    </div>
                    <div class="menu" id="faculty">
                        <span><i class="fa-solid fa-user-group"></i></span>faculty 
                    </div>
                    <div class="menu" id="profile">
                        <span><i class="fa-solid fa-user"></i></span>profile 
                    </div>
                    <div class="menu" id="attendance">
                        <span><i class="fa-solid fa-address-card"></i></span>attendence 
                    </div>
                    <div class="menu" id="subject">
                        <span><i class="fa-solid fa-book-open"></i></span>Subjects
                    </div>
                    <div class="menu" id="section">
                        <span><i class="fa-brands fa-slack"></i></span>sections
                    </div>
                    <div class="menu1" id="take-attendance">
                        <a href="../facultyView/faculty.php" target="_blank">take Attandance</a> 
                    </div>
                    <!-- <div class="menu" id="auth">
                        <span><i class="fa-solid fa-user-shield"></i></span>auth 
                    </div>
                    <div class="menu" id="analytics">
                        <span><i class="fa-solid fa-chart-line"></i></span>analytics 
                    </div> -->
                </div>
            </div>
        </div>

        <!-- right container coide  -->
        <div class="right-container">
            <!-- header code   -->
            <div class="header">
                <!-- left header code  -->
                <div class="left-header">
                    <form class="search">
                        <input type="search" placeholder="search" name="search-bar" id="search-bar">
                        <button type="submit" class="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <!-- right header code  -->
                <div class="right-header">
                    <div class="notification-container">
                        <div class="notification">
                            <span></span>
                            <i class="fa-solid fa-bell"></i>
                        </div>
                    </div>
                    <div class="department-name">
                        <span><?php echo $_SESSION['branch']; ?></span>
                    </div>
                    <div class="profile-container">
                        <div class="profile">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="profile-dropdown-container">
                            <div class="dropdown">
                                <button>Menu</button>
                            </div>
                            <form method="POST" class="dropdown logout">
                                <button name="logout-btn">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- code for right ccontainer content in which ajax call will be done  -->
            <div class="right-container-content">

            </div>
        </div>

        <!-- code for modal that can be used by update or insert  -->
        <div class="modal-box-container">
            
            <div class="modal-box">
                <div class="modal-box-content">

                </div>
            </div>

        </div>
    </div>


    <!-- ajax code  -->
    <script src="../../javascript/jquery.js"></script>
    <!-- jquery ui js -->
    <script src="../../javascript/jquery-ui.min.js"></script>

    <script type="text/javascript">
        

        $(document).ready(function(){

            //finction for loading all faculty details in card only from related department
            function loadFaculty()
            {
                $.ajax({
                    url: "../../api/hodApi/facultyApi.php",
                    type: "POST",
                    data: {},
                    success: function(data){
                        $(".right-container-content").html(data);
                    }
                });
            }

            //function for loading all the subject details in card only from related department
            function loadSubject()
            {
                $.ajax({
                    url: "../../api/hodApi/loadSubjectApi.php",
                    type: "POST",
                    data: {},
                    success: function(data){
                        // console.log(data);
                        $(".right-container-content").html(data);
                    }
                });
            }
            // on click listener on home tab
            $(document).on("click", "#home", function(){
                console.log("faculty clicked");
                $(".menu").removeClass("active");
                $("#home").addClass("active");
                $('#search-bar').attr('data-tab', 'home');
                $(".right-container-content").html("home");
            });

            // on click listener on faculy tab
            $(document).on("click", "#faculty", function(){
                console.log("faculty clicked");
                $(".menu").removeClass("active");
                $("#faculty").addClass("active");
                $('#search-bar').attr('data-tab', 'faculty');
                loadFaculty();
            });

            // on click listener on profile tab
            $(document).on("click", "#profile", function(){
                console.log("profile clicked");
                $(".menu").removeClass("active");
                $("#profile").addClass("active");
                $('#search-bar').attr('data-tab', 'profile');
                $.ajax({
                    url: "../../api/hodApi/profileApi.php",
                    type: "POST",
                    data: {},
                    success: function(data){
                        $(".right-container-content").html(data);
                    }
                });
            });

            // on click listener on attendance tab
            $(document).on("click", "#attendance", function(){
                console.log("attendance clicked");
                $(".menu").removeClass("active");
                $("#attendance").addClass("active");
                $('#search-bar').attr('data-tab', 'attendance');
                $.ajax({
                    url: "../../api/hodApi/getAttendanceHodApi.php",
                    type: "POST",
                    data: {},
                    success: function(data){
                        $(".right-container-content").html(data);
                    }
                });
            });

            // on click listener on subject tab
            $(document).on("click", "#subject", function(){
                console.log("subject clicked");
                $(".menu").removeClass("active");
                $("#subject").addClass("active");
                $('#search-bar').attr('data-tab', 'subject');
                loadSubject();
            });

            // on click listener on section tab
            $(document).on("click", "#section", function(){
                console.log("section clicked");
                $(".menu").removeClass("active");
                $("#section").addClass("active");
                $('#search-bar').attr('data-tab', 'section');
                
                $(".right-container-content").html("sections");
            });
            
            // on click listener on auth tab
            $(document).on("click", "#auth", function(){
                console.log("auth clicked");
                $(".menu").removeClass("active");
                $("#auth").addClass("active");
                $('#search-bar').attr('data-tab', 'auth');
                $(".right-container-content").html("auth");
            });

            // on click listener on analytics tab
            $(document).on("click", "#analytics", function(){
                console.log("auth clicked");
                $(".menu").removeClass("active");
                $("#analytics").addClass("active");
                $('#search-bar').attr('data-tab', 'analytics');
                $(".right-container-content").html("analytics");
            });

            //profile option show hide
            $(document).on("click", ".profile-container", function(){
                $(".profile-dropdown-container").toggle();
            });



            //on click listener on delete button on faculty details card
            $(document).on("click", ".delete-btn", function(){
                if(confirm("You Really want to delete this faculty"))
                {
                    var facultyId=$(this).data("id");

                    $.ajax({
                        url: "../../api/hodApi/deleteFacultyApi.php",
                        type: "POST",
                        data: {id: facultyId},
                        success: function(data){
                            if(data==1)
                            {
                                loadFaculty();
                            }
                            else if(data==0){
                                alert("Sorry, can't delete this record");
                            }
                        }
                    });
                }
                else
                {
                    alert("deletion cancel");
                }
            });

            //on click listener on update button on faculty details card
            $(document).on("click", ".update-btn", function(){
                $(".modal-box-container").show();
                var facultyId=$(this).data("id");

                $.ajax({
                    url: "../../api/hodApi/loadFacultyForm.php",
                    type: "POST",
                    data: {formType: "update", facultyId: facultyId},
                    success: function(data)
                    {
                        $(".modal-box-content").html(data);
                    }
                });
            });

            // for showing modal box when user clicked on add faculty 
            $(document).on("click", ".add-faculty-btn-container", function(){
                $(".modal-box-container").show();

                $.ajax({
                    url: "../../api/hodApi/loadFacultyForm.php",
                    type: "POST",
                    data: {formType: "add"},
                    success: function(data)
                    {
                        $(".modal-box-content").html(data);
                    }
                });
            });
            
            //for hiding modal box when user clicked on close button
            $(document).on("click", ".modal-box-close", function(){
                $(".modal-box-container").slideUp();
            });

            // email validation regx 
            function validateEmail(email){
                return email.match(
                    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
            };

            // for adding new faculty in your database
            $(document).on("click", "#add-faculty-submit-btn", function(e){
                e.preventDefault();
                console.log("add clicked");
                var name=$("#faculty-name").val();
                var email=$("#faculty-email").val();
                var reg_no=$("#faculty-reg-no").val();
                var number=$("#faculty-number").val();
                var password=$("#faculty-password").val();
                var confirm_password=$("#faculty-confirm-password").val();
                // var profile_pic=$("#faculty-profile-picture").val();

                console.log(name, email, reg_no, number, password);
                if(name==''){
                    alert("please enter the name");
                }
                else if(email=='' || !validateEmail(email)){
                    alert("please enter the email");
                }
                else if(reg_no==''){
                    alert("please enter the registration number");
                }
                else if(reg_no.length!=10){
                    alert("please enter valid registration number");
                }
                else if(number==''){
                    alert("please enter the phone number");
                }
                else if(number.length!=10){
                    alert("please enter valid phone number");
                }
                else if(password==''){
                    
                    alert("please enter the password");
                }
                else if(password.length<8){
                    
                    alert("password length should be greater than 8 character");
                }
                else if(confirm_password==''){

                    alert("please confirm the password");
                }
                else if(password!=confirm_password){
                    alert("password doesn't match");
                }
                else{
                    if(confirm("Do you realy want add"))
                    {
                        $.ajax({
                            url: "../../api/hodApi/insertFacultyApi.php",
                            type: "POST",
                            data: {fname: name, femail: email, freg_no: reg_no, fnumber: number, fpassword: password, fconfirm_password: confirm_password},
                            success: function(data)
                            {
                                if(data==1)
                                {
                                    $(".modal-box-container").hide();
                                    setTimeout(function() {
                                        loadFaculty();
                                    }, 500);

                                    // alert("successfully inserted");

                                }
                                else if(data==0){
                                    alert("Sorry, can't Add this faculty");
                                }
                                else if(data==2)
                                {
                                    alert("Something went wrong , please try again");
                                }
                                else
                                {
                                    alert(data);
                                }
                            }
                        });
                    }
                }
            });

            // for updating allready existing = faculty in your database
            $(document).on("click", "#update-faculty-submit-btn", function(e){
                e.preventDefault();
                console.log("update clicked");
                var name=$("#faculty-name").val();
                var email=$("#faculty-email").val();
                var reg_no=$("#faculty-reg-no").val();
                var number=$("#faculty-number").val();
                var password=$("#faculty-password").val();
                var confirm_password=$("#faculty-confirm-password").val();
                var id=$(this).data("id");
                // var profile_pic=$("#faculty-profile-picture").val();

                console.log(name, email, reg_no, number, password);
                if(name==''){
                    alert("please enter the name");
                }
                else if(email=='' || !validateEmail(email)){
                    alert("please enter the email");
                }
                else if(reg_no==''){
                    alert("please enter the registration number");
                }
                else if(reg_no.length!=10){
                    alert("please enter valid registration number");
                }
                else if(number==''){
                    alert("please enter the phone number");
                }
                else if(number.length!=10){
                    alert("please enter valid phone number");
                }
                else if(password==''){
                    
                    alert("please enter the password");
                }
                else if(password.length<8){
                    
                    alert("password length should be greater than 8 character");
                }
                else if(confirm_password==''){

                    alert("please confirm the password");
                }
                else if(password!=confirm_password){
                    alert("password doesn't match");
                }
                else{
                    if(confirm("Do you realy want add"))
                    {
                        $.ajax({
                            url: "../../api/hodApi/updateFacultyApi.php",
                            type: "POST",
                            data: {fname: name, femail: email, freg_no: reg_no, fnumber: number, fpassword: password, fconfirm_password: confirm_password, fid: id},
                            success: function(data)
                            {
                                if(data==1)
                                {
                                    $(".modal-box-container").hide();
                                    setTimeout(function() {
                                        loadFaculty();
                                    }, 500);

                                    // alert("successfully inserted");

                                }
                                else if(data==0){
                                    alert("Sorry, can't Add this faculty");
                                }
                                else if(data==2)
                                {
                                    alert("Something went wrong , please try again");
                                }
                                else
                                {
                                    alert(data);
                                }
                            }
                        });
                    }
                }
            });

            // code for search bar
            $(document).on("keyup", "#search-bar", function(e){
                var search_tab = $("#search-bar").attr("data-tab");

                //for home tab
                if(search_tab == "home")
                {
                    var search_data = $("#search-bar").val();
                    console.log(search_data, "home tab");
                }

                //for faculty tab
                else if(search_tab == "faculty")
                {
                    var search_data = $("#search-bar").val();
                    console.log(search_data, "faculty tab");
                    $.ajax({
                        url: "../../api/hodApi/searchFacultyApi.php",
                        type: "POST",
                        data: {search_data: search_data},
                        success: function(data)
                        {
                            $(".right-container-content").html(data);
                        }
                    });
                }
                //for attendance tab
                else if(search_tab == "attendance")
                {
                    var search_data = $("#search-bar").val();
                    console.log(search_data, "attendance tab");


                    if(search_data=='')
                    {
                        $.ajax({
                            url: "../../api/hodApi/getAttendanceHodApi.php",
                            type: "POST",
                            data: {},
                            success: function(data){
                                $(".right-container-content").html(data);
                            }
                        });
                    }
                    else
                    {
                        $.ajax({
                            url: "../../api/hodApi/searchAttendanceHodApi.php",
                            type: "POST",
                            data: {search_data: search_data},
                            success: function(data)
                            {
                                $(".right-container-content").html(data);
                            }
                        });

                    }

                }
                
            });

            //preventing search button

            $(document).on("click", ".search-btn", function(e){
                e.preventDefault(); 
            });


            //on click listener on delete button on subject details card
            $(document).on("click", ".delete-subject-btn", function(){
                if(confirm("You Really want to delete this subject"))
                {
                    var subjectId=$(this).data("id");
                    console.log(subjectId);

                    $.ajax({
                        url: "../../api/hodApi/deleteSubjectApi.php",
                        type: "POST",
                        data: {id: subjectId},
                        success: function(data){
                            if(data==1)
                            {
                                loadSubject();
                            }
                            else if(data==0){
                                alert("Sorry, can't delete this record");
                            }
                        }
                    });

                }
                else
                {
                    alert("deletion cancel");
                }
            });


            // for showing modal box when user clicked on add faculty 
            $(document).on("click", ".add-subject-btn-container", function(){
                $(".modal-box-container").show();

                $.ajax({
                    url: "../../api/hodApi/loadSubjectForm.php",
                    type: "POST",
                    data: {formType: "add"},
                    success: function(data)
                    {
                        $(".modal-box-content").html(data);
                    }
                });
            });

            // for adding subject in database on click on add button 
            $(document).on("click", "#add-subject-submit-btn", function(e){
                // $(".modal-box-container").show();
                e.preventDefault();
                var reg_no=$("#subject-faculty-reg-no").val();
                var regulation=$("#subject-regulation").val();
                var subject=$("#subject-subject").val();

                if(reg_no=='')
                {
                    alert("please select registration no");
                }
                else if(regulation=='')
                {
                    alert("please select regulation");
                }
                else if(subject=='')
                {
                    alert("please enter subject no");
                }
                else
                {
                    if(confirm("Are you sure You want to add"))
                    {
                        $.ajax({
                            url: "../../api/hodApi/insertSubjectApi.php",
                            type: "POST",
                            data: {reg_no: reg_no, regulation: regulation, subject: subject},
                            success: function(data)
                            {
                                if(data==1)
                                {
                                    $(".modal-box-container").hide();
                                    setTimeout(function() {
                                        loadSubject();
                                    }, 500);

                                    // alert("successfully inserted");

                                }
                                else if(data==0){
                                    alert("Sorry, can't Add this subject");
                                }
                                else if(data==2)
                                {
                                    alert("Something went wrong , please try again");
                                }
                                else
                                {
                                    alert(data);
                                }
                            }
                        });
                    }
                }

                
            });



        });
    </script>
</body>
</html>