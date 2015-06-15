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
</table><br>
<center>
<font color="#FFFFFF" size="6">
<form name="addg" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Refree Name:<input type="text" size="20" name="rname"\></br></br>
	Home Team:<input type="text" size="20" name="hname"\>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	Away Team:<input type="text" size="20" name="aname"\></br>
	Points Home:<input type="number" size="4" name="hp"\>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	Points Away:<input type="number" size="4" name="ap"\></br></br></br>
	Fixture Date:<input type="date" name="fdate" id="datepicker"\></br></br>
	<input type="submit" value="Submit" name="steam" style="background: linear-gradient(#FFFFFF,#404040); font-style: italic; font-weight: bold; width: 80px; height: 30px;"\></form></font></center>
</body>
</html>

<?php
if(isset($_POST["steam"]))
{
	echo '<center>';
	echo '<font color="#000000" size="6">';
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
	
	
	echo '</br>';
	$name=$_POST["rname"];
	$hn=$_POST["hname"];
	$an=$_POST["aname"];
	$hpo=$_POST["hp"];
	$apo=$_POST["ap"];
	$d=$_POST["fdate"];
	
	$query="insert into Game(AdminName,FixtureDate,HomeTeam,AwayTeam,PointsHome,PointsAway) values('".$name."','".$d."','".$hn."','".$an."',".$hpo.",".$apo.");";
	
	$result = @mysqli_query($dbc, $query);
	if($result)
	{	
		echo 'Game Added!!!';
	}
	else
	{
		echo 'Couldnt add game :(';
		
		
	}

	echo '</font></center>';

	
	mysqli_close($dbc);
}
?>