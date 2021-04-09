<?php

include('../Database/connect.php');
require('../Class/class_login.php');
session_start ();
error_reporting(0);
$user = new Login($_POST['name'],$_POST['password']) ;
$user -> login();
?>