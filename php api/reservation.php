<?php
include ('connection.php');
$conn = new Connection();

if (isset($_POST['reservation_date'])) {
    $username = $_POST['custUsername'];
    $code = $_POST['custCode'];
    $start_date = $_POST['reservation_date'];
    $end_date = $_POST['end_date'];
    $package = $_POST['package'];

    $dateDiff = strtotime($end_date) - strtotime($start_date);
    $dateDiff = round($dateDiff / (60 * 60 * 24));

    if ($package == "Whole Resort") {
        $price = 15000;
    } else if ($package == "Big House") {
        $price = 10000;
    } else if ($package == "Small House (side)") {
        $price = 8000;
    } else if ($package == "Small House (back)") {
        $price = 6000;
    } else if ($package == "Resort Grounds") {
        $price = 5000;
    }

    $total_cost = $dateDiff * $price;

    $query = "INSERT INTO reservation (username, start_date, end_date, number_days, package, price, total_cost) VALUES ('$username', '$start_date', '$end_date', '$dateDiff', '$package', '$price', '$total_cost')";

    mysqli_query($conn->connect(), $query);
    echo "<script>alert('Thank you for your reservation!');</script>";
    header("Location: http://localhost/Projects/IAS%20Final%20Project/reservation.php?user=".$username."&randstr=".$code);
    die();
}
?>