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
    $stmt = $pdo->query("SELECT * FROM accounts WHERE naam = LIKE "  . $_SESSION['username']);
    foreach ($stmt as $row) {
        $_SESSION['username'] = $row['naam'];
        $_SESSION['password'] = $row['Password'];
        $_SESSION['rank'] = $row['Rank'];
    }
    header('refresh: 10;');
if ($_SESSION['logged_in'] != true) {
    header('Location: login.php');
}
