<!DOCTYPE html>
<html>
<h1>Add Inventory </h1>
<?php $page ='addInventory'; include 'include/menu.php'; ?>
	<head>
		
		 


<script>

<?php
//send back to employee.php if not logged in
if(!isset($_SESSION['userNameSessionEmp'])){
    header("Location: signInEmp.php?error=empNotLoggedIn");
    exit();
  }
?>
function SubmitFormData() {

    var productName = $("#productName").val();
    var productPrice = $("#productPrice").val();
    var itemDescription = $("#itemDescription").val();
    var productSku = $("#productSku").val();
    var itemQuantity = $("#itemQuantity").val();
    $.post("include/addProducts.php", { productName: productName, productPrice: productPrice, itemDescription: itemDescription, productSku: productSku, itemQuantity: itemQuantity },
    function(data) {
	 $('#results').html(data);
	 $('#addProductsForm')[0].reset();
    });
}
</script>

	</head>
<body>
	






<div id="addProduct">

	
	<form method="post" id="addProductsForm">
		<label for="name">Product Name:</label><br>
		<input type="text" id="productName" name="productName" required><br>
		<label for="price">Product Price:</label><br>
		<input type="text" id="productPrice" name="productPrice" required><br>
		<label for="description">Breif Description:</label><br>
		<input type="text" id="itemDescription" name="itemDescription" required><br>
		<label for="sku">Product SKU:</label><br>
		<input type="text" id="productSku" name="productSku" required><br>
		<label for="quantity">Item Quantity:</label></br>
		<input type="text" id="itemQuantity" name="itemQuantity" required></br>
		<br>
      		<input type="button" id="submitFormData" value="Submit" onclick="SubmitFormData()"/>
		
	</form>
</div>

<div id="results">

</div>






	
	
</body>
</html>
