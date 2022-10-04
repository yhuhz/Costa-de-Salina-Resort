<!DOCTYPE html>
<html>
    <head>
        <Title>Verified</Title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

    <body>
        <h1>Your account is now verified!</h1><br>

        <p>Congratulations <b><?php echo $_GET['username'];?></b> your account is now activated with code: <b><?php echo $_GET['code'];?></b>!</p>
    </body>
</html>

<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "costa_de_salina";

    $conn = new mysqli($host, $user, $password, $db);

    $usernameact = $_GET['username'];
    $codeact = $_GET['code'];
    $activated = 1;

    $sql = "UPDATE signup SET activation_code = '$codeact', activated = '$activated' WHERE username='$usernameact'";
    mysqli_query($conn, $sql) or die ("unable to insert values");

    $conn->close();

?>