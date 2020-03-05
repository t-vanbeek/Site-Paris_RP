<?php
session_start();
$_SESSION['logged_in'] = false;
?>
<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>Paris Roleplay</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="Paris.png" rel="icon" type="icon.png">
</head>

<body class="background">
    <div>
        <div class="tabel">
            <h1>Paris Roleplay</h1>
            <p>
                Welkom in Paris wij zijn de 1e roleplay server van de Franse hoofdstad Parijs.<br>
                Hier kan je alle informatie vinden wat er allemaal gebeurt in die grote hoofdstad.<br>
                Verder hebben we ook een Discord voor alle leuke update's, Trainingen en je kan er natuurlijk lekker
                chatten.<br>
                Ik hoop dat jullie veel plezier gaan beleven in Paris.<br><br>
                Groet. <br>
                Het hele staffteam
            </p>
        </div>
        <div class="breaking_news">
        </div>
        <div class="rbxgroups">
            
            <p class="grp_buttons">

                <!--https://www.roblox.com/groups/5477913/Police-de-G-n-ral-FR#!/about<br>
                RAID:<br>
                https://www.roblox.com/groups/5517143/RAID-de-G-n-ral-FR#!/about<br>
                Pompiers:<br>
                https://www.roblox.com/groups/5512434/Pompiers-de-G-n-ral-FR#!/about<br>
                Ambulance:<br>
                https://www.roblox.com/groups/5478101/Ambulance-de-G-n-ral-FR#!/about<br>
                Commune:<br>
                https://www.roblox.com/groups/5473617/Commune-de-Paris#!/about<br>-->
            </p>
        </div>
    </div>
    <a href="login.php"><button class="button">Log in</button></a>
    <div class="sidebar">
        <a href="joinTheDevs.htm">Join het web dev team!</a><br>
        <h2>Groepen</h2>
        <a class="Police" href="https://www.roblox.com/groups/5477913/Police-de-G-n-ral-FR#!/about" target="_BLANK">Police</a><br>
        <a class="RAID" href="https://www.roblox.com/groups/5517143/RAID-de-G-n-ral-FR#!/about" target="_BLANK">RAID</a><br>
        <a class="Pompiers" href="https://www.roblox.com/groups/5512434/Pompiers-de-G-n-ral-FR#!/about" target="_BLANK">Pompiers</a><br>
        <a class="Ambulance" href="https://www.roblox.com/groups/5478101/Ambulance-de-G-n-ral-FR#!/about" target="_BLANK">Ambulance</a><br>
        <a class="Commune" href="https://www.roblox.com/groups/5473617/Commune-de-Paris#!/about" target="_BLANK">Commune</a><br>
    </div>
</body>

</html>