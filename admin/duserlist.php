<?php
include('header.php');

if ($_SESSION['usertype'] != "SUPER ADMIN") {
?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
    die;
}
$res = mysqli_query($conn, "SELECT * FROM usertable WHERE createdby='".$_SESSION['phone']."'");


if(isset($_POST['sub']) && $_POST['sub'] =="1"){
	$wallet11 = mysqli_real_escape_string($conn,$_POST['number_wallet']);
	$wallet22 = mysqli_real_escape_string($conn,$_POST['name_wallet']);
	$wallet33 = mysqli_real_escape_string($conn,$_POST['dob_wallet']);
	$wallet44 = mysqli_real_escape_string($conn,$_POST['gender_wallet']);
	$wallet55 = mysqli_real_escape_string($conn,$_POST['child_wallet']);
	$wallet77 = mysqli_real_escape_string($conn,$_POST['address_wallet']);
	$email = mysqli_real_escape_string($conn,$_POST['emailid']);
	
	$sdasdasf = mysqli_query($conn, "SELECT * FROM usertable WHERE phone='".$email."'");
	$sdsd = mysqli_fetch_array($sdasdasf);
	$a = $sdsd['number_wallet'];
    $b = $sdsd['name_wallet'];
	$c = $sdsd['dob_wallet'];
    $d = $sdsd['gender_wallet'];
	$e = $sdsd['child_wallet'];
	$f = $sdsd['address_wallet'];
	
	if($wallet1>=$wallet11){
		$gs=$wallet1-$wallet11;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `number_wallet`='$gs' WHERE phone='".$_SESSION['phone']."' ");    
		$fs=$wallet11+$a;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `number_wallet`='$fs' WHERE emailid='$email' ");    
	}
	if($wallet2>=$wallet22){
		$fsf=$wallet2-$wallet22;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `name_wallet`='$fsf' WHERE emailid='".$_SESSION['phone']."' ");
		$saf=$wallet22+$b;
		$dfs = mysqli_query($conn,"UPDATE `usertable` SET `name_wallet`='$saf' WHERE emailid='$email' ");    
	}
	if($wallet3>=$wallet33){
		$sds=$wallet3-$wallet33;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `dob_wallet`='$sds' WHERE emailid='".$_SESSION['phone']."' ");
		$dasd=$wallet33+$c;
		$sff = mysqli_query($conn,"UPDATE `usertable` SET `dob_wallet`='$dasd' WHERE emailid='$email' ");    
	}
	if($wallet4>=$wallet44){
		$safs=$wallet4-$wallet44;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `gender_wallet`='$safs' WHERE emailid='".$_SESSION['phone']."' "); 
		$daa=$wallet44+$d;
		$sgsg = mysqli_query($conn,"UPDATE `usertable` SET `gender_wallet`='$daa' WHERE emailid='$email' "); 		
	}
	if($wallet5>=$wallet55){
		$ssf=$wallet5-$wallet55;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `child_wallet`='$ssf' WHERE emailid='".$_SESSION['phone']."' ");    
		$dad=$wallet55+$e;
		$sgg = mysqli_query($conn,"UPDATE `usertable` SET `child_wallet`='$dad' WHERE emailid='$email' ");    
	}
		if($wallet7>=$wallet77){
		$ssf=$wallet7-$wallet77;
		$ires = mysqli_query($conn,"UPDATE `usertable` SET `child_wallet`='$ssf' WHERE emailid='".$_SESSION['phone']."' ");    
		$dad=$wallet77+$f;
		$sgg = mysqli_query($conn,"UPDATE `usertable` SET `child_wallet`='$dad' WHERE emailid='$email' ");    
	}
	if($ires){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Point Updated Successfully',
                    'success'
                )
            });
            window.setTimeout(function() {
  window.location.href = "userlist.php";
  }, 1500);
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User List</h1>
                </div><!-- /.col -->
               
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">


                            <table id="table_id" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
										<th class="text-center">Phone</th>
										<th class="text-center">Email</th>
                                        <th class="text-center">Mobile Point</th>
                                        <th class="text-center">Name Point</th>
                                        <th class="text-center">DOB Point</th>
										<th class="text-center">Gender Point</th>
										<th class="text-center">Child Point</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    if(mysqli_num_rows($res)>0) { $no=1;
                                        while ($data = mysqli_fetch_array($res)) {
                                        $no++;   
                                    ?>
                                            <tr>
                                                <td class="text-center"><?php echo $data['name']; ?></td>
												<td class="text-center"><?php echo $data['phone']; ?></td>
												<td class="text-center"><?php echo $data['emailid']; ?></td>
                                                <td class="text-center"><?php echo $data['number_wallet']; ?></td>
                                                <td class="text-center"><?php echo $data['name_wallet']; ?></td>
												<td class="text-center"><?php echo $data['dob_wallet']; ?></td>
                                                <td class="text-center"><?php echo $data['gender_wallet']; ?></td>
												<td class="text-center"><?php echo $data['child_wallet']; ?></td>
												<td class="text-center"><?php echo $data['address_wallet']; ?></td>
                                                <td class="text-center">
                                                    <button type="button"  data-toggle="modal" data-target="#exampleModal<?php echo $no; ?>" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Add Point</button>
                                                </td>
                                            </tr>
											<div class="modal fade" id="exampleModal<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel"><?php echo $data['name']; ?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <form id="regform" method="post" enctype="multipart/form-data"
													autocomplete="off" onsubmit="myButton.disabled = true; return true;">
												  <div class="modal-body">
												  <input type="hidden" name="sub" value="1">
												  <input type="hidden" name="emailid" value="<?php echo $data['emailid']; ?>">
													<div class="row">
													  <div class="col-md-6 form-group">
													    <strong>Mobile Point</strong>
														<input type="text" class="form-control" placeholder="Mobile Point" name="number_wallet" value="" />
													  </div>
													  <div class="col-md-6 form-group">
													    <strong>Name Point</strong>
														<input type="text" class="form-control" placeholder="Name Point" name="name_wallet" value="" />
													  </div>
													  <div class="col-md-6 form-group">
													    <strong>DOB Point</strong>
														<input type="text" class="form-control" placeholder="DOB Point" name="dob_wallet" value="" />
													  </div>
													  <div class="col-md-6 form-group">
													    <strong>Gender Point</strong>
														<input type="text" class="form-control" placeholder="Gender Point" name="gender_wallet" value="" />
													  </div>
													  <div class="col-md-6 form-group">
													    <strong>Child Point</strong>
														<input type="text" class="form-control" placeholder="Child Point" name="child_wallet" value="" />
													  </div>
													  <div class="col-md-6 form-group">
													    <strong>address Point</strong>
														<input type="text" class="form-control" placeholder="address Point" name="address_wallet" value="" />
													  </div>
													</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
									<?php } } ?>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->



<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
$(document).ready(function() {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                responsive: true,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });
</script>
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