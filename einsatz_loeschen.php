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
    <title>Los Santos Police Department - Frisk System: Einsatz löschen</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body class="">
    <div class="w3-bar w3-blue">
      <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
      <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Durchsuchung zu einem Einsatz hinzufügen</a>
    </div>

    <div class="w3-container">
      <?php
        if((isset($_POST["EinsatzLoeschen"])) && ($_POST["LoeschPasswort"] == $einsatz_loeschen_passwort)) {
          echo loescheEinsatzManuell($_GET["ID"]);
          unset($_POST["EinsatzLoeschen"]);

        } elseif ((isset($_POST["EinsatzLoeschen"])) && ($_POST["LoeschPasswort"] != $einsatz_loeschen_passwort)) {
          echo '<div class="w3-panel w3-yellow"><h3>Falsches Passwort</h3><p>Das eingegebene Passwort ist nicht korrekt. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';
        }
      ?>

      <h2>Einsatz "<?php echo erhalteEinsatzWert($_GET["ID"], "Titel"); ?>" vom <?php echo datumFormatieren(erhalteEinsatzWert($_GET["ID"], "Zeitpunkt"), "vonDB"); ?> löschen</h2>
      <p>Löschen Sie Einsätze und deren Daten, die nicht mehr benötigt werden. Dies kann nur von Offiziers- und Leitungsmitgliedern durchgeführt werden und benötigt zur Ausführung ein Passwort.</p>
      <form class="w3-margin-bottom" method="post">
        <label>Passwort</label>
        <input class="w3-input w3-light-grey" name="LoeschPasswort" type="password" required>
        <br>
        <button class="w3-btn w3-block w3-red" type="submit" name="EinsatzLoeschen">Einsatz endgültig löschen</button>
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
