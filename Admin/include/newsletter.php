<?php 

require_once ('database.php');
require_once ('db_object.php');
require_once 'session.php';

class Newsletter extends db_object
{
    protected static $db_table = "newsletter_tb";
    protected static $db_table_fields = array("email");

    public $id;
    public $email;
}

?>
