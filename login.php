<?php
	//get password of the user
	$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");

	$stmt = $db->prepare("select Password from User where UserID=:UserID");
	$stmt->execute(array(':UserID' => $_POST["id"]));
	$row = $stmt->fetch();

	//if the password and userid match, login
	if ($_POST["password"] == $row[0]) {
		setcookie('userID', $_POST["id"], time() + 3600);
		header('Location: ./index.php');
		die();
	}
	//if not matching, return to index page.
	//TODO: make alert that id or password was wrong
	else {
		header('Location: ./index.php');
		die();
	}

?>
