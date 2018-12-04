<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "cs3319";
$dbname = "cmcnei24assign2db";
$err_level = error_reporting(0);
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
error_reporting($err_level);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>
