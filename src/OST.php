<?php

// Definition der OST-Klasse
class OST {
    // Öffentliche Eigenschaften der OST-Klasse
    public $id;
    public $name;
    public $videoGameName;
    public $releaseYear;
    public $trackList = array(); // Ein leeres Array für die Liste der Tracks

    // Konstruktor der OST-Klasse
    public function __construct($id = null, $name = null, $videoGameName = null, $releaseYear = null, $trackList = array()) {
        // Initialisierung der Eigenschaften mit den übergebenen Werten oder Standardwerten (falls nicht übergeben)
        $this->id = $id;
        $this->name = $name;
        $this->videoGameName = $videoGameName;
        $this->releaseYear = $releaseYear;
        $this->trackList = $trackList;
    }
}

// Definition der Song-Klasse
class Song {
    // Öffentliche Eigenschaften der Song-Klasse
    public $id;
    public $name;
    public $artist;
    public $trackNumber;
    public $duration;
}
