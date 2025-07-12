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
                <h3 class="card-title">EMPLEADOS <button class="btn btn-success" id="btnagregar" onclick="mostrarForm(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h3>
            </div>
            <div class="card-body">
                <!-- Contenedor de listados-->
                <div class="panel-body" id="listadoregdata">
                    <table id="tblistadoregdata" class="table table-striped table-bordered table-condensed table-over">
                        <thead>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Departamento</th>
                            <th>Jefe</th>
                            <th>Fecha Ingreso</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Estatus</th>
                            <th>Empleado modificó</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                        <thead>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Departamento</th>
                            <th>Jefe</th>
                            <th>Fecha Ingreso</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Estatus</th>
                            <th>Empleado modificó</th>
                            <th>Opciones</th>
                        </thead>
                    </table>
                </div>
                <!-- Contenedor de formulario --> 
                <div class="panel-body" id="formregdata">
                    <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="nombre">Nombre del Empleado</label>
                            <input class="form-control" type="hidden" name="idEmpleado" id="idEmpleado">
                            <input class="form-control" type="text" name="nombre" id="nombre" maxlength="256" placeholder="Nombre Empleado" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="primerApellido">Primer Apellido</label>
                            <input class="form-control" type="text" name="primerApellido" id="primerApellido" maxlength="256" placeholder="Primer Apellido" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="segundoApellido">Segundo Apellido</label>
                            <input class="form-control" type="text" name="segundoApellido" id="segundoApellido" maxlength="256" placeholder="Segundo Apellido" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="email">Correo Electrónico</label>
                            <input class="form-control" type="email" name="email" id="email" maxlength="256" placeholder="Email" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="fechaEntrada">Fecha de Ingreso</label>
                            <input class="form-control" type="date" name="fechaEntrada" id="fechaEntrada" maxlength="256" placeholder="Fecha Ingreso" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="fechaBaja">Fecha de Baja</label>
                            <input class="form-control" type="date" name="fechaBaja" id="fechaBaja" maxlength="256" placeholder="Fecha Baja" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="idDepartamento">Departamento</label>
                            <select class="form-control" name="idDepartamento" id="idDepartamento" required>
                            </select>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="idJefe">Jefe</label>
                            <select class="form-control" name="idJefe" id="idJefe" required>
                            </select>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="idJefe">¿Es Jefe?</label>
                            <div class="form-group">
                                <input type="checkbox" name="esJefe" id="esJefe" required>
                                <label for="esJefe">Sí</label>
                            </div>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="usr">Usuario</label>
                            <input class="form-control" type="text" name="usr" id="usr" maxlength="256" placeholder="Usuario" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="pwd">Contraseña</label>
                            <input class="form-control" type="password" name="pwd" id="pwd" maxlength="256" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <label for="foto">Foto</label>
                            <input class="form-control" type="file" name="foto" id="foto">
                            <input class="form-control" type="hidden" name="fotoActual" id="fotoActual">
                            <img src="" width="150px" height="150px" id="imagenmuestra">
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

<script type="text/javascript" src="../files/js/empleado.js"></script>