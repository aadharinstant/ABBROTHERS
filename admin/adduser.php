<?php include "header.php";
if($_SESSION['userid'] = "ADMIN"){ ?>
 <?php die; }

if (isset($_POST['reg']) && $_POST['reg'] == "ahkweb"  ) {
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $userid = mysqli_real_escape_string($conn, $_POST['userid']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $walletamount = mysqli_real_escape_string($conn, $_POST['walletamount']);
  $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
 

  if (!empty($password) && !empty($password) && $phone != "ADMIN" && $email != "ADMIN") {
    if ($password == $password) {

      $fpassword = password_hash($password, PASSWORD_DEFAULT);
      $checksql = mysqli_query($conn, "SELECT * FROM usertable WHERE emailid='$email' OR phone='$phone'");
      if (
        !empty($name) &&
        !empty($phone) &&
        !empty($email) &&
        !empty($password) &&
        !empty($password)
      ) {
        if (mysqli_num_rows($checksql) == 0) {
    
          $sql = "INSERT INTO `usertable` (`phone`, `emailid`, `name`,`psaid`,`cprize`, `password`, `city`, `state`, `userid`, `status`, `profilepic`, `createdby`, `joineddate`, `joinedtime`, `usertype`, `walletamount`,`otp`) VALUES ('$phone', '$email', '$name','NOT ALOTED', '98',  '$fpassword', 'cc', 'sdds', '$userid', 'verified', 'profile/admin.jpg', '$username', '', '', '$usertype', '$walletamount','');";
          $res = mysqli_query($conn,$sql);
          // 
          if($res){
            ?>
            <script>
              // alert('Your Account Register Successfully!, You can Login');
              $(function() {
        Swal.fire(
            'Success',
            'Register Successfully You can Login',
            'success'
        )
    });
    window.setTimeout(function() {
  window.location.href = "adduser.php";
  }, 1500);
  
   
            </script>
            <?php
          }else{
            ?>
            <script>
              // alert('Account Not Created ,Try Again!!');
              $(function(){
                Swal.fire(
                  'Opps!',
                  'Internet Server Error, Please Try Again Later!',
                  'error'
                )
    
              });
            </script>
            <?php
          }
          // 
        }else{
          ?>
          <script>
            // alert('Your  email or phone  already exist!');
            $(function() {
        Swal.fire(
            'Opps!',
            'Your  email or phone  already exist!',
            'error'
        )
    });
    window.setTimeout(function() {
  window.location.href = "userlist.php";
  }, 1500);
  
          </script>
          <?php
        }
      }else{
        ?>
        <script>
             $(function() {
        Swal.fire(
            'Opps!',
            'Please Fill All data',
            'error'
        )
    });
        </script>
        <?php
      }
    }else{
      // echo "Confirm Password Not Match";
      ?>
      <script>
           $(function() {
    Swal.fire(
        'Opps!',
        'Confirm Password Not Match!',
        'error'
    )
});
      </script>
      <?php
    }
  }else{
    ?>
      <script>
           $(function() {
    Swal.fire(
        'WOW trying to Cheat!!!',
        'You Are A Cheater  GET OUT!',
        'error'
    )
});
      </script>
      <?php

  }


}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add User</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">

				<!-- general form elements -->
				<div class="card card-default">

				  
				  <!-- form start -->
				  <form method="post" action="" autocomplete="off">
				  					    <div class="card-body row">

				      <div class="form-group col-md-3">
				        <label for="name">First Name</label>
						<input type="hidden" name="reg" value="ahkweb">
				        <input type="text" class="form-control" id="name" name="name" placeholder="Enter first name" value="" required>
				      </div>

              <div class="form-group col-md-3">
				        <label for="userid">Username or User ID</label>
				        <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter Unique User Id" value="" required>
				      </div>

				      <div class="form-group col-md-3">
				        <label for="email">Email</label>
				        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="" required>
				      </div>

				      <div class="form-group col-md-3">
				        <label for="mobile">Mobile</label>
				        <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter mobile" value="" required>
				      </div>

				      <div class="form-group col-md-3">
				        <label for="password">Password</label>
				        <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" value="" required>
				      </div>
					<div class="form-group col-md-3">
				        <label for="walletamount">Balance</label>
				        <input type="number" class="form-control" id="walletamount" name="walletamount" placeholder="Enter Amount" value="" required>
				      </div>

				      <div class="form-group col-md-3">
				        <label for="usertype">Role</label>
				        <select class="form-control" name="usertype" id="usertype" required>
						    <option value="OPERATOR">Retailer</option>
							<?php if($_SESSION['usertype'] == "ADMIN"){ ?>
							<option value="BACKOFFICE">Back Office</option>
						    <option value="SUPER ADMIN">Distributor</option>
				        	<?php } ?>
							
              
				        </select>
				      </div>
					<div class="form-group col-md-3">
				        <label for="username">Created By</label>
				        <input type="text"ENABLE="ENABLE" class="form-control" id="username"  placeholder="Enter email" value="<?php echo $udata['userid']?>" required>
						 <input type="hidden" id="username" name="username" value="<?php echo $udata['phone']?>" >
				      </div>
				    </div>
				    <!-- /.card-body -->

				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
				    </div>
				  </form>
				</div>
				<!-- /.card -->
			</div>
    	</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->


  </div>

</div>
<!-- ./wrapper -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->


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
<script src="http://crsorgiup.co.in/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/moment/moment.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="http://crsorgiup.co.in/admin-assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://crsorgiup.co.in/admin-assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://crsorgiup.co.in/admin-assets/dist/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
function alertMessage(type,message) {
  if (type=='error') {
    type = 'danger';
  }

  return "<div class='alert alert-"+type+" alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> "+message+" </div>";
}
</script>

<?php include "footer.php"; ?>