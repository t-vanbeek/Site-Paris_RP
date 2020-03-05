<?php
session_start();
?>
<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<script type="text/javascript" src="https://identity.netlify.com/v1/netlify-identity-widget.js"></script>

<head>
    <title>Paris RP</title>

    <link href="Paris.png" rel="icon" type="image/png" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="navbar">
        <a href="index.htm"><button type="submit">Home</button></a>
        <a href="news.htm"><button type="submit">News</button></a>
        <a href="index.htm"><button type="submit">Photo's</button></a>
        <a href="index.htm"><button type="submit">Sign in</button></a>
    </div>

    <div class="Warning">
        <h2><b>LET OP! DEZE SITE IS NOG IN ONDERHOUD<br> ER KOMEN LANGZAAM MEER DELEN BIJ</b></h2>
    </div>
    <div class="video">
        <video src="wip.gif" loop autoplay mediagroup="gif" preload="auto" onload="autoplay">
        </video>
    </div>
    <div class="content">
        <h1>Aanmelden als staff</h1>

        <form action="action.php" method="post">
            <label for="username">Gebruikersnaam</label>
            <input type="text" id="username" required placeholder="Username" />
            <label for="WW">wachtwoord</label>
            <input type="password" required id="WW" placeholder="Wachtwoord" hash />
            <label for="disc">Discord Gebruikersnaam</label>
            <input type="text" required id="disc" placeholder="Discord gebruikersnaam" />
            <label for="role">Rol op discord</label>
            <input type="text" required id="role" placeholder="Discord rol" />
            <label for="lid">Ga je gegevens met leden delen?</label>
            <input type="radio" name="voorLid" value="Ja">Ja</input>
            <input type="radio" name="voorLid" value="Nee">Nee</input>
            <input type="submit" value="Aanmelden" formaction="Email">
        </form>
    </div>

</body>

</html>