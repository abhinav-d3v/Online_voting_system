<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
</head><body>
<div id="menu">
     <ul>
          <li><a href="admin.php" class="active">Home</a></li>
		  <li><a href="registeracc.php" class="active">Registration</a></li>
          <li><a href="positions.php" class="active">Manage Positions</a></li>
          <li><a href="candidates.php" class="active">Manage Candidates</a></li>
		  <li><a href="refresh.php" class="active">Poll Results</a></li>
		  <li><a href="logout.php" class="active">Logout</a></li>
     </ul>
</div>				     
<div 
style="background-image: url(images/vote.jpg); height: 600px; width: 1520px; border: 1px solid black; background-repeat: no-repeat; background-position: center">
<center><b><font color = "brown" size="6">Online Voting System</font></b></center><br><br>
<p>Click a link above to perform an administrative operation.</p>
</div>



</div>

</div>
</body></html>