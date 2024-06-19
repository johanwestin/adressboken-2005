<?php
class Ungdomsrad { 

private $id;
private $db;

// Alla veriabler som kommer behövas för den här klassen. 
// Om man vill köra detta skript i en php4 miljö kan man inte använda private. 
private $namn, $stad, $lan, $hemsida, $epost, $antal, $ansluter;
private $vuxen_namn, $vuxen_telefon, $vuxen_epost, $vuxen_mobil;
private $ungdom_namn, $ungdom_telefon, $ungdom_epost, $ungdom_mobil;
private $adress_namn, $adress_gata, $adress_postnr, $adress_stad;
private $verksamhet, $presentation, $wiki, $password;
private $medlem; 


// Konstruktorn för klassen. 
// !! -- I php4 så måste man byta namn på den här klassen till "ungdomsrad" för det
// !! -- för det ska fungera då det är så konstruktorn i php4 funkar. 
function __construct($db,$id) {
	$this->db = $db;
	if($id)$this->setId($id);
	
}
	
/* MySQl validate */
// en simpel funnktion som syfter till att
// det inte ska slinka in några farliga tecken i SQL strängarna
// som kan hota databasen och dess säkerhet. 
function quote_smart($value)
{
   // Stripslashes
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   // Quote if not integer
   if (!is_numeric($value)) {
       $value = mysql_real_escape_string($value);
   }
   return $value;
}


// function getData
// privat funktion som markerar det ungdomsråd med id $this->id 
// och sedan sätter upp klassvariblerna till rätt värden. 
private function getData() {
	$query = "SELECT * FROM ungdomsrad WHERE id = " . $this->id;
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
		$this->setNamn($row['namn']);
		$this->setStad($row['stad']);
		$this->setLan($row['lan']);
		$this->setHemsida($row['hemsida']);
		$this->setEpost($row['epost']);
		$this->setAntal($row['antal']);
		$this->setAnsluter($row['ansluter']);
		$namn = $row['vuxen_namn']; $epost = $row['vuxen_epost'];
		$telefon = $row['vuxen_telefon']; $mobil = $row['vuxen_mobil'];
		$this->setKontaktVuxen($namn, $epost, $telefon, $mobil); 
		$this->setKontaktUngdom($row['ungdom_namn'], $row['ungdom_epost'], $row['ungdom_telefon'], $row['ungdom_mobil']);
		$this->setAdress($row['adress_namn'], $row['adress_gata'], $row['adress_postnr'], $row['adress_stad']);
		$this->setVerksamhet($row['verksamhet']);
		$this->setPresentation($row['presentation']);
		$this->setMedlem($row['medlem']);

		// kontrollerar om det i dagsläget finns ett lösenord. Och om det inte
		// gör det så skapas här ett lösenord för valt u-råd.
		if(!$row['password'] == "") {
			$this->password = $row['password'];
		} else {
			$this->setPassword(); // den private funktionen setPassword anropas för att skapa lösenordet. 
		}
		$this->setWiki($row['wiki']);
	}


	
}

