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

td.class2
{
	background: linear-gradient(#FFFFFF,#404040);
	color: #FFFFFF;
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
	<font color="#000000">LOGOUT</font></a></div></td>
    <td class="class1"><div align="center" class="style2">
	<a href="gallery.html" style="text-decoration: none">
	<font color="#000000">GALLERY</font></a></div></td>
  </tr>
</table><br><br></br></br>
</body>
</html>

<?php
if(isset($_POST["submit2"]))
{
	echo '<center><font color="#FFFFFF">';
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
		
		$name=$_POST["name1"];
		$pass=$_POST["pass1"];
			
		$query="select * from Admin where AdminName='$name' and Password='$pass'";
		$result = @mysqli_query ($dbc, $query);
		$num= mysqli_num_rows($result);
		if($num != 0)
			{
			echo '<font color="#ffffff" size="6">Hello '.$name.'</font>';
			echo '<table width="50%" border="1" cellspacing="5" cellpadding="5">';
			echo '</br></br></br></br><tr>';
			echo '<td class="class2"><div align="center" class="style2">';
			echo '<a href="addteam.php" style="text-decoration: none">';
			echo '<font color="#000000">';
			echo 'ADD TEAM';
			echo '</font></a></div></td>';
			echo '<td class="class2"><div align="center" class="style2">';
			echo '<a href="addcoach.php" style="text-decoration: none">';
			echo '<font color="#000000">';
			echo 'ADD COACH';
			echo '</font></a></div></td>';
			echo '<td class="class2"><div align="center" class="style2">';
			echo '<a href="addplayer.php" style="text-decoration: none">';
			echo '<font color="#000000">';
			echo 'ADD PLAYER';
			echo '</font></a></div></td>';
			echo '<td class="class2"><div align="center" class="style2">';
			echo '<a href="addgame.php" style="text-decoration: none">';
			echo '<font color="#000000">';
			echo 'ADD GAME';
			echo '</font></a></div></td>';
			echo '</tr></table><br><br></br></br>';
			}
		else
		{
			echo '<br><br><br>Invalid User name or password<br>';
			echo '<form action="login.php">';
			echo '<input type="submit" value="Go back">';
			echo '</input></form>';
		}
	
	echo '</center>';		
	
	mysqli_free_result($result);
	mysqli_close($dbc);
}
?>