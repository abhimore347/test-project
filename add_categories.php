<?php 
require_once('common_header.php')

 ?>
 
 
 <div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category / Add Category</h1>
 </div>

<div class="category row">
	<div class="col-lg-12">
	<form action="insert_category.php" method="post">
	<input type="text" class="col-lg-5 m-3 p-2" name="Category" placeholder="Type a Category to add">
	</div>
	<div class="col-lg-12">
	<button type="submit" value="register" class="btn btn-primary m-3 col-lg-2">Add</button>
	<button type="button" class="btn btn-danger m-3 col-lg-2">Cancle</button>
	</div>
	</form>
</div>
</div>


 <?php
require_once('common_footer.php')
  ?>