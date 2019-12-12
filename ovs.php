<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
</head><body> 
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
<div 
style="background-image: url(images/vote.jpg); height: 600px; width: 1520px; border: 1px solid black; background-repeat: no-repeat; background-position: center">
<center><b><font color = "brown" size="6">Online Voting System</font></b></center><br><br>
<!--<h3>Click a link above to perform an administrative operation.</h3>-->
</div>
</body>
</html>