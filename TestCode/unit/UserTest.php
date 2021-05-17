<?php
use \PHPUnit\Framework\TestCase;
require 'Models\classes\User.php';

class UserTest extends TestCase{
    public function testGetUsername(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $user=new User($con,"dhruba"); 
        $this-> assertequals("dhruba",$user->getUsername());
    
    }
    public function testGetEmail(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $user=new User($con,"dhruba"); 
        $this-> assertequals("Zarinhossain31@gmail.com",$user->getEmail());
    
    }
    public function testGetFirstAndLastName(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
       
        $user=new User($con,"dhruba"); 
        $aname="Zarintahia Hossain";
        $this-> assertequals($aname,$user->getFirstAndLastName());
    
    }
    

}
?>