<?php
session_start();
require('connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive positions from the tbpositions table
$result=mysql_query("SELECT * FROM tbelection")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Election</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<header>
<img src="images/one.jpg" width="1520px" height="170px">

</header>

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
<div id="container">

<table border="0" width="420" align="center">
<CAPTION><h3>DETAIL</h3></CAPTION><br>
<tr>
<th>Election Type</th>
<th>No of Seats</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['election_types']."</td>";
echo "<td>" . $row['no_of_seats']."</td>";
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>

</div>
</div>
</body>
</html>