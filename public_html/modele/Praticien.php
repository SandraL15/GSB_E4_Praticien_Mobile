<?php
class Praticien{
	private $num;
	private $nom;
	private $prenom;
	private $adresse;
        private $cp;
        private $ville;
        private $coefnotoriete;
	
	function __construct($num,$nom,$prenom,$adresse, $cp,$ville, $coefnotoriete){
		$this->num = $num;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->adresse = $adresse;
                $this->cp = $cp;
                $this->ville = $ville;
                $this->coefnotoriete = $coefnotoriete;
	}
	
	public function getNum(){
		return $this->num;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	
	public function getAdresse(){
		return $this->adresse;
	}
        public function getCp(){
		return $this->cp;
	}
         public function getVille(){
		return $this->ville;
	}
         public function getCoefnotoriete(){
		return $this->coefnotoriete;
	}
}
?>