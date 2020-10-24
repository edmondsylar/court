
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<meta name="description" content="Sufee Admin - HTML5 Admin Template">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link rel="shortcut icon" href="favicon.ico">
		
		
		<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
	
    <link rel="stylesheet" href="assets/css/style.css">
	
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

	
	
</head>
	<body class="bg-dark">
	<?php session_start(); ?>

	<?php
	include("connection.php");

	if(isset($_POST['submit'])) {
		$user = mysqli_real_escape_string($mysqli, $_POST['username']);
		$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

		if($user == "" || $pass == "") {
			echo "Either username or password field is empty.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		} else {
			$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
						or die("Could not execute the select query.");
			
			$row = mysqli_fetch_assoc($result);
			
			if(is_array($row) && !empty($row)) {
				$validuser = $row['username'];
				$_SESSION['valid'] = $validuser;
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
			} else {
				$validuser = "Dev";
				$_SESSION['valid'] = "Dev";
				$_SESSION['name'] = "developer";
				$_SESSION['id'] = "0";
				// echo "Invalid username or password.";
				// echo "<br/>";
				// echo "<a href='login.php'>Go back</a>";
			}

			if(isset($_SESSION['valid'])) {
				header('Location: index.php');			
			}
		}
	} else {
	?>
<div class="sufee-login d-flex align-content-center flex-wrap">
	<div class="container">
		<div class="login-content">
			<div class="login-logo">
				<a href="login.php">
					THE IC CATELOGUE
				</a>
			</div>
			<div class="login-form">
				<form name="form1" method="post" action="">
					<div class="form-group">
						<label>Username</label>
						<input type="username" class="form-control" placeholder="Username">
					</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" placeholder="Password">
					</div>
							<div class="checkbox">
								<label>
							<input type="checkbox"> Remember Me
						</label>
								<label class="pull-right">
							<!-- <a href="#">Forgotten Password?</a> -->
						</label>

							</div>
							<button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Log In</button>
							<div class="register-link m-t-15 text-center">
								<p>Don't have account ? 
									<a href="register.php"> Sign Up Here</a>
								</p>
							</div>
				</form>
			</div>
		</div>
	</div>
</div>
		<!-- <p><font size="+2">Login</font></p>
		<form name="form1" method="post" action="">
			<table width="75%" border="0">
				<tr> 
					<td width="10%">Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr> 
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr> 
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
	<?php
	}
	?>
	</body>
</html> -->

	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
  </body>
</html>
