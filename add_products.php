<?php 
require_once('common_header.php');
require_once('config.php');
$select="SELECT * FROM category";
$query = mysqli_query($conn, $select);
// $option="";
//  while($row2 =mysqli_fetch_array($query)){
//  	$option=$option."<option>$row2[0]</option>";
//  }
 // echo $row2 =mysqli_fetch_array($query);

 ?>


 

 <div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products / Add Products</h1>
 </div>

<div class="category row">
	<div class="col-lg-12">
	<form action="insert_Products.php" method="post" enctype="multipart/form-data">
	Products Name-<input type="text" class="col-lg-5 m-3 p-2" name="Products" placeholder="Products Name">
	Price-<input type="text" class="col-lg-3 m-3 p-2" name="Price" placeholder="Price">
	<br>
	<br>
	Select Category-<select name="Category" class="col-lg-5 m-3 p-2">
		<!-- <option value="selcat">Select</option> -->
		<?php 
		while($res=mysqli_fetch_assoc($query)){
			echo"<option selected value=".$res['cat_id'].">".$res['Category']."</option>";
		}
		//echo $option; ?>

	</select>
	<button type="button" class="btn"><a href="add_categories.php">Add New Category</a></button>
	<br><br>
	<p>Description-</p><textarea type="text" name="Description" rows="5" placeholder="write a description of your products" class="col-lg-10 m-3 p-2"></textarea>
	<br><br>
	<p> Upload Image-</p><input type="file" name="image">

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