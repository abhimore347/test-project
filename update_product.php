<?php 
require_once('config.php');
$Products=$_POST['Products'];
$Price=$_POST['Price'];
$Category=$_POST['Category'];
$Description=$_POST['Description'];
$id=$_POST['prod_id'];
$file_name=$_FILES['image']['name'];
// if ($file_name=" ") {
	
// }
if ($file_name!=="") {
	$f_name=date('Ymdhis');
$file_array=explode('.',$file_name);
// print_r($file_name);
$ext=$file_array[count($file_array)-1];
$new_file_name=$f_name.".".$ext;
// print_r($new_file_name);
$destination="productimg/".$new_file_name;
$source=$_FILES['image']['tmp_name'];
// print_r($source);
// print_r($destination);
move_uploaded_file($source, $destination);}
else{
	$new_file_name=$_POST['oldimg'];
}
 $update="UPDATE product set Products='$Products', Price='$Price', Category='$Category', Description='$Description',image='$new_file_name' where id=$id";

// die;
 mysqli_query($conn, $update);
header("location:view_products.php?success_msg=3");

 ?>