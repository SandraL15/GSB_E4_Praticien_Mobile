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
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $code = $row['TYP_CODE'];	
                            $libelle = $row('TYP_LIBELLE');
                            $lieu = $row['TYP_LIEU'];
                            $type = new TypePraticien($code, $libelle, $lieu);

                    }
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
//                    $sql ="select * from praticien p, type_praticien t where p.TYP_CODE = t.TYP_CODE and PRA_NUM=".$num." and TYP_CODE=".$type."";
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
        static  function updateOnePraticien($num,$nom, $prenom, $adresse, $cp, $ville,$coefnotoriete,$type ){
           $praticien = null;
           if($num != -1){
               $sql = "UPDATE `praticien` SET `PRA_NOM`='".$nom."',`PRA_PRENOM`='".$prenom."',`PRA_ADRESSE`='".$adresse."',`PRA_CP`='".$cp."', `PRA_VILLE`='".$ville."', `PRA_COEFNOTORIETE`='".$coefnotoriete."',  `TYP_CODE`='".$type."'  WHERE PRA_NUM=".$num."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
       static  function delPraticien($num){
           if($num != -1){
               $sql ="DELETE FROM `praticien` WHERE `PRA_NUM`=".$num."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
       
       	static function addSpecialite($code,$libelle){
            $sql = "INSERT INTO `specialite` (`SPE_CODE`, `SPE_LIBELLE`) VALUES ('".$code."', '".$libelle."');";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
          static function getSpecialite(){
            $specialite = array();
            $sql = "select * from specialite";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $code = $row['SPE_CODE'];
                            $libelle = $row['SPE_LIBELLE'];
                            $specialite = new Specialite($code, $libelle);
                            $specialites[] = $specialite;
            }		
            return $specialites;
        }
        static function getOneSpecialite($code){
            $specialite = null;
            if ($code != -1) {
                    $sql ="select * from specialite where SPE_CODE=".$code;
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $code = $row['SPE_CODE'];
                            $libelle = $row['SPE_LIBELLE'];
                            $specialite = new Specialite($code, $libelle);			
                    }
            }
            return $specialite;
        }
 
        static  function updateOneSpecialite($code, $libelle){
           $specialite = null;
           if($code != -1){
               $sql = "UPDATE `specialite` SET `SPE_CODE`='".$code."',`SPE_LIBELLE`='".$libelle."' WHERE SPE_CODE=".$code."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
       static  function delSpecialite($code){
           if($code != -1){
               $sql ="DELETE FROM `specialite` WHERE `SPE_CODE`=".$code."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
}
?>