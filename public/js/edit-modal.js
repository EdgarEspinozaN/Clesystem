$("#ModalEditAlumno").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idE = button.data('id');
	var nomE = button.data('nombre');
	var patE = button.data('pat');
	var matE = button.data('mat');
	var telE = button.data('tel');
	var mailE = button.data('mail');
	var carrE = button.data('carrera');
	var turE = button.data('turno');
	var nivE = button.data('nivel');
	var semE = button.data('semestre');
	var userE = button.data('username');
	var block = button.data('action');
	var frm = document.getElementById("EditFormAlumno");
	var modal = $(this);

	
	frm.setAttribute("action", "/alumnos/"+idE);
	modal.find('.modal-body #idhiddenE').val(idE);
	modal.find('.modal-body #noControlE').val(idE);
	modal.find('.modal-body #nombreE').val(nomE);
	modal.find('.modal-body #apePatE').val(patE);
	modal.find('.modal-body #apeMatE').val(matE);
	modal.find('.modal-body #telefonoE').val(telE);
	modal.find('.modal-body #emailE').val(mailE);
	modal.find('.modal-body #carreraE').val(carrE);
	modal.find('.modal-body #turnoE').val(turE);
	modal.find('.modal-body #nivelAproE').val(nivE);
	modal.find('.modal-body #semestreE').val(semE);
	modal.find('.modal-body #usernameE').val(userE);
	modal.find('.modal-body #passwordE').val(idE);

	if (block == "ver"){
		modal.find('.modal-body #tituloModal').text("Alumno");
		modal.find('.modal-body #noControlE').attr("disabled", "");
		modal.find('.modal-body #nombreE').attr("disabled", "");
		modal.find('.modal-body #apePatE').attr("disabled", "");
		modal.find('.modal-body #apeMatE').attr("disabled", "");
		modal.find('.modal-body #telefonoE').attr("disabled", "");
		modal.find('.modal-body #emailE').attr("disabled", "");
		modal.find('.modal-body #carreraE').attr("disabled", "");
		modal.find('.modal-body #turnoE').attr("disabled", "");
		modal.find('.modal-body #nivelAproE').attr("disabled", "");
		modal.find('.modal-body #semestreE').attr("disabled", "");
		modal.find('.modal-body #usernameE').attr("disabled", "");
		modal.find('.modal-body #btnGuardar').css("display", "none");
		modal.find('.modal-body #btnPass').css("display", "none");
		modal.find('.modal-body #labelPass').css("visibility", "hidden");
	}else{
		modal.find('.modal-body #tituloModal').text("Editar Alumno");
		modal.find('.modal-body #noControlE').removeAttr("disabled");
		modal.find('.modal-body #nombreE').removeAttr("disabled");
		modal.find('.modal-body #apePatE').removeAttr("disabled");
		modal.find('.modal-body #apeMatE').removeAttr("disabled");
		modal.find('.modal-body #telefonoE').removeAttr("disabled");
		modal.find('.modal-body #emailE').removeAttr("disabled");
		modal.find('.modal-body #carreraE').removeAttr("disabled");
		modal.find('.modal-body #turnoE').removeAttr("disabled");
		modal.find('.modal-body #nivelAproE').removeAttr("disabled");
		modal.find('.modal-body #semestreE').removeAttr("disabled");
		modal.find('.modal-body #usernameE').removeAttr("disabled");
		modal.find('.modal-body #btnGuardar').css("display", "block");
		modal.find('.modal-body #btnPass').css("display", "block");
		modal.find('.modal-body #labelPass').css("visibility", "visible");
	}
});

$("#ModalDeleteAlumno").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var nombreD = button.data('nombre');
	var frm = document.getElementById("FormDeleteAlumno");
	var modal = $(this);

	frm.setAttribute("action", "/alumnos/"+idD);
	modal.find('.modal-body #idalumno').val(idD);
	modal.find('.modal-body #nombrealumno').val(nombreD);
});

// $("#ModalDeleteAlumnoPer").on("show.bs.modal", function (event){
// 	var button = $(event.relatedTarget);
// 	var idD = button.data('id');
// 	var nombreD = button.data('nombre');
// 	var frm = document.getElementById("FormDeleteAlumnoPer");
// 	var modal = $(this);

// 	frm.setAttribute("action", "/general/alumnos/delete/"+idD);
// 	modal.find('.modal-body #idalumno').val(idD);
// 	modal.find('.modal-body #nombrealumno').val(nombreD);
// });

