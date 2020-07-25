function cambiar(){
    var id1E = document.getElementById("diaE");
    var id2E = document.getElementById("horaE");
    for (var i = 0; i < id2E.options.length; i++)

        if(id2E.options[i].getAttribute("codigo") == id1E.options[id1E.selectedIndex].getAttribute("codigo")){
            id2E.options[i].style.display = "block";
        }else{
            id2E.options[i].style.display = "none";
        }
        id2E.selectedIndex = "0";
}

var id1 = document.getElementById("dia");
var id2 = document.getElementById("hora");

function cambiarA(){
    for (var i = 0; i < id2.options.length; i++)

        if(id2.options[i].getAttribute("codigo") == id1.options[id1.selectedIndex].getAttribute("codigo")){
            id2.options[i].style.display = "block";
        }else{
            id2.options[i].style.display = "none";
        }

        id2.selectedIndex = "0";
}

function enviar(cursoid){
	var form = document.getElementById("alumnocurso");
	var curso = document.getElementById("cursoAsign");
	curso.setAttribute('value', cursoid);

	form.submit();
}

function SendForm(form, table){
    var table = $(table).DataTable();
	var form = document.getElementById(form);
    table.page.len( -1 ).draw();
    form.submit();
}

function verPass(field, field2){
	var tipo = document.getElementById(field);
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }

    if (field2!=null) {
    	var tipo2 = document.getElementById(field2);
    	if(tipo2.type == "password"){
    		tipo2.type = "text";
    	}else{
    		tipo2.type = "password";
    	}
    }
}