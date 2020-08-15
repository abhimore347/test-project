<?php 
// print_r($_POST);	
require_once('config.php');
$Category=$_POST['Category'];

$insert="INSERT INTO category(Category) value('$Category')";
// die;
// exit;
mysqli_query($conn,$insert);
header('location:view_categories.php?success_msg=5');



 ?>