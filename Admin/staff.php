<?php
include 'header.php';
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
        
        <li><a class="app-menu__item active" href="staff.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Staffs</span></a></li>
        <li><a class="app-menu__item" href="rooms.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Rooms</span></a></li>
        <li><a class="app-menu__item" href="reservations.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Reservations</span></a></li>
        <li><a class="app-menu__item" href="lodge.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Lodge</span></a></li>
        <li><a class="app-menu__item " href="payment.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Payment</span></a></li>
        <li><a class="app-menu__item " href="testimonial.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Testimonial</span></a></li>
        <li><a class="app-menu__item " href="service.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Service</span></a></li>
      
        <li><a class="app-menu__item " href="gallery.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gallery</span></a></li>

      </ul>
      </aside>




    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Staffs</h1>
          <p>LuxeHotel Management</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Staffs</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <button class="btn btn-primary" id="btn_add_staff">Add Staff</button>
                <a class="btn btn-primary" href="staff.php">Refresh</a>
                
                <br>
                <br>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php
                      $selectdata = Admin::find_all();
                      $countdata = Admin::count_all();
                      for($i=1; $i <= $countdata ; $i++) 
                      { 
                        $fetchdata = Admin::fetch_array($selectdata);
                    ?>
                      <td><?php echo $i;  ?></td>
                      <td><?php echo ucfirst($fetchdata['name']);  ?></td>
                      <td><?php echo ucfirst($fetchdata['gender']);  ?></td>
                      <td><?php echo ucfirst($fetchdata['email']);  ?></td>
                      <td><?php echo $fetchdata['password'];  ?></td>
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

    </main>

     <!--Add staff Modal Start Here-->
     <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Staff Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff name">Name:</label>
                            <input type="text" class="form-control" name="staff_name" id="staff_name" placeholder="Staff Name">
                            <span class="help-block" id="nameError"></span>
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="staff_category">Gender:</label>
                            <select class="form-control" name="staff_gender" id="staff_gender">
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                             </select>
                             <span class="help-block" id="error"></span>
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Email:</label>
                            <input type="eamil" class="form-control" name="staff_email" id="staff_email" placeholder='Staff Email'>
                            <span class="help-block" id="emailError"></span>
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Password:</label>
                            <input type="password" class="form-control" name="staff_password" id="staff_password" placeholder='Staff Password'>
                            <span class="help-block" id="passwordError"></span>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer" >   
                <button class="btn btn-primary" type="button" id="btnaddAdmin" >Add Admin</button> 
              </div>
                     

            </div>
          </div>
      </div>

    <!--Edit Book Modal Start Here-->
      <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Book Name:</label>
                            <input type="text" class="form-control" name="get_book_name" id="get_book_name">
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book_category">Category:</label>
                            <select class="form-control" name="get_book_category" id="get_book_category">
                               <?php
                                  // $selectdata = Category::find_all();
                                  // $countdata = Category::count_all();
                                  // for ($i=1; $i <= $countdata; $i++) { 
                                  //   $fetchdata = Category::fetch_array($selectdata);
                                ?>
                                    <option value="<?php 
                                    // echo $fetchdata['id']; 
                                    ?>"> <?php
                                    //  echo $fetchdata['category']; 
                                     ?> </option>
                                <?php
                                  // }
                                ?>
                              
                            </select>
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Author Name:</label>
                            <input type="text" class="form-control" name="get_author_name" id="get_author_name">
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">ISBN Number:</label>
                            <input type="text" class="form-control" name="get_isbn_number" id="get_isbn_number">
                          </div>
                      </div>

                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label for="book name">Number Of Copy:</label>
                            <input type="number" min="1" class="form-control" name="get_copy_number" id="get_copy_number">
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer" >   
                <button class="btn btn-primary" type="button" id="btnupdate">Update</button> 
              </div>
                     

            </div>
          </div>
      </div>


          <!-- Delete worker Modal Start Here-->
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="viewclient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Book?</h5>
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

          $(document).on('click', '#btnaddAdmin', function() {
            //Validate
              var status = '';

              var staffName = $('#staff_name').val();
              // name validation
              var nameregex = /^[a-zA-Z ]+$/;
              if(staffName === "") {
                   $('#nameError').html("Please Enter Your Name").addClass('text-danger');
                   status = true;
              }else if(!nameregex.test(staffName)){
                   $('#nameError').html("Name must contain only alphabets").addClass('text-danger');
                   status = true;
              }
              else{
                   $('#nameError').html(" ");
              }

              var staffEmail = $('#staff_email').val();
              // email validation
              var emailRegex =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
              if(staffEmail === "")
              {
                 $('#emailError').html("Please Enter Email Address").addClass('text-danger');
                 status = true;
              }else if(!emailRegex.test(staffEmail))
              {
                 $('#emailError').html("Enter Valid Email Address").addClass('text-danger');
                 status = true
              }
              else{
                     $('#emailError').html(" ");
              }

              var staffPassword = $('#staff_password').val();
              if(staffPassword === ""){
               $('#passwordError').html("Please Enter Password").addClass('text-danger');
               status = true;
              }else if(staffPassword.length <5){
                $('#passwordError').html("Password at least have 5 characters").addClass('text-danger');
                status = true;
              }else{
                   $('#passwordError').html(" ");
              }

              var staffGender = $('#staff_gender').val();
              
              if(staffName =="" || staffEmail =="" || staffPassword =="" && status)
              {
                console.log('Input Your Data')
              }else if( status != true){
                var data ={
                  'staffName':staffName, 'staffGender':staffGender, 'staffEmail':staffEmail, 'staffPassword':staffPassword
                }
                $.ajax({
                url:'include/process.php?add_staff',
                type:'POST',
                data:data,
                dataType:"JSON",
                success:function(data){
                  if(data.res ==='save'){
                    window.location = 'staff.php'
                    console.log('yes')
                  } else{
                    alert("Try Again")
                  }
                }
              })
              }

              
              
          });

      });
    </script>
  </body>
</html>