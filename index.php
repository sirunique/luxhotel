<?php
	include_once 'header.php';
	include_once "Admin/include/rooms.php";
	include_once "Admin/include/encryption.php";
	include_once "Admin/include/testimonial.php";

	$testmonial = new Testmonial();

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
				   				<div class="slider-text-inner text-center">
				   					<h2>Welcome to Tom Hotel And Suites</h2>
				   					<h1>A Luxury Hotel</h1>
										<p><a class="btn btn-primary btn-demo" href="#"></i> View Detail</a> <a class="btn btn-primary btn-learn">Know More</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Discover &amp; Enjoy</h2>
				   					<h1>Everything you need in Tom Hotel And Suite</h1>
										<p><a class="btn btn-primary btn-demo" href="#"></i> View Detail</a> <a class="btn btn-primary btn-learn">Know More</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>You are invited</h2>
				   					<h1>We know how to please you</h1>
										<p><a class="btn btn-primary btn-demo" href="#"></i> View Detail</a> <a class="btn btn-primary btn-learn">Know More</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Come &amp; enjoy the unforgetable nights</h2>
				   					<h1>In the heart of luxehotel</h1>
										<p><a class="btn btn-primary btn-demo" href="#"></i> View Detail</a> <a class="btn btn-primary btn-learn">Know More</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	   	
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-reservation">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-wrap">
						<form method="post" class="colorlib-form">
		              	<div class="row">
		                <div class="col-md-3">
		                  <div class="form-group">
		                    <label for="date">Check-in:</label>
		                    <div class="form-field">
		                      <i class="icon icon-calendar2"></i>
		                      <input type="text" id="date" class="form-control date" placeholder="Check-in date">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3">
		                  <div class="form-group">
		                    <label for="date">Check-out:</label>
		                    <div class="form-field">
		                      <i class="icon icon-calendar2"></i>
		                      <input type="text" id="date" class="form-control date" placeholder="Check-out date">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <div class="form-group">
		                    <label for="adults">Adults</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
		                      <select name="people" id="people" class="form-control">
		                        <option value="#">1</option>
		                        <option value="#">2</option>
		                        <option value="#">3</option>
		                        <option value="#">4</option>
		                        <option value="#">5+</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <div class="form-group">
		                    <label for="children">Children</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
		                      <select name="people" id="people" class="form-control">
		                        <option value="#">1</option>
		                        <option value="#">2</option>
		                        <option value="#">3</option>
		                        <option value="#">4</option>
		                        <option value="#">5+</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <input type="submit" name="submit" id="submit" value="Search" class="btn btn-primary btn-block">
		                </div>
		              </div>
		            </form>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-services">
			<div class="container">
				<div class="row">
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-reception"></i>
							</span>
							<h3>24/7 Front Desk</h3>
							<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-herbs"></i>
							</span>
							<h3>Spa Suites</h3>
							<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-car"></i>
							</span>
							<h3>Transfer Services</h3>
							<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-cheers"></i>
							</span>
							<h3>Restaurant &amp; Bar</h3>
							<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Rooms &amp; Suites</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">
							<?php
								$selectdata = Rooms::find_all();
								$countdata = Rooms::count_all();
								for($i=1; $i <= $countdata ; $i++) 
								{ 
									$fetchdata = Rooms::fetch_array($selectdata);
							?>
								<div class="item">
									<a href="Admin/images/rooms/<?php echo $fetchdata['image']?>" class="room image-popup-link" style="background-image: url(Admin/images/rooms/<?php echo $fetchdata['image']?>);"></a>
									<div class="desc text-center">
										<!-- <span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> -->
										<h3><a href="reserve.php?room= <?php echo $encrypt->encode( $fetchdata['id']); ?> && name=<?php echo $fetchdata['name']; ?>"><?php echo $fetchdata['name'] ?></a></h3>
										<p class="price">
											<span class="currency">N</span>
											<span class="price-room"><?php echo number_format($fetchdata['price'])?></span>
											<span class="per">/ <?php echo $fetchdata['duration']  ?></span>
										</p>
										<ul>
											<li><i class="icon-check"></i> Only 10 rooms are available</li>
											<li><i class="icon-check"></i> Breakfast included</li>
											<li><i class="icon-check"></i> Price does not include VAT &amp; services fee</li>
										</ul>
										<p><a class="btn btn-primary" href="reserve.php?room= <?php echo $encrypt->encode( $fetchdata['id']); ?> && name=<?php echo $fetchdata['name']; ?>" >Book now!</a></p>
									</div>
								</div>
							<?php
								}
							?>

						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<a href="rooms-suites.php" class='btn btn-primary'>View all rooms <i class="icon-arrow-right3"></i></a>
					</div>
				</div>
			</div>
		</div>


		<div id="colorlib-dining-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Dining &amp; Bar</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="diningbar-flex">
						<div class="half animate-box">
							<ul class="nav nav-tabs text-center" role="tablist">
								<li role="presentation" class="active"><a href="#mains" aria-controls="mains" role="tab" data-toggle="tab">Mains</a></li>
								<li role="presentation"><a href="#desserts" aria-controls="desserts" role="tab" data-toggle="tab">Desserts</a></li>
								<li role="presentation"><a href="#drinks" aria-controls="drinks" role="tab" data-toggle="tab">Drinks</a></li>
							</ul>
			            <!-- Tab panes -->
			            <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="mains">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="images/menu-1.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.99</span>
							                  <h3>Grilled Pork</h3>
							                  <p class="cat">Meat / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-2.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$40.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-4.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="desserts">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="images/menu-1.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$39.90</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$50.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-4.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.00</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="drinks">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="images/menu-8.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.00</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-9.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-4.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.99</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>
			            </div>
			         </div><!-- end half -->
			         <div class="half diningbar-img" style="background-image: url(images/cover_img_1.jpg);"></div><!-- end half -->
			      </div>
			   </div>
	      </div>
		</div>


		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Our Satisfied Guests says</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">
							<?php
								$selectdata = Testmonial::find_all();
								$countdata = Testmonial::count_all();
								for($i=1; $i <= $countdata ; $i++) 
								{ 
									$fetchdata = Testmonial::fetch_array($selectdata);
							?>
								<div class="item">
									<a href="Admin/images/testimonials/<?php echo $fetchdata['image']?>" class="room image-popup-link img-rounded" style="background-image: url(Admin/images/testimonials/<?php echo $fetchdata['image']?>); border-radius: 6px; "></a>
									<div class="desc text-center">
										<h3><?php echo $fetchdata['name'] ?></h3>
										<blockquote>
											<p> <?php echo $fetchdata['description'] ?></p>
										</blockquote>
										
									</div>
								</div>
							<?php
								}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>


	
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Sign Up for a Newsletter</h2>
						<p>Get A 50% Discounts in every Rooms, Book now!</p>
						<form method='post' action='Admin/include/process.php?newsletter' class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary">Subscribe</button>
									</div>
								</div>
							</div>
						</form>
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

</html>

