<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include 'connecttodb.php';

$query = "SELECT description FROM product WHERE product.productid NOT IN (SELECT productid FROM purchases)";
$result = mysqli_query($connection,$query);

if(!$result){
     die("databases query failed.");
}

while($row = mysqli_fetch_assoc($result)){
     echo $row["description"];
     echo "<br>";
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
