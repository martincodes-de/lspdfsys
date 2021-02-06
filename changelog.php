<?php

require_once("config.php");
checkLogin();

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv=“expires“ content=“0″>
	<meta http-equiv="Cache-Control" content="no-store" />
    <title>Los Santos Police Department - Frisk System: Changelog</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <!-- Menüeinbindung -->
    <?php require_once("seitenelemente/menu.php"); ?>

    <div class="w3-container">
      <h2>Changelog</h2>
      <p>Hier erhalten Sie Informationen über die neuesten Änderungen am LSPDFSYS.</p>
      <p><b>06.02.2021: </b>"Passwort merken"-Funktion implementiert</p>
      <p><b>31.01.2021: </b>Loginsystem hinzugefügt (Passwörter werden täglich zwischen 5-6 Uhr geändert), Hilfsbuttons bei Durchsuchungseintragung farblich angepasst, Changelog hinzugefügt, Durchsuchungen absofort teilw. bearbeitbar (Foto der Gegenstände, Weitere Informationen)</p>
      <hr>
    </div>
    <!-- Footereinbindung -->
    <?php require_once("seitenelemente/footer.php"); ?>
  </body>
</html>
