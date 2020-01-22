<?php
	include_once 'header.php';
	include_once "Admin/include/rooms.php";
	include_once "Admin/include/encryption.php";

	$encrypt = new Encryption();
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
				   					<h2>Choose our Best</h2>
				   					<h1>Rooms &amp; Suites</h1>
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
					<?php
						$selectdata = Rooms::find_available();
						$countdata = Rooms::count_available();
						for($i=1; $i <= $countdata ; $i++) 
						{ 
							$fetchdata = Rooms::fetch_array($selectdata);
					?>
						<div class="col-md-4 room-wrap animate-box">
							<a href="Admin/images/rooms/<?php echo $fetchdata['image']?>" class="room image-popup-link" style="background-image: url(Admin/images/rooms/<?php echo $fetchdata['image'] ?>);"></a> <!-- images/room-1.jpg -->
							<div class="desc text-center">
								<!-- <span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> -->
								<h3><a href="reserve.php?room= <?php echo $encrypt->encode( $fetchdata['id']); ?> && name=<?php echo $fetchdata['name']; ?>"><?php echo $fetchdata['name'] ?></a></h3>
								<p class="price">
									<span class="currency">N</span>
									<span class="price-room"><?php echo number_format($fetchdata['price']) ?></span>
									<span class="per">/ <?php echo $fetchdata['duration'] ?></span>
								</p>
								<ul>
									<li><i class="icon-check"></i> Only 10 rooms are available</li>
									<li><i class="icon-check"></i> Breakfast included</li>
									<li><i class="icon-check"></i> Price does not include VAT &amp; services fee</li>
								</ul>
								<p><a class="btn btn-primary" href="reserve.php?room= <?php echo $encrypt->encode( $fetchdata['id']); ?> && name=<?php echo $fetchdata['name']; ?>" >Book now!</a></p>
								<!-- <p><a class="btn btn-primary">Book now!</a></p> -->
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
	<script src="js/app.js"></script>
	</body>
</html>

