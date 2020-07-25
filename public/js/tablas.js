$(document).ready( function () {
	// -------------------------
    $('#alumnos-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 7 },
    		{ "orderable": false, "searchable": false, "targets": 6 },
    		{ "searchable": false, "targets": 3 },
 			{ "searchable": false, "targets": 4 },
 			{ "searchable": false, "targets": 2 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ------------------------------------
    $('#alumnos-asignarcurso-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 8 },
    		{ "orderable": false, "searchable": false, "targets": 7 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // -----------------------------------------
    $('#alumnos-eliminar-multiple-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 0 },
            // { "searchable": false, "targets": 4 },
            { "orderable": false, "searchable": false, "targets": 5 },
        ],
        order: [1, 'asc'],
        "pageLength": 100,
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            },
        },
    });
    // -------------------------------------
    $('#docentes-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "targets": 5 },
    		{ "orderable": false, "searchable": false, "targets": 6 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // --------------------------------------
    $('#docentes-lista-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 7 },
    		{ "orderable": false, "searchable": false, "targets": 8 },
    		{ "orderable": false, "searchable": false, "targets": 3 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // -------------------------------------
    $('#docentes-eliminar-multiple-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 0 },
            // { "searchable": false, "targets": 4 },
            { "orderable": false, "searchable": false, "targets": 5 },
        ],
        order: [1, 'asc'],
        "pageLength": 50,
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            },
        },
    });
    // ------------------------------------
    
    // ---------------------------
    $('#horarios-eliminar-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 4 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ----------------------------------------
    $('#cursos-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 8 },
    		{ "searchable": false, "targets": 7 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // --------------------------------------------
    $('#cursos-lista-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 2 },
    		{ "orderable": false, "searchable": false, "targets": 3 },
    		{ "orderable": false, "searchable": false, "targets": 4 },
    		{ "orderable": false, "searchable": false, "targets": 5 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // -------------------------------------------------------
    $('#cursos-cambio-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 7 },
    		{ "orderable": false, "searchable": false, "targets": 8 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ------------------------------------------------------
    $('#cursos-agregar-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 0 },
    		{ "orderable": false, "searchable": false, "targets": 3 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ---------------------------------------------
    $('#calificaciones-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 7 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ---------------------------------------
    $('#pagos-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 6 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ------------------------------------------
    $('#pagos-adeudos-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 4 },
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            }
        }
    });
    // -----------------------------------------
     $('#alumnos-general-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 6 },
    		{ "orderable": false, "searchable": false, "targets": 7 },
 	 	],
        "order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
     // -----------------------------------------
      $('#alumnos-general-calif-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 6 },
 	 	],
 	 	"order": [],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
      // ----------------------------------------------
      $('#docentes-general-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 6 },
    		{ "orderable": false, "targets": 5 },
 	 	],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
      // ------------------------------------------
      $('#docentes-general-lista-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 8 },
    		{ "orderable": false, "searchable": false, "targets": 9 },
 	 	],
 	 	"order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
      // --------------------------------------
      $('#aulas-general-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 2},
 	 	],
 	 	"order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ---------------------------------------------
    $('#aulas-eliminar-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 0 },
            { "orderable": false, "searchable": false, "targets": 3 },
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            }
        }
    });
    // ---------------------------------------
      $('#horarios-general-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 4},
 	 	],
 	 	"order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
      // -------------------------------------------------
      $('#cursos-general-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 7},
    		{ "orderable": false, "searchable": false, "targets": 8},
 	 	],
 	 	"order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // ---------------------------------------------
    $('#cursos-general-lista-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 5},
 	 	],
 	 	"order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // -----------------------------------------------
    $('#pagos-general-index-table').DataTable({
    	"scrollY": '50vh',
    	"responsive": true,
    	"columnDefs": [
    		{ "orderable": false, "searchable": false, "targets": 6},
 	 	],
 	 	"order":[],
 	 	"language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
	            first:    '«',
	            previous: '‹',
	            next:     '›',
	            last:     '»'
        	},
        	aria: {
	            paginate: {
	                first:    'First',
	                previous: 'Previous',
	                next:     'Next',
	                last:     'Last'
	            }
        	}
        }
    });
    // -------------------------------------
    $('#niveles-general-index-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 2},
        ],
        "order":[],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            }
        }
    });
    // -------------------------------------------
    $('#niveles-eliminar-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 0},
            { "orderable": false, "searchable": false, "targets": 3},
        ],
        "order":[],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            }
        }
    });
    // -----------------------------------------
    $('#carreras-general-index-table').DataTable({
        "scrollY": '50vh',
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 2},
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningún registro",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            }
        }
    });
    // ---------------------------------------
});