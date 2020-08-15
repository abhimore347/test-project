<?php 
require_once('config.php');
$category=$_POST['categ'];
$cat_id=$_POST['categ_id'];
echo $update="UPDATE category set Category='$category' where cat_id=$cat_id";
//die;
mysqli_query($conn, $update);

header("Location:view_categories.php");
 ?>