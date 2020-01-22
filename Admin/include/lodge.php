<?php 
require_once 'db_object.php';
require_once 'database.php';



class Lodge extends db_object
{
    protected static $db_table = "lodge_tb";
    protected static $db_table_fields = array('name', 'phone','email','room_id', 'check_in_date', 'check_out_date','check_in_time', 'check_out_time','payment_id', 'amount', 'status', 'check_in_staff', 'check_out_staff');

    public $id;
    public $name;
    public $phone;
    public $email;
    public $room_id;
    public $check_in_date;
    public $check_out_date;
    public $check_in_time;
    public $check_out_time;
    public $payment_id;
    public $amount;
    public $status;
    public $check_in_staff;
    public $check_out_staff;



    public static function check_out($lodge_id,$staff_id){
        global $database;
        //get lodge info
        $lodge_info = Lodge::find_by_id($lodge_id);
        $fetch_info = Lodge::fetch_array($lodge_info);
        $fetch_room_id = $fetch_info[4];
            $room_info = Rooms::find_by_id($fetch_room_id);
            $fetch_room_info = Rooms::fetch_array($room_info);
            $room_total = $fetch_room_info[5] + 1;
        //update lodge   
        $date = date("Y-m-d");
        $time = date('H:i:s');
        $sql = "UPDATE " . static::$db_table ." SET check_out_date = '$date', check_out_time = '$time', status = 'Check Out', check_out_staff = '$staff_id' WHERE id = $lodge_id ";
        if ($database->query($sql)) {
            //update room id  total +1
            $room_sql = "UPDATE rooms_tb SET total_room = $room_total WHERE id = $fetch_room_id";
            $result = $database->query($room_sql);
            return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        }else{
            return false;
        }
    }
}