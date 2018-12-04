<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include 'connecttodb.php';
$amount = $_GET["amount"];

$query="SELECT customer.customerid, customer.firstname, customer.lastname, product.description, purchases.quantity FROM customer JOIN purchases ON customer.customerid = purchases.customerid JOIN product ON purchases.productid = product.productid WHERE purchases.quantity > ".$amount." ORDER BY customerid";
$result=mysqli_query($connection,$query);
if(!$result){
     die("databases query failed.");
}
     while($row = mysqli_fetch_assoc($result)){
          echo $row["customerid"];
          echo " - ";
          echo $row["firstname"];
          echo " ";
          echo $row["lastname"];
          echo "<br>";
          echo $row["description"];
          echo " ";
          echo $row["quantity"];
          echo "<br><br>";
     }
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
