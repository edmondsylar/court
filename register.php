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
	<?php
	include("connection.php");

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if($user == "" || $pass == "" || $name == "" || $email == "") {
			echo "All fields should be filled. Either one or many fields are empty.";
			echo "<br/>";
			echo "<a href='register.php'>Go back</a>";
		} else {
			mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
				or die("Could not execute the insert query.");
				
			echo "Registration successfully";
			echo "<br/>";
			echo "<a href='login.php'>Login</a>";
		}
	} else {
	?>
 <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        Register
                    </a>
                </div>
                <div class="login-form">
				<form name="form1" method="post" action="">
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" required name="name" class="form-control" placeholder="Full Name">
						</div>

						<div class="form-group">
							<label>User Name</label>
							<input type="text" required name="username" class="form-control" placeholder="Full Name">
						</div>

						<div class="form-group">
							<label>Email address</label>
							<input type="email" required name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" required name="password" class="form-control" placeholder="Password">
						</div>
						<div class="checkbox">
							<label>
								<input required type="checkbox"> Agree the terms and policy
							</label>
						</div>

						<button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
						<div class="register-link m-t-15 text-center">
							<p>Already have account ? <a href="login.php"> Sign in</a></p>
						</div>
					</form>
		<?php
		}
		?>
</body>
</html>
