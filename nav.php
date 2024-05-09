<!-- Navbar & Hero Start -->
<?php
include('includes/config.php');


?>
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0"><?php echo $ahkweb['name'] ?></h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="index.php" class="nav-item nav-link">Service</a>
                <a href="index.php" class="nav-item nav-link">Project</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="index.php" class="dropdown-item">Our Team</a>
                        <a href="index.php" class="dropdown-item">Testimonial</a>
                        <a href="index.php" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link active">Contact</a>
            </div>
            <a href="login.php" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Login Now!</a>
        </div>
    </nav>

    <div class="container-xxl py-5 bg-primary hero-nav ">
        
            
               
          
    </div>
</div>