<html>
<head>
<title>Site Log In</title>
<?php include("default.php"); ?>
</head>

<body>
<b>Welcome to Feedback Page</b><br /><br /><br /><br />
<div align="center">
	<form>
		Username:<input type="text" size="10" name="username" id="username" />
		Password:<input type="password" size="10" name="password" id="password" />
		<span id="confirmDiv">Confirm Password:<input type="password" size="10" name="confirmPassword" id="confirmPassword" /></span>
		<br /><br />
		<input type="button" id="loginButton" value="Log In" />
		<input type="button" id="createButton1" value="Create New User" />
		<input type="button" id="createButton2" value="Add New User" />
		<input type="button" id="cancelButton" value="Cancel" />
	</form>

	<div id = "output"></div>
</div>
</body>

</html>
