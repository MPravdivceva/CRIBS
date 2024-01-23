 <!DOCTYPE html>
<!-- 
	The registration page of the site. Provides a form to be processed by procesReg.php
-->
<?php
require 'database.php';
require 'pageElements.php';

ini_set('session.use_strict_mode', 1);
session_start();
?>

<html>
    <head>
        <title>PHP Forms</title>

<?php writeCommonStyles(); ?>		
		
		<script src="js/validateRegForm.js" type="text/javascript"></script>
    </head>  
    
    <body>
        <div id="container">
		
            <div id="header"></div>

			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>User Registration</h1>
			
<?php
// if there is an error from the previous registration attempt then display it
if (isset($_SESSION['errorMsg'])) {
	$errorMsg = $_SESSION['errorMsg'];
	echo "<p>$errorMsg";
	unset($_SESSION['errorMsg']);
}
?>

			<form action="processReg.php" name="registrationForm" method="post">
			<table class="twoColForm">
			<tr><td>Please pick a user name:</td><td><input type="text" name="userName" required></td></tr>
			<tr><td>Please enter a password:</td><td><input type="password" name="pw" required></td></tr>
			<tr><td>Please retype your password:</td><td><input type="password" name="pwcheck" required></td></tr>
			<tr><td colspan="2"><input type="submit" value="Register"></td></tr>
			</table>
			</form>
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>
