<?php
    session_start();
    if( ! count($_SESSION)) header("Location: login.php");
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
?>

<h1>Home</h1>
<p>Hello <?=$name?> this is your home screen.</p>

<a href="profile.php">Profile</a><br/>
<a href="login.php">Logout</a>