<?php
include "db.php";

session_start();

if (isset($_SESSION['username'])) {
	header('Location: main.php?');
	exit ;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// username and password sent from Form
	$myusername = $_POST['username'];
	$mypassword = md5($_POST['password']);
	$sql = sprintf("SELECT id FROM login WHERE username='%s' AND password='%s'", mysql_real_escape_string($myusername), mysql_real_escape_string($mypassword));
	$res = db_query($sql);
	if (mysql_num_rows($res) != 1) {
		echo "Username :". $myusername ."or Password  Invalid " . "<br>";
	} else {
		echo "You have successfully logged in <br>";
		$_SESSION['username'] = $myusername;
		header('Location: main.php?');
	}
}
?>

<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	</head>
	<body>
		<h2>&nbsp;Welcome To Mini Cragslist</h2>
		<form action="login.php" method="post" class="well span6">
			<label>Username</label>
			<input type="text" class="span3" placeholder="Type username here..." style="height:30px;" name="username"  />
			<label>Password</label>
			<input type="text" class="span3" placeholder="Type password here..."style="height:30px;" name="password" />
			<br/>
			<br/>
			<button type="submit" class="btn btn-primary">Sign in</button>
			<a href="register_page.php"><button type="button" class="btn btn-primary">Register</button></a>
			<a href="main.php"><button type="button" class="btn btn-primary">Home</button></a>
		

		</form>

		<script src="bootstrap/css/bootstrap.js"></script>

	</body>
</html>