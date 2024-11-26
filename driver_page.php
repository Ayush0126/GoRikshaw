<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Home - Rickshaw Management System</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            /* background-color: burlywood; */
             background-image: url(abstract-background-light-steel-blue-wallpaper-image_53876-102530.avif); 
            font-family: Arial, sans-serif;
            margin: 0;

        }
                /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content:space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 24px;
            font-family: cursive;
            text-decoration: none;
        }

        .navbar .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar .menu {
                flex-direction: column;
                display: none;
            }

            .navbar .menu.show {
                display: flex;
            }

            .navbar .toggle-btn {
                display: block;
                cursor: pointer;
                font-size: 24px;
                color: white;
            }
        }

        @media (min-width: 769px) {
            .navbar .toggle-btn {
                display: none;
            }
        }
        .animated-text {
            font-size: 60px;
            font-family: cursive;
            color:black;
         
            opacity: 0;
            animation: fadeInUp 2s ease-out forwards;
            text-align: center;
            margin: 25px;
        }

        /* Keyframes for Text Animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Container Styling */
        .container {
            background:#F0F0F0;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 1000px;
            text-align: center;
            margin-top: 50px;
            margin-left: 250px;

        }
        /* Header Styling */
        header h1 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Buttons Section */
        .buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #5cb85c;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 0 100px;
        }

        .btn:hover {
            background-color: #4cae4c;
        }
        .toggle-container {
            display: flex;
            align-items: center;
            font-size: 30px;
            text-align: center;
            gap: 10px;
        }

        .toggle {
            width: 40px;
            height: 20px;
            appearance: none;
            background: #ccc;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
            outline: none;
            transition: background 0.3s ease;
        }

        .toggle:checked {
            background: #5cb85c;
        }

        .toggle:checked::before {
            left: 20px;
        }

        .toggle::before {
            content: '';
            width: 18px;
            height: 18px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 1px;
            left: 1px;
            transition: left 0.3s ease;
        }

        /* Available Rides List */
        .rides-list {
            margin-top: 20px;
            text-align: left;
        }

        .rides-list h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .rides-list ul {
            list-style: none;
            padding: 0;
        }

        .rides-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            background: #f9f9f9;
        }

        .accept-btn {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .accept-btn:hover {
            background-color: #4cae4c;
        }

        .reject-btn {
            background-color: #d9534f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .reject-btn:hover {
            background-color: #c9302c;
        }

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    width: 250px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.card h3 {
    margin: 0;
}

.card p {
    margin: 5px 0;
}

.card button {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.card button:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
    <button type="button" class="btn-cancel"onclick="logout()">Logout</button>
    <h1 style="text-align: center; font-size: 60px;" class="animated-text">Hello! Driver <?php 
            include "connect.php";

        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT * FROM drivers WHERE email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['FirstName'];
        }
       ?></h1>
    <div class="container">
        <header>
            <h1 style="font-size: 50px;">Current Status</h1>
        </header>

        <form action="Update_toggle.php" method="POST">
        <button class="btn" name="ava">Available</button>
               
        <button class="btn" name="not">Not Available</button>
        </form>

        <div class="buttons" id="buttons" style="display: block;">
            <!-- <button class="btn" onclick="showAvailableRides()">View Available Rides</button> -->
            <div class="toggle-container">
                <label for="availability-toggle">Show Availabile Rides</label>
                <input type="checkbox" id="availability-toggle" class="toggle" onchange="toggleAvailability()">
            </div>
        </div>
        <?php
        include "connect.php";
        
        $email=$_SESSION['email'];
        $check="SELECT * from drivers where email='$email'";
        $result=$conn->query($check);
        $row = $result->fetch_assoc();
        $st = $row['availability'];
        ?>
        <script>
            function dis(){
            const buttons = document.getElementById('buttons');
            buttons.style.display = $st=='1' ? 'block' : 'none';
        }
        </script>

        <!-- Available Rides Section -->
        <div class="rides-list" id="rides-list" style="display: none;">
            <h3>Available Rides : </h3>
            <ol>
                <?php
                    include "connect.php";
                    $sql = "SELECT * FROM avarides"; // SQL query to select all rows
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<form action='onride.php' method='POST'>";
                        echo "<div class='card-container'>";
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='card' >";
                        echo "<h3><strong>Pickup: <strong>" . $row["ploc"] . "</h3>";
                        echo "<p><strong>Drop:</strong> " . $row["dloc"] . "</p>";
                        echo "<button name ='newb' value='$row[studentemail]'>Accept</button>"; 
                        echo "</div>";
                        }
                        echo "</div>";
                        echo "</form>";
                    } else {
                    echo "0 results";
                    }
                ?>
            </ol>
        </div>
    </div>
    
    <script>
        function toggleAvailability() {
            const ridesList = document.getElementById('rides-list');
            const availabilityToggle = document.getElementById('availability-toggle');
            ridesList.style.display = availabilityToggle.checked ? 'block' : 'none';
        }
        
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>