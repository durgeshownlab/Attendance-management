<?php
    $server="localhost";
    $dbusername="root";
    $dbpassword="";
    $database="attendance_management";

    $conn=mysqli_connect($server, $dbusername, $dbpassword, $database);
    if($conn)
    {
        // echo"connected to the database";
    }
    else
    {
        // echo"not connected";
    }
?>