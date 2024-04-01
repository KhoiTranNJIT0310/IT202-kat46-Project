<?php
// Khoi Tran 
// April  4th 2024
// IT 202-002
// Phase 4 Assignment:  PHP Authentication and Delete SQL Data
// kat46@njit.edu 
session_start();

$_SESSION = [];  // Clear all session data from memory

session_destroy();     // Clean up the session ID

$login_message = 'You have been logged out.';

// Redirect to the main page

// include('login.php');
require_once("landing.php");

?>