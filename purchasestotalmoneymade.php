<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include'connecttodb.php';
$productid = $_GET["productid"];

$query = "SELECT description, totalpurchased, totalpurchased*cost as totalcost FROM (SELECT product.productid, SUM(purchases.quantity) as totalpurchased FROM (product JOIN purchases on product.productid = purchases.productid) GROUP BY product.productid) as quantitytable JOIN product WHERE product.productid = quantitytable.productid AND product.productid = '".$productid."'";
$result= mysqli_query($connection,$query);

if(!$result){
     die("databases query failed.");
}
elseif(!mysqli_num_rows($result)){
     die("That Product Has Never Been Purchased.");
}

while($row = mysqli_fetch_assoc($result)){
     echo $row["description"]." Were Purchased ".$row[totalpurchased]." Times.<br>";
     echo "Totalling $".$row["totalcost"].".";
     echo "<br><br>";
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
