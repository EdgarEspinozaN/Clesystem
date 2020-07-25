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
 	
 	frm.setAttribute("action", "/docente/calificaciones/"+idE);
 	modal.find('.modal-body #nombre').val(nombreE);
 	modal.find('.modal-body #cal1').val(cal1E);
 	modal.find('.modal-body #cal2').val(cal2E);
 	modal.find('.modal-body #recuperacion').val(recuE);
 	modal.find('.modal-body #actionorigin').val(origen);
});