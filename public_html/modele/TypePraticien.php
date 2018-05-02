<?php
    class TypePraticien{
        private $type_code;
        private $type_libelle;
        private $type_lieu;
        
        function __construct($code, $libelle, $lieu){
            $this->type_code = $code;
            $this->type_libelle = $libelle;
            $this->type_lieu = $lieu;
        }
        
        public function getCode(){
            return $this->type_code;
        }
        
        public function getLibelle(){
            return $this->type_libelle;
        }
        
        public function getLieu(){
            return $this->type_lieu;
        }
    }
    