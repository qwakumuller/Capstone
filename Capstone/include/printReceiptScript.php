
<?php
include 'DBConnection.php';
mysqli_select_db($con, "mydb");

$userName = $_SESSION['userNameSessionCust'];


$pullReceipt = "SELECT * FROM Receipts WHERE userName ='".$userName."' ORDER BY receiptID DESC";


// message if no Receipts
$result = mysqli_query($con, $pullReceipt);
if (mysqli_num_rows($result) == 0){
    echo "No Receipts Found";
    
}
// fill table
if (mysqli_num_rows($result) > 0){
    //table headers
    echo "<table>
    <tr>
    <th>Receipt</th>
    <th>Time</th>
    <th>Items Purchaced</th>
    <th>Total Cost</th>
    <th></th>
    </tr>";
	while ($row = mysqli_fetch_array($result)){
		echo "<tr>";
        echo "<td>" . $row['receiptName'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['quantityTotal'] . "</td>";
        echo "<td>" . $row['priceTotal'] . "</td>";


        //view reciept button
        echo "<td>  
        <form action='include/viewReceiptScript.php' method='post'> 
        <input type='hidden' id='receiptName' name='receiptName' value='".$row['receiptName']."'/> 
        <input type='submit' name='ViewReceipt' value='View Receipt'/>  
        </form></td>";
        
        
        
        
        
        
		echo "</tr>";

	}

}
echo "</table>";




?>

