<?php 

include '../config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['admin_name'])) {
    header("Location: welcome_admin.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['admin_name'] = $row['admin_name'];
		$_SESSION['admin_email'] = $row['admin_email'];
		header("Location: welcome_admin.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - Pure Coding</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Admin Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<!-- <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p> -->

			<p class="login-register-text"><a href="../index.php">Operators Section</a></p>
			<!-- <p class="login-register-text"><a href="emp_login.php">Employee Section</a></p> -->

		</form>
	</div>
</body>
</html>