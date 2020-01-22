<?php
include_once 'header.php';


$min = date("Y-m-d");
$max = date('Y-m-d', strtotime($min.'+1 day'));
?>
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="staff.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Staffs</span></a></li>
        <li><a class="app-menu__item" href="rooms.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Rooms</span></a></li>
        <li><a class="app-menu__item" href="reservations.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Reservations</span></a></li>
        <li><a class="app-menu__item" href="lodge.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Lodge</span></a></li>
        <li><a class="app-menu__item " href="payment.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Payment</span></a></li>
        <li><a class="app-menu__item" href="testimonial.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Testimonial</span></a></li>
        <li><a class="app-menu__item" href="service.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Service</span></a></li>
        <li><a class="app-menu__item " href="gallery.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gallery</span></a></li>
      </ul>
    </aside>


    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>LuxeHotel Management</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
        
      <div class="row">
        <div class="col-md-6 col-lg-6">
          <div class="row">

            <div class="col-md-6 col-lg-6">
              <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <a href="lodge.php">
                    <h4>Lodge</h4>
                      <p><b><?php echo Lodge::count_all(); ?></b></p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                  <a href="reservations.php">
                    <h4>Reservation</h4>
                      <p><b><?php echo Reserve::count_all();  ?></b></p>
                  </a>
                </div>
              </div>
            </div>
            
            

          </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="tile">
              <div class="tile-title">Create Lodge</div>
              <div class="tile-body">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Fullname</label>
                        <input type="text" name="name" id="name" placeholder="name" class='form-control'>
                        <span class="help-block" id="nameError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Room</label>
                        <select name="room" id="room" class='form-control'>
                          <option value="" selected>select room</option>
                          <?php
                            $selectdata = $rooms->find_available();
                            $countdata = Rooms::count_available();
                            for($i=1; $i <= $countdata ; $i++) 
                            { 
                              $fetchdata = Rooms::fetch_array($selectdata);
                          ?>
                          <option value="<?php echo ucfirst($fetchdata['id']);?>" price='<?php echo $fetchdata['price'];?>'><?php echo ucfirst($fetchdata['name']); ?>  [<?php echo number_format($fetchdata['price']);?>]</option>
                            <?php } ?>
                        </select>
                        <span class="help-block" id="roomError"></span>
                      </div>
                    </div> 
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" id="email" placeholder="email" class='form-control'>
                        <span class="help-block" id="emailError"></span>
                      </div>
                    </div>
                      
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="number" name="phone" id="phone" placeholder="phone" class='form-control'>
                        <span class="help-block" id="phoneError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Check In Date</label>
                        <input type="date" name="check_in_date" min='<?php echo $min; ?>' id="check_in_date" class='form-control '>
                        <span class="help-block" id="inError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Check Out Date</label>
                        <input type="date" name="check_out_date" min='<?php echo $max; ?>'  id="check_out_date" class='form-control '>
                        <span class="help-block" id="outError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Amount</label>
                        <h2> &#8358; <span class='get_amount'></span></h2>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Total</label>
                        <h2> &#8358; <span class='get_total'></span></h2>
                      </div>
                    </div>
                            
                  </div>
              </div>
              <div class="tile-footer">
                <div class="row">
                  <input type="hidden" class="staff_id" value='<?php echo $session->user_id; ?>'>
                  <div class="col-md-6"><button class='btn btn-primary btn_pay_and_lodge'>Pay & Lodge</button></div>
                  <div class="col-md-6"><button class='btn btn-success btn_pay_with_card'>Pay With Card</button></div>
                </div>
              </div>
            </div>
        </div>
      </div>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);

      $("#startdate").datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });

        $("#enddate").datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });

      $('.datepicker').datepicker();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    <script>
      // $('#name').on('keyup',function(){
      //   if(this.value ===""){
      //     $('#nameError').html('Enter Name').addClass('text-danger');
      //     console.log('empty')
      //   }
      //   else{
      //     console.log(this.value)
      //   }
      // })

      $('#room').on('change',function(){
        if(this.value ===""){
          $('.get_amount').html("")
          $('#roomError').html('Select Room').addClass('text-danger');
          $('.btn_pay_and_lodge').attr('disabled',true);
            $('.btn_pay_with_card').attr('disabled', true);
        }else{
          $('#roomError').html("")
          $('.btn_pay_and_lodge').attr('disabled',false);
            $('.btn_pay_with_card').attr('disabled', false);
          var room_id = this.value;
          $.ajax({
             url:'include/process.php?get_room_with_id',
             method:'POST',
             data:{'room_id':room_id},
             dataType:'JSON',
             success:function(data){
              $('.get_amount').html(data.price);
             }
          })
        }
      })

      $('#check_in_date').on('change', function(){
        if(this.value ===""){
          $('#inError').html('Select Check In Date').addClass('text-danger');
          $('.btn_pay_and_lodge').attr('disabled',true);
            $('.btn_pay_with_card').attr('disabled', true);
        }else{
          $('#inError').html('')
          $('.btn_pay_and_lodge').attr('disabled',false);
            $('.btn_pay_with_card').attr('disabled', false);
        }
      })

      $('#check_out_date').on('change', function(){
        if(this.value ===""){
          $('#outError').html('Select Check In Date').addClass('text-danger');
          $('.btn_pay_and_lodge').attr('disabled',true);
            $('.btn_pay_with_card').attr('disabled', true);
        }else{
          $('#outError').html('')
          var indate = $('#check_in_date').val();
          var outdate = this.value;
          if(indate > outdate){
            $('#outError').html('Invalid Date Selection').addClass('text-danger');
            $('.btn_pay_and_lodge').attr('disabled',true);
            $('.btn_pay_with_card').attr('disabled', true);
          }else if(indate === outdate){
            $('#outError').html('Invalid Date Selection').addClass('text-danger');
            $('.btn_pay_and_lodge').attr('disabled',true);
            $('.btn_pay_with_card').attr('disabled', true);
          }else{
            var price = document.getElementsByClassName('get_amount')[0].innerText
            var date1 = new Date(indate);
            var date2 = new Date(outdate);
            var days = Math.floor((date2.getTime() - date1.getTime())/(1000 * 60 * 60 *24));
            var subtotal = price * days;
            $('.get_total').html(subtotal)
            $('.btn_pay_and_lodge').attr('disabled',false);
            $('.btn_pay_with_card').attr('disabled', false);
          }
        }
      })

      $('.btn_pay_and_lodge').on('click', function(){
        var staff_id = $('.staff_id').val();
        var name = $('#name').val();
        var room = $('#room').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var check_in_date =$('#check_in_date').val();
        var check_out_date = $('#check_out_date').val();
        var amount = document.getElementsByClassName('get_total')[0].innerText
        if(name ===""){
          $('#nameError').html('Customer Name').addClass('text-danger')
        }else if(room ===''){
          $('#nameError').html('')
          $('#roomError').html('Select Room').addClass('text-danger');
        }else if(email ===''){
          $('#emailError').html('Customer Email').addClass('text-danger');
        }
        else if(phone ===''){
          $('#emailError').html('')
          $('#phoneError').html('Customer Phone').addClass('text-danger');
        }
        else if(check_in_date ===''){
          $('#phoneError').html('')
          $('#inError').html('Select Check In Date').addClass('text-danger');
        }
        else if(check_out_date ===''){
          $('#outError').html('Select Check Out Date').addClass('text-danger');
        }
        else{
          data = {'staff_id':staff_id,'name':name, 'room':room, 'phone':phone,'email':email,'check_in_date':check_in_date,
          'check_out_date':check_out_date,'amount':amount,'payment_type':'Cash'};
             console.log(data)
             $.ajax({
             url:'include/process.php?create_lodge',
             method:'POST',
             data:data,
             dataType:'JSON',
             success:function(data){
               console.log(data)
                if (data.res ==='save') {
                  window.location = 'lodge.php';
                }else if(data.res === 'error'){
                  alert('Try Again.....')
                  window.location = 'dashboard.php'
                }
             }
          })
        }
        
      
      })
      
    </script>
  </body>
</html>