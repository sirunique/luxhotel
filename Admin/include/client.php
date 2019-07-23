<?php 
require_once 'db_object.php';
require_once 'database.php';

class client extends db_object
{
    protected static $db_table = "client_tb";
    protected static $db_table_fields = array("web_category","payment_plan","domain_1","domain_2","fullname","email","phone","whatsapp_no",
        "business_name","business_info","about_business","prototype_links","business_city");


    public $id;
    public $web_category;
    public $payment_plan;
    public $domain_1;
    public $domain_2;
    public $fullname;
    public $email;
    public $phone;
    public $whatsapp_no;
    public $business_name;
    public $business_info;
    public $about_business;
    public $prototype_links;
   // public $business_country;
    public $business_city;
    



     
    //  //*** function to check if username exist.... START HERE
    //         public function exist_username($username)
    //         {
    //             global $database;

    //             $sql = "SELECT COUNT(*) FROM ". static::$db_table ." WHERE username = '$username' LIMIT 1 ";
    //             $query = $database->query($sql);
    //             $result = $database->fetch_array($query);
    //                 return $result[0];
    //         }
    // //*** END HERE
    
    // //*** function to check if email exist....START HERE..
    //     public function exist_email($email)
    //     {
    //         global $database;

    //         $sql= "SELECT COUNT(*) FROM ". static::$db_table ." WHERE email = '$email' LIMIT 1 ";
    //         $query = $database->query($sql);
    //         $result = $database->fetch_array($query);
    //             return $result[0];
    //     }
    // //*** END HERE

    
}
