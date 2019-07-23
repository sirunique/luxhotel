<?php 
require_once 'db_object.php';
require_once 'database.php';

class Rooms extends db_object
{
    protected static $db_table = "rooms";
    protected static $db_table_fields = array("name", "description", "duration", "price", "total_room","status", "image" );

    public $id;
    public $name;
	public $description;
	public $duration;
    public $price;
    public $total_room;
    public $status;
    public $image;

}

?>