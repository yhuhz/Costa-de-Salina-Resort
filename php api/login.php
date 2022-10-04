<?php
include ('connection.php');
$conn = new Connection();

if (isset($_POST['login_username'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $Uresult = mysqli_query($conn->connect(), "SELECT COUNT(*) FROM signup WHERE username='$username'");
        $Urow = mysqli_fetch_array($Uresult);
        $Utotal = $Urow[0];
    
    $Aresult = mysqli_query($conn->connect(), "SELECT COUNT(*) FROM signup WHERE username='$username' and activated='1'");
        $Arow = mysqli_fetch_array($Aresult);
        $Atotal = $Arow[0];

    if ($Utotal > 0) {
        
        $Presult = mysqli_query($conn->connect(), "SELECT password FROM signup WHERE username='$username' limit 1");
        $Prow = mysqli_fetch_array($Presult);
        $Pstored = $Prow[0];

        $code = bin2hex(random_bytes(10));

        if (password_verify($password, $Pstored) == true) {

            if ($Atotal > 0) {
                header("Location: http://localhost/Projects/IAS%20Final%20Project/reservation.php?user=".$username."&randstr=".$code);
                die();
            } else {
                echo "<script>alert('Your account has not yet been verified. Please check your email for the verification email and click on the link.'); window.location.href = '../signup.html';</script>";
            }
            
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href = '../signup.html';</script>";
        }
    } else {
        echo "<script>alert('Incorrect username or password');window.location.href = '../signup.html';</script>";
    }
}


?>