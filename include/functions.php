<?php
// Function för att radera en post. 
function delete($delete_id) { 

//	if(!$_GET['confirm']) {
//		echo "Är du säker på att du vill radera ungdomsrådet från listan?<br/>";
//		echo "<a href=\"?delete_id=".$delete_id."&confirm=1\">Ja</a> / <a href=\"?\">Nej</a>";
//		die();
//	}

//	if($_GET['confirm']) { 
		$id = addslashes($_GET['delete_id']);
		$query = "DELETE FROM ungdomsrad WHERE id = '$delete_id' LIMIT 1";
		$result = mysql_query($query);
//	}
}

?>
