<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">

<div id="container">
<div id="header">
<h1>Logged Out Successfully </h1>
<p align="center">&nbsp;</p>
</div>
<?
session_start();
session_destroy();
?>
You have been successfully logged out of your control panel.<br><br><br>
Return to <a href="index.php">Login</a>
</div>
</body></html>