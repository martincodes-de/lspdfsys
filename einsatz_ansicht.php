<?php

require_once("config.php");

# Wenn keine ID angegeben wird, wird die Seite sofort gekillt.
if ((!isset($_GET["ID"])) || ($_GET["ID"] < 1)) {
  die('<div class="w3-panel w3-red"><h3>Einsatz nicht gefunden</h3><p>Sie haben keine ID angegeben. Sie werden in 5 Sekunden weitergeleitet.</p></div><meta http-equiv="refresh" content="3; URL=index.php">');
}

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv=“expires“ content=“0″>
	<meta http-equiv="Cache-Control" content="no-store" />
    <title>Los Santos Police Department - Frisk System: Einsatzansicht</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-bar w3-blue">
      <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
      <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Durchsuchung zu einem Einsatz hinzufügen</a>
    </div>

    <div class="w3-container">
      <div class="w3-panel w3-yellow">
        <h3>Automatische Löschung</h3>
        <p>Einsätze werden inkl. die durchsuchten Personen nach mindestens <?php echo $automatische_loeschung_nach_tagen; ?> Tagen gelöscht.</p>
      </div>

      <h2>Einsatzansicht</h2>
      <p>Hier finden Sie einen Einsatz und die jeweiligen Durchsuchungen.</p>
      <form class="w3-margin-bottom">
        <div class="w3-row-padding w3-stretch">
          <div class="w3-quarter">
            <label>Einsatztitel</label>
            <input class="w3-input w3-light-grey" name="EinsatzTitel" type="text" value="<?php echo erhalteEinsatzWert($_GET["ID"], "Titel"); ?>" readonly>
          </div>
          <div class="w3-quarter">
            <label>Einsatzleiter</label>
            <input class="w3-input w3-light-grey" name="EinsatzEL" type="text" value="<?php echo erhalteEinsatzWert($_GET["ID"], "EL"); ?>" readonly>
          </div>
          <div class="w3-quarter">
            <label>Commanding Officer</label>
            <input class="w3-input w3-light-grey" name="EinsatzCO" type="text" value="<?php echo erhalteEinsatzWert($_GET["ID"], "CO"); ?>" readonly>
          </div>
          <div class="w3-quarter">
            <label>Datum und Uhrzeit</label>
            <input class="w3-input w3-light-grey" name="EinsatzZeitpunkt" type="text" value="<?php echo datumFormatieren(erhalteEinsatzWert($_GET["ID"], "Zeitpunkt"), "vonDB"); ?>" readonly>
          </div>
        </div>
      </form>
    </div>

    <div class="w3-container">
        <h2>Durchsuchungen</h2>
        <p>Hier finden Sie alle durchsuchten Personen und deren Informationen.</p>

        <div class="w3-responsive">
          <table class="w3-table w3-striped w3-bordered w3-border">
            <tr>
              <th>Name</th>
              <th>ID</th>
              <th>Durchsuchender Officer</th>
              <th>Beschlagnahmte Gegenstände</th>
              <th>Weitere Informationen</th>
              <th>Aktion</th>
            </tr>
            <?php foreach(alleDurchsuchungen($_GET["ID"]) as $durchsuchung): ?>
              <tr>
                <td><?php echo $durchsuchung["PersonName"]; ?></td>
                <td><?php echo $durchsuchung["PersonID"]; ?></td>
                <td><?php echo $durchsuchung["DurchsuchenderOfficer"]; ?></td>
                <td><?php echo nl2br($durchsuchung["BeschlagnahmteGegenstaende"]); ?></td>
                <td><?php echo nl2br($durchsuchung["WeitereInformationen"]); ?></td>
                <td>
                  <a href="<?php echo $durchsuchung['PersonFotoURL']; ?>" target="_blank" class="w3-btn w3-small w3-indigo">Foto der Person aufrufen</a>
                  <a href="<?php echo $durchsuchung['BeschlagnahmteGegenstaendeFotoURL']; ?>" target="_blank" class="w3-btn w3-small w3-indigo">Beweisfoto der abgenommenen Gegenstände aufrufen</a>
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
