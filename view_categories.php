<?php 
require_once('common_header.php');
require_once('config.php');
$select="SELECT * FROM category";
$query = mysqli_query($conn, $select);

 ?>
 <?php
     if (isset($_GET ['success_msg']) && $_GET['success_msg']==5) {
  echo "<script>alert('Category Added Successfully')</script>";
} ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category / View Category</h1>
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
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr. No</th>
                      <th>Category Name</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
$i=1;
while($res=mysqli_fetch_assoc($query)){
  // echo "<pre>";
  // print_r($result);
  // echo $result->name
 ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo$res['Category']; ?></td>
                      <td>
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" onclick="edit_Cat(<?php echo$res['cat_id']; ?>)">Edit</button>
                      </td>
                    </tr>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_category.php" method="post">
      <div class="modal-body">
      <input type="text" class="col-lg-5 m-3 p-2" name="categ" id="categ" required placeholder="Type a Category to add">
      <input type="hidden" name="categ_id" id="categ_id">
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
<!-- </div> -->
<script >
  function edit_Cat(id){
   //alert("edit_Cat");
   $.ajax({
    url:"get_single_category.php",
    data:'id='+id,
    method:'get',
    dataType:'json',
    success:function(res){
      console.log(res.Category);
      $('#categ').val(res.Category);
      $('#categ_id').val(res.cat_id);
    }
   })
  }
  
</script>
        </body>



 <?php
require_once('common_footer.php')
  ?>