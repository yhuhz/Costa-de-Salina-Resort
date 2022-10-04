<?php
$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);

    $create_db = "CREATE DATABASE if not exists costa_de_salina";
        $conn->query($create_db);

        $conn->select_db('costa_de_salina');

        $filename = 'sql/costa_de_salina.sql';
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
        // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $conn->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }
        $conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Costa de Salina">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Julius Grajo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>Costa de Salina</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/logo_small.png" />

        <!-- CSS -->
        <link rel="stylesheet" href="css/index.css">

        <!-- JS -->
        

        <!-- Boostrap -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <!-- Google Fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@500&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Cedarville+Cursive&display=swap');
        </style>
    </head>

    <body>
        <div class="landingPage">

            <!--Video Background-->
            <div class="video-container">
                <video autoplay muted loop id="myVideo">
                    <source src="images/beach_video.mp4" type="video/mp4">
                </video>
            </div>
            
            <!--Navbar-->
            <div class="topBar">
                <h4>Costa de Salina</h4>
                <img src="images/logo.jpg" height="200px" width="200px">
                <div id="float_right">
                    <a href="index.php">Home</a>
                    <a href="about.html">About</a>
                    <a href="contact.html">Contact us</a>
                    <a href="#" id="review">Reviews</a>
                    <a href="signup.html" id="bookBtn">Book now</a>
                </div>
            </div>

            <!--Center Text-->
            <div class="centerText">
                <h1>Give your body the relaxation it deserves</h1>
                <a href="signup.html"><button>See our exclusive offers</button></a>
            </div>
        </div>
    </body>
</html>