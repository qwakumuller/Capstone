<?php
include 'DBConnection.php';
mysqli_select_db($con, "mydb");




 //table Headers
 echo "<table>
 <tr>
 <th>Product Name</th>
 <th colspan='2'>Monday</th>
 <th colspan='2'>Tuesday</th>
 <th colspan='2'>Wednesday</th>
 <th colspan='2'>Thursday</th>
 <th colspan='2'>Friday</th>
 <th colspan='2'>Saturday</th>
 <th colspan='2'>Sunday</th>
 <th></th>
 </tr>";

 

//sql to get info from weekly sales DB
$pullTableSQL = "SELECT * FROM weeklySales";

$result = mysqli_query($con, $pullTableSQL);
while ($row = mysqli_fetch_array($result)){
     
    //finds name by Item ID
     $productID = $row['productID'];
     $nLookupSQL  = "SELECT * FROM Products WHERE ItemID = '".$productID."'";
     $nLookupR = mysqli_query($con, $nLookupSQL);
     $nLookupA = mysqli_fetch_array($nLookupR);
     
    
    
    //Table Rows
    echo "<tr>";
    

   
    
    echo "<td>" . $nLookupA['ItemName'] . "</td>";
    echo "<td>" . $row['monSales'] . "</td>";
    echo "<td>" . $row['monSold'] . "</td>";
    echo "<td>" . $row['tueSales'] . "</td>";
    echo "<td>" . $row['tueSold'] . "</td>";
    echo "<td>" . $row['wedSales'] . "</td>";
    echo "<td>" . $row['wedSold'] . "</td>";
    echo "<td>" . $row['thuSales'] . "</td>";
    echo "<td>" . $row['thuSold'] . "</td>";
    echo "<td>" . $row['friSales'] . "</td>";
    echo "<td>" . $row['friSold'] . "</td>";
    echo "<td>" . $row['satSales'] . "</td>";
    echo "<td>" . $row['satSold'] . "</td>";
    echo "<td>" . $row['sunSales'] . "</td>";
    echo "<td>" . $row['sunSold'] . "</td>";
    echo "</tr>";
    }
            
            

        
echo "</table>";





?>