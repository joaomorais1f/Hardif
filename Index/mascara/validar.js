function validacao() {
	if ((document.form.senha.value < 8) || (document.form.senha.value > 16)) {
		alert("A senha deve conter entre 8 e 16 caracteres");
		document.form.senha.focus();
		return false;
	}
}