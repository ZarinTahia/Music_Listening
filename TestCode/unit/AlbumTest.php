<?php
use \PHPUnit\Framework\TestCase;
require 'Models\classes\Album.php';
require 'Models\classes\Artist.php';
class AlbumTest extends TestCase{
    public function testTitle(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $album=new Album($con,1); 
        $this-> assertequals("Bacon and Eggs",$album->getTitle());
    
    }
    public function testGenere(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $album=new Album($con,1); 
        $this-> assertequals(4,$album->getGenre());
    
    }
    public function testArtorworkpath(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $album=new Album($con,1); 
        $this-> assertequals("assets/images/artwork/goofy.jpg",$album->getArtworkPath());
    
    }

    public function testArtist(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $album=new Album($con,1); 
        $testartist=new Artist($con,2);
        $this-> assertequals($testartist,$album->getArtist());
    
    }
    public function testNumberOfSongs(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $album=new Album($con,1); 
        $this-> assertequals(1,$album->getNumberOfSongs());

    }
    public function testSongIds(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $album=new Album($con,1);
        $song=array(28);
        $this-> assertequals($song,$album->getSongIds());


    }

}
?>