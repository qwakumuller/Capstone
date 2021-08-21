<?php
include 'DBConnection.php';


$productName = $productPrice = $itemDescription = $productSku =  $itemQuantity = "";


//Posts variables from form and runs them through security function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = security($_POST["productName"]);
    $productPrice = security($_POST["productPrice"]);
    $itemDescription = security($_POST["itemDescription"]);
    $productSku = security($_POST["productSku"]);
    $itemQuantity = security($_POST["itemQuantity"]);
  }

//Trims extra spaces, slashes and html special char
function security($data) {

$data = trim($data);
$data = stripslashes($data);
//$data  = mysqli_real_escape_string($con,$data);
$data = htmlspecialchars($data);
return $data;
  }

mysqli_select_db($con,"mydb");

$sql = "SELECT * FROM Products WHERE ItemName = '" . $productName . "'";
$result = mysqli_query($con, $sql);
$nameCheck = mysqli_num_rows($result);
$sql = "SELECT * FROM Products WHERE SKU = '" . $productSku . "'";
$result = mysqli_query($con, $sql);
$skuCheck = mysqli_num_rows($result);
if($nameCheck != "0")
{
	echo "Name already taken, change name of product.";
}
elseif($skuCheck != "0")
{
	echo "SKU already taken, change SKU of product.";
}
else
{
	$sql = "INSERT INTO Products (ItemName, ProductPrice, Descript, SKU, ItemQuantity) VALUES ('$productName', '$productPrice', '$itemDescription', '$productSku', '$itemQuantity')";
	// $result = mysqli_query($con,$sql);
	if (mysqli_query($con, $sql)) 
	{
		echo "Record updated successfully <br>";
		echo $productName ."<br />";
		echo $productPrice ."<br />";
		echo $itemDescription ."<br />";
		echo $productSku ."<br />";
		echo $itemQuantity . "<br/>";
	}		
	else 
	{
		echo "Error updating record: " . mysqli_error($conn);
		echo $productName ."<br />";
		echo $productPrice ."<br />";
		echo $itemDescription ."<br />";
		echo $productSku ."<br />";
		echo $itemQuantity . "<br/>";
	}
}


mysqli_close($con);
?>
