<?php
require('connection.php');
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
session_start();
	mysql_query("UPDATE `tbmembers` SET `status` = 'unvoted'") or die(mysql_error());
	header("location:voter.php");
?> 