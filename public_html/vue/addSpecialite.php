<?php
	echo("<form method='post' rel='external' action='index.php' onsubmit='return checkFormSpe();'>");
	echo("<input type='hidden' name='code' value='-1'/>");
	echo("<fieldset>");
        
        echo("<div data-role='fieldcontain'>");
	echo("<label for='code'>Code</label>");
	echo("<input type='text' placeholder='Initiales du libelle' name='code' maxlength='100' id='code' value='' />");
	echo("</div>");
        
	echo("<div data-role='fieldcontain'>");
	echo("<label for='libelle'>Libelle</label>");
	echo("<input type='text' name='libelle' maxlength='300' id='libelle' value='' />");
	echo("</div>");
        
	echo("<fieldset>");
	echo("<button type=\"submit\" value=\"Save\">Sauvegarder la specialite</button>");
	echo("</form>");
?>