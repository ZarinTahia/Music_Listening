<?php
use \PHPUnit\Framework\TestCase;
require 'Controllers\Account.php';
class AcountTest extends TestCase{
    public function testLogin(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
        $account=new Account($con);  
        $this-> assertTrue($account->login('dhruba','123123'));
    }
    public function testGetError(){
        $con=mysqli_connect("localhost", "root", "", "slotify");
        $account=new Account($con);  
        $this-> assertEquals("<span class='errorMessage'></span>",$account->getError("Your username or password was incorrect"));  
    }
    
}
?>