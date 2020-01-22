<?php
include 'header.php';
include_once "Admin/include/gallery.php";

	$gallery = new Gallery();
?>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<!-- <h2>Food be like</h2> -->
				   					<h1>Our Gallery</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Gallery</h2>
					</div>
				</div>
				<div class="row">
					<?php
						$selectdata = Gallery::find_all();
						$countdata = Gallery::count_all();
						for ($i=1; $i <= $countdata; $i++) 
						{ 
							$fetchdata = Gallery::fetch_array($selectdata);
					?>
					<div class="col-md-4 room-wrap animate-box">
						<a href="Admin/images/gallery/<?php echo $fetchdata['image']?>" class="room image-popup-link" style="background-image: url(Admin/images/gallery/<?php echo $fetchdata['image']?>);"></a>
						<div class="desc text-center">
							<h3><?php echo $fetchdata['description']; ?></h3>
							
						</div>
					</div>
					<?php
						}
					?>
				</div>

				

			</div>
		</div>

		<?php include 'footer.php'; ?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

