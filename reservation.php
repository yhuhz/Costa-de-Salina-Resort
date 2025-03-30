<?php
  $username = $_GET['user'];
  $code = $_GET['randstr'];
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
        <link rel="stylesheet" href="css/reservation.css">

        <!-- JS -->
        
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            <!--Navbar-->
            <div class="topBar">
                <h4>Costa de Salina</h4>
                <img src="images/logo.jpg" height="200px" width="200px">
                <div id="float_right">
                    <a href="index.php">Home</a>
                    <a href="about.html">About</a>
                    <a href="contact.html">Contact us</a>
                    <a id="bookBtn">Welcome <?php echo $username; ?></a>
                </div>
            </div>

              <div class="container">
                <div class="slideshow">
                    <div id="carouselResort" class="carousel slide carousel-fade" data-interval="false">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="images/Reservation/Resort/Resort (1).JPG" class="d-block w-100" alt="Resort Image" height="600">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="images/Reservation/Resort/Resort (2).JPG" class="d-block w-100" alt="Resort Image" height="600">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="images/Reservation/Resort/Resort (3).JPG" class="d-block w-100" alt="Resort Image" height="600">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="images/Reservation/Resort/Resort (4).JPG" class="d-block w-100" alt="Resort Image" height="600">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="images/Reservation/Resort/Resort (5).JPG" class="d-block w-100" alt="Resort Image" height="600">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="images/Reservation/Resort/Resort (6).JPG" class="d-block w-100" alt="Resort Image" height="600">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselResort" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselResort" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                </div>
                <div class="reservation-form">
                    <h3>Let's book that reservation!</h3>
                    <div class="form_container">
                      <form action="php api/reservation.php" method="post">
                        <input type="hidden" name="custUsername" id="custUsername" value="<?php echo $username; ?>">
                        <input type="hidden" name="custCode" id="custCode" value="<?php echo $code; ?>">
                          <fieldset class="border p-2" id="fset">
                            <legend class="w-auto" id="fset_legend">Reservation Date</legend>
                            <input type="date" id="reservation_date" name="reservation_date" min='1899-01-01' max='2000-13-13' value="1899-01-01" required> to <input type="date" id="end_date" name="end_date" min='1899-01-01' max='2000-13-13' value="1899-01-01" required>
                            <h4 id="days">Number of Days: 1</h4>
                          </fieldset>

                          <fieldset class="border p-2" id="fset">
                            <legend class="w-auto" id="fset_legend">Package</legend>
                            <select name="package" id="package">
                              <option value="Whole Resort">Whole Resort</option>
                              <option value="Big House">Big House</option>
                              <option value="Small House (side)">Small House (side)</option>
                              <option value="Small House (back)">Small House (back)</option>
                              <option value="Resort Grounds">Resort Grounds</option>
                            </select><br>
                            <h4 id="price">Price: </h4>
                          </fieldset>

                          <fieldset class="border p-2" id="fset">
                            <legend class="w-auto" id="fset_legend">Total Cost</legend>
                            <h4 id="totalCost">The total cost for your stay will be</h4>
                          </fieldset>

                          <div class="submit_btn">
                            <button id="book_btn" type="submit">Book now!</button>
                          </div>
                      </form>
                    </div>
                </div>
              </div>
        </div>
    </body>
    <script src="js/reservation.js"></script>
</html>