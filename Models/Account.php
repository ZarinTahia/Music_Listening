<?php 
   class Account{
   	  private $con;
      private $errorArray;
      public function __construct($con){
      	 $this->con=$con;
         $this->errorArray = array();

      }
      public function login($us, $pw) {

			$pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$us' AND password='$pw'");

			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}}

      public function register($us,$fi,$la,$em,$pw,$cp){
      	$this->validateUsername($us);
	    $this->validateFirstName($fi);
	    $this->validateLastName($la);
	    $this->validateEmail($em);
	    $this->validatePassword($pw,$cp);


			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($us, $fi, $la, $em, $pw);
			}
			else {
				return false;
			}


      } 


      public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($us, $fi, $la, $em, $pw) {
			$encryptedPw = md5($pw);
			$profilePic = "C:\xampp2\htdocs\Music_Listening\View\ProfilePic";
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$us', '$fi', '$la', '$em', '$encryptedPw', '$date', '$profilePic')");

			return $result;
		}


     private function validateUsername($us)
       {
 	        if(strlen($us)>20||strlen($us)<2)
 	        	{array_push($this->errorArray, Constants::$usernameCharacters);
				return;}
			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$us'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}



       }

     private function validateFirstName($fi)
      {
 	     if(strlen($fi)>20||strlen($fi)<2)
 	        	array_push($this->errorArray, Constants::$firstNameCharacters);
				return;

      }

    private function validateLastName($la)
      {
 	     if(strlen($la)>20||strlen($la)<2)
 	        	array_push($this->errorArray, Constants::$lastNameCharacters);
				return;

      }
    private function validateEmail($em)
    {
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

    }

     private function validatepassword($pw,$pw2)
     {
 	    if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

      }


   }

 ?>
