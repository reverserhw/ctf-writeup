<?php

function solve() {
	echo "Hello, admin! <br>Bugs_Bunny{65755da329b8770c3e11e7ccba37f4e3}";
}


$id = $_POST['id'];
$pw = $_POST['pw'];

if(isset($id) && isset($pw)) {
	if(strcmp($id, "admin")==0) {
		if(strcmp($pw, "sotodrkrdpsxmdhkdltmsmswjddusdlchlrhrhdkdldhdkdlsmschldbwjddlchlrhdlsemt")==0) {
			@solve();
		} else {
			echo "You are not admin! :( <br><a href='index.php'> Back </a>";
		}
	} else {
		echo "You are not admin! :( <br><a href='index.php'> Back </a>";
	}
} else {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title> Admin Login Page </title>
	</head>
	<body>
	<form method="POST">
	<input type="text" name="id"><br>
	<input type="text" name="pw"><br>
	<input type="submit" value="Login">
	</form>
	</body>
	</html>
	<?
}
?>