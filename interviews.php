<?php
	session_start();
    $host = 'localhost';
    $db   = 'paris';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
if ($_SESSION['logged_in'] != true) {
    header('Location: login.php');
	exit;
}

if ($_SESSION['rank'] == "HR") {
	header('Location: Home.php');
	exit;
}

if (isset($_POST['create'])) {
    $naam = $_POST['name'];
    $discord = $_POST['id'];
    $groep = $_POST['groep'];


    $createaccount = 'INSERT INTO Interviews(naam, discordID, Groep)VALUES (?, ?, ?)';

    $pdo->prepare($createaccount)->execute([$naam, $discord, $groep]);

    echo "<h1 class='confirmation'>VERSTUURD!</h1>";
}
?>

<!DOCTYPE html>
<html class="background">

<head>
    <title>HR interviews</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body>
    <a href="Home.php"><button>Terug</button></a>
    <h1 hidden class="confirmation">Probeer het later nog eens</h1>
    <div class="border">
        <h2>HR toevoegen</h2>
        <form action="interviews.php" method="POST">
            <h3>Naam:</h3>
            <input style="border-radius:5px ;" type="text" id="name" name="name" required>
            <h3>Discord ID:</h3>
            <input style="border-radius:5px ;" type="number" id="id" name="id" required>
            <h3>groep:</h3>
            <input style="border-radius:5px ;" type="radio" id="groep" name="groep" value="Police">Police </input> 
            <br>
            <input style="border-radius:5px ;" type="radio" id="groep" name="groep" value="RAID">RAID </input> 
            <br>
            <input style="border-radius:5px ;" type="radio" id="groep" name="groep" value="Pompiers">Pompiers </input> 
            <br>
            <input style="border-radius:5px ;" type="radio" id="groep" name="groep" value="Ambulance">Ambulance </input>
            <br>
            <br>
            <br>
            <input type="submit" name="create" style="border-radius:5px ;" value="Aanmaken">

        </form>

    </div>

</body>

</html>