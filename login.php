<?php 
if(!isset($_SESSION))
{ 
    session_start(); 
} 
include('includes/config.php');
if(isset($_SESSION['loggedin']) == true){
  ?>
  <script> 
  window.setTimeout(function() {
  window.location.href = "admin";
  }, 1500);
  </script>
  
    <?php
}  
if(isset($_POST['secret']) && $_POST['secret'] == "ahkwebsolutions" && !empty($_POST['username']) && !empty($_POST['password'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $type = mysqli_real_escape_string($conn,$_POST['type']);
  $res = mysqli_query($conn,"SELECT * FROM `usertable` WHERE phone='$username'  OR emailid='$username' OR userid='$username'  ");
  $userdata = mysqli_fetch_assoc($res);
  if($userdata['usertype']==$type){
  if(mysqli_num_rows($res) == 1 ){
    
    $vpass = password_verify($password,$userdata['password']);
    if($vpass){
      if($userdata['status'] == "verified"){
        
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        ?>
			<script>
				$(function(){
					Swal.fire(
						'Success!',
						'You Are Logged In Successfully!',
						'success'
					)
				});
			</script>
			<?php
      
      $_SESSION['loggedin'] = true;
      $_SESSION['userid'] = $userdata['userid'];
      $_SESSION['name'] = $userdata['name'];
      $_SESSION['emailid'] = $userdata['emailid'];
      $_SESSION['phone'] = $userdata['phone'];
      $_SESSION['walletamount'] = $userdata['walletamount'];
      $_SESSION['usertype'] = $userdata['usertype'];
     
      ?>
      <script>
      window.setTimeout(function() {
      window.location.href = "admin";
      }, 1500);
      </script>
      
        <?php  } else { ?>
        <script>
          $(function(){
            Swal.fire(
              'Opps!',
              'Your Account is Blocked or inactive Please Contact With Admin',
              'error'
            )
          });
        </script>
        <?php } }else{ ?>
      <script>
        $(function(){
          Swal.fire(
            'Opps!',
            'Password Wrong!',
            'error'
          )
        });
      </script>
      <?php } }else{ ?>
    <script>
      $(function(){
        Swal.fire(
          'Opps!',
          'Entered username Wrong or Not Exist',
          'error'
        )

      });

    </script>
    <?php } } else { ?> 
  <script>
      $(function(){
        Swal.fire(
          'Opps!',
          'Please, Select Your Correct User Type',
          'error'
        )

      });

    </script>
  <?php } } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $ahkweb['name'] ?>| AADHAR</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">.</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <?php  include('nav.php'); ?>
        
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
         
         <div class="row g-5">
       
             <div class="col-lg-6 wow shake" data-wow-delay="0.1s">
                 <div class="section-title position-relative mb-4 pb-2">
                    
                     <h6 class="position-relative text-primary ps-4">Welcome To Aadhar</h6>
                     <h2 class="mt-2">Login Now </h2>

                     
                 </div>
                
                 <form action="" method="POST">
                         <div class="row g-3">
							<div class="col-12">
                                <div class="form-floating">
                                     <select class="form-control" id="type" name="type" />
                                     <option value="OPERATOR">Retailer</option>
									 <option value="ADMIN">Admin</option>
									 <option value="SUPER ADMIN">Distributor</option>
									 <option value="BACKOFFICE">Back Office</option>
									 </select>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                 <input type="hidden" name="secret" value="ahkwebsolutions">
                                     <input type="text" class="form-control"  id="username" name="username" placeholder="sername, phone, emailid">
                                     <label for="username">Your User ID</label>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <input type="password" class="form-control"  id="password" name="password" placeholder="password">
                                     <label for="password">Password</label>
                                 </div>
                             </div>
                           
                             <div class="col-12">
                                 <button class="btn btn-success w-100 py-3" type="submit">Login</button>
                             </div>
                         </div>
                     </form>
                     
                    <!-- <div class="col-12">
                                 
                                 <a class="btn btn-warning w-100 py-3" href="forgot-password.php"> I Forget My Passwoard !</a>
                                </div> -->
                             
                     
                     <div class="d-flex align-items-center mt-4">
                     
                 </div>
               
                 </div>
                 <div class="col-lg-6">
                 <img class="img-fluid wow zoomIn" class="floating-center"data-wow-delay="0.5s" src="img/about.jpg">
             </div>
                
        <!-- Contact End -->
        

        <?php include('footer.php'); ?>

        <!-- Footer Start -->
       