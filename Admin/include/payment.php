<?php 
require_once 'db_object.php';
require_once 'database.php';

class Payment extends db_object
{
    protected static $db_table = "payment_tb";
    protected static $db_table_fields = array('ref_code','date','time' ,'amount', 
    'name', 'email', 'room_id', 'room_name', 'status','payment_type');

    public $id;
    public $ref_code;
    public $date;
    public $time;
    public $amount;
    public $name;
    public $email;
    public $room_id;
    public $room_name;
    public $status;
    public $payment_type;



    public static function find_payment_by_string($name,$room,$date,$time)
    {
        global $database;
        $payment_info=array();
        $sql = $database->query("SELECT * FROM " . static::$db_table . " WHERE name = '$name' AND room_id ='$room' AND date = '$date' AND time = '$time' AND status = 'success' LIMIT 1");
        $fetch = $database->fetch_array($sql);
        return $fetch;
    }

    public static function genrate(){
        // $random1 = mt_rand(345, 999);
        // $random = mt_rand(178, 789);
        // $code = 'cash_'.$random1.''.$random;
        // return $code;

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
    public static function check_if_exist($code){
        // check if code exist in database
        global $database;
        $sql = $database->query("SELECT * FROM " . static::$db_table . " WHERE ref_code = '$code' ");
        $fetch = $database->fetch_array($sql);
        return $fetch;
    }
    public static function gen_ref_code(){
        $code = self::genrate();
        $check = self::check_if_exist($code);
        if($check){
            //regenerate
            $code = self::genrate();
        }else{
            //return code
            return $code;
        }
    }

}

// class Random extends db_object
// {
//     protected static $db_table = "test_rand";
//     protected static $db_table_fields = array('code');

//     public $id;
//     public $code;

//     public static function genrate(){
//         // $random1 = mt_rand(345, 999);
//         // $random = mt_rand(178, 789);
//         // $code = 'cash_'.$random1.''.$random;
//         // return $code;

//         $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
//         return substr(str_shuffle($permitted_chars), 0, 10);
//     }
//     public static function check_if_exist($code){
//         // check if code exist in database
//         global $database;
//         $sql = $database->query("SELECT * FROM " . static::$db_table . " WHERE code = '$code' ");
//         $fetch = $database->fetch_array($sql);
//         return $fetch;
//     }
//     public static function gen_ref_code(){
//         $code = self::genrate();
//         $check = self::check_if_exist($code);
//         if($check){
//             //regenerate
//             $code = self::genrate();
//         }else{
//             //return code
//             return $code;
//         }
//     }
// }