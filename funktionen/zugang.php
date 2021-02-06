<?php

function erstelleZufaelligenString($length=12,$chars="") {

    if($chars=="") {
      $chars = "%&-abcdefghijk*mnpqrstuvwxyz/ABCDEFGHIJK_LMNPQRSTUVWXYZ§0123456789#!@";
    }

    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '';

    while ($i < $length) {
        $num = rand() % strlen($chars);
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;
}

function checkLogin() {

  GLOBAL $login_passwort; # Wird in der Config durch DB deklariert

  if ((isset($_SESSION["login"])) AND ($_SESSION["login"] == true)) {

  } elseif ((isset($_COOKIE["gemerktesPasswort"])) && ($_COOKIE["gemerktesPasswort"]) == $login_passwort) {
    $_SESSION["login"] = true;
    #echo "Das gemerkte Passwort ist korrekt, yeah!";
  } else {
    setcookie("gemerktesPasswort", "", time()-3600); # Cookie in der Vergangenheit setzen, um dieses zu löschen.
    die("Login erforderlich. <a href='./login'>Zum Login</a>");
  }

}
