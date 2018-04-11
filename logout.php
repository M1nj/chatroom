<?php
session_start();
$_SESSION = array();// Erase every pieces of information in $_SESSION.
session_destroy(); // Then destroy the current session.

header("Location: index.php" ) ; // The user is sent back to the homepage.
?>