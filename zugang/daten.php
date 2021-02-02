<?php

require_once("../config.php");

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zugänge für das LSPDFSYS</title>
  </head>
  <body>
    <?php if((isset($_GET["code"])) AND ($_GET["code"] == "a34155841CB")): ?>
    <table>
      <tr>
        <th>LoginPasswort</th>
        <th>EinsatzLoeschenPasswort</th>
      </tr>
      <tr>
        <td><?php echo erhalteEinstellungWert("LoginPasswort"); ?></td>
        <td><?php echo erhalteEinstellungWert("EinsatzLoeschenPasswort"); ?></td>
      </tr>
    </table>
    <?php endif; ?>
  </body>
</html>
