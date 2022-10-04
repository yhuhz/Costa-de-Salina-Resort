<?php
    include ('connection.php');
    $conn = new Connection();

    if (isset($_POST['signup_name'])) {
        $name = $_POST['signup_name'];
        $email = $_POST['signup_email'];
        $number = $_POST['signup_number'];
        $username = $_POST['signup_username'];
        $password1 = $_POST['signup_password1'];
        $password2 = $_POST['signup_password2'];
        $hashed_pass = password_hash($password1, PASSWORD_DEFAULT);

        /*
        $sql = "INSERT INTO signup (name, email, number, username, password) VALUES ('$name', '$email', '$number', '$username', '$hashed_pass')";
        */
        /*
        mysqli_query($conn->connect(), $sql);
        echo "<script>alert('Thank you for your registration.\nPlease check your email for confirmation.'); window.location.href = '../contact.html';</script>";
        */

        $Uresult = mysqli_query($conn->connect(), "SELECT COUNT(*) FROM signup WHERE username='$username'");
        $Urow = mysqli_fetch_array($Uresult);
        $Utotal = $Urow[0];

        $Eresult = mysqli_query($conn->connect(), "SELECT COUNT(*) FROM signup WHERE email='$email'");
        $Erow = mysqli_fetch_array($Eresult);
        $Etotal = $Erow[0];

        if ($password1 != $password2) {
            echo "<script>alert('Passwords do not match!'); window.location.href = '../signup.html';</script>";
        } else {
            if ($Utotal > 0) {
                echo "<script>alert('Username already taken!'); window.location.href = '../signup.html';</script>";
            } else {
                if ($Etotal > 0) {
                    echo "<script>alert('E-mail address already taken!'); window.location.href = '../signup.html';</script>";
                } else {
                    try {
                        include ('sendMessage.php');
                    } catch (Exception $e) {
                        echo "<script>alert('Error submitting information!'); window.location.href = '../signup.html';</script>";
                    }
                    
                }
            }
        }   
    }
?>