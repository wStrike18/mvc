$(document).ready(function(){


    var btnEditar = '<button type="button" title="Editar" class="icon-pencil btnEditar" data-toggle="modal"  data-target="#exampleModal" ></button>'
    var btnEliminar = ' <button type="button" id="" class="icon-bin btnDelete" data-toggle="tooltip"  title="Eliminar" ></button>'

    $('#tb_categorias').DataTable({
        
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No hay registros",
            info: "Mostrando la página _PAGE_ de _PAGES_",
            infoEmpty: "No hay registros disponibles.",
            infoFiltered: "(filtered from _MAX_ total records)",
            search: "Busqueda rapida: ",
        paginate: {
                previous: "Atras",
                next : "Siguiente"
            }
        },
    });

    var tabla = $("#tb_categorias").dataTable(); //funcion jquery
    var table = $("#tb_categorias").DataTable(); //funcion DataTable-libreria
    table.columns.adjust().draw();

    function addRowDT(data) {
        for (var i = 0; i < data.length; i++) {
            tabla.fnAddData([
                data[i].id,
                data[i].nombre,
                btnEditar + btnEliminar
            ]);
        }
    }


    var categorias = new Array();
    var tbody = $('#tbl_body_table');


    fetch('http://localhost/abarrotescix/http/categoria.php')
      .then(function(res){
          if(res.ok){
              return res.json();
          }else{
              throw "Error en la llamada";
          }
      })
      .then(function(texto){
        table.clear().draw();
        addRowDT(texto);
                
        })
      .catch(function(error){
          console.log(error);   
      })


})
  

      
      
  
    



  