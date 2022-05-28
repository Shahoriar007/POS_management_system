<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
  $productname = $_POST['productname'];
  $brand = $_POST['brand'];
  $cost = $_POST['cost'];
  $price = $_POST['price'];
  $details = $_POST['details'];
  

  
      $sql = "INSERT INTO products (products_name, brand_name, products_cost, products_price, products_details)
          VALUES ('$productname','$brand', '$cost', '$price', '$details')";
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

  <title>Products</title>
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add New Products</p>
      <div class="input-group">
        <input type="text" placeholder="productname" name="productname"  required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="brand" name="brand"  required>
      </div>
      <div class="input-group">
        <input type="number" placeholder="cost" name="cost"  required>
      </div>
      <div class="input-group">
        <input type="number" placeholder="price" name="price"  required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="details" name="details"  required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Submit</button>
      </div>
      
    </form>
  </div>


<?php
include 'config.php';

session_start();

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
      <H1>Products List</H1>
      <tr>
      <th>Products Id</th>
      <th>  Product name</th>
      <th>   brand</th>
      <th>  cost</th>
      <th>  price</th>
      <th>  details</th>
      </tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "
          <tr>
          <td>" . $row['products_id'] . "</td>
          <td>" . $row['products_name'] . "</td>
          <td>" . $row['brand_name'] . "</td>
          <td>" . $row['products_cost'] . "</td>
          <td>" . $row['products_price'] . "</td>
          <td>" . $row['products_details'] . "</td>
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