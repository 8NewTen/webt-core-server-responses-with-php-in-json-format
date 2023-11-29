<?php
class Song {
    // Eigenschaften (Properties) der Klasse
    public $id;
    public $name;
    public $artist;
    public $trackNumber;
    public $duration;

     //Getter-Methode für die ID.

    /**
     * @param $id
     * @param $name
     * @param $artist
     * @param $trackNumber
     * @param $duration
     */

    public function getId()
    {
        return $this->id;
    }


     //Setter-Methode für die ID.
    public function setId($id): void
    {
        $this->id = $id;
    }

    // Ähnliche Getter- und Setter-Methoden für die anderen Eigenschaften...


     //Konstruktor-Methode, die beim Erstellen eines neuen Song-Objekts aufgerufen wird.
    public function __construct($id, $name, $artist, $trackNumber, $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->artist = $artist;
        $this->trackNumber = $trackNumber;
        $this->duration = $duration;
    }
}
