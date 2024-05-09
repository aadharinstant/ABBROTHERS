<?php 
include('header.php');

if($_SESSION['userid'] != "ADMIN"){
  ?>
  <script>
      window.location.href='index.php';
  </script>
  <?php
  die;

}
if (isset($_POST['txn_form']) && $_POST['txn_form'] == "ahkwebsolutions"  ){
  
  $newstitle = mysqli_real_escape_string($conn, $_POST['newstitle']);
  $link = mysqli_real_escape_string($conn, $_POST['link']);

  $res = mysqli_query($conn,"INSERT INTO `newsline`(`newstitle`, `link`) VALUES ('$newstitle','$link')");
  if($res){
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Success',
                  'Notification Send Successfully',
                  'success'
              )

          });
           
  window.setTimeout(function() {
  window.location.href = "index.php";
  }, 1500);
      </script>
      <?php
  }else{
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Opps',
                  'Internal Server Problem Please Try Again Lates!',
                  'error'
              )

          });
      </script>
      <?php

  }
  
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">ADD NOTOFICATIONS</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

  
    <!-- Pie Chart -->
    <div class="col-xl-13 col-lg-5">
      
            <!-- Card Body -->
          
            
            <div class="card card-default">
              <div class="card-header">
               
                <h6 class="card-title m-0 font-weight-bold text-danger"><i class="fas fa-bullhorn"></i> ADD NOTIFICATIONS MESSAGE  <?php echo $_SESSION['name'] ?></h6>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-danger">
                  <h5>SEND NOTIFICATIONS</h5>
                </div>
                <form action="" name="newsline" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="text-transform:uppercase" id="newstitle" name="newstitle" placeholder="news title"value="" required="">
            <input type="hidden" name="txn_form" value="ahkwebsolutions">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
          <input type="text" class="form-control" id="link"  name="link" placeholder="link or message"value="" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        
          
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-primary btn-block">SEND NOTIFICATION</button>
              <div class="input-group-append">
            </div>
            <!-- /.col -->
          </div>
        </form>
        
                </div>
              <!-- /.card-body -->
            

<!-- Content Row -->

        





<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include "footer.php";?>