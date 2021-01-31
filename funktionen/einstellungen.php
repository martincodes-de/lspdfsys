<?php

function aktualisiereEinstellung($Einstellung, $Wert) {

  $erlaubteEinstellungen = [
    "LoginPasswort",
    "EinsatzLoeschenPasswort"
  ];

  if (in_array($Einstellung, $erlaubteEinstellungen)) {

    GLOBAL $db;
    $stmt = $db->prepare("UPDATE lspd_einstellungen SET Wert = :neuerwert WHERE Einstellung = :einstellung");
    $stmt->execute([
      "neuerwert" => $Wert,
      "einstellung" => $Einstellung
    ]);

    return '<div class="w3-panel w3-green"><h3>Einstellung aktualisiert</h3><p>Die Einstellung wurde aktualisiert.</p></div>';
  } else {

    return '<div class="w3-panel w3-red"><h3>Einstellung nicht aktualisiert</h3><p>Die Einstellung wurde nicht aktualisiert.</p></div>';
  }

}

function erhalteEinstellungWert($Einstellung) {

  $erlaubteEinstellungen = [
    "LoginPasswort",
    "EinsatzLoeschenPasswort"
  ];

  if (in_array($Einstellung, $erlaubteEinstellungen)) {

    GLOBAL $db;

    $stmt = $db->prepare("SELECT Wert FROM lspd_einstellungen WHERE Einstellung = :einstellung");
    $stmt->execute([
      "einstellung" => $Einstellung
    ]);

    return $stmt->fetch()[0];

  } else {

    return "Wert nicht gefunden. - Eingabe überprüfen!";
  }

}
