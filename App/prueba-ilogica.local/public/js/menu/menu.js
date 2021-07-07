$(document).ready( function () {
    
    datatable = jQuery('#datatable').DataTable({
        "ajax": {
            url:  url_datatable,
            type: 'GET',
        },
        "processing": true,
        "serverSide": true,
        "searching": true,
        //"bPaginate": true,
        "orderable": false,
        "searchable":true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "_START_ - _END_ de _TOTAL_ items",
            "sInfoEmpty":      " 0 - 0  de 0 items",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        "order": [[ 2, "asc" ]],
        "columns": [
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'order', name: 'order' },
            {
                "render": function() {
                    var botones = '';
                    
                        botones += '<button type = "button" id = "editar" class = "btn btn-primary m-btn--air tooltips editar" title= "Ver detalle"><span class = "fa fa-pencil-square-o"> </span> <span class="hidden-xs">Editar</span> </button>'; 
                    
                        botones += '<button type="button" id="eliminar" class="btn btn-danger m-btn--air tooltips eliminar" title="eliminar"><span class="fa fa-trash"> </span> <span class="hidden-xs">Eliminar</span></button>';
                    
                    return botones;
                
                }
            },  
            
        ]
    });



    jQuery(document).on("click",'.eliminar',  function() {
        Swal.fire({
            text: '¿Está seguro que desea eliminar el item del menu?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'get',
                    data: {
                        id : $(this).parent().parent().attr('id')
                    },
                    url: url_eliminar,
                    success:function(data){
                        window.location.reload();
                    }
                });
            }
        });
    });

    jQuery(document).on("click",'.editar',  function() {

        $.ajax({
            type:'get',
            data: {
                id : $(this).parent().parent().attr('id')
            },
            url: url_editar,
            "dataType": "json",
            success:function(data){
              
                $('#nombre').val(data.nombre);
                $('#slug').val(data.slug);
                $('#orden').val(data.order);
                $('#ids').val(data.id);
            }
        });
    });

});




