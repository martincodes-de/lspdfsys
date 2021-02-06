<?php

session_start();
session_destroy();

setcookie("gemerktesPasswort", "", time()-3600); # Cookie in der Vergangenheit setzen, um dieses zu löschen.

echo '<script>localStorage.clear(); </script>';

die("Logout erfolgreich. <a href='../login'>Zum Login</a>");
