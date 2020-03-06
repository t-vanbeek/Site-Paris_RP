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
        <?php
        if($_SESSION['rank'] == "IT") {
            echo "
          <a href='it.php'>IT ONLY</a><br>  
          <a href='accept.php'>Accepteer accounts</a><br>
          <a href='interviews.php'>HR Interviews</a><br>
          <a href='index.php' class'=logout'>Logout</a>  "; 
        } elseif ($_SESSION['rank'] == "Owner") {
            echo "
            <a href='accept.php'>Accepteer accounts</a><br>
            <a href='interviews.php'>HR Interviews</a><br>
            <a href='index.php' class='logout'>Logout</a> ";  
        } elseif ($_SESSION['rank'] == "Head Manager") {
            echo "
            <a href='interviews.php'>HR Interviews</a><br>
            <a href='index.php' class='logout'>Logout</a> ";
        }elseif ($_SESSION['rank'] == "Manager") {
            echo "
            <a href='interviews.php'>HR Interviews</a><br>
            <a href='index.php' class='logout'>Logout</a> "; 
        } elseif ($_SESSION['rank'] == "HR") {
           echo "<a href='index.php' class='logout'>Logout</a> ";  
        }
        
        ?>
    </div>
</body>

</html>