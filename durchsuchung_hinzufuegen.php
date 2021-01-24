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
    <title>Los Santos Police Department - Frisk System: Durchsuchung hinzufügen</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <!-- Menüeinbindung -->
    <?php require_once("seitenelemente/menu.php"); ?>

    <div class="w3-container">
      <?php
        if(isset($_POST["DurchsuchungErstellen"])) {
          echo durchsuchungHinzufuegen($_POST["PersonEinsatzID"], $_POST["PersonName"], $_POST["PersonID"], $_POST["PersonFotoURL"], $_POST["PersonDurchsuchenderOfficer"], $_POST["PersonBeschlagnahmteGegenstaende"], $_POST["PersonBeschlagnahmteGegenstaendeFotoURL"], $_POST["PersonWeitereInformationen"]);
          unset($_POST["DurchsuchungErstellen"]);
        }
      ?>

      <h2>Durchsuchung hinzufügen</h2>
      <p>Fügen Sie eine durchsuchte Person zu einem Einsatz hinzu.</p>
      <div class="w3-panel w3-yellow">
        <h3>Information zu Fotos</h3>
        <p>Nutzen Sie für Fotos geeignete Speicherplattformen wie <a href="https://imgur.com" rel="noopener" target="_blank">Imgur</a>. Sollten Sie mehrere Fotos haben, können Sie dort auch eine Gallerie erstellen und den Link anschließend angeben.</p>
        <p>Fügen Sie niemals mehrere Links hintereinander in ein Eingabefeld, da diese sonst nicht korrekt aufgerufen werden können.</p>
      </div>
      <form class="w3-margin-bottom" method="post">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-quarter">
            <label>Name der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonName" type="text" placeholder="Reiner Zufall" required>
          </div>

          <div class="w3-quarter">
            <label>ID der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonID" type="number" placeholder="107" required>
          </div>

          <div class="w3-quarter">
            <label>Foto der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonFotoURL" type="url" placeholder="https://imgur.com/a/gvM0yCW" required>
          </div>

          <div class="w3-quarter">
            <label>Durchsuchender Officer</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonDurchsuchenderOfficer" type="text" placeholder="PD 65 Mueller" required>
          </div>
        </div>

        <br>

        <div class="w3-row-padding w3-stretch">
          <div class="w3-third">
            <label>Beschlagnahmte Gegenstände</label>
            <textarea class="w3-input w3-border w3-light-grey" name="PersonBeschlagnahmteGegenstaende" rows="5" cols="80" placeholder="two number 9s, a number 9 large, a number 6 with extra dip, a number 7, two number 45s, one with cheese, and a large soda" required></textarea>
          </div>

          <div class="w3-third">
            <label>Foto der beschlagnahmten Gegenstände <span class="w3-tag w3-light-grey w3-hover-light-blue w3-tiny" onclick="keineBeschlagnahmtenGegenstaende(this)">Keine Gegenstände beschlagnahmt</span></label>
            <input class="w3-input w3-border w3-light-grey" name="PersonBeschlagnahmteGegenstaendeFotoURL" placeholder="https://imgur.com/a/gvM0yCW" type="url" required>

            <script type="text/javascript">
              function keineBeschlagnahmtenGegenstaende() {
                if (document.getElementsByName("PersonBeschlagnahmteGegenstaende")[0].value == "") {
                  document.getElementsByName("PersonBeschlagnahmteGegenstaendeFotoURL")[0].value = "https://i.imgur.com/fucjPMv.png";
                  document.getElementsByName("PersonBeschlagnahmteGegenstaende")[0].value = "Keine abgenommenen Gegenstände";
                  //alert("Es wurden Platzhalter eingefügt."); Wurde als Geschwinidgkeitsverlangsamung empfunden
                } else {
                  alert("Es kann kein Platzhalterlink eingefügt werden, da das Feld mit den beschlagnahmten Gegenständen nicht leer ist.");
                }
              }
            </script>

            <br>

            <label>Einsatz</label>
            <select class="w3-select w3-border w3-light-grey" name="PersonEinsatzID" required>
              <option value="" selected disabled>Wählen Sie einen Einsatz aus</option>
              <?php foreach(alleEinsaetze() as $einsatz): ?>
                <option value="<?php echo htmlspecialchars($einsatz['ID']); ?>"><?php echo htmlspecialchars($einsatz['Titel']); ?> (EL: <?php echo htmlspecialchars($einsatz['EL']); ?> | CO: <?php echo htmlspecialchars($einsatz['CO']); ?>) [<?php echo htmlspecialchars(datumFormatieren($einsatz['Zeitpunkt'], "vonDB")); ?>]</option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="w3-third">
            <label>Weitere Informationen</label>
            <textarea name="PersonWeitereInformationen" class="w3-input w3-border w3-light-grey" rows="5" cols="80" placeholder="Wenn Sie keine weiteren Informationen zur Person haben, lassen Sie das Feld einfach leer."></textarea>
          </div>
        </div>
        <br>
        <button class="w3-btn w3-block w3-green" type="submit" name="DurchsuchungErstellen">Durchsuchung hinzufügen</button>
      </form>
    </div>

  <!-- Footereinbindung -->
  <?php require_once("seitenelemente/footer.php"); ?>
  </body>
</html>
