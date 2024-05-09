<?php
include('../includes/config.php');
if ($_SESSION['usertype'] != "BACKOFFICE") {
    ?>
        <script>
            window.location.href = 'index.php';
        </script>
        <?php

        
        die;
}
if(isset($_GET['id']) && $_GET['id'] != NULL){
    $id = base64_decode($_GET['id']);
    $res = mysqli_query($conn,"SELECT * FROM `customers` WHERE id='$id'");
    $data = mysqli_fetch_assoc($res);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aadhar Correction</title>
    <script src="https://kit.fontawesome.com/40b99cb665.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->


    <!-- Custom styles for this template -->


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js.download"></script>


    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    @media (min-width: 768px) {}

    .center_text {
        text-decoration: underline;
        text-align: center;
    }

    .pro_custem {

        display: none;
    }





    @keyframes loading-1 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }

    @keyframes loading-2 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }
    }

    @keyframes loading-3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
    }

    @keyframes loading-4 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(36deg);
            transform: rotate(36deg);
        }
    }

    @keyframes loading-5 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(126deg);
            transform: rotate(126deg);
        }
    }

    @media only screen and (max-width: 990px) {
        .progress {
            margin-bottom: 20px;
        }
    }
    .rounded mx-auto d-block{
        width: 96px;
    }

    .billing_list {
        flex: 1;
        justify-content: center;
        align-content: center;
        align-items: center;
        padding: 9px;
    }

    .check {
        background-color: #4CAF50;
        color: #e9d3d3;
    }

    .check a {
        color: white;
    }

    .ban a {
        color: white;
    }

    .ban {
        background-color: #b4372e;
    }

    .small_chip {
        font-size: 10px;
        padding-left: 4px;
        padding-right: 4px;
        border-radius: 5px;
        flex: 1;

    }
    </style>
    <style>
    .alert_g {
        position: fixed;
        top: 0px;
        z-index: 9999999999;
    }
    </style>
</head>

