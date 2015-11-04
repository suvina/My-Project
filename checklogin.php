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

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$myemail=mysql_result($result,0,"email");
$userlevel=mysql_result($result,0,"userlevel");
 session_register("myusername");
session_register("mypassword");
header("location:first.php");
}
else {
echo "Wrong Username or Password, Try again! Redirecting.....";
header( "refresh:2;url=login.html" );
}
ob_end_flush();
?>
