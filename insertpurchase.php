<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include'connecttodb.php';
$customerid = $_GET["customerid"];
$productid = $_GET["productid"];
$quantity = $_GET["quantity"];

$query = "SELECT customerid,productid FROM purchases WHERE customerid='".$customerid."' AND productid='".$productid."'";

$result = mysqli_query($connection,$query);

if (!$result) {
     echo "databases query 1 failed.";
}
elseif (!mysqli_num_rows($result)){
     $query2 = "INSERT INTO purchases values('".$customerid."','".$productid."','".$quantity."')";
     $result2 =mysqli_query($connection,$query2);
     if(!$result2){
          echo "databases query 2 failed.";
     }
     echo "Success: Inserted New Purchase.";
}
else{
     $query3 = "SELECT quantity FROM purchases WHERE customerid='".$customerid."' AND productid='".$productid."'";
     $result3 = mysqli_query($connection,$query3);
     if(!$result3){
          echo "databases query 3 failed.";
     }
     
     $newquantity = mysqli_fetch_assoc($result3)["quantity"]+$quantity;
     
     $query4 = "UPDATE purchases SET quantity='".$newquantity."' WHERE customerid='".$customerid."' AND productid='".$productid."'";
     $result4 =mysqli_query($connection,$query4);
     if(!$result4){
          echo "databases query 4 failed.";
     }
     echo "Success: Updated Previous Purchase.";
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>

</html>
