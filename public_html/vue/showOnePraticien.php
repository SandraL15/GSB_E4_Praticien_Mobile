<?php
	echo("<form method='post' rel='external' action='index.php' onsubmit='return checkForm();'>");
	echo "<a rel=\"external\" href=\"javascript:deleteEntry($num)\">Supprimer ce praticien</a>";
	echo "<input type='hidden' name='action' value='update'/>";
	echo "<input type='hidden' name='num' value='".$contact->getNum()."'/>";
	echo "<fieldset>";
        
	echo "<div data-role='fieldcontain'>";
	echo "<label for='nom'>Nom</label>";
	echo "<input type='text' name='nom' maxlength='100' id='nom' value='".$contact->getNom()."' />";
	echo "</div>";
        
	echo "<div data-role='fieldcontain'>";
	echo "<label for='prenom'>Prenom</label>";
	echo "<input type='text' name='prenom' maxlength='200' id='prenom' value='".$contact->getPrenom()."' />";
	echo "</div>";
        
        echo "<div data-role='fieldcontain'>";
	echo "<label for='adresse'>Adresse</label>";
	echo "<input type='text' name='adresse' maxlength='300' id='adresse' value='".$contact->getAdresse()."'/>";
	echo "</div>";
        
	echo "<div data-role='fieldcontain'>";
	echo "<label for='cp'>Code postal</label>";
	echo "<input type='text' name='cp' maxlength='200' id='cp' value='".$contact->getCp()."' />";
	echo "</div>";
        
        echo "<div data-role='fieldcontain'>";
	echo "<label for='ville'>Ville</label>";
	echo "<input type='text' name='ville' maxlength='200' id='ville' value='".$contact->getVille()."' />";
	echo "</div>";
        
        echo "<div data-role='fieldcontain'>";
	echo "<label for='coefnotoriete'>Coef notoriete</label>";
	echo "<input type='text' name='coefnotoriete' maxlength='200' id='coefnotoriete' value='".$contact->getCoefnotoriete()."' />";
	echo "</div>";
        
//        echo "<div data-role='fieldcontain'>";
//	echo "<label for='type'>Code du type</label>";
//	echo "<input type='text' name='type' maxlength='200' id='type' value='".$contact->getTypeP()."' />";
//	echo "</div>";
        
          ?>
          <div class='ui-field-contain'>
                    <label for="categorie">Categories</label>
                    <select name="type"  data-iconpos="left">
                        <?php foreach($type as $tp){
                                 echo "<option value='".$tp->getCode()."'>".$tp->getLibelle()."</option>";
                            }?>
                    </select>
            </div>
        <?php
        
	echo "<fieldset>";
	echo "<button type=\"submit\" value=\"Save\">Modifier le praticien</button>";	
	echo("</form>");
?>