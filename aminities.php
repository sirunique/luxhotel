<?php
include 'header.php';
include_once "Admin/include/service.php";

	$service = new Service();
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
				   					<h2>Accomodation</h2>
				   					<h1>Our Services</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-amenities">
			<div class="container">
				<div class="row">
					<div class="amenities-flex">
						<?php
							$selectdata = Service::find_all();
							$countdata = Service::count_all();
							for ($i=1; $i <= $countdata; $i++) 
							{ 
								$fetchdata = Service::fetch_array($selectdata);
						?>
							<div class="amenities-img animate-box" style="background-image: url(Admin/images/services/<?php echo $fetchdata['image']?>);"></div>
							<div class="desc animate-box">
								<h2><a href="#"><?php echo $fetchdata['name']; ?></a></h2>
								<!-- <p class="price">
									<span class="free">Free</span>
								</p> -->
								<p><?php echo $fetchdata['description']; ?></p>
							</div>
						<?php
							}
						?>
					</div>
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
	<script src="js/app.js"></script>
	</body>
</html>

