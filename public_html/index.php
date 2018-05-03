<?php
session_start();
require('modele/dbParametres.php');
require('modele/Praticien.php');
require('modele/Passerelle.php');
require('vue/header.php');
require ('modele/TypePraticien.php');
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
                                
            case 'details' 	:   $num = $_REQUEST['num'];
                                    $contact = Passerelle::getOnePraticien($num);
                                    require('vue/showOnePraticien.php');
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
                                    
                                    $contacts = Passerelle::getPraticien();
                                    
                                    require('vue/showPraticiens.php');
                                    break;
            case 'delete'	:   $num = $_REQUEST['num'];
                                    Passerelle::delPraticien($num);
                                    $contacts = Passerelle::getPraticien();
                                    require('vue/showPraticiens.php');
                                    break;
//            case 'identification':  require('vue/identification.php');
//                                    break;
            case 'verifConnexion':  $login = $_REQUEST['login'];
                                    $mdp = $_REQUEST['mdp'];
                                    if ($login == "toto" && $mdp == "1234"){
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