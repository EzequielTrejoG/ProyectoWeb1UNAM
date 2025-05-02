<?php
    require 'cabecero.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DEPARTAMENTOS</h3>
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
                        <tbody>
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
                            <label for="descripcion">Nombre del departamento</label>
                            <input class="form-control" type="hidden" name="idDepartamento" id="idDepartamento">
                            <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Ej. Sistemas" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                           <button class="btn btn-primary" id="btnGuardar" type="submit">Guardar</button>
                           <button class="btn btn-danger" id="btnCancelar" type="clear">Cancelar</button> 
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

<script type="text/javascript" src="../files/js/departamento.js"></script>