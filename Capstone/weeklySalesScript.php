<?php

include 'DBConnection.php';
mysqli_select_db($con,'$mydb');

//get userName from session
$userName = $_SESSION['userNameSessionEmp'];

$sql= "SELECT* FROM employees where username = '".$userName."'";
$results=mysqli_query($con, $sql);

echo "<table>
<tr>
<th>Username</th>
<th>Item</th>
<th>Description</th>
<th>SKU</th>
<th>Price per item</th>
<th>Quantity</th>
<th>Total Cost</th>
<th></th>
</tr>";
    $subtotal = 0;

?>