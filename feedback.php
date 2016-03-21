<html>
<head>
<title>Feedback Page</title>
<?php include("default.php"); ?>
</head>

<body>
<?php
session_start();

if(isset($_SESSION["user"])){
	$user = $_SESSION["user"];
	$color = queryColor($user);
	echo "<form>";
		echo "<div class='inline' id='header'><b>Welcome to feedback page: <font color='".$color."'>".$user."</font></b></div>";
		echo "<span class='right'><input type='button' id='optionsButton' value='Options'>";
		echo "<input type='button' id='logoutButton' value='Log Out'></span><br /><br />";
		echo "<input type='hidden' name='user' id='user' value=".$user.">";
		echo "<div id='mainBlock' class='inline'>";
			echo "Comment : <br />";
			echo "<textarea rows='6' cols='40' name='commentBox' id='commentBox'></textarea>";
			echo "<table id='optionsTable'>";
				echo "<tr>";
				echo "<td><b>Change Options</b></td>";
				echo "<td><input type='button' id='saveOptionsButton' value='Save' /></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Username:</td>";
				echo "<td><input type='text' size='10' name='username' id='username' /></td>";
				echo "<td><select id='colorSelect'>";
					foreach($htmlColors as $result){
						if($result[color] == $color){
							echo "<option value='".$result[color]."' style='color:".$result[color].";' selected>".$result[color]."</option>";
						}else{
							echo "<option value='".$result[color]."' style='color:".$result[color].";'>".$result[color]."</option>";
						}
					}
				echo "</select>";
				echo "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Change Password:</td>";
				echo "<td><input type='password' size='10' name='password' id='password' /></td>";
				echo "</tr>";
			echo "</table>";
		echo "</div>";
		echo "<input type='button' value='Post' id='postButton'><br /><br />";
		echo "<div>";
			echo "<i>Conversations:</i><br /><br />";
			echo "<div id='info'></div>";
			echo "<div id='commentOutput'></div>";
		echo "</div>";
	echo "</form>";
}else{
	echo "You are logged out.<br /><br />";
	echo "<form>";
		echo "<input type='button' value='Log In' id='loginButton2' />";
	echo "</form>";
}
?>
</body>

</html>
