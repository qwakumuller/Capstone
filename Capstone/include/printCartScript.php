<?
include 'DBConnection.php';

mysqli_select_db($con, "mydb");

//get userName from session
$userName = $_SESSION['userNameSessionCust'];

$sql    = "SELECT * FROM ShoppingCart WHERE username = '".$userName."'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<p> Your shopping cart is empty </p>";
}
if (mysqli_num_rows($result) > 0) {
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
<th></th>
</tr>";
    $subtotal = 0;
    // Loop for Table Data
    while ($row = mysqli_fetch_array($result)) {
        $itemSearch   = $row['itemID'];
        $searchSQL    = "Select * FROM Products WHERE ItemID = '".$itemSearch."'";
        $searchResult = mysqli_query($con, $searchSQL);
        $search       = mysqli_fetch_array($searchResult);
        
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $search['ItemName'] . "</td>";
        echo "<td>" . $search['Description'] . "</td>";
        echo "<td>" . $search['SKU'] . "</td>";
        echo "<td>" . $search['ProductPrice'] . "</td>";
        echo "<td>" . $row['Quantity'] . "</td>";
        //find item subtotal
        $price     = $search['ProductPrice'];
        $quantity  = $row['Quantity'];
        $itemTotal = $price * $quantity;
        
        $itemID = $row['itemID']; //get the itemID each iteration
        //add to page subtotal
        $subtotal += $itemTotal;
        echo "<td>" .$itemTotal. "</td>";
        
        //remove item button
        
        //Two post methods in one file needs to be called by the <input> tag name instead of just using post as it'll always call the first post if not specified
        //hidden variable to send itemID to removeFromCartScript.php in order to remove the desired item    
        echo "<td>  
        <form action='include/RemoveFromCartScript.php' method='post'> 
        <input type='hidden' id='itemid' name='itemid' value='".$itemID."'/> 
        <input type='submit' name='removeFromCart' value='RemoveItem'/>  
        </form></td>";
        
        echo "</tr>";
    }
    echo "</table>";
    
    //remove all button
    //Second post method called clearCart 
    
    echo "<form action='include/clearCart.php' method='post'>
    <input type='submit' name='clearCart' value='Remove all items'/>
    </form>";
    echo "<br><br><br>";
    //subtotal
    echo "Subtotal " . $subtotal . "$";

    echo "<br><br><br>";
    echo "<form action='include/checkout.php' method='post'>
    <input type='submit' name='checkout' value='checkout'/>
    </form>";
}
mysqli_close($con);
?>
