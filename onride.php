<?php

include "connect.php";
session_start();

    $stemail=$_POST['newb'];
    $dremail=$_SESSION['email'];
    $checkEmail="SELECT * From avarides where studentemail='$stemail'";
    $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
        $insertquery="insert into onrides( stemail, ploc, dloc, dremail)values('$stemail','$row[ploc]',' $row[dloc] ','$dremail')";
        $r=$conn->query($insertquery);
        $delete="delete from avarides where studentemail='$stemail'";
        $r=$conn->query($delete);
        }
        header("Location: accept.php");
     }

?>