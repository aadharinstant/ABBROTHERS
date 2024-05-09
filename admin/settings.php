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

if (isset($_POST['ahkweb'])  && $_POST['ahkweb'] == "ahkwebsolutions") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birth_fee = mysqli_real_escape_string($conn, $_POST['birth_fee']);

    $accesspin = mysqli_real_escape_string($conn, $_POST['accesspin']);
    


    $ires = mysqli_query($conn,"UPDATE `website` SET `url`='$url',`name`='$name',`phone`='$phone',`email`='$email',`birth_fee`='$birth_fee',`accesspin`='$accesspin' WHERE id=0");

    if($ires){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Website data Updated Successfully',
                    'success'
                )
            });
            window.setTimeout(function() {
  window.location.href = "settings.php";
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
                    <h1 class="m-0">Edit Website Details</h1>
                </div><!-- /.col -->
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-success">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="card card-default">


                        <!-- form start -->
                        <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="1TDde6CMH369W5RCLWCgTOjV8fR50kKPMlAfDgjN"> <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="ahkweb" value="ahkwebsolutions">
                            <div class="card-body row">

                                <div class="form-group col-md-6">
                                    <label for="name">Website name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Website name" value="<?php echo $ahkweb['name'] ?>" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="<?php echo $ahkweb['url'] ?>">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="date_of_death">Phone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $ahkweb['phone'] ?>" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" required class="form-control" name="email" placeholder="Email" value="<?php echo $ahkweb['email'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birth_fee">Application Fee</label>
                                    <input type="text" maxlength="12" class="form-control" name="birth_fee" placeholder="Birth Fee" value="<?php echo $ahkweb['birth_fee'] ?>">
                                </div>


                              
                                <div class="form-group col-md-6">
                                    <label for="accesspin">Access PIN</label>
                                    <input type="text" class="form-control" id="accesspin" name="accesspin" placeholder="Access PIN" value="<?php echo $ahkweb['accesspin'] ?>">
                                </div>

                                

                                

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right pt-3 pb-3 mt-2">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
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
<!-- /.content-wrapper -->

<!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> -->

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->
</div>
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