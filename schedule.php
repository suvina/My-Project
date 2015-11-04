<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Interest</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Include CSS File Here -->
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/style1.css"/>
<!-- Include JS File Here -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/registration.js"></script>

<?
session_start();
$city= $_POST['city'];
$movie= $_POST['movie'];
$date = $_POST['date'];
$city = stripslashes($city);
$movie = stripslashes($movie);
$date = stripslashes($date);
session_register("city");
session_register("movie");
session_register("date");
?>
<?php
//$q=$_GET["q"];
$con = mysql_connect('mysql10.000webhost.com', 'a6303355_suvina', 'suvina2311');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("a6303355_project", $con);
?>
<title>Book The Show</title>
<style type="text/css">
a:link {
	color:#ffffff;
	text-decoration: underline;
}
a:visited {
	color: #ffffff;
	text-decoration: underline;
}
html, body {height:100%; margin:0; padding:0;}
#page-background {position:fixed; top:0; left:0; width:100%; height:100%;}
#content {position:relative; z-index:1; padding:10px;}
</style>

<div id="main1">
<div id="container1">
<div id="header1">

    <div id="logo">
     <h1>FUN</h1>
    </div>
    <div id="tagline">
        <h3>Entertainment</h3>
    </div>

    <ul id="menu">
        <li><a href="front.html">Home</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="login.html">Sign In</a></li>
<li><a href="front.html">Log Out</a></li>
    
       
    </ul>

<div class="container">
<div class="main">
</head>


	<p align="right"><?php  $username = $_SESSION['myusername'];
  $sql= "select * from users_tbl where username='$username'"; 
  $result = mysql_query($sql);

  ?>
<?php  $username = $_SESSION['myusername'];
echo "Welcome $username";
?>
  
  <form name="form1" action="seats.php" method="post">
  <table width="200" border="0">
  <tr>
    <td>City</td>
    <td><input name="city" type="text" id="city" readonly="true" style="background-color:#000; color:#FFF" value="<? $sql="Select * from city where city_id='$city'";$sqlresult=mysql_query($sql);$row = mysql_fetch_array($sqlresult);$cityname=$row['city_name'];echo $cityname;?>" /></td>
  </tr>
  <tr>
    <td>Movie</td>
    <td><input name="movie" type="text" id="movie" readonly="true" style="background-color:#000; color:#FFF" value="<? $sql="Select * from movie where movie_id='$movie'" ;$sqlresult=mysql_query($sql);$row = mysql_fetch_array($sqlresult);$moviename=$row['movie_name'];echo $moviename;?>" />	</td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input name="date" type="text" id="date" readonly="true" style="background-color:#000; color:#FFF" value="<? $sql="Select * from movie where date='$date' and movie_id='$movie' and city_id='$city'";$sqlresult=mysql_query($sql);$row = mysql_fetch_array($sqlresult);$date2=$row['date'];echo $date2;?>" /></td>
  </tr>
</table>
  <?php
  	echo "<br><br>";
  	$sql = "Select theatre_id,showtiming from movie where movie_id='$movie' and city_id='$city' and date='$date'";
	$result = mysql_query($sql);
	echo "<table>";
	echo "<tr>
		<td width=\"100px\">Theatre</td>
		<td width=\"100px\">Show Timing</td>
		<td width=\"100px\">Book Ticket</td></b>
		</tr>";
	while($row = mysql_fetch_array($result))
	{
		  echo "<form name=\"form1\" action=\"seats.php\" method=\"post\">";
			$sql2 = "Select theatre_name from theatre where theatre_id=".$row['theatre_id']."";
			$result2 = mysql_query($sql2);
			$row2 = mysql_fetch_array($result2);
			$tname = $row2['theatre_name'];
			$stime = $row['showtiming'];
			echo "<tr>
			<td><input name=\"tname\" type=\"text\" id=\"tname\" readonly=\"true\" style=\"background-color:#000; color:#FFF\" value='$tname'/></td>
			<td><input name=\"stime\" type=\"text\" id=\"stime\" readonly=\"true\" style=\"background-color:#000; color:#FFF\" value='$stime'/></td>
			<td align=\"center\"><input name=\"book\" type=\"submit\" value=\"Book\" /></td>
			</tr>";
			echo "</form>";
	}
	echo "</table>";
  ?>
  </form>
  </div>
    </center>
 
</body>
</html>