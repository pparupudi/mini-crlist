<?php
include 'db.php';
include 'header.php';
session_start();

if ($_GET['val'] == 'books') {
	$sql = "SELECT * from posts where SubCategory_ID=1";
	$head = "Books Posts for sale";
} elseif ($_GET['val'] == "electronics") {
	$sql = "SELECT * from posts where SubCategory_ID=2";
	$head = "Electronics Posts for sale";

} elseif ($_GET['val'] == "household") {
	$sql = "SELECT * from posts where SubCategory_ID=3";
	$head = "Household Posts for sale";
} elseif ($_GET['val'] == "mumbai") {
	$sql = "SELECT * from posts where Location_ID=2";
	$head = "Books Posts from Mumbai";
} elseif ($_GET['val'] == "cupertino") {
	$sql = "SELECT * from posts where Location_ID=1";
	$head = "Books Posts from Cupertino";
} elseif ($_GET['val'] == "stockholm") {
	$sql = "SELECT * from posts where Location_ID=3";
	$head = "Books Posts from Stockholm";
} elseif ($_GET['val'] == "usa") {
	$sql = "SELECT * from posts where Location_ID=1";
	$head = "Books Posts from USA";
} elseif ($_GET['val'] == "india") {
	$sql = "SELECT * from posts where Location_ID=2";
	$head = "Books Posts from India";
} elseif ($_GET['val'] == "sweden") {
	$sql = "SELECT * from posts where Location_ID=3";
	$head = "Books Posts from Sweden";
}

$conn = mysql_connect("localhost", "lamp", "1") or die(mysql_error());
mysql_select_db('lamp_final_project', $conn);
$result = mysql_query($sql) or die(mysql_error());
?>

<html>
	<head>

		<h3><?php echo $head ?></h3>
		<script type="text/javascript">
			function toggleMe(a) {

				var e = document.getElementById(a);
				if (!e)
					return true;
				if (e.style.display == "none") {
					e.style.display = "block"
				} else {
					e.style.display = "none"
				}
				return true;
			}
        </script>
       
	</head>
	<body>
		<table>
			

<?php

$i = 1;
while ($row = mysql_fetch_assoc($result)) {
	$post = "post" . $i;
	$ret = "toggleMe('" . $post . "'); return false;";
	$i++;
	$img1 = "uploaded_images/" . $row["Image_1"];
	$img2 = "uploaded_images/" . $row["Image_2"];
	$img3 = "uploaded_images/" . $row["Image_3"];
	$img4 = "uploaded_images/" . $row["Image_4"];
	echo '<p>';
	echo '<tr><td><a href="#" onclick="' . $ret . '" value="' . $row['Title'] . '">' . $row['Title'] . '</a></td></tr>';
	echo '<p id="' . $post . '">';

	echo '<tr>';
	echo ' 			<td>';
	echo '				<table class="table">';

	echo "                    <tr><td>Title       </td><td>" . $row["Title"] . "</td></tr>";
	echo '                    <tr><td>Price       </td><td> ' . $row["Price"] . " </td></tr>";
	echo '                    <tr><td>Location    </td><td> ' . $locs[$row["Location_ID"]] . '</td></tr>';
	echo '                    <tr><td>Description</td><td> ' . $row["Description"] . '</td></tr>';
	echo ' 	            </table>';
	echo ' 			</td>';

	echo '			<td><img src="' . $img1 . '" height=150 widht=150/></td>';
	echo '			<td><img src="' . $img2 . '" height=150 widht=150/></td>';
	echo '			<td><img src="' . $img3 . '" height=150 widht=150/></td>';
	echo '			<td><img src="' . $img4 . '" height=150 widht=150/></td>';
	echo ' 		</tr>';

	echo '</p>';
	echo '</p>';
}
	?>
   </table>
	</body>
</html>

