<?php 

include '../config.php';

error_reporting(0);

session_start();



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

	<title>Operators List</title>
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


<?php
include '../config.php';

session_start();

$sql = "SELECT * FROM operators";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<H1>Operators List</H1>";
echo "<tr>";
echo "<th>Operators Id</th>
			<th>  Operators Name</th>
			<th>   Email</th>
			<th>  Phone</th>
			<th>  Address</th>
			<th>  Operations</th>";
echo "</tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

				echo "
					<tr>
					<td>" . $row['operator_id'] . "</td>
					<td>" . $row['operator_name'] . "</td>
					<td>" . $row['operator_email'] . "</td>
					<td>" . $row['operator_phone'] . "</td>
					<td>" . $row['operator_address'] . "</td>
					<td> <a href = 'delete_operator.php?rn=$row[operator_id]'>Delete</td>
					</tr>

				";

    }
} else {
    echo "0 results";
}

echo "</table>";
mysqli_close($conn);
?>
		
</body>
</html>