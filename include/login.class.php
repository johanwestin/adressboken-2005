<?php
class Login {

	private $cPassword; 
	private $ePassword; 
	private $id;
	private $db;

	public function __construct($value, $db) {

			$this->ePassword = $value;
			$this->db = $db;
	}
		
	public function checkAdminPassword($password) {
		$this->cPassword = $this->quote_smart($password);
		$this->encryptPassword(); 

		
		if($this->ePassword == md5("qaz147")) //lösenordet 'qaz147' går inte att ändra. Utan måste ändras här 
		{
			return true; 
		}
		

	}		
		
	public function checkPassword() {

			$password  = $this->quote_smart($this->ePassword);
			$query = "SELECT id FROM ungdomsrad WHERE password = '$password'"; 
			$result = mysql_query($query) or die($query);		
		
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
			{
				if($password == $row['password']) 
				{
					return $row['id'];
				} else {
					return false;			
				} 
			}
			
	}
	
	private function encryptPassword() {
		$this->ePassword = md5($this->cPassword);
	}
	
	
	/* MySQl validate */
	// Quote variable to make safe
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
	
}
?>
