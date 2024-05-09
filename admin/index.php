<?php 
include('header.php');
include('../includes/config.php');
if (isset($_POST['txn_form']) && $_POST['txn_form'] == "ahkwebsolutions"  ){
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $sub = mysqli_real_escape_string($conn, $_POST['sub']);
  $mess = mysqli_real_escape_string($conn, $_POST['mess']);
  $res = mysqli_query($conn,"INSERT INTO `contact`(`name`, `email`, `sub`, `mess`) VALUES ('$name','$email','$sub','$mess')");
  if($res){
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Success',
                  'Message Send Successfully',
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
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        
                        <a href="wallet.php" class=" btn btn-sm btn-danger shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add Balance</a>
                        </div>
                      
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₹ <?php echo $udata['walletamount']?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <?php 
    
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers where appliedby='$s_phone'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Applications</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers where appliedby='$s_phone' AND status='reject'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Reject Applications</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' && status='success'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Success Applications
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' && status='pending'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
  <?php
                        if($_SESSION['userid'] == "ADMIN" ){
                        
                            ?>

<!-- Content Row admin -->
<div class="row">
    <?php 
    
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM usertable ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        
                        <a href="adduser.php" class=" btn btn-sm btn-dark shadow-sm"><i
            class="fas fa-user-plus fa-sm text-white-50"></i>Add User</a>
                        </div>
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Total Users For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <?php 
    
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Applications For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers where  status='reject'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Reject Applications  For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  status='success'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Success Applications   For Admin Only
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                            </div>
                               </div>
                            
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  status='pending'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pending Applications  For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php
                        }
                        ?>
<!-- Content Row admin -->
<?php if($_SESSION['usertype'] == "OPERATOR" ){ ?>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Mobile Number Point</div>
                      
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wallet1; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Child Enrollment Point</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wallet5; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Name Correction</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wallet2; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Address Point</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wallet7; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Date Of Birth Change Point</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wallet3; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Gender Change Point
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $wallet4; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>  

<?php } ?>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-bullhorn"></i> Notification and Message Uidai Center</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <?php 
                      
                      $dres = mysqli_query($conn,"SELECT * FROM `newsline` ORDER BY id DESC ");
                      if(mysqli_num_rows($dres)>0){
                        while($data = mysqli_fetch_assoc($dres)){
                            ?>
                <div class="panel-body">
                            <div class="list-group">
                                <span href="#" class="list-item text-info">
                                 <h4>   <i class="fa fa-comment fa-fw"></i> <?php echo $data['newstitle']?>


                                                      <span class="pull-right text-primary small"><em><?php echo date('jS F, Y',strtotime($data['date'])) ?></em>
                                    </span>
                        </h4> 
                        </span>
                              
                                </div>  
                            
                            <!-- /.list-group -->
                          
                        </div>
                        <?php
                        }
                      }
                      ?>
                </div>
               
            
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
  <!-- Content Wrapper. Contains page content -->

        <!-- Profile Image -->
         <div class="card-body">
                <div class="tab-content p-0">
                  <i class=""></i><span style="color:red;"><b>BALANCE ADD करने के लिए अपने DISTRIBUTER या ADMIN KO PAYMENT SCREEENSHOT भेजे और अपना ID भेजे INSTANT BALANCE  ADD कर दिया जाएगा<b></span>
              <div class="card-body">
                <div class="tab-content p-0">                  
                  <i class="fa fa-qrcode"></i><span style="color:Black;"> नोट्स -QR पे पेमेंट्स के बाद ADMIN KO PAYMENT SCREENSHOT जरूर भेजे /.</span>                  
                  <div class="text-center">
                  <b></b>
                  </div>
                  <div class="text-center mb-3 mt-2">
                  </div>
                  <div class="text-center">
                    <img src="../admin/uploads/mypayment.jpg" width="200" alt="Qr Code">
                     </div>
                    </form>
                      </div>
          <!-- /.card-body -->
          </div>
        </form>
        <div class="card-body">
                <div class="callout callout-success">
                </div>
                </div>
                 </div>
               </div>
                 </div>
                 </div>
                 
              <!-- /.card-body -->
<!-- Content Row -->
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include "footer.php";?>