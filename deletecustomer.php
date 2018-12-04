<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include'connecttodb.php';
$customerid = $_GET["customerid"];

$query = "DELETE FROM customer WHERE customerid='".$customerid."'";
$result = mysqli_query($connection,$query);
if(!$result){
     echo "Unsuccessfull Operation: Customer Not Deleted";
}
else{
     echo "Success: Customer Deleted";
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
