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
<font color="#FFFFFF" size="5">
<form name="addt" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	New Coach:<input type="text" size="20" name="cname"\></br>
	Team:<input type="text" size="20" name="tname"\></br>
	Address:<input type="text" size="15" name="addr"\></br>
	City:<input type="text" size="15" name="cit"\></br>
	State:<input type="text" size="2" name="st"\></br>
	Zip:<input type="text" size="5" name="zip"\></br>
	ContactNum:<input type="text" size="10" name="numbe"\></br>
	Password:<input type="text" size="15" name="pass"\></br>
	<input type="submit" value="Submit" name="steam" style="background: linear-gradient(#FFFFFF,#404040); font-style: italic; font-weight: bold; width: 80px; height: 30px;"\></form></font></center>
</body>
</html>

<?php
if(isset($_POST["steam"]))
{
	echo '<center>';
	echo '<font color="#000000" size="5">';
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
	
	echo '<center>';
	echo '</br>';
	$name=$_POST["cname"];
	$team=$_POST["tname"];
	$addre=$_POST["addr"];
	$c=$_POST["cit"];
	$s=$_POST["st"];
	$z=$_POST["zip"];
	$con=$_POST["numbe"];
	$p=$_POST["pass"];

	
	$query="insert into Coach values('".$cname."',NULL,'".$tname."','".$addre."','".$c."','".$s."','".$z."','".$con."','".$p."')";
	
	$result = @mysqli_query($dbc, $query);
	if($result)
	{	
		echo 'Coach Added!!!';
	}
	else
	{
		echo 'Couldnt add coach :(';
	}

	echo '</font></center>';


	mysqli_close($dbc);
}
?>