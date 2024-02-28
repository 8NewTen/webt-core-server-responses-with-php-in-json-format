<?php
use PHPUnit\Framework\TestCase;
class SongTest extends TestCase
{

    public function testJsonSerialize()
    {
        $song = new Song(1, "Song 1", "Artist 1", 1, "300");

        $expectedJson = '{"uid":1,"sname":"Song 1","artist":"Artist 1","tracknummer":1,"duration":"300"}';

        $this->assertJsonStringEqualsJsonString($expectedJson, json_encode($song->jsonSerialize()));
    }
}