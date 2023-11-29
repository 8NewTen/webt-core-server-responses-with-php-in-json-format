<?php

// Definition der OST-Klasse
class OST implements JsonSerializable{
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

//: mixed weil es verschiedene Datentypen sind
    public function jsonSerialize(): mixed
    {
        // TODO: Implement jsonSerialize() method.
        return[
            'id'=>$this->id,
            'name' => $this->name,
            'videoGameName' => $this->videoGameName,
            'releaseYear' => $this->releaseYear,
            'trackList' => $this->trackList
        ];
    }
}

