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
</table><br><br></br></br>
<font color="#FFFFFF" size="5"><center>
<form name="addt" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	New Player&nbsp&nbsp&nbsp:&nbsp&nbsp<input type="text" size="20" name="playername"\></br>
	Team&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp<input type="text" size="20" name="tname"\></br>
	Address&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" size="15" name="address"\></br>
	City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" size="15" name="city"\></br>
	State&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" size="2" name="state"\></br>
	Zip&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" size="5" name="zip"\></br>
	ContactNum&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" size="10" name="contact"\></br>
	Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" size="15" name="pass"\></br>
	</br><input type="submit" value="Submit" name="steam" style="background: linear-gradient(#FFFFFF,#404040); font-style: italic; font-weight: bold; width: 80px; height: 30px;"\></form></center></font>
</body>
</html>

<?php
if(isset($_POST["steam"]))
{
	echo '<center>';
	echo '<font color="#FFFFFF" size="6">';
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
	
	$name=$_POST["playername"];
	$team=$_POST["tname"];
	$add=$_POST["address"];
	$cit=$_POST["city"];
	$st=$_POST["state"];
	$z=$_POST["zip"];
	$num=$_POST["contact"];
	$password=$_POST["pass"];

	$query1="select PlayerName from Player where TeamName like '$team'";
	$result1 = @mysqli_query($dbc, $query1);


		$num1= mysqli_num_rows($result1);
		
		if( $num1 < 15 && $num1 != 0)
		{ 
			$num1=$num1+1;
			
			$query="insert into Player values('".$name."','".$team."','".$add."','".$cit."','".$st."','".$z."','".$num."','".$password."')";

			$result = @mysqli_query($dbc, $query);
			if($result)
			{	
				echo 'Player Added!!!';
				$query2="update Team SET NumOfPlayers='$num1' where TeamName='$team'";
		
				$result2= @mysqli_query($dbc, $query2);
				if($result2 == true )
				{
					echo 'Number of players updated';
				}	
			}
			else
			{
				echo 'Couldnt add player :(';
				
			}
		}
		else if( $num1 == 0 )
		{
			echo 'No such team';
		}
		else
		{
			echo 'Team is FULL!!!!!';
		}

	echo '</font></center>';
	
	mysqli_free_result($result1);
	mysqli_close($dbc);
}
else
{
	echo 'Text fields not filled';
}
?>