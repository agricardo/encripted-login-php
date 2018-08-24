<?php

$msg = "";


if(isset($_POST['submit'])){
$con = new mysqli('localhost', 'root', '', 'passwordHashing');


    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    $sql = $con->query( "SELECT id, password FROM users WHERE email = '$email'");
    if ($sql->num_rows > 0){
        $data = $sql->fetch_array();
        if(password_verify($password, $data['password'])){

            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;

            // send to home
            header("Location: home.php");
        }
    }else{
        $msg = "Please check your inputs!";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
</head>
<body>
    
<h1>Login page</h1>
<br>
<?php if($msg != "") echo $msg . "<br><br></br>"; ?>
<br>
<form method="POST" action="login.php">

<input name="email" placeholder="email" type="email"><br><br>
<input name="password" type="password" placeholder="password"><br><br>

<input name="submit" type="submit" value="Log in"><br>
</form>
<br>
<br>


<a href="register.php">Register</a><br/>

</body>
</html>