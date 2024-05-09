<html>
<?php
include('../includes/config.php');
if ($_SESSION['userid'] != "ADMIN") {
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
<head>
<title>Finger Prints</title>
<link rel="icon" href="https://privacymode.in/assets/images/favicon-32x32.png" type="image/png">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- <script src="jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.panzoom/3.2.2/jquery.panzoom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-mousewheel/1.0.5/mousewheel.js"></script>
<style>
body
{
    background-color : black;
}
    .container{
	/* background-color: #fad109 !important; */
}
#imgdiv
{
    
    height: auto;
    width: 500px;
    padding: 23px;
    margin-left: 20%;
}
.page-header{
	/* box-shadow: 10px 10px 5px #888888; */
}
div#page {
    margin-left: 1em;
    margin-right: 1em;
}
#options{
	margin: 1em 1em 0em 1em;
}
.carousel-control.left,.carousel-control.right{
	background:none !important;
}
#myCarousel img{
	width:100%;
}
.optionBox,#optionHead1,#optionHead2{
	text-align:center;
}
.carousel-inner {
    background-color: black;
}
.buttons{
	width: 6%;
    position: absolute;
    top: 2%;
    left: 4%;
    z-index: 99;
}
.buttons button{
	display:block;
	margin-bottom: 3px;

}
/* CSS REQUIRED */
.state-icon {
    left: -5px;
}
.list-group-item-primary {
    color: rgb(255, 255, 255);
    background-color: rgb(66, 139, 202);
}

/* DEMO ONLY - REMOVES UNWANTED MARGIN */
.well .list-group {
    margin-bottom: 0px;
}

#brightness,#grayscale
{
     width: 300px;
    margin: 15px;
   float:left;
   color:white;
}

@media screen and (min-width: 768px)
{
	.carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {
		margin-left: -45px !important;
	}
	.carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {
		margin-right: -45px !important;
	}
	#options .row:nth-child(1){
		/* margin-bottom:4em; */
	}
}
</style>
</head>

<body>

<div class="container">
	<div id="page">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1 style="color : white">p's Finger Prints</h1>
					<h1 style="color : white"><?php echo $data['aadhaar_no'] ?> Aadhar Number</h1>  
				</div>
			</div>
		</div>
		<div class="row">
		    <div class="col-6">
		        <a href="pendingwork.php" class="btn btn-primary">Back To Dashbaord</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        <button type="button" class="btn btn-outline-info btn-sm increase-brightness">
						<span class="glyphicon glyphicon-plus"></span> Increase Brightness
				</button>
				<button type="button" class="btn btn-outline-info btn-sm decrease-brightness">
					<span class="glyphicon glyphicon-minus"></span> Decrease Brightness
				</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											    		    </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="imgDiv">
						<div class="buttons">
							<button type="button" class=" zoom-out btn btn-default">
								<span class="glyphicon glyphicon-minus"></span>
							</button>
							<button type="button" class=" zoom-in btn btn-default">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
						 </div>
					
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox" style="overflow: hidden;">
							<div class="item active panzoom" style="transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: 50% 50%; cursor: move;">
								<img src="<?php echo $data['finger1'] ?>"class="img-responsive" alt="Dicom" style="padding : 26%; filter: grayscale(-48%);filter: invert(1);--value: 100%;transform: scaleX(-1);" id="fingerprint">
							</div>
							<div class="item panzoom" style="transform: none; transform-origin: 50% 50%; cursor: move;">
							<img src="<?php echo $data['finger2'] ?>"class="img-responsive" alt="Dicom" style="padding : 26%; filter: grayscale(-48%);filter: invert(1);--value: 100%;transform: scaleX(-1);" id="fingerprint">
							</div>
							<div class="item panzoom" style="transform: none; transform-origin: 50% 50%; cursor: move;">
							<img src="<?php echo $data['finger3'] ?>"class="img-responsive" alt="Dicom" style="padding : 26%; filter: grayscale(-48%);filter: invert(1);--value: 100%;transform: scaleX(-1);" id="fingerprint">
							</div>
							<div class="item panzoom" style="transform: none; transform-origin: 50% 50%; cursor: move;">
							<img src="<?php echo $data['finger4'] ?>"class="img-responsive" alt="Dicom" style="padding : 26%; filter: grayscale(-48%);filter: invert(1);--value: 100%;transform: scaleX(-1);" id="fingerprint">
							</div>
							<div class="item panzoom" style="transform: none; transform-origin: 50% 50%; cursor: move;">
							<img src="<?php echo $data['finger5'] ?>"class="img-responsive" alt="Dicom" style="padding : 26%; filter: grayscale(-48%);filter: invert(1);--value: 100%;transform: scaleX(-1);" id="fingerprint">
							</div>
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>		
				<div class="col-md-12" style="text-align:center;margin-top: 1em;margin-bottom: 1em;">
					<button class="reset btn btn-primary">Reset Zoom</button>
				</div>
				
			</div>
		</div>
	</div>	
</div>



<script>
    $(document).ready(function(){
        
        var bLevel = 1;
        $('.increase-brightness').click(function() {
            bLevel += 0.01;
            $(document).find(".img-responsive").css({"-webkit-filter" : "brightness("+bLevel+")"})
        });
        
        $('.decrease-brightness').click(function() {
            bLevel -= 0.01;
            $(document).find(".img-responsive").css({"-webkit-filter" : "brightness("+bLevel+")"})
        });
        
        var cLevel = 1;
        $('.increase-contrast').click(function() {
            cLevel += 0.01;
            $(document).find(".img-responsive").css({"-webkit-filter" : "contrast("+bLevel+")"})
        });
        
        $('.decrease-contrast').click(function() {
            cLevel -= 0.01;
            $(document).find(".img-responsive").css({"-webkit-filter" : "contrast("+bLevel+")"})
        });
    });
    
    
	(function() {
		var $section = $('div').first();
		$section.find('.panzoom').panzoom({
			$zoomIn: $section.find(".zoom-in"),
			$zoomOut: $section.find(".zoom-out"),
			$zoomRange: $section.find(".zoom-range"),
			$reset: $section.find(".reset")
		});

		$('#myCarousel').carousel({
			pause: true,
			interval: false
		});	

	})();
</script></body>

</html>