<?php
session_start();
include("includes/connection.php");
session_start();
if (isset($_SESSION['user_id'])):
    session_regenerate_id();
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    session_unset();
endif;
header('location:index.php');
exit;
?>
