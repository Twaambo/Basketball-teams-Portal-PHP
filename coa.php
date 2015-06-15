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
	<font color="#000000">LOGOUT</font></a></div></td>
    <td class="class1"><div align="center" class="style2">
	<a href="gallery.html" style="text-decoration: none">
	<font color="#000000">GALLERY</font></a></div></td>
  </tr>
</table>
</body>
</html>

<?php
if(isset($_POST["submit3"]))
{
	$i=1;
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
		
		$name=$_POST["name2"];
		$pass=$_POST["pass2"];
			
		$query="select * from Coach where CoachName='$name' and Password='$pass'";
		$result = @mysqli_query ($dbc, $query);
		$num = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($num != 0)
		{
			$team = $row["TeamName"];
			echo '<font color="columbia blue">';
			echo '<h2>Hello '.$name.'. Welcome to the '.$team.' team portal!</h2></font><font color="turqoise"><h3><u>TEAM DETAILS</u></h3>';
			
			$query="select * from Team where TeamName='$team'";	
			$result = @mysqli_query ($dbc, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo '<font color="fire engine red"><table border="1" cellspacing="5" cellpadding="5" ><th>Team Name</th><th>No. of Players</th><th>Team Points</th><th>Rank</th>';
			echo'<tr><td>'.$row['TeamName'].'</td><td><center>'.$row['NumOfPlayers'].'</center></td><td><center>'.$row['TeamPoints'].'</center></td><td><center>'.$row['Rank'].'</center></td></tr>';
			echo'</table></font></center><br>';
			
			$query="select * from Player where TeamName='$team'";	
			$result = @mysqli_query ($dbc, $query);
			echo '<div name="left" style="float:left;width:50%;"><center><h3><u>PLAYER DETAILS</u></h3><font color="fire engine red"><table border="1" cellspacing="5" cellpadding="5" ><th>Player Name</th><th>Address</th><th>City</th><th>Contact Number</th>';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
			{
				echo'<tr><td>'.$row['PlayerName'].'</td><td>'.$row['Address'].'</td><td>'.$row['City'].'</td><td><center>'.$row['ContactNum'].'</center></td></tr>';
			}
			echo'</table></font></center></div>';
			
			$query="select AdminName,DATE_FORMAT(FixtureDate,'%m/%d/%Y') as FixtureDateFormat,HomeTeam,PointsHome,AwayTeam,PointsAway from Game where (HomeTeam='$team' OR AwayTeam='$team')";	
			$result = @mysqli_query ($dbc, $query);
			echo '<div name="right" style="float:left;width:50%;"><center><h3><u>FIXTURE DETAILS</u></h3><font color="fire engine red"><table border="1" cellspacing="5" cellpadding="5"><th>No.</th><th>Refree</th><th>Fixture Date</th><th>Home Team</th><th>Points - Home Teams</th><th>Away Team</th><th>Points - Away Team</th>';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
			{
				echo'<tr><td>'.$i.'</td><td>'.$row['AdminName'].'</td><td>'.$row['FixtureDateFormat'].'</td><td>'.$row['HomeTeam'].'</td><td><center>'.$row['PointsHome'].'</center></td><td>'.$row['AwayTeam'].'</td><td><center>'.$row['PointsAway'].'</center></td></tr>';
				$i++;
			}//end of while
			echo'</table></font></center></div>';
		}
		else
		{
			echo '<br><br><br>Invalid User name or password<br>';
			echo '<form action="login.php">';
			echo '<input type="submit" Value="Go back">';
			echo '</input></form>';
		}
	
	mysqli_free_result($result);
	mysqli_close($dbc);
}

?>