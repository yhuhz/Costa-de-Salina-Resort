<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "costa_de_salina";

    $conn = new mysqli($host, $user, $pass, $db);


    if(isset($_POST['signup_username'])){
        $username = mysqli_real_escape_string($conn, $_POST['signup_username']);
        $query = "select count(*) as cntUser from signup where username='".$username."'";
     
        $result = mysqli_query($conn, $query);
        $response = "<span style='color: green;font-size: 15px;'>Username available</span>";
        if(mysqli_num_rows($result)){
           $row = mysqli_fetch_array($result);
     
           $count = $row['cntUser'];
         
           if($count > 0){
               $response = "<span style='color: red;font-size: 15px; '>Username not available</span>";
           }
        
        }
     
        echo $response;
        die;
    }
?>