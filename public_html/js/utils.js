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
		var confirmString = "Supression d'un contact.  Confirmez-vous ?\n" + $.trim($('#nom').val()) + "\n" + $.trim($('#prenom').val()) + "\n" + $.trim($('#adresse').val()) + "\n" + $.trim($('#cp').val())+ "\n" + $.trim($('#ville').val())+ "\n" + $.trim($('#coefnotoriete').val());
		if (window.confirm(confirmString)) {
			window.location="index.php?action=delete&num=" + num;
		}
	} catch (e) {
		alert(e);
		return false;
	}
	return true;
}