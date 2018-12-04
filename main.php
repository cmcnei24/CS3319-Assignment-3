<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>
Assignment 3
</title>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>
CS3319A Assignment 3
</h1>
<h3>
Customers Information by Last Name
</h3>
<?php
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
if (!$result){
        die("databases query failed.");
}
echo "<table><tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>City</th><th>Agent ID</th>";
while ($row = mysqli_fetch_assoc($result)){
	echo "<tr>";
        echo "<td>".$row["customerid"]."</td>";
	echo "<td>".$row["firstname"]."</td>";
	echo "<td>".$row["lastname"]."</td>";
	echo "<td>".$row["phonenumber"]."</td>";
	echo "<td>".$row["city"]."</td>";
	echo "<td>".$row["agentid"]."</td>";
	echo "</tr>";
}
echo "</table>";
?>
<br>
<form name="customersearch" action="customerbylastname.php" method="get">
Customer ID:
<?php
$query = "SELECT DISTINCT customerid FROM customer";
$result = mysqli_query($connection,$query);
if (!$result){
die("databases query failed.");
}
echo "<select name='customerid'><option selected disabled>Select</option>";
while ($row = mysqli_fetch_assoc($result)){
        echo "<option value='".$row["customerid"]."'>".$row["customerid"]."</option>";
}
echo "</select><br>";
?>
<input type="submit" value="List Purchased Products">
</form>
<br>
<h3>
List All Products in Alphabetical Order
</h3>
<form method="get">
<select name='updown'>
<option value="asc">Ascending</option>
<option value="desc">Descending</option>
</select>
<input type="submit" value="description" name="productsalphabetical" formaction="productsalphabetical.php">
<input type="submit" value="cost" name="productprice" formaction="productsprice.php">
</form>
<br>
<h3>
Insert Purchase
</h3>
<form action="insertpurchase.php" method="get">
<?php
echo "Customer ID:";
$query = "SELECT DISTINCT customerid FROM customer";
$result = mysqli_query($connection,$query);
if (!$result){
	die("databases query failed.");
}
echo "<select name='customerid' required><option selected disabled>Select</option>";
while ($row = mysqli_fetch_assoc($result)){
	echo "<option value='".$row["customerid"]."'>".$row["customerid"]."</option>";
}
echo "</select><br>";
echo "Product ID:";
$query = "SELECT DISTINCT productid FROM product";
$result = mysqli_query($connection,$query);
if (!$result){
        die("databases query failed.");
}
echo "<select name='productid'><option selected disabled>Select</option>";
while ($row = mysqli_fetch_assoc($result)){ 
        echo "<option value='".$row["productid"]."'>".$row["productid"]."</option>";
}
echo "</select><br>";
?>
Quantity:
<input type="number" name="quantity" min="1" required><br>
<input type="submit" value="Add Purchase">
</form>
<br>
<h3>
Insert New Customer
</h3>
<form action="insertcustomer.php" method="get">
Customer ID:
<input type="number" name="insertcustomerid" min="0" max="99" required>
<br>
Customer First Name:
<input type="text" name="insertcustomerfirstname" required>
<br>
Customer Last Name:
<input type="text" name="insertcustomerlastname" required>
<br>
Customer City:
<input type="text" name="insertcustomercity" required>
<br>
Customer Phone Number (Format 0000000):
<input type="text" name="insertcustomerphone" required pattern = "[0-9]{7}">
<br>
Customer Last Agent ID:
<input type="text" name="insertcustomeragentid" required>
<br>
<input type="submit" value="Insert">
</form>
<br>
<h3>
Update Customer's Phone Number
</h3>
<form action="updatephone.php" method="get">
<?php
echo "Customer ID:";
$query = "SELECT DISTINCT customerid FROM customer";
$result = mysqli_query($connection,$query);
if (!$result){
die("databases query failed.");
}
echo "<select name='customerid'><option selected disabled>Select</option>";
while ($row = mysqli_fetch_assoc($result)){
        echo "<option value='".$row["customerid"]."'>".$row["customerid"]."</option>";
}
echo "</select><br>";
?>
<input type="submit" value="Update">
</form>
<br>
<h3>
Delete Customer
</h3>
<form action="deletecustomer.php" method="get">
<?php
echo "Customer ID:";
$query = "SELECT DISTINCT customerid FROM customer";
$result = mysqli_query($connection,$query);
if (!$result){
die("databases query failed.");
}
echo "<select name='customerid'><option selected disabled>Select</option>";
while ($row = mysqli_fetch_assoc($result)){
        echo "<option value='".$row["customerid"]."'>".$row["customerid"]."</option>";
}
echo "</select><br>";
?>
<input type="submit" value="Delete">
</form>
<br>
<h3>
List All Customers Who Bought More Than ___ Products
</h3>
<form action="customermorethan.php" method="get">
<input type="number" name="amount" min="0">
<input type="submit" value="List">
</form>
<br>
<h3>
List The Description of Any Product Never Purchased
</h3>
<form action="descriptionneverpurchased.php">
<input type="submit" value="List">
</form>
<br>
<h3>
List Total Number of Purchases of Product and Money Made:
</h3>
<form action="purchasestotalmoneymade.php" method="get">
Product ID:
<?php
$query = "SELECT DISTINCT productid FROM product";
$result = mysqli_query($connection,$query);
if (!$result){
die("databases query failed.");
}
echo "<select name='productid'><option selected disabled>Select</option>";
while ($row = mysqli_fetch_assoc($result)){
        echo "<option value='".$row["productid"]."'>".$row["productid"]."</option>";
}
echo "</select><br>";
?>
<input type="submit" value="List">
</form>
<br>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c05e8632510fef3"></script>
</body>
</html>
