<?php
require 'connect.php';
if ($_SESSION['rank'] == "In Afwachting") {
        header('Location: login.php');
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
	<h1 style="color: white;">
		<?php
		echo "Welkom ' " . $_SESSION['rank'] . " || " . $_SESSION['username'] . " ' op de Staffsite!";
		?>
	</h1>
    <div class="border">
        <a href="interviews.php"><button>Interviews</button></a>
        <a href="index.php"><button>Logout</button></a>
    </div>
</body>

</html>