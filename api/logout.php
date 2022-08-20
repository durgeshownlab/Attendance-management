<?php
session_start();

session_destroy();

header('Location: ../userEnd/facultyView/faculty.php');
?>