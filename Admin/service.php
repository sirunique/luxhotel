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
        <li><a class="app-menu__item " href="rooms.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Rooms</span></a></li>
        <li><a class="app-menu__item" href="reservations.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Reservations</span></a></li>
        <li><a class="app-menu__item" href="lodge.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Lodge</span></a></li>
        <li><a class="app-menu__item " href="payment.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Payment</span></a></li>
        <li><a class="app-menu__item" href="testimonial.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Testimonial</span></a></li>
        <li><a class="app-menu__item active" href="service.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Service</span></a></li>
        <li><a class="app-menu__item " href="gallery.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gallery</span></a></li>
      
      </ul>
      </aside>




    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Service</h1>
          <p>LuxeHotel Management</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Service</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <button class="btn btn-primary" id="btn_add_staff">Add Service</button>
                <a class="btn btn-primary" href="service.php">Refresh</a>
                
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                      $selectdata = Service::find_all();
                      $countdata = Service::count_all();
                      for($i=1; $i <= $countdata ; $i++) 
                      { 
                        $fetchdata = Service::fetch_array($selectdata);
                    ?>
                      <td><?php echo $i;  ?></td>
                      <td><?php echo ucfirst($fetchdata['name']);  ?></td>
                      <td><?php echo ucfirst($fetchdata['description']);  ?></td>
                      <td>
                        <button class="btn btn-primary viewroom" id="<?php echo $fetchdata['id']; ?>" >View </button>
                        <button class="btn btn-primary editroom" id="<?php echo $fetchdata['id']; ?>" >Edit </button>                        
                        <button class="btn btn-danger deleteroom"  id="<?php echo $fetchdata['id']; ?>">Delete </button>
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
     <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service Details</h5>
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
                            <label for="book name">Image:</label>
                            <input type="file" class="form-control" name="room_image" id="room_image" placeholder='Staff Password'>
                            <span class="help-block" id="passwordError"></span>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Description:</label>
                           <textarea class="form-control" name="room_description"  id="room_description" cols="10" rows="10"></textarea>
                            <span class="help-block" id="priceError"></span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer" >   
                <button class="btn btn-primary" type="button" id="btnaddRoom" >Add</button> 
              </div>
                     

            </div>
          </div>
      </div>

    <!--View Book Modal Start Here-->
    <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
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
                            <input type="text" class="form-control" name="get_room_name" id="get_room_name" readonly>
                          </div>
                      </div>
                      
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Image:</label>
                            <div>
                              <img src="" alt=""  id="get_room_image" class="img-thumbnail">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Description:</label>
                           <textarea class="form-control" name="get_room_description"  id="get_room_description" cols="10" rows="10" readonly></textarea>
                          </div>
                      </div>

                  </div>
              </div>
            </div>
          </div>
      </div>

    <!--Edit Book Modal Start Here-->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Name:</label>
                            <input type="text" class="form-control" name="get_name" id="get_name" placeholder="Name">
                            <span class="help-block" id="nameError"></span>
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Image:</label>
                            <input type="file" class="form-control" name="get_image" id="get_image" placeholder='Staff Password'>
                            <span class="help-block" id="passwordError"></span>
                          </div>
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Description:</label>
                           <textarea class="form-control" name="get_description"  id="get_description" cols="10" rows="10"></textarea>
                            <span class="help-block" id="priceError"></span>
                          </div>
                      </div>
                      

                  </div>
              </div>
              <div class="modal-footer" >   
                <input type="hidden" id="get_id">
                <input type="hidden" id='get_image_url'>
                <button class="btn btn-primary" type="button" id="btnupdateRoom" >Update Service</button> 
              </div>
            </div>
          </div>
      </div>
    <!-- Delete worker Modal Start Here-->
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Room?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Are You Sure You To Delete <font color="red"> <label id="name"></label> </font>  </div>
                    <div class="modal-footer">
                    <input type="hidden" id="uid" />
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                      <button id="btn_delete" class="btn btn-danger"> Yes</a>
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

              var room_description = $('#room_description').val();
                formData.append('room_description', room_description);

              var room_image = document.getElementById('room_image').files[0].name;
                formData.append('room_image', room_image); 
     
              $.ajax({
                  url:'include/process.php?add_service',
                  type:'POST',
                  data:formData,
                  processData:false,
                  contentType:false,
                  success:function(data){
                      console.log(data)
                    $("#add_modal").modal("hide");
                   window.location='service.php';
                  }
              })
         });

         $('.deleteroom').click(function(){
           var room_id = $(this).attr('id');
           $.ajax({
             url:'include/process.php?view_service',
             method:'POST',
             data:{'room_id':room_id},
             dataType:'JSON',
             success:function(data){
              $("#name").html(data.name);
              $("#btn_delete").val(data.id);
              $("#delete_modal").modal("show");
             }
           })
          })

         $('#btn_delete').click(function(){
            var delete_id = $('#btn_delete').val();
            console.log(delete_id)
             $.ajax({
             url:'include/process.php?delete_service',
             method:'POST',
             data:{'delete_id':delete_id},
             dataType:'JSON',
             success:function(data){
             window.location='service.php';
             }
           })
         })

         $('.viewroom').click(function(){
             var room_id = $(this).attr('id');
              $.ajax({
              url:'include/process.php?view_service',
              method:'POST',
              data:{'room_id':room_id},
              dataType:'JSON',
              success:function(data){
                $('#get_room_name').val(data.name);
                $('#get_room_description').val(data.description);
                var setImage = document.querySelector('#get_room_image');
                setImage.setAttribute('src', "images/services/"+data.image)

                $('#view_modal').modal('show');
              }
            })
         })

         $('.editroom').click(function(){
            var room_id = $(this).attr('id');
            $.ajax({
              url:'include/process.php?view_service',
              method:'POST',
              data:{'room_id':room_id},
              dataType:'JSON',
              success:function(data){
                console.log(data)
                $('#get_id').val(data.id);
                $('#get_name').val(data.name);
                $('#get_description').val(data.description);
                $('#get_status').val(data.status);
                $('#get_image_url').val(data.image);
                $("#edit_modal").modal("show");
              }
            })
         })



         $('#btnupdateRoom').click(function(){
            var formData = new FormData();
            var image = document.getElementById('get_image');

            var id = $('#get_id').val();
            var image_url = $('#get_image_url').val();
            var name = $('#get_name').val();
            var status = $('#get_status').val();
            var description = $('#get_description').val();

            var file = image.files[0];
              formData.append('image', file);
            
            if(file)
            {
              var image = document.getElementById('get_image').files[0].name;
              formData.append('image', image);

              
              formData.append('id',id);

              
                formData.append('name',name);

               
                formData.append('status',status);

              
                formData.append('description',description);

              $.ajax({
                url:'include/process.php?new_service_image',
                type:'POST',
                data:formData,
                processData:false,
                contentType:false,
                success:function(data){
                  window.location = 'service.php'
                }
              })
            }
            else{
              $.ajax({
                url:'include/process.php?exist_service_image',
                type:'POST',
                data:{'id':id,'name':name,'status':status,'description':description, 'image_url':image_url},
                dataType:"JSON",
                success:function(data){
                  window.location = 'service.php'
                }
              })
            }

      })







          
      })
    </script>
  </body>
</html>