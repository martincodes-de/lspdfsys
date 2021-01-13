<?php

function datumFormatieren($datum, $art = "fürDB") { #Datum direkt korrekt formatieren

  if ($art == "fürDB") { # Für die Datenbank input
    return date("Y-m-d H:i:s", strtotime($datum));

  } elseif ($art == "vonDB") { # Von der Datenbank
    return date("d.m.Y H:i", strtotime($datum));
  }

}
