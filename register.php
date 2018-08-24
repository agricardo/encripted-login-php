<?php

$msg = "";


if(isset($_POST['submit'])){
    $con = new mysqli('localhost','root','','passwordHashing');

    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $cPassword = $con->real_escape_string($_POST['cPassword']);

        if($password != $cPassword){
            $msg = "Please Check Your Password";
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $con->query("INSERT INTO users (name,email,password) VALUES ('$name', '$email', '$hash')");

            header("Location: login.php");
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration page</title>
</head>
<body>
    
<h1>Registration form</h1>
<br>
<br>
<form method="POST" action="register.php">
<input name="name" placeholder="name"><br>
<input name="email" placeholder="email" type="email"><br>
<input name="password" type="password" placeholder="password"><br>
<input name="cPassword" type="password" placeholder="Confirm password"><br>
<input name="submit" type="submit" value="Register"><br>
</form>


</body>
</html>