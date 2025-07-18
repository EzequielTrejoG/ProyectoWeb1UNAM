<?php
    require 'cabecero.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-5 mt-3">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">CATEGORIAS <button class="btn btn-success" id="btnagregar" onclick="mostrarForm(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h3>
            </div>
            <div class="card-body">
                <!-- Contenedor de listados-->
                <div class="panel-body" id="listadoregdata">
                    <table id="tblistadoregdata" class="table table-striped table-bordered table-condensed table-over">
                        <thead>
                            <th>Descripción</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Estatus</th>
                            <th>Empleado modificó</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                        <thead>
                            <th>Descripción</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Estatus</th>
                            <th>Empleado modificó</th>
                            <th>Opciones</th>
                        </thead>
                    </table>
                </div>
                <!-- Contenedor de formulario de registro de departamento --> 
                <div class="panel-body" id="formregdata">
                    <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="descripcion">Nombre de la categoria</label>
                            <input class="form-control" type="hidden" name="idCategoria" id="idCategoria">
                            <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Ej. Tecnico" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                           <button class="btn btn-primary" id="btnGuardar" type="submit"><i class="fas fa-save"></i> Guardar</button>
                           <button class="btn btn-danger" id="btnCancelar" type="clear" onclick="cancelarForm()"><i class="fas fa-arrow-circle-left"></i> Cancelar</button> 
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
    require 'piepagina.php';
?>

<script type="text/javascript" src="../files/js/categoria.js"></script>