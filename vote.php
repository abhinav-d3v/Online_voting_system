<?php
require('connection.php');
session_start();
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<?php
// retrieving positions sql query
$positions=mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
    // retrieval sql query
// check if Submit is set in POST
 if (isset($_POST['Submit']))
 {
 // get position value
 $position = addslashes( $_POST['position'] ); //prevents types of SQL injection
 
 // retrieve based on position
 $result = mysql_query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
 or die(" There are no records at the moment ... \n"); 
 
 // redirect back to vote
 //header("Location: vote.php");
 }
 else
 // do something
  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online Voting System</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />   
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
	xmlhttp.open("GET","save.php?vote="+int,true);
	xmlhttp.send();
	}
	else
	{
	alert("Choose another candidate ");	
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body bgcolor="tan">
<body>
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
<div class="refresh">
</div>
<div id="container">
<table width="500" align="center">
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysql_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<?php
mysql_query("UPDATE thmembers SET status = voted WHERE member_id = '$_SESSION[member_id]'");
?>
<table width="150" align="left">
<form>
<tr>
    <th>Candidates:</th>
</tr>
<?php
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
	  
while($row=mysql_fetch_array($result)){
echo "<tr>";
$col = $row['candidate_name'];
echo "<td>Vote for :</td>";
echo "<td><input type='Submit' name='vote' value='$col' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
//}
  }
else
// do nothing
?>
<tr>
    <h3>NB: Click on your favourite  candidate name to cast your vote. This process can not be undone so think wisely before casting your vote.</h3>
    <td>&nbsp;</td>
</tr>
</form>
</table>
</div>
</div>
</body>
</html>