<?php
include('header.php');
    

if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $id = base64_decode($_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM `customers` WHERE type='2' and id='$id'");
    $data = mysqli_fetch_assoc($res);
}


if (isset($_POST['ahkweb'])  && $_POST['ahkweb'] == "ahkwebsolutions") {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $aadharno = mysqli_real_escape_string($conn,$_POST['aadharno']);
    $poi = mysqli_real_escape_string($conn,$_POST['poi']);
    $poa = mysqli_real_escape_string($conn,$_POST['poa']);
    $pob = mysqli_real_escape_string($conn,$_POST['pob']);
    $mobileno = mysqli_real_escape_string($conn,$_POST['mobileno']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $purpose = mysqli_real_escape_string($conn,$_POST['purpose']);

    $username = $_SESSION['phone'];
    $ires = mysqli_query($conn,"UPDATE `usertable` SET `name`='$name', `emailid`='$email', phone='$phone', `walletamount`='$walletamount',`panwallet`='$panwallet',`state`='$state',`city`='$city',`password`='$password',`status`='$status', `usertype`='$usertype' WHERE userid='$id' ");    

    if($ires){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'User Updated Successfully',
                    'success'
                )
            });
        </script>
        <?php
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Internal Server Error Please try Agin Later',
                    'error'
                )
            });
        </script>
        <?php
    }
}
?>
      <div class="container-fluid">
                <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>Add Customer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Customer</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="#" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i> View Customers</a>
        </div>
    </div>
<section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Edit Customer </div>
                    <div class="card-body">
                        <form id="regform" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off" onsubmit="myButton.disabled = true; return true;">
                            <div>
                                <a href="<?php echo $data['poi'] ?>" class="btn btn-success mt-4 mb-2" download="<?php echo $data['poi'] ?>">Identy Proof</a>
                                <a href="<?php echo $data['poa'] ?>" class="btn btn-info mt-4 mb-2" download="<?php echo $data['poa'] ?>">Enrollment Form </a>
                                
                                <?php
                        if($_SESSION['userid'] == "ADMIN" ){
                        
                            ?>
                                <a href="editfinger.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-warning mt-4 mb-2">fingerprint Brightness</a>
                            </div>
                            <?php
                        }
                        ?>
                            </div>
                            

                            <div class="form-group">
                                <div class="row">
                               
                                    <div class="col-md-3">
                                    <label for="Full Name">Correct Name</label>
                                        <input type="text" readonly="" placeholder="Full Name" id="fullname" name="fullname" class="form-control" value="<?php echo $data['name'] ?>" required="">
                                    </div>
                                  
                                   
                                    <div class="col-md-2">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input type="" type="text" class="form-control" placeholder="<?php echo $data['aadhaar_no'] ?>" disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" readonly="" name="mobile" type="text" class="form-control" value="+91 <?php echo $data['mobile_no'] ?>" required="">
                                    </div>
                                   
                                      <div class="col-md-4">
                                        <label for="Purpose">Gender</label>
                                        <input type="text" readonly="" id="purpose" name="gender" class="form-control" value="<?php echo $data['purpose'] ?>" required="">
                                    </div>
                                </div>
                            </div>
                         <!--    <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                        <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger1'] ?>"> <img src="<?php echo $data['finger1'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                  
                                                </div>
                                                <input class="form-control" type="hidden" id="pic1" name="photo1">
                                                <div style="width:100px;height:auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim1" alt="">
                                                </div>

                                               </a>

                                                <h5 id="q1" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                     <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger2'] ?>"> <img src="<?php echo $data['finger2'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic2" name="photo2">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim2" alt="">
                                                </div>
                                               
                                                <h5 id="q2" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger3'] ?>"> <img src="<?php echo $data['finger3'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic3" name="photo3">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim3" alt="">
                                                </div>
                                                
                                                <h5 id="q3" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                     <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger4'] ?>"> <img src="<?php echo $data['finger4'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic4" name="photo4">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim4" alt="">
                                                </div>
                                              
                                                <h5 id="q4" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                  <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger5'] ?>"> <img src="<?php echo $data['finger5'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic5" name="photo5">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim5" alt="">
                                                </div>
                                               
                                                <h5 id="q5" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
									<button type="submit" name="myButton" class="btn btn-success btn-icon"><i class="fa fa-floppy-o"></i>Submit</button>
							</div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
<footer class="footer">
                <span>Copyright © 2023&nbsp; Aadharupdateucl . All rights reserved.</span>
            </footer>      </section>
    <!-- Content Header (Page header) -->
  

    <!-- /.content -->


</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->

<!-- ./wrapper -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function alertMessage(type, message) {
        if (type == 'error') {
            type = 'danger';
        }

        return "<div class='alert alert-" + type + " alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> " + message + " </div>";
    }
</script>



</body>

</html>