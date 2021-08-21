<?php


include 'DBConnection.php';

mysqli_select_db($con,"mydb");

$sql = "SELECT * FROM Products";
$result = mysqli_query($con,$sql);

//Table Headers
echo "<table>
<tr>
<th>ItemName</th>
<th>ProductPrice</th>
<th>Description</th>
<th style='column-width: 60;'>SKU</th>
<th style='column-width: 100px;'></th>
</tr>";

// Loop for Table Data
while($row = mysqli_fetch_array($result)) {
 
  echo "<tr>";
  echo "<td>" . $row['ItemName'] . "</td>";
  echo "<td>" . $row['ProductPrice'] . "</td>";
  echo "<td>" . $row['Descript'] . "</td>";
  echo "<td>" . $row['SKU'] . "</td>";

 //check if out of stock
 if($row['ItemQuantity'] < 1){
  echo "<td> -Out of Stock- </td>";
 }
 else {
  echo "<td>

  <form action='include/addCartScript.php' method='post'>
  <label for='itemID'></label>
  <input type='hidden' id ='itemID' name='itemID' value=".$row['ItemID'].">

  <label for='quantity'>Quantity</label>
  <select id='quantityForm' name='quantity'>
    <option value= '1' >1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
    <option value='6'>6</option>
    <option value='7'>7</option>
    <option value='8'>8</option>
    <option value='9'>9</option>
  </select>
  <input type='submit' value='Add to cart' name='addToCart'>
</form> 
</td>
";
 }

echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
