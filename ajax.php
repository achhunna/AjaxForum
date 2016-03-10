<?php
require("dbConnect.php");

$action = $_POST["action"];
session_start();

if($action == "sessionCheck"){
	echo json_encode($_SESSION);
}
else if($action == "login"){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$_SESSION["user"] = $username;
		echo "Success";
	}
}
else if($action == "adduser"){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$query = mysqli_query($con, "INSERT INTO user(username,password) values('$username','$password') ");
	if($query){
		echo "Success";
	}
}
else if($action == "updateuser"){
	$user = $_POST["user"];
	$color = $_POST["color"];
	$query = mysqli_query($con, "UPDATE user SET color = '$color' WHERE username = '$user'");
	if($query){
		echo "<b>Welcome to Feedback page: <font color='".$color."'>".$user."</font></b>";
	}else{
		echo "Error";
	}
}
else if($action == "addcomment"){
	if(isset($_SESSION["user"])){
		$user = $_SESSION["user"];
		$message = mysqli_real_escape_string($con, $_POST["message"]);
		$query = mysqli_query($con, "INSERT INTO comment(name,message,timestamp) values('$user','$message',CURRENT_TIMESTAMP) ");
		if($query){
			echo "Your comment has been sent";
		}
		else{
			echo "Error in sending your comment";
		}
	}else{
	}
}
else if ($action == "showcomment"){
	if(isset($_SESSION["user"])){
		$show = mysqli_query($con, "SELECT a.name, a.message, a.timestamp, b.color FROM comment a, user b  WHERE a.name = b.username ORDER BY a.id DESC");
		while($row = mysqli_fetch_array($show)){
			echo "<font color='$row[color]'><b>$row[name]</b></font> : $row[message]<span class='right timestamp'>$row[timestamp]</span><br /><br />";
		}
	}
}
else if ($action == "logout"){
	session_destroy();
	echo "Goodbye.";
}

?>
