<?php

require_once("config.php");
checkLogin();

if ((isset($_GET["ID"]) === false) OR ($_GET["ID"] < 1)) {
  die('<div class="w3-panel w3-red"><h3>Durchsuchung nicht gefunden</h3><p>Sie haben keine ID angegeben. Sie werden in 5 Sekunden weitergeleitet.</p></div><meta http-equiv="refresh" content="3; URL=index.php">');
}

$einsatzID = erhalteDurchsuchungWert("EinsatzID", $_GET["ID"]);

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta http-equiv=“expires“ content=“0″>
	  <meta http-equiv="Cache-Control" content="no-store" />
    <title>Los Santos Police Department - Frisk System: Durchsuchung bearbeiten</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <!-- Menüeinbindung -->
    <?php require_once("seitenelemente/menu.php"); ?>

    <div class="w3-container">
      <?php
        if(isset($_POST["DurchsuchungBearbeiten"])) {
          echo durchsuchungBearbeiten($_GET["ID"], $_POST["PersonBeschlagnahmteGegenstaendeFotoURL"], $_POST["PersonWeitereInformationen"]);
          unset($_POST["DurchsuchungBearbeiten"]);
        }
      ?>

      <h2>Durchsuchung (ID: <?php echo $_GET["ID"]; ?>) bearbeiten</h2>
      <p>Bearbeiten Sie eine Durchsuchung nachträglich und fügen Sie ein Foto der beschlagnahmten Gegenstände oder weitere Informationen hinzu.</p>

      <div class="w3-panel w3-yellow">
        <h3>Information zu Fotos</h3>
        <p>Nutzen Sie für Fotos geeignete Speicherplattformen wie <a href="https://imgur.com" rel="noopener" target="_blank">Imgur</a>. Sollten Sie mehrere Fotos haben, können Sie dort auch eine Gallerie erstellen und den Link anschließend angeben.</p>
        <p>Fügen Sie niemals mehrere Links hintereinander in ein Eingabefeld, da diese sonst nicht korrekt aufgerufen werden können.</p>
      </div>

      <form class="w3-margin-bottom" method="post">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-quarter">
            <label>Name der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonName" type="text" placeholder="Reiner Zufall" required disabled value="<?php echo htmlspecialchars(erhalteDurchsuchungWert("PersonName", $_GET["ID"])); ?>">
          </div>

          <div class="w3-quarter">
            <label>ID der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonID" type="number" placeholder="107" required disabled value="<?php echo htmlspecialchars(erhalteDurchsuchungWert("PersonID", $_GET["ID"])); ?>">
          </div>

          <div class="w3-quarter">
            <label>Foto der Person</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonFotoURL" type="url" placeholder="https://imgur.com/a/gvM0yCW" required disabled value="<?php echo htmlspecialchars(erhalteDurchsuchungWert("PersonFotoURL", $_GET["ID"])); ?>">
          </div>

          <div class="w3-quarter">
            <label>Durchsuchender Officer</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonDurchsuchenderOfficer" type="text" placeholder="PD 85 Mueller" required disabled value="<?php echo htmlspecialchars(erhalteDurchsuchungWert("DurchsuchenderOfficer", $_GET["ID"])); ?>">
          </div>
        </div>

        <br>

        <div class="w3-row-padding w3-stretch">
          <div class="w3-third">
            <label>Beschlagnahmte Gegenstände <span class="w3-tag w3-blue w3-hover-light-blue w3-tiny" onclick="keineBeschlagnahmtenGegenstaende(this)">Keine Gegenstände beschlagnahmt</span></label>
            <textarea class="w3-input w3-border w3-light-grey" name="PersonBeschlagnahmteGegenstaende" rows="5" cols="80" placeholder="two number 9s, a number 9 large, a number 6 with extra dip, a number 7, two number 45s, one with cheese, and a large soda" required disabled><?php echo htmlspecialchars(erhalteDurchsuchungWert("BeschlagnahmteGegenstaende", $_GET["ID"])); ?></textarea>
          </div>

          <div class="w3-third">
            <label>Foto der beschlagnahmten Gegenstände</label>
            <input class="w3-input w3-border w3-light-grey" name="PersonBeschlagnahmteGegenstaendeFotoURL" placeholder="https://imgur.com/a/gvM0yCW" type="url" value="<?php echo htmlspecialchars(erhalteDurchsuchungWert("BeschlagnahmteGegenstaendeFotoURL", $_GET["ID"])); ?>">

            <script type="text/javascript">
              function keineBeschlagnahmtenGegenstaende() {
                if (document.getElementsByName("PersonBeschlagnahmteGegenstaende")[0].value == "") {
                  //document.getElementsByName("PersonBeschlagnahmteGegenstaendeFotoURL")[0].value = "https://i.imgur.com/fucjPMv.png"; Deaktiviert, da Feld nicht mehr required ist
                  document.getElementsByName("PersonBeschlagnahmteGegenstaende")[0].value = "Keine Gegenstände beschlagnahmt";
                  //alert("Es wurden Platzhalter eingefügt."); Wurde als Geschwinidgkeitsverlangsamung empfunden
                } else {
                  alert("Es kann kein Platzhalterlink eingefügt werden, da das Feld mit den beschlagnahmten Gegenständen nicht leer ist.");
                }
              }
            </script>

            <br>

            <label>Einsatz</label>
            <select class="w3-select w3-border w3-light-grey" name="PersonEinsatzID" required disabled>
              <option value="" selected disabled><?php echo htmlspecialchars(erhalteEinsatzWert($einsatzID, "Titel")); ?> (EL: <?php echo htmlspecialchars(erhalteEinsatzWert($einsatzID, "EL")); ?> | CO: <?php echo htmlspecialchars(erhalteEinsatzWert($einsatzID, "CO")); ?>) [<?php echo htmlspecialchars(datumFormatieren(erhalteEinsatzWert($einsatzID, 'Zeitpunkt'), 'vonDB')); ?>]</option>
            </select>
          </div>

          <div class="w3-third">
            <label>Weitere Informationen</label>
            <textarea name="PersonWeitereInformationen" class="w3-input w3-border w3-light-grey" rows="5" cols="80" placeholder="Wenn Sie keine weiteren Informationen zur Person haben, lassen Sie das Feld einfach leer."><?php echo htmlspecialchars(erhalteDurchsuchungWert("WeitereInformationen", $_GET["ID"])); ?></textarea>
          </div>
        </div>
        <br>
        <button class="w3-btn w3-block w3-green" type="submit" name="DurchsuchungBearbeiten">Durchsuchung bearbeiten</button>
      </form>
    </div>

  <!-- Footereinbindung -->
  <?php require_once("seitenelemente/footer.php"); ?>
  </body>
</html>