// function: setData
// skapar en sql sträng som sedan alla klass varibaler läggs in i. 
// kontrollerar också om det är ett nytt ungdomsråd som ska läggas in
// eller om ett befintligt ska uppdateras. detta gör genom att
// om det finns ett värde i $this->id så är det ett befintligt
// som ska uppdateras. Annars skapas ett nytt. 
public function setData() {
	
	if($this->id == "") {
		$this->setPassword(); // Generera ett lösenord till rådet. 

		$sql = "INSERT INTO `ungdomsrad` (`id`, `namn`, `stad`, `lan`, `hemsida`, `epost`, `antal`, `ansluter`, `vuxen_namn`, `vuxen_epost`, `vuxen_telefon`, `vuxen_mobil`, `ungdom_namn`, `ungdom_epost`, `ungdom_telefon`, `ungdom_mobil`, `adress_namn`, `adress_gata`, `adress_postnr`, `adress_stad`, `verksamhet`, `presentation`, `medlem`, `password`, `wiki`) 
		VALUES (NULL,
		 '".$this->quote_smart($this->namn)."',
		 '".$this->quote_smart($this->stad)."',
		 '".$this->quote_smart($this->lan)."',
		 '".$this->quote_smart($this->hemsida)."',
		 '".$this->quote_smart($this->epost)."',
		 '".$this->quote_smart($this->antal)."',
		 '".$this->quote_smart($this->ansluter)."',
		 '".$this->quote_smart($this->vuxen_namn)."',
		 '".$this->quote_smart($this->vuxen_epost)."',
		 '".$this->quote_smart($this->vuxen_telefon)."',
		 '".$this->quote_smart($this->vuxen_mobil)."',
		 '".$this->quote_smart($this->ungdom_namn)."',
		 '".$this->quote_smart($this->ungdom_epost)."',
		 '".$this->quote_smart($this->ungdom_telefon)."',
		 '".$this->quote_smart($this->ungdom_mobil)."',
		 '".$this->quote_smart($this->adress_namn)."',
		 '".$this->quote_smart($this->adress_gata)."',
		 '".$this->quote_smart($this->adress_postnr)."',
		 '".$this->quote_smart($this->adress_stad)."',
		 '".$this->quote_smart($this->verksamhet)."',
		 '".$this->quote_smart($this->presentation)."',
		 '".$this->quote_smart($this->medlem)."', 
		 '".$this->quote_smart($this->password)."', 
	 	'".$this->quote_smart($this->wiki)."');";
	
		// mysql get last inserted id. 

	} else {
		$sql = "UPDATE `ungdomsrad` SET 
		`namn` = '".$this->quote_smart($this->namn)."',
		`stad` = '".$this->quote_smart($this->stad)."',
		`lan` = '".$this->quote_smart($this->lan)."',
		`hemsida` = '".$this->quote_smart($this->hemsida)."',
		`epost` = '".$this->quote_smart($this->epost)."',
		`antal` = '".$this->quote_smart($this->antal)."',
		`ansluter` = '".$this->quote_smart($this->ansluter)."',
		`vuxen_namn` = '".$this->quote_smart($this->vuxen_namn)."',
		`vuxen_epost` = '".$this->quote_smart($this->vuxen_epost)."',
		`vuxen_telefon` = '".$this->quote_smart($this->vuxen_telefon)."',
		`vuxen_mobil` = '".$this->quote_smart($this->vuxen_mobil)."',
		`ungdom_namn` = '".$this->quote_smart($this->ungdom_namn)."',
		`ungdom_epost` = '".$this->quote_smart($this->ungdom_epost)."',
		`ungdom_telefon` = '".$this->quote_smart($this->ungdom_telefon)."',
		`ungdom_mobil` = '".$this->quote_smart($this->ungdom_mobil)."',
		`adress_namn` = '".$this->quote_smart($this->adress_namn)."',
		`adress_gata` = '".$this->quote_smart($this->adress_gata)."',
		`adress_postnr` = '".$this->quote_smart($this->adress_postnr)."',
		`adress_stad` = '".$this->quote_smart($this->adress_stad)."',
		`verksamhet` = '".$this->quote_smart($this->verksamhet)."',
		`presentation` = '".$this->quote_smart($this->presentation)."',  
		`medlem` = '".$this->quote_smart($this->medlem)."',  
		`password` = '".$this->quote_smart($this->password)."', 
		`wiki` = '".$this->quote_smart($this->wiki)."' 
		WHERE `id` = ".$this->quote_smart($this->id)." LIMIT 1 ;";
	}
	
	// kör den skapade sql satsen. 
	$result = mysql_query($sql) OR die(mysql_error());
}




/* Set Functions */
// anledningen till att jag valt att lägga in data i klassvariablerna på detta sätt istället för att
// ropa på dem direkt från getData() är att i ett senare skede även kunna läga in med advanserad validering på varje fält. 



