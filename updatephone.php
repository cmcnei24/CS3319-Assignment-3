<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<?php
include'connecttodb.php';
$customerid = $_GET["customerid"];

$query2="SELECT phonenumber FROM customer WHERE customerid='".$customerid."'";
$result2=mysqli_query($connection,$query2);
if(!$result2){
     die("databases query failed.");
}
echo "Current Phone Number: ";
echo mysqli_fetch_assoc($result2)["phonenumber"];

if(isset($_GET["submitbutton"])){
     $newnumber = $_GET["inputtext"];
     $newnewnumber = substr($newnumber, 0, 3)."-".substr($newnumber, 3, 7);
     
     $query="UPDATE customer SET phonenumber='".$newnewnumber."' WHERE customerid='".$customerid."'";
     $result=mysqli_query($connection,$query);
     if(!$result){
          die("database query failed.");
     }
}
?>

<br>
<form name="newnumber" method="get" action="updatephone.php">
New Number (Format 0000000):
<input type="text" name="inputtext" required pattern = "[0-9]{7}">
<input type="submit" name="submitbutton">
<input type="hidden" name="customerid" value="<?php echo $customerid; ?>">
</form>
<?php
echo "Selected Customer ID: ".$customerid;
echo "<br>";
echo "New Updated Number: ".$newnumber;
?>

<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
