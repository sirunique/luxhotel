<?php
  // include "include/book.php";
  // include "include/category.php";
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <!-- Twitter meta-->
      <meta property="twitter:card" content="summary_large_image">
      <meta property="twitter:site" content="@pratikborsadiya">
      <meta property="twitter:creator" content="@pratikborsadiya">
      <!-- Open Graph Meta-->
      <meta property="og:type" content="website">
      <meta property="og:site_name" content="Vali Admin">
      <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
      <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
      <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
      <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <title>E-Libray X PROJECT</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    </head>
    <body class="app sidebar-mini rtl">
      <!-- Navbar-->
      <header class="app-header"><a class="app-header__logo" href="index.html">E-Library</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
          <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
          </li>
          <!--Notification Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 4 new notifications.</li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
                <div class="app-notification__content">
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Lisa sent you a mail</p>
                        <p class="app-notification__meta">2 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Mail server not working</p>
                        <p class="app-notification__meta">5 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div></a></li>
                </div>
              </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
          <!-- User Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </header>
      
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
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
            <span class="app-menu__label">Books</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item " href="book.php"><i class="icon fa fa-circle-o"></i>All Books</a></li>
              <li><a class="treeview-item" href="category.php"><i class="icon fa fa-circle-o"></i>Category</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item active" href="staff.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Staffs</span></a></li>
  
        </ul>
      </aside>




    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Staffs</h1>
          <p>E-libray Management</p>
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
              var flag = false;
              var staffName = $('#staff_name').val();
              if (validateName(staffName)) status = true;
              if(status == true){
                 console.log("YEs its true")
              }else{
                console.log(status)
              }

              // var staffEmail = $('#staff_email').val();
              // if (validateEmail(staffEmail)) status === true;
               

              // var staffPassword = $('#staff_password').val();
              // if(validatePassword(staffPassword)) status === true

              // var staffGender = $('#staff_gender').val();
              // status === true
              // // validate
              // if(status === true){
              //     var data = JSON.stringify({
              //     'staffName':staffName, 'staffGender':staffGender, 'staffEmail':staffEmail, 'staffPassword':staffPassword
              //   });
              //   console.log(data)
              // }
              
          });

          function validateName(name){
              // name validation
              var nameregex = /^[a-zA-Z ]+$/;
              if(name === "") {
                  return $('#nameError').html("Please Enter Your Name").addClass('text-danger');
              }else if(!nameregex.test(name)){
                  return $('#nameError').html("Name must contain only alphabets").addClass('text-danger');
              }
              else{
                  return $('#nameError').html(" ");
              }
              return true;
          }

          function validateEmail(email){
            var emailRegex =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(email === "")
            {
              return $('#emailError').html("Please Enter Email Address").addClass('text-danger');
            }else if(!emailRegex.test(email))
            {
              return $('#emailError').html("Enter Valid Email Address").addClass('text-danger');
            }
            else{
                  return $('#emailError').html(" ");
              }
            return true;
          }

          function validatePassword(password){
            if(password === ""){
              return $('#passwordError').html("Please Enter Password").addClass('text-danger');
            }else if(password <3){
              console.log("Must Be")
              // return $('#passwordError').html("Password at least have 8 characters").addClass('text-danger');
            }else{
                  return $('#passwordError').html(" ");
              }
            return true;
          }
      });
    </script>
  </body>
</html>