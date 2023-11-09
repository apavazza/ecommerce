<?php
$to = "amadeo.pavazza@gmail.com";
$subject = "subject";
$name = $_POST['firstname'];
$email = $_POST['email'];
$message = $_POST['message'];
$text = "Name: $name \n Email: $email \n Message: \n $message";
mail ($to,$subject,$text);

if($message){
echo "Message sent.";
}

else{
echo "There was an error. Message wasn't sent.";
}
?>