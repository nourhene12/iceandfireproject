<?php
class catégories{
	private $id;
	private $nom;
function __construct($nom){
		$this->nom=$nom;
	}
	
	function getnom(){
		return $this->nom;
	}

	function setnom($nom){
		$this->nom=$nom;
	}

}
	
?>