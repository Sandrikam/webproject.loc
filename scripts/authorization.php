<?php
  /*/////////////////////////////////////////
  |   Application: WEB1Project              |
  |   Start Date: 07.10.2018                |
  |   Author: ABGEO                         |
  |   Website: www.ABGEO.ga                 |
  |   Email: abgeo@abgeo.ga                 |
  |   File: authorization.php               |
  |   Patch: /scripts                       |
  |   Create Date: 08.10.2018               |
  /////////////////////////////////////////*/

  require_once("db.php");

  session_start();

  //Action Selector
  switch ($_POST["action"])
  {
    case 'signup': UserSignup($_POST["username"], $_POST["email"], $_POST["password"]); break;
    case 'signin': UserSignin($_POST["username"], $_POST["password"]); break;
  }

  function UserSignup($Username, $Email, $Password)
  {
    $Username = stripslashes($Username);
    $Email = stripslashes($Email);
    $Password = stripslashes($Password);

    $Username = htmlspecialchars($Username);
    $Email = htmlspecialchars($Email);
    $Password = htmlspecialchars($Password);

    $Username = trim($Username);
    $Email = trim($Email);
    $Password = trim($Password);

    $Password = md5(md5(md5($Password)));

    $RegDate = date("Y-m-d");

    $Activation = md5($Email.time());

    $result = mysql_query("SELECT User_ID FROM users WHERE Username='$Username'");
    $row = mysql_fetch_array($result);

    $result2 = mysql_query("SELECT User_ID FROM users WHERE User_Email='$Email'");
    $row2 = mysql_fetch_array($result2);

    if (!empty($row["User_ID"]))
      exit("usernameexists");
    else if (!empty($row2["User_ID"]))
      exit("emailexists");
    else
    {
      $insert = mysql_query ("INSERT INTO users (Username, User_Email, User_password, User_RegDate, User_Activation) VALUES ('$Username', '$Email', '$Password', '$RegDate', '$Activation')");

      if ($insert)
      {
        //Send Activation link on Email
        require_once("PHPMailer/mymailer.php");

        $mail->addAddress($Email, $Username); //Reciver

        $mail->Subject = 'LinkShare E-Mail Verification';
        $mail->Body = 'Thank You for registration in <b>LinkShare</b>.<br /> Please, verify Your E-Mail address: <a href="http://link-share.cf/page/activation/'.$Activation.'">link-share.cf/page/activation//page/activation/'.$Activation.'</a>';
        //$mail->AltBody = '';

        $mail->send();

        echo "regsuccess";
      }
      else
        echo "regerror";
    }
  }

  function UserSignin($Username, $Password)
  {
    $Username = stripslashes($Username);
    $Password = stripslashes($Password);

    $Username = htmlspecialchars($Username);
    $Password = htmlspecialchars($Password);

    $Username = trim($Username);
    $Password = trim($Password);

    $Password = md5(md5(md5($Password)));

    $result = mysql_query("SELECT User_Password, User_ID, Username, User_Status FROM users WHERE Username='$Username' OR User_Email='$Username'");
    $row = mysql_fetch_array($result);

    if (empty($row['User_Password']))
      exit ("incorectdata");
    else
    {
      if ($row['User_Password'] == $Password)
      {
        if (!$row['User_Status'])
            exit ("accountisinactive");
        else
        {
          $_SESSION['Username'] = $row['Username'];
          $_SESSION['User_ID'] = $row['User_ID'];

          exit ($row['Username']);
        }
      }
      else
        exit ("incorectdata");
    }
  }
?>
