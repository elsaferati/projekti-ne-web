<?php
@include 'config2.php';
 include_once 'userRepository.php';
include_once 'user.php'; 

/* if(isset($_POST['registerBtn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if(!empty($_POST['name']) && !empty($_POST['email'])&& !empty($_POST['password']) && !empty($_POST['cpassword'])){
        if($password== $cpassword){
        $p=crud::conect()->prepare('INSERT INTO crudtable(name, email, password, cpassword) VALUES(:n,:e,:p,:cp)');
        $p->bindValue(':n', $name);
        $p->bindValue(':e', $email);
        $p->bindValue(':p', $password);
        $p->bindValue(':cp', $cpassword);
        $p->execute();
        }else{
            echo 'password does not match';
        }
    }
} */






if(isset($_POST['registerBtn'])){
    if(empty($_POST['name']) || empty($_POST['email'])  || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $username.rand(100,999);

        $user  = new User($id,$name,$email,$password);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);


    }
}

if(isset($_POST['submit'])){


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    $select = " SELECT * from `crudtable` where email = '$email' &&
    password = '$password' ";

$result = mysqli_query($conn, $select);

if ($result === false) {
    // Handle the query execution error
    $error[] = 'Error executing the query: ' . mysqli_error($conn);
} else {
    // Check if any rows were returned
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
        $error[] = 'User already exists!';
    } else {
        // Check if password matches confirmation
        if($password != $cpassword){
            $error[] = 'Password does not match confirmation!';
        } else {
            // Insert new user into database
            $insert = "INSERT INTO `crudtable` (name, email, password)
                       VALUES ('$name', '$email', '$password')";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result === false) {
                // Handle the insertion error
                $error[] = 'Error inserting user: ' . mysqli_error($conn);
            } else {
                // User inserted successfully
                // You may want to redirect the user to a success page or do something else here
            }
        }
    }
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

    <title>Register</title>
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
            <button onclick="openMenu()"><img class="burget-icon"
                    src="images/burger.jpg" alt="burget-icon" /></button>
        </div>
    </header>


    <main>
   
        <div class="hero">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" controls>
                <source src="images/Untitled video - Made with Clipchamp.mp4" type="video/mp4">
              </video>
          <div class="form-container">
            <form action="" method="post">
            <h3>register now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="log-in.php">login now</a></p>
          </form>
          <?php include_once 'registerController.php';?>
        </div>
        </div>

       
            
       
        <script>
  

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