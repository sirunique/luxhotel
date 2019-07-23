<?php 

require_once 'db_object.php';
require_once 'database.php';
require_once 'product.php';

class Business extends db_object
{
    protected static $db_table = "businesstb";
    protected static $db_table_fields = array("bus_id","user_id","prod_id","business_name","membershipType","city","state","country","buslogo_url","domain_1","domain_2","color","wantLogo","busdetails","phone");

    public $id;
    public $bus_id;
    public $user_id;
    public $prod_id;
    public $business_name;
    public $membershipType;
    public $city;
    public $state;
    public $domain_1;
    public $domain_2;
    public $color;
    public $fb_inp_val;
    public $ig_inp_val;
    public $country;
    public $buslogo_url;
    public $wantLogo;
    public $busdetails;
    public $phone;

    public $membership = "";

    public static function return_membership_type($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE user_id = '$id'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $membership = $row['membershipType'];
        }

        $sql = "SELECT * FROM  pricingtbl WHERE title  = '$membership'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            return $price = $row['price'];
        }

    }

    public static function get_bus_info($id){
        global $database;
        
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE user_id = '$id'";

        $result = $database->query($sql);
        return $result;
    }   
    public static function get_prod_info($uid){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE user_id = '$uid'";

        $pid = '';
        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $pid = $row['prod_id'];
        }

        if($pid == null){
            return false;
        }else{
            return Product::get_prod_info($pid);
        }
        
    }

    public static function return_business_name($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE user_id = '$id'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            return $buss_name = $row['business_name'];
        }

    }

    public static function toggle_status($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE user_id = '$id'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
           $sub_status = $row['sub_status'];
           if($sub_status == 1){
               $query = "UPDATE " . static::$db_table . " SET sub_status = '0' WHERE user_id = '$id'";
               $q_result = $database->query($query);
           }else if($sub_status == 0){
                $query = "UPDATE " . static::$db_table . " SET sub_status = '1' WHERE user_id = '$id'";
                $q_result = $database->query($query);
           }
        }

    }
}

// echo Business::return_business_type(16);
?>
