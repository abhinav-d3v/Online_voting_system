<html><head>
<style>
bgcolor="#E6E6FA";
</style>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
<script>
function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("confirm_password").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }
        }
    
    </script>
</head><body>
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
<div id="header">
<h1>Registration </h1>
</div>
<div id="container">
<?php
require('connection.php');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];
$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash
$mystatus = $_POST['status'];

$sql = mysql_query( "INSERT INTO tbMembers(first_name, last_name, email, password, status) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass', '$mystatus')" )
        or die( mysql_error() );

die( "Registered for an account.<br>");
}
echo "<center><h3>Register an account by filling in the needed information below:</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return validate()">';
echo '<table align="center"><tr><td>';
echo "<tr><td>First Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='email' maxlength='100' value=''></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' id='password' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Confirm Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' id='confirm_password' name='confirm_password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Status:</td><td><input type='text'style='background-color:#999999; font-weight:bold;' name='status' maxlength='15' value='unvoted'></td></tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</div> 
</div>
</body></html>