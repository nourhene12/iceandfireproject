<?PHP
class Client{
	private $ID;
	private $Nom;
	private $Prenom;
	private $CIN;
	private $Tel;
	private $mail;
	private $PWD;
	private $Photo;
	
	function __construct ()
	{
		$this->db = new Config();
$this->db =$this ->db->connect();
		
	}
	
	function getID(){
		return $this->ID;
	}
	function getCin(){
		return $this->CIN;
	}
	function getNom(){
		return $this->Nom;
	}
	function getPrenom(){
		return $this->Prenom;
	}
	function getmail(){
		return $this->mail;
	}
	function getTel(){
		return $this->Tel;
	}
	function getPWD(){
		return $this->PWD;
	}
	function getPhoto(){
		return $this->Photo;
	}



	function setNom($Nom){
		$this->Nom=$Nom;
	}
	function setPrenom($Prenom){
		$this->Prenom=$Prenom;
	}
	function setCin($CIN){
		$this->CIN=$CIN;
	}
	function setmail($mail){
		$this->mail=$mail;
	}
	function setPWD($PWD){
		$this->PWD=$PWD;
	}
	function setTel($Tel){
		$this->Tel=$Tel;
	}
	function setPhoto($Photo){
		$this->Photo=$Photo;
	}
	function setID($ID){
		$this->ID=$ID;
	}
	
}

?>