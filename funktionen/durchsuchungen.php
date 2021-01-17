<?php

function durchsuchungHinzufuegen($EinsatzID, $PersonName, $PersonID, $PersonFotoURL, $PersonDurchsuchenderOfficer, $PersonBeschlagnahmteGegenstaende, $PersonBeschlagnahmteGegenstaendeFotoURL, $PersonWeitereInformationen) {

  global $db;

  $stmt = $db->prepare("INSERT INTO lspdfsys_durchsuchungen (EinsatzID, PersonName, PersonID, PersonFotoURL, DurchsuchenderOfficer, BeschlagnahmteGegenstaende, BeschlagnahmteGegenstaendeFotoURL, WeitereInformationen)
                        VALUES (:einsatzid, :personname, :personid, :personfotourl, :durchsuchenderofficer, :beschlagnahmtegegenstaende, :beschlagnahmtegegenstaendefotourl, :weitereinformationen)");

  $stmt->execute([
    "einsatzid" => $EinsatzID,
    "personname" => $PersonName,
    "personid" => $PersonID,
    "personfotourl" => $PersonFotoURL,
    "durchsuchenderofficer" => $PersonDurchsuchenderOfficer,
    "beschlagnahmtegegenstaende" => $PersonBeschlagnahmteGegenstaende,
    "beschlagnahmtegegenstaendefotourl" => $PersonBeschlagnahmteGegenstaendeFotoURL,
    "weitereinformationen" => $PersonWeitereInformationen
  ]);

  return '<div class="w3-panel w3-green"><h3>Durchsuchung hinzugefügt</h3><p>Die Durchsuchung wurde zum Einsatz hinzugefügt und wird in spätestens 10 Tagen gelöscht. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';

}

function alleDurchsuchungen($EinsatzID) {

  global $db;

  $stmt = $db->prepare("SELECT * FROM lspdfsys_durchsuchungen WHERE EinsatzID = :einsatzid");
  $stmt->execute([
    "einsatzid" => $EinsatzID
  ]);

  return $stmt->fetchAll();

}
