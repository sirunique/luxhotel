<?php 

require_once ('database.php');
require_once ('db_object.php');
require_once 'session.php';

class Gallery extends db_object
{
    protected static $db_table = "gallery_tb";
    protected static $db_table_fields = array("description","image");

    public $id;
    public $description;
    public $image;
}

?>
