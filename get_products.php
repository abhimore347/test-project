<?php 
require_once('config.php');
$id=$_GET['id'];
// $products=$_GET['Products'];
// $price=$_GET['Price'];
// $category=$_GET['Category'];
// $Description=$_GET['Description'];
// $image=$_GET['image'];

$select="SELECT * FROM product where id=$id";
$query=mysqli_query($conn, $select);
$res=mysqli_fetch_assoc($query);
echo json_encode($res);


 ?>