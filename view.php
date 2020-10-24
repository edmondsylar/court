<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
//UNCOMMENT THE CODE BELOW FOR USERS TO SEE PRODUCTS THEY HAVE UPDATED ONLY
//$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$result = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="view.php">Add New record table</a>| <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=2 align="center">
		<tr bgcolor='#CCCCCC'>
			<td>SN</td>
			<td>Box Number</td>
			<td>File Number</td>
			<td>Catelog</td>
			<td>Ic N0</td>
			<td>Parties</td>
			<td>Arising</td>
			<td>Claim</td>
			<td>Note</td>
			<td>Copies</td>
			<td>Filing</td>
			<td>action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['bx']."</td>";
			echo "<td>".$res['boxsn']."</td>";
			echo "<td>".$res['cat']."</td>";
			echo "<td>".$res['icno']."</td>";
			echo "<td>".$res['pat']."</td>";
			echo "<td>".$res['arise']."</td>";
			echo "<td>".$res['claim']."</td>";
			echo "<td>".$res['note']."</td>";
			echo "<td>".$res['copies']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">More</a></td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>