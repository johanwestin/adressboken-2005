<?php
require_once("include/header.inc.php");
require_once("include/ungdomsrad.class.php");
$id = stripslashes($_GET['id']); 
$ungdomsrad = new Ungdomsrad($db, $id);


// SETUP TEMPLATE ----------------------------------------------------------
$body->set('info', $ungdomsrad->getAll()); 

require_once("include/footer.inc.php"); 
?>
