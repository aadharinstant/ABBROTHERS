<?php
include('header.php');


if(isset($_POST['sub']) && $_POST['sub'] =="1"){
    $link = null;
    $link2 = null;
    $link3 = null;
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$type = mysqli_real_escape_string($conn,$_POST['type']);

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$dob = mysqli_real_escape_string($conn,$_POST['birthdate']);
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
	if($wallet1!=0){
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
		$bal= $wallet1-1;
		$wres = mysqli_query($conn,"UPDATE usertable SET number_wallet='$bal' WHERE phone='$username'");
		$res = mysqli_query($conn,"INSERT INTO `customers`(`type`, `parent`, `appliedby`, `memberemail`, `name`, `fname`, `dob`, `aadhaar_no`, `mobile_no`, `email`, `purpose`, `finger1`, `finger2`, `finger3`, `finger4`, `finger5`, `status`,`poi`,`poa`,`pob`) VALUES ('$type','".$udata['userid']."','$username','".$udata['emailid']."','$name','$fname','$dob','$aadhaar_no','$mobile_no','$email','$purpose','$photo1','$photo2','$photo3','$photo4','$photo5','$status','$link','$link2','$link3')");
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
    <div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-header bg-warning">
                            <div class="card-title ">
                                       <h3><strong>कृपया ध्यान दें  🔍 कस्टमर का फिंगर लगाते समय ध्यान दीजिए कि कस्टमर की जो फिंगर की लाइनिंग है वह क्लियर आनी चाहिए नहीं तो पहले कस्टमर का हाथ पानी से धुलवा दे उसके बाद वैसलीन लगवाए उसके बाद फिंगर लें Thank you</strong> </h3>
                                <div class="card-title">
                                    <div style="display: flex; justify-content:flex-start">
                                        <a class="btn btn-dark" href="check.php" target="_blank">Available Balance : Rs <?php echo $wallet1['walletamount']; ?></a>
                                    </div>
                                    <div style="display: flex; justify-content:flex-end">
                                        <a class="btn btn-dark" href="customerlist.php"><i class="fa fa-check-circle"></i>View Entry Mobile Link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   		 </div>		    
                <hr>
    </div>
    <section class="main-content">
  
    <!-- ============================================================== -->
    <!-- 						Content Start	 						-->
    <!-- ============================================================== -->
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
            <a href="customerlist.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i> View Customers</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Add Customer <br>
                       
                    </div>
                    <div class="card-body">
                        <form id="regform" method="post" enctype="multipart/form-data" class="form-horizontal"
                            autocomplete="off" onsubmit="myButton.disabled = true; return true;">
							<input name="type" type="hidden" value="1" required>
                            <div class="form-group">
                                <div class="row">
                                  
                                    <div class="col-md-4">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" placeholder="Full Name" id="fullname" name="name"
                                            class="form-control" required>
                                    </div>
                                    <input type="hidden" name="sub" value="1">
                                    <div class="col-md-4">
                                        <label for="date-input1">DATE OF BIRTH</label>
                                        
                                                <input type="number" name="birthdate" placeholder="07/05/2000" class="form-control" required>
                                            
                                    </div>
                                    
                                    <input type="hidden" name="sub" value="1">
                                
                                    <div class="col-md-4">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input id="aadhaar-no" name="aadhaar_no" type="number" minlength="12"class="form-control" required>
                                    </div>
                                   
                           
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" name="mobile_no" type="number" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Email">Email ID</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Purpose">Purpose</label>
                                        <input type="text" id="purpose" name="purpose" class="form-control" required>
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

