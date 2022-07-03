<?php
    session_start();
    if(isset($_SESSION["active_user"]) == false)
        header("location:index.php");
    session_destroy();
    header("location:index.php");
?>
