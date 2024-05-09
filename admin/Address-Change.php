<?php
include('header.php');


if(isset($_POST['sub']) && $_POST['sub'] =="1"){
    $link = null;
    $link2 = null;
    $link3 = null;
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$type = mysqli_real_escape_string($conn,$_POST['type']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$aadhaar_no = mysqli_real_escape_string($conn,$_POST['aadhaar_no']);
	$mobile_no = mysqli_real_escape_string($conn,$_POST['mobile_no']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$purpose = mysqli_real_escape_string($conn,$_POST['purpose']);
	$status = "pending";
	// fingers 
	$photo1 = mysqli_real_escape_string($conn,$_POST['photo1']);
	$photo2 = mysqli_real_escape_string($conn,$_POST['photo2']);
	$photo3 = mysqli_real_escape_string($conn,$_POST['photo3']);
	$photo4 = mysqli_real_escape_string($conn,$_POST['photo4']);
	$photo5 = mysqli_real_escape_string($conn,$_POST['photo5']);

	
	$fee = 1;
	if($wallet7!=0){
        // File Upload 
        if(isset($_FILES['poi']) ){
            $targetfolder = "uploads/";
            $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['poi']['name']) ;
           $file_type=$_FILES['poi']['type'];
           if ($file_type=="application/pdf") {
            if(move_uploaded_file($_FILES['poi']['tmp_name'], $targetfolder))
            {
                $link = $targetfolder;
                
            }else {
            echo "Problem uploading file";
            }
           }else {
            $uploaderror = true;
           
           }
        }
        // Upload POA 
        if(isset($_FILES['poa']) ){
            $targetfolder = "uploads/";
            $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['poa']['name']) ;
           $file_type=$_FILES['poa']['type'];
           if ($file_type=="application/pdf" ) {
            if(move_uploaded_file($_FILES['poa']['tmp_name'], $targetfolder))
            {
                $link2 = $targetfolder;
                
            }else {
            echo "Problem uploading file";
            }
           }else {
            $uploaderror = true;
           
           }
        }
        // Upload POB 
        if(isset($_FILES['pob']) ){
            $targetfolder = "uploads/";
            $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['pob']['name']) ;
           $file_type=$_FILES['pob']['type'];
           if ($file_type=="application/pdf" ) {
            if(move_uploaded_file($_FILES['pob']['tmp_name'], $targetfolder))
            {
                $link3 = $targetfolder;
                
            }else {
            echo "Problem uploading file";
            }
           }else {
            $uploaderror = true;
           
           }
        }
        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
        $dateof_issue = date('d-m-y h:i:s');
        $dateof_update = date('d-m-y h:i:s');
        $username = $_SESSION['phone'];
          $userid = $_SESSION['userid'];
        // ?End File Upload 
		$bal= $wallet7-1;
		$wres = mysqli_query($conn,"UPDATE usertable SET address_wallet='$bal' WHERE phone='$username'");
		$res = mysqli_query($conn,"INSERT INTO `customers`(`type`, `parent`, `appliedby`, `memberemail`, `name`, `new_name`, `fname`, `dob`, `aadhaar_no`, `mobile_no`, `email`, `address`, `purpose`, `finger1`, `finger2`, `finger3`, `finger4`, `finger5`, `status`,`poi`,`poa`,`pob`) VALUES ('$type','".$udata['userid']."','$username','".$udata['emailid']."','$name','$newname','$fname','$dob','$aadhaar_no','$mobile_no','$email','$address','$purpose','$photo1','$photo2','$photo3','$photo4','$photo5','$status','$link','$link2','$link3')");
		if($res){
            ?>
			<script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Application Submitted Successfully!',
                    'success'
                )
            });
              window.setTimeout(function() {
  window.location.href = "customerlist.php";
  }, 1500);
        </script>
        <?php 
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Internal Server Error!',
                    'error'
                )
            });
             window.setTimeout(function() {
  window.location.href = "add-customer.php";
  }, 1500);
        </script>
        <?php
    }

    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient ! Please Recharge ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='wallet.php';
            },1500);
            
        </script>
        <?php
    }


    
}
?>

   
    <style>
    @media print {

        html,
        body {
            display: none;
        }
    }
    </style>
</head>

