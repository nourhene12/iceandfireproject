<?php
class categories{
	private $id;
	private $nom;
function __construct($id,$nom){
		$this->nom=$nom;
		$this->id=$id;
	}
	function getid(){
		return $this->id;
	}

	function setid($id){
		$this->id=$id;
	}
	
	function getnom(){
		return $this->nom;
	}

	function setnom($nom){
		$this->nom=$nom;
	}

}
	
?>