<!DOCTYPE html>
<?php
require 'userSession.php';
require 'pageElements.php';
?>

<html>
    <head>
        <title>Contact Us</title>
    
<?php writeCommonStyles(); ?>		
		
    </head>  
    
    <body>
        <div id="container">
            
            <div id="header"><?php displaySignIn(); ?><h1>Contact Us</h1></div>

			<?php displayMenu(CONTACT); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Contact Us</h1>
			
			<p>Get in touch with an agent. And book an in-person valuation for a more accurate result.
			<p>Email: cribs@gmail.com
			<p>Telephone: 07123456789
			<p>Location: Grangemouth Rd, Falkrik, FK2
			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6494.981089369407!2d-3.768079025026819!3d56.00220567225144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488862c5c647a2c3%3A0x20a7b86393519eab!2sForth%20Valley%20College%2C%20Falkirk!5e0!3m2!1sen!2suk!4v1653344341500!5m2!1sen!2suk" width="200" height="130" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>







