<?php
class Song implements JsonSerializable{
    // Eigenschaften (Properties) der Klasse
    private $id;
    private $name;
    private $artist;
    private $trackNumber;
    private $duration;

     //Getter-Methode für die ID.

    /**
     * @param $id
     * @param $name
     * @param $artist
     * @param $trackNumber
     * @param $duration
     */



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

    public function jsonSerialize(): mixed
    {
        // TODO: Implement jsonSerialize() method.
        return[
            'id' => $this->id,
            'name' => $this->name,
            'artist' => $this->artist,
            'trackNumber' => $this->trackNumber,
            'duration' => $this->duration
        ];
    }
}
