<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive positions from the tbpositions table
$result=mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysql_query( "INSERT INTO tbPositions(position_name) VALUES ('$newPosition')" )
        or die("Could not insert position at the moment". mysql_error() );

// redirect back to positions
 header("Location: positions.php");
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
 $result = mysql_query("DELETE FROM tbPositions WHERE position_id='$id'")
 or die("The position does not exist ... \n"); 
 
 // redirect back to positions
 header("Location: positions.php");
 }
 else
 // do nothing
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Positions</title>
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
          <li><a href="positions.php" class="active">Manage Positions</a></li>
          <li><a href="candidates.php" class="active">Manage Candidates</a></li>
		  <li><a href="refresh.php" class="active">Poll Results</a></li>
		  <li><a href="logout.php" class="active">Logout</a></li>
     </ul>
</div>				   
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW POSITION</h3></CAPTION>
<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
<tr>
    <td>Position Name</td>
    <td><input type="text" name="position" /></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="420" align="center">
<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
<tr>
<th>Position ID</th>
<th>Position Name</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['position_id']."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>
<hr>
</div>
</div>
</body>
</html>