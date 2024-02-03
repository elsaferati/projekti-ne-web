<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="email" placeholder="Email..."><br><br>
        <input type="password" name="password" placeholder="Password..."><br><br>
        <input type="submit" name="registerBtn" value="Register"><br><br>
    </form>

    <?php include_once '../controller/registerController.php';?>
</body>
</html>