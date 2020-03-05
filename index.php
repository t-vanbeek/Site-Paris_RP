<?php
session_start();
$_SESSION['logged_in'] = false;
?>
<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>Paris Roleplay</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body class="background">
    <div></div>
    <a href="login.php"><button class="button">Log in</button></a>
    <div class="sidebar">
    <a href="joinTheDevs.htm">Join het web dev team!</a>
    </div>
</body>

</html>