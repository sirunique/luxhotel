<?php
	include_once 'header.php';
	include_once "Admin/include/rooms.php";
	include_once "Admin/include/encryption.php";

	$encrypt = new Encryption();
	$rooms = new Rooms();

	$room_id = $encrypt->decode($_GET['room']);
	$room_name = $_GET['name'];
	if ($room_info = $rooms->get_room_info($room_id, $room_name)) {
		// print_r( $room_info);
		$min = date("Y-m-d");
		$max = date('Y-m-d', strtotime($min.'+1 day'));
?>

<div id="colorlib-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-push-5">
				<article class="animate-box">
					<div class="blog-img" style="background-image: url(Admin/images/rooms/<?php echo $room_info[7]?>);"></div>
					<div class="desc">
						<div class="meta">
							<p>
								<span><?php echo $room_info[1]?> </span>
								<span class='get_amount'><?php echo number_format($room_info[4]) ?> </span>
							</p>
						</div>
						<h2>DESCRIPTION</h2>
						<p><?php echo $room_info[2]?></p>
					</div>
				</article>
			</div>

			<!-- Start Here -->
			<div class="col-md-4 col-md-pull-7">
				<!-- Reservation Form Start Here -->
				<div class="reserve_form">
					<div class="aside animate-box">
						<div class='row'>
							<div class='col-md-12'>
								<div class="room_id" style="display:none"> <?php echo $room_info[0]?> </div>
								<div class="room_price" style="display:none"> <?php echo $room_info[4]?> </div>
								<div class="col-md-6 text-left"><h3 class='room_name'><?php echo $room_info[1]?></h3></div>
								<div class="col-md-6 text-right"><h3> &#8358; <?php echo number_format($room_info[4])?></h3></div>
							</div>
						</div>
						<div class='text-center alert alert-danger error_message'></div>
						<form method="post" onsubmit="return false" class="colorlib-form">
						<div class="row">
						<div class="col-md-12">
						<div class="form-group">
							<label for="date">Check-in:</label>
							<div class="form-field">
							<i class="icon icon-calendar2"></i>
							<input type="date" min="<?php echo $min;?>" require='require' class="form-control check_in_date">
							</div>
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
							<label for="date">Check-out:</label>
							<div class="form-field">
							<i class="icon icon-calendar2"></i>
							<input type="date" id="date" min="<?php echo $max; ?>" class="form-control check_out_date" >
							</div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label for="adults">Adults</label>
							<div class="form-field">
							<i class="icon icon-arrow-down3"></i>
							<select name="adult" id="adult" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5+">5+</option>
							</select>
							</div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label for="children">Children</label>
							<div class="form-field">
							<i class="icon icon-arrow-down3"></i>
							<select name="children" id="children" class="form-control">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5+">5+</option>
							</select>
							</div>
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
							<label for="date">Full Name:</label>
							<div class="form-field">
							<i class="icon icon-user"></i>
							<input type="text" id="fullname"  class="form-control " Placeholder="Full Name" >
							</div>
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
							<label for="date">Email:</label>
							<div class="form-field">
							<i class="icon icon-mail"></i>
							<input type="email" id="email"  class="form-control " Placeholder="Email" >
							</div>
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
							<label for="date">Phone:</label>
							<div class="form-field">
							<i class="icon icon-phone"></i>
							<input type="number" id="phone"  class="form-control " Placeholder="Phone Number" >
							</div>
						</div>
						</div>
						<div class="col-md-12">
							<button id="btn-book-now" class='btn btn-primary btn-block btn-book-now'>Book Now </button>
						</div>
					</div>
					</form>
					</div>
				</div>
				<!-- Reservation Form End Here -->

				<!-- Confimation Form Start Here -->	
				<div class="confirm_form">
					<div class="aside animate-box">
						<div class="col-md-12">
							<div class="col-md-6">
								<a href="reserve.php?room= <?php echo $encrypt->encode($room_id); ?> && name=<?php echo $room_name; ?>" class='btn btn-success'><i class="icon-backward"></i> Back</a>
							</div>
						</div>
						<div class='col-md-12'>
							<h3 class='text-center'>Confirm Your Reservation</h3>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h3> <?php echo $room_info[1]?> </h3> </div>
								<div class='col-md-6 text-right'> <h3> &#8358; <?php echo number_format($room_info[4])?> </h3> </div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h4> Check-In Date </h4> </div>
								<div class='col-md-6 text-right'> <h4 class='get_check_in_date'>  </h4> </div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h4> Check-Out Date </h4> </div>
								<div class='col-md-6 text-right'> <h4 class='get_check_out_date'>  </h4> </div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h4>Length of stay </h4> </div>
								<div class='col-md-6 text-right'> <h4><span class='get_days'></span> Days </h4> </div>
							</div>
						</div>
						<div class='col-md-12'>
							<h3 class='text-center'>Guest Information</h3>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h4> Name </h4> </div>
								<div class='col-md-6 text-right'> <h4 class='get_fullname'>  </h4> </div>
							</div>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h4> Email </h4> </div>
								<div class='col-md-6 text-right'> <h4 class='get_email'>  </h4> </div>
							</div>
							<div class='col-md-12'>
								<div class="col-md-6 text-left"> <h4> Phone </h4> </div>
								<div class='col-md-6 text-right'> <h4 class='get_phone'>  </h4> </div>
							</div>
							<div class='col-md-12'>
								<h3 class='text-center'>Payment Schedule</h3>
							</div>
							<div class='col-md-12'>
								<h3 class='text-center'> &#8358;<span class='get_subtotal'></span> </h3>
							</div>
							<div class='col-md-12'>
								<div class="col-md-6"><button class="btn btn-primary btn-block btn_confirm">Reserve</button></div>
								<div class="col-md-6"><button class="btn btn-success btn-block btn_pay_now">Pay Now</button></div>
							</div>
						</div>


						
					</div>	
				</div>
				<!-- End Here -->
			</div>
			<!-- End Here -->

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
				<form class="form-inline qbstp-header-subscribe">
					<div class="row">
						<div class="col-md-12 col-md-offset-0">
							<div class="form-group">
								<input type="text" class="form-control" id="email" placeholder="Enter your email">
								<button type="submit" class="btn btn-primary">Subscribe</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php' ?>
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
<script src="js/app.js"></script>
<script>
$(document).ready(function(){
	
	$('.error_message').hide();
	$('.confirm_form').hide();

	
	$(document).on('click', '.btn-book-now', function(){
		var room_id = $('.room_id')[0].innerText;
		var room_price = $('.room_price')[0].innerText;
		var room_name = $('.room_name')[0].innerText;
		var check_in_date = $('.check_in_date').val();
		var check_out_date = $('.check_out_date').val();
		var adult = $('#adult').val();
		var children = $('#children').val();
		var fullname = $('#fullname').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var amount = $('.get_amount')[0].innerText;
		var date1 = new Date(check_in_date);
		var date2 = new Date(check_out_date);
		var days = Math.floor((date2.getTime() - date1.getTime())/(1000 * 60 * 60 *24));
		var subtotal = room_price * days;

		var data = {'room_id': room_id,'room_price': room_price,'room_name':room_name,'check_in_date':check_in_date, 'check_out_date':check_out_date,
			'adult':adult, 'children':children, 'fullname':fullname,
			'email':email, 'phone':phone, 'amount':amount, 'subtotal':subtotal, 'status':'NO'}

		if( check_in_date=="" || check_out_date=="" || adult=="" || children=="" || fullname=="" || email=="" || phone==""){ 
			$('.error_message').show();
			$('.error_message').html('Input Your Data');
		}
		else if(check_out_date < check_in_date){
			$('.error_message').html('Inavlid Date Selection');
		}else if(check_out_date === check_in_date){
			$('.error_message').html('Inavlid Date Selection');
		}else if(days > 30){
			console.log(days)
			$('.error_message').html('Booking Can Not Exceed 30 Night');
		}else{
			$('.error_message').hide();
			$('.btn-book-now').html('Please Wait .....');
			$('.btn-book-now').attr('disabled', true);
			setTimeout(function(){
				$('.reserve_form').fadeOut('slow',function(){
					$('.get_check_in_date').html(check_in_date);
					$('.get_check_out_date').html(check_out_date);
					$('.get_days').html(days);
					$('.get_fullname').html(fullname);
					$('.get_email').html(email);
					$('.get_phone').html(phone);
					$('.get_subtotal').html(subtotal);
					$('.confirm_form').fadeIn('fast')
				});
			},2000);
		}
		$(document).on('click', '.btn_confirm',function(){
			console.log(data)
			$.ajax({
				url: 'Admin/include/process.php?reserve',
				method: 'POST',
				data:data,
				dataType: 'JSON',
				success: function (data) {
					data.res ==='save'? window.location="index.php":console.log('error');
				}
			});
		})
	})
})
</script>
</body>
</html>


<?php
	}
	else
	{
		header('location:index.php');
	}
?>

