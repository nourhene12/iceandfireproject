<?php
class livreur{
	private $id;
	private $nom;
	private $prenom;
	private $cin;
	private $numero;
	function __construct($nom,$prenom,$cin,$numero){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->cin=$cin;
		$this->numero=$numero;
	}
	
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getcin(){
		return $this->cin;
	}
	function getnumero(){
		return $this->numero;
	}

	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setcin($cin){
		$this->cin=$cin;
	}
	function setnumero($numero){
		$this->numero=$numero;
	}
	
		
	}
	

	
?>