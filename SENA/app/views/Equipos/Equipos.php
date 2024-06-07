<?php require RUTA_APP . '/views/inc/header2.php'; ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card" id="TablitaEquipos">
                    <div class="card-header">
                        <b>Equipos</b> <button type="button" id="RegistrarEquipos" class="btn btn-success" data-toggle='tooltip'
                            title=' Agregar un Equipo'> <i class="icon-plus"></i> </button>
                    </div>
                    <div class="card-body">
                        <table id="MiTablita" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id Equipo</th>
                                    <th>Serial</th>
                                    <th>Hora Entrada</th>
                                    <th>Hora Salida</th>
                                    <th>Identificacion Aprendiz</th>
                                    <th>Identificacion Visitante</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card" id="formulario">
                    <div class="card-header">
                        <b>Equipo</b>
                    </div>
                    <div class="card-body">
                        <form id="formRegistrar" method="POST">
                            <div class="row ">
                                <div class="col-md-5">

                                    <label for="my-input">Id Equipo</label>
                                    <input id="idequipo" class="form-control" type="number" name="idequipo" require>
                                    <label for="my-input">Serial</label>
                                    <input id="serial" class="form-control" type="number" name="serial" required>
                                    <label for="my-input">Hora Entrada</label>
                                    <input id="horaentrada" class="form-control" type="time" name="horaentrada" required>
                                    <label for="my-input">Hora Salida</label>
                                    <input id="horasalida" class="form-control" type="time" name="horasalida" required>
                                    <label for="my-input">Identificacion Aprendiz</label>
                                    <input id="idaprendiz" class="form-control" type="number" name="idaprendiz" required>
                                    <label for="my-input">Identificacion Visitante</label>
                                    <input id="idvisitante" class="form-control" type="number" name="idvisitante" required>

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
                        <b>Equipo</b>
                    </div>
                    <div class="card-body">
                        <form id="formEditar" method="POST">
                            <div class="row">
                                <div class="col-md-5">

                                    <label for="my-input">Id Equipo</label>
                                    <input id="idequipo2" class="form-control" type="number" name="idequipo" readonly>
                                    <label for="my-input">Serial</label>
                                    <input id="serial2" class="form-control" type="number" name="serial" required>
                                    <label for="my-input">Hora Entrada</label>
                                    <input id="horaentrada2" class="form-control" type="time" name="horaentrada" readonly>
                                    <label for="my-input">Hora Salida</label>
                                    <input id="horasalida2" class="form-control" type="time" name="horasalida" readonly>
                                    <label for="my-input">Identificacion Aprendiz</label>
                                    <input id="idaprendiz2" class="form-control" type="number" name="idaprendiz" readonly>
                                    <label for="my-input">Identificacion Visitante</label>
                                    <input id="idvisitante2" class="form-control" type="number" name="idvisitante" readonly>

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
<script src="<?php echo RUTA_URL; ?>/js/modulos/Equipos.js"></script>

<?php require RUTA_APP . '/views/inc/footer2.php'; ?>