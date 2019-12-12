<?php
require('connection.php');
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
$vote = $_REQUEST['vote'];
session_start();
session_destroy();
	mysql_query("UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
	mysql_query("UPDATE `tbmembers` SET `status` = 'voted' WHERE `member_id` = '$_SESSION[member_id]'") or die(mysql_error());
	header("location:new1.php");
?> 