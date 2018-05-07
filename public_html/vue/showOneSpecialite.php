<?php
	echo("<form method='post' rel='external' action='index.php' onsubmit='return checkFormSpe();'>");
	echo "<a rel=\"external\" href=\"javascript:deleteEntrySpe($code)\">Supprimer cette specialite</a>";
	echo "<input type='hidden' name='action' value='updateSpe'/>";
	echo "<input type='hidden' name='code' value='".$specialite->getCodeS   ()."'/>";
	echo "<fieldset>";
        
	echo "<div data-role='fieldcontain'>";
	echo "<label for='code'>Code</label>";
	echo "<input type='text' name='code' maxlength='100' id='code' value='".$specialite->getCodeS()."' />";
	echo "</div>";
        
	echo "<div data-role='fieldcontain'>";
	echo "<label for='libelle'>Libelle</label>";
	echo "<input type='text' name='libelle' maxlength='200' id='libelle' value='".$specialite->getlibelleS()."' />";
	echo "</div>";
       
	echo "<fieldset>";
	echo "<button type=\"submit\" value=\"Save\">Modifier cette specialite</button>";	
	echo("</form>");
?>