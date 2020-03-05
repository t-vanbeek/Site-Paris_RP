<?php
require 'connect.php';
if (isset($_SESSION['rank'])) {

    if ($_SESSION['rank'] == "In Afwachting") {
        header('Location: login.php');
    }
}
?>

<!DOCTYPE html>
<html class="background">

<head>
    <title>Home</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body>
    <div class="tabel">
    <h1 style="color: white;">
        <?php
        if (isset($_SESSION['rank']) && isset($_SESSION['username'])) {
            echo "Welkom ' " . $_SESSION['rank'] . " || " . $_SESSION['username'] . " ' op de Staffsite!";
        }
        ?>
    </h1>
    </div>
    <div class="sidebar">
        <a href="accept.php">Accepteer accounts oc+</a><br>
        <a href="interviews.php">HR Interviews manager+</a><br>
        <a href="index.php" class="logout">Logout</a>
    </div>
</body>

</html>