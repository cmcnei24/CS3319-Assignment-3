<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include'connecttodb.php';
$productprice = $_GET["productprice"];
$updown= $_GET["updown"];
$query = "SELECT description,cost FROM product ORDER BY ".$productprice." ".$updown."";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
if(!mysqli_num_rows($result)){
    echo "No Results";
}
while ($row = mysqli_fetch_assoc($result)) {
     echo $row["description"];
     echo " ";
     echo $row["cost"];
     echo "<br>";
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
