<?php

require_once("../config.php");

$neuesLoginPasswort = erstelleZufaelligenString();
$neuesEinsatzLoeschenPasswort = erstelleZufaelligenString();
aktualisiereEinstellung("LoginPasswort", $neuesLoginPasswort);
aktualisiereEinstellung("EinsatzLoeschenPasswort", $neuesEinsatzLoeschenPasswort);

/*
$mailEmpfaenger = "martin.schneider@techniknews.net, martin.schneider@freshmediacompany.de";
$mailBetreff = "LSPDFSYS: Passwoerter aktualisiert";
$mailNachricht = "Die Passwoerter des LSPDFSYS wurden geaendert und sind ab sofort gueltig. Normales Passwort: {$neuesLoginPasswort} | Verwaltungspasswort: {$neuesEinsatzLoeschenPasswort}";

#mail($mailEmpfaenger, $mailBetreff, $mailNachricht);

if (mail($mailEmpfaenger, $mailBetreff, $mailNachricht)) {

  echo $mailNachricht;


} else {

  echo "Versenden fehlgeschlagen!";
}
*/

?>
