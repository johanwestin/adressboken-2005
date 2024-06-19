<?php

// Inkludera nödvändiga filer. 
require_once("include/header.inc.php");
require_once("include/ungdomsrad.class.php"); 

// Skapa ny klass för att hantera alla ungdomsråden.
$ungdomsrad = new Ungdomsrad($db, "");

// Anropar funktionen 'delete' som raderar den posten med id't som hittar i $_GET. 
if(is_numeric($_GET['delete_id'])) {
	delete(addslashes($_GET['delete_id'])); 
}

// För att kunna redigera lr. radera poster måste man ha en cookie på datorn. 
// time()+(3600*3) betyder att cookien ska leva i tre timmar. 
setcookie("login", "1", time()+(3600*3));

// variablen $o visar i vilken ordning listan ska sorteras. 
$o = $_GET['o'];

// Kontrollera vad $o innehåller och lägg in i $order vilket fält det handlar om.
if($o == "l") {
	$order = "lan";
} elseif($o == "s") {
	$order = "stad";
} elseif($o == "n") {
	$order = "namn";
} else {
	$order = "id"; // om man inte vill sortera på ett bestämt fält kommer de sorteras efter id kolumnen. Dvs. de visas i den ordning som de lagt in. 
}


// Det finns fyra olika sökfält. Om någon av dem innehåller data ska programmet söka i respektive fält.
if($_GET['s'] || $_GET['n'] || $_GET['l'] || $_GET['f']) {

		// sök på namn.
		if($_GET['n']) {
			$search = $_GET['n'];
			$found = $ungdomsrad->search("namn", $search, $order);
		} 
		// sök på stad
		elseif($_GET['s']) {
			$search = $_GET['s'];
			$found = $ungdomsrad->search("stad", $search, $order);
		}
		// sök på län
		elseif($_GET['l']) {
			$search = $_GET['l']; 
			$found = $ungdomsrad->search("lan", $search, $order);
		}
		// fritext sök, dvs sök på alla fält i tabellen. 
		elseif($_GET['f']) {
			$search = $_GET['f']; 
			$found = $ungdomsrad->searchAll($search, $order);
			
		} 
		// om man inte fyllt i ett sök fält så visa hela listan, denna else-sats kan vara onödig. Men är 
		// här inkluderad 'för säkerthets skull'
		else {

		$found = $ungdomsrad->createList($order);
		}
} else {
	// om man inte fyllt i något sökfält så visas hela listan. denna else-sats är inte onödigt utan absolut nödvändig
	// annars kommar sidan bara innehålla sökfälten när man initialt laddar den. 
	$found = $ungdomsrad->createList($order);
}


// SETUP TEMPLATE ----------------------------------------------------------
$body->set('list', $found); 

// inkludera fot-filen som innehåller en hel del saker som rör template-motorn. 
require_once("include/footer.inc.php"); 
?>
