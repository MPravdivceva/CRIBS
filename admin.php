<!DOCTYPE html>
<?php
require 'userSession.php';
require 'pageElements.php';
require 'database.php';
?>

<html>
    <head>
        <title>Admin</title>
    
<?php writeCommonStyles(); ?>
<?php
	// check for a sign in error and post an alert if necessary
	$errMsg = null;
	if (isset($_SESSION['errorMsg'])) {
		$errMsg = $_SESSION['errorMsg'];
		unset($_SESSION['errorMsg']);
	}
?>
		
	<style>
	table.userdata 
	{
		border-collapse: collapse;
	}
	
	table.userdata th, table.userdata td
	{
		padding: 3px 3px;
		text-align: center;
	}	
	
	table.userdata tr:not(:last-child)
	{
		border-bottom: 1px solid #444;
	}
	
	table.userdata th:not(:last-child), table.userdata td:not(:last-child) 
	{
		border-right: 1px solid #444;
	}
	</style>
		
    </head>  
    
    <body>
        <div id="container">
            
            <div id="header"><?php displaySignIn(); ?><h1>Admin</h1></div>

			<?php displayMenu(ADMIN); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Admin</h1>
			
<?php
if ($errMsg) {
	echo "<p>There was a problem with the previous command:";
	echo "<p>$errMsg";
}
?>			
			
			<h2>User List</h2>
			
<?php
if (connectToDb('563325')) {
	$sqlQuery = "SELECT * FROM Users ORDER BY UserName DESC";
	$result = $dbConnection->query($sqlQuery);
	$row = $result->fetch_assoc();
?>
			<table class="userdata">
			<tr><th>User Name</th><th>Admin</th><th colspan='2'>Status</th></td></tr>
<?php
	while ($row) {
		$name = $row['UserName'];
		$admin = $row['AdminLevel'];
		$status = $row['Status'];
		
		$adminString = $admin > 0 ? '&#x2714;' : '';
		$statusString = $status < 1 ? 'Disabled' : 'Active';
		
		echo "<tr><td>$name</td><td>$adminString</td><td>$statusString</td><td>";
		if ($name != $userName) {
			echo "<form action='processStatusSwitch.php' method='post'><input type='hidden' name='name' value='$name'><input type='hidden' name='status' value='$status'><input type='submit' value='toggle'></form><form action='deleteUser.php' method='post'>
        <input type='hidden' name='name' value='$name'><input type='submit' value='Delete'></form></td></tr>";
			
		   
		}
		$row = $result->fetch_assoc();
	}
	closeConnection();
}
else {
	echo "<p>Could not connect to the database: " . $dbErrorCode;
}
?>

			</table>
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>







