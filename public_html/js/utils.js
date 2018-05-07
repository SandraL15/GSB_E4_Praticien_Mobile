function checkForm() {
	try {
		if ($.trim($('#nom').val()) == "" ||
			$.trim($('#prenom').val()) == "" ||
                        $.trim($('#adresse').val()) == "" ||
                        $.trim($('#cp').val()) == "" ||
                        $.trim($('#ville').val()) == "" ||
			$.trim($('#coefnotoriete').val()) == "") {
				alert("Tous les champs sont obligatoire");
				return false;
			}
	} catch (e) {
		alert(e);
		return false;
	}
	return true;
}

function deleteEntry(num) {
	try {
		var confirmString = "Supression d'un contact.  Confirmez-vous ?\n" + "Nom: "+$.trim($('#nom').val()) + "\n" + "Prenom: " +$.trim($('#prenom').val()) + "\n" + "Adresse: " +$.trim($('#adresse').val()) + "\n" + "Code postal: " +$.trim($('#cp').val())+ "\n" + "Ville: " +$.trim($('#ville').val())+ "\n" + "Coef notoriete: " + $.trim($('#coefnotoriete').val())+ "\n" + "Type: " + $.trim($('#type').val());
		if (window.confirm(confirmString)) {
			window.location="index.php?action=delete&num=" + num;
		}
	} catch (e) {
		alert(e);
		return false;
	}
	return true;
}
function deleteEntrySpe(code) {
	try {
		var confirmString = "Supression d'une specialite.  Confirmez-vous ?\n" + "Code: "+$.trim($('#code').val()) + "\n" + "Libelle: " +$.trim($('#libelle').val());
		if (window.confirm(confirmString)) {
			window.location="index.php?action=deleteSpe&code=" + code;
		}
	} catch (e) {
		alert(e);
		return false;
	}
	return true;
}
function checkFormSpe() {
	try {
		if ($.trim($('#code').val()) == "" ||

			$.trim($('#libelle').val()) == "") {
				alert("Tous les champs sont obligatoire");
				return false;
			}
	} catch (e) {
		alert(e);
		return false;
	}
	return true;
}