$(document).ready(function() {

    $("#tb_productos").DataTable({

        paging: true,
        ordering: false,
        info: false,
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No hay registros",
            info: "Mostrando la página _PAGE_ de _PAGES_",
            infoEmpty: "No hay registros disponibles.",
            infoFiltered: "(filtered from _MAX_ total records)",
            search: "Busqueda rapida: ",
            paginate: {
                previous: "Atras",
                next: "Siguiente"
            }
        },
    });
});