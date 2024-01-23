<!DOCTYPE html>
<?php
require 'userSession.php';
require 'pageElements.php';
?>

<html>
    <head>
        <title>About Us</title>
    
<?php writeCommonStyles(); ?>		
		
    </head>  
    
    <body>
        <div id="container">
            
            <div id="header"><?php displaySignIn(); ?><h1>About Us</h1></div>

			<?php displayMenu(ABOUT); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>About Us</h1>
			
			<p>Cribs is a new business start-up which markets properties for sale and rent. 
			
			
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>







