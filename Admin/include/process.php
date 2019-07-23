<?php
    include_once 'rooms.php';

    $rooms = new Rooms();


    if(isset($_FILES['image']['name']) && isset($_POST['room_name']) && isset($_POST['room_price']) 
    && isset($_POST['room_duration']) && isset($_POST['room_total']) && isset($_POST['room_description']) && isset($_POST['room_image']) ){
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
?>