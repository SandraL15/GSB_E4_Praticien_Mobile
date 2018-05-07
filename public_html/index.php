<?php
session_start();
require('modele/dbParametres.php');
require('modele/Praticien.php');
require('modele/Passerelle.php');
require('vue/header.php');
require ('modele/TypePraticien.php');
require ('modele/Specialite.php');

?>
<div data-role="page">
    <div data-role="header">
        <h1>Répertoire des praticiens</h1>
    </div>
    <div data-role="content">
    <?php 
    Passerelle::connexion($MYSQL_HOTE,$MYSQL_DB,$MYSQL_USER,$MYSQL_PASS);
    if (isset ($_REQUEST['action'])){
            $action = $_REQUEST['action'];
    }
    else {
            $action = "";            
    }
    switch ($action) {
            case 'addnew' 	:   $type = Passerelle::getAllTypePraticien();
                                    require('vue/addPraticien.php');
                                    break;
                                
            case 'addnewSpe' 	:   
                                    require('vue/addSpecialite.php');
                                    break;
                                
            case 'insert' 	:   $num = $_REQUEST['num'];
                                    $nom = $_REQUEST['nom'];
                                    $prenom = $_REQUEST['prenom'];
                                    $adresse = $_REQUEST['adresse'];
                                    $cp = $_REQUEST['cp'];
                                    $ville = $_REQUEST['ville'];
                                    $coefnotoriete = $_REQUEST['coefnotoriete'];
                                    $type = $_REQUEST['type'];
                                    Passerelle::addPraticien($num, $nom, $prenom, $adresse, $cp, $ville, $coefnotoriete,$type); 
                                    $contacts = Passerelle::getPraticien();
                                    require('vue/showPraticiens.php');
                                    break;
                                
            case 'insertSpe' 	:   $code = $_REQUEST['code'];
                                    $libelle = $_REQUEST['libelle'];
                                    Passerelle::addSpecialite($code, $libelle); 
                                    $specialites = Passerelle::getSpecialite();
                                    require('vue/showSpecialites.php');
                                    break;
                                
            case 'details' 	:   $num = $_REQUEST['num'];
                                    $contact = Passerelle::getOnePraticien($num);
                                    $types = Passerelle::getAllTypePraticien();
                                    require('vue/showOnePraticien.php');
                                    break;
                                
            case 'detailsSpe' 	:   $code = $_REQUEST['code'];
                                    $specialite = Passerelle::getOneSpecialite($code);
                                    require('vue/showOneSpecialite.php');
                                    break;
                                
            case 'update' 	:   $num = $_REQUEST['num'];
                                    $nom = $_REQUEST['nom'];
                                    $prenom = $_REQUEST['prenom'];
                                    $adresse = $_REQUEST['adresse'];
                                    $cp = $_REQUEST['cp'];
                                    $ville = $_REQUEST['ville'];
                                    $coefnotoriete = $_REQUEST['coefnotoriete'];
                                    $type = $_REQUEST['type'];
                                    Passerelle::updateOnePraticien($num, $nom, $prenom, $adresse, $cp, $ville, $coefnotoriete, $type);
                                    var_dump($types);die;
                                    $contacts = Passerelle::getPraticien();
                                    
                                    require('vue/showPraticiens.php');
                                    break;
                                
            case 'updateSpe' 	:   $code = $_REQUEST['code'];
                                    $libelle = $_REQUEST['libelle'];
                                    Passerelle::updateOneSpecialite($code, $libelle);
                                    $specialites = Passerelle::getSpecialite();
                                    
                                    require('vue/showSpecialites.php');
                                    break;
                                
            case 'delete'	:   $num = $_REQUEST['num'];
                                    Passerelle::delPraticien($num);
                                    $contacts = Passerelle::getPraticien();
                                    require('vue/showPraticiens.php');
                                    break;
                                
            case 'deleteSpe'	:   $code = $_REQUEST['code'];
                                    Passerelle::delSpecialite($code);
                                    $specialites = Passerelle::getSpecialite();
                                    require('vue/showSpecialites.php');
                                    break;
                                
            case 'goSpecialites':  $specialites = Passerelle::getSpecialite();
                                    require('vue/showSpecialites.php');
                                    break;
                                
            case 'goPraticiens':  $praticiens = Passerelle::getPraticien();
                                    require('vue/showPraticiens.php');
                                    break;
                                
                                
            case 'verifConnexion':  $login = $_REQUEST['login'];
                                    $mdp = $_REQUEST['mdp'];
                                    if ($login == "admin" && $mdp == "root"){
                                        $_SESSION["login"] = $login;
                                       $contacts = Passerelle::getPraticien();
                                        require ('vue/showPraticiens.php');
                                    }
                                    else
                                        require('vue/identification.php');
                                    
                                    break;
            default             :   require('vue/identification.php');
    }
    ?>  
    </div>
    <div data-role="footer">
    Galaxy Swiss Bourdin 
    </div>
</div>
<?php 
 require('vue/footer.php'); 
?>
</body>
</html>