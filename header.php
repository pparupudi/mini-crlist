<?php

session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
</head>
<body>
	
<?php

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
	echo '<p class="lead text-info text-center">';
    echo '<strong>Hi '. $username . ', welcome to your profile!</strong>';
	echo '</p>';


    echo '<p class="lead text-right">';
	echo '<a href="main.php"><button type="button" class="btn">Home</button></a>&nbsp;&nbsp;';
    echo '<a href="logout.php"><button type="button" class="btn">Logout</button></a>';
	echo '</p>';

} else {
    echo 'You are not logged in.';
	echo '<a href="login.php"><button type="button" class="btn">Login</button></a>';
	
    #header('Location: http://localhost:8888/lamp_proj/final_project/login.php?');
	exit();
}

?>

<script src="bootstrap/css/bootstrap.js"></script>
</body>
</html>