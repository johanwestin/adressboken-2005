<?php
if($_GET['logout'] == "true") {
	setCookie('login', null, 0);
	die('Du är utloggad.');
}

// SETUP DATABASE //
	require("config/db.php");

// SETUP FUNCTIONS //
	require("include/functions.php");

// SETUP TEMPLATE //
$template_path = "template/";

$template_name = 1;

$template_path = $template_path . $template_name . "/";

require_once('include/Template.class.php');
$tpl = & new Template($template_path); // This is the outter template
$tpl->date = $date;
$body = & new Template($template_path); // This is the inner template
$body->date = $date;
$page_name_full = basename($_SERVER['REQUEST_URI']);
$page_name = explode(".",$page_name_full);