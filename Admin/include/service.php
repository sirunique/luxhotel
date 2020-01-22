<?php 

require_once ('database.php');
require_once ('db_object.php');
require_once 'session.php';

class Service extends db_object
{
    protected static $db_table = "service_tb";
    protected static $db_table_fields = array("name","description","image");

    public $id;
    public $name;
    public $description;
    public $image;
}

?>
