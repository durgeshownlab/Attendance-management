<?php
session_start();

if($_SESSION['user_type']=="faculty")
{
    session_destroy();
    
    header('Location: ../userEnd/facultyView/faculty.php');
}
else if($_SESSION['user_type']=="hod")
{
    session_destroy();
    
    header('Location: ../userEnd/hodView/hod.php');
}
    
?>