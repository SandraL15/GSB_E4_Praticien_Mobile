<?php   	
        echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=addnewSpe\">Ajout nouvelle Specialite</a><br/><br/>");
	
	foreach($specialites as $spe){
                echo('<div data-role="collapsible">');
                echo('<h2>'.$spe->getLibelleS().'</h2>');
                    echo('<ul data-role="listview" data-autodividers="true" data-theme="b" data-divider-theme="x">');
                        echo("<li>");
                        echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=detailsSpe&code=".$spe->getCodeS()."\">");
                        echo('Code :&nbsp;"'.$spe->getCodeS().'"<br/>');
                        echo('Libelle:&nbsp;"'.$spe->getLibelleS().'"<br/>');
                    echo('</a></li>');
                   echo('</ul>');
                echo('</div>');
	}
?>	