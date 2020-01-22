<?php
include_once 'header.php';
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
          <li><a class="app-menu__item " href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
          <li><a class="app-menu__item" href="staff.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Staffs</span></a></li>
          <li><a class="app-menu__item " href="staff.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Rooms</span></a></li>
          <li><a class="app-menu__item active" href="reservations.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Reservations</span></a></li>
          <li><a class="app-menu__item " href="lodge.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Lodge</span></a></li>
          <li><a class="app-menu__item " href="payment.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Payment</span></a></li>
          <li><a class="app-menu__item " href="testimonial.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Testimonial</span></a></li>
          <li><a class="app-menu__item " href="service.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Service</span></a></li>
          <li><a class="app-menu__item " href="gallery.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gallery</span></a></li>
      



        </ul>
      </aside>




    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Reservations</h1>
          <p>LuxeHotel Management</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Reservations</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="tile">
            <div class="tile-body">
                <button class="btn btn-primary" id="btn_add_staff">Add Rooms</button>
                <a class="btn btn-primary" href="reservations.php">Refresh</a>
                
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                      $selectdata = Reserve::find_all();
                      $countdata = Reserve::count_all();
                      for($i=1; $i <= $countdata ; $i++) 
                      { 
                        $fetchdata = Reserve::fetch_array($selectdata);
                        
                    ?>
                      <td><?php echo $i;  ?></td>
                      <td><?php echo ucfirst($fetchdata['fullname']);  ?></td>
                      <td><?php echo ucfirst($fetchdata['room_name']);  ?></td>
                      <td><?php echo $fetchdata['check_in_date'];  ?></td>
                      <td><?php echo $fetchdata['check_out_date'];  ?></td>
                      <td><?php echo number_format($fetchdata['subtotal']);  ?></td>
                      <td><?php echo ucfirst($fetchdata['status']);  ?></td>
                      <td><button class="btn btn-primary viewroom" id="<?php echo $fetchdata['id']; ?>" >View </button></td>
                      <td>
                        <?php
                              //payment status
                            if($fetchdata['status'] == "NO")
                            {
                        ?>    
                              <button class="btn btn-danger pay_lodge" id="<?php echo $fetchdata['id']; ?>" >Pay & Lodge </button>
                        <?php    
                            }
                            elseif($fetchdata['status'] == 'YES')
                            {
                        ?>
                              <!-- <button class="btn btn-primary" id="<?php echo $fetchdata['id']; ?>" >Check In </button> -->
                        <?php      
                            }
                        ?>
                        
                    </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                    </table>
                </div>
                
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-4">
            <div class="tile">
              <div class="tile-title">Create Lodge</div>
              <div class="tile-body">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Fullname</label>
                        <input type="text" name="get_name" id="get_name" placeholder="name" class='form-control' disabled>
                        <span class="help-block" id="nameError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Room</label>
                        <input type="text" name="get_room" id="get_room" placeholder="room" class='form-control' disabled>
                        <span class="help-block" id="roomError"></span>
                      </div>
                    </div> 
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="get_email" id="get_email" placeholder="email" class='form-control' disabled>
                        <span class="help-block" id="emailError"></span>
                      </div>
                    </div>
                      
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="number" name="get_phone" id="get_phone" placeholder="phone" class='form-control' disabled>
                        <span class="help-block" id="phoneError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Check In Date</label>
                        <input type="date" name="get_in"  id="get_in" class='form-control' disabled>
                        <span class="help-block" id="inError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Check Out Date</label>
                        <input type="date" name="get_out"   id="get_out" class='form-control' disabled>
                        <span class="help-block" id="outError"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Amount</label>
                        <h2> &#8358; <span class='get_amount' id='get_amount'></span></h2>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Total</label>
                        <h2> &#8358; <span class='get_total' id='get_total'></span></h2>
                      </div>
                    </div>
                            
                  </div>
              </div>
              <div class="tile-footer">
                <div class="row">
                  <input type="hidden" class="get_room_id" id="get_room_id" >
                  <input type="hidden" class="staff_id" value='<?php echo $session->user_id; ?>'>
                  <div class="col-md-6"><button class='btn btn-primary btn_pay_and_lodge'>Pay & Lodge</button></div>
                  <div class="col-md-6"><button class='btn btn-success btn_pay_with_card'>Pay With Card</button></div>
                </div>
              </div>
            </div>
        </div>

      </div>

    </main>

     <!--Add staff Modal Start Here-->
     <!-- <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Name:</label>
                            <input type="text" class="form-control" name="room_name" id="room_name" placeholder="Name">
                            <span class="help-block" id="nameError"></span>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Price:</label>
                            <input type="number" class="form-control" name="room_price" id="room_price" placeholder="Price">
                            <span class="help-block" id="priceError"></span>
                          </div>
                      </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff_category">Duration:</label>
                            <select class="form-control" name="room_duration" id="room_duration">
                               <option value="per night">Per Night</option>
                             </select>
                             <span class="help-block" id="error"></span>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Total Room:</label>
                            <input type="number" class="form-control" min="1"  name="room_total" id="room_total" placeholder="Total">
                            <span class="help-block" id="priceError"></span>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Description:</label>
                           <textarea class="form-control" name="room_description"  id="room_description" cols="10" rows="10"></textarea>
                            <span class="help-block" id="priceError"></span>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Image:</label>
                            <input type="file" class="form-control" name="room_image" id="room_image" placeholder='Staff Password'>
                            <span class="help-block" id="passwordError"></span>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer" >   
                <button class="btn btn-primary" type="button" id="btnaddRoom" >Add Room</button> 
              </div>
                     

            </div>
          </div>
      </div> -->

    <!--View Book Modal Start Here-->
    <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservation Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Name:</label>
                            <input type="text" class="form-control" name="get_reserve_name" id="get_reserve_name" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Email:</label>
                            <input type="text" class="form-control" name="get_reserve_email" id="get_reserve_email" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Room:</label>
                            <input type="text" class="form-control" name="get_reserve_room" id="get_reserve_room" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Price:</label>
                            <input type="number" class="form-control" name="get_reserve_price" id="get_reserve_price" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Check In Date:</label>
                            <input type="text" class="form-control" name="get_reserve_in" id="get_reserve_in" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Check Out Date:</label>
                            <input type="text" class="form-control" name="get_reserve_out" id="get_reserve_out" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Adult:</label>
                            <input type="text" class="form-control" name="get_reserve_adult" id="get_reserve_adult" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Children:</label>
                            <input type="text" class="form-control" name="get_reserve_child" id="get_reserve_child" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Payment Status:</label>
                            <input type="text" class="form-control" name="get_reserve_status" id="get_reserve_status" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Sub-Total:</label>
                            <input type="text" class="form-control" name="get_reserve_total" id="get_reserve_total" readonly>
                          </div>
                      </div>

                  </div>
              </div>
            </div>
          </div>
      </div>



    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
        <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

     <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');


      }
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

      $(document).ready(function(){
          $("#btn_add_staff").click(function(){
             $("#add_modal").modal("show");
          });

          $('#btnaddRoom').click(function(){
              var formData = new FormData();
              var room_image = document.getElementById('room_image');
              var file = room_image.files[0];
                formData.append('image', file); 


              var room_name = $('#room_name').val();
                formData.append('room_name', room_name); 

              var room_price = $('#room_price').val();
                formData.append('room_price', room_price); 

              var room_duration = $('#room_duration').val();
                formData.append('room_duration', room_duration); 

              var room_total = $('#room_total').val();
                formData.append('room_total', room_total); 

              var room_description = $('#room_description').val();
                formData.append('room_description', room_description);

              var room_image = document.getElementById('room_image').files[0].name;
                formData.append('room_image', room_image); 

              $.ajax({
                  url:'include/process.php',
                  type:'POST',
                  data:formData,
                  processData:false,
                  contentType:false,
                  success:function(data){
                    $("#add_modal").modal("hide");
                    window.location ='rooms.php';
                  }
              })
         });

         $('.viewroom').click(function(){
             var room_id = $(this).attr('id');
              $.ajax({
              url:'include/process.php?view_reserve',
              method:'POST',
              data:{'room_id':room_id},
              dataType:'JSON',
              success:function(data){
                $('#get_reserve_name').val(data.fullname);
                $('#get_reserve_email').val(data.email);
                $('#get_reserve_room').val(data.room_name);
                $('#get_reserve_price').val(data.room_price);
                $('#get_reserve_in').val(data.check_in_date);
                $('#get_reserve_out').val(data.check_out_date);
                $('#get_reserve_adult').val(data.adult);
                $('#get_reserve_child').val(data.children);
                $('#get_reserve_status').val(data.status);
                $('#get_reserve_total').val(data.subtotal);

                $('#view_modal').modal('show');
              }
            })
         })

         $('.pay_lodge').click(function(){
           var room_id = $(this).attr('id');
           $.ajax({
              url:'include/process.php?view_reserve',
              method:'POST',
              data:{'room_id':room_id},
              dataType:'JSON',
              success:function(data){
              //  console.log(data)
               $('#get_name').val(data.fullname);
               $('#get_room').val(data.room_name);
               $('#get_email').val(data.email);
               $('#get_room').val(data.room_name);
               $('#get_phone').val(data.phone);
               $('#get_room').val(data.room_name);
               $('#get_in').val(data.check_in_date);
               $('#get_out').val(data.check_out_date);
               $('#get_room_id').val(data.room_id);
               $('#get_amount').html(data.room_price);
               $('#get_total').html(data.subtotal);

              }
            })
         })

         $('.btn_pay_and_lodge').on('click', function(){
          var staff_id = $('.staff_id').val();
          var name = $('#get_name').val();
          var room = $('#get_room_id').val();
          var email = $('#get_email').val();
          var phone = $('#get_phone').val();
          var check_in_date = $('#get_in').val();
          var check_out_date = $('#get_out').val();
          var amount = document.getElementsByClassName('get_total')[0].innerText
          data = {'staff_id':staff_id,'name':name, 'room':room, 'phone':phone,'email':email,'check_in_date':check_in_date,
            'check_out_date':check_out_date,'amount':amount,'payment_type':'Cash'};
          // console.log(data)
          $.ajax({
               url:'include/process.php?create_lodge2',
               method:'POST',
               data:data,
               dataType:'JSON',
               success:function(data){
                  if (data.res ==='save') {
                    // update reserve payment status to YES
                    window.location = 'lodge.php';
                  }else if(data.res === 'error'){
                    alert('Try Again.....')
                    window.location = 'dashboard.php'
                  }
               }
            })
        })



          
      });
    </script>
  </body>
</html>