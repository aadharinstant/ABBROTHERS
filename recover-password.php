<?php
include('includes/config.php');
$success = false;

if(isset($_POST['fsecret']) && $_POST['fsecret'] == "ahkwebsolutions_reset"){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $_SESSION['tmpuser'] = $username;
  $res = mysqli_query($conn,"SELECT * FROM `usertable` WHERE phone='$username' or emailid='$username' or userid='$username' ");
  if(mysqli_num_rows($res)==1){
    $userdata = mysqli_fetch_assoc($res);
    
    $otp = rand(00000,99999);
    $ires = mysqli_query($conn,"UPDATE `usertable` SET `otp`='$otp' WHERE phone='$username' or emailid='$username' or userid='$username' ");
    if($ires){

 // Mail STart From Here

 $mob_no = $userdata['phone'];
 $fromName = $ahkweb['name'];

 $subject_home = "Password Reset OTP ";
 
 
 include('ahkmailer/PHPMailerAutoload.php');
 $msg= "Hello Dear , " . $userdata['name'].  " <br> Your Password Reset OTP is:  "  . $otp. " \n\n <br>Mobile Number is  " .  $mob_no.  "\n\n<br>Username : ".$username .  "<br>";
 
 
  // echo $mlto;
  $mail = new PHPMailer(); 
  //  $mail->SMTPDebug  = 3;
  $mail->IsSMTP(); 
  $mail->SMTPAuth = true; 
  $mail->SMTPSecure = 'tls'; 
  $mail->Host = "smtp.hostinger.com";
  $mail->Port = 587; 
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Username = $emailfrom;
  $mail->Password = $smtp_password;
  $mail->SetFrom($emailfrom,$fromName);
  $mail->Subject = $subject_home;
  $mail->Body =$msg;
  $mail->addAddress($userdata['emailid']);
  $mail->SMTPOptions=array('ssl'=>array(
      'verify_peer'=>false,
      'verify_peer_name'=>false,
      'allow_self_signed'=>false
  ));
  if(!$mail->Send()){
      echo $mail->ErrorInfo;
  }else{
       $success = true;
  }
 
  if($success == true){
    ?>
    <script>
      $(function(){
        Swal.fire(
          'Success!',
          'OTP Sent to Your Email Id!',
          'success'
        )
      });
    </script>
    <?php
  }
  else{
      echo " Mail Not Sent";
  }
  
  // EndMail 
    }


  }else{
    ?>
    <script>
      $(function(){
        Swal.fire(
          'Opps!',
          'Entered Username or email not exist!',
          'error'
        )
      });
      window.setTimeout(function() {
      window.location.href = "forgot-password.php";
      }, 1500);
    </script>
    <?php
  }

}

//Update Password 
if(isset($_POST['preset']) && $_POST['preset'] == "ahkweb_preset"){
  $v_username = mysqli_real_escape_string($conn,$_POST['username']);
  $v_otp = mysqli_real_escape_string($conn,$_POST['v_otp']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
  
  $check = mysqli_query($conn,"SELECT * FROM usertable WHERE userid='$v_username' or emailid='$v_username' or phone='$v_username' ");
  if(mysqli_num_rows($check)==1){
    $data = mysqli_fetch_assoc($check);
    if($v_otp == $data['otp']){
      if($password == $cpassword){
        $vpassword = password_hash($cpassword, PASSWORD_DEFAULT);
        $usql = mysqli_query($conn,"UPDATE usertable SET password='$vpassword', otp='' WHERE userid='$v_username' or emailid='$v_username' or phone='$v_username' ");
        if($usql){
          ?>
          <script>
            $(function(){
              Swal.fire(
                'Success!',
                'Password Reset Successfully! You can Login Now',
                'success'
              )
            });
            window.setTimeout(function() {
  window.location.href = "login.php";
  }, 1500);
          </script>
          <?php
        }
      }else{
        ?>
        <script>
          $(function(){
            Swal.fire(
              'Error!',
              'Confirm Password Not Match!',
              'error'
            )
          });
          window.setTimeout(function() {
  window.location.href = "forgot-password.php";
  }, 1500);
        </script>
        <?php
      }
    }else{
      ?>
      <script>
        $(function(){
          Swal.fire(
            'Opps!',
            'Incorrect OTP!',
            'error'
          )
        });
        window.setTimeout(function() {
  window.location.href = "forgot-password.php";
  }, 1500);
      </script>
      <?php
    }

  }else{
    ?>
    <script>
      $(function(){
        Swal.fire(
          'Opps!',
          'You are Termapring Something in this page Sorry  we cannot proceed!',
          'error'
        )
      });
      window.setTimeout(function() {
  window.location.href = "index.php";
  }, 1500);
    </script>
    <?php
  }
}


// Form Showing 
if($success == true){
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $ahkweb['name'] ?>| Forget- Passwoad</title>
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
    
        <?php include('nav.php');?>
                 
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
       
               
        <!-- Full Screen Search End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="position-relative d-inline text-primary ps-4">Recover Passwoard</h6>
                            <h2 class="mt-2">You are only one step a way from your new password, recover your password now.



</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <form action="recover-password.php" method="POST">
                            <input type="hidden" name="preset" value="ahkweb_preset">
        <input type="hidden" name="username" value="<?php echo $_SESSION['tmpuser']; ?>">
                                <div class="row g-3">
                                   <div class="col-12">
                                        <div class="form-floating"> 
                                            <input type="text" class="form-control" id="v_otp" name="v_otp" placeholder="OTP">
                                            <label for="v_otp">ENTER OTP</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating"> 
                                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                            <label for="password">Passwoard</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating"> 
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                            <label for="cpassword">Confirm Password</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Change password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <?php
include('footer.php');


?>
  <?php

}
?>