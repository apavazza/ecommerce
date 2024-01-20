<?php
 $to = "admin@example.com";
 $subject = $_POST['subject'];
 $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
 $email = $_POST['email'];
 $message = $_POST['message'];
 $text = "Name: $name \n Email: $email \n Message: \n $message";

function checkFirstName() {
	global $errorFirstName;
	if(strlen(!empty($_POST['firstname'])) && strlen($_POST['firstname']) <=128){
		$errorFirstName = "";
		return true;
	} else{
		$errorFirstName = "<p style='color: red'>Please write your first name (up to 128 characters)</p>";
		return false;
	}
}

function checkLastName() {
	global $errorLastName;
	if(strlen(!empty($_POST['lastname'])) && strlen($_POST['lastname']) <=128){
		$errorLastName = "";
		return true;
	} else{
		$errorLastName = "<p style='color: red'>Please write your last name (up to 128 characters)</p>";
		return false;
	}
}

function checkCaptcha(){
		session_start();
		global $errorCaptcha;
		if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
			// Validation: Checking entered captcha code with the generated captcha code
			if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
				// Note: the captcha code is compared case insensitively.
				// if you want case sensitive match, check above with strcmp()
				$errorCaptcha = "<p style='color: red'>
				Entered captcha code does not match!</p>";
				return false;
			} else{
				return true;
			}
		}
	}

    if(checkFirstName() && checkLastName() && checkCaptcha()){
        //mail ($to,$subject,$text);
		echo "Simulating sent message";
    }
    
?>