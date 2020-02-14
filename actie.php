<?php
$file = 'sub.txt'; //geef bestandsnaam op
$bestand = fopen($file, "w") or die("Fout bij aanmaken bestand!"); //maakt bestand aan met schrijfrechten indien niet bestaat of geeft error
$gegevens =''; //Hier de gegevens die in het bestand moeten komen
fwrite($file, $gegevens); //Schrijf gegevens naar bestand
fclose($file); //Sluit bewerking af
