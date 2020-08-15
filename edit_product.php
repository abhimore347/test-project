<?php
require_once('common_header.php');
require_once('config.php');
$user_id=$_GET['user_id'];
$select= "SELECT * from product where id=$user_id";
$select1="SELECT * FROM category";
$query = mysqli_query($conn, $select);
$query1=mysqli_query($conn,$select1);
$result=mysqli_fetch_object($query);
// $option="";
//  while($row2 =mysqli_fetch_array($query1 )){
//  	$option=$option."<option>$row2[1]</option>";
//  }
// print_r($result);
?>


<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products / Edit Products</h1>
 </div>

<div class="category row">
	<div class="col-lg-12">
	<form action="update_product.php" method="post" enctype="multipart/form-data">
	Products Name-<input type="text" class="col-lg-5 m-3 p-2" name="Products" placeholder="Products Name"  value="<?php echo $result->Products; ?>">
	Price-<input type="text" class="col-lg-3 m-3 p-2" name="Price" placeholder="Price"  value="<?php echo $result->Price; ?>">
	<br>
	<br>
	Select Category-<select name="Category" class="col-lg-5 m-3 p-2">
		<!-- <option value="select">Select</option> -->
		<?php 
		while($res=mysqli_fetch_assoc($query1)){
			echo"<option selected value".$res['id'].">".$res['Category']."</option>";
		} ?>
	</select>
	<button type="button" class="btn"><a href="add_categories.php">Add New Category</a></button>
	<br><br>
	<p>Description-</p><textarea type="text" name="Description" rows="5" placeholder="write a description of your products" class="col-lg-10 m-3 p-2" value="<?php echo $result->Description; ?>"></textarea>
	<br><br>
	<p> Upload Image-</p><input type="file" name="image"value="<?php echo $result->image; ?>" >

	</div>
	<div class="col-lg-12">
	<button type="submit" value="submit" class="btn btn-primary m-3 col-lg-2">Add</button>
	<button type="button" class="btn btn-danger m-3 col-lg-2"><a class="text-white" href="add_products.php"> Clear</a></button>
	</div>
	</form>
</div>
</div>


 <?php
require_once('common_footer.php')
  ?>