$("#ModalAltaAlumno").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var nombreA = button.data('nombre');
	var frm = document.getElementById("FormAltaAlumno");
	var modal = $(this);

	frm.setAttribute("action", "/general/alumnos/"+idA);
	modal.find('.modal-body #idalumno').val(idA);
	modal.find('.modal-body #nombrealumno').val(nombreA);
});

$("#ModalEditDocente").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idE = button.data('id');
	var nomE = button.data('nombre');
	var patE = button.data('pat');
	var matE = button.data('mat');
	var telE = button.data('tel');
	var mailE = button.data('mail');
	var cedE = button.data('cedula');
	var cerE = button.data('cert');
	var userE = button.data('username');
	var block = button.data('action');
	var frm = document.getElementById("EditFormDocente");
	var modal = $(this);
	
	frm.setAttribute("action", "/docentes/"+idE);
	modal.find('.modal-body #idhiddenE').val(idE);
	modal.find('.modal-body #nombreE').val(nomE);
	modal.find('.modal-body #apePatE').val(patE);
	modal.find('.modal-body #apeMatE').val(matE);
	modal.find('.modal-body #telefonoE').val(telE);
	modal.find('.modal-body #emailE').val(mailE);
	modal.find('.modal-body #idDocE').val(idE);
	modal.find('.modal-body #cedulaE').val(cedE);
	modal.find('.modal-body #idiomasE').val(cerE);
	modal.find('.modal-body #usernameE').val(userE);
	modal.find('.modal-body #passwordE').val(idE);

	if (block == "ver"){
		modal.find('.modal-body #tituloModal').text("Docente");
		modal.find('.modal-body #nombreE').attr("disabled", "");
		modal.find('.modal-body #apePatE').attr("disabled", "");
		modal.find('.modal-body #apeMatE').attr("disabled", "");
		modal.find('.modal-body #telefonoE').attr("disabled", "");
		modal.find('.modal-body #emailE').attr("disabled", "");
		modal.find('.modal-body #idDocE').attr("disabled", "");
		modal.find('.modal-body #cedulaE').attr("disabled", "");
		modal.find('.modal-body #idiomasE').attr("disabled", "");
		modal.find('.modal-body #usernameE').attr("disabled", "");
		modal.find('.modal-body #btnGuardarD').css("display", "none");
		modal.find('.modal-body #btnPass').css("display", "none");
		modal.find('.modal-body #labelPass').css("visibility", "hidden");
	}else{
		modal.find('.modal-body #tituloModal').text("Editar Docente");
		modal.find('.modal-body #nombreE').removeAttr("disabled");
		modal.find('.modal-body #apePatE').removeAttr("disabled");
		modal.find('.modal-body #apeMatE').removeAttr("disabled");
		modal.find('.modal-body #telefonoE').removeAttr("disabled");
		modal.find('.modal-body #emailE').removeAttr("disabled");
		modal.find('.modal-body #idDocE').removeAttr("disabled");
		modal.find('.modal-body #cedulaE').removeAttr("disabled");
		modal.find('.modal-body #idiomasE').removeAttr("disabled");
		modal.find('.modal-body #usernameE').removeAttr("disabled");
		modal.find('.modal-body #btnGuardarD').css("display", "block");
		modal.find('.modal-body #btnPass').css("display", "block");
		modal.find('.modal-body #labelPass').css("visibility", "visible");
	}
});

$("#ModalDeleteDocente").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var nombreD = button.data('nombre');
	var frm = document.getElementById("FormDeleteDocente");
	var modal = $(this);

	frm.setAttribute("action", "/docentes/"+idD);
	modal.find('.modal-body #iddocente').val(idD);
	modal.find('.modal-body #nombredocente').val(nombreD);
});

// $("#ModalDeleteDocentePer").on("show.bs.modal", function (event){
// 	var button = $(event.relatedTarget);
// 	var idD = button.data('id');
// 	var nombreD = button.data('nombre');
// 	var frm = document.getElementById("FormDeleteDocentePer");
// 	var modal = $(this);

// 	frm.setAttribute("action", "/general/docentes/delete/"+idD);
// 	modal.find('.modal-body #iddocente').val(idD);
// 	modal.find('.modal-body #nombredocente').val(nombreD);
// });

$("#ModalAltaDocente").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var nombreA = button.data('nombre')
	frm = document.getElementById("FormAltaDocente");
	var modal = $(this);

	frm.setAttribute("action", "/general/docentes/"+idA);
	modal.find('.modal-body #iddocente').val(idA);
	modal.find('.modal-body #nombredocente').val(nombreA);
});

