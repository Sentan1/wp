<?php
include 'includes/db_connect.inc';
session_unset();
session_destroy();
session_start();
add_flash('success', 'You have been logged out.');
header('Location: index.php');
exit;
