<?php
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// username and password sent from Form 
	$myusername= $_POST['username']; 
	$mypassword=md5($_POST['pwd']);
	$err = 0;
	
	if (empty($myusername)){
		
		$user_err = '<span style="color:red;text-align:center;">Required</span>';
		$err  = 1;
	}
	
	if (empty($_POST['pwd'])){
		
		$pass_err = '<span style="color:red;text-align:center;">Required password</span>';
		$err = 1;
	} 
	
	
}

if ($err != 1) {
	
  
	  /*$sql = "SELECT COUNT(id) FROM login WHERE username='$myusername' OR email='$myemail'";*/		
	  $sql = sprintf("SELECT id FROM login WHERE username='%s' OR email='%s'", 
	                 mysql_real_escape_string($myusername),
					   mysql_real_escape_string($myemail));
	  $qr = db_query($conn, $sql);
	  if (mysqli_num_rows($qr) == 0) {
		  echo "Username $myusername or email $myemail doesn't exist";
	  }



 }
  mysqli_close($conn);


?>

<!Doctype html>
<html>
<head>
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<form class="well" action="login_page.php" method="post">


<table>
<tr>
<td>Username:</td>
<td><input type="text" name="username" class="span3" /><br/></td>
<td><?php echo $user_err; ?></td>
<tr>
<td>Password:</td>
<td><input type="password" name="password"/><br/></td>
 <td><?php echo $pass_err; ?></td>
<td><br/></td>
<br/>
<td><input class="btn btn-primary" type="submit" value=" Submit "/><br /></td>
</tr>
</table>
<script src="js/bootstrap.js"></script>
</form>

</body>
</html>