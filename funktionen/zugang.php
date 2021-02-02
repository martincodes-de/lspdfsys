<?php

function erstelleZufaelligenString($length=12,$chars="") {

    if($chars=="") {
      $chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789#!*-";
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

  if ((isset($_SESSION["login"])) AND ($_SESSION["login"] == true)) {

  } else {

    die("Login erforderlich. <a href='./login'>Zum Login</a>");
  }

}
