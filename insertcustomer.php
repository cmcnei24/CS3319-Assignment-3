<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include'connecttodb.php';
$insertcustomerid = $_GET["insertcustomerid"];
$insertcustomerfirstname = $_GET["insertcustomerfirstname"];
$insertcustomerlastname = $_GET["insertcustomerlastname"];
$insertcustomercity = $_GET["insertcustomercity"];
$insertcustomerphone = $_GET["insertcustomerphone"];
$insertcustomeragentid = $_GET["insertcustomeragentid"];
$newnewnumber = substr($insertcustomerphone, 0, 3)."-".substr($insertcustomerphone, 3, 7);

$query = "SELECT customerid FROM customer";

$result = mysqli_query($connection,$query);

if (!$result) {
     die("databases query 1 failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
     if ($row["customerid"]==$insertcustomerid){
	exit("Customer already in database.");
     }
}

$query2 = "INSERT INTO customer values('".$insertcustomerid."','".$insertcustomerfirstname."','".$insertcustomerlastname."','".$insertcustomercity."','".$newnewnumber."','".$insertcustomeragentid."')";
$result2 = mysqli_query($connection,$query2);

if (!$result2) {
    die("Insert Error: Customer Not Added");
}
else {
    die("Success: Customer Added.");
}
?>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
