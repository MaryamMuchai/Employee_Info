<?php
error_reporting(E_ERROR | E_PARSE);
include 'config.php';
include 'head.php';

if(isset($_GET['id']) && (int)$_GET['id'] != 0) {
	$sql = "UPDATE `employee` SET `active` = ".$_GET['active']." WHERE `id` = '".$_GET['id']."'";
	$db->query($sql);
    // echo $query;exit;
	$msg = "Status Saved Succesfully";
}
$_SESSION['msg'] = $msg;
$link = 'index.php';
header( 'Location: '.$link );
?>