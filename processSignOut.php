<?php
/* Sign out from a session on the site.
*/
ini_set('session.use_strict_mode', 1);
session_start();

session_unset();
session_destroy();
header('Location:index.php');
?>