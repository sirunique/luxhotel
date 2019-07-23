<?php 

require_once 'db_object.php';
require_once 'database.php';

class User extends db_object
{
    protected static $db_table = "usertbl";
    protected static $db_table_fields = array("user_id","fullname","password","email","phone","bus_reg_status","user_token");

    public $id;
    public $user_id;
    public $fullname;
    public $password;
    public $email;
    public $phone;
    public $bus_reg_status;
    public $user_token;

    public static function update_busreg_status($id){
        global $database;
        $sql = "UPDATE " . static::$db_table . " SET bus_reg_status = 1 WHERE id = '$id'";
        
        $database->query($sql);
    }

    public static function update_password($password,$email){
        global $database;
        $sql = "UPDATE " . static::$db_table . " SET password = '$password' WHERE email = '$email'";
        
        $database->query($sql);
    }

    public static function check_userbusreg_status($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$id'";

        $result = $database->query($sql);
        return $result;
    }

    public static function return_username($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$id'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $user_name = $row['fullname'];
        }

        return $user_name;
    }

    public static function return_email($id){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE id = '$id'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $email = $row['email'];
        }

        return $email;
    }

    public function randomString($length = 6) {
    	$str = "";
    	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    	$max = count($characters) - 1;
    	for ($i = 0; $i < $length; $i++) {
    		$rand = mt_rand(0, $max);
    		$str .= $characters[$rand];
    	}
	      return $str;
    }

    public static function authenticate($username= "", $password= "")
	{
		global $database;
		$hashedPassword = '';
		$username = $database->escape_val($username);
		$password = $database->escape_val($password);

		$sql = "SELECT * FROM " . static::$db_table."
		WHERE email = '{$username}'
		LIMIT 1";

        
        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
           $hashedPassword = $row['password'];
        }

        // if(crypt($password, $hashedPassword) == $hashedPassword){
        //     $result_array = self::find_by_sql($sql);
        //     return !empty($result_array) ? array_shift($result_array) : false;
        // }else{
        //     return false;
        // }

        //now checking with sha1
        if(sha1($password) == $hashedPassword){
            $result_array = self::find_by_sql($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }else{
            return false;
        }

    }
    
    public static function find_by_sql($sql = ""){
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

    private static function instantiate($record){
        $object = new self;

        //more dynamic and short
        foreach($record as $attribute=>$value){
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute){
        $object_vars = get_object_vars($this);

        return array_key_exists($attribute, $object_vars);
    }

    //checking if email exist
    public static function check_if_email_exist($email){
        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " WHERE email = '$email' LIMIT 1";
        $query = $database->query($sql);
        $result = $database->fetch_array($query);
        return $result[0];
    }

    public static function return_user_token($email){
        global $database;
        $sql = "SELECT * FROM  " . static::$db_table . " WHERE email = '$email'";

        $result = $database->query($sql);
        while($row = $database->fetch_array($result)){
            $user_token = $row['user_token'];
        }

        return $user_token;
    }

    public static function confirm_token($token,$email){
        global $database;
        $sql = "SELECT COUNT(*) FROM  " . static::$db_table . " WHERE user_token = '$token' AND email = '$email'";
        $query = $database->query($sql);
        $result = $database->fetch_array($query);
        return $result[0];
    }

}

    //echo $database->cryptPass("storeapp23Cloud");
?>