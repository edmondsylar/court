<?php session_start(); ?>
<?php function auto_copyright($year = 'auto'){ ?>
   <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
   <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
   <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
   <?php if(intval($year) > date('Y')){ echo date('Y'); } ?>
<?php } ?>

<html>
	<head>
		<title>Homepage</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="header">
			THE IC CATELOGUE
		</div>
		<?php
		if(isset($_SESSION['valid'])) {			
			include("connection.php");					
			$result = mysqli_query($mysqli, "SELECT * FROM login");
		?>
					
			Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
			<br/>
			<a href='view.php'>View and Add Records</a>
			<br/><br/>
		<?php	
		} else {
			echo "You must be logged in to view this page.<br/><br/>";
			echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
		}
		?>
		<div id="footer"> &copy; <?php auto_copyright("2019");  // 2010 - 2017 ?> </div>
	</body>
</html>
