<!DOCTYPE html>
<!-- 
	The details page of the site.
-->
<?php
require 'PageElements.php';
?>

<html>
   <head>
      <title>Property Search</title>
      <?php writeCommonStyles(); ?>		
   </head>  
    
   <body>
	<div id="container">
      <div id="header"><?php displaySignIn(); ?><h1>Search</h1></div>
	  <?php displayMenu(PROPERTIES); ?>
      <div id="content" style="overflow:auto;">
 	     <h1>Search For Property</h1>
 		 <p>Please enter a property details in the search bar below
		 <form action="freehold.php" name="propertiesSearchForm" method="post">
		    <table>
			   <tr>
				  <td padding-right: 300px>Please enter a <b>Property Tenure Type(Freehold or Leasehold)</b>:</td>
				  <td><input type="text" name="properties"></td>
				  <td><input type="submit" value="Property Search"></td>
			   </tr>
		 </form>
		 </table>
		 
		 <form action="leasehold.php" name="propertiesSearchForm" method="post">
		    <table>
			   <tr>
				  <td padding-right: 300px>Please enter a <b>Property Type(Apartment,House,Villa,Condo)</b>:</td>
				  <td><input type="text" name="properties"></td>
				  <td><input type="submit" value="Property Search"></td>
			   </tr>
		 </form>
		 </table>
		
		 <form action="bedroom.php" name="propertiesSearchForm" method="post">
		    <table>
			   <tr>
				  <td padding-right: 300px>Please enter <b>Number of Bedrooms(1-6)</b>:</td>
				  <td><input type="text" name="properties"></td>
				  <td><input type="submit" value="Property Search"></td>
			   </tr>
		 </form>
		 </table>
		 
		 <form action="propertytitle.php" name="propertiesSearchForm" method="post">
		    <table>
			   <tr>
				  <td padding-right: 300px>Please enter a <b>Property Title</b>:</td>
				  <td><input type="text" name="properties"></td>
				  <td><input type="submit" value="Property Search"></td>
			   </tr>
		 </form>
		 </table>
		 </div>
  	  </div>
      <div><?php displayFooter();?></div>
    </body>    
</html>