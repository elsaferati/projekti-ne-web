<?php
session_start();

require_once('data.php');
require_once('user_bookings.php');
require_once('books.php'); // The file where the User class is defined

if(isset($_POST['submit_paris'])) {
    $user = isset($_POST['user_paris']) ? $_POST['user_paris'] : '';
    $hotel = isset($_POST['hotel_paris']) ? $_POST['hotel_paris'] : '';
    $date = isset($_POST['date_paris']) ? $_POST['date_paris'] : '';
    $id = $user . rand(100,999); // Generating a unique ID

    // Create a new User object
    $userObj = new User($id, $user, $hotel, $date);
    
    // Create a new instance of UserRepository
    $userRepository = new UserRepository();

    // Insert the user into the database
    $userRepository->insertUser($userObj);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotels</title>
  <link rel="stylesheet" href="styles/shared.css">
    <link rel="stylesheet" href="styles/header.css">
  <script src="script/header.js" type="text/javascript"></script>
  <link rel="stylesheet" href="styles/hotels.css">
</head>
<body>
  <header>
    <div class="logo-container">
        <div class="logo-image-container">
            <img class="logo" src="images/2(1).png" alt="Logo" />
        </div>
        <div class="logo-text-container">
            <p id="title"><a href="index.html"><strong>W A V E</strong></a></p>
            <p id="under-title">Do More Than Travel</p>
        </div>
    </div>

    <div class="navigation" id="navigation">
        <div class="nav-item item-close-button">
            <button class="close-button" onclick="closeMenu()"><img class="close-icon" src="images/close.jpg"
                    alt="close-icon" /></button>
        </div>
        <div class="nav-item">
            <a class="nav-item-href primary-button" href="log-in.php">
                Join us
            </a>
        </div>
        <div class="nav-item">
            <a class="nav-item-href" href="about.html">
                <nav>About us</nav>
            </a>
        </div>
        <div class="nav-item">
          <a class="nav-item-href" href="contact-us.php">
              Contact us
          </a>
      </div>
        <div class="nav-item">
            <a class="nav-item-href" id="menu" href="#"> Destinations </a>
            <div class="dropdown">
                <ul>
                    <li><a href="albania.html">Albania</a></li>
                    <li><a href="sweden.html">Sweden</a></li>
                    <li><a href="italy.html">Italy</a></li>
                    <li><a href="uk.html">UK</a></li>
                    <li><a href="greece.html">Greece</a></li>
                    <li><a href="spain.html">Spain</a></li>
                </ul>
            </div>
            </a>
        </div>
    </div>
    <div class="burger-menu">
        <button onclick="openMenu()"><img class="burget-icon" src="images/burger.jpg" alt="burger-icon" /></button>
    </div>
</header>
  <main>
    <div class="headd">
      <div class="button1"><img src="images/hotel.png" alt="hotel"></div>
      <div class="button2"><a href="tickets.html"><img src="images/plane.jpg" alt="plane"></a></div>
    </div>

    <form action="hotels.php" method="POST">
  <div class="foto" style="background-color: rgb(17, 17, 36); ">
    <div class="fotot">

      <!-- Paris -->
      <div>
        <img src="images/paris.jpg" alt="paris">
        <p>Paris, France</p>
        <label for="date_paris">Date:</label>
        <input type="date" id="date_paris" name="date_paris" required>
        <label for="user_paris">User:</label>
        <input type="text" id="user_paris" name="user_paris" required>
        <label for="hotel_paris">Select hotel:</label>
        <select name="hotel_paris" id="hotel_paris">
          <option value=""></option>
          <option value="Ritz Hotel">Ritz Hotel</option>
          <option value="B&B Hotel">B&B Hotel</option>
          <option value="SO Paris Hotel">SO Paris Hotel</option>
        </select>
        <input type="submit" name="submit_paris" value="Book">
      </div>
</form>

<form action="hotels.php" method="POST">
      <!-- Budapest -->
      <div>
        <img src="images/budapest.jpg" alt="budapest">
        <p>Budapest, Hungary</p>
        <label for="date_budapest">Date:</label>
        <input type="date" id="date_budapest" name="date_budapest" required>
        <label for="user_budapest">User:</label>
        <input type="text" id="user_budapest" name="user_budapest" required>
        <label for="hotel_budapest">Select hotel:</label>
        <select name="hotel_budapest" id="hotel_budapest">
          <option value=""></option>
          <option value="Marriott Hotel">Marriott Hotel</option>
          <option value="City Hotel">City Hotel</option>
          <option value="Hilton Hotel">Hilton Hotel</option>
        </select>
        <input type="submit" name="submit_budapest" value="Book">
      </div>
      </form>
      <!-- New York -->
      <form action="hotels.php" method="POST">
      <div>
        <img src="images/new york.jpg" alt="new york">
        <p>New York, USA</p>
        <label for="date_ny">Date:</label>
        <input type="date" id="date_ny" name="date_ny" required>
        <label for="user_ny">User:</label>
        <input type="text" id="user_ny" name="user_ny" required>
        <label for="hotel_ny">Select hotel:</label>
        <select name="hotel_ny" id="hotel_ny">
          <option value=""></option>
          <option value="The Plaza Hotel">The Plaza Hotel</option>
          <option value="Greenwich Hotel">Greenwich Hotel</option>
          <option value="Carlyle Hotel">Carlyle Hotel</option>
        </select>
        <input type="submit" name="submit_ny" value="Book">
      </div>
</form>

<form action="hotels.php" method="POST">
      <div>
        <img src="images/tirana.jpg" alt="tirana">
        <p>Tirana, Albania</p>
        <label for="date_ny">Date:</label>
        <input type="date" id="date_ny" name="date_ny" required>
        <label for="user_ny">User:</label>
        <input type="text" id="user_ny" name="user_ny" required>
        <label for="hotel_ny">Select hotel:</label>
        <select name="hotel_ny" id="hotel_ny">
          <option value=""></option>
          <option value="Marriott Hotel">Marriott Hotel</option>
          <option value="Plaza Hotel">Plaza Hotell</option>
          <option value="Mondial Hotel">Mondial Hotel</option>
        </select>
        <input type="submit" name="submit_ny" value="Book">
      </div>
</form>

<form action="hotels.php" method="POST">
      <div>
        <img src="images/prishtina.jpg" alt="prishtina">
        <p>Prishtine,Kosova</p>
        <label for="date_ny">Date:</label>
        <input type="date" id="date_ny" name="date_ny" required>
        <label for="user_ny">User:</label>
        <input type="text" id="user_ny" name="user_ny" required>
        <label for="hotel_ny">Select hotel:</label>
        <select name="hotel_ny" id="hotel_ny">
          <option value=""></option>
          <option value="Emerald Hotel">Emerald Hotel</option>
          <option value="Garden Hotel">Garden Hotell</option>
          <option value="Swiss Hotel">Swiss Hotel</option>
        </select>
        <input type="submit" name="submit_ny" value="Book">
      </div>
</form>

<form action="hotels.php" method="POST">
      <div>
        <img src="images/rome.jpg" alt="rome">
        <p>Rome,Italy</p>
        <label for="date_ny">Date:</label>
        <input type="date" id="date_ny" name="date_ny" required>
        <label for="user_ny">User:</label>
        <input type="text" id="user_ny" name="user_ny" required>
        <label for="hotel_ny">Select hotel:</label>
        <select name="hotel_ny" id="hotel_ny">
          <option value=""></option>
          <option value="Grand Hotel">Grand Hotel</option>
          <option value="Hassler Hotel">Hassler Hotell</option>
          <option value="Artemide Hotel">Artemide Hotel</option>
        </select>
        <input type="submit" name="submit_ny" value="Book">
      </div>
</form>

<form action="hotels.php" method="POST">
      <div>
        <img src="images/berlin.webp" alt="berlin">
        <p>Berlin,Germany</p>
        <label for="date_ny">Date:</label>
        <input type="date" id="date_ny" name="date_ny" required>
        <label for="user_ny">User:</label>
        <input type="text" id="user_ny" name="user_ny" required>
        <label for="hotel_ny">Select hotel:</label>
        <select name="hotel_ny" id="hotel_ny">
          <option value=""></option>
          <option value="Meliá Hotel">Meliá Hotel</option>
          <option value="Hampton Hotel">Hampton Hotell</option>
          <option value="Hilton Hotel">Hilton Hotel</option>
        </select>
        <input type="submit" name="submit_ny" value="Book">
      </div>
</form>

<form action="hotels.php" method="POST">
      <div>
        <img src="images/sweden.jpg" alt="sweden">
        <p>Stockholm,Sweden</p>
        <label for="date_ny">Date:</label>
        <input type="date" id="date_ny" name="date_ny" required>
        <label for="user_ny">User:</label>
        <input type="text" id="user_ny" name="user_ny" required>
        <label for="hotel_ny">Select hotel:</label>
        <select name="hotel_ny" id="hotel_ny">
          <option value=""></option>
          <option value="Berns Hotel">Berns Hotel</option>
          <option value="Ett Hem Hotel">Ett Hem Hotell</option>
          <option value="J Hotel">J Hotel</option>
        </select>
        <input type="submit" name="submit_ny" value="Book">
      </div>
</form>
    </div>
  </div>
</form>

    <div class="destn"><p>Destinations</p></div>
    <div class="boxx" style="margin: 0;padding: 0;">
      <div class="box">
      <span style="--i:1"><img src="images/albania2.jpg" alt="Albania"></span>
      <span style="--i:2"><img src="images/sweden1.jpg" alt="Sweden"></span>
      <span style="--i:3"><img src="images/italy2.jpg" alt="Italy"></span>
      <span style="--i:4"><img src="images/uk1.jpg" alt="UK"></span>
      <span style="--i:5"><img src="images/greece1.webp" alt="Greece"></span>
      <span style="--i:6"><img src="images/spainn.jpg" alt="Spain"></span>
      <span style="--i:7"><img src="images/paris.jpg" alt="Paris"></span>
      <span style="--i:8"><img src="images/berlin.webp" alt="Berlin"></span>
    </div>
<script type="text/javascript">
  let box = document.querySelector('.box');
  window.onmousemove = function(e){
    let x = e.clientX/3;
    box.style.transform = "perspective(1000px) rotateY("+x+"deg)";
  }
</script></div>
  </main>
  <footer>
    <div id="footer-part">
        <section id="social-part">
            <h3>Social</h3>
            <ul class="footer-content-special">
                <li>
                    <a href="https://www.facebook.com">
                        <img class="last-img" src="images/facebook.jpg" alt="facebook">
                    </a>

                <li>
                    <a href="https://www.instagram.com">
                        <img class="last-img" src="images/insta.jpg" alt="instagram">
                </li>
                </a>
                <li>
                    <a href="https://www.linkedIn">
                        <img class="last-img" src="images/in.jpg" alt="linkedin">
                </li>
                </a>
                <li>
                    <a href="https://www.youtube.com">
                        <img class="last-img" src="images/youtube.jpg" alt="youtube">
                </li>
                </a>
                <li><a href="https://twitter.com">
                        <img class="last-img" src="images/twitter.jpg" alt="twitter"></li>
                </a>


            </ul>
        </section>

        <section>
            <h3>Product</h3>
            <ul class="footer-content">
                <li>
                    <p>The plum test</p>
                </li>
                <li>
                    <p>Become a host</p>
                </li>
                <li>
                    <p>Affiliate program</p>
                </li>
            </ul>
        </section>
        <section>
            <h3>Company</h3>
            <ul class="footer-content">
                <li>
                    <p>Our story</p>
                </li>
                <li>
                    <p>Journal</p>
                </li>
                <li>
                    <p>Careers</p>
                </li>
            </ul>
        </section>
        <section>
            <h3>Contact</h3>
            <ul class="footer-content">
                <li>
                    <p>Partenship</p>
                </li>
                <li>
                    <p>FAQ</p>
                </li>
                <li>
                    <p>Get in touch</p>
                </li>
            </ul>
        </section>
    </div>


</footer>

</body>

</html>
</body>

</html>