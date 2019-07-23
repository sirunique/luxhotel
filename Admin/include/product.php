<?php 



require_once 'db_object.php';
require_once 'database.php';

class Product extends db_object
{
    protected static $db_table = "producttbl";
    protected static $db_table_fields = array("prod_id", "name", "type", "sub_fee", "prod_url", "pricing_features", "description", "desc_features", "subscribed_user", "prod_image_url", "prod_category_id", "available");

    public $id;
    public $prod_id;
    public $name;
    public $type;
    public $sub_fee;
    // public $main_fee;
	public $prod_url;
	public $pricing_features;
	public $description;
	public $desc_features;
    public $subscribed_user;
    public $prod_image_url;
    public $prod_category_id;
    public $available;

    public static function return_prodname($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$id'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $prod_name = $row['name'];
        }

        return $prod_name;
    }

    public static function get_prod_info($pid){
        global $database;
        $prod_payment_info = array();
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$pid'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            array_unshift($prod_payment_info, $row['sub_fee']);
            array_unshift($prod_payment_info, $row['main_fee']);
        }

        return $prod_payment_info;
    }
	
	public static function get_all_prod_info(){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table ." WHERE available = 1";

        $result = $database->query($sql);
        
        return $result;
    }
	
	public static function get_prod_info_by_name($name){
        global $database;
		
        $sql = "SELECT * FROM  " . static::$db_table ." WHERE name LIKE '%$name%'";
        $result = $database->query($sql);
        
        return $result;
    }
    
    public static function get_prod_info_by_category($category){
        global $database;
		
        $sql = "SELECT * FROM  " . static::$db_table ." WHERE prod_category_id = '$category' AND available = 1";
        $result = $database->query($sql);
        
        return $result;
    }

	public static function get_this_prod_info($pid){
        global $database;
        $prod_info = array();
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$pid'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            array_push($prod_info, $row['id']);//0
            array_push($prod_info, $row['prod_id']);//1
            array_push($prod_info, $row['name']);//2
            array_push($prod_info, $row['type']);//3
            array_push($prod_info, $row['sub_fee']);//4
            // array_push($prod_info, $row['main_fee']);
            array_push($prod_info, $row['prod_url']);//5
            array_push($prod_info, $row['pricing_features']);//6
            array_push($prod_info, $row['description']);//7
            array_push($prod_info, $row['desc_features']);//8
            array_push($prod_info, $row['subscribed_user']);//9
            array_push($prod_info, $row['prod_image_url']);//10
        }

        return $prod_info;
    }

    public static function subscribe_user($pid){
        global $database;
        $total_subscriber = 0;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$pid'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $total_subscriber = $row['subscribed_user'];
        }

        $new_total_subscriber = $total_subscriber + 1;

        $sql_2 = "UPDATE " . static::$db_table . " SET subscribed_user = '$new_total_subscriber' WHERE id = '$pid'";

        $result = $database->query($sql_2);
    }

    public static function toggle_status($pid){
        global $database;
        $initial = "";
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$pid'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $initial = $row['available'];
        }

        if($initial == 0){
            $sql_2 = "UPDATE " . static::$db_table . " SET available = 1 WHERE id = '$pid'";
            $result = $database->query($sql_2);
        }
        if($initial == 1)
        {
            $sql_2 = "UPDATE " . static::$db_table . " SET available = 0 WHERE id = '$pid'";
            $result = $database->query($sql_2);
        }
    }
       
}

?>
