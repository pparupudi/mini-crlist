<?php
include 'db.php';
session_start();
function upload_image($file) {

	$upload_dir = "uploaded_images/";
	if (file_exists($_FILES[$file]['tmp_name'])) {
		if ($_FILES[$file]["error"] > 0) {
			echo "Error Uploading Image " . $_FILES[$file]['name'] . ", Return Code: " . $_FILES[$file]["error"] . "
<br>
";
		} else {
			move_uploaded_file($_FILES[$file]["tmp_name"], $upload_dir . $_FILES[$file]['name']);
			$_SESSION[$file] = $_FILES[$file]['name'];

		}
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$category = $_REQUEST['cat'];
	$location = $_REQUEST['location'];
	$sub_category = $_REQUEST['sub'];
	$desc = $_REQUEST['desc'];
	$title = $_REQUEST['Title'];
	$price = $_REQUEST['price'];
	$email_id = $_REQUEST['email'];
	$conf_email_id = $_REQUEST['ConfirmEmail'];
	$img1 = $_FILES['img1']['name'];
	$img2 = $_FILES['img2']['name'];
	$img3 = $_FILES['img3']['name'];
	$img4 = $_FILES['img4']['name'];

	$err = 0;

	if (preg_match('/^\d+$/', $price) == 0) {
		$price_err = '<span style="color:Red;text-align:center;"> Invalid price</span>';
		
		$err += 1;
	}
	if (preg_match('/[a-zA-Z0-9 ]{2,50}$/i', $title) == 0) {
		$title_err = '<span style="color:red;text-align:center;">  Invalid title</span></br></br>';
		$err += 1;
	
	}
	if (preg_match('/^\S+@\S+?\.\S{3}$/', $email_id) == 0) {
		$email_err = '<span style="color:red;text-align:center;"> Invalid Email Address</span></br></br>';
		$err += 1;
	}
	if (preg_match('/^\S+@\S+?\.\S{3}$/', $conf_email_id) == 0) {
		$conf_email_err = '<span style="color:red;text-align:center;"> Invalid Confirmation Email Address</span></br></br>';
		$err += 1;
	}
	$return = strcmp($email_id, $conf_email_id);
	if ($return != 0) {
		$email_match_err = '<span style="color:red;text-align:center;">Email and Confirm Email do not match</span></br></br></br>';
		$err += 1;
	}
	if (!isset($_POST['agree'])){
			$agree_err = '<span style="color:red;text-align:center;">Please check the checkbox.</span></br></br></br>';
	}

	if ($err == 0) {
		unset_post_form();
		$_SESSION['cat'] = $category;
		$_SESSION['location'] = $location;
		$_SESSION['sub'] = $sub_category;
		$_SESSION['Title'] = $title;
		$_SESSION['desc'] = $desc;
		$_SESSION['price'] = $price;
		$_SESSION['email'] = $email_id;
		upload_image("img1");
		upload_image("img2");
		upload_image("img3");
		upload_image("img4");
		header('Location: preview.php?');
		exit();
	}

}
?>
<html>
	<head>
		<title> CRAIGSLIST </title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<h3>&nbsp;&nbsp;&nbsp;&nbsp;New Post Form</h3>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="well span8">
			<table>
				<tr>
					<td>&nbsp;&nbsp;Category: </td>
					<td>
					<Select name="cat">
						<option value="For Sale">For Sale</option>
						<option value="Services">Services</option>
						<option value="Jobs">Jobs</option>
					</Select></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Sub-category:</td>
						<td><Select name="sub">
							<optgroup label="For Sale">
								<option value="1">Books</option>
								<option value="2">Electronics</option>
								<option value="3">Household</option>
							</optgroup>
							<optgroup label="Services">
								<option value="4">Computer</option>
								<option value="5">Financial</option>
								<option value="6">Lessons</option>
							

							</optgroup>
							<optgroup label="Jobs">
								<option value="7">Full-Time</option>
								<option value="8">Part-Time</option>
								<option value="9">Volunteering</option>
							</optgroup>
						</Select></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Location:</td>
						<td><Select name="location">
							<option value="2">Mumbai</option>
							<option value="3">Stockholm</option>
							<option value="1">Cupertino</option>
					</select></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Title:</td>
				
						<td><input type="text" name ="Title"  size="30" style="height:30px" value="<?php echo htmlspecialchars($title); ?>"/> </td>
						<td><?php echo $title_err; ?></td>
						
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Price:</td>
						
						<td><input type="number" name ="price"  size="15" style="height:30px" value="<?php echo htmlspecialchars($price); ?>"></td>
						<td><?php echo $price_err; ?></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Description:</td>
						<td><textarea name="desc" cols="60" rows="7" style="height:30px" value="<?php echo htmlspecialchars($desc); ?>"></textarea></td>
						<td><?php echo $desc_err; ?></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Email :</td>
						<td><input type="text" name ="email" size="50" style="height:30px" value="<?php echo htmlspecialchars($email_id); ?>" /></td>
						<td><?php echo $email_err; ?></td>
						
					</tr>
						<tr>
						<td>&nbsp;&nbsp;Confirm Email :</td>
						<td><input type="text" name ="ConfirmEmail" size="50" style="height:30px" value="<?php echo htmlspecialchars($conf_email_id); ?>" /></td>
						<td><?php echo $conf_email_err; ?></td>
						
					</tr>
					<tr>
						<td><?php echo $email_match_err; ?> </td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;I agree with terms and conditions:</td>
						<td><input type="checkbox" name="agree" value="<?php echo ($_POST['agree']); ?>"/></td>
						<td><?php echo $agree_err; ?></td>
					</tr>
				    <tr><td>&nbsp;</td></tr>
					<tr>
						<td>&nbsp;&nbsp;Optional fields:</td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Image 1(max 5MB):</td>
						<td><input type="file" name="img1" value="<?php echo htmlspecialchars($img1); ?>"/></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Image 2(max 5MB):</td>
						<td><input type="file" name="img2" value="<?php echo htmlspecialchars($img2); ?>"/></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Image 3(max 5MB):</td>
						<td><input type="file" name="img3" value="<?php echo htmlspecialchars($img3); ?>"/></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Image 4(max 5MB):</td>
						<td><input type="file" name="img4" value="<?php echo htmlspecialchars($img4); ?>"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" class="btn btn-primary" value="preview"/></td>
						<td><input type="Reset" name="Reset" class="btn" value="Reset"/></td>

					</tr>
				</table>	
		</form>
		 <script src="bootstrap/css/bootstrap.js"></script>
	</body>
</html>