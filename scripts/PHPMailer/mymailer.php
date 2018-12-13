<?php
  require 'PHPMailerAutoload.php';

  $mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host = '';         		     //Host / Server
  $mail->SMTPAuth = true;                   //SMTP Auth
  $mail->Username = '';              	   //Login
  $mail->Password = '';			  //Password                                     
  $mail->SMTPSecure = 'ssl';             //Secure Mode
  $mail->Port = 465;                    //SMTP Port
  $mail->setLanguage('en');            //Language
  $mail->setFrom('from@email', 'From Name');
  $mail->isHTML(true);
?>