$("#ModalEditAula").on("show.bs.modal", function (event){    
	var button = $(event.relatedTarget);
	var idE = button.data('id');
	var aulaE = button.data('aula');
	var frm = document.getElementById("EditForm");
	var modal = $(this); 

	frm.setAttribute("action", "/general/aulas/"+idE);
	modal.find('.modal-body #idAula').val(idE);
	modal.find('.modal-body #aulaE').val(aulaE);
});

$("#ModalDeleteAula").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var aulaD = button.data('aula');
	var frm = document.getElementById("FormDeleteAula");
	var modal = $(this);

	frm.setAttribute("action", "/general/aulas/"+idD);
	modal.find('.modal-body #idaula').val(idD);
	modal.find('.modal-body #nombreaula').val(aulaD);
});

$("#ModalAltaAula").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var aulaA = button.data('aula');
	var frm = document.getElementById("FormAltaAula");
	var modal = $(this);

	frm.setAttribute("action", "/general/aulas/"+idA);
	modal.find('.modal-body #idaula').val(idA);
	modal.find('.modal-body #nombreaula').val(aulaA);
});

$("#ModalEditHorario").on("show.bs.modal", function (event){    
 	var button = $(event.relatedTarget);
 	var idE = button.data('id');
 	var diaE = button.data('dia');
 	var inicioE = button.data('inicio');
 	var finE = button.data('fin');
 	var frm = document.getElementById("EditFormHorario");
 	var modal = $(this);
 	
 	frm.setAttribute("action", "/general/horarios/"+idE);
 	modal.find('.modal-body #diaE').val(diaE);
 	modal.find('.modal-body #inicio').val(inicioE);
 	modal.find('.modal-body #fin').val(finE);
});

$("#ModalDeleteHorario").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var horaD = button.data('hora');
	var frm = document.getElementById("FormDeleteHorario");
	var modal = $(this);

	frm.setAttribute("action", "/general/horarios/"+idD);
	modal.find('.modal-body #idhora').val(idD);
	modal.find('.modal-body #horaIF').val(horaD);
});

$("#ModalAltaHorario").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var horaA = button.data('hora');
	var frm = document.getElementById("FormAltaHorario");
	var modal = $(this);

	frm.setAttribute("action", "/general/horarios/"+idA);
	modal.find('.modal-body #idhora').val(idA);
	modal.find('.modal-body #horaIF').val(horaA);
});

$("#ModalDeleteNivel").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var nivelD = button.data('nivel');
	var frm = document.getElementById("FormDeleteNivel");
	var modal = $(this);

	frm.setAttribute("action", "/general/niveles/"+idD);
	modal.find('.modal-body #idnivel').val(idD);
	modal.find('.modal-body #nombrenivel').val(nivelD);
});

$("#ModalAltaNivel").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var nivelA = button.data('nivel');
	var frm = document.getElementById("FormAltaNivel");
	var modal = $(this);

	frm.setAttribute("action", "/general/niveles/alta/"+idA);
	modal.find('.modal-body #idnivel').val(idA);
	modal.find('.modal-body #nombrenivel').val(nivelA);
});

$("#ModalEditCarrera").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var carreraA = button.data('carrera');
	var frm = document.getElementById("EditCarreraForm");
	var modal = $(this);

	frm.setAttribute("action", "/general/carreras/"+idA);
	modal.find('.modal-body #idCarrera').val(idA);
	modal.find('.modal-body #carreraE').val(carreraA);
});

$("#ModalDeleteCarrera").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var nombreD = button.data('carrera');
	var frm = document.getElementById("FormDeleteCarrera");
	var modal = $(this);

	frm.setAttribute("action", "/general/carreras/"+idD);
	modal.find('.modal-body #idcarrera').val(idD);
	modal.find('.modal-body #nombrecarrera').val(nombreD);
});

$("#ModalAltaCarrera").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var carreraA = button.data('carrera');
	var frm = document.getElementById("FormAltaCarrera");
	var modal = $(this);

	frm.setAttribute("action", "/general/carreras/alta/"+idA);
	modal.find('.modal-body #idcarrera').val(idA);
	modal.find('.modal-body #nombrecarrera').val(carreraA);
});

