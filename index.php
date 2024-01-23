<!DOCTYPE html>
<!-- 
	The front page of the site.
-->
<?php
require 'userSession.php';
require 'pageElements.php';
?>

<html>
    <head>
        <title>Home</title>

<?php writeCommonStyles(); ?>		
		
		<script src="js/validateForm.js" type="text/javascript"></script>
		<script type="text/javascript">
		function displayError(msg) {
			alert("Problem signing in: "+msg);
		}
		</script>
    </head>  
    
    <body 
<?php
	// check for a sign in error and post an alert if necessary
	$errMsg = null;
	if (isset($_SESSION['errorMsg'])) {
		$errMsg = $_SESSION['errorMsg'];
		echo "onload='displayError(\"$errMsg\");'";
		unset($_SESSION['errorMsg']);
	}
?>
	>
        <div id="container">
            <div id="header"><?php displaySignIn(); ?></div>
			<?php displayMenu(HOME); ?>

            <div id="content" style="overflow:auto;">
			
			<h3>Find your new home to rent on Cribs website</h3>

			<p>With the UK's largest selection of rental properties across England, Scotland and Wales, 
			<p>you're more likely to find your next home on Cribs website than anywhere else.
			<p>Listing a wide range of property types and styles,
			<p>we cover everything from student lettings, to studio flats, 
			<p>detached family homes and even luxury Mayfair penthouses.
			
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>
