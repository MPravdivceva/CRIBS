<?php
/* The functions defined in this file are used to create various 
   structural elements in the pages.
   
*/

/* Constants defining the top level menu items in the site
   Note that the numerical values of these constants need to
   match up with the menuItems array defined in the displayMenu
   function.
*/
const HOME = 0;
const DETAILS = 1;
const ABOUT = 2;
const CONTACT = 3;
const PROPERTIES = 4;
const UPLOADS = 5;
const ADMIN = 6; 


function writeCommonStyles()
{
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<?php	
}

/* Display the menu in a page.
*/
function displayMenu($section)
{
	global $adminLevel;
	
	// the top level menu items are stored as an array
	if ($adminLevel < 1) {
		$menuItems = array('<a href="index.php" id="Home">Home</a>',
						   '<a href="details.php" id="Details">Details</a>',
						   '<a href="about.php" id="MenuItem2">About</a>',
						   '<a href="contact.php" id="Contact">Contact</a>',
						   '<a href="properties.php" id="Properties">Properties</a>');
							//<ul>
								//<li><a href="freehold.php" id="Freehold">Freehold</a>
								//<li><a href="leasehold.php" id="Leasehold">Leasehold</a>
								//<li><a href="bedroom.php" id="Bedroom">Bedroom</a>
								//<li><a href="propertytitle.php" id="Propertytitle">Propertytitle</a>
							//</ul>');
	}
	else {
		$menuItems = array('<a href="index.php" id="Home">Home</a>',
						   '<a href="details.php" id="Details">Details</a>',
						   '<a href="about.php" id="MenuItem2">About</a>',
						   '<a href="contact.php" id="Contact">Contact</a>',
						   '<a href="properties.php" id="Properties">Properties</a>',
							//<ul>
								//<li><a href="freehold.php" id="Freehold">Freehold</a>
								//<li><a href="leasehold.php" id="Leasehold">Leasehold</a>
								//<li><a href="bedroom.php" id="Bedroom">Bedroom</a>
								//<li><a href="propertytitle.php" id="Propertytitle">Propertytitle</a>
							//</ul>',
						   '<a href="uploads.php" id="Uploads">Uploads</a>',
						   '<a href="admin.php" id="Admin">Admin</a>');
	}
	
	// write the opening structure of the menu
	echo '<div id="menu">
			<div class="menuBackground">
				<ul class="dropDownMenu">';
				
	// write the individual menu items
	$menuCount = count($menuItems);
	for ($i = 0; $i < $menuCount; $i++) {
		echo "\n<li";
		if ($section == $i) { // if an item is selected, add the correct class spec
			echo " class='selected'";
		}
		echo ">" . $menuItems[$i];
	}
	
	// write the closing structure of the menu
	echo "\n</ul>
			</div>
		</div>";
}

/* Display the footer information.
*/
function displayFooter()
{
	echo "<div id='footer'>© 2023 Cribs Limited. All rights reserved. <span id='cctext'>Forth Valley College</span></div>";
}

/* Display the user form. If the user has not signed in, then this will be a sign-in
   form asking for their name. If they are signed in, it will be a sign-out form.
*/
function displaySignIn()
{
	// need to specify we want to access the global variable
	global $userName;
	
	// if there is no username set then we need to offer the sign in form or registration link
	if ($userName == '') {
		echo '<span id="signin"><form action="processSignIn.php" name="signInForm" onsubmit="return validateUserName(\'signInForm\');" method="post"><table border="0"><tr><td align="right">Please enter your user name:</td><td><input type="text" name="userName" required></td></tr><tr><td align="right">Password:</td><td><input type="password" name="pw" required></td></tr><tr><td colspan="2" align="right"><input type="submit" value="Sign In!"></td></tr></table></form><br>or <a href="registration.php">register here...</a></span>';
	}
	else { // otherwise, we offer the sign out form
		echo '<span id="signout"><form action="processSignOut.php" method="post">Welcome ' . $userName . ' <input type="submit" value="Sign Out"></form></span>';
	}
}
?>