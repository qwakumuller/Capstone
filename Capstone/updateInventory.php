<!DOCTYPE html>
<html>
	<title> UPDATE INVENTORY </title>
	<h1>Update Inventory</h1>
	<?php $page ='updateInventory'; include 'include/menu.php'; ?></br>
	<head>
	
	
<?php
//send back to employee.php if not logged in
if(!isset($_SESSION['userNameSessionEmp'])){
    header("Location: signInEmp.php?error=empNotLoggedIn");
    exit();
  }
?>

</head>
<body>
	
<header>

</header>
	


	
	<div id="searchProducts">
	<br>
	<!-- value=<?php echo $_GET['fName'];?> -->

	<b>Search for Item</b><br>
<?php
//error messages for search products
	if(isset($_GET['error'])) {
		if ($_GET['error'] == "notFound") {
			echo '<p class="signuperror"><b>Item Not Found</b></p>';
		}
		else if ($_GET['error'] == "sqlErrorUP"){
			echo '<p class="signuperror"><b>SQL Error</b></p>';
		}

		else if ($_GET['error'] == "pickOne"){
			echo '<p class="signuperror"><b>Use SKU or Name</b></p>';
		}

		else if ($_GET['error'] == "empty"){
			echo '<p class="signuperror"><b>Please fill in one field</b></p>';
		}
		elseif($_GET['error'] == 'nameTaken'){
			echo '<p class="signuperror"><b>Product with that name already exists in database.</b></p>';
		}
		elseif($_GET['error'] == 'skuTaken'){
			echo '<p class="signuperror"><b>Product with that SKU already exists in database.</b></p>';
		}

	}

	?>

	<form method="post" id="searchProductsForm" action="include/searchInventory.php">
		<label for="findSku">SKU:</label><br>
		<input type="text" id="findSku" name="findSku" ><br>
		<label for="findName">Product Name:</label><br>
		<input type="text" id="findName" name="findName"><br>
		<button type="submit" name="searchProductsButton">search</button>
	</form>
</div>

<div id="searchResults">

<br>
</div>


<?php
//error messages for update inventory
	if(isset($_GET['error'])) {
		if ($_GET['error'] == "emptyFields") {
			echo '<p class=signuperror"><b>All Fields Must be filled in</b></p>';
		}
		else if ($_GET['error'] == "updated") {
			echo '<p class=signuperror"><b>Product has been updated</b></p>';
			echo "Updated Product Information: <br>";
			echo "Product Name: ".$_GET['itemNameSR']."<br>";
			echo "Product Price: ".$_GET['productPriceSR']."<br>";
			echo "Description: ".$_GET['descriptionSR']."<br>";
			echo "SKU: ".$_GET['skuSR']."<br>";
			echo "Quantity: ".$_GET['quantitySR']."<br>";

		}
		

	}

	?>


<p id="changeMe"></p>

<?php
if (!empty($_GET['itemIDSR'])) {

	echo '
<div id="updateProducts">

<b>Update Fields</b><br>

<form method="post" id="updateProductsForm" action="include/updateInventoryScript.php">
		<label for="productName">Name:</label><br>
		<input type="text" id="productName" name="productName" value='.$_GET["itemNameSR"].' ><br>
		<label for="productPrice">Product Price:</label><br>
		<input type="text" id="productPrice" name="productPrice" value='.$_GET["productPriceSR"].'><br>
		<label for="itemDescription">Description</label><br>
		<input type="text" id="itemDescription" name="itemDescription" value='.$_GET["descriptionSR"].'><br>
		<label for="productSku">SKU:</label><br>
		<input type="text" id="productSku" name="productSku" value='.$_GET["skuSR"].'><br>
		<label for="itemQuantity"> Quantity: </label><br>
		<input type="text" id="itemQuantity"  name="itemQuantity" value='.$_GET["quantitySR"].'><br>
		<label for="itemIDSR"></label>
		<input type="hidden" id="itemIDSR" name="itemID" value='.$_GET["itemIDSR"].'><br>
		

		<button type="submit" name="updateProductsButton">Update Products</button>
	</form>


</div>
';
}
?>

<div id="updateProductsResults">

</div>




</body>
</html>
