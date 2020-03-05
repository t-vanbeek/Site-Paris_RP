<?php
session_start();
?>
<?php
$host = 'localhost';
$db   = 'id12751280_staff';
$user = 'id12751280_staff';
$pass = 'staff';
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
?>
<?php
 
//home.php

 
 
/**
 * Check if the user is logged in.
 */
//if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
//    header('Location: index.php');
//    exit;
//}
 if($_GET['loginname'] == NULL || $_GET['Password'] == NULL ) {
     header('location: index.php');
     exit;
 }
 
/**
 * Print out something that only logged in users can see.
 */
 
//echo '<h1 style="color: white;> "Congratulations! You are logged in! </h1>';
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
    <div class="border">
        <a href="interviews.php"><button>Interviews</button></a>
        <a href="index.php"><button>Logout</button></a>
    </div>
</body>

</html>