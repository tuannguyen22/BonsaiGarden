<?php
include('../Database/connect.php');
require('../Class/class_regis.php');
session_start ();
error_reporting(0);

$acc = new Registration($_POST['newName'],$_POST['newPassword'],$_POST['rePassword'],$_POST['newEmail']);
$acc -> registration();
?>
