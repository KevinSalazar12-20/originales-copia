<!-- Contenedor del header -->
<?php require RUTA_APP . './views/plantilla/header.php'; ?>
<!-- Fin contenedor del header -->

<!-- Contenedor global -->
<div class="content-wrapper">

    <!-- Contenedor titulo -->
    <section class="content-header">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#emprendedor_crear" role="tab"
                   aria-controls="home" aria-selected="true">Crear emprendedor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#emprendedor_listar" role="tab"
                   aria-controls="profile" aria-selected="false">Listado de emprendedor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#emprendedor_actualizar" role="tab"
                   aria-controls="messages" aria-selected="false">Actualizar emprendedor</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="emprendedor_crear" role="tabpanel" aria-labelledby="home-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>
                        Emprendedor
                        <small>Agrovirtual</small>
                    </h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para generar un
                            emprendedor</h3>
                    </div>
                    <form role="form" id="formulario_emprendedor">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="emprendedor_documento">Documento emprendedor (Obligatorio)</label>
                                <input type="text" class="form-control" id="emprendedor_documento" name="emprendedor_documento"
                                       placeholder="Por favor ingrese el documento del emprendedor"
                                       onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_usuario">Nombre del usuario (Obligatorio)</label>
                                <input type="text" class="form-control" id="emprendedor_usuario" name="emprendedor_usuario"
                                       placeholder="Por favor ingrese el nombre del usuario">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_clave">Clave usuario (Obligatorio)</label>
                                <input type="password" class="form-control" id="emprendedor_clave" name="emprendedor_clave"
                                       placeholder="Por favor ingrese la clave del usuario">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_clave2">Confirmar clave del usuario (Obligatorio)</label>
                                <input type="password" class="form-control" id="emprendedor_clave2" name="emprendedor_clave2"
                                       placeholder="Por favor confirme nuevamente la clave del usuario">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_nombre">Nombres del emprendedor (Obligatorio)</label>
                                <input type="text" class="form-control" id="emprendedor_nombre" name="emprendedor_nombre"
                                       placeholder="Por favor ingrese los nombres del emprendedor">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_apellido">Apellidos del emprendedor (Obligatorio)</label>
                                <input type="text" class="form-control" id="emprendedor_apellido" name="emprendedor_apellido"
                                       placeholder="Por favor ingrese los apellidos del emprendedor">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_fecha_nacimiento">Fecha de nacimiento del emprendedor (Obligatorio)</label>
                                <input type="date" class="form-control" id="emprendedor_fecha_nacimiento" name="emprendedor_fecha_nacimiento"
                                       placeholder="Por favor ingrese la fecha de nacimiento del emprendedor">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_direccion">Dirección del emprendedor (Obligatorio)</label>
                                <input type="text" class="form-control" id="emprendedor_direccion" name="emprendedor_direccion"
                                       placeholder="Por favor ingrese la dirección del emprendedor">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_correo">Correo electrónico del emprendedor</label>
                                <input type="email" class="form-control" id="emprendedor_correo" name="emprendedor_correo"
                                       placeholder="Por favor ingrese el correo electrónico del emprendedor">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_telefono">Teléfono del emprendedor (Obligatorio)</label>
                                <input type="email" class="form-control" id="emprendedor_telefono" name="emprendedor_telefono"
                                       placeholder="Por favor ingrese el teléfono del emprendedor"
                                       onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_logo_up">Logo unidad productiva (Obligatorio)</label>
                                <input type="file" class="form-control" id="emprendedor_logo_up"
                                       name="emprendedor_logo_up">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_foto_personal_up">Foto del personal de la unidad productiva (Obligatorio)</label>
                                <input type="file" class="form-control" id="emprendedor_foto_personal_up"
                                       name="emprendedor_foto_personal_up">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_descripcion_up">Descripción de la unidad productiva (Obligatorio)</label>
                                <textarea class="form-control" name="emprendedor_descripcion_up"
                                          id="emprendedor_descripcion_up"
                                          placeholder="Por favor digite la descripción de la unidad productiva"
                                          cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_unidad_productiva">Unidad productiva (Obligatorio)</label>
                                <input type="text" class="form-control" id="emprendedor_unidad_productiva"
                                       name="emprendedor_unidad_productiva"
                                       placeholder="Por favor digite el nombre la unidad productiva">
                            </div>
                            <div class="form-group">
                                <label for="emprendedor_municipio">Municipio de residencia del emprendedor (Obligatorio)</label>
                                <select class="form-control" id="emprendedor_municipio" name="emprendedor_municipio">
                                    <?php foreach ($datos as $dato): ?>
                                        <option value="<?php echo $dato->id_municipio ?>"><?php echo $dato->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="crear_emprendedor()">Crear
                                emprendedor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="emprendedor_listar" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col">
                        <form class="form-inline mt-3">
                            <div class="form-group">
                                <input type="search" class="form-control" id="emprendedor_busqueda"
                                       placeholder="Buscar emprendedor" onkeyup="listar_emprendedor()">
                            </div>
                            <div class="form-group">
                                <button class="ml-1 btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    ¿Como funciona?
                                </button>
                            </div>
                        </form>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Donde aparece buscar emprendedor por favor ingrese solamente la cédula del emprendedor,
                                y de esta forma se comenzara a realizar filtros por las coincidencias
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover responsive-table">
                    <thead>
                    <tr>
                        <th>Nombres emprendedor</th>
                        <th>Apellidos emprendedor</th>
                        <th>Dirección emprendedor</th>
                        <th>Teléfono emprendedor</th>
                        <th>Fecha_nacimiento</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody id="respuesta_emprendedor_eliminar">

                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="emprendedor_actualizar" role="tabpanel" aria-labelledby="messages-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>
                        Emprendedor
                        <small>Agrovirtual</small>
                    </h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para actualizar el
                            emprendedor</h3>
                    </div>
                    <form role="form" id="formulario_emprendedor_actualizar">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-9">
                                    <label for="emprendedor_documento_actualizar">Documento del emprendedor</label>
                                    <input type="text" class="form-control emprendedor_actualizar" id="emprendedor_documento_actualizar"
                                           name="emprendedor_documento_actualizar"
                                           placeholder="Por favor realice la búsqueda para visualizar su documento"
                                           disabled="true" onkeypress="validar_numeros(event)">
                                </div>
                                <div class="form-group d-flex flex-column justify-content-end align-items-star">
                                    <!-- Button trigger modal    -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                        Buscar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Búsqueda del
                                                        municipio</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <input type="text" class="form-control"
                                                               id="documento_emprendedor_busqueda"
                                                               placeholder="Por favor ingrese el documento del emprendedor  "
                                                               onkeyup="captura_actualizar_emprendedor()">
                                                    </div>
                                                    <table class="table table-bordered table-hover table-responsive">
                                                        <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Nombres</th>
                                                            <th>Apellidos</th>
                                                            <th>Dirección</th>
                                                            <th>Teléfono</th>
                                                            <th>Fecha de nacimiento</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="respuesta_emprendedor_actualizar">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-9 d-none">
                                    <input type="hidden" class="form-control" id="llave_secreta">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_nombre_actualizar">Nombres del emprendedor</label>
                                    <input type="text" class="form-control emprendedor_actualizar" id="emprendedor_nombre_actualizar"
                                           name="emprendedor_nombre_actualizar"
                                           placeholder="Por favor realice la búsqueda para poder actualizar los nombres del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_apellido_actualizar">Apellidos del emprendedor</label>
                                    <input type="text" class="form-control emprendedor_actualizar" id="emprendedor_apellido_actualizar"
                                           name="emprendedor_apellido_actualizar"
                                           placeholder="Por favor realice la búsqueda para poder actualizar los apellidos del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_direccion_actualizar">Dirección del emprendedor</label>
                                    <input type="text" class="form-control emprendedor_actualizar" id="emprendedor_direccion_actualizar"
                                           name="emprendedor_direccion_actualizar"
                                           placeholder="Por favor realice la búsqueda para poder actualizar la dirección del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_telefono_actualizar">Teléfono del emprendedor</label>
                                    <input type="text" class="form-control emprendedor_actualizar" id="emprendedor_telefono_actualizar"
                                           name="emprendedor_telefono_actualizar"
                                           placeholder="Por favor realice la búsqueda para poder actualizar el teléfono del emprendedor"
                                           disabled="true" onkeypress="validar_numeros(event)">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_fecha_nacimiento_actualizar">Fecha de nacimiento del emprendedor</label>
                                    <input type="date" class="form-control emprendedor_actualizar" id="emprendedor_fecha_nacimiento_actualizar"
                                           name="emprendedor_fecha_nacimiento_actualizar"
                                           placeholder="Por favor realice la búsqueda para poder actualizar la fecha del nacimiento del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_usuario_actualizar">Usuario del emprendedor</label>
                                    <input type="text" class="form-control emprendedor_actualizar" id="emprendedor_usuario_actualizar"
                                           name="emprendedor_usuario_actualizar"
                                           placeholder="Por favor realice la búsqueda para poder actualizar el usuario del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_clave_actual">Clave actual del emprendedor</label>
                                    <input type="password" class="form-control emprendedor_actualizar" id="emprendedor_clave_actual"
                                           name="emprendedor_clave_actual"
                                           placeholder="Por favor ingrese la clave actual del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_clave_actualizar">Nueva clave del emprendedor</label>
                                    <input type="password" class="form-control emprendedor_actualizar" id="emprendedor_clave_actualizar"
                                           name="emprendedor_clave_actualizar"
                                           placeholder="Por favor ingrese la nueva clave del emprendedor"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_clave_confirmar">Confirmar la nueva clave</label>
                                    <input type="password" class="form-control emprendedor_actualizar" id="emprendedor_clave_confirmar"
                                           name="emprendedor_clave_confirmar"
                                           placeholder="Por favor ingrese nuevamente su nueva clave"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_municipio_actualizar">Municipio de residencia del emprendedor</label>
                                    <select class="form-control emprendedor_actualizar" name="emprendedor_municipio_actualizar" id="emprendedor_municipio_actualizar" disabled="disabled">
                                        <?php foreach ($datos as $dato): ?>
                                            <option value="<?php echo $dato->id_municipio ?>"><?php echo $dato->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_descripcion_up_actualizar">Descripción de la unidad productiva</label>
                                    <textarea class="form-control" name="emprendedor_descripcion_up_actualizar"
                                              id="emprendedor_descripcion_up_actualizar"
                                              placeholder="Por favor digite la descripción de la unidad productiva"
                                              cols="30" rows="4" disabled="disabled"></textarea>
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_unidad_productiva_actualizar">Unidad productiva</label>
                                    <input type="text" class="form-control" id="emprendedor_unidad_productiva_actualizar"
                                           name="emprendedor_unidad_productiva_actualizar"
                                           placeholder="Por favor digite el nombre la unidad productiva" disabled="disabled">
                                </div>
                                <div class="form-group col-9">
                                    <input type="hidden" id="imagen_logo_actual" name="imagen_logo_actual">
                                    <img src="" id="imagen_logo_up" height="100px">
                                    <label for="emprendedor_logo_up_actualizar">Logo unidad productiva</label>
                                    <input type="file" class="form-control" id="emprendedor_logo_up_actualizar"
                                           name="emprendedor_logo_up_actualizar" disabled="disabled">
                                </div>
                                <div class="form-group col-9">
                                    <input type="hidden" id="imagen_personal_up_actual" name="imagen_personal_up_actual">
                                    <img src="" id="imagen_personal_up" height="100px">
                                    <label for="emprendedor_foto_personal_up_actualizar">Foto del personal de la unidad productiva (Obligatorio)</label>
                                    <input type="file" class="form-control" id="emprendedor_foto_personal_up_actualizar"
                                           name="emprendedor_foto_personal_up_actualizar" disabled="disabled">
                                </div>
                                <div class="form-group col-9">
                                    <label for="emprendedor_correo_actualizar">Correo electrónico del emprendedor</label>
                                    <input type="email" class="form-control" id="emprendedor_correo_actualizar" name="emprendedor_correo_actualizar"
                                           placeholder="Por favor ingrese el correo electrónico del emprendedor" disabled="disableds">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="envio_actualizar_emprendedor()">
                                Actualizar emprendedor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fin contenedor titulo -->

        <!-- Contenedor información campos del formulario -->

        <!--Fin contenedor información campos del formulario -->
    </section>
</div>


<!-- Contenedor global -->

<!-- Contenedor del footer -->
<?php require(RUTA_APP . '/vistas/plantilla/footer.php'); ?>
<!-- Fin contenedor del footer -->
