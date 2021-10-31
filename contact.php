<?php
switch (@$_GET['do'])
 {

 case "send":

      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];

      $msg= $_POST['message'];
      $secretinfo = $_POST['info'];

    if (!preg_match("/\S+/",$name))
    {
      unset($_GET['do']);
      $message = "Name required. Please try again.";
      break;
    }
    if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$email))
    {
      unset($_GET['do']);
      $message = "Email Address is incorrect. Please try again.";
      break;
    }


    if ($secretinfo == "")
    {
       $myemail = "elenastoeva99@gmail.com";
       $emess = "Name: ".$name."\n";
       $emess.= "Email: ".$email."\n";
       $emess.= "Subject: ".$subject."\n";
       $emess.= "Message:"."\n".$msg;
       $ehead = "From: ".$email."\r\n";
       $subj = "You have an email from your website!";
       $mailsend=mail("$myemail","$subj","$emess","$ehead");
       $message = "Email was sent.";
    }

       unset($_GET['do']);
     break;

 default: break;
 }
?>
