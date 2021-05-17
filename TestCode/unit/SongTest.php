<?php
use \PHPUnit\Framework\TestCase;
require 'Models\classes\Song.php';


class SongTest extends TestCase{
    public function testTitle(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $song=new Song($con,1); 
        $this-> assertequals("Acoustic Breeze",$song->getTitle());
    
    }
    public function testGetID(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $song=new Song($con,1); 
        $this-> assertequals(1,$song->getID());
    
    }

    public function testGetArtist(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $song=new Song($con,1); 
        $artist=new Artist($con,1); 
        $this-> assertequals($artist,$song->getArtist());
    
    }
    public function testGetAlbum(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $song=new Song($con,1); 
       
        $album=new Album($con,5); 
        $this-> assertequals($album,$song->getAlbum());
    
    }

   public function testGetPath(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $song=new Song($con,1); 
        $this-> assertequals("assets/music/bensound-acousticbreeze.mp3",$song->getPath());
    
    }

    public function testGetDuration(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
        $song=new Song($con,1); 
        $this-> assertequals("2:37",$song->getDuration());
    
    }
    public function testGetGenre(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
        $song=new Song($con,1);  
        $this-> assertequals(8,$song->getGenre());

    }
   

}
?>