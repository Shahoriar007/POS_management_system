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
        <a class="nav-link" href="purchase_invoice.php">Purchase Invoice</a>
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



<?php
include 'config.php';

session_start();



 echo "<form action='' method='post'>";
        
          
    echo "<input type='date' name='start_date' >";

    echo "<input type='date' name='end_date' >";

      echo "<input type='submit' name='submit'>";
    echo "</form>";





if(isset($_POST["submit"])){
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];


$sql = "SELECT purchase_date, sup_name, products_name, purchase_qyt, products_cost, (purchase_qyt*products_cost) as total_products_cost, products_price, (purchase_qyt*products_price) as total_products_price, ((products_price-products_cost)*purchase_qyt) as profit
FROM purchase, supplires, products
WHERE purchase.sup_id = supplires.sup_id AND purchase.products_id = products.products_id AND (purchase_date BETWEEN '$start_date' AND '$end_date')
";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
      <H1>Searched Table</H1>
      <tr>
      <th>Date</th>
      <th>Supplier Name</th>
      <th>Product Name</th>
      <th>Purchase QYT</th>
      <th>Product Cost</th>
      <th>Product Price</th>
      <th>Total Product Cost</th>
      <th>Total Product Price</th>
      <th>Profit</th>
      </tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "
          <tr>
          <td>" . $row['purchase_date'] . "</td>
          <td>" . $row['sup_name'] . "</td>
          <td>" . $row['products_name'] . "</td>
          <td>" . $row['purchase_qyt'] . "</td>
          <td>" . $row['products_cost'] . "</td>
          <td>" . $row['products_price'] . "</td>
          <td>" . $row['total_products_cost'] . "</td>
          <td>" . $row['total_products_price'] . "</td>
          <td>" . $row['profit'] . "</td>
          </tr>

        ";

    }
} else {
    echo "0 results";
}

echo "</table>";


// show total cost

$sql2 = "SELECT SUM((products_cost)*purchase_qyt) AS Total_cost
FROM purchase, products
WHERE purchase.products_id = products.products_id AND (purchase_date BETWEEN '2021-09-01' AND '2021-09-02')
";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {

      echo "<br>";

      echo "<h2>Total Cost: " . $row2['Total_cost'] . "</h2>";
      

}

} else {
    echo "0 results";
}


// show total rev

$sql3 = "SELECT SUM((products_price)*purchase_qyt) AS Total_price
FROM purchase, products
WHERE purchase.products_id = products.products_id AND (purchase_date BETWEEN '2021-09-01' AND '2021-09-02')
";
$result3 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {

      echo "<br>";

      echo "<h2>Total Revenue: " . $row3['Total_price'] . "</h2>";
      

}

} else {
    echo "0 results";
}



// show total Profit

$sql4 = "SELECT SUM((products_price-products_cost)*purchase_qyt) AS Total_Profit
FROM purchase, products
WHERE purchase.products_id = products.products_id AND (purchase_date BETWEEN '2021-09-01' AND '2021-09-02')
";
$result4 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result4)) {

      echo "<br>";

      echo "<h2>Total Profit: " . $row4['Total_Profit'] . "</h2>";
      

}

} else {
    echo "0 results";
}

}


else{


//stock

$sql = "SELECT purchase_date, sup_name, products_name, purchase_qyt, products_cost, (purchase_qyt*products_cost) as total_products_cost, products_price, (purchase_qyt*products_price) as total_products_price, ((products_price-products_cost)*purchase_qyt) as profit
FROM purchase, supplires, products
WHERE purchase.sup_id = supplires.sup_id AND purchase.products_id = products.products_id
";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
      <H1>Stock</H1>
      <tr>
      <th>Date</th>
      <th>Supplier Name</th>
      <th>Product Name</th>
      <th>Purchase QYT</th>
      <th>Product Cost</th>
      <th>Product Price</th>
      <th>Total Product Cost</th>
      <th>Total Product Price</th>
      <th>Profit</th>
      </tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "
          <tr>
          <td>" . $row['purchase_date'] . "</td>
          <td>" . $row['sup_name'] . "</td>
          <td>" . $row['products_name'] . "</td>
          <td>" . $row['purchase_qyt'] . "</td>
          <td>" . $row['products_cost'] . "</td>
          <td>" . $row['products_price'] . "</td>
          <td>" . $row['total_products_cost'] . "</td>
          <td>" . $row['total_products_price'] . "</td>
          <td>" . $row['profit'] . "</td>
          </tr>

        ";

    }
} else {
    echo "0 results";
}

echo "</table>";

// show total cost

$sql2 = "SELECT SUM((products_cost)*purchase_qyt) AS Total_cost
FROM purchase, products
WHERE purchase.products_id = products.products_id
";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {

      echo "<br>";

      echo "<h2>Total Cost: " . $row2['Total_cost'] . "</h2>";
      

}

} else {
    echo "0 results";
}


// show total rev

$sql3 = "SELECT SUM((products_price)*purchase_qyt) AS Total_price
FROM purchase, products
WHERE purchase.products_id = products.products_id
";
$result3 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {

      echo "<br>";

      echo "<h2>Total Revenue: " . $row3['Total_price'] . "</h2>";
      

}

} else {
    echo "0 results";
}



// show total Profit

$sql4 = "SELECT SUM((products_price-products_cost)*purchase_qyt) AS Total_Profit
FROM purchase, products
WHERE purchase.products_id = products.products_id
";
$result4 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result4)) {

      echo "<br>";

      echo "<h2>Total Profit: " . $row4['Total_Profit'] . "</h2>";
      

}

} else {
    echo "0 results";
}


}

mysqli_close($conn);
?>




</body>
</html>