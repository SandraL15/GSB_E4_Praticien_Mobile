<?php   	
        echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=addnew\">Ajout nouveau praticien</a><br/><br/>");
	
	foreach($contacts as $info){
                echo('<div data-role="collapsible">');
                echo('<h2>'.$info->getNom()." ".$info->getPrenom().'</h2>');
                    echo('<ul data-role="listview" data-autodividers="true" data-theme="b" data-divider-theme="x">');
                        echo("<li>");
                        echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=details&num=".$info->getNum()."\">");
                        echo('Adresse :&nbsp;"'.$info->getAdresse().'"<br/>');
                        echo('Code postal :&nbsp;"'.$info->getCp().'"<br/>');
                        echo('Ville :&nbsp;"'.$info->getVille().'"<br/>');
                        echo('Coef Notoriete :&nbsp;"'.$info->getCoefnotoriete().'"<br/>');
                        $t = Passerelle::getOneTypeByCode($info->getType());
                        echo('Type: '.$t->getLibelle().'<br/>');
                    echo('</a></li>');
                   echo('</ul>');
                echo('</div>');
	}
?>	
<h1>DU GLAND</h1>