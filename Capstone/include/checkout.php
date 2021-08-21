<?
include 'DBConnection.php';

mysqli_select_db($con, "mydb");

//get userName from session
$userName = $_SESSION['userNameSessionCust'];

//check if $quantity > $itemQuantity
$stockCheck = "SELECT * FROM Products WHERE ItemID = '" . $itemID . "'";
$stockCheckResult = mysqli_query($con, $stockCheck);
$row = mysqli_fetch_assoc($stockCheckResult);
$quantityInStock = $row["ItemQuantity"];
$item = $row['ItemName'];
if($quantity > $quantityInStock)
{
	header("Location: ../cart.php?error=notenoughstock&stock=".$quantityInStock."&item=".$item."");
	exit();
}



// Gets date and time for receipt
date_default_timezone_set("America/New_York");
$time = date("h:i:sa");
$date = date("m:d:Y");

//inserts time info and username into receipts
$sql = "INSERT INTO Receipts (userName,time, date) VALUES ('".$userName."','".$time."', '".$date."')";
mysqli_query($con, $sql);

//gets receipt ID
$sql = "SELECT * FROM Receipts WHERE (time ='".$time."' AND date = '".$date."')";
$itemIDResults = mysqli_query($con,$sql);
$itemIDArray = mysqli_fetch_array($itemIDResults);
$receiptID = $itemIDArray['receiptID'];

//generates file name and puts it into DB
$receiptName = $receiptID.'-'.$date;
$sql = "UPDATE Receipts SET receiptName='".$receiptName."' WHERE receiptID='".$receiptID."'";
mysqli_query($con, $sql);

//create file based on name
$fileName = "/var/www/receipt/".$receiptName.".txt";
$newFile = fopen($fileName, "w") or die ("Unable to open file");
$txt = "Receipt # ".$receiptName."\n";
fwrite($newFile,$txt);
$txt = "Time purchased ".$time."\n\n\n";
fwrite($newFile,$txt);
$txt = "Quantity  Item Name   Product Price    Item Total \n";
fwrite($newFile,$txt);






//sql to get info from shopping cart
$sql    = "SELECT * FROM ShoppingCart WHERE username = '".$userName."'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $subtotal = 0;
    $quantityTotal = 0;
    // Loop for Table Data
    while ($row = mysqli_fetch_array($result)) {
        $itemSearch   = $row['itemID'];
        $searchSQL    = "Select * FROM Products WHERE ItemID = '".$itemSearch."'";
        $searchResult = mysqli_query($con, $searchSQL);
        $search       = mysqli_fetch_array($searchResult);
        
        
        $row['username'];
        $search['ItemName'];
        $search['Description'];
        $search['SKU'];
        $search['ProductPrice'];
        $row['Quantity'];
        
        //find item subtotal
        $price     = $search['ProductPrice'];
        $quantity  = $row['Quantity'];  //cart quantity
        $itemTotal = $price * $quantity;
        
        $itemID = $row['itemID']; //get the itemID each iteration
        //add to page subtotal
        $subtotal += $itemTotal;

        //find total quantity
        $quantityTotal += $quantity;

        //write to reciept stuff
        $txt = $row['Quantity']."   ".$search['ItemName']."   (". $search['ProductPrice'].")   ".$itemTotal."$\n";
        fwrite($newFile,$txt);

        //reduce inventory
        $inventory = $search['ItemQuantity'];
        $newInventory = $inventory - $quantity;
        $updateInventory = "UPDATE Products SET ItemQuantity ='".$newInventory."' WHERE ItemID = '".$row['itemID']."'";
        mysqli_query($con,$updateInventory);


       

        
    }


//insert subtotal and quantity into receipts table
$sql = "UPDATE Receipts SET quantityTotal='".$quantityTotal."', priceTotal = '".$subtotal."' WHERE receiptID='".$receiptID."'";
mysqli_query($con, $sql);



//Totals
$txt = "\n\n Items purchaced ".$quantityTotal." \n";
fwrite($newFile, $txt);
$txt = "Total ".$subtotal." \n";
fwrite($newFile, $txt);
fclose($newFile);




//Delete from shopping cart
$stmt     = mysqli_stmt_init($con);
    $sql = "DELETE FROM ShoppingCart WHERE username = ?";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../receipt.php");
        exit();
    }
    else {
        //Do not think you need anything else to be sent because the entire table will be deleted and no new information is added so do not bind params (table still exists)
        mysqli_stmt_bind_param($stmt,"s",$userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }



//redirect to checkoutReceipt with a session var
$_SESSION['receiptName'] = $receiptName;
header("Location: ../checkoutReceipt.php");
exit();



}




    
   
     
    



 
mysqli_close($con);

?>
