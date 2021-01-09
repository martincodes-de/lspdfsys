<?php

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Los Santos Police Department - Frisk System: Einsatz hinzufügen | © by Martin Cooper</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-bar w3-blue">
      <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
      <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Person zu einem Einsatz hinzufügen</a>
      <button class="w3-btn w3-right">© SGT Martin Cooper, Department of Operations</button>
    </div>

    <div class="w3-container">
      <div class="w3-panel w3-green">
        <h3>Einsatz erstellt</h3>
        <p>Der Einsatz wurde erstellt und wird in spätestens 2 Tagen gelöscht. Seite wird in 3 Sekunden reloadet.</p>
      </div>

      <h2>Einsatz hinzufügen</h2>
      <p>Erstellen Sie einen Einsatz, um mit der Durchsuchungsorganisation zu beginnen.</p>
      <form class="w3-margin-bottom" method="post">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-quarter">
            <label>Einsatztitel</label>
            <input class="w3-input" name="EinsatzTitel" type="text" required>
          </div>
          <div class="w3-quarter">
            <label>Einsatzleiter</label>
            <input class="w3-input" name="EinsatzEL" type="text" required>
          </div>
          <div class="w3-quarter">
            <label>Commanding Officer</label>
            <input class="w3-input" name="EinsatzCO" type="text" required>
          </div>
          <div class="w3-quarter">
            <label>Einsatzdatum</label>
            <input class="w3-input" name="EinsatzDatum" type="date" required>
          </div>
        </div>
        <br>
        <button class="w3-btn w3-block w3-green" type="submit" name="EinsatzErstellen">Einsatz anlegen</button>
      </form>
    </div>

    <div class="w3-container">
        <h2>Einsatzübersicht</h2>
        <p>Hier finden Sie alle noch nicht gelöschten Einsätze.</p>

        <table class="w3-table w3-striped w3-bordered w3-border">
          <tr>
            <th>Einsatztitel</th>
            <th>Einsatzleiter</th>
            <th>Commanding Officer</th>
            <th>Einsatzdatum</th>
            <th>Aktion</th>
          </tr>
          <tr>
            <td>Hausbrand</td>
            <td>Martin Cooper</td>
            <td>Hans Elpler</td>
            <td>01.01.1970</td>
            <td>
              <a href="einsatz_ansicht.php" class="w3-btn w3-tiny w3-indigo">Durchsuchungen ansehen</a>
            </td>
          </tr>
        </table>
    </div>
  </body>
</html>
