<!DOCTYPE html>
<html>
<head>
<title>My Interest</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Include CSS File Here -->
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/style1.css"/>
<!-- Include JS File Here -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/registration.js"></script>
</head>
<body>



        <div id="tagline">
        <h3>Entertainment</h3>
    </div>

    <ul id="menu">
        <li><a href="front.html">Home</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="login.html">Sign In</a></li>
        
    </ul>


<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<div class="container">
<div class="main">
<body>
<h1>Forgot Password<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit' id="register"/></td></tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{ 
 mysql_connect('mysql10.000webhost.com','a6303355_suvina','suvina2311') or die(mysql_error());
 mysql_select_db('a6303355_project') or die(mysql_error());
 $email=$_POST['email'];
 $q=mysql_query("select * from users_tbl where email='".$email."' ") or die(mysql_error());
 $p=mysql_affected_rows();
 if($p!=0) 
 {
  $res=mysql_fetch_array($q);
  $to= $res['email'];
  $subject='Remind password';
  $message='Your password : '.$res['password']; 
  $headers='From:suvina.2010@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    echo'Please check your email for your password';
  }
  else
  {
   echo'mail is not send';
  }
 }
 else
 {
  echo'This email id is not registered';
 }
}
?>
</body>
</html>