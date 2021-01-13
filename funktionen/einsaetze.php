<?php

function erstelleEinsatz($Titel, $EL, $CO, $Zeitpunkt) { #Einsatz erstellen

  global $db;
  global $automatische_loeschung_nach_tagen;

  $stmt = $db->prepare("INSERT INTO lspd_einsaetze (Titel, EL, CO, Zeitpunkt) VALUES (:titel, :el, :co, :zeitpunkt)");
  $stmt->execute([
    "titel" => $Titel,
    "el" => $EL,
    "co" => $CO,
    "zeitpunkt" => datumFormatieren($Zeitpunkt, "fürDB")
  ]);

  return '<div class="w3-panel w3-green"><h3>Einsatz erstellt</h3><p>Der Einsatz wurde erstellt. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';

}

function alleEinsaetze() { #Alle Einsätze auflisten

  global $db;

  $stmt = $db->prepare("SELECT * FROM lspd_einsaetze ORDER BY Zeitpunkt DESC");
  $stmt->execute();

  return $stmt->fetchAll();

}

function erhalteEinsatzWert($ID, $Spalte = "ID") {

  global $db;

  $erlaubte_spalten = [
    "ID",
    "Titel",
    "EL",
    "CO",
    "Zeitpunkt"
  ];

  if (in_array($Spalte, $erlaubte_spalten)) {
    $stmt = $db->prepare("SELECT $Spalte FROM lspd_einsaetze WHERE ID = :id");
    $stmt->execute([
      "id" => $ID
    ]);

    $gefundeneZeilen = $stmt->rowCount(); # Anzahl der gefundenen Zeilen

    if ($gefundeneZeilen > 0) {
      while ($einsatzinfo = $stmt->fetch()) {
        return $einsatzinfo[$Spalte];
      }
    }

  } else {
    return "Keine Daten gefunden - Eingabe überprüfen!";
  }

}

function loescheEinsatzManuell($ID) {

  GLOBAL $db;

  $stmt = $db->prepare("DELETE FROM lspd_einsaetze WHERE ID = :id");
  $stmt->execute([
    "id" => $ID
  ]);

  return '<div class="w3-panel w3-green"><h3>Einsatz gelöscht</h3><p>Der Einsatz wurde gelöscht. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';

}

?>
