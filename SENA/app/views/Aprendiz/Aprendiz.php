<?php require RUTA_APP . '/views/inc/header2.php'; ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card" id="TablitaAprendiz">
                    <div class="card-header">
                        <b>Aprendiz</b> <button type="button" id="RegistrarAprendiz" class="btn btn-success" data-toggle='tooltip'
                            title=' Agregar un Aprendiz'> <i class="icon-plus"></i> </button>
                    </div>
                    <div class="card-body">
                        <table id="MiTablita" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Ficha</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card" id="formulario">
                    <div class="card-header">
                        <b>Aprendiz</b>
                    </div>
                    <div class="card-body">
                        <form id="formRegistrar" method="POST">
                            <div class="row ">
                                <div class="col-md-5">

                                    <label for="my-input">Identificacion</label>
                                    <input id="id" class="form-control" type="number" name="id" require>
                                    <label for="my-input">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" required>
                                    <label for="my-input">Apellidos</label>
                                    <input id="apellido" class="form-control" type="text" name="apellido" required>
                                    <label for="my-input">Ficha</label>
                                    <input id="ficha" class="form-control" type="number" name="ficha" required>
                                    <label for="my-input">Cedula Vigilante</label>
                                    <input id="cedvigilante" class="form-control" type="number" name="cedvigilante" required>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="button" id="cancelar"><i class="icon-reply"></i>
                                    Cancelar</button>

                                <input id="guardar" class="btn btn-success" type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" id="formularioEditar">
                    <div class="card-header">
                        <b>Aprendiz</b>
                    </div>
                    <div class="card-body">
                        <form id="formEditar" method="POST">
                            <div class="row">
                                <div class="col-md-5">

                                    <label for="my-input">Identificacion</label>
                                    <input id="id2" class="form-control" type="number" name="id" readonly>
                                    <label for="my-input">Nombre</label>
                                    <input id="nombre2" class="form-control" type="text" name="nombre" required>
                                    <label for="my-input">Apellidos</label>
                                    <input id="apellido2" class="form-control" type="text" name="apellido" required>
                                    <label for="my-input">Ficha</label>
                                    <input id="ficha2" class="form-control" type="text" name="ficha" required>
                                    <label for="my-input">Cedula Vigilante</label>
                                    <input id="cedvigilante2" class="form-control" type="text" name="cedvigilante" readonly>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="button" id="cancelarEditar"><i class="icon-reply"></i>
                                    Cancelar</button>

                                <input id="Editar" class="btn btn-success" type="submit" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- jQuery 3 -->
<script src="<?php echo RUTA_URL; ?>/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo RUTA_URL; ?>/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo RUTA_URL; ?>/js/adminlte.min.js"></script>

<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>

<!--main java script-->
<script src="<?php echo RUTA_URL; ?>/js/modulos/Aprendiz.js"></script>

<?php require RUTA_APP . '/views/inc/footer2.php'; ?>