<!DOCTYPE html>
<html>
<head>
<title>Online Voting System</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
<body>
<div id="page">
<div id="header">
<h1>Invalid Credentials Provided </h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('connection.php');


// Defining your login details into variables
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword' and `status` = 'unvoted'" or die(mysql_error());
$result=mysql_query($sql) or die(mysql_error());

// Checking table row
$count=mysql_num_rows($result);
// If username and password is a match, the count will be 1

if($count==1){
// If everything checks out, you will now be forwarded to student.php
$user = mysql_fetch_assoc($result);
$_SESSION['member_id'] = $user['member_id'];
header("location:ovs.php");
}
//If the username or password is wrong, you will receive this message below.
else {
echo "Note: One voter can only vote/login one time!!<br><br>Return to <a href=\"index.php\">login</a>";
}

ob_end_flush();

?> 
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
</body>
</html>