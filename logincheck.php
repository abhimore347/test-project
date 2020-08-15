<?php
require_once('config.php');
$email=$_POST['email'];
$password=$_POST['password'];
$select="SELECT * FROM c_pro_reg where email='$email' AND password='$password'";
$query=mysqli_query($conn, $select);
$res=mysqli_fetch_assoc($query);
print_r($res);
if(mysqli_num_rows($query)>0){
	session_start();
	$_SESSION['user_id']=$res['id'];
	$_SESSION['user_name']=$res['firstname'];
	// print_r($_SESSION);
	// die;
	header('location:dashboard.php?success_msg=3');
}else{
	header('location:login.php?login_error=1');
}



  ?>