<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SlamDunk League</title>

<style type ="text/css">
<!--
td.class1
{
	background: linear-gradient(#FFFFFF,#404040);
	color: #000000;
}
		
.style1 
{
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: bold;
	color: #FFCF73;
}


.style2 
{
	color: #ffffff;
	font-weight: bold;
	font-style: italic;
}


.style3 
{
	color: #bf8330;
	font-style: italic;
}

img.bg
{
	width: 100%; 
	height: 100%; 
	position: absolute;
	top: 0;
	left: 0;
	z-index: -1;
}

tr.class2
{
	background-color: #FFFFFF;
}	
-->

</style>
</head>

<body>
<img class="bg" src="rep.jpg" alt="" /> 
<center><img src="bb (2).jpg">
<img src="SlamDunk (2).jpg"></center>
<table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td class="class1"><div align="center" class="style2">
		<a href="homepage.html" style="text-decoration: none">
		<font color="#000000">HOME</font></a></div></td>
    <td class="class1"><div align="center" class="style2">
	<a href="teams.php" style="text-decoration: none">
	<font color="#000000">TEAMS</font></a></div></td>
    <td class="class1"><div align="center" class="style2">
		<a href="fixtures.php" style="text-decoration: none">
		<font color="#000000">FIXTURES</font></a></div></td>
    <td class="class1"><div align="center" class="style2">
	<a href="login.php" style="text-decoration: none">
	<font color="#000000">LOGIN</font></a></div></td>
    <td class="class1"><div align="center" class="style2">
	<a href="gallery.html" style="text-decoration: none">
	<font color="#000000">GALLERY</font></a></div></td>
  </tr>
</table><br><br></br></br>
<font size="5" color="#FFFFFF"><center>
<form name="input_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="radio" name="type" value="Admin">Admin</input></br>
<input type="radio" name="type" value="Coach">Coach</input></br>
<input type="radio" name="type" value="Player">Player</input></br></br>
<i><input type="submit" value="Submit" name="submit1"/></i></br></br></br>
</form>

<?php
if(isset($_POST["submit1"]))
{
	print $_POST["type"];
	echo "</br>";

	DEFINE ('DB_USER','cs566304');
	DEFINE ('DB_PASSWORD','8i5Ch4eLB');
	DEFINE ('DB_HOST','students');
	DEFINE ('DB_NAME','cs566304');
	
	//make connection
	$dbc = @mysqli_connect( DB_HOST , DB_USER , DB_PASSWORD , DB_NAME );
	if(!$dbc)
	{
		die('Could not connect to MySql: '.mysqli_connect_error() );
	}

	//set encoding
	mysqli_set_charset($dbc, 'utf8');
	
	
	if($_POST["type"]=="Admin")
	{
		echo '<form name="ref_det"  method="POST" action="ref.php"><table><tr><td>Admin Name</td><td><input type="text" size="20" name="name1"/></td></tr><tr><td>Password</td><td><input type="password" size="8" name="pass1"/></td></tr></table></br>';
		echo '<input type="submit" value="Submit" name="submit2"/>';
		echo '</form></br></br>';
			
	}
	if($_POST["type"]=="Coach")
	{
		echo '<form name="coach_det" method="POST" action="coa.php"><table><tr><td>Coach Name</td><td><input type="text" size="20" name="name2"/></td></tr><tr><td>Password</td><td><input type="password" size="8" name="pass2"/></td></tr></table></br>';
		echo '<input type="submit" value="Submit" name="submit3"/>';
		echo '</form></br></br>';
	
	}
	if($_POST["type"]=="Player")
	{
		echo '<form name="player_det" method="POST" action="plr.php"><table><tr><td>Player Name</td><td><input type="text" size="20" name="name3"/></td></tr><tr><td>Password</td><td><input type="password" size="8" name="pass3"/></td></tr></table></br>';
		echo '<input type="submit" value="Submit" name="submit4"/>';
		echo '</form></br></br>';

	}
	
	mysqli_close($dbc);
}

if(!isset($_POST["submit1"]))
{
	die('Please select an option to proceed!');
}


?>
</center>

</body>
</html>