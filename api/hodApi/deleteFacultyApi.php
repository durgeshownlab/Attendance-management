<?php
    session_start();
    include "../../dbconnect/connect.php";

    $id=$_POST['id'];

    $sql="delete from faculty_table where sno={$id}";

    if(mysqli_query($conn, $sql))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }

?>