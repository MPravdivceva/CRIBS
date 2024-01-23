<!DOCTYPE html>

<?php
require 'userSession.php';
require 'pageElements.php';
require 'database.php';
?>

<html>
    <head>
        <title>PHP Uploads</title>
    
<?php writeCommonStyles(); ?>		
		
    </head>  
    
    <body>
        <div id="container">
            
            <div id="header"><?php displaySignIn(); ?><h1>Uploads</h1></div>

			<?php displayMenu(UPLOADS); ?>

            <div id="content" style="overflow:auto;">
			
			<h1>Uploading an image</h1>
			
			<p>Please Upload an Image here.</p>
			
			<form action="PerformUpload.php" method="post" enctype="multipart/form-data">
			  Select image to upload:
			  <input type="file" name="fileToUpload" id="fileToUpload">
			  <input type="submit" value="Upload Image" name="submit">
			</form>
			
			</div>

            <?php displayFooter();?>
        
        </div>
    
    </body>    
</html>