<body id="page-top" class="sidebar-toggled" oncontextmenu= "return false">
    <style>
    .alert_g {
        position: fixed;
        top: 0px;
        z-index: 9999999999;
    }
    </style>
    <div class=" pro_custem" id="pro_gress">
        <div class="  pr_inner">
            <p><img style="display: block; margin-left: auto; margin-right: auto;"
                    src="img/sd.gif" width="70" /></p>

        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->



        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->


                    <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href="pendingwork.php"><i class="fa fa-home"></i></a>
                    </button>

                    <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href="pendingwork.php"><i class="far fa-list-alt"></i>
                    </button>

                    <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href=""><i class="fas fa-plus"></i></a>
                    </button>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">

                            <div class="input-group-append">
                            </div>
                        </div>
                    </form>


                    <!-- <form class="form-inline my-md-0">
            <div class="input-group">
                          <button class="btn btn-success text-white">Balance :50</button>
                            
            </div>
          </form> -->



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="logout">
                                <!-- <i class="fas fa-envelope fa-fw text-primary"></i> -->
                                <i class="fas fa-sign-out-alt text-primary"></i>
                                <!-- Counter - Messages -->
                                <!-- <span class="badge badge-primary badge-counter">0</span> -->
                            </a>

                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Queries
                </h6>
              </div> -->
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-primary small"></span>
                                <i class="fa fa-bars text-primary"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" class="text-primary">
                                    <i class="fa fa-user text-primary"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" class="text-primary">
                                    <i class="fas fa-trophy fa-sm fa-fw mr-2 text-primary"></i>
                                    Get Certificate
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pendingwork.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-primary"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                 <?php
                            if (strpos($data['finger1'], 'https://www.tribal.mp.gov.in/') !== false) {
                                ?>
                                <td width=""><img src="<?php echo $data['finger1'] ?>" width="40" height="40" class="imgm" style="margin-top: 40px;
                                                  margin-left: 11px;"></td>
                                                  <?php
                                              } else if (strpos($data['finger1'], 'data:image') !== false) {
                                                  ?>
                                                  
                                                  
                <!-- Begin Page Content -->
                
                <div class="container-fluid  " id="wark_area">
                    <br>
                    <br>
                                    
                    <div id="carouselExampleControls" class="carousel slide bg-info" data-interval="false">
                       
                        									
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <img class="rounded mx-auto d-block  "
                                src="<?php echo $data['finger1'] ?>"style="width: 96px;" alt="fist photo">
                            </div>
                            <div class="carousel-item">
                                <img class="rounded mx-auto d-block  "
                                src="<?php echo $data['finger2'] ?>" style="width: 96px;" alt="Second photo">
                            </div>
                            <div class="carousel-item">
                                <img class="rounded mx-auto d-block  "
                                src="<?php echo $data['finger3'] ?>" style="width: 96px;" alt="Third photo">
                            </div>
                            <div class="carousel-item">
                                <img class="rounded mx-auto d-block  "
                                src="<?php echo $data['finger4'] ?>" style="width: 96px;" alt="fourth photo">
                            </div>
                            <div class="carousel-item">
                                <img class="rounded mx-auto d-block  "
                                src="<?php echo $data['finger5'] ?>">
                            </div>
                        </div>
                                                                      <?php } ?>

                       
                     
                        
                    </div>
                    

                    <h2>
                        <span style="color: #ff6600;" onclick="addsize()">+</span>
                        &nbsp; &nbsp; &nbsp;

                        <span style="color: #ff6600;" onclick="subsize()">-</span>

                    </h2>

                    <span id="pix"></span>

                    <script>
                    function addsize() {




                        $('.rounded').css({
                            'width': ($('.rounded').width() + 1) + 'px'
                        })

                        $('#pix').html($('.rounded').width());

                    }

                    function subsize() {
                        $('.rounded').css({
                            'width': ($('.rounded').width() - 1) + 'px'
                        })
                        $('#pix').html($('.rounded').width());
                    }
                    </script>


                    <style>
                    #wrapper #content-wrapper {
                        background-color: #000000;
                        width: 100%;
                        overflow-x: hidden;
                    }

                    .bg-white {
                        background-color: #000 !important;
                    }

                    .carousel-inner {
                        background: #000;
                    }

                    img.rounded.mx-auto.d-block {
                        background: #000;
                        filter: grayscale(-48%);
                        filter: invert(1);
                        --value: 100%;
                        width: 22.5%;
                        transform: scaleX(-1);
                    }
                    </style>




                </div>
                <!-- /.container-fluid -->
            </div><!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">

                    </div>
                </div>
            </footer>
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

    <!-- progress bar  -->
    <div class="container" style="    display: none;">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="progress blue">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">70%</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="progress yellow">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">65%</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end progress bar  -->

    <!-- Start progreesss passer -->




    <!-- End pagerese -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">�</span>
                    </button>
                </div>
                <!-- containt modal -->
                <div class="modal-body">Are You Sure To 'Logout'?</div>

                <!--  End containt modal  -->

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="pendingwork.php">Yes</a>
                </div>
            </div>
        </div>
    </div>


    <!-- End Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js.download"></script>
    <script src="js/bootstrap.bundle.min.js.download"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js.download"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js.download"></script>

    <!-- Page level plugins -->
    <script src="js/Chart.min.js.download"></script>

    <!-- Page level custom scripts -->
    <script src="js/chart-area-demo.js.download"></script>
    <script src="js/chart-pie-demo.js.download"></script>




    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js.download"></script>
    <script>
    $(document).click(function(e) {
        if (!$(e.target).is('.collapse')) {
            $('.collapse').collapse('hide');
        }
    });


    $(window).on('popstate', function(ev) {


    });




    function liveLoad(pageurl, type, parameters) {

        console.log(pageurl);
        $(".pro_custem").slideToggle();


        $('.navbar-nav').toggleClass("sidebar-toggled");

        $.ajax({
            url: pageurl,
            type: 'Post',
            data: {
                p: 'k'
            },
            success: function(data) {

                $(".pro_custem").slideToggle();

                $('#wark_area').html(data);
            },
            error: function(e) {

                console.log(e.responseText);
                // $('#content').html(e.responseText);
            }
        });
    }

    $(document).ready(function() {
        $('#exampled').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>
    
</body>

</html>