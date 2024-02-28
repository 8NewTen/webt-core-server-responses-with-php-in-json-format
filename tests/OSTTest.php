<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src\Song.php';
require_once 'src\OST.php';
require_once 'index.php';
require_once 'src\DemoSeeder.php';
include 'index.php';

class OSTTest extends TestCase
{
    protected $demos;

    protected function setUp(): void
    {
        $this->demos = DemoSeeder::seed();
    }


    public function testJsonSerialize()
    {

        $tracks = [
            new Song(1, "Song 1", "Artist 1", 1, "300"),
            new Song(2, "Song 2", "Artist 2", 2, "300"),
            new Song(3, "Song 3", "Artist 3", 3, "300"),
        ];

        $ostTest = new OST(1, "OST 1", "vgname 1", 2001, $tracks);

        $expectedJson = '{"id":1,"name":"OST 1","videogame name":"vgname 1","release year":2001,"tracklist":[{"uid":1,"sname":"Song 1","artist":"Artist 1","tracknummer":1,"duration":"300"},{"uid":2,"sname":"Song 2","artist":"Artist 2","tracknummer":2,"duration":"300"},{"uid":3,"sname":"Song 3","artist":"Artist 3","tracknummer":3,"duration":"300"}]}';
        $this->assertJsonStringEqualsJsonString($expectedJson, json_encode($ostTest->jsonSerialize()));



        $ersterost = '{"id":1,"name":"ost 1","videogame name":"vgname 1","release year":2001,"tracklist":[{"uid":1,"sname":"Song 1","artist":"Artist 1","tracknummer":1,"duration":"300"},{"uid":2,"sname":"Song 2","artist":"Artist 2","tracknummer":2,"duration":"300"},{"uid":3,"sname":"Song 3","artist":"Artist 3","tracknummer":3,"duration":"300"},{"uid":4,"sname":"Song 4","artist":"Artist 4","tracknummer":4,"duration":"300"}]}';

        $zweiterost = '{"id":2,"name":"ost 2","videogame name":"vgname 2","release year":2002,"tracklist":[{"uid":1,"sname":"Song 1","artist":"Artist 1","tracknummer":1,"duration":"300"},{"uid":2,"sname":"Song 2","artist":"Artist 2","tracknummer":2,"duration":"300"},{"uid":3,"sname":"Song 3","artist":"Artist 3","tracknummer":3,"duration":"300"},{"uid":4,"sname":"Song 4","artist":"Artist 4","tracknummer":4,"duration":"300"}]}';

        $dritterost = '{"id":3,"name":"ost 3","videogame name":"vgname 3","release year":2003,"tracklist":[{"uid":1,"sname":"Song 1","artist":"Artist 1","tracknummer":1,"duration":"300"},{"uid":2,"sname":"Song 2","artist":"Artist 2","tracknummer":2,"duration":"300"},{"uid":3,"sname":"Song 3","artist":"Artist 3","tracknummer":3,"duration":"300"},{"uid":4,"sname":"Song 4","artist":"Artist 4","tracknummer":4,"duration":"300"}]}';

        $vierterost = '{"id":4,"name":"ost 4","videogame name":"vgname 4","release year":2004,"tracklist":[{"uid":1,"sname":"Song 1","artist":"Artist 1","tracknummer":1,"duration":"300"},{"uid":2,"sname":"Song 2","artist":"Artist 2","tracknummer":2,"duration":"300"},{"uid":3,"sname":"Song 3","artist":"Artist 3","tracknummer":3,"duration":"300"},{"uid":4,"sname":"Song 4","artist":"Artist 4","tracknummer":4,"duration":"300"}]}';


        $ost01 = $this->demos[1];
        $ost02 = $this->demos[2];
        $ost03 = $this->demos[3];
        //$ost04 = $this->demos[4];


        //schaut ob JSON Format passt
        $this->assertJsonStringEqualsJsonString($ersterost, json_encode($ost01));
        $this->assertJsonStringEqualsJsonString($zweiterost, json_encode($ost02));
        $this->assertJsonStringEqualsJsonString($dritterost, json_encode($ost03));

        //$this->assertJsonStringEqualsJsonString($vierterost, json_encode($ost04));

        //schaut ob bestimmter String in Json
        $this->assertCount(4, $ost01->getTracklist());

        //schaut ob ein Object ein Property hat
        $this->assertObjectHasProperty("tracklist", $ost01);

        //schaut ob Datei lesbar
        $this->assertFileIsReadable('src\DemoSeeder.php');
    }
}