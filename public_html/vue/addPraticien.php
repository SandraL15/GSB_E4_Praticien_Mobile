<?php
	echo("<form method='post' rel='external' action='index.php' onsubmit='return checkForm();'>");
	echo("<input type='hidden' name='action' value='insert'/>");
	echo("<input type='hidden' name='num' value='-1'/>");
	echo("<fieldset>");
        
	echo("<div data-role='fieldcontain'>");
	echo("<label for='nom'>Nom</label>");
	echo("<input type='text' name='nom' maxlength='100' id='nom' value='' />");
	echo("</div>");
        
	echo("<div data-role='fieldcontain'>");
	echo("<label for='prenom'>Prenom</label>");
	echo("<input type='text' name='prenom' maxlength='30' id='prenom' value=''/>");
	echo("</div>");
        
        echo("<div data-role='fieldcontain'>");
	echo("<label for='adresse'>Adresse</label>");
	echo("<input type='text' name='adresse' maxlength='300' id='adresse' value='' />");
	echo("</div>");
        
	echo("<div data-role='fieldcontain'>");
	echo("<label for='cp'>Code postal</label>");
	echo("<input type='text' name='cp' maxlength='200' id='cp' value='' />");
	echo("</div>");
        
        echo("<div data-role='fieldcontain'>");
	echo("<label for='ville'>Ville</label>");
	echo("<input type='text' name='ville' maxlength='200' id='ville' value='' />");
	echo("</div>");
        
        echo("<div data-role='fieldcontain'>");
	echo("<label for='coefnotoriete'>Coef notoriete</label>");
	echo("<input type='text' name='coefnotoriete' maxlength='200' id='coefnotoriete' value='' />");
	echo("</div>");
        
	echo("<fieldset>");
	echo("<button type=\"submit\" value=\"Save\">Sauvegarder le praticien</button>");
	echo("</form>");
?>