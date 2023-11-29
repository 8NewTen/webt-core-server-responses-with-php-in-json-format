<?php

// Definition der Seeder-Klasse
class Seeder {
    // Öffentliche statische Methode zur Generierung von Demo-Daten
    public static function seedData() {
        // Initialisierung eines leeren Arrays für OST-Objekte
        $osts = array();

        // Schleife für die Erstellung von drei OST-Objekten
        for ($i = 1; $i <= 3; $i++) {
            // Aufruf der privaten Methode createOST, um ein OST-Objekt zu erstellen
            $ost = self::createOST($i, "OST $i", "Game $i", 2000 + $i);

            // Schleife für die Erstellung von vier Song-Objekten pro OST
            for ($j = 1; $j <= 4; $j++) {
                // Aufruf der privaten Methode createSong, um ein Song-Objekt zu erstellen
                $song = self::createSong($j, "Song $j", "Artist $j", $j, "3:45");

                // Hinzufügen des Song-Objekts zur trackList des OST-Objekts
                $ost->trackList[] = $song;
            }

            // Hinzufügen des OST-Objekts zum Array von OSTs
            $osts[] = $ost;
        }

        // Rückgabe des Arrays von OST-Objekten
        return $osts;
    }

    // Private statische Methode zur Erstellung eines OST-Objekts
    private static function createOST($id, $name, $videoGameName, $releaseYear) {
        // Verwendung des Konstruktors der OST-Klasse, um ein OST-Objekt zu erstellen
        return new OST($id, $name, $videoGameName, $releaseYear);
    }

    // Private statische Methode zur Erstellung eines Song-Objekts
    private static function createSong($id, $name, $artist, $trackNumber, $duration) {
        // Erstellung eines neuen Song-Objekts mit den erforderlichen Argumenten
        $song = new Song($id, $name, $artist, $trackNumber, $duration);

        // Rückgabe des erstellten Song-Objekts
        return $song;
    }
}
