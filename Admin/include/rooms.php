<?php 
require_once 'db_object.php';
require_once 'database.php';

class Rooms extends db_object
{
    protected static $db_table = "rooms_tb";
    protected static $db_table_fields = array("name", "description", "duration", "price", "total_room","status", "image" );

    public $id;
    public $name;
	public $description;
	public $duration;
    public $price;
    public $total_room;
    public $status;
    public $image;



    public static function find_available(){
        global $database;
        $the_result_array = $database->query("SELECT * FROM " . static::$db_table . " WHERE total_room >= 1  AND status = 'Active' ");
        return $the_result_array;
    }

    public static function count_available()
    {

        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " WHERE total_room >= 1  AND status = 'Active' ";
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);


    }

    public static function get_room_info($room_id, $room_name){
        global $database;
        $room_info = array();
        $sql = "SELECT * FROM " . static::$db_table ." WHERE id ='$room_id' AND name='$room_name' ";
        $result = $database->query($sql);
        $fetch = $database->fetch_array($result);
        return $fetch;
    }

    public static function get_room_info_with_id($room_id){
        global $database;
        $room_info = array();
        $sql = "SELECT * FROM " . static::$db_table ." WHERE id ='$room_id' ";
        $result = $database->query($sql);
        $fetch = $database->fetch_array($result);
        return $fetch;
    }

    public static function update_total($room_id,$new_total){
        global $database;
        $room_info = array();
        $sql = "UPDATE " . static::$db_table ." SET total_room = '$new_total' WHERE id = $room_id ";
        $result = $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }
}

?>