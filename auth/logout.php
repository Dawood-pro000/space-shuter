<?php
// logout.php
session_start();
$_SESSION = array();
session_destroy();
include_once __DIR__ . '/../templates/bootstrap.php';
header("Location: ../index.php");
exit;
