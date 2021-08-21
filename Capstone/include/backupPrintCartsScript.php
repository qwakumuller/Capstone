/*<?php


include 'DBConnection.php';

mysqli_select_db($con,"mydb");

//get userName from session
$userName = $_SESSION['userNameSessionCust'];



$sql = "SELECT * FROM ShoppingCart WHERE username = '".$userName."'";
$result = mysqli_query($con,$sql);
/*
if(mysqli_num_rows($result) = 0)
{
echo "<p> Your shopping cart is empty </p>";
}
*/

// Shopping Cart Table Headers
echo "<table>
<tr>

<th>Username</th>
<th>Item</th>
<th>Description</th>
<th>SKU</th>
<th>Price per item</th>
<th>Quantity</th>
<th>Total Cost</th>

</tr>";

// Loop for Table Data
while($row = mysqli_fetch_array($result)) {
  $itemSearch = $row['itemID'];
  $searchSQL = "Select * FROM Products WHERE ItemID = '".$itemSearch."'";
  $searchResult = mysqli_query($con, $searchSQL);
  $search = mysqli_fetch_array($searchResult);
  
  echo "<tr>";

  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $search['ItemName'] . "</td>";
  echo "<td>" . $search['Description'] . "</td>";
  echo "<td>" . $search['SKU'] . "</td>";
  echo "<td>" . $search['ProductPrice'] . "</td>";
  echo "<td>" . $row['Quantity'] . "</td>";

  $price = $search['ProductPrice'];
  $quantity = $row['Quantity'];
  $itemTotal = $price * $quantity;


  echo "<td>". $itemTotal.  "</td>";
  
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);


?>
*/
