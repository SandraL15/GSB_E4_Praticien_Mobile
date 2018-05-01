<?php
class Passerelle{
        static private $mysql_link;
        
	static function connexion($mysql_hote,$mysql_db,$mysql_user,$mysql_pass){
		Passerelle::$mysql_link = new PDO("mysql:host=$mysql_hote;dbname=$mysql_db", "$mysql_user", "$mysql_pass");
	}
	static function addPraticien($nom,$prenom,$adresse,$cp, $ville, $coefnotoriete){
            //$description = addslashes($description);
            $sql = "insert praticien(PRA_NUM, PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_CP, PRA_VILLE, PRA_COEFNOTORIETE) values (NULL,'$nom','$prenom','$adresse','$cp', '$ville', '$coefnotoriete')";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
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
                            $praticien = new Praticien($num,$nom,$prenom,$adresse,$cp,$ville, $coefnotoriete );
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
                            $praticien = new Praticien($num,$nom,$prenom,$adresse,$cp, $ville, $coefnotoriete);			
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