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

if (isset($_POST['Login'])) {

    //Retrieve the field values from our login form.
    $username = !empty($_POST['loginname']) ? trim($_POST['loginname']) : null;
    $passwordAttempt = !empty($_POST['Password']) ? trim($_POST['Password']) : null;

    //Retrieve the user account information for the given username.
    $sql = "SELECT id, naam, password FROM accounts WHERE naam = :username";
    $stmt = $pdo->prepare($sql);

    //Bind value.
    $stmt->bindValue(':username', $username);

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if ($user === false) {
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else {
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['Password']);

        //If $validPassword is TRUE, the login has been successful.
        if ($validPassword) {

            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header('Location: home.php');
            exit;
        } else {
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
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
        <form action="home.php" method="$_POST">
            <h3>Login Name:</h3>
            <input type="text" style="border-radius: 5px;" name="loginname" required><br>
            <h3>Password:</h3>
            <input type="password" style="border-radius: 5px;" name="Password" required><br><br>
            <input type="submit" style="border-radius: 5px;" value="Login">
            <h3>Nog geen account ?</h3>
            <h5>Vraag een account aan bij de IT op Discord: 𝕿𝖍𝖔𝖗𝖛𝖆𝖑𝖉#6442</h5>
        </form>
    </div>
</body>

</html>