<?php

require_once("../config.php");

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv=“expires“ content=“0″>
  	<meta http-equiv="Cache-Control" content="no-store" />
    <title>Los Santos Police Department - Frisk System: Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-container">
      <?php
        if ((isset($_POST["Login"])) AND $_POST["Passwort"] == $login_passwort) {
          $_SESSION["login"] = true;
          echo '<div class="w3-panel w3-green"><h3>Login erfolgreich</h3><p>Sie wurden eingeloggt und können auf das LSPDFSYS zugreifen. Sie werden gleich weitergeleitet.</p></div><meta http-equiv="refresh" content="3, URL=../index.php">';
        } elseif ((isset($_POST["Login"])) AND $_POST["Passwort"] != $login_passwort) {

          echo '<div class="w3-panel w3-red"><h3>Login fehlgeschlagen</h3><p>Sie wurden nicht eingeloggt, da das eingegebene Passwort falsch war. Sie werden gleich weitergeleitet.</p></div>';
        }
      ?>

      <h2>Login</h2>
      <p>Loggen Sie sich ein, um die Funktionen des LSPDFSYS nutzen zu können.</p>
      <form class="w3-margin-bottom" method="post">
        <label>Passwort</label>
        <input class="w3-input w3-border w3-light-grey" name="Passwort" type="password" required>
        <br>
        <!--
        <label>Deine Kennung</label>
        <input type="text" id="kennung-eingabe" class="w3-input w3-border w3-light-grey" name="Kennung" placeholder="PD 85 Müller" value="">
        <small>Die Kennung kannst du eingeben, um Zeit beim Eintragen von Daten zu sparen. Die Eingabe wird als Cookie in deinem Browser gespeichert und bei Eintragungen direkt eingetragen.</small>
        <br><br>-->
        <button class="w3-btn w3-block w3-blue" type="submit" onclick="" name="Login">Einloggen</button>
      </form>
    </div>

    <!-- Footereinbindung -->
    <?php require_once("../seitenelemente/footer.php"); ?>
  </body>
</html>
