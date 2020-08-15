<?php
$user_id=$_GET['user_id'];
require_once('config.php');
$delete="DELETE FROM product where id=$user_id";
mysqli_query($conn,$delete);
// die
header('location:view_products.php?success_msg=6');

  ?>
