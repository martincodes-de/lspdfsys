<?php

require_once("../config.php");

# Cookiesetzung funktioniert nur vor Ausgabe des Headers -_-

if ((isset($_POST["Login"])) AND $_POST["Passwort"] == $login_passwort) {
  setcookie("gemerktesPasswort", $_POST["Passwort"], time()+14400, "/"); # Cookie fürs gespeicherte Passwort anlegen. Gültig für 4 Std und auf der gesamten Domain.
}

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
          echo '<div class="w3-panel w3-green"><h3>Login erfolgreich</h3><p>Sie wurden eingeloggt und können 4 Stunden ohne erneuten Login auf das LSPDFSYS zugreifen. Sie werden gleich weitergeleitet.</p></div><meta http-equiv="refresh" content="3, URL=../index.php">';
        } elseif ((isset($_POST["Login"])) AND $_POST["Passwort"] != $login_passwort) {

          echo '<div class="w3-panel w3-red"><h3>Login fehlgeschlagen</h3><p>Sie wurden nicht eingeloggt, da das eingegebene Passwort falsch ist.</p><p><b>Information für LSPD:</b> Das Passwort finden Sie im Dienstblatt unter "Schwarzes Brett" -> Dokumente</p></div>';
        }
      ?>

      <h2>Login</h2>
      <p>Loggen Sie sich ein, um die Funktionen des LSPDFSYS nutzen zu können.</p>
      <form class="w3-margin-bottom" method="post">
        <label>Passwort</label>
        <input class="w3-input w3-border w3-light-grey" name="Passwort" type="password" required>
        <br>

        <label id="kennung-label">Deine Kennung</label>
        <input type="text" id="kennung-eingabe" class="w3-input w3-border w3-light-grey" name="Kennung" placeholder="Beispiel: PD 85 Mueller" value="">
        <small>Die Kennung kannst du eingeben, um Zeit beim Eintragen von Daten zu sparen. Die Eingabe wird als LocalStorage-Item in deinem Browser gespeichert und bei Eintragungen direkt eingetragen.</small>
        <br><br>
        <button class="w3-btn w3-block w3-blue" type="submit" onclick="kennungSpeichern()" name="Login">Einloggen</button>
      </form>
    </div>

    <script type="text/javascript">
      function kennungSpeichern() {
        console.log("Input:"+document.getElementById("kennung-eingabe").value)
        var kennung = localStorage.setItem("kennung", document.getElementById("kennung-eingabe").value);
        console.log("Kennung gespeichert: "+localStorage.getItem("kennung"));
      }

      if (localStorage.getItem("kennung") !== null && localStorage.getItem("kennung") != "") {
        document.getElementById("kennung-eingabe").placeholder = 'Deine aktuelle Kennung ist "' + localStorage.getItem("kennung") + '" Gebe Sie erneut ein, um sie weiterhin zu verwenden.';
      }
    </script>

    <!-- Footereinbindung -->
    <?php require_once("../seitenelemente/footer.php"); ?>
  </body>
</html>