/* När setId har sätts så plocka automatiskt ut data ur sql databasen */
public function setId($id) {
	$this->id = $id; 
	$this->getData(); 
}

public function setPassword() {
	$this->password = md5(rand(1000000,9999999));
}

public function setNamn($i) {
	$this->namn = $i;
}

public function setStad($i) {
	$this->stad = $i;
}

public function setLan($i) {
	$this->lan = $i;
}

public function setHemsida($i) {
	$this->hemsida = $i; 
}

public function setEpost($i) {
	$this->epost = $i; 
} 

public function setAntal($i) {
	$this->antal = $i; 
}

public function setAnsluter($i) {
	$this->ansluter = $i;
}

public function setMedlem($i) {
	if($i == true) {
		$this->medlem = 1;
	} else {
		$this->medlem = 0; 
	}
}

public function setKontaktVuxen($i, $j, $k, $l) {
	$this->vuxen_namn = $i;
	$this->vuxen_epost = $j;
	$this->vuxen_telefon = $k; 
	$this->vuxen_mobil = $l;
}

public function setKontaktUngdom($namn, $epost, $telefon, $mobil) {
	$this->ungdom_namn = $namn;
	$this->ungdom_epost = $epost; 
	$this->ungdom_telefon = $telefon; 
	$this->ungdom_mobil = $mobil; 
}

public function setAdress($namn, $gata, $postnr, $stad) {
	$this->adress_namn = $namn;
	$this->adress_gata = $gata;
	$this->adress_postnr = $postnr;
	$this->adress_stad = $stad; 
}

public function setVerksamhet($i) {
	$this->verksamhet = $i;
}

public function setPresentation($i) {
	$this->presentation = $i;
}

public function setWiki($i) {
	$this->wiki = $i;
}

/* Get functions */

public function getId() {
	return $this->id; 
}


public function getNamn() { //ungdomsrådets namn
	return $this->namn;
}

public function getPassword() { //lösenord
	return $this->password;
}

public function getStad() { //stad
	return $this->stad;
}

public function getLan() { //län
	return $this->lan;
}

public function getHemsida() {
	return $this->hemsida;
}

public function getEpost() {
	return $this->epost;
}

public function getAntal() { //antal
	return $this->antal; 
}

public function getAnsluterMedlemmar() {
	return $this->ansluter;
}

public function getKontaktVuxen() { //namn, epost, telefon, mobil
	return array($this->vuxen_namn, $this->vuxen_epost, $this->vuxen_telefon, $this->vuxen_mobil);
}
	
public function getUngdomsKontakt() { //namn, epost, telefon, mobil
	return array($this->ungdom_namn, $this->ungdom_epost, $this->ungdom_telefon, $this->ungdom_mobil);
}

public function getAdress() { // namn, gata, postnr, stad
	return array($this->adress_namn, $this->adress_gata, $this->adress_postnr, $this->adress_stad); 
}
	
public function getWiki() {
	return $this->wiki;
}

public function getVerksamhet() {
	return $this->verksamhet;  
}

public function getPresentation() {
	return $this->presentation;
}

/* Get all and output into an array */
public function getAll() {
	$i['namn'] = $this->namn;
	$i['stad'] = $this->stad; 
	$i['lan'] = $this->lan;
	$i['hemsida'] = $this->hemsida; 
	$i['epost'] = $this->epost;
	$i['antal'] = $this->antal;
	$i['ansluter'] = $this->ansluter;
	$i['vuxen_namn'] = $this->vuxen_namn;
	$i['vuxen_epost'] = $this->vuxen_epost;
	$i['vuxen_telefon'] = $this->vuxen_telefon;
	$i['vuxen_mobil'] = $this->vuxen_mobil;
	$i['ungdom_namn'] = $this->ungdom_namn;
	$i['ungdom_epost'] = $this->ungdom_epost;
	$i['ungdom_telefon'] = $this->ungdom_telefon;
	$i['ungdom_mobil'] = $this->ungdom_mobil; 
	$i['adress_namn'] = $this->adress_namn;
	$i['adress_gata'] = $this->adress_gata;
	$i['adress_postnr'] = $this->adress_postnr;
	$i['adress_stad'] = $this->adress_stad;
	$i['wiki'] = $this->wiki;
	$i['verksamhet'] = $this->verksamhet;
	$i['presentation'] = $this->presentation;
	$i['medlem'] = $this->medlem; 	
	return $i;
}

