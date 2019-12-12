 <?php
session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysql_query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
$row = mysql_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysql_query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE member_id = '$myId'" )
        or die( mysql_error() );

// redirect back to profile
 header("Location: manage-profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Voter Profile Management</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="tan">
<div id="menu">
     <ul>
          <li><a href="ovs.php" class="active">Home</a></li>
          <li><a href="vote.php" class="active">Polls</a></li>
          <li><a href="manage-profile.php" class="active">Manage Profile</a></li>
          <li><a href="logout.php" class="active">Logout</a></li>
		  <li><a href="About us.html" class="active">Contact</a></li>
		  <li><a href="elec.php" class="active">Detail</a></li>
     </ul>
</div>     
<div id="header">
</div>
<div id="container">
<table>
<tr>
<td>
<table width="380" align="center">
<CAPTION><h3>MY PROFILE</h3></CAPTION>
<tr>
    <td>Member Id:</td>
    <td><?php echo $stdId; ?></td>
</tr>
<tr>
    <td>First Name:</td>
    <td><?php echo $firstName; ?></td>
</tr>
<tr>
    <td>Last Name:</td>
    <td><?php echo $lastName; ?></td>
</tr>
<tr>
    <td>Email:</td>
    <td><?php echo $email; ?></td>
</tr>
<tr>
    <td>Password:</td>
    <td>Encrypted</td>
</tr>
</table>
</td>
<td>
<table border="0" width="620" align="center">
<CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>First Name:</td><td><input type="text" style="background-color:white; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:white; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:white; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style="background-color:white; font-weight:bold;" name="password" maxlength="5" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" style="background-color:white; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Update Profile"></td></tr>
</table>
</form>
</td>
</tr>
</table>
<hr>
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
</body>
</html>