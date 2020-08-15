<?php
session_start();
if(isset($_SESSION['user_id'])&&$_SESSION['user_id']!=null)
{$name=$_SESSION['user_name']

?>
<?php 
require_once('common_header.php');
require_once('config.php');
$select="SELECT count(cat_id) AS total FROM category";
$select1="SELECT count(id) AS total FROM product";
$query=mysqli_query($conn, $select);
$query1=mysqli_query($conn, $select1);
$res=mysqli_fetch_assoc($query);
$res1=mysqli_fetch_assoc($query1);
$num_rows=$res['total'];
$num_rows1=$res1['total'];
// print_r($num_rows);



 ?>
 <?php
     if (isset($_GET ['success_msg']) && $_GET['success_msg']==3) {
  echo "<script>alert('user login successfully')</script>";
} ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Prouducts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_rows1; ?> Products</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-list fa-2x text-gray-300" ></i>
                    </div>
                    <div class="col-12 product_btn mt-2">
                      <button type="button"  class="btn text-primary"><a href="view_products.php"> View Products </a><i class="fa fa-angle-right ml-2" aria-hidden="true"></i></button>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">New Categories</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_rows; ?> Categories</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-list fa-2x text-gray-300" ></i>
                    </div>
                    <div class="col-12 product_btn mt-2">
                      <button type="button" class="btn text-success "><a class="text-success" href="view_categories.php"> View Categories </a><i class="fa fa-angle-right ml-2" aria-hidden="true"></i></button>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
require_once('common_footer.php')
  ?>

  <?php }

  else{
  header('location:login.php?success_msg=9');
  ;
}   