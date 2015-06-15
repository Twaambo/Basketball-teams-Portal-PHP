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
</table><br><br>
</body>
</html>

<?php
	// Defining to make this all one document
	$page = $_GET['page'];

	//set database access information as constants
	DEFINE ('DB_USER','cs566304');
	DEFINE ('DB_PASSWORD','8i5Ch4eLB');
	DEFINE ('DB_HOST','students');
	DEFINE ('DB_NAME','cs566304');
	
	//make connection
	$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
	or die ('Could not connect to MySql:' .mysqli_connect_error() );
	
	//set encoding
	mysqli_set_charset($dbc, 'utf8');
	
	// Run the query.
	$q ="select GameNum,DATE_FORMAT(FixtureDate,'%m/%d/%Y') as FixtureDateFormat,HomeTeam,PointsHome,AwayTeam,PointsAway from Game";
	$r = @mysqli_query ($dbc, $q);
	if ($r)
	{
		echo '<br><center><font color="fire engine red"><table width="100%" border="1" cellspacing="5" cellpadding="5" ><th>Game Number</th><th>Fixture Date</th><th>Home Team</th><th>Points - Home Teams</th><th>Away Team</th><th>Points - Away Team</th>';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
		{
			echo'<tr><td><center>'.$row['GameNum'].'</center></td><td>'.$row['FixtureDateFormat'].'</td><td>'.$row['HomeTeam'].'</td><td><center>'.$row['PointsHome'].'</center></td><td>'.$row['AwayTeam'].'</td><td><center>'.$row['PointsAway'].'</center></td></tr>';
		}//end of while
		
		echo'</table></font></center>';
		mysqli_free_result ($r); //Free up the resources.
	}
	//close the database connection
	mysqli_close($dbc);
?>