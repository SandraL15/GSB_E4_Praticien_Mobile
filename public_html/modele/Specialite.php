<?php
class Specialite{
	private $code;
	private $libelle;
                
	function __construct($code,$libelle){
		$this->code = $code;
		$this->libelle = $libelle;

	}
	
	public function getCodeS(){
		return $this->code;
	}
	
	public function getLibelleS(){
		return $this->libelle;
	}
	
}
?>