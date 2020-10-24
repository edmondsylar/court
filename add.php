<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
	<head>
		<title>Add Data</title>
	</head>

	<body>
	<?php
	//including the database connection file
	include_once("connection.php");

	if(isset($_POST['Submit'])) {	
		$box = $_POST['box'];
		$boxsn = $_POST['boxsn'];
		$cat = $_POST['cat'];
		$icno = $_POST['icno'];
		$pat = $_POST['pat'];
		$arise = $_POST['arise'];
		$claim = $_POST['claim'];
		$note = $_POST['note'];
		$copies = $_POST['copies'];
		$loginId = $_SESSION['id'];
			
		// checking empty fields
		if(empty($box) || empty($boxsn) || empty($cat)|| empty($icno)|| empty($pat)|| empty($arise)|| empty($claim)|| empty($note)|| empty($copies)) {
					
			if(empty($box)) {
				echo "<font color='red'>Box field is empty.</font><br/>";
			}
			
			if(empty($boxsn)) {
				echo "<font color='red'>file number is empty</font><br/>";
			}
			
			if(empty($cat)) {
				echo "<font color='red'>Category field is empty.</font><br/>";
			}
			if(empty($icno)) {
				echo "<font color='red'>IC N0 field is empty.</font><br/>";
			}
			if(empty($pat)) {
				echo "<font color='red'>Parties to the Dispute field is empty.</font><br/>";
			}
			if(empty($arise)) {
				echo "<font color='red'>Arising from field is empty.</font><br/>";
			}
			if(empty($claim)) {
				echo "<font color='red'>Claim field is empty.</font><br/>";
			}
			if(empty($note)) {
				echo "<font color='red'>Note field is empty.</font><br/>";
			}
			if(empty($copies)) {
				echo "<font color='red'>Number of copies is empty.</font><br/>";
			}
			
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else { 
			// if all the fields are filled (not empty) 
				
			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO products(bx, boxsn, cat, icno, pat, arise, claim, note, copies, login_id) VALUES('$box','$boxsn','$cat','$icno','$pat','$arise','$claim','$note','$copies', '$loginId')");
			
			//display success message
			echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='view.php'>View Result</a>";
		}
	}
	?>
	</body>
</html>
