<?php
require("dbConnect.php");

echo "<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.1.min.js'></script>";
echo "<script type='text/javascript' src='http://code.jquery.com/ui/1.10.4/jquery-ui.min.js'></script>";
echo "<script type='text/javascript' src='scripts/script.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.11.2/themes/start/jquery-ui.css' />";
echo "<link rel='stylesheet' type='text/css' href='styles/styles.css' />";

$string = file_get_contents("htmlColors.json");
$htmlColors = json_decode($string, true);
//$htmlColors = array("Blue","Green","Red","Orange","DarkViolet","Navy","Yellow");

function queryColor($username){
	global $con; //declare variable as global within the scope of this function
	$query = "SELECT * FROM user WHERE username = '$username' ";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		return $row['color'];
	}
}

?>
