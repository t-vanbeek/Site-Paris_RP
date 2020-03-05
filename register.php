<?php
$host = 'localhost';
$db   = 'paris';
$user = 'root';
$pass = 'Mops2016@';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

if (isset($_POST['create'])) {
    $naam = $_POST['name'];
    $discord = $_POST['id'];
    $ww = $_POST['password'];


    $createaccount = 'INSERT INTO `accounts`(naam, Password, discord_id, Rank)VALUES (?, ?, ?, ?)';

    $pdo->prepare($createaccount)->execute([$naam, $ww, $discord, "In Afwachting"]);

    echo "<h1 class='confirmation'>VERSTUURD!</h1>";
}
?>

<!DOCTYPE html>
<html class="background">

<head>
    <title>Staff acc aanmaken</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body>

    <h1 hidden class="confirmation">Probeer het later nog eens</h1>
    <div class="border">
        <h2>Account aanmaken</h2>
        <form action="register.php" method="POST">
            <h3>Naam:</h3>
            <input style="border-radius:5px ;" type="text" id="name" name="name" required>
            <h3>Discord ID:</h3>
            <input style="border-radius:5px ;" type="number" id="id" name="id" required>
            <h3>Wachtwoord:</h3>
            <input style="border-radius:5px ;" type="password" id="password" name="password" required>
            <br>
            <br>
            <input type="submit" name="create" style="border-radius:5px ;" value="Aanmaken">

        </form>
        <br><br>
        <a href="login.php"><button style="border-radius: 5px;">Terug</button></a>
    </div>

</body>

</html>