<?php
class produits{
	private $id;
	private $nom;
	private $type;
	private $prix;
	private $photo;
	
function __construct($nom,$type,$prix,$photo){
		$this->nom=$nom;
		$this->type=$type;
		$this->prix=$prix;
		$this->photo=$photo;
	}
	
	function getnom(){
		return $this->nom;
	}
	function gettype(){
		return $this->type;
	}
	function getprix(){
		return $this->prix;
	}
	function getphoto(){
		return $this->photo;
	}

	function setnom($nom){
		$this->nom=$nom;
	}
	function settype($type){
		$this->type=$type;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function setphoto($photo){
		$this->photo=$photo;
	}
	
		
	}
	

	
?>