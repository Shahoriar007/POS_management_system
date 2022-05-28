<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
  $products = $_POST['products'];
  $Quantity = $_POST['Quantity'];
  $date = $_POST['date'];
  $invoice = $_POST['invoice'];

  
      $sql = "INSERT INTO order ( products_id, order_qyt, order_date, pinv_id)
          VALUES ('$products', '$Quantity', '$date', '$invoice')";
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
    <form action="" method="POST" class="login-Quantity">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add New Purchase</p>
      <div class="input-group">
        
<?php
include 'config.php';


            echo "<select name='products' id='products'>";

                  $sql = "SELECT products_id,products_name FROM products";
                  $result3 = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result3) > 0) {
                      while($row3 = mysqli_fetch_assoc($result3)){

                    echo "<option value=$row3[products_id]>" . $row3[products_name] ."</option>";
                  }
                  }

                echo "</select></br>";
?>
      </div>
      <div class="input-group">
        <input type="number" placeholder="qyt" name="Quantity"  required>
      </div>
      <div class="input-group">
        <input type="date"  name="date"  required>
      </div>
      <div class="input-group">
        
        <?php
include 'config.php';


            echo "<select name='invoice' id='invoice'>";

                  $sql = "SELECT pinv_id,pinv_no FROM purchase_invoice";
                  $result3 = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result3) > 0) {
                      while($row3 = mysqli_fetch_assoc($result3)){

                    echo "<option value=$row3[pinv_id]>" . $row3[pinv_no] ."</option>";
                  }
                  }

                echo "</select></br>";
?>


      </div>
      <div class="input-group">
        <button name="submit" class="btn">Submit</button>
      </div>
      
    </form>
  </div>






</body>
</html>