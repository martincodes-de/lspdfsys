<?php

require_once("config.php");

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv=“expires“ content=“0″>
	<meta http-equiv="Cache-Control" content="no-store" />
    <title>Los Santos Police Department - Frisk System: Einsatz hinzufügen</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-bar w3-blue">
      <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
      <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Durchsuchung zu einem Einsatz hinzufügen</a>
    </div>

    <div class="w3-container">
      <?php
        if(isset($_POST["EinsatzErstellen"])) {
          echo erstelleEinsatz($_POST["EinsatzTitel"], $_POST["EinsatzEL"], $_POST["EinsatzCO"], $_POST["EinsatzZeitpunkt"]);
          unset($_POST["EinsatzErstellen"]);
        }
      ?>

      <h2>Einsatz hinzufügen</h2>
      <p>Erstellen Sie einen Einsatz, um mit der Durchsuchungsorganisation zu beginnen.</p>
      <form class="w3-margin-bottom" method="post">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-quarter">
            <label>Einsatztitel</label>
            <input class="w3-input w3-light-grey" name="EinsatzTitel" type="text" required>
          </div>
          <div class="w3-quarter">
            <label>Einsatzleiter</label>
            <input class="w3-input w3-light-grey" name="EinsatzEL" type="text" required>
          </div>
          <div class="w3-quarter">
            <label>Commanding Officer</label>
            <input class="w3-input w3-light-grey" name="EinsatzCO" type="text" required>
          </div>
          <div class="w3-quarter">
            <label>Datum und Uhrzeit</label>
            <input class="w3-input w3-light-grey" name="EinsatzZeitpunkt" type="datetime-local" required>
          </div>
        </div>
        <br>
        <button class="w3-btn w3-block w3-green" type="submit" name="EinsatzErstellen">Einsatz anlegen</button>
      </form>
    </div>

    <div class="w3-container">
        <h2>Einsatzübersicht</h2>
        <p>Hier finden Sie alle noch nicht gelöschten Einsätze.</p>

        <div class="w3-responsive">
          <table class="w3-table w3-striped w3-bordered w3-border w3-margin-bottom">
            <tr>
              <th>Einsatztitel</th>
              <th>Einsatzleiter</th>
              <th>Commanding Officer</th>
              <th>Einsatzdatum</th>
              <th>Aktion</th>
            </tr>
            <?php foreach(alleEinsaetze() as $einsatz): ?>
              <tr>
                <td><?php echo $einsatz["Titel"]; ?></td>
                <td><?php echo $einsatz["EL"]; ?></td>
                <td><?php echo $einsatz["CO"]; ?></td>
                <td><?php echo datumFormatieren($einsatz["Zeitpunkt"], "vonDB"); ?></td>
                <td>
                  <a href="einsatz_ansicht.php?ID=<?php echo $einsatz['ID']; ?>" class="w3-btn w3-small w3-indigo">Durchsuchungen ansehen</a>
                  <a href="einsatz_loeschen.php?ID=<?php echo $einsatz['ID']; ?>" class="w3-btn w3-small w3-red">Einsatz löschen</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
    </div>

	<div class="w3-auto w3-margin-top w3-margin-bottom">
		<center><?php echo $copyright; ?></center>
	</div>
  </body>
</html>