<body>
  
    <!-- ============================================================== -->
    <!-- 						Content Start	 						-->
    <!-- ============================================================== -->
    <div class="container-fluid">
                <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>Address Change</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Address Change</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="customerlist.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i> View Customers</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Address Change <br>
                       
                    </div>
                    <div class="card-body">
                        <form id="regform" method="post" enctype="multipart/form-data" class="form-horizontal"
                            autocomplete="off" onsubmit="myButton.disabled = true; return true;">
							<input name="type" type="hidden" value="6" required>
                            <div class="form-group">
                                <div class="row">
                                  
                                    <div class="col-md-4">
                                        <label for="FullName"> Name</label>
                                        <input type="text" placeholder="Customer Name" id="fullname" name="name"
                                            class="form-control" required>
                                    </div>
                                    <input type="hidden" name="sub" value="1">
                                
                                    <div class="col-md-4">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input id="aadhaar-no" name="aadhaar_no" type="number" minlength="12"  class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" name="mobile_no" type="number" class="form-control" required>
                                    </div> 
                                    
								   <div class="col-md-4">
                                        <label for="FullName">New Address</label>
                                        <input type="text" placeholder="New Name" id="fullname" name="address"
                                            class="form-control" required>
                                    </div>
                           
                                   
                                    <div class="col-md-4">
                                        <label for="Purpose">Address in Hindi</label>
                                        <input type="text" id="purpose" name="purpose" class="form-control" required>
                                   </div>
								   <script>
                                    function fileValidation1(){
                                        var fileInput = document.getElementById('poi');
                                        var fileSize = (fileInput.files[0].size / 1024 / 1024).toFixed(2);
                                        if(fileSize > .3){
                                            alert("File size must be less than 300KB");
                                            fileInput.value = '';
                                            return false;
                                        }
                                    }
                                    </script>
                                    <div class="col-md-4">
                                        <label for="poi">PAN CARD / DOMICILE CERTIFICATE</label>
                                        <input type="file" id="poi" name="poi"  accept=".pdf" onchange="return fileValidation1()"  class="form-control" required>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im1"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic1" name="photo1" style="width: 205px;" id="cim1"required>
                                                <div style="width:100px;height:auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim1" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="1">Click</button>
                                                <h5 id="q1" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im2"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic2" name="photo2" required> 
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim2" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="2">Click</button>
                                                <h5 id="q2" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im3"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic3" name="photo3" required>
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim3" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="3">Click</button>
                                                <h5 id="q3" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im4"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic4" name="photo4" required>
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim4" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="4">Click</button>
                                                <h5 id="q4" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im5"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic5" name="photo5" required>
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim5" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="5">Click</button>
                                                <h5 id="q5" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="myButton" class="btn btn-success btn-icon"><i
                                        class="fa fa-floppy-o"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       
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


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- 						Content End		 						-->
    <!-- ============================================================== -->
    <!-- Common Plugins -->

    <script src="assets/lib/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="model/js/mfs100-9.0.2.6.js"></script>
    <script type="text/javascript" src="model/js/capture.js"></script>
    <script src="assets/lib/formatter/jquery.formatter.min.js"></script>
    <script>
    $(function() {
        /* BirthDate */
        $('input[name="birthdate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: "DD/MM/YYYY",
            }
        });
    });
    $('#mobileno').formatter({
        'pattern': '+91 {{99}}-{{99}}-{{999999}}',
        'persistent': true
    });
    $('#aadhaar-no').formatter({
        'pattern': '{{9999}} {{9999}} {{9999}}',
        'persistent': true
    });
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
    }
    document.addEventListener("keyup", function(e) {
        var keyCode = e.keyCode ? e.keyCode : e.which;
        if (keyCode == 44) {
            stopPrntScr();
        }
    });

    function stopPrntScr() {

        var inpFld = document.createElement("input");
        inpFld.setAttribute("value", ".");
        inpFld.setAttribute("width", "0");
        inpFld.style.height = "0px";
        inpFld.style.width = "0px";
        inpFld.style.border = "0px";
        document.body.appendChild(inpFld);
        inpFld.select();
        document.execCommand("copy");
        inpFld.remove(inpFld);
    }

    function AccessClipboardData() {
        try {
            window.clipboardData.setData('text', "Access   Restricted");
        } catch (err) {}
    }
    setInterval("AccessClipboardData()", 300);
    </script>
    <script src="jquery-1.8.2.js"></script>
<script src="mfs100-9.0.2.6.js"></script>

    <script src="assets/lib/bootstrap/js/popper.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/pace/pace.min.js"></script>
    <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
    <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
    <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!--Chart Script-->
    <script src="assets/lib/chartjs/chart.min.js"></script>
    <script src="assets/lib/chartjs/chartjs-sass.js"></script>
    <!--Vetor Map Script-->
    <script src="assets/lib/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/lib/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <!-- Chart C3 -->
    <script src="assets/lib/chart-c3/d3.min.js"></script>
    <script src="assets/lib/chart-c3/c3.min.js"></script>
    <!-- Datatables-->
    <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/lib/toast/jquery.toast.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <!--Sweet Alerts-->
    <script src="assets/lib/sweet-alerts2/sweetalert2.min.js"></script>

<!-- Logout Modal-->
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

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script>
$(document).ready(function() {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                responsive: true,
                pageLength: 500000000,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });   
    
</script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

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



<!-- Logout Modal-->
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

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

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

<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function deleteRecord(th) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value == 1) {
                $(th).parent().submit();
            }
        });
    }
</script>



</body>

</html>