<?php
require_once("include/header.inc.php");
require_once("include/ungdomsrad.class.php"); 
require_once("include/login.class.php"); 

// hämta lösenordet grå adressfältet ($_GET)
$password = $_GET['pass'];

// skapa ett objekt som heter $user
$user = new Login($password, $db);

// checkPassword retunerar ett id för de ungdsområd med angivet lösenord.
// om det inte finns något ungdomsråd med angivet lösenord så får $_GET['id'] värdet null. 
$_GET['id'] = $user->checkPassword();

// om det är värdet null eller false. avbryt scriptet. 
if($_GET['id'] == false) {
	die('Lösenordet är felaktigt!');
}


if($_POST || $_GET) {
	if(is_numeric($_GET['id']) && $_POST['submit'] != "Spara") {
		$id = $_GET['id'];
		$ungdomsrad = new Ungdomsrad($db, $id);
		$ungdomsrad->setId($id); 
		$info = $ungdomsrad->getAll(); 

	} else {
		if(is_numeric($_GET['id'])) {
			$id = $_GET['id'];	
			$ungdomsrad = new Ungdomsrad($db, $id);

			$ungdomsrad->setNamn($_POST['namn']);
			$ungdomsrad->setStad($_POST['stad']);
			$ungdomsrad->setLan($_POST['lan']);
			$ungdomsrad->setWiki($_POST['wiki']);
			$ungdomsrad->setHemsida($_POST['hemsida']); 
			$ungdomsrad->setEpost($_POST['epost']);
			$ungdomsrad->setAnsluter($_POST['ansluter']);
			$ungdomsrad->setAntal($_POST['antal']);
			$ungdomsrad->setKontaktVuxen($_POST['vuxen_namn'], $_POST['vuxen_epost'], $_POST['vuxen_telefon'], $_POST['vuxen_mobil']);
			$ungdomsrad->setKontaktUngdom($_POST['ungdom_namn'], $_POST['ungdom_epost'],$_POST['ungdom_telefon'], $_POST['ungdom_mobil']);
			$ungdomsrad->setAdress($_POST['adress_namn'], $_POST['adress_gata'], $_POST['adress_postnr'], $_POST['adress_stad']);
			$ungdomsrad->setVerksamhet($_POST['verksamhet']);
			$ungdomsrad->setPresentation($_POST['presentation']);
			
			// Spara datan. Det är även här som den valideras.  
			$ungdomsrad->setData();

			// Gör det möjligt att visa ett meddelande om att rådet är
			// inlaggt
			$inlagt = 1;
		}
	}
		

}

// SETUP TEMPLATE ----------------------------------------------------------
$body->set('i', $info); 
$body->set('inlagt', $inlagt);
$body->set('password', $password);

require_once("include/footer.inc.php");
?>
