<?php
include 'DBConnection.php';
mysqli_select_db($con, "mydb");
// login redirect
if(!isset($_SESSION['userNameSessionCust'])){
    header("Location: ../signInCust.php?error=custCartLogin");
    exit();
  }
//redirect if button not clicked
  if (isset($_POST['addToCart'])) {
//get username & product id & quantity
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$itemID = $_POST["itemID"];
	$quantity = $_POST["quantity"];
	$userName = $_SESSION['userNameSessionCust'];
  }
	  
//check if $quantity > $itemQuantity
$stockCheck = "SELECT * FROM Products WHERE ItemID = '" . $itemID . "'";
$stockCheckResult = mysqli_query($con, $stockCheck);
$row = mysqli_fetch_assoc($stockCheckResult);
$quantityInStock = $row["ItemQuantity"];
$item = $row['ItemName'];
if($quantity > $quantityInStock)
{
	header("Location: ../catlog.php?error=notenoughstock&stock=".$quantityInStock."&item=".$item."");
	exit();
}


//check if in cart
$cartCheck = "SELECT * FROM ShoppingCart WHERE username =? and itemID =? ";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $cartCheck))
{
header("Location: ../catlog.php?error=sqlerror");
exit();
}
else 
{
mysqli_stmt_bind_param($stmt,"ss",$userName, $itemID);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$resultCheck = mysqli_stmt_num_rows($stmt);
if ($resultCheck > 0)
{
	header("Location: ../catlog.php?error=inCart");
	exit();
}
else {
	//add to cart
	
	$sql = "INSERT INTO ShoppingCart (username, itemID, Quantity) VALUES (?,?,?)";
	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../catlog.php?error=sqlerror");
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt, "sss",$userName, $itemID, $quantity);
		mysqli_stmt_execute($stmt);
		header("Location: ../catlog.php?error=added");
		exit();
	}
	
		
                		}
            		}
        	
    	
mysqli_stmt_close($stmt);
mysqli_close($con);
				}
//redirect to index if button not pressed
else {
	header("Location: ../index.php?error=NiceTry");
	exit();	


}

?>
