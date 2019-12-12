<?php
require('../connection.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   
/*
$resulta = mysql_query("SELECT * FROM tbCandidates where candidate_name='Luis Nani'");

while($row1 = mysql_fetch_array($resulta))
  {
  $candidate_1=$row1['candidate_cvotes'];
  }
  */
  $position = addslashes( $_POST['position'] );
  
    $results = mysql_query("SELECT * FROM tbCandidates where candidate_position='$position' ORDER BY candidate_cvotes DESC");

    $row1 = mysql_fetch_array($results); // for the first candidate
    $row2 = mysql_fetch_array($results); // for the second candidate
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; // first candidate name
      $candidate_1=$row1['candidate_cvotes']; // first candidate votes
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; // second candidate name
      $candidate_2=$row2['candidate_cvotes']; // second candidate votes
      }
}
    else
        // do nothing
?> 
<?php
// retrieving positions sql query
$positions=mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>

<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="tan">
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
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
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
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<?php

if (isset($_POST['Submit'])){
  //fetching total votes
  $sql = "SELECT SUM(candidate_cvotes) FROM `tbcandidates`";
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
  $total = $row["SUM(candidate_cvotes)"];
  //displaying candidate
  function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
  }
  $position = addslashes( $_POST['position'] );
  $result = mysql_query("SELECT * FROM tbCandidates where candidate_position='$position' ORDER BY candidate_cvotes DESC");
   if (mysql_num_rows($result) > 0) {
      while($row = mysql_fetch_assoc($result)) {
         echo $row["candidate_name"]. ":<br>";
         echo '<div style = "width : 25%">';
         //echo '<img src="images/candidate-2.gif"'.'width = "'. 100*round($row["candidate_cvotes"]/$total,2) .'"'.'height = "20">';
         echo '<div style="background-color:'  . rand_color() . ';width : ' . 100 . ' %">&nbsp;</div>';
         echo '</div>';
         echo '  ' . 100*round($row["candidate_cvotes"]/$total,2) . '% of '.$total .' total votes<br>';
         echo 'vote '.$row["candidate_cvotes"].'<br>';
         echo "<br>";
      }
   } else {
      echo "<h1>No results found</h1>";
   }
}






?>
</div>
</div>
</div>
</body></html>