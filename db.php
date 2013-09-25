<?php

$conn = mysql_connect("localhost","lamp","1") or die (mysql_error());
mysql_select_db('lamp_final_project', $conn);

$locs = array("1"=>"Cupertino", 
              "2"=>"Mumbai",
              "3"=>"Stockholm");
$sub_cat = array("1"=>"Books",
                 "2"=>"Electronics",
				 "3"=>"Household",
				 "4"=>"Computer",
				 "5"=>"Financial",
				 "6"=>"Lessons",
				 "7"=>"Full-time",
				 "8"=>"Part-time",
				 "9"=>"Volunteering");
				 
function db_query($q) {
	$ret = mysql_query($q);
	 if (!$ret) {
	 	  echo $q;
		  echo 'Error executing query: ' . mysql_error();
	  } else {
	  	echo "Query Successfull";
	  }
	  return $ret;
}

function unset_post_form() {
	unset($_SESSION['cat']);
	unset($_SESSION['location']);
	unset($_SESSION['sub']);
	unset($_SESSION['Title']);
	unset($_SESSION['desc']);
	unset($_SESSION['price']);
	unset($_SESSION['email']);
	unset($_SESSION['img1']);
	unset($_SESSION['img2']);
	unset($_SESSION['img3']);
	unset($_SESSION['img4']);

}
?>