// Create list

public function createList($order) {
	if(!$order) $order = "id"; //säkerthetsfunktion utifall det inte är bestämt någon ordning så sorteras det efter 'id'
	$query = "SELECT * FROM ungdomsrad ORDER BY $order ASC";
	$result = mysql_query($query);
	
	$x = 0;	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$i[$x++] = $this->getListItems($row);
	}
	
	return $i;
}

// createMemberList används inte . Men jag vill spara den 
// när applikationen blir mer komplicerad kan de vara bra att ha. 

/*
public function createMemberList($order) {
	if(!$order) $order = "id";
	$query = "SELECT id FROM ungdomsrad WHERE medlem != NULL OR medlem != 0 ORDER BY $order ASC";
	$result = mysql_query($query);
	
	$x = 0;	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$this->id = $row['id'];
		$this->getData(); 
		$i[$x++] = $this->getListItems();

	}
	
	return $i;
}
*/

public function getListItems($row) {
			
	$i['id'] = $row['id'];
	$i['namn'] = $row['namn'];
	$i['stad'] = $row['stad'];
	$i['lan'] = $row['lan'];
	$i['medlem'] = $row['medlem'];

	return $i;
}



public function search($field, $search, $order) {


	$search = $this->quote_smart("%" . str_replace("*", "%", $search) . "%");
	$order = $this->quote_smart($order);
	$field = $this->quote_smart($field); 
	$query = "SELECT * FROM ungdomsrad WHERE $field LIKE '$search' ORDER BY $order ASC";
	$result = mysql_query($query) or die(mysql_error);
	
	$i = array();
	$x = 0; 
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$i[$x++] = $this->getListItems($row); 		
	}

	return $i;
}

public function searchAll($search, $order) {
	// normalt sett använder man * för att söka, men i sql nyttjar man %. 
	$search = $this->quote_smart("%" . str_replace("*", "%", $search). "%");

	$sql = "SELECT * FROM `ungdomsrad` 
	WHERE `id` LIKE '$search'
	OR `namn` LIKE '$search'
	OR `stad` LIKE '$search'
	OR `lan` LIKE '$search'
	OR `hemsida` LIKE '$search'
	OR `epost` LIKE '$search'
	OR `wiki` LIKE '$search'
	OR `antal` LIKE '$search'
	OR `ansluter` LIKE '$search'
	OR `vuxen_namn` LIKE '$search'
	OR `vuxen_epost` LIKE '$search'
	OR `vuxen_telefon` LIKE '$search'
	OR `vuxen_mobil` LIKE '$search'
	OR `ungdom_namn` LIKE '$search'
	OR `ungdom_epost` LIKE '$search'
	OR `ungdom_telefon` LIKE '$search'
	OR `ungdom_mobil` LIKE '$search'
	OR `adress_namn` LIKE '$search'
	OR `adress_gata` LIKE '$search'
	OR `adress_postnr` LIKE '$search'
	OR `adress_stad` LIKE '$search'
	OR `verksamhet` LIKE '$search'
	OR `presentation` LIKE '$search';";

	$result = mysql_query($sql) or die(mysql_error);

	$i = array(); // definera $i som en array. 
	$x = 0; 
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$i[$x++] = $this->getListItems($row); 		
	}

	return $i;
}

}

?>
