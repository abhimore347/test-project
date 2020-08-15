<?php 
// print_r($_POST);	
require_once('config.php');
$Products=$_POST['Products'];
$Price=$_POST['Price'];
$Category=$_POST['Category'];
$Description=$_POST['Description'];
 
$file_name=$_FILES['image']['name'];



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
move_uploaded_file($source, $destination);
$insert="INSERT INTO product(Products,Price,Category,Description,image) value('$Products','$Price','$Category','$Description','$new_file_name')";
// die;
// // echo $insert1="INSERT INTO product(image) value($new_file_name')";
// die;
// exit;
mysqli_query($conn,$insert);
// mysqli_query($conn,$insert1);
header('location:view_products.php?success_msg=2');

	
}
elseif ($file_name=="") {
	$default='default-image.jpg';
	$insert="INSERT INTO product(Products,Price,Category,Description,image) value('$Products','$Price','$Category','$Description','$default')";

	

}

 




// $file_name=$_FILES['image']['name'];
// $f_name=date('Ymdhis');
// $file_array=explode('.',$file_name);
// // print_r($file_name);
// $ext=$file_array[count($file_array)-1];
// $new_file_name=$f_name.".".$ext;
// $destination="productimg/".$new_file_name;
// $source=$_FILES['image']['tmp_name'];
// move_uploaded_file($source, $destination);






 ?>