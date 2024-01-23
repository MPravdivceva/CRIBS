<!DOCTYPE html>
<?php
require 'userSession.php';
require 'pageElements.php';
require 'database.php';
?>

<html>
    <head>
        <title>Details</title>
    
<?php writeCommonStyles(); ?>		
<?php
	// check for a sign in error and post an alert if necessary
	$errMsg = null;
	if (isset($_SESSION['errorMsg'])) {
		$errMsg = $_SESSION['errorMsg'];
		unset($_SESSION['errorMsg']);
	}
?>		
    </head>  
    
    <body>
        <div id="container">
            
            <div id="header"><?php displaySignIn(); ?><h1>Details</h1></div>

			<?php displayMenu(DETAILS); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>User Details</h1>
			
<?php
if ($errMsg) {
	echo "<p>There was a problem with the previous command:";
	echo "<p>$errMsg";
}
?>					
			<p>Welcome <?php echo $userName ?>.
<?php
echo "<p>time zone: " . date_default_timezone_get();

if (connectToDb('563325')) {
	$sqlQuery = "SELECT UserId FROM Users WHERE UserName='$userName'";
	$result = $dbConnection->query($sqlQuery);
	// TODO should check error here
	$userId = $result->fetch_assoc()['UserId'];
	if ($userName != 'Admin') {
		$sqlQuery = "SELECT Occurred FROM UserActions WHERE Action='Register' AND UserId='$userId'";
		$result = $dbConnection->query($sqlQuery);
		// TODO should check for error here
		$row = $result->fetch_assoc();
		$login = $row['Occurred'];
		echo "<p>You registered at: $login";
	}
	$sqlQuery = "SELECT Occurred FROM UserActions WHERE Action='Login' AND UserId='$userId' ORDER BY Occurred DESC LIMIT 2";
	$result = $dbConnection->query($sqlQuery);
	// TODO should check for error here
	if ($result->num_rows == 2) {
		$row = $result->fetch_assoc();
	}
	if ($result->num_rows != 0) {
		$row = $result->fetch_assoc();
		$login = $row['Occurred'];
		echo "<p>Your previous login was at: $login";
	}
}
else {
	error_log("Failed to connect to DB: " . $dbErrorCode);
	echo "<p>Could not connect to the database: " . $dbErrorCode;
}	
?>			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>







