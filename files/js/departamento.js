var table;

function init(){
    listar();
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
        ]
    });
}

init();