<!DOCTYPE html>
<html>
<head>
	 <title> checkoutReceipt </title>
 </head>
 
 
<body>

<header>

<h1> Checkout Receipt </h1>
</header>

<?php $page ='checkoutReceipt'; include 'include/menu.php'; 

//This page is only shown after the user hits checkout.
//No menu link should be created.

?>
	
	
	
	

<div>
<br>
<form action="orderHistory.php">
    <input type="submit" value="View All Orders" 
         name="Submit" id="backToHistory" />
</form><br><br>
<?php



//Session Value Print Receipt (triggered after checkout)
if(isset($_SESSION['receiptName'])){

    $receiptName = $_SESSION['receiptName'];
    $filePath = "/var/www/receipt/".$receiptName.".txt";
    $filePointer = fopen($filePath, "r");
    while(!feof($filePointer)) {
      echo fgets($filePointer) . "<br>";
    }
    fclose($filePointer);
    //unset($_SESSION['receiptName']);
    
    }





?>
</div>
		
</body>
</html>
