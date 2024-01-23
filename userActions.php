<?php
/* Some simple database utilities to record user actions into the DB.

   Note that the functions in this file assume that the database connection
   is live and is held in the global variable $dbConnection
*/

/* Record the date and time that the given user registered

   Returns true if the action was recorded to the DB and false otherwise
*/
function recordRegistration($userName)
{
	return recordAction($userName, 'Register');
}

/* Record the date and time that the given user logged in

   Returns true if the action was recorded to the DB and false otherwise
*/
function recordLogin($userName)
{
	return recordAction($userName, 'Login');
}

/* Record the date and time that the given user failed log in

   Returns true if the action was recorded to the DB and false otherwise
*/
function recordLoginFailure($userName)
{
	return recordAction($userName, 'LoginFail');
}

/* Record the date and time that the given user performed the
   specified action.
   
   Returns true if the action was recorded to the DB and false otherwise
*/
function recordAction($userName, $action)
{
	global $dbConnection;
	
	// get the ID number for the user
	$sqlQuery = "SELECT UserId FROM users WHERE UserName='$userName'";
	$result = $dbConnection->query($sqlQuery);
	if (!$result || $result->num_rows != 1) {
		return false;
	}
	$userId = $result->fetch_assoc()['UserId'];
	
	// generate a time stamp and save it into the DB
	$now = date_format(date_create(null), 'Y-m-d H:i:s');
	$sqlQuery = "INSERT INTO useractions VALUES ('$userId', '$action', '$now')";
	$result = $dbConnection->query($sqlQuery);
	if ($result) {
		return true;
	}
	else {
		return false;
	}
}
?>