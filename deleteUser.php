<?php
require 'userSession.php';
require 'database.php';

// Check if the user name is provided
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    
    // Connect to the database
    if (connectToDb('563325')) {
        // Sanitize the user name to prevent SQL injection
        $name = sanitizeString($name);
        
        // Delete associated records from UserActions table
        $sqlQueryActions = "DELETE FROM UserActions WHERE UserId IN (SELECT UserId FROM Users WHERE UserName='$name')";
        $resultActions = $dbConnection->query($sqlQueryActions);
        
        if ($resultActions) {
            // Delete the user from the Users table
            $sqlQueryUsers = "DELETE FROM Users WHERE UserName='$name'";
            $resultUsers = $dbConnection->query($sqlQueryUsers);
            
            if ($resultUsers) {
                // User deleted successfully
                header('Location: admin.php');
                exit();
            } else {
                // Error occurred while deleting the user from the Users table
                $_SESSION['errorMsg'] = "There was a problem deleting the user.";
                header('Location: admin.php');
                exit();
            }
        } else {
            // Error occurred while deleting associated records from UserActions table
            $_SESSION['errorMsg'] = "There was a problem deleting associated records.";
            header('Location: admin.php');
            exit();
        }
        
        closeConnection();
    } else {
        $_SESSION['errorMsg'] = "Could not connect to the database: " . $dbErrorCode;
        header('Location: admin.php');
        exit();
    }
} else {
    // User name not provided, redirect to admin page
    header('Location: admin.php');
    exit();
}
?>
