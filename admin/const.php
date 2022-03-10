<?php
session_start();

// define('siteurl',"http://localhost/foodorder/");
$servername='localhost';
$username='root';
$password='';
$dbname = "food_order";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>