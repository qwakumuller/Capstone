<?php

include 'DBConnection.php';



mysqli_select_db($con,"mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$findSku = $_POST["findSku"];
$findName = $_POST["findName"];  
}

//send back if user has two search parameters
if((empty($findSku)) && (empty($findName))){
  header("Location: ../updateInventory.php?error=pickOne");
  exit();
}


$sqlSearch = "SELECT * FROM Products WHERE SKU = '".$findSku."' OR ItemName = '".$findName."'";
$result = mysqli_query($con,$sqlSearch);


if (mysqli_num_rows($result) != 0) {


    $rowSearch = mysqli_fetch_array($result);
    $itemIDSR =  $rowSearch['ItemID'];
    $itemNameSR = $rowSearch['ItemName'];
    $productPriceSR = $rowSearch['ProductPrice'];
    $descriptionSR = $rowSearch['Descript'];
    $skuSR = $rowSearch['SKU'];
    $quantitySR = $rowSearch['ItemQuantity'];

    
    header("Location: ../updateInventory.php?error=none&itemNameSR= ".$itemNameSR."&productPriceSR=".$productPriceSR."&descriptionSR=".$descriptionSR."&skuSR=".$skuSR."&quantitySR=".$quantitySR."&itemIDSR=".$itemIDSR."");
    exit();
    
   
  } else {
    header("Location: ../updateInventory.php?error=notFound");
    exit();

  }

  



  mysqli_close($con);

?>
