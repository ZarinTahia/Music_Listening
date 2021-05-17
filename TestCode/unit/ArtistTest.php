<?php
use \PHPUnit\Framework\TestCase;


class ArtistTest extends TestCase{
    public function testGetID(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $artist=new Artist($con,1); 
        $this-> assertequals(1,$artist->getID());
    
    }

    public function testgetName(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $artist=new Artist($con,1); 
        $this-> assertequals("Mickey Mouse",$artist->getName());
    
    }
    
    public function testgetSongIds(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $artist=new Artist($con,1);
        $song=array(1);
        $this-> assertequals($song,$artist->getSongIds());


    }

}
?>