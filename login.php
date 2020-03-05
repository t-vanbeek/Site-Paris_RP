<?php
	session_start();
	$_SESSION['logged_in'] = false;
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
    
	if ($_SESSION['rank'] == "In Afwachting"){
		$errMsg = "Je account moet nog geactiveert worden!";
	}
	
	if(isset($_POST['Login'])) {
		$errMsg = '';

		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';

		if($errMsg == '') {
			try {
				$stmt=$pdo->prepare('SELECT id, naam, Password, Rank FROM accounts WHERE naam = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "Gebruiker $username niet gevonden";
				}
				else {
					if($password == $data['Password']) {
						$_SESSION['username'] = $data['naam'];
                        $_SESSION['password'] = $data['Password'];
						$_SESSION['rank'] = $data['Rank'];
                        $_SESSION['logged_in'] = true;

						header('Location: home.php');
						exit;
					}
					else
						$errMsg = "Wachtwoord klopt niet.";
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>
<!DOCTYPE html>
<html class="background">

<head>
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body>

    <div class="login">
		<h1>Sign In</h1>
		<?php
		if (isset($errMsg)) {
		echo $errMsg;
		}
		?>
        <form method="post">
            <h3>Login Name:</h3>
            <input type="text" style="border-radius: 5px;" name="username"><br>
            <h3>Password:</h3>
            <input type="password" style="border-radius: 5px;" name="password"><br><br>
			<input type="submit" style="border-radius: 5px;" name="Login" value="Login">
			</form>
			<br><br>
			<a href="register.php"><button style="border-radius: 5px;">Nog geen account?</button></a>
            <h3>Account niet geactiveerd?</h3>
            <h5>Vraag het na bij de IT op Discord: 𝕿𝖍𝖔𝖗𝖛𝖆𝖑𝖉#6442</h5>
		
		<a href="index.php"><button style="border-radius: 5px;">Terug naar de site</button></a>
    </div>
</body>

</html>