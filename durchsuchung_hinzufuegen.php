<?php

require_once("config.php");

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Los Santos Police Department - Frisk System: Durchsuchung hinzufügen | <?php echo $copyright; ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-bar w3-blue">
      <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
      <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Durchsuchung zu einem Einsatz hinzufügen</a>
      <button class="w3-btn w3-right"><?php echo $copyright; ?></button>
    </div>

    <div class="w3-container">
      <?php
        if(isset($_POST["DurchsuchungErstellen"])) {
          echo durchsuchungHinzufuegen($_POST["PersonEinsatzID"], $_POST["PersonName"], $_POST["PersonID"], $_POST["PersonFotoURL"], $_POST["PersonDurchsuchenderOfficer"], $_POST["PersonBeschlagnahmteGegenstaende"], $_POST["PersonBeschlagnahmteGegenstaendeFotoURL"], $_POST["PersonWeitereInformationen"]);
          unset($_POST["DurchsuchungErstellen"]);
        }
      ?>

      <h2>Durchsuchung hinzufügen</h2>
      <p>Fügen Sie eine durchsuchte Person zu einem Einsatz hinzu.</p>
      <form class="w3-margin-bottom" method="post">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-quarter">
            <label>Name</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonName" type="text" required>
          </div>

          <div class="w3-quarter">
            <label>ID</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonID" type="number" required>
          </div>

          <div class="w3-quarter">
            <label>Foto der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonFotoURL" type="url" required>
          </div>

          <div class="w3-quarter">
            <label>Durchsuchender Officer</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonDurchsuchenderOfficer" type="text" required>
          </div>
        </div>

        <br>

        <div class="w3-row-padding w3-stretch">
          <div class="w3-third">
            <label>Beschlagnahmte Gegenstände</label>
            <textarea class="w3-input w3-border w3-light-grey" name="PersonBeschlagnahmteGegenstaende" rows="5" cols="80" required></textarea>
          </div>

          <div class="w3-third">
            <label>Foto der beschlagnahmten Gegenstände</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonBeschlagnahmteGegenstaendeFotoURL" type="url" required>
            <br>

            <label>Einsatz</label>
            <select class="w3-select w3-border w3-light-grey" name="PersonEinsatzID" required>
              <option value="" selected disabled>Wählen Sie einen Einsatz aus</option>
              <?php foreach(alleEinsaetze() as $einsatz): ?>
                <option value="<?php echo $einsatz['ID']; ?>"><?php echo $einsatz['Titel']; ?> (EL: <?php echo $einsatz['EL']; ?> | CO: <?php echo $einsatz['CO']; ?>) [<?php echo datumFormatieren($einsatz['Zeitpunkt'], "vonDB"); ?>]</option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="w3-third">
            <label>Weitere Informationen</label>
            <textarea name="PersonWeitereInformationen" class="w3-input w3-light-grey" rows="5" cols="80"></textarea>
          </div>
        </div>
        <br>
        <button class="w3-btn w3-block w3-green" type="submit" name="DurchsuchungErstellen">Durchsuchung hinzufügen</button>
      </form>
    </div>
  </body>
</html>
