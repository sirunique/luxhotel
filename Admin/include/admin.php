<?php 

require_once ('database.php');
require_once ('db_object.php');
require_once 'session.php';

class Admin extends db_object
{
    protected static $db_table = "admin_tb";
    protected static $db_table_fields = array("name","gender","email","password","created","modified");

    public $id;
    public $name;
    public $gender;
    public $email;
    public $password;
    public $created;
    public $modified;

    private function has_attribute($attribute)
    {
            $object_vars = get_object_vars($this);

            return array_key_exists($attribute, $object_vars);
    }


    private static function instantiate($record)
    {
            $object = new self;

            //more dynamic and short
            foreach($record as $attribute=>$value){
                if ($object->has_attribute($attribute)) {
                    $object->$attribute = $value;
                }
            }
            return $object;
        }



    public static function find_by_string($column_name = "", $string = "")
    {
        global $database;
        $the_result_array = $database->query("SELECT * FROM " . static::$db_table . " WHERE $column_name = '$string' LIMIT 1");
        return $the_result_array;
    }



    public static function find_by_sql($sql = "")
    {
            global $database;
            $result_set = $database->query($sql);
            $object_array = array();

            while ($row = $database->fetch_array($result_set)){
                $object_array[] = self::instantiate($row);
            }
            return $object_array;
            foreach ($object_array as $item)
                echo $item;
    }

    public static function authenticate($email= "", $password= "")
	{
		global $database;
		$email = $database->escape_val($email);
		$password = md5($database->escape_val($password));

		$sql = "SELECT * FROM " . static::$db_table." WHERE email = '{$email}' AND password= '{$password}' LIMIT 1";
        $result = $database->query($sql);
        if($result){
            $row = $database->fetch_array($result);
            return !empty($row) ? $row:false;
        }else{
            return false;
        }
    }
    
} 


#echo $database->cryptPass("store23app_cloud");
?>