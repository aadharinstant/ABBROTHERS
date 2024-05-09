<?php
include('header.php');
if (isset($_POST['s_profile']) && $_POST['s_profile'] == "ahkweb" && $_POST['phone'] != "ADMIN" && $_POST['email'] != "ADMIN") {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

	$sres = mysqli_query($conn, "UPDATE usertable SET name='$name', emailid='$email', phone='$phone' WHERE emailid='$mail' ");
	if ($sres) {
?>
		<script>
			$(function() {
				Swal.fire(
					'Success!',
					'Your Profile data Updated Successfully',
					'success'
				)
			});
			 
  window.setTimeout(function() {
  window.location.href = "profile.php";
  }, 1500);
		</script>
	<?php
	} else {
	?>
		<script>
			$(function() {
				Swal.fire(
					'Opps!',
					'Internal Server Error, Please Try Again Later',
					'error'
				)
			});
		</script>
		<?php
	}
}

if (isset($_POST['s_password']) && $_POST['s_password'] == "ahkwebsolutions") {
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	if ($password == $cpassword) {
		$fpassword = password_hash($password, PASSWORD_DEFAULT);
		$pres = mysqli_query($conn, "UPDATE usertable SET password='$fpassword' WHERE emailid='$mail' ");

		if ($pres) {
		?>
			<script>
				$(function() {
					Swal.fire(
						'Success!',
						'Your Password Updated Successfully',
						'success'
					)
				});
			</script>
		<?php
		} else {
		?>
			<script>
				$(function() {
					Swal.fire(
						'Opps!',
						'Internal Server Error, Please Try Again Later',
						'error'
					)
				});
			</script>
		<?php
		}
	} else {
		?>
		<script>
			$(function() {
				Swal.fire(
					'Opps!',
					'Confirm Password Does not Match',
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
					<h1 class="m-0">Profile</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?php echo $udata['profilepic'] ?>" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?php echo $_SESSION['name'] ?></h3>

							<p class="text-muted text-center"><?php echo $_SESSION['usertype'] ?></p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Mobile</b> <a class="float-right"><?php echo $_SESSION['phone'] ?></a>
								</li>
								<li class="list-group-item">
									<b>Email</b> <a class="float-right"><?php echo $_SESSION['emailid'] ?></a>
								</li>
								<li class="list-group-item">
									<b>Created At</b> <a class="float-right"><?php echo $udata['joineddate'] ?> 19:28:55</a>
								</li>
								
								</li>
							</ul>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="card">
						<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link active" href="#profile-setting" data-toggle="tab">Profile Update</a></li>
							
							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">


								<!-- /.tab-pane -->

								<div class="active tab-pane" id="profile-setting">
									<form action="" method="POST" name="profile" class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Name</label>
											<div class="col-sm-10">
												<input type="name" class="form-control" id="inputName" name="name" value="<?php echo $udata['name'] ?>" placeholder="Name"required="" >
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo $udata['emailid'] ?>" placeholder="Email" required="">
											</div>
										</div>
										<input type="hidden" name="s_profile" value="ahkweb">
										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="phone" value="<?php echo $udata['phone'] ?>" id="inputName2" placeholder="Phone" required="">
											</div>
										</div>


										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
									</form>
									<!-- Password  -->
									<hr>
									<form action="" name="pass" method="POST" class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Password</label>
											<div class="col-sm-10">
												<input type="hidden" name="s_password" value="ahkwebsolutions">
												<input type="password" class="form-control" id="inputName" name="password" placeholder="Password" required="">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" id="inputEmail" name="cpassword" placeholder="Confirm Password"required="" >
											</div>
										</div>




										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
								<!-- /.tab-pane -->
								
								<!-- /.tab-pane -->

							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->


</div>

</div>
<!-- ./wrapper -->
<?php include "footer.php";?>