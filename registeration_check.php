<?php
require_once('config.php');
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$select="SELECT * FROM c_pro_reg where email='$email' ";
$insert="INSERT INTO c_pro_reg(firstname,lastname,email,password,confirm_password) value('$firstname','$lastname','$email','$password','$confirm_password')";
$query=mysqli_query($conn, $select);
$res=mysqli_fetch_assoc($query);
if(mysqli_num_rows($query)>0){
	// session_start();
	// $_SESSION['user_id']=$res['id'];
	// $_SESSION['user_name']=$res['name'];
	// print_r($_SESSION);
	// echo "email is already used";
	header('location:register.php?registration_error=1');
}else{
mysqli_query($conn,$insert);
header('location:login.php?success_msg=2');
	
}



  ?>