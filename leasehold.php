<!DOCTYPE html>
<!-- 
	The details page of the site.
-->
<?php
require 'userSession.php';
require 'pageElements.php';
require 'database.php';
// recover the form data
$title = trim($_POST['properties']);

$dbname = ("563325");
$query = "SELECT DISTINCT title, property_type, tenure, bedrooms
					FROM properties 
					WHERE property_type = '$title'";
?>



<html>
   <head>
      <title>Search Results</title>
      <?php writeCommonStyles(); ?>		
   </head>  
    
   <body>
	<div id="container">
      <div id="header"><?php displaySignIn(); ?><h1>Search Results</h1></div>
	  <?php displayMenu(PROPERTIES); ?>
      <div id="content" style="overflow:auto;">
 	     <h1>Results</h1>
 		 <p>Here are the results you searched for!

		 <?php
            if (connectToDb($dbname)) {
	        $result = $dbConnection->query($query);
	        $row = $result->fetch_assoc();
			   
            if ($result->num_rows <= 0) {
		       echo '<br>No matches found';
		    }
	        else{
			   echo '<table class="properties">';
			   echo '<tr>
			            <th>Title</th>
						<th>Property type</th>
						<th>Tenure</th>
						<th>Bedrooms</th>
                     </tr>';
		       while ($row) {
				  $title = $row['title'];
		          $type = $row['property_type'];
		          $tenure = $row['tenure'];
				  $bedrooms = $row['bedrooms'];
		          echo "<tr>
				         <td>$title</td>
					     <td>$type</td>
						 <td>$tenure</td>
						 <td>$bedrooms</td>
					    </tr>";
		           $row = $result->fetch_assoc();
	           }
	        }
	        
	        closeConnection();
		}
         else {
	        echo '<p>Could not connect to the database: ';
         }
		 echo'</table>';
	     ?>
		</div>
  	  </div>
      <div><?php displayFooter();?></div>
    </body>    
</html>