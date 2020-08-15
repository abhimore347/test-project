
<?php 
require_once('common_header.php');
require_once('config.php');
$select="SELECT product.*,category.Category FROM product JOIN category ON product.Category=category.cat_id";
$query = mysqli_query($conn, $select);
$select1="SELECT * FROM category";
$query1 = mysqli_query($conn, $select1);
// echo $select;
// die;


 ?>
 <?php
     if (isset($_GET ['success_msg']) && $_GET['success_msg']==2) {
  echo "<script>alert('Product Added Successfully')</script>";
} 
if (isset($_GET ['success_msg']) && $_GET['success_msg']==6) {
  echo "<script>alert('Product deleted Successfully')</script>";
}



?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products / View Products</h1>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>Products Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Product Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr. No</th>
                      <th>Products Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Product Image</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
$i=1;
while($result=mysqli_fetch_assoc($query)){
  // echo "<pre>";
  // print_r($result);

 ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo$result['Products']; ?></td>
                      <td><?php echo$result['Price']; ?></td>
                      <td><?php echo$result['Category']; ?></td>
                      <td><?php echo$result['Description']; ?></td>
                      <td><img src="productimg/<?php echo $result['image']  ?>" height='150' width='150'></td>
                      <td>
                        <button class="btn btn-primary col-lg-12"  data-toggle="modal" data-target="#exampleModal" onclick="edit_product(<?php echo$result['id']; ?>)">Edit </button>
                        <br><br>
                        <button class="btn btn-danger col-lg-12" type="button" onclick="Delete(<?php echo $result['id'];?>)">Delete</button>
                      </td>
                    </tr>

                    <!-- href="edit_product.php?user_id=<?php echo $result['id']; ?>" -->

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>


        <body>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_product.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="col-lg-12">
  
  Products Name-<input type="text" class="col-lg-5 m-3 p-2" id="prod_name" name="Products" placeholder="Products Name">
  <br>
  Price-<input type="text" class="col-lg-3 m-3 p-2" id="prod_price" name="Price" id="prod" placeholder="Price">
  <input type="hidden" name="prod_id" id="prod_id">
  <br>
  Select Category-<select name="Category" class="col-lg-5 m-3 p-2" id="sel_cat">
    <!-- <option value="selcat">Select</option> -->
    <?php 
    while($res=mysqli_fetch_assoc($query1)){
      echo"<option selected value=".$res['cat_id'].">".$res['Category']."</option>";
    }
    //echo $option; ?>

  </select>
  <button type="button" class="btn"><a href="add_categories.php">Add New Category</a></button>
  <br><br>
  <p>Description-</p><textarea type="text" id="prod_desc" name="Description" rows="5" placeholder="write a description of your products" class="col-lg-10 m-3 p-2"></textarea>
  <br><br>
  <p> Upload Image-</p><input type="file" name="image" id="image">
  <input type="hidden" name="oldimg" id="oldimg">

  </div>
      </div>
  
  <!-- <div class="col-lg-12">
  <button type="submit" value="register" class="btn btn-primary m-3 col-lg-2">Add</button>
  <button type="button" class="btn btn-danger m-3 col-lg-2">Cancle</button>
  </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update changes</button>
      </div>
      </form>
      </div>
    </div>
  </div>
        



 <?php
require_once('common_footer.php')
  ?>

<script>
  function Delete(user_id){
  var flag = confirm("want to delete");
  if (flag){
    window.location.href="delete_product.php?user_id="+user_id;
  }
    
}


function edit_product(id){
   //alert("edit_Cat");
   $.ajax({
    url:"get_products.php",
    data:'id='+id,
    method:'get',
    dataType:'json',
    success:function(res){
      console.log(res);
      // $('#image').val(res.image);    
      $('#sel_cat').val(res.Category);
      $('#prod_name').val(res.Products);
      $('#prod_price').val(res.Price);
      $('#prod_desc').val(res.Description);
      $('#prod_id').val(res.id);
      $('#oldimg').val(res.image)

    }
   })
  }
</script>
</body>