<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from Form
	$myusername = $_POST['username'];
	$mypassword = md5($_POST['pwd']);
	$myemail = $_POST['email'];
	$err = 0;

	if (empty($myusername)) {

		$user_err = '<span style="color:red;text-align:center;">Required</span>';
		$err = 1;
	}

	if (empty($_POST['pwd'])) {

		$pass_err = '<span style="color:red;text-align:center;">Required password</span>';
		$err = 1;
	}

	if (empty($myemail)) {

		$email_err = '<span style="color:red;text-align:center;">Email address required</span>';
		$err = 1;
	} else {
		if (preg_match('/^\S+@\S+?\.\S{3}$/', $myemail) != 1) {

			$email_err = '<span style="color:red;text-align:center;">Invalid Email Address</span>';
			$err = 1;
		}

	}

	if ($err != 1) {

		/*$sql = "SELECT COUNT(id) FROM login WHERE username='$myusername' OR email='$myemail'";*/
		$sql = sprintf("SELECT id FROM login WHERE username='%s' OR email='%s'", mysql_real_escape_string($myusername), mysql_real_escape_string($myemail));
		$qr = db_query($sql);
		if (mysql_num_rows($qr) == 0) {
			$sql = "INSERT INTO login (username, password, email) VALUES ('$myusername', '$mypassword', '$myemail')";
			$ret = db_query($sql);
			$_SESSION['username'] = $myusername;
			header('Location: main.php?');
		} else {
			echo "Username $myusername or email $myemail already exist";
		}

	}

}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	</head>

	<body>
		 <h2>&nbsp;Welcome To Mini Cragslist, Register</h2>
		<form action="register_page.php" method="post" class="well span6">
			<label>Username:</label>
			<input type="text" class="span3" placeholder="Type username here..." style="height:30px;" name="username">
			<?php echo $user_err; ?>
			<label>Password:</label>
			<input type="text" class="span3" placeholder="Type Password here..." style="height:30px;" name="pwd">
			<?php echo $pass_err; ?>
			<label>Email:</label>
			<input type="text" class="span3" placeholder="Type Your Email ID here..." style="height:30px;"name="email">
			<?php echo $email_err; ?>

			<br>
			<br>
			
			<button type="submit" class="btn btn-primary">Register</button>
			<a href="main.php"><button type="button" class="btn btn-primary">Home</button></a>
		</form>
		<script src="bootstrap/css/bootstrap.js"></script>

	</body>
</html>
