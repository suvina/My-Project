<?php
ob_start();
$host="mysql10.000webhost.com"; // Host name 
$username="a6303355_suvina"; // Mysql username 
$password="suvina2311"; // Mysql password 
$db_name="a6303355_project"; // Database name 
$tbl_name="users_tbl"; // Table name
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
$mypassword2=$_POST['mypassword2'];
$myemail=$_POST['myemail'];

$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")
{
if($count==1){echo "User already exist";}
else {
	if($mypassword==$mypassword2)
	{
			$sql="Insert into $tbl_name (username,password,email) values ('$myusername','$mypassword','$myemail')";
			$result=mysql_query($sql);
			echo "Sign Up Succesfull<br><br>";
			session_register("myusername");
			session_register("mypassword");
echo "You are successfully registered! Redirecting............";
header( "refresh:1;url=login.html" );
			
	}
	else
		echo "Passwords don't match";
}
}
else
{
	echo "One or more fields are empty";
}
ob_end_flush();
?>