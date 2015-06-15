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
<form name="addt" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	New Team:<input type="text" size="20" name="teamname"\>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	Total points:<input type="text" size="5" name="points"\></br>
	<hr>
	Give 5 player names
	<hr>
	New Player:<input type="text" size="20" name="pl1"\></br>
	New Player:<input type="text" size="20" name="pl2"\></br>
	New Player:<input type="text" size="20" name="pl3"\></br>
	New Player:<input type="text" size="20" name="pl4"\></br>
	New Player:<input type="text" size="20" name="pl5"\></br>
	<hr>
	<input type="submit" value="Submit" name="steam" style="background: linear-gradient(#FFFFFF,#404040); font-style: italic; font-weight: bold; width: 80px; height: 30px;"\></form></font></center>
</body>
</html>

<?php
if(isset($_POST["steam"]))
{
	echo '<center>';

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
	$name=$_POST["teamname"];
	$p=$_POST["points"];
	$nplayers=5;
	$p1=$_POST["pl1"];
	$p2=$_POST["pl2"];
	$p3=$_POST["pl3"];
	$p4=$_POST["pl4"];
	$p5=$_POST["pl5"];
	
	if( empty($p1) || empty($p2) || empty($p3) || empty($p4) || empty($p5) )
	{
		echo 'Not enough players given';
		
	}
	
	
	
	else
	{
		$query="insert into Team values('".$name."','".$nplayers."','".$p."')";
		$query1="insert into Player values('".$pl1."','".$name."',NULL,NULL,NULL,NULL,NULL,NULL)";		
		$query2="insert into Player values('".$pl2."','".$name."',NULL,NULL,NULL,NULL,NULL,NULL)";
		$query3="insert into Player values('".$pl3."','".$name."',NULL,NULL,NULL,NULL,NULL,NULL)";
		$query4="insert into Player values('".$pl4."','".$name."',NULL,NULL,NULL,NULL,NULL,NULL)";
		$query5="insert into Player values('".$pl5."','".$name."',NULL,NULL,NULL,NULL,NULL,NULL)";
		
		$result = @mysqli_query($dbc, $query);
		if($result)
		{
			echo '<font color="#000000">';	
			echo 'Team Added!!!';
			$result1 = @mysqli_query($dbc, $query1);
			$result2 = @mysqli_query($dbc, $query2);
			$result3 = @mysqli_query($dbc, $query3);
			$result4 = @mysqli_query($dbc, $query4);
			$result5 = @mysqli_query($dbc, $query5);
			if( $result1 && $result2 && $result3 && $result4 && $result5)
				echo 'Players added!!!';
			echo '</font>';
		}
		else
		{
			echo '<font color="#000000">';
			echo 'Couldnt add team :(';
			echo '</font>';
		}

		echo '</center>';


	}
	mysqli_close($dbc);
}
?>