<?php
use \PHPUnit\Framework\TestCase;
require 'Models\classes\Playlist.php';

class PlaylistTest extends TestCase{
    public function testGetID(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $playlist=new Playlist($con,3); 
        $this-> assertequals(3,$playlist->getID());
    
    }
    public function testgetName(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $playlist=new Playlist($con,3); 
        $this-> assertequals("Playlist of Tahia",$playlist->getName());
    
    }
    public function testGetOwner(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $playlist=new Playlist($con,3); 
        $this-> assertequals("dhruba",$playlist->getOwner());
    }
    
    public function testSongIds(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $playlist=new Playlist($con,3); 
        $song=array(30);
        $this-> assertequals($song,$playlist->getSongIds());


    }
    public function testGetPlaylistsDropdown(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $playlist=new Playlist($con,3);
        $this-> assertequals('<select class="item playlist"><option value="">Add to playlist</option>'."<option value='3'>Playlist of Tahia</option><option value='4'>playlist 1</option></select>",$playlist->getPlaylistsDropdown($con,"dhruba"));
    }

}
?>