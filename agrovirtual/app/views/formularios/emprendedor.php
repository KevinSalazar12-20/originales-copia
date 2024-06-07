<!-- Contenedor del header -->
<?php require RUTA_APP . './views/plantilla/HeaderN.php'; ?>
<!-- Fin contenedor del header -->

<!--Contenedor Global-->
<div class="content-wrapper">
    <!-- Inicio del Section-->
    <section class="content container-fluid">

        <div class="row">

            <div class="col-md-12">
                
                <div class="col-md-12" style="height:1000px">
                    
                    <div class="card" id="tablaemp">
                    
                        <div class="card-header">
                            
                            <b>Agregar Emprendedor</b> <button type="button" id="nuevoemprendedor" class="btn btn-secondary" data-toggle='tooltip'
                            title=' Agregar un nuevo emprendedor'> <i class="icon-plus"></i> </button>

                        </div>

                        <div class="card-body">
                            <table id="mitablaemp" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Nombres Emprendedor</th>
                                        <th>Apellido Emprendedor</th>
                                        <th>Materia de Produccion</th>
                                        <th>Teléfono Emprendedor</th>
                                        <th>Fecha de Nacimiento</th>
                                        
                                    </tr>
                                </thead>
                            </table>

                        </div>

                    </div>


                    <div class="card" id="crearemprendedor" >
                        <div class="card-header">
                            <b>Emprendedor</b>
                        </div>
                        <div class="card-body">
                            <form class="formeditar" method="POST">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="my-input">Documento emprendedor (Obligatorio)</label>
                                        <input id="cedula" class="form-control" type="text" name="cedula"  
                                            placeholder="Por favor ingrese el documento del emprendedor" required>

                                        <label for="my-input">Nombre del usuario (Obligatorio)</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            placeholder="Por favor ingrese el nombre del usuario" required>

                                        <label for="my-input">Clave usuario (Obligatorio)</label>
                                        <input type="password" class="form-control" id="clave" name="clave"
                                            placeholder="Por favor ingrese la clave del usuario" required>

                                        <label for="my-input">Confirmar clave del usuario (Obligatorio)</label>
                                        <input type="password" class="form-control" id="clave_confirmacion" name="clave_confirmacion"
                                            placeholder="Por favor confirme nuevamente la clave del usuario" required>

                                        <label for="my-input">Nombres del emprendedor (Obligatorio)</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Por favor ingrese los nombres del emprendedor" required>

                                        <label for="my-input">Apellidos del emprendedor (Obligatorio)</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                            placeholder="Por favor ingrese los apellidos del emprendedor" required>

                                        <label for="my-input">Dirección del emprendedor (Obligatorio)</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                            placeholder="Por favor ingrese la dirección del emprendedor" required>

                                        <label for="my-input">Teléfono del emprendedor (Obligatorio)</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            placeholder="Por favor ingrese el teléfono del emprendedor" required>

                                        

                                        
                                    </div>
                                    <div class="col-md-5">
                                        
                                    |   <label for="my-input">Unidad productiva (Obligatorio)</label>
                                        <input type="text" class="form-control" id="unidad_productiva"
                                            name="unidad_productiva" placeholder="Por favor digite el nombre la unidad productiva" required>

                                        <label for="my-input">Descripción de la unidad productiva (Obligatorio)</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion"
                                            placeholder="Por favor digite la descripción de la unidad productiva"
                                            cols="30" rows="4"></textarea>

                                        <label for="my-input">Logo unidad productiva (Obligatorio)</label>
                                        <input type="file" class="form-control" id="logo"
                                            name="logo" required>
                                        
                                        <label for="my-input">Foto del personal de la unidad productiva (Obligatorio)</label>
                                        <input type="file" class="form-control" id="foto_personal"
                                            name="foto_personal" required>

                                        <label for="my-input">Fecha de nacimiento del emprendedor (Obligatorio)</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                            placeholder="Por favor ingrese la fecha de nacimiento del emprendedor" required>

                                        <label for="my-input">Municipio de residencia del emprendedor (Obligatorio)</label>
                                        <select class="form-control" id="municipio_id_emprendedor" name="emprendedor_municipio">
                                            <?php foreach ($datos as $dato): ?>
                                                <option value="<?php echo $dato->id_municipio ?>"><?php echo $dato->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-danger" type="button" id="cancelar"><i class="icon-reply"></i>
                                            Cancelar</button>

                                        <input id="guardar" class="btn btn-success" type="submit" value="Guardar">
                                    
                                   
                            </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
    crossorigin="anonymous"></script>
<!--d-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!--Bootstrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="<?php echo RUTA_URL; ?>js/adminlte.min.js"></script>

<!-- DataTable -->
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>

<!-- JsScript -->
<script src="public/js/modulos/emprendedor.js"></script>

<!-- Contenedor del footer -->
<?php require RUTA_APP . './views/plantilla/FooterN.php'; ?>
<!-- Fin contenedor del footer -->