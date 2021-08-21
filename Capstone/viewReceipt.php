<!DOCTYPE html>
<html>
<head>
	 <title> View Reciept </title>
 </head>
 
 
<body>

<header>

<h1> View Reciept </h1>
</header>

<?php $page ='viewReciept'; include 'include/menu.php'; 

//This page is only shown after the user views his receipt
//No menu link should be created.

?>
	
	
	
	

<div>
<br>
<form action="orderHistory.php">
    <input type="submit" value="Back to Order History" 
         name="Submit" id="backToHistory" />
</form>




<br><br>
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


/*
//Post value Print Receipt (triggered on view receipt)
if(isset($_POST['ViewReceipt'])){

    $receiptName = $_POST['receiptName'];
    $filePath = "/var/www/receipt/".$receiptName.".txt";
    $filePointer = fopen($filePath, "r");
    while(!feof($filePointer)) {
      echo fgets($filePointer) . "<br>";
    }
    fclose($filePointer);
    
    }
    */




?>
</div>
		
</body>
</html>