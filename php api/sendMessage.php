<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


//echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."<br />";
$mail = new PHPMailer(true);
try{
    $code=getVerificationCode();
    $mail->isSMTP();                                        // Send using SMTP
    $mail->Host       = 'smtp.mail.yahoo.com';                   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    //use your own account details
    //if you are using a gmail account, turn on less secured app under security
    $mail->Username   = 'YOUR EMAIL';            // SMTP username
    $mail->Password   = 'YOUR PASSWORD';                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('YOUR EMAIL', 'YOUR NAME');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addCC('xxxxxx@gmail.com');
    $mail->Subject = "Verify your account";
    
    $message = file_get_contents('verification_email.php');
    $activation_link = "http://localhost/Projects/IAS%20Final%20Project/php%20api/activation.php?username=$username&code=$code";
    $mail->Body = $message . "\n" . "<div style='display: flex; align-items: center; justify-content: center; left: 50%;'><a href='$activation_link' style='background-color: #0061A8;color: #fff;padding: 10px 15px;'>Click here</a></div>";
    $mail->IsHTML(true);
 
    $mail->send();

    $sql = "INSERT INTO signup (name, email, number, username, password) VALUES ('$name', '$email', '$number', '$username', '$hashed_pass')";
    mysqli_query($conn->connect(), $sql);

    
    echo "<script>alert('You are now registered! Please check your email for confirmation.'); window.location.href = '../signup.html';</script>";
    
    // echo "<script>alert('You are now registered! Please check your email for confirmation.');</script>";
    
} catch (Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

function getVerificationCode()
    {
        return bin2hex(random_bytes(10));
    }
?>