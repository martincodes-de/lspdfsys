<?php

function datumFormatieren($datum, $art = "fürDB") { #Datum direkt korrekt formatieren

  if ($art == "fürDB") { # Für die Datenbank input
    return date("Y-d-m H:i:s", strtotime($datum));

  } elseif ($art == "vonDB") { # Von der Datenbank
    return date("m.d.Y H:i", strtotime($datum));
  }

}
