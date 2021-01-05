<?php
//memulai session login
session_id("login");
session_start();


// destroy session login saja
// session vote akan terus berjalan, karena mencatat data dari
// setiap user
session_destroy();

// Redirect to login page
header("location: index.php");
exit;
