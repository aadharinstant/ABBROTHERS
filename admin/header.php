<?php
include('../includes/config.php');
if (!isset($_SESSION['loggedin']) == true) {
?>
    <script>
        window.location.href = '../login.php';
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $ahkweb['name']; ?> | Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          
                <img src="img/logo.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="d-none d-sm-inline-block brand-text font-weight-light">Aaadhar UCL</span>
     
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
			<!-- Nav Item - Pages Collapse Menu -->
		    <?php  if($_SESSION['usertype'] == "ADMIN" ){ ?>
		    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
                    aria-expanded="true" aria-controls="users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   
                        <a class="collapse-item" href="dadduser.php">Add User</a>
                        <a class="collapse-item" href="userlist.php">user list</a>
                    </div>
                </div>
            </li>
            <?php } ?>
            <?php if($_SESSION['usertype'] == "SUPER ADMIN" ){ ?>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
                    aria-expanded="true" aria-controls="users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="dadduser.php">Add User</a>
                        <a class="collapse-item" href="duserlist.php">User List </a>
                       
                    </div>
                </div>
            </li>
            <?php } ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php if($_SESSION['userid'] == "ADMIN" OR ""){ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#request"
                    aria-expanded="true" aria-controls="request">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pending Requests</span>
                </a>
                <div id="request" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <?php 
                       $q = "";
                        $q = "SELECT count(*) as cnt FROM qrtxn WHERE status='pending' ";
                        $rr = mysqli_query($conn,$q);
                        $rorw = mysqli_fetch_assoc($rr);
                        $rorw['cnt'];
                    ?>
                    
                    <?php 
                        $q = "";
                        $q = "SELECT count(*) as cnt FROM customers WHERE status='pending' ";
                        $rr = mysqli_query($conn,$q);
                        $rorw = mysqli_fetch_assoc($rr);
                        $rorw['cnt'];
                    ?>
                        <a class="collapse-item" href="pendingwork.php">Pending Applications <span class="badge badge-warning badge-counter"><?php echo $rorw['cnt']; ?></span></a>
            </li>
            <?php } ?>
			
			<?php if($_SESSION['usertype'] == "BACKOFFICE" OR ""){ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#request"
                    aria-expanded="true" aria-controls="request">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pending Requests</span>
                </a>
                <div id="request" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
						<?php 
                                                $q1 = "";
                                                $q1 = "SELECT count(*) as cnt FROM customers WHERE status='pending' AND type='2'";
                                                $rr1 = mysqli_query($conn,$q1);
                                                $rorw1 = mysqli_fetch_assoc($rr1);
                                            ?>
                    
                        <a class="collapse-item" href="pendingworkdemoback.php">Name Pending Data <span class="badge badge-danger badge-counter"><?php echo $rorw1['cnt']; ?></span></a>
						<?php 
                                                $q2 = "";
                                                $q2 = "SELECT count(*) as cnt FROM customers WHERE status='pending' AND type='6' ";
                                                $rr2 = mysqli_query($conn,$q2);
                                                $rorw2 = mysqli_fetch_assoc($rr2);
                                            ?>
                                            
                          <a class="collapse-item" href="pendingworkdemoback3.php">Address Pending Data <span class="badge badge-danger badge-counter"><?php echo $rorw2['cnt']; ?></span></a>
						<?php 
                                                $q3 = "";
                                                $q3 = "SELECT count(*) as cnt FROM customers WHERE status='pending' AND type='3' ";
                                                $rr3 = mysqli_query($conn,$q3);
                                                $rorw3 = mysqli_fetch_assoc($rr3);
                                            ?>
                    
                        <a class="collapse-item" href="pendingworkdemoback1.php">Dob Pending Data <span class="badge badge-danger badge-counter"><?php echo $rorw3['cnt']; ?></span></a>
                        
						<?php 
                                                $q4 = "";
                                                $q4 = "SELECT count(*) as cnt FROM customers WHERE status='pending' AND type='4' ";
                                                $rr4 = mysqli_query($conn,$q4);
                                                $rorw4 = mysqli_fetch_assoc($rr4);
                                            ?>
                    
                        <a class="collapse-item" href="pendingworkdemoback2.php">Gender Pending Data <span class="badge badge-danger badge-counter"><?php echo $rorw4['cnt']; ?></span></a>
					 <?php 
                                                $qqq = "";
                                                $qqq = "SELECT count(*) as cnt FROM customers WHERE status='pending' AND type='5' ";
                                                $rrrr = mysqli_query($conn,$qqq);
                                                $rorwww = mysqli_fetch_assoc($rrrr);
                                            ?>
                       
                    
                       
                    
                        <a class="collapse-item" href="pendingwork_chaild2.php">Child Pending Data <span class="badge badge-danger badge-counter"><?php echo $rorwww['cnt']; ?></span></a>
                        <?php 
                                                $qqq1 = "";
                                                $qqq1 = "SELECT count(*) as cnt FROM customers WHERE status='pending' AND type='1' ";
                                                $rrrr1 = mysqli_query($conn,$qqq1);
                                                $rorwww1 = mysqli_fetch_assoc($rrrr1);
                                            ?>
                        <a class="collapse-item" href="pendingworkback.php">Mobile  Applications <span class="badge badge-warning badge-counter"><?php echo $rorwww1['cnt']; ?></span></a>
						
						
                    </div>
                </div>
            </li>
            <?php } ?>
			<?php if($_SESSION['usertype'] == "OPERATOR"){ ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apply"
                    aria-expanded="true" aria-controls="apply">
                    <i class="fas fa-fw fa-folder"></i>
                     <span> Mobile Number <sup><img src="/" alt=""></sup></span>
                </a>
                </a>
                <div id="apply" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">        
                        <a class="collapse-item" href="Mobile_number.php"> Mobile Number Update</a> </a>
                       <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND type='1' AND status='pending'   ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                    
                        <a class="collapse-item" href="customerlist.php">List <span class="badge badge-warning badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                          <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  appliedby='$s_phone' AND type='1' AND status='success'    ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="customerlistsuccess.php">ALL Success <span class="badge badge-success badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  appliedby='$s_phone' AND type='1' AND status='reject'    ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="customerlistreject.php">ALL Reject <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                       
                    
                    </div>
                </div>
            </li> 
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#request"
                    aria-expanded="true" aria-controls="request">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Demo Graphics</span><sup><img src="assets/img/new.gif" alt=""></sup></span>
                </a>
                <div id="request" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <?php 
                        $q = "";
                        $q = "SELECT count(*) as cnt FROM customers WHERE status='pending' and appliedby='".$_SESSION['phone']."'";
                        $rr = mysqli_query($conn,$q);
                        $rorw = mysqli_fetch_assoc($rr);
                        $rorw['cnt'];
                    ?>
                       
                          <a class="collapse-item" href="Name-corection.php">NAME CORRECTION</a>
                        <a class="collapse-item" href="Dob_Change.php">DOB CHANGE</a> </a>
						<a class="collapse-item" href="Gender-Change.php">GENDER CHANGE</a> </a>
						<a class="collapse-item" href="Address-Change.php">ADDRESS CHANGE</a> </a>
                        <?php 
                            $q1 = "";
                            $q1 = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='pending' AND type='2' OR appliedby='$s_phone' AND status='pending' AND type='3' OR appliedby='$s_phone' AND status='pending' AND type='4' OR  appliedby='$s_phone' AND status='pending' AND type='6'";
                            $rr1 = mysqli_query($conn,$q1);
                            $rorw1 = mysqli_fetch_assoc($rr1);
                        ?>
                    
                        <a class="collapse-item" href="democustomerlist.php">List <span class="badge badge-warning badge-counter"><?php echo $rorw1['cnt']; ?></span> </a>
                         <?php 
                            $q2 = "";
                            $q2 = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='success' AND type='2' OR appliedby='$s_phone' AND status='success' AND type='3' OR appliedby='$s_phone' AND status='success' AND type='4' OR  appliedby='$s_phone' AND status='success' AND type='6'";
                            $rr2 = mysqli_query($conn,$q2);
                            $rorw2 = mysqli_fetch_assoc($rr2);
                        ?>
                        <a class="collapse-item" href="demoallsuccess.php">ALL Success <span class="badge badge-success badge-counter"><?php echo $rorw2['cnt']; ?></span> </a>
                        <?php 
                            $q3 = "";
                            $q3= "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='reject' AND type='2' OR appliedby='$s_phone' AND status='reject' AND type='3' OR appliedby='$s_phone' AND status='reject' AND type='4' OR  appliedby='$s_phone' AND status='reject' AND type='6'";
                            $rr3 = mysqli_query($conn,$q3);
                            $rorw3 = mysqli_fetch_assoc($rr3);
                        ?>
                        <a class="collapse-item" href="democustomerlistreject.php">ALL Reject <span class="badge badge-danger badge-counter"><?php echo $rorw3['cnt']; ?></span> </a>
                    </li> 
            
            
             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apply2"
                    aria-expanded="true" aria-controls="apply2">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Child Enrollment <sup><img src="assets/img/new.gif" alt=""></sup></span>
                </a>
                <div id="apply2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<a class="collapse-item" href="Child-Enrollment.php">New Aadhar Apply </a>-->
                        <a class="collapse-item" href="Child-Enrollment.php">New Aadhar Apply </a>
						<?php 
                            $q11 = "";
                            $q11 = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='pending' AND type='5' ";
                            $rr11 = mysqli_query($conn,$q11);
                            $rorw11 = mysqli_fetch_assoc($rr11);
                        ?>
                        <a class="collapse-item" href="customerlist_chaild.php">Child Apply List <span class="badge badge-warning badge-counter"><?php echo $rorw11['cnt']; ?></span> </a>
						<?php 
                            $q22 = "";
                            $q22 = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='success' AND type='5' ";
                            $rr22 = mysqli_query($conn,$q22);
                            $rorw22 = mysqli_fetch_assoc($rr22);
                        ?>
                        <a class="collapse-item" href="customerlistsuccess_chaild.php">ALL Success <span class="badge badge-success badge-counter"><?php echo $rorw22['cnt']; ?></span> </a>
						<?php 
                            $q33 = "";
                            $q33 = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='reject' AND type='5' ";
                            $rr33 = mysqli_query($conn,$q33);
                            $rorw33 = mysqli_fetch_assoc($rr33);
                        ?>
                        <a class="collapse-item" href="customerlistreject_chaild.php">ALL Reject <span class="badge badge-danger badge-counter"> <?php echo $rorw33['cnt']; ?></span> </a>
                    </div>
                </div>
            </li> 
                        
                                                 
    
                        
                    
            
			<?php } ?>
			
            <?php if($_SESSION['userid'] == "ADMIN" OR ""){  ?>

            <div class="sidebar-heading">
               Admin Reports
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report"
                    aria-expanded="true" aria-controls="report">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Admin Reports</span>
                </a>
                <div id="report" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Payment Report</h6>
                            <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE status='pending' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="allpending.php">All Pending Applications <span class="badge badge-warning badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                            <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE status='success' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="allsuccess.php">All Success Applications <span class="badge badge-success badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE status='reject' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="allrejectlist.php">All Reject Applications <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM qrtxn WHERE status='pending' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="uclwalletreport.php">Wallet Report <span class="badge badge-info badge-counter"><?php echo $rorw['cnt']; ?></span></a>
                        
                    </div>
                </div>
            </li>
            <?php } ?>
            <?php if($_SESSION['userid'] == "ADMIN" OR ""){ ?>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting"
                    aria-expanded="true" aria-controls="setting">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   
                        <a class="collapse-item" href="settings.php">Website Setting</a>
                        <a class="collapse-item" href="notifi.php">Send Notification </a>
                    </div>
                </div>
            </li>
            <?php }  ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Drivers</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="https://download.mantratecapp.com/StaticDownload/MFS100Driver_9.2.0.0.exe">Mantra Driver v9.2.0.0</a>
                        <a class="collapse-item" href="https://download.mantratecapp.com/StaticDownload/MFS100ClientService_9.0.3.8.exe">Mantra Client Service v9.0.3.8</a>
                        <a class="collapse-item" href="https://play.google.com/store/apps/details?id=com.mantra.clientmanagement&hl=en_IN&gl=US">Android Client Service v9.0.3.8</a>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Charts -->
          

            <!-- Nav Item - Tables -->
           
            <a class="btn btn-danger" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </form>

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
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM crequest ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                              
                             
                                <a class="dropdown-item text-center small text-gray-500" href="contactquery.php">Show All Alerts</a>
                            </div>
                        </li>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM contact ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                               
                               
                             
                               
                                <a class="dropdown-item d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="query.php">See All  <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span></a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $udata['name']; ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                              
                                <a class="dropdown-item h6 mb-0 font-weight-bold text-gray-800" href="wallet.php">
                                 
                                   ₹ <?php echo $udata['walletamount']?>
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                