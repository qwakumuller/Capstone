<?php

include 'DBConnection.php';




//get var from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productNameUI = $_POST["productName"];
  $productPriceUI = $_POST["productPrice"];
  $itemDescriptionUI = $_POST["itemDescription"]; 
  $productSkuUI = $_POST["productSku"]; 
  $itemQuantityUI = $_POST["itemQuantity"];
  $itemID = $_POST["itemID"]; 
  
}




//send back if empty fields
if(empty($productNameUI) || empty($productPriceUI) || empty($itemDescriptionUI) || empty($productSkuUI) || empty($itemQuantityUI) || empty($itemQuantityUI)) 
{
    header("Location: ../updateInventory.php?error=emptyFields&itemNameSR= ".$productNameUI."&productPriceSR=".$productPriceUI."&descriptionSR=".$itemDescriptionUI."&skuSR=".$productSkuUI."&quantitySR=".$itemQuantityUI."&itemIDSR=".$itemID."");
    exit();
}

mysqli_select_db($con,"mydb");

//begin check for sql update statement making non-unique products
mysqli_begin_transaction($con);

//check if sql statement is valid
$sql = "UPDATE Products SET ItemName=?, ProductPrice=?, Descript=?, SKU=?, ItemQuantity=? WHERE ItemID=?";
$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) 
{
    header("Location: ../updateInventory.php?error=sqlErrorUP");
    exit();
}
//if sql statment is valid, run statement
else 
{
    mysqli_stmt_bind_param($stmt, "ssssii",$productNameUI,$productPriceUI,$itemDescriptionUI,$productSkuUI,$itemQuantityUI,$itemID);
    mysqli_stmt_execute($stmt);
	
	  //check if sql statement made non-unique item name/sku
	  $sql = "SELECT * FROM Products WHERE ItemName = '" . $productNameUI . "'";
	  $result = mysqli_query($con, $sql);
	  $nameCheck = mysqli_num_rows($result);
	  $sql = "SELECT * FROM Products WHERE SKU = '" . $productSkuUI . "'";
	  $result = mysqli_query($con, $sql);
	  $skuCheck = mysqli_num_rows($result);
	  //if name not unique, undo sql statement and return error
	  if($nameCheck != "1")
	  {
	  	  mysqli_rollback($con);
	  	  header("Location: ../updateInventory.php?error=nameTaken");
	  	  exit();
	  }
	  //if sku not unique, undo sql statement and return error
	  elseif($skuCheck != "1")
	  {
	  	  mysqli_rollback($con);
  		  header("Location: ../updateInventory.php?error=skuTaken");
  		  exit();
	  }
	  //if name/sku unique, finalize change to DB table
	  else
	  {
	  	  mysqli_commit($con);
	  	  header("Location: ../updateInventory.php?error=updated&itemNameSR= ".$productNameUI."&productPriceSR=".$productPriceUI."&descriptionSR=".$itemDescriptionUI."&skuSR=".$productSkuUI."&quantitySR=".$itemQuantityUI."");
	  	  exit();
	  }
}





mysqli_close($con);


?>
