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
    <title>Los Santos Police Department - Frisk System: Einsatzansicht | © by Martin Cooper</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-bar w3-blue">
      <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
      <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Durchsuchung zu einem Einsatz hinzufügen</a>
      <button class="w3-btn w3-right">© SGT Martin Cooper, Department of Operations</button>
    </div>

    <div class="w3-container">
      <div class="w3-panel w3-yellow">
        <h3>Automatische Löschung</h3>
        <p>Einsätze werden inkls. die durchsuchten Leute nach mindestens einer Woche gelöscht.</p>
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

        <table class="w3-table w3-striped w3-bordered w3-border">
          <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Durchsuchender Officer</th>
            <th>Beschlagnahmte Gegenstände</th>
            <th>Weitere Informationen</th>
            <th>Aktion</th>
          </tr>
          <tr>
            <td>Rainer Zufall</td>
            <td>107</td>
            <td>Hans Elpler</td>
            <td>1x Sesamkörner</td>
            <td>Keine weiteren Informationen.</td>
            <td>
              <a href="https://sm.mashable.com/t/mashable_sea/photo/default/harith-iskander_jtkz.960.jpg" target="_blank" class="w3-btn w3-tiny w3-indigo">Foto der Person aufrufen</a>
              <a href="https://images.gutefrage.net/media/fragen/bilder/auf-meinem-bett-sowas-wie-sesamkoerner-sind-das-insekteneier/0_original.jpg?v=1428703575000" target="_blank" class="w3-btn w3-tiny w3-indigo">Beweisfoto der abgenommenen Gegenstände aufrufen</a>
            </td>
          </tr>
        </table>
    </div>
  </body>
</html>
