<?
session_start();
?>
<?php
echo $movieid=$_GET["q"];
echo $cityid= $_SESSION['city'];
$con = mysql_connect('mysql10.000webhost.com', 'a6303355_suvina', 'suvina2311');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("a6303355_project", $con);
$sql="SELECT * FROM movie WHERE movie_id = '".$movieid."' and status='Now Showing' and city_id='$cityid' group by date";
$result = mysql_query($sql);
	 echo "<select name ='date' id ='date'>";
	 echo "<option value=\"\">--Select Date--</option>";
while($row = mysql_fetch_array($result))
  {
	  
	 echo "<option value=".$row['date'].">".$row['date']." </option> ";
  }
		echo "</select>";
mysql_close($con);
?>