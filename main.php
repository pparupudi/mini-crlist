<?php
include "header.php";
session_start();
?>

<!doctype html>
<html lang="eng">
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<style>
		
			table, td, th {
				border: 1px #000;
			}

			th {
				background-color: #666;
				color: white;
			}

			h3.one {
				border-style: solid;
				border-width: 5px;
			}

			

		</style>
</head>
<body>
	<h3 class="one" align="center">Mini Cragslist</h3>
<a href="new_post.php" class="btn btn-large">Create Post</a>

<a href="login.php" class="btn btn-large">Login</a>

<a href="" class="btn btn-large">Help</a><br><br><br><br>


	<table class="table">
		<tr>
			<th>For Sale</th>
			<th>Services</th>
			<th>Jobs</th>
			<th>Country</th>
			<th>Locations</th>
		</tr>
		<tr>
			<td><a href="views.php?val=books">Books</a></td>
			<td><a href="views.php?val=computer">Computer</a></td>
			<td><a href="views.php?val=fulltime">Full-Time</a></td>
			<td><a href="views.php?val=usa">USA</a></td>
			<td><a href="views.php?val=cupertino">Cupertino</a></td>
		</tr>
		<tr>
			<td><a href="views.php?val=electronics">Electronics</a></td>
			<td><a href="views.php?val=financials">Financial</a></td>
			<td><a href="views.php?val=parttime">Part-Time</a></td>
			<td><a href="views.php?val=india">India</a></td>
			<td><a href="views.php?val=mumbai">Mumbai</a></td>
		</tr>
		<tr>
			<td><a href="views.php?val=household">Household</a></td>
			<td><a href="views.php?val=lessons">Lessons</a></td>
			<td><a href="views.php?val=volunteering">Volunteering</a></td>
			<td><a href="views.php?val=sweden">Sweden</a></td>
			<td><a href="views.php?val=stockholm">Stockholm</a></td>
		</tr>
	</table><br>
	<a href="">Terms and Conditions</a><br>
	<br>
	<a href="">About US</a>
</body>
</html>








