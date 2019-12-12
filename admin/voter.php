<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive positions from the tbpositions table
$result=mysql_query("SELECT * FROM tbmembers")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
?>

<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM tbmembers WHERE member_id='$id'")
 or die("The position does not exist ... \n"); 
 
 // redirect back to positions
 header("Location: voter.php");
 }
 else
 // do nothing
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Voter</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<div id="menu">
     <ul>
          <li><a href="admin.php" class="active">Home</a></li>
		  <li><a href="registeracc.php" class="active">Registration</a></li>
		  <li><a href="voter.php" class="active">Manage Voter</a></li>
          <li><a href="positions.php" class="active">Manage Positions</a></li>
          <li><a href="candidates.php" class="active">Manage Candidates</a></li>
		  <li><a href="refresh.php" class="active">Poll Results</a></li>
		  <li><a href="logout.php" class="active">Logout</a></li>
		  
     </ul>
</div>				     
<div id="container">

<table border="0" width="420" align="center">
<CAPTION><h3>AVAILABLE Voters</h3></CAPTION><br>
<tr>
<th>Voter ID</th>
<th>First Name</th>
<th>Last name</th>
<th>Email</th>
<th>status</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['member_id']."</td>";
echo "<td>" . $row['first_name']."</td>";
echo "<td>" . $row['last_name']."</td>";
echo "<td>" . $row['email']."</td>";
echo "<td>" . $row['status']."</td>";
echo '<td><a href="voter.php?id=' . $row['member_id'] . '">Delete</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>
<hr>
<center><CAPTION><h3>Click the below link to activate All Voters</h3></CAPTION></center>
<center><a  href = "act.php" style = "margin-right:12px;" name = "go"> Activate All Voters Account</a>
</div>
</div>
</body>
</html>