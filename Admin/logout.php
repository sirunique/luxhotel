<?php 
    require_once 'include/session.php';
    $session->logout();
    header("Location: index.php");
?>