<?php 
require_once 'db_object.php';
require_once 'database.php';

class Reserve extends db_object
{
    protected static $db_table = "reserve_tb";
    protected static $db_table_fields = array("room_id","room_name","room_price","check_in_date",
     "check_out_date", "fullname",
     "email", "phone", "adult", "children","subtotal","status" );

    public $id;
    public $room_id;
    public $room_name;
    public $room_price;
    public $check_in_date;
	public $check_out_date;
	public $fullname;
    public $email;
    public $phone;
    public $adult;
    public $children;
    public $subtotal;
    public $status;

    public static function find_reserve_by_string($name,$room,$check_in_date,$check_out_date)
    {
        global $database;
        $payment_info=array();
        $sql = $database->query("SELECT * FROM " . static::$db_table . " WHERE fullname = '$name' AND room_id ='$room' 
        AND check_in_date = '$check_in_date' AND check_out_date = '$check_out_date' AND status = 'NO' LIMIT 1");
        $fetch = $database->fetch_array($sql);
        return $fetch;
    }

    public static function update_status($reserve_id,$status){
        global $database;
        $room_info = array();
        $sql = "UPDATE " . static::$db_table ." SET status = '$status' WHERE id = $reserve_id ";
        $result = $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }

}

?>