<?php
@include 'config.php';

if(isset($_POST['submit'])){


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($conn, $_POST['password']);

    $select = " SELECT * from user_form where email = '$email' &&
    password = ' $password ' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    }
    else {
        $insert = "INSERT INTO user_form(id,name,email,password)
        VALUES('$name', '$email', '$password')";
        mysqli_query($conn, $insert);
        
    }

};


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Overpass:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/log-in-style.css">
    <link rel="stylesheet" href="styles/shared.css"> 
    <link rel="stylesheet" href="styles/header.css">
    <script src="script/header.js" type="text/javascript"></script>

    <title>Log-in</title>
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
                <button class="close-button" onclick="closeMenu()"><img class="close-icon"
                        src="images/close.jpg" alt="close-icon" /></button>
            </div>
            <div class="nav-item">
                <a class="nav-item-href primary-button" href="log-in.html">
                    Join us
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="about.html">
                    <nav>About us</nav>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="contact-us.html">
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
            <button onclick="openMenu()"><img class="burget-icon"
                    src="images/burger.jpg" alt="burget-icon" /></button>
        </div>
    </header>


    <main>
   
        <div class="hero">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" controls>
                <source src="images/Untitled video - Made with Clipchamp.mp4" type="video/mp4">
              </video>
            <div class="form-box">
               <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
               </div>    
               <div class="social-icons">
               
               
            </div>
            <form id="login" class="input-group" name="form"  onsubmit="return validateLoginForm()" method="post">
                <input type="email"  class="input-field" id="userId" name="email" placeholder="User Email">
                <div class="error-message" id="emailError"></div>
                <input type="password" class="input-field" id="password" name="password" placeholder="Enter Password">
                <div class="pass-message" id="passError"></div>
                <input type="checkbox" class="chech-box"> <span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form id="register" class="input-group"  name="form"  method="post"  onsubmit="return validateRegisterForm()">
            <?php
               if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
               }
            ?>
                <input type="text" class="input-field" name="name" id="registerUser" placeholder="User Name" >
                <div class="user-message" id="userError"></div>
                <input type="email" class="input-field" name="email" id="userId" placeholder="Email Id">
                <div class="error-message" id="emailError"></div>
                <input type="password" class="input-field" id="password" name="password" placeholder="Enter Password">
                <div class="pass-message" id="passError"></div>
                <input type="checkbox" class="chech-box"> <span>I agree to the terms
                    & conditions </span>
                <button type="submit" class="submit-btn" name="submit" >Register</button>
            </form>
            </div>
        </div> 
        <script>
          var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
}
document.addEventListener("load", login);
document.addEventListener("load", register);




        window.addEventListener('load', function () {
    login();  
});
window.addEventListener('load', function () {
    register();  
});


let emailRegex = /^[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
let passRegex = /^[a-z1-9]{8,15}$/;
let userRegex = /^[a-zA-Z]$/;


function validateLoginForm() {

    let emailInput = document.getElementById('userId');
    let emailError = document.getElementById('emailError');
    let passInput = document.getElementById('password');
    let passError = document.getElementById('passError');
    

    emailError.innerText = '';
    passError.innerText = '';


    if (!emailRegex.test(emailInput.value)) {
        emailInput.style.border = "1px solid red";
        emailError.innerText = 'Invalid email';
        return false;
    }

    if (!passRegex.test(passInput.value)) {
        passInput.style.border = "1px solid red";
        passError.innerText = 'Invalid password';
        return false;
    }

    alert('Login form submitted successfully!');
    return true;
}

function validateRegisterForm() {

    let emailInput = document.getElementById('userId');
    let emailError = document.getElementById('emailError');
    let passInput = document.getElementById('password');
    let passError = document.getElementById('passError');
    let userInput = document.getElementById('registerUser');
    let userError = document.getElementById('userError');

    emailError.innerText = '';
    passError.innerText = '';
    userError.innerText = '';

    if (!emailRegex.test(emailInput.value)) {
        emailInput.style.border = "1px solid red";
        emailError.innerText = 'Invalid email';
        return false;
    }

    if (!passRegex.test(passInput.value)) {
        passInput.style.border = "1px solid red";
        passError.innerText = 'Invalid password';
        return false;
    }

    if (!userRegex.test(userInput.value)) {
        userInput.style.border = "1px solid red";
        userError.innerText = 'Invalid user ID';
        return false;
    }

    alert('Register form submitted successfully!');
    return true;
}

      
        
    </script>
    </main>
    <footer style="margin-top: 43.5rem;">
        <div id="footer-part">
            <section id="social-part">
           <h3>Social</h3>
             <ul class="footer-content-special">
       <li > 
           <a href="https://www.facebook.com">
               <img class="last-img" src="images/facebook.jpg" alt="facebook">
           </a>
          
       <li>
           <a href="https://www.instagram.com">
               <img  class="last-img" src="images/insta.jpg" alt="instagram"></li>
           </a>
       <li> 
           <a href="https://www.linkedIn">
               <img  class="last-img" src="images/in.jpg" alt="linkedin"></li>
           </a>
        <li> 
           <a href="https://www.youtube.com">
               <img  class="last-img" src="images/youtube.jpg" alt="youtube"></li>
           </a>
        <li><a href="https://twitter.com"> 
           <img  class="last-img" src="images/twitter.jpg" alt="twitter"></li>
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