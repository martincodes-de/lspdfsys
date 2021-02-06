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
    <title>Los Santos Police Department - Frisk System: Notiz hinzufügen</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <!-- Menüeinbindung -->
    <?php require_once("seitenelemente/menu.php"); ?>

    <div class="w3-container">
      <?php
        if(isset($_POST["NotizErstellen"])) {
          echo notizHinzufuegen($_POST["NotizEinsatzID"], $_POST["NotizArt"], $_POST["NotizAutor"], $_POST["NotizInhalt"], $_POST["NotizAnhangURL"], $_POST["NotizZeitpunkt"]);
          unset($_POST["NotizErstellen"]);
        }
      ?>

      <h2>Notiz hinzufügen</h2>
      <p>Fügen Sie eine Notiz zu einem Einsatz hinzu.</p>
      <div class="w3-panel w3-yellow">
        <h3>Information zu Fotos</h3>
        <p>Nutzen Sie für Fotos geeignete Speicherplattformen wie <a href="https://imgur.com" rel="noopener" target="_blank">Imgur</a>. Sollten Sie mehrere Fotos haben, können Sie dort auch eine Gallerie erstellen und den Link anschließend angeben.</p>
        <p>Fügen Sie niemals mehrere Links hintereinander in ein Eingabefeld, da diese sonst nicht korrekt aufgerufen werden können.</p>
      </div>
      <form class="w3-margin-bottom" method="post">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-third">
            <label>Art der Notiz</label>
            <select class="w3-select w3-border w3-light-grey" name="NotizArt" required>
              <option value="" selected disabled>Wählen Sie die Art der Notiz aus</option>
              <option value="Zeugenaussage">Zeugen-/Opferaussage</option>
              <option value="Hinweis">Hinweis / Anmerkung</option>
            </select>

            <br><br>

            <label>Police Officer</label>
            <input class="w3-input w3-border w3-light-grey" id="NotizAutor" name="NotizAutor" type="text" placeholder="PD 23 Saltmueller" required>

            <script type="text/javascript">
              kennungEinsetzen("NotizAutor");
            </script>

            <br>

            <label>Datum und Uhrzeit</label>
            <input class="w3-input w3-border w3-light-grey" name="NotizZeitpunkt" type="datetime-local" required>
            <span class="w3-tiny">Nutzen Sie für eine saubere, korrekte Datumsformatierung das Kalender-Icon.</span>

            <br><br>

            <label>AnhangURL</label>
            <input class="w3-input w3-border w3-light-grey" name="NotizAnhangURL" type="url" placeholder="">
            <span class="w3-tiny">Für Beweisfotos oder Dokumente</span>

            <br><br>

            <label>Einsatz</label>
            <select class="w3-select w3-border w3-light-grey" name="NotizEinsatzID" required>
              <option value="" selected disabled>Wählen Sie einen Einsatz aus</option>
              <?php foreach(alleEinsaetze() as $einsatz): ?>
                <option value="<?php echo htmlspecialchars($einsatz['ID']); ?>"><?php echo htmlspecialchars($einsatz['Titel']); ?> (EL: <?php echo htmlspecialchars($einsatz['EL']); ?> | CO: <?php echo htmlspecialchars($einsatz['CO']); ?>) [<?php echo htmlspecialchars(datumFormatieren($einsatz['Zeitpunkt'], "vonDB")); ?>]</option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="w3-twothird">
            <label>Inhalt der Notiz</label>
            <textarea class="w3-input w3-border w3-light-grey" name="NotizInhalt" rows="19" cols="80" placeholder="" required></textarea>
          </div>
        </div>

        <br>

        <button class="w3-btn w3-block w3-green" type="submit" name="NotizErstellen">Notiz hinzufügen</button>
      </form>
    </div>

  <!-- Footereinbindung -->
  <?php require_once("seitenelemente/footer.php"); ?>
  </body>
</html>
