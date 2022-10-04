<?php
    include ('connection.php');
    $conn = new Connection();

    if (isset($_POST['fname'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact (fname, lname, email, number, message) VALUES ('$fname', '$lname', '$email', '$number', '$message')";

        mysqli_query($conn->connect(), $sql);
        echo "<script>alert('Thank you for your message!'); window.location.href = '../contact.html';</script>";
    }

    $conn->close();
?>