<?php
require_once("include/header.inc.php");
require_once("include/ungdomsrad.class.php"); 
$ungdomsrad = new Ungdomsrad($db, "");

if(is_numeric($_GET['delete_id'])) {
	delete(addslashes($_GET['delete_id'])); 
}


$o = $_GET['o'];
if($o == "l") {
	$order = "lan";
} elseif($o == "s") {
	$order = "stad";
} elseif($o == "n") {
	$order = "namn";
} else {
	$order = "id";
}


// SETUP TEMPLATE ----------------------------------------------------------
$body->set('list', $ungdomsrad->createList($order)); 

require_once("include/footer.inc.php"); 
?>
