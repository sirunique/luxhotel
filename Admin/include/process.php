<?php
    include_once 'admin.php';
    include_once 'session.php';
    include_once 'rooms.php';
    include_once 'reserve.php';
    include_once 'payment.php';
    include_once 'lodge.php';
    include_once 'contact.php';
    include_once 'newsletter.php';
    include_once 'testimonial.php';
    include_once 'service.php';
    include_once 'gallery.php';

    if(!$session->is_signed_in()){
        header("Location:  index.php");
      }

    $admin = new Admin();
    $rooms = new Rooms();
    $reserve = new Reserve();
    $payment = new Payment();
    $lodge = new Lodge();
    $contact = new Contact();
    $newsletter = new Newsletter();
    $testimonial = new Testmonial();
    $service = new Service();
    $gallery = new Gallery();

    if(isset($_REQUEST['login'])){
        $email = $database->escape_val($_POST['email']);
        $password = $database->escape_val($_POST['password']);
        $found_user = Admin::authenticate($email, $password);
        
        if($found_user){
            global $session;
            // $session->login($found_user);
            // $session->user_id = $found_user[0];

            if($session->login($found_user)){
                $res = array('res'=>"success");
                echo json_encode($res);
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
        }else{
            $res = array('res'=>"error");
            echo json_encode($res);
        }
    }

    //ADD ADMIN
    if(isset($_REQUEST['add_staff'])){
        $admin->name = $database->escape_val($_POST['staffName']);
        $admin->gender = $database->escape_val($_POST['staffGender']);
        $admin->email = $database->escape_val($_POST['staffEmail']);
        $admin->password = md5($database->escape_val($_POST['staffPassword']));
        
        if($admin->save()){
            $res = array('res'=>"save");
            echo json_encode($res);
        }else{
                $res = array('res'=>"error");
                echo json_encode($res);
        }
    }



    //ADD ROOM
    if(isset($_FILES['image']['name']) && isset($_POST['room_name']) && isset($_POST['room_price']) && isset($_POST['room_duration']) && isset($_POST['room_total']) && isset($_POST['room_description']) && isset($_POST['room_image']) )
    {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        if($image_size > 50000000){
            $res = array('res'=>"Image should not be greater than 50kb");
            echo json_encode($res);
        }else{
            // $rooms->image = move_uploaded_file($image_tmp, "../images/rooms/".$image_name);
            // echo $image_name;
            if ($rooms->image = move_uploaded_file($image_tmp, "../images/rooms/".$image_name)) {
                $rooms->name = $database->escape_val($_POST['room_name']);
                $rooms->price = $database->escape_val($_POST['room_price']);
                $rooms->duration = $database->escape_val($_POST['room_duration']);
                $rooms->total_room = $database->escape_val($_POST['room_total']);
                $rooms->description = $database->escape_val($_POST['room_description']);
                $rooms->image = $database->escape_val($_POST['room_image']);
                $rooms->status = 'Pending';
                
                if($rooms->save()){
                $res = array('res'=>"save");
                echo json_encode($res);
                }else{
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }
            else{
                echo "Error";
            }
        }
    }

    //UPDATE ROOM WITH NEW IMAGE
    if(isset($_FILES['image']['name']) && isset($_POST['id'])&& isset($_POST['name']) && isset($_POST['price'])  && isset($_POST['duration']) && isset($_POST['total']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['status']) )
    {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        if($image_size > 50000000){
            $res = array('res'=>"Image should not be greater than 50kb");
            echo json_encode($res);
        }else{
            if ($rooms->image = move_uploaded_file($image_tmp, "../images/rooms/".$image_name)) {
                $rooms->id = $database->escape_val($_POST['id']);
                $rooms->name = $database->escape_val($_POST['name']);
                $rooms->price = $database->escape_val($_POST['price']);
                $rooms->duration = $database->escape_val($_POST['duration']);
                $rooms->total_room = $database->escape_val($_POST['total']);
                $rooms->description = $database->escape_val($_POST['description']);
                $rooms->image = $database->escape_val($_POST['image']);
                $rooms->status = $database->escape_val($_POST['status']);
                
                if($rooms->save()){
                $res = array('res'=>"save");
                echo json_encode($res);
                }else{
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }
            else{
                echo "Error";
            }
        }
    }

    //UPDATE ROOM WITH EXIXTING IMAGE
    if(isset($_REQUEST['exist_image'])){
        $rooms->id = $database->escape_val($_POST['id']);
        $rooms->name = $database->escape_val($_POST['name']);
        $rooms->price = $database->escape_val($_POST['price']);
        $rooms->duration = $database->escape_val($_POST['duration']);
        $rooms->total_room = $database->escape_val($_POST['total']);
        $rooms->description = $database->escape_val($_POST['description']);
        $rooms->image = $database->escape_val($_POST['image_url']);
        $rooms->status = $database->escape_val($_POST['status']);

        if($rooms->save()){
            $res = array('res'=>"save");
            echo json_encode($res);
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
    }

    //GET ROOM INFO
    if(isset($_REQUEST['view_room']))
    {
        $room_id = $_POST['room_id'];
        $results = $rooms->find_by_id($room_id);
        $fetch = Rooms::fetch_array($results);
        echo json_encode($fetch);
    }

    //DELETE ROOM
    if(isset($_REQUEST['delete_room'])){
        $rooms->id = $database->escape_val($_POST['delete_id']);
        $result = $rooms->delete();
        echo json_encode($result);
    }

    //GET ROOM WITH SPECIFIC INFO
    if(isset($_REQUEST['get_room'])){
        $room_id = $database->escape_val($_POST['room_id']);
        $room_name = $database->escape_val($_POST['room_name']);
        $result = $rooms->get_room_info($room_id, $room_name);
        echo json_encode($result);
    }

    
    if(isset($_REQUEST['get_room_with_id'])){
        $room_id = $database->escape_val($_POST['room_id']);
        $result = $rooms->get_room_info_with_id($room_id);
        echo json_encode($result);
    }

    //CREATE RESERVATION
    if(isset($_REQUEST['reserve']))
    {
        $reserve->room_id = $database->escape_val($_POST['room_id']);
        $reserve->room_name = $database->escape_val($_POST['room_name']);
        $reserve->room_price = $database->escape_val($_POST['room_price']);
        $reserve->check_in_date = $database->escape_val($_POST['check_in_date']);
        $reserve->check_out_date = $database->escape_val($_POST['check_out_date']);
        $reserve->adult = $database->escape_val($_POST['adult']);
        $reserve->children = $database->escape_val($_POST['children']);
        $reserve->fullname = $database->escape_val($_POST['fullname']);
        $reserve->email = $database->escape_val($_POST['email']);
        $reserve->phone = $database->escape_val($_POST['phone']);
        $reserve->subtotal = $database->escape_val($_POST['subtotal']);
        $reserve->status = $database->escape_val($_POST['status']);
        
        if($reserve->save()){
            $res = array('res'=>"save");
            echo json_encode($res);
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
    }

        //GET RESERVATION INFO
        if(isset($_REQUEST['view_reserve']))
        {
            $room_id = $_POST['room_id'];
            $results = $reserve->find_by_id($room_id);
            $fetch = Reserve::fetch_array($results);
            echo json_encode($fetch);
        }

    //CREATE LODGE FROM RESERVATION 
    //UPDATE RESERVATION PAYMENT STATUS
    if(isset($_REQUEST['create_lodge2'])){
        $payment->ref_code = $payment->gen_ref_code();
        $payment->amount = $database->escape_val($_POST['amount']);
        $payment->name = $database->escape_val($_POST['name']);
        $payment->email = $database->escape_val($_POST['email']);
        $payment->room_id = $database->escape_val($_POST['room']);
        $payment->status = 'success';
        $payment->date = date("Y-m-d");
        $payment->time = date('H:i:s');
        $payment->payment_type = $database->escape_val($_POST['payment_type']);

        $name = $database->escape_val($_POST['name']);
        $room = $database->escape_val($_POST['room']);
        $date = date("Y-m-d");
        $time = date('H:i:s');

        $check_in_date = $database->escape_val($_POST['check_in_date']);
        $check_out_date = $database->escape_val($_POST['check_out_date']);
        if($payment->save())
        {
            //get payment info
            $get_payment_info = $payment->find_payment_by_string($name,$room,$date,$time);
            //get reserve info 
            $get_reserve_info = $reserve->find_reserve_by_string($name,$room,$check_in_date,$check_out_date);
            
            $lodge->name = $database->escape_val($_POST['name']);
            $lodge->phone = $database->escape_val($_POST['phone']);
            $lodge->email = $database->escape_val($_POST['email']);
            $lodge->room_id = $database->escape_val($_POST['room']);
            $lodge->check_in_date = date("Y-m-d");
            $lodge->check_out_date = 'Pending';
            $lodge->check_in_time = date("H:i:s");
            $lodge->check_out_time ="Pending";
            $lodge->payment_id = $get_payment_info[0];
            $lodge->amount = $get_payment_info[4];
            $lodge->status = 'active';
            $lodge->check_in_staff = $database->escape_val($_POST['staff_id']);
            $lodge->check_out_staff = 'Pending';
            if($lodge->save()){
                //update room_total
                $room_id = $get_payment_info[7];
                $get_room_info = $rooms->get_room_info_with_id($room_id);
                $total_room = $get_room_info[5];
                $new_total = $total_room-1;
                $save_total = $rooms->update_total($room_id, $new_total);
                if($save_total){
                    //update reservation status to yes
                        $reserve_id = $get_reserve_info[0];
                        $status = 'YES';
                        $save_status = $reserve->update_status($reserve_id,$status);
                        if($save_status){
                            $res = array('res'=>"save");
                            echo json_encode($res);
                        }
                        else{
                            $res = array('res'=>"error");
                            echo json_encode($res);
                        }
                    
                }else
                {
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
        }
        else{
            $res = array('res'=>"error");
            echo json_encode($res);
        }
    }

      //CREATE LODGE
      if(isset($_REQUEST['create_lodge'])){
        $payment->ref_code = $payment->gen_ref_code();
        $payment->amount = $database->escape_val($_POST['amount']);
        $payment->name = $database->escape_val($_POST['name']);
        $payment->email = $database->escape_val($_POST['email']);
        $payment->room_id = $database->escape_val($_POST['room']);
        $payment->status = 'success';
        $payment->date = date("Y-m-d");
        $payment->time = date('H:i:s');
        $payment->payment_type = $database->escape_val($_POST['payment_type']);

        $name = $database->escape_val($_POST['name']);
        $room = $database->escape_val($_POST['room']);
        $date = date("Y-m-d");
        $time = date('H:i:s');

        if($payment->save())
        {
            //get payment info
            $get_payment_info = $payment->find_payment_by_string($name,$room,$date,$time);
            //get current admin id

            $lodge->name = $database->escape_val($_POST['name']);
            $lodge->phone = $database->escape_val($_POST['phone']);
            $lodge->email = $database->escape_val($_POST['email']);
            $lodge->room_id = $database->escape_val($_POST['room']);
            $lodge->check_in_date = date("Y-m-d");
            $lodge->check_out_date = 'Pending';
            $lodge->check_in_time = date("H:i:s");
            $lodge->check_out_time ="Pending";
            $lodge->payment_id = $get_payment_info[0];
            $lodge->amount = $get_payment_info[4];
            $lodge->status = 'active';
            $lodge->check_in_staff = $database->escape_val($_POST['staff_id']);
            $lodge->check_out_staff = 'Pending';
            if($lodge->save()){
                //update room_total
                $room_id = $get_payment_info[7];
                $get_room_info = $rooms->get_room_info_with_id($room_id);
                $total_room = $get_room_info[5];
                $new_total = $total_room-1;
                $save_total = $rooms->update_total($room_id, $new_total);
                if($save_total){
                    $res = array('res'=>"save");
                    echo json_encode($res);
                }else
                {
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
        }
        else{
            $res = array('res'=>"error");
            echo json_encode($res);
        }
    }



     //GET LODGE INFO
     if(isset($_REQUEST['view_lodge']))
     {
         $lodge_id = $database->escape_val($_POST['lodge_id']);
         $results = $lodge->find_by_id($lodge_id);
         $fetch = Lodge::fetch_array($results);
         echo json_encode($fetch);
     }

     //CHECK OUT
    if(isset($_REQUEST['check_out'])){
        $lodge_id = $database->escape_val($_POST['lodge_id']);
        $staff_id = $database->escape_val($_POST['staff_id']);
        $result = $lodge->check_out($lodge_id,$staff_id);
        echo json_encode($result);
    }

    //CONTACT
    if(isset($_REQUEST['contact'])){
        $contact->name = $database->escape_val($_POST['fname']." ".$_POST['lname']);
        $contact->email = $database->escape_val($_POST['email']);
        $contact->subject = $database->escape_val($_POST['subject']);
        $contact->message = $database->escape_val($_POST['message']);
        if($contact->save()){
            header('location:../../index.php');
            }else{
                header('location:../../index.php');
            }
    }


     //NEWSLETTER
     if(isset($_REQUEST['newsletter'])){
        $newsletter->email = $database->escape_val($_POST['email']);
        if($newsletter->save()){
            header('location:../../index.php');
            }else{
                header('location:../../index.php');
            }
    }

    //ADD TESTIMONIAL
    // if(isset($_FILES['image']['name']) && isset($_POST['room_name']) && isset($_POST['room_description']) && isset($_POST['room_image']) )
    if(isset($_REQUEST['add_testimonial'] ))
    {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        if($image_size > 50000000){
            $res = array('res'=>"Image should not be greater than 50kb");
            echo json_encode($res);
        }else{
            // $rooms->image = move_uploaded_file($image_tmp, "../images/rooms/".$image_name);
            // echo $image_name;
            if ($testimonial->image = move_uploaded_file($image_tmp, "../images/testimonials/".$image_name)) {
                $testimonial->name = $database->escape_val($_POST['room_name']);
                $testimonial->description = $database->escape_val($_POST['room_description']);
                $testimonial->image = $database->escape_val($_POST['room_image']);
                
                if($testimonial->save()){
                $res = array('res'=>"save");
                echo json_encode($res);
                }else{
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }
            else{
                echo "Error";
            }
        }
    }

     //GET TESTIMONIAL INFO
     if(isset($_REQUEST['view_testimonial']))
     {
         $room_id = $_POST['room_id'];
         $results = $testimonial->find_by_id($room_id);
         $fetch = Testmonial::fetch_array($results);
         echo json_encode($fetch);
     }

     //DELETE TESTIMONIAL
    if(isset($_REQUEST['delete_testimonial'])){
        $testimonial->id = $database->escape_val($_POST['delete_id']);
        $result = $testimonial->delete();
        echo json_encode($result);
    }

    //ADD SERVICE
    if(isset($_REQUEST['add_service'] ))
    {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        if($image_size > 50000000){
            $res = array('res'=>"Image should not be greater than 50kb");
            echo json_encode($res);
        }else{
            // $rooms->image = move_uploaded_file($image_tmp, "../images/rooms/".$image_name);
            // echo $image_name;
            if ($service->image = move_uploaded_file($image_tmp, "../images/services/".$image_name)) {
                $service->name = $database->escape_val($_POST['room_name']);
                $service->description = $database->escape_val($_POST['room_description']);
                $service->image = $database->escape_val($_POST['room_image']);
                
                if($service->save()){
                $res = array('res'=>"save");
                echo json_encode($res);
                }else{
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }
            else{
                echo "Error";
            }
        }
    }


    //GET SERVICE INFO
    if(isset($_REQUEST['view_service']))
    {
        $room_id = $_POST['room_id'];
        $results = $service->find_by_id($room_id);
        $fetch = Service::fetch_array($results);
        echo json_encode($fetch);
    }

     //DELETE SERVICE
     if(isset($_REQUEST['delete_service'])){
        $service->id = $database->escape_val($_POST['delete_id']);
        $result = $service->delete();
        echo json_encode($result);
    }


    //UPDATE SERVICE WITH EXIXTING IMAGE
    if(isset($_REQUEST['exist_service_image'])){
        $service->id = $database->escape_val($_POST['id']);
        $service->name = $database->escape_val($_POST['name']);
        $service->description = $database->escape_val($_POST['description']);
        $service->image = $database->escape_val($_POST['image_url']);
        if($service->save()){
            $res = array('res'=>"save");
            echo json_encode($res);
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
    }

        //UPDATE SERVICE WITH NEW IMAGE
        if(isset($_REQUEST['new_service_image']))
        {
            $image_name = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_type = $_FILES['image']['type'];
            if($image_size > 50000000){
                $res = array('res'=>"Image should not be greater than 50kb");
                echo json_encode($res);
            }else{
                if ($service->image = move_uploaded_file($image_tmp, "../images/services/".$image_name)) {
                    $service->id = $database->escape_val($_POST['id']);
                    $service->name = $database->escape_val($_POST['name']);
                    $service->description = $database->escape_val($_POST['description']);
                    $service->image = $database->escape_val($_POST['image']);
                    
                    if($service->save()){
                    $res = array('res'=>"save");
                    echo json_encode($res);
                    }else{
                        $res = array('res'=>"error");
                        echo json_encode($res);
                    }
                }
                else{
                    echo "Error";
                }
            }
        }

    //ADD GALLERY
    if(isset($_REQUEST['add_gallery'] ))
    {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        if($image_size > 50000000){
            $res = array('res'=>"Image should not be greater than 50kb");
            echo json_encode($res);
        }else{
            // $rooms->image = move_uploaded_file($image_tmp, "../images/rooms/".$image_name);
            // echo $image_name;
            if ($gallery->image = move_uploaded_file($image_tmp, "../images/gallery/".$image_name)) {
                $gallery->description = $database->escape_val($_POST['room_description']);
                $gallery->image = $database->escape_val($_POST['room_image']);
                
                if($gallery->save()){
                $res = array('res'=>"save");
                echo json_encode($res);
                }else{
                    $res = array('res'=>"error");
                    echo json_encode($res);
                }
            }
            else{
                echo "Error";
            }
        }
    }

     //GET GALLERY INFO
     if(isset($_REQUEST['view_gallery']))
     {
         $room_id = $_POST['room_id'];
         $results = $gallery->find_by_id($room_id);
         $fetch = Gallery::fetch_array($results);
         echo json_encode($fetch);
     }
 
      //DELETE GALLERY
      if(isset($_REQUEST['delete_gallery'])){
         $gallery->id = $database->escape_val($_POST['delete_id']);
         $result = $gallery->delete();
         echo json_encode($result);
     }

    //UPDATE GALLERY WITH EXIXTING IMAGE
    if(isset($_REQUEST['exist_gallery_image'])){
        $gallery->id = $database->escape_val($_POST['id']);
        $gallery->description = $database->escape_val($_POST['description']);
        $gallery->image = $database->escape_val($_POST['image_url']);
        if($gallery->save()){
            $res = array('res'=>"save");
            echo json_encode($res);
            }else{
                $res = array('res'=>"error");
                echo json_encode($res);
            }
    }

      //UPDATE GALLERY WITH NEW IMAGE
      if(isset($_REQUEST['new_gallery_image']))
      {
          $image_name = $_FILES['image']['name'];
          $image_size = $_FILES['image']['size'];
          $image_tmp = $_FILES['image']['tmp_name'];
          $image_type = $_FILES['image']['type'];
          if($image_size > 50000000){
              $res = array('res'=>"Image should not be greater than 50kb");
              echo json_encode($res);
          }else{
              if ($gallery->image = move_uploaded_file($image_tmp, "../images/gallery/".$image_name)) {
                  $gallery->id = $database->escape_val($_POST['id']);
                  $gallery->description = $database->escape_val($_POST['description']);
                  $gallery->image = $database->escape_val($_POST['image']);
                  
                  if($gallery->save()){
                  $res = array('res'=>"save");
                  echo json_encode($res);
                  }else{
                      $res = array('res'=>"error");
                      echo json_encode($res);
                  }
              }
              else{
                  echo "Error";
              }
          }
      }

?>