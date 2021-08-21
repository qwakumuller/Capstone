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
<th>Quantity</th>
<th>SKU</th>
</tr>";

// Loop for Table Data
while($row = mysqli_fetch_array($result)) {
  //$formatted_number = number_format(ProductPrice,2);
  echo "<tr>";
  echo "<td>" . $row['ItemName'] . "</td>";
  echo "<td>" . $row['ProductPrice'] . "</td>";
  //echo "<td>" . $row[$formatted_number] . "</td>"; Its not doing what I want it to
  echo "<td>" . $row['Descript'] . "</td>";
  echo "<td>" . $row['ItemQuantity'] . "</td>";
  echo "<td>" . $row['SKU'] . "</td>";
  
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
