<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  
      $sql = "INSERT INTO supplires (sup_name, sup_email, sup_phn, sup_address)
          VALUES ('$username', '$email', '$phone', '$address')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('Wow! New Supplier Added!')</script>";
      } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
      }
    

}
mysqli_close($conn);
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

  <title>Suppliers</title>
</head>
<body>


            <!-- Navbar starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="welcome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="suppliers.php">Suppliers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stock.php">Stock</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a></a>
      </li>

    </ul>
    
  </div>
</nav> 

<!-- Navbar ends -->


  <div class="container">
    <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add New Supplires</p>
      <div class="input-group">
        <input type="text" placeholder="Username" name="username"  required>
      </div>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email"  required>
      </div>
      <div class="input-group">
        <input type="tel" placeholder="Phone" name="phone"  required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="Address" name="address"  required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Submit</button>
      </div>
      
    </form>
  </div>


<?php
include 'config.php';

session_start();

$sql = "SELECT * FROM supplires";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<H1>Suppliers List</H1>";
echo "<tr>";
echo "<th>Suppliers Id</th>
      <th>  Suppliers Name</th>
      <th>   Email</th>
      <th>  Phone</th>
      <th>  Address</th>";
      
echo "</tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "
          <tr>
          <td>" . $row['sup_id'] . "</td>
          <td>" . $row['sup_name'] . "</td>
          <td>" . $row['sup_email'] . "</td>
          <td>" . $row['sup_phn'] . "</td>
          <td>" . $row['sup_address'] . "</td>
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