<?php
	include '../config.php';
	error_reporting(0);

$operator_id = $_GET['rn'];

$sql = "DELETE FROM operators WHERE operator_id = '$operator_id'";
$result = mysqli_query($conn, $sql);

if($result)
{
	#echo "<script>alert('Operator Deleted Successfully!.')</script>";
	header("Location: operator_list.php");

}
else
{
	echo "<script>alert('Operator Deleted Error!.')</script>";
}

?>