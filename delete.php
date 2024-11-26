<?php
include "connect.php";
session_start();
    $dremail=$_SESSION['email'];
    $delete="DELETE from onrides where dremail='$dremail'";
    $r=$conn->query($delete);
    header("location: driver_page.php");
?>
