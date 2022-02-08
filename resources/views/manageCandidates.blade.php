<?php
//including the database connection file
$databaseHost = 'localhost';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = 'Jeffield';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Administrador</title>
</head>

<body>
<a href="/addCandidates">Agregar candidatos</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		
	</tr>
	<?php 
	// print($candidates);
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	// while($res = mysqli_fetch_array($result)) { 			
	foreach ($candidates as $res) {			
		echo "<tr>";
		echo "<td>".$res->name."</td>";
		echo "<td>".$res->lista."</td>";
		//echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res->id\">Edit</a> | <a href=\"delete.php?id=$res->id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
