<?php
include 'header.php';
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
										<h2>Get in touch</h2>
										<h1>Contact Us</h1>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Contact Information</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location-2"></i></span> 7 Tunde Odeyemi Street, <br> Off Igando Road Behind Vitality Filling Station Bakare Bus Stop <br> Ikotun Lagos</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://+2347061974883">+234-706-197-4883</a></p>
							</div>
							<div class="col-md-6">
								<p><span><i class="icon-paperplane"></i></span> <a
										href="mailto:reservation@tomhotelandsuites.com">reservation@tomhotelandsuites.com</a></p>
							</div>
							<!-- <div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#">luxehotel.com</a></p>
							</div> -->
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Get In Touch</h3>
						<form action="Admin/include/process.php?contact" method="post" auto-complete='off'>
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">First Name</label>
									<input type="text" name="fname" class="form-control" placeholder="Your firstname" required>
								</div>
								<div class="col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" name="lname" class="form-control" placeholder="Your lastname" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control" placeholder="Your email address" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Subject</label>
									<input type="text" name="subject" class="form-control" placeholder="Your subject of this message" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Message</label>
									<textarea name="message" name="message" cols="30" rows="10" class="form-control" placeholder="Say something about us" required></textarea>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="map" class="colorlib-map"></div>

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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false">
	</script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script src="js/app.js"></script>
</body>

</html>