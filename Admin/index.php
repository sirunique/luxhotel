<?php
  header('location:dashboard.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <title>Login - HRM</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Login</h1>
        <center><h3>X-Project</h3></center>
      </div>
      <div class="login-box">
       <form class="login-form" id="loginform" method="post" autocomplete="off" onsubmit="return false">  
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i> Login</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text"  name="username" id="username" placeholder="Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block submit" name="btnlogin" id="btnlogin"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      // $('.login-content [data-toggle="flip"]').click(function() {
      // 	$('.login-box').toggleClass('flipped');
      // 	return false;
      // });

      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });

      $(document).ready(function()
      {
        $("form#loginform").submit(function()
        {
            var username = $("#username").val();
            var password = $("#password").val();
            $.ajax(
            {
              url:"../include/fetchitems.php?login",
              type:"POST",
              data:{username:username,password:password},
              dataType:"json",
                success:function(data)
                {
                  console.log(data)
                  // $("#btnlogin").attr("disabled", true);
                  // $("#btnlogin").html("Please Wait....");

                  // switch(data){
                  //   case("Login"):
                  //     //alert("Login");
                  //     setTimeout(function()
                  //     {
                  //       $("#btnlogin").html("Login Successfull");
                  //       window.location="dashboard.php";
                  //     },3000);
                      
                  //     break;
                  //   case("Error"):
                  //     //alert("Error");
                  //     setTimeout(function()
                  //     {
                  //       $("#btnlogin").html("Incorrect Login");
                  //       window.location="index.php";
                  //     },3000);
                  //   break
                  // }
                  
                },
            });

        });
      });


    </script>
  </body>
</html>