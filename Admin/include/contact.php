<?php 

require_once ('database.php');
require_once ('db_object.php');
require_once 'session.php';

class Contact extends db_object
{
    protected static $db_table = "contact_tb";
    protected static $db_table_fields = array("name","email","subject","message");

    public $id;
    public $name;
    public $email;
    public $subject;
    public $message;
}

?>
