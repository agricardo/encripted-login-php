<?php
    session_start();
    if( ! count($_SESSION)) header("Location: login.php");
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
?>

<h1>Profile</h1>
<p>Your information:</p>

<ul>
    <li>Name: <?=$name?></li>
    <li>Email: <?=$email?></li>
</ul>

<a href="home.php">Home</a><br/>
<a href="login.php">Logout</a>

<form action="profile.php" method="POST">
    <input type="text" name="name" placeholder="name" required />
    <input type="email" name="email" placeholder="email" required />
    <!-- <input type="password" name="password" placeholder="password" required /> -->
    <input type="submit" value="Change"/>
</form>