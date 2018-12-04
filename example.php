<?php
$query = "SELECT * FROM product";
$result = mysqli_query($connection,$query);
if(!$result){
die("databses query failed.");
}
while ($row = mysqli_fetch_assoc($result)){
echo "<li>";
echo $row["description"],$row["productid"]."</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>
