function validaRadio() {
		var i
		for(i=0;i<document.form1.conta.lenght;i++){
			if(document.form1.conta[i].checked) {
				console.log("Escolheu: " + document.form1.conta[i].value);
			}
		}
}