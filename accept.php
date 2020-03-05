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
header('refresh:5;');
if ($_SESSION['logged_in'] != true) {
    header('Location: login.php');
}
if (isset($_SESSION['rank'])) {
    if ($_SESSION['rank'] != "Owner" && $_SESSION['rank'] != "IT") {
        header('Location: home.php');
    }
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Accounts</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body class="background">
    <h1 style="color: white; text-align:center">
        <?php
        if (isset($_SESSION['rank']) && isset($_SESSION['username'])) {
            echo "Welkom ' " . $_SESSION['username'] . " '";
        }
        ?>
    </h1>
    <div class="tabel">
        <h2>Gebruikers</h2>

        <?php
        $stmt = $pdo->query("SELECT id, naam, discord_id, Rank FROM accounts WHERE Rank != 'IT' AND Rank != 'Owner'");
        foreach ($stmt as $row) {
            echo "<p style='font-size: 8'> Naam: " . $row['naam'] . " | ID: " . $row['discord_id'] . " | Rank: " . $row['Rank'] . " | <a class='letter' href='account.php?id=" . $row['id'] . "'> Account aanpassen </a><br>";
        }
        ?>
        </p>
    </div>
    <div class="sidebar">
        <a href="home.php">Terug</a>
    </div>
</body>

</html>