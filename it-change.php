<?php
session_start();
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
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

if ($_SESSION['logged_in'] != true) {
    header('Location: login.php');
}
if (isset($_SESSION['rank'])) {
    if ($_SESSION['rank'] != "IT") {
        header('Location: home.php');
    }
} else {
    header('Location: index.php');
}
$newRank = "Kies een Rank hieronder!";
if (isset($_POST['Rank']) && !empty($_POST['Rank'])) {
}
if (isset($_POST['Send'])) {
    $newRank = $_POST['Rank'];
    $naam = $_POST['naam'];
    $id = $_POST['id'];
    $ww = $_POST['password'];
    $sql = "UPDATE accounts SET naam=?, Password=?, discord_id=?, Rank=? WHERE id=?";
    $run = $pdo->prepare($sql);
    $run->execute([$naam, $ww, $id, $newRank, $_GET['id']]);
    header('Location: it.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Aanpassen</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body class="background">
    <h1 style="color: white; text-align: center;">
        <?php
        if (isset($_SESSION['rank']) && isset($_SESSION['username'])) {
            echo "Welkom ' " . $_SESSION['username'] . " '";
        }
        ?>
    </h1>
    <div class="tabel">
        <?php
        $stmt = $pdo->query("SELECT * FROM accounts WHERE id = " . $_GET['id']);
        ?>
        <form method="POST" action="" class="letter">
            <h3><?php
                $row['naam']
                ?> aanpassen</h3>
            <h5 class="letter">
                <input type="text" placeholder="naam" id="naam" name="naam" value="<?php $row['naam'] ?>"><br>
                <input type="number" placeholder="discord ID" id="discord_id" name="id" value="<?php $row['discord_id'] ?>"><br>
                <input type="text" placeholder="Wachtwoord" id="wachtwoord" name="password" value="<?php $row['Password'] ?>"><br>
                <input type="radio" id="Rank" name="Rank" value="IT">IT<br>
                <input type="radio" id="Rank" name="Rank" value="Owner">Owner<br>
                <input type="radio" id="Rank" name="Rank" value="Head Manager">Head Manager<br>
                <input type="radio" id="Rank" name="Rank" value="Manager">Manager<br>
                <input type="radio" id="Rank" name="Rank" value="HR">HR<br>
                <input type="radio" id="Rank" name="Rank" value="In Afwachting">Deactiveer<br>
                <input type="submit" name="Send" value="Opsturen">
            </h5>
        </form>
    </div>
    <div class="sidebar">
        <a href="it.php">Terug</a>
        <span class="letter">
            <?php
            foreach ($stmt as $row) {
                echo "Naam: " . $row['naam'] . "<br>";
                echo "ID: " . $row['discord_id'] . "<br>";
                echo "Rank: " . $row['Rank'] . "<br>";
                echo "Wachtwoord: " . $row['Password'] . "<br>";
            }
            ?>
        </span>
    </div>
</body>

</html>