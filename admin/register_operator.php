<?php 

include '../config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	if ($password == $cpassword) {
	
			$sql = "INSERT INTO operators (operator_name, operator_email, operator_password, operator_phone, operator_address)
					VALUES ('$username', '$email', '$password', '$phone', '$address')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Operator Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./userProfile.css">

	<title>Register Form for Operators</title>
</head>
<body>


            <!-- Navbar starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="editUserProfile.php">Update Profile </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="problem_submit.php">Post Problem</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="welcome_admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register_operator.php">Operator Reg</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="operator_list.php">Operator List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a></a>
      </li>
    </ul>
    
  </div>
</nav> 

<!-- Navbar ends -->


	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username"  required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"  required>
			</div>
			<div class="input-group">
				<input type="tel" placeholder="Phone" name="phone"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Address" name="address"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			
		</form>
	</div>
</body>
</html>