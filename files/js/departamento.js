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
        "iDisplayLength": 10 //Indica cuántos registros registros se mostrarán en el table.
        //"order": [[1, "desc"]]
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
    $("#btnagregar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/departamento?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false, //No manda cabecero
        processData: false, //No convierte objetos en string
        success: function(mensaje){
            valida = mensaje.indexOf('rror');
            if(valida != -1){
                toastr["error"](mensaje);
            }else{
                toastr["success"](mensaje);
            }
            mostrarForm(false);
            table.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(idDepartamento){
    $.post("../ajax/departamento?op=mostrar", {idDepartamento:idDepartamento}, function(data){
        //console.log(data);
        data = JSON.parse(data);
        //console.log(data);
        mostrarForm(true);
        $("#idDepartamento").val(data.idDepartamento);
        $("#descripcion").val(data.descripcion);
    });
}

function desactivar(idDepartamento){
    var ventanaEleccion = toastr.warning('¿Deseas desactivar el Depto seleccionado?<br>' +
    '<button type="button" id="rsptaSi" class="btn btn-success">Sí</button> ' +
    '<button type="button" id="rsptaNo" class="btn btn-danger">No</button>', "Alerta");

    /*var ventanaEleccion = toastr.warning(
        '¿Deseas desactivar el Depto seleccionado?<br>' +
        '<button type="button" id="rsptaSi" class="btn btn-success">Sí</button> ' +
        '<button type="button" id="rsptaNo" class="btn btn-danger">No</button>', 
        "Alerta", 
        {
          closeButton: false,
          allowHtml: true,
          timeOut: 0, // para que no desaparezca automáticamente
          extendedTimeOut: 0
        }
    );*/

    $("#rsptaSi").click(function(){
        console.log("El usuario ha elegido desactivar el Depto");
        toastr.clear(ventanaEleccion);
        $.post("../ajax/departamento?op=desactivar", {idDepartamento:idDepartamento}, function(mensaje){
           //alert(mensaje);
            valida = mensaje.indexOf('rror');
            if(valida != -1){
                toastr["error"](mensaje);
            }else{
                toastr["success"](mensaje);
            }
           table.ajax.reload(); 
        });
    });

    $("#rsptaNo").click(function(){
        console.log("El usuario ha elegido cancelar la acción");
        toastr.clear(ventanaEleccion);
    });
}

function activar(idDepartamento){
    var ventanaEleccion = toastr.warning('¿Deseas activar el Depto seleccionado?<br>' +
    '<button type="button" id="rsptaSi" class="btn btn-success">Sí</button> ' +
    '<button type="button" id="rsptaNo" class="btn btn-danger">No</button>', "Alerta");

    /*var ventanaEleccion = toastr.warning(
        '¿Deseas activar el Depto seleccionado?<br>' +
        '<button type="button" id="rsptaSi" class="btn btn-success">Sí</button> ' +
        '<button type="button" id="rsptaNo" class="btn btn-danger">No</button>', 
        "Alerta", 
        {
          closeButton: false,
          allowHtml: true,
          timeOut: 0, // para que no desaparezca automáticamente
          extendedTimeOut: 0
        }
    );*/

    $("#rsptaSi").click(function(){
        console.log("El usuario ha elegido activar el Depto");
        toastr.clear(ventanaEleccion);
        $.post("../ajax/departamento?op=activar", {idDepartamento:idDepartamento}, function(mensaje){
           //alert(mensaje);
            valida = mensaje.indexOf('rror');
            if(valida != -1){
                toastr["error"](mensaje);
            }else{
                toastr["success"](mensaje);
            }
           table.ajax.reload(); 
        });
    });

    $("#rsptaNo").click(function(){
        console.log("El usuario ha elegido cancelar la acción");
        toastr.clear(ventanaEleccion);
    });
}

init();