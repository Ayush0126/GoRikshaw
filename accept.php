<?php

include "connect.php";
session_start();

    $dremail=$_SESSION['email'];
    $checkEmail="SELECT * From onrides where dremail='$dremail'";
    $result=$conn->query($checkEmail);
    $row = $result->fetch_assoc();
    $ploc=$row['ploc'];
    $dloc=$row['dloc']; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Details - Rickshaw Management System</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: #5e9196; */
            background-image: url(/img.jpg);
            font-family: Arial, sans-serif;
        }

        .container {
            background: #e4d9ed;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .location {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
            background: #f0f0f0; /* Light background for the box */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left;
}

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #5cb85c;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="margin: 10px ,0px,10px ;">Ongoing Ride Details</h1>
        <div class="location">
            <strong>Pickup Location:</strong> <span id="pickup-location"><?php echo $ploc?></span>
        </div>
        <br>
        <div class="location">
            <strong>Drop Location:</strong> <span id="drop-location"><?php echo $dloc?></span>
        </div>
        
        <button class="btn" onclick="completeRide()">Complete Ride</button>
    </div>

    <script>
        function completeRide() {
            window.location.href = "delete.php"; 
        }
    </script>
</body>
</html>
