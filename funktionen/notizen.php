<?php

function notizHinzufuegen($EinsatzID, $Art, $Autor, $Notiz, $AnhangURL, $Zeitpunkt) {

  global $db;

  $stmt = $db->prepare("INSERT INTO lspd_notizen (EinsatzID, Art, Autor, Notiz, AnhangURL, Zeitpunkt) VALUES (:einsatzid, :art, :autor, :notiz, :anhangurl, :zeitpunkt)");
  $stmt->execute([
    "einsatzid" => $EinsatzID,
    "art" => $Art,
    "autor" => $Autor,
    "notiz" => $Notiz,
    "anhangurl" => $AnhangURL,
    "zeitpunkt" => datumFormatieren($Zeitpunkt, "fürDB")
  ]);

  return '<div class="w3-panel w3-green"><h3>Notiz hinzugefügt</h3><p>Die Notiz wurde zum Einsatz hinzugefügt. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';

}

function alleNotizen($EinsatzID) {

  global $db;

  $stmt = $db->prepare("SELECT * FROM lspd_notizen WHERE EinsatzID = :einsatzid");
  $stmt->execute([
    "einsatzid" => $EinsatzID
  ]);

  return $stmt->fetchAll();

}
