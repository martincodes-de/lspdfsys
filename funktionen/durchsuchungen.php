<?php

function durchsuchungHinzufuegen($EinsatzID, $PersonName, $PersonID, $PersonFotoURL, $PersonDurchsuchenderOfficer, $PersonBeschlagnahmteGegenstaende, $PersonBeschlagnahmteGegenstaendeFotoURL, $PersonWeitereInformationen) {

  global $db;

  $stmt = $db->prepare("INSERT INTO lspd_durchsuchungen (EinsatzID, PersonName, PersonID, PersonFotoURL, DurchsuchenderOfficer, BeschlagnahmteGegenstaende, BeschlagnahmteGegenstaendeFotoURL, WeitereInformationen)
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

  return '<div class="w3-panel w3-green"><h3>Durchsuchung hinzugefügt</h3><p>Die Durchsuchung wurde zum Einsatz hinzugefügt. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';

}

function erhalteDurchsuchungWert($Spalte, $ID) {

  $erlaubte_spalten = [
    "EinsatzID",
    "PersonName",
    "PersonID",
    "PersonFotoURL",
    "DurchsuchenderOfficer",
    "BeschlagnahmteGegenstaende",
    "BeschlagnahmteGegenstaendeFotoURL",
    "WeitereInformationen"
  ];

  if (in_array($Spalte, $erlaubte_spalten)) {

    GLOBAL $db;

    $stmt = $db->prepare("SELECT $Spalte FROM lspd_durchsuchungen WHERE ID = :id");
    $stmt->execute([
      "id" => $ID
    ]);

    return $stmt->fetch()[0];

  } else {

    return "Keine Daten gefunden.";
  }


}

function alleDurchsuchungen($EinsatzID) {

  global $db;

  $stmt = $db->prepare("SELECT * FROM lspd_durchsuchungen WHERE EinsatzID = :einsatzid");
  $stmt->execute([
    "einsatzid" => $EinsatzID
  ]);

  return $stmt->fetchAll();

}

function durchsuchungBearbeiten($ID, $PersonBeschlagnahmteGegenstaendeFotoURL, $PersonWeitereInformationen) {

  GLOBAL $db;

  $stmt = $db->prepare("UPDATE lspd_durchsuchungen SET BeschlagnahmteGegenstaendeFotoURL = :neue_beschlagnahmtegegenstaendefotourl, WeitereInformationen = :neue_weitereinformationen WHERE ID = :id");
  $stmt->execute([
    "neue_beschlagnahmtegegenstaendefotourl" => $PersonBeschlagnahmteGegenstaendeFotoURL,
    "neue_weitereinformationen" => $PersonWeitereInformationen,
    "id" => $ID
  ]);

  return '<div class="w3-panel w3-green"><h3>Durchsuchung bearbeitet</h3><p>Die Durchsuchung erfolgreich bearbeitet. hinzugefügt. Seite wird in 3 Sekunden reloadet.</p></div><meta http-equiv="refresh" content="3">';

}
