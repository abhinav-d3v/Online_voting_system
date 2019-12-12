<?php
session_start();
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">  

<div id="page">
<div id="header">
<center><b><font color = "brown" size="6">Online Voting System</font></b></center><br><br>
<h1></h1>
<p align="center">&nbsp;</p>
</div>
<?php
session_destroy();
?>
You have been successfully logged out.<br><br><br>
Return to <a href="index.php">Login</a>
</div>
</body></html>