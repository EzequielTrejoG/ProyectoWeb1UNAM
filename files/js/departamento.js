var table;

function init(){
    listar();
    mostrarForm(false);

    $("#formulario").on("submit", function(e){
        guardaryEditar(e);
    });
}

function listar(){
    table = $('#tblistadoregdata').dataTable({
        "Processing": true , //Activamos el procesamiento de tablas
        "ServerSide": true, //Paginación y filtrado se realicen por el servidor
        responsive: true, //Activar capacidades responsiva en la tabla
        dom: '<"top"Bfl>rt<"bottom"ip><"clear">', //Definir los elementos de control de dataTables 
                                                // B = Botones export, f = filtro sencillo, l = selector de filas
                                                //r = mensaje de procesamiento, t Tbale como tal, i = información, p = paginació
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        "ajax": {
            url: '../ajax/departamento?op=listar',
            type: "GET",
            dataType: "json",
            error: function(e){
                console.log(e.responseText);
            }
        },
        "destroy": true,
        "iDisplayLength": 5, //Indica cuántos registros registros se mostrarán en el table.
        "order": [[1, "desc"]]
    }).DataTable();
}

//Limpiar formulario
function limpiar(){
    $("#idDepartamento").val("");
    $("#descripcion").val("");
}

function mostrarForm(flag){
    limpiar();
    if(flag){
        $("#listadoregdata").hide();
        $("#formregdata").show();
        $("#btnagregar").hide();
        $("#btnGuardar").prop("disabled", false);
    }else{
        $("#listadoregdata").show();
        $("#formregdata").hide();
        $("#btnagregar").show();
    }
}

function cancelarForm(){
    limpiar();
    mostrarForm(false);
}

function guardaryEditar(e){
    e.preventDefault();
    $("#btnagregar").prop("disable", true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/departamento?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false, //No manda cabecero
        processData: false, //No convierte objetos en string
        success: function(mensaje){
            //alert(mensaje);
            Swal.fire({
                toast: true,
                position: 'top-end',
                title: '<span style="color: #155724; font-weight: bold;">' + mensaje + '</span>',
                icon: 'success',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                background: '#d4edda',
                didOpen: (toast) => {
                    toast.querySelector('.swal2-timer-progress-bar').style.background = '#489e5c';
                }
                
            });
            mostrarForm(false);
            table.ajax.reload();
        }
    });
    limpiar();
}

init();