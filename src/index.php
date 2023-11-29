<?php

//http://localhost/ComposerDemo/webt-core-server-responses-with-php-in-json-format/src/index.php

// Inkludieren der OST-Klasse -> (Struktur für die OST-Objekte)
require_once 'OST.php';
require_once 'Seeder.php';
require_once 'Song.php';

// Inkludieren der Seeder-Klasse -> (generiert Daten für Demonstrationszwecke)
$osts = Seeder::seedData();

//http://localhost/ComposerDemo/webt-core-server-responses-with-php-in-json-format/src/index.php/?ost_id=1
// Überprüfen, ob ein GET-Parameter 'ost_id' vorhanden ist
$requestedOSTId = isset($_GET['ost_id']) ? $_GET['ost_id'] : null;

// Wenn eine bestimmte OST angefordert wurde (durch 'ost_id' im GET-Parameter)
if ($requestedOSTId !== null) {
    // Wird der Variable $requestedOST auf null gesetzt
    $requestedOST = null;


    // Durchsuchen der generierten OSTs nach der angeforderten OST anhand der ID
    foreach ($osts as $ost) {
        if ($ost->id == $requestedOSTId) {
            $requestedOST = $ost;
            break;
        }
    }

    // Wenn die angeforderte OST gefunden wurde
    if ($requestedOST !== null) {
        // wird Antwort-Headers auf JSON gesetzt
        header('Content-Type: application/json');
        // Ausgabe der angeforderten OST als JSON
        echo json_encode($requestedOST);
    } else {
        // Wenn die angeforderte OST nicht gefunden wurde
        echo "OST not found.";
    }
} else {
    // Wenn keine spezifische OST angefordert wurde
    // Setzen des Antwort-Headers auf JSON
    header('Content-Type: application/json');
    // Ausgabe aller OSTs als JSON
    echo json_encode($osts);
}
