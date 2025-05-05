var table;

function init(){
    listar();
    mostrarForm(false);
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
    //document.getElementById("formulario").reset();
}

function mostrarForm(flag){
    limpiar();
    if(flag){
        $("#listadoregdata").hide();
        $("#formregdata").show();
        $("#btnagregar").hide();
        $("#btnGuardar").prop("disabled", false);
        /*document.getElementById("listadoregdata").style.display = "none";
        document.getElementById("formregdata").style.display = "block";
        document.getElementById("btnagregar").style.display = "none";
        document.getElementById("btnGuardar").disabled = false;*/
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

init();