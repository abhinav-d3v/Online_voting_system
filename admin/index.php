<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin login</title>
<link rel="stylesheet" type="text/css" href="css/new2.css">
</head>
<body>
<div class="container">
    <section id="content">
        <form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
			<center><b><font color = "black" size="50">Online Voting System</font></b></center><br>
            <h1>Admin LOGIN</h1>
            <div>
                <input name="myusername" type="text" id="myusername" placeholder="Email.id">
            </div>
            <div>
                <input name="mypassword" type="password" id="mypassword" placeholder="Password">
            </div>
            <div>
                <input type="submit" name="submit" value="Login">
            </div>
        </form><!-- form -->
        
    </section><!-- content -->
</div><!-- container -->
</body>
</html>