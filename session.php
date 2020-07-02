<?php
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} else {
    session_start();
}
// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: http://".$_SERVER['HTTP_HOST']."/login");
    exit;
}
