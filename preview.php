<?php
include 'db.php';

#include "header.php";

session_start();

$category = $_SESSION['cat'];
$location = $_SESSION['location'];
$sub_category = $_SESSION['sub'];
$desc = $_SESSION['desc'];
$title = $_SESSION['Title'];
$price = $_SESSION['price'];
$email_id = $_SESSION['email'];
$conf_email_id = $_SESSION['ConfirmEmail'];
$img1 = $_SESSION['img1'];
$img2 = $_SESSION['img2'];
$img3 = $_SESSION['img3'];
$img4 = $_SESSION['img4'];

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
	<div class="hero-unit">
	<h2>Preview Page</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="well span8">
    <title> Preview Page </title>
    <table class="table">
	<tr>
		<td><strong>Category</strong></td>
		<td><?php echo $category; ?></td>
	</tr>
	<tr>
		<td>Sub Category</td>
		<td><?php echo $sub_cat[$sub_category]; ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo $desc; ?></td>
	</tr>
	<tr>
		<td>Location</td>
		<td><?php echo $locs[$location]; ?></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><?php echo $price; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $email_id; ?></td>
	</tr>
	<tr>
		<td>Image 1</td>
		<td><img src="uploaded_images/<?php echo $img1; ?>" height=200 widht=200 class="img-rounded"/></td>
		<td>Image 2</td>
		<td><img src="uploaded_images/<?php echo $img2; ?>" height=200 widht=200 class="img-rounded"/></td>
	</tr>
	<tr>
		<td>Image 3</td>
		<td><img src="uploaded_images/<?php echo $img3; ?>" height=200 widht=200 class="img-rounded"/></td>
		<td>Image 4</td>
		<td><img src="uploaded_images/<?php echo $img4; ?>" height=200 widht=200 class="img-rounded"/></td>
	</tr>
</table>
<button class="btn btn-primary" type="submit" name="submit">Submit</button>
<button class="btn" type="button"  onclick="window.history.back()">Back</button>
<a href="main.php"><button type="button" class="btn btn-primary">Home</button></a>
<script src="bootstrap/css/bootstrap.js"></script>
</div>
</form>

</body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$sql = "INSERT into posts(Title, Price, Description, Email, Image_1, Image_2, Image_3, Image_4, Subcategory_ID, Location_ID)";
	#$sql .= " VALUES ('$title', '$price', '$desc', '$email_id', '{$img1_data}', '{$img2_data}', '{$img3_data}', '{$img4_data}', '$sub_category', '$location')";
	$sql .= " VALUES ('$title', '$price', '$desc', '$email_id', '$img1', '$img2', '$img3', '$img4', $sub_category, '$location')";
	#$sql = "select * from posts";
	#$sql = "INSERT into posts(Title, Price, Description, Email, Subcategory_ID, Location_ID) VALUES ('$title', '$price', '$desc', '$email_id', '$sub_category', '$location')";
	$res = db_query($sql);
	header('Location: main.php?');
	exit();

	

}
?>