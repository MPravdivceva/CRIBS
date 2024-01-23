<?php
/* 
	Process a sign in request, checking a user's password.
*/
require 'userSession.php';
require 'database.php';

// unset any previous error message
unset($_SESSION['errorMsg']);

// check the form contains all the post data
if (!(isset($_POST['name']) &&
	  isset($_POST['status']))) {
	header('location:index.php');
	exit();
}

// recover the form data
$name = trim($_POST['name']);
$status = trim($_POST['status']);

// all the data is present and valid

// connect to the database
if (!connectToDb('563325')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:admin.php');
	exit();
}

// after this point we have an open DB connection

// check the user exists and is unique
$name = sanitizeString($name);
$status = $status == 0 ? 1 : 0;
$sqlQuery = "UPDATE Users SET Status = '$status' WHERE UserName='$name'";
$result = $dbConnection->query($sqlQuery);
if (!$result) {
	$_SESSION['errorMsg'] = "There was a problem with the database: " . $dbConnection->error;
	closeConnection();
	header('location:admin.php');
	exit();
}

// everything done
header('Location:admin.php');
?>