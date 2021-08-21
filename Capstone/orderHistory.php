<!DOCTYPE html>
<html>
<head>
	 <title> Order History</title>
	
	

 </head>
 
 


<header>

<h1> Order History</h1>
</header>

<?php $page ='orderHistory'; include 'include/menu.php';

//test
//login reidrect
if(!isset($_SESSION['userNameSessionCust'])){
    header("Location: signInCust.php?error=custNotLoggedIn");
    exit();
  }

  
  
?>
</div>

<body>
<div>
<br><br><br>

<?php


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




include 'include/printReceiptScript.php';


?>
</div>


		
</body>
</html>
