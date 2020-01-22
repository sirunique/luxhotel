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
          <li><a class="app-menu__item" href="reservations.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Reservations</span></a></li>
          <li><a class="app-menu__item active" href="lodge.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Lodge</span></a></li>
          <li><a class="app-menu__item " href="payment.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Payment</span></a></li>
          <li><a class="app-menu__item " href="testimonial.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Testimonial</span></a></li>
          <li><a class="app-menu__item " href="service.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Service</span></a></li>
          <li><a class="app-menu__item" href="gallery.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gallery</span></a></li>      




        </ul>
      </aside>




    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lodge</h1>
          <p>LuxeHotel Management</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lodge</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <button class="btn btn-primary" id="btn_add_staff">Create Lodge</button>
                <a class="btn btn-primary" href="lodge.php">Refresh</a>
                
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Paid</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                      $selectdata = Lodge::find_all();
                      $countdata = Lodge::count_all();
                      for($i=1; $i <= $countdata ; $i++) 
                      { 
                        $fetchdata = Lodge::fetch_array($selectdata);
                        
                    ?>
                      <td><?php echo $i;  ?></td>
                      <td><?php echo ucfirst($fetchdata['name']);  ?></td>
                      <td><?php echo ucfirst($fetchdata['room_id']);  ?></td>
                      <td><?php echo number_format($fetchdata['amount']);  ?></td>
                      <td><?php echo $fetchdata['check_in_date'];  ?></td>
                      <td><?php echo $fetchdata['check_out_date'];  ?></td>
                      <td><?php echo ucfirst($fetchdata['status']);  ?></td>
                      <td>
                        <button class="btn btn-primary view_lodge" id="<?php echo $fetchdata['id']; ?>" >View </button>
                        <?php
                            if($fetchdata['status'] != 'Check Out'){?>
                              <button class="btn btn-danger check_out" id="<?php echo $fetchdata['id']; ?>" >Check Out </button>
                        <?php } ?>
                        
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
                <h5 class="modal-title" id="exampleModalLabel">Lodge Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Name:</label>
                            <input type="text" class="form-control" name="get_lodge_name" id="get_lodge_name" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Email:</label>
                            <input type="emsil" class="form-control" name="get_lodge_email" id="get_lodge_email" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Phone:</label>
                            <input type="text" class="form-control" name="get_lodge_phone" id="get_lodge_phone" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Room:</label>
                            <input type="text" class="form-control" name="get_lodge_room" id="get_lodge_room" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Check In Date:</label>
                            <input type="text" class="form-control" name="get_lodge_check_in_date" id="get_lodge_check_in_date" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Check Out Date:</label>
                            <input type="text" class="form-control" name="get_lodge_check_out_date" id="get_lodge_check_out_date" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Check In Time:</label>
                            <input type="text" class="form-control" name="get_lodge_check_in_time" id="get_lodge_check_in_time" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Check Out Time:</label>
                            <input type="text" class="form-control" name="get_lodge_check_out_time" id="get_lodge_check_out_time" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Amount:</label>
                            <input type="number" class="form-control" name="get_lodge_amount" id="get_lodge_amount" readonly>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Status:</label>
                            <input type="text" class="form-control"   name="get_lodge_status" id="get_lodge_status" readonly>
                          </div>
                      </div>

                  </div>
              </div>
            </div>
          </div>
      </div>

    <!-- Delete worker Modal Start Here-->
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Check Out Room?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Are You Sure You To Check Out <font color="red"> <label id="name"></label> </font>  </div>
                    <div class="modal-footer">
                    <input type="hidden" id="uid" />
                      <input type="hidden" name="staff_id" id="staff_id" value="<?php echo $session->user_id; ?>">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancle</button>
                      <button id="btn_checkout" class="btn btn-danger"> Check Out</a>
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

         $('.check_out').click(function(){
           var lodge_id = $(this).attr('id');
           $.ajax({
             url:'include/process.php?view_lodge',
             method:'POST',
             data:{'lodge_id':lodge_id},
             dataType:'JSON',
             success:function(data){
              $("#name").html(data.name);
              $("#btn_checkout").val(data.id);
              $("#delete_modal").modal("show");
             }
           })
          })

         $('#btn_checkout').click(function(){
            var lodge_id = $('#btn_checkout').val();
            var staff_id = $('#staff_id').val();
              $.ajax({
              url:'include/process.php?check_out',
              method:'POST',
              data:{'lodge_id':lodge_id, 'staff_id':staff_id},
              dataType:'JSON',
              success:function(data){
                window.location ='lodge.php';
              }
            })
         })

         $('.view_lodge').click(function(){
             var lodge_id = $(this).attr('id');
              $.ajax({
              url:'include/process.php?view_lodge',
              method:'POST',
              data:{'lodge_id':lodge_id},
              dataType:'JSON',
              success:function(data){
                console.log(data)
                $('#get_lodge_name').val(data.name);
                $('#get_lodge_email').val(data.email);
                $('#get_lodge_phone').val(data.phone);
                $('#get_lodge_room').val(data.room_id);
                $('#get_lodge_check_in_date').val(data.check_in_date);
                $('#get_lodge_check_out_date').val(data.check_out_date);
                $('#get_lodge_check_in_time').val(data.check_in_time);
                $('#get_lodge_check_out_time').val(data.check_out_time);
                $('#get_lodge_amount').val(data.amount);
                $('#get_lodge_status').val(data.status);

                $('#view_modal').modal('show');
              }
            })
          })

        //  $('.editroom').click(function(){
        //   var room_id = $(this).attr('id');
        //   $.ajax({
        //      url:'include/process.php?view_room',
        //      method:'POST',
        //      data:{'room_id':room_id},
        //      dataType:'JSON',
        //      success:function(data){
        //       $('#get_room_name').val(data.name);
        //       $('#get_room_price').val(data.price);
        //       $('#get_room_duration').val(data.duration);
        //       $('#get_room_total').val(data.total_room);
        //       $('#get_room_description').val(data.description);
        //       $('#get_room_image').files = data.image;
        //       // $("#btn_delete").val(data.id);
        //       $("#edit_modal").modal("show");
        //      }
        //    })
        //  })
          
      });
    </script>
  </body>
</html>