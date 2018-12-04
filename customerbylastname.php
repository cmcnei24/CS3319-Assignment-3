<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include 'connecttodb.php';
$customerid = $_GET["customerid"];
$query = "SELECT product.description FROM purchases JOIN customer ON customer.customerid = purchases.customerid JOIN product ON product.productid = purchases.productid WHERE customer.customerid ='".$customerid."'";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
if(!mysqli_num_rows($result)){
    echo "No Results";
}
while ($row = mysqli_fetch_assoc($result)) {
     echo $row["description"];
echo "<br>";
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