$("#ModalEditCurso").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idE = button.data('id');
	var cursoE = button.data('curso');
	var nivE = button.data('nivel');
	var aulaE = button.data('aula');
	var diaE = button.data('dia');
	var horaE = button.data('hora');
	var docE = button.data('docente');
	var frm = document.getElementById("EditFormCurso");
	var modal = $(this);
	
	frm.setAttribute("action", "/cursos/"+idE);
	modal.find('.modal-body #idhiddenE').val(idE);
	modal.find('.modal-body #cursoE').val(cursoE);
	modal.find('.modal-body #nivelE').val(nivE);
	modal.find('.modal-body #aulaE').val(aulaE);
	modal.find('.modal-body #diaE').val(diaE);
	modal.find('.modal-body #horaE').val(horaE);
	modal.find('.modal-body #docenteE').val(docE);
});

$("#ModalDeleteCurso").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idD = button.data('id');
	var horaD = button.data('nombre');
	var frm = document.getElementById("FormDeleteCurso");
	var modal = $(this);

	frm.setAttribute("action", "/cursos/"+idD);
	modal.find('.modal-body #idcurso').val(idD);
	modal.find('.modal-body #nombrecurso').val(horaD);
});

// $("#ModalDeleteCursoPer").on("show.bs.modal", function (event){
// 	var button = $(event.relatedTarget);
// 	var idD = button.data('id');
// 	var nombreD = button.data('nombre');
// 	var frm = document.getElementById("FormDeleteCursoPer");
// 	var modal = $(this);

// 	frm.setAttribute("action", "/general/cursos/delete/"+idD);
// 	modal.find('.modal-body #idcurso').val(idD);
// 	modal.find('.modal-body #nombrecurso').val(nombreD);
// });

$("#ModalAltaCurso").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idA = button.data('id');
	var horaA = button.data('nombre');
	var frm = document.getElementById("FormAltaCurso");
	var modal = $(this);

	frm.setAttribute("action", "/general/cursos/"+idA);
	modal.find('.modal-body #idcurso').val(idA);
	modal.find('.modal-body #nombrecurso').val(horaA);
});

$("#ModalEditCalificacion").on("show.bs.modal", function (event){    
 	var button = $(event.relatedTarget);
 	var idE = button.data('id');
 	var nombreE = button.data('nombre');
 	var cal1E = button.data('cal1');
 	var cal2E = button.data('cal2');
 	var recuE = button.data('recu');
 	var origen = button.data('origin');
 	var frm = document.getElementById("EditFormCalificacion");
 	var modal = $(this);
 	
 	frm.setAttribute("action", "/calificaciones/"+idE);
 	modal.find('.modal-body #nombre').val(nombreE);
 	modal.find('.modal-body #cal1').val(cal1E);
 	modal.find('.modal-body #cal2').val(cal2E);
 	modal.find('.modal-body #recuperacion').val(recuE);
 	modal.find('.modal-body #actionorigin').val(origen);
});

$("#ModalPagosEdit").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idE = button.data('id');
	var folioE = button.data('folio');
	var pago1E = button.data('pago1');
	var pago2E = button.data('pago2');
	var pago3E = button.data('pago3');
	var frm = document.getElementById("FormEditPago");
	var modal = $(this);

	frm.setAttribute("action", "/general/pagos/"+idE);
	modal.find('.modal-body #idpago').val(idE);
	modal.find('.modal-body #folio').val(folioE);
	modal.find('.modal-body #pago1').val(pago1E);
	modal.find('.modal-body #pago2').val(pago2E);
	modal.find('.modal-body #pago3').val(pago3E);
});

$("#ModalPagoAdeudo").on("show.bs.modal", function (event){
	var button = $(event.relatedTarget);
	var idP = button.data('id');
	var folioP = button.data('folio');
	var alumnoP = button.data('alumno');
	var nombreP = button.data('nombre');
	var modal = $(this);

	hname = document.getElementById("HNombre");
	hname.innerHTML = nombreP;
	modal.find('.modal-body #adeudo_id').val(idP);
	modal.find('.modal-body #folio').val(folioP);
	modal.find('.modal-body #alumno').val(alumnoP);
});

// $("#asignCurso").on("show.bs.modal", function (event){
// 	var button = $(event.relatedTarget);
// 	var idA = button.data('alumno');
// 	var modal = $(this);

// 	modal.find('.modal-body #alumnAsign').val(idA);
// });

function PassConfirm(){
	// $('#ModalEditAlumno').modal('hide');
	$('#ModalResetPassword').modal('show');
}

function Pass(){
	//$('#ModalResetPassword').modal('hide');
	var form = document.getElementById("PassResetForm");
	form.submit();
}