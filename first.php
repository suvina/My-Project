<?
session_start();
if(!$_SESSION['myusername']){
header("location:front.html");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Interest</title>

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
        <li><a href="logout.php">Log Out</a></li>
        
    </ul>

<?php
ob_start();
$host="mysql10.000webhost.com"; // Host name 
$username="a6303355_suvina"; // Mysql username 
$password="suvina2311"; // Mysql password 
$db_name="a6303355_project"; // Database name 
// Connect to server and select databse.
 mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>

<div class="container">
<div class="main">


<script type="text/javascript">
function showmovie(str)
{
if (str=="")
  {
  document.getElementById("movie").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("movie").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmovie.php?q="+str,true);
xmlhttp.send();
}
function showdate(str)
{
if (str=="")
  {
  document.getElementById("date").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("date").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getdate.php?q="+str,true);
xmlhttp.send();
}
</script>
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

<p align="right"><?php  $username = $_SESSION['myusername'];
  $sql= "select * from users_tbl where username='$username'"; 
  $result = mysql_query($sql);

  ?>
<?php $username = $_SESSION['myusername'];
echo "Welcome $username";
?>
<br>
<br>
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form1" method="post" action="schedule.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<p class="sign">
<td width="78">City</td></p>
<td width="6">:</td>
<td width="294">
<select name ='city' id = 'city' onchange="showmovie(this.value)">
<option value="">--Select City--</option>
<?php $tbl_name="city"; // Table name ?>
<?php $result= mysql_query("SELECT * FROM $tbl_name"); ?> 
    <?php while($row= mysql_fetch_assoc($result)) { ?> 
        <option value="<?php echo $row['city_id'];?>"> 
            <?php echo $row['city_name']; ?> 
        </option> 
    <?php } ?>
</select>
</td>
</tr>
<tr>
<td>Movie</td>
<td>:</td>
<td>
<select name ='movie' id = 'movie' onchange="showdate(this.value)"></select>
</td>
</tr>
<tr>
<td>Date</td>
<td>:</td>
<td><select name ='date' id = 'date'></select>
</tr>
<tr>
<td></td>
<td></td>
<td><input name="submit" type="Submit" value="See Shows" />
</tr>
</table>
</td></p>
<? /*
$city= $row['city_name'];
$movie= $_POST['movie'];
$date = $_POST['date'];
$city = stripslashes($city);
$movie = stripslashes($movie);
$date = stripslashes($date);
session_register("city");
session_register("movie");
session_register("date");*/
?>
</form>
</tr>
</table> 

  </div>
    </center>
</body>
</html>