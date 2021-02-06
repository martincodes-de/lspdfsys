<?php

#Datenbankverbindung normal

/*
$db_host = "localhost";
$db_name = "xhnwemny_lspd_kleine_systeme";
$db_username = "xhnwemny_lspd_kleine_systeme";
$db_userpassword = "cs!4iT45";
*/

#Datenbankverbindung lokal


$db_host = "localhost";
$db_name = "lspdfsys";
$db_username = "root";
$db_userpassword = "";


$db_charset = "utf8";

# DB-Verbindung

try {
  $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset", $db_username, $db_userpassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
  echo 'Datenbankverbindung fehlgeschlagen: ' . $e->getMessage();
}

# Funktionen für CRUD-Operationen

require_once 'funktionen/einsaetze.php';
require_once 'funktionen/daten.php';
require_once "funktionen/durchsuchungen.php";
require_once "funktionen/notizen.php";
require_once "funktionen/zugang.php";
require_once "funktionen/einstellungen.php";

# Andere Einstellungen

$copyright = "<small>LSPDFSYS © by SGT Martin Cooper | Department of Operations | Los Santos Police Department | <a href='changelog.php'>Changelog</a></small>";
$aktuelles_datum = date("d.m.Y H:i");
$automatische_loeschung_nach_tagen = 90;
$einsatz_loeschen_passwort = erhalteEinstellungWert("EinsatzLoeschenPasswort");
$login_passwort = erhalteEinstellungWert("LoginPasswort");

session_start();

?>
