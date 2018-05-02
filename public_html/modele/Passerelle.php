<?php
class Passerelle{
        static private $mysql_link;
        
	static function connexion($mysql_hote,$mysql_db,$mysql_user,$mysql_pass){
		Passerelle::$mysql_link = new PDO("mysql:host=$mysql_hote;dbname=$mysql_db", "$mysql_user", "$mysql_pass");
	}
	static function addPraticien($num,$nom,$prenom,$adresse,$cp, $ville, $coefnotoriete, $type){
            $sql = "INSERT INTO `praticien` (`PRA_NUM`, `PRA_NOM`, `PRA_PRENOM`, `PRA_ADRESSE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `TYP_CODE`) VALUES ('".$num."', '".$nom."', '".$prenom."', '".$adresse."', '".$cp."', '".$ville."', '".$coefnotoriete."', '".$type."');";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        
        static function getAllTypePraticien(){
            $types = array();
            $sql = "select * from type_praticien";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $code = $row['TYP_CODE'];
                            $libelle = $row['TYP_LIBELLE'];
                            $lieu = $row['TYP_LIEU'];
                            $type = new TypePraticien($code, $libelle,$lieu);
                            $types[] = $type;
            }		
            return $types;
        }
        

        static function getOneTypeByCode($code){
            $type = null;
                    $sql ="select * from type_praticien where `TYP_CODE` = ".$code;
                    $result = Passerelle::$mysql_link->query($sql);///*****************************
                    if ($result){
                            $row = $result->fetch();
                            $code = $row['TYP_CODE'];	
                            $libelle = $row('TYP_LIBELLE');
                            $lieu = $row['TYP_LIEU'];
                            $type = new TypePraticien($code, $libelle, $lieu);

                    }
                                   //var_dump($sql); echo $sql; die;                        
            return $type;
        }
        
        static function getPraticien(){
            $praticiens = array();
            $sql = "select * from praticien order by PRA_NOM ASC";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $num = $row['PRA_NUM'];
                            $nom = $row['PRA_NOM'];
                            $prenom = $row['PRA_PRENOM'];
                            $adresse = $row['PRA_ADRESSE'];
                            $cp = $row['PRA_CP'];
                            $ville = $row['PRA_VILLE'];
                            $coefnotoriete = $row['PRA_COEFNOTORIETE'];
                            $type = $row['TYP_CODE'];
                            $praticien = new Praticien($num,$nom,$prenom,$adresse,$cp,$ville, $coefnotoriete, $type);
                            $praticiens[] = $praticien;
            }		
            return $praticiens;
        }
        static function getOnePraticien($num){
            $praticien = null;
            if ($num != -1) {
                    $sql ="select * from praticien where PRA_NUM=".$num;
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $nom = $row['PRA_NOM'];
                            $prenom = $row['PRA_PRENOM'];
                            $adresse = $row['PRA_ADRESSE'];
                            $cp= $row['PRA_CP'];
                            $ville= $row['PRA_VILLE'];
                            $coefnotoriete= $row['PRA_COEFNOTORIETE'];
                            $type = $row['TYP_CODE'];
                            $praticien = new Praticien($num,$nom,$prenom,$adresse,$cp, $ville, $coefnotoriete, $type);			
                    }
            }
            return $praticien;
        }
        static  function updateOnePraticien($num,$nom, $prenom, $adresse, $cp, $ville,$coefnotoriete ){
           $praticien = null;
           if($num != -1){
               $sql = "UPDATE `praticien` SET `PRA_NOM`='".$nom."',`PRA_PRENOM`='".$prenom."',`PRA_ADRESSE`='".$adresse."',`PRA_CP`='".$cp."', `PRA_VILLE`='".$ville."', `PRA_COEFNOTORIETE`='".$coefnotoriete."' WHERE PRA_NUM=".$num."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
       static  function delPraticien($num){
           if($num != -1){
               $sql ="DELETE FROM `praticien` WHERE `PRA_NUM`=".$num."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
}
?>