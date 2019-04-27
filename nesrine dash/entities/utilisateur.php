<?PHP
class utilisateur{
	private $id;
	
	private $email;
	
	private $mdp;
	



	function __construct($email,$mdp)
	{
		
		$this->email=$email;
        $this->mdp=$mdp;
		
	}


	
	function getId(){
		return $this->id;
	}
	
	function getEmail(){
		return $this->email;
	}
	
	function getMdp(){
		return $this->mdp;
	}
	
	function setId($id){
		$this->id=$id;
	}

	
	function setEmail($email){
		$this->email=$email;
	}
	
	function setMdp($mdp){
		$this->mdp=$mdp;
	}
	
	
}












?>