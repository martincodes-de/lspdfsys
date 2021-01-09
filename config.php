<?php

#Datenbankverbindung normal
/*
$db_host = "localhost";
$db_name = "lspdsysteme";
$db_username = "lspdsysteme_user";
$db_userpassword = "*5i4Ymq3";
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

require_once 'functions/einsaetze.php';
require_once 'functions/daten.php';

# Datum

$aktuelles_datum = date("d.m.Y H:i");

?>
