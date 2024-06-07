<!-- Contenedor del header -->
<?php require RUTA_APP . './views/plantilla/header.php'; ?>
<!-- Fin contenedor del header -->

<!-- Contenedor global -->
<div class="content-wrapper">

    <!-- Contenedor titulo -->

    <section class="content-header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Crear municipio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false" onclick="listar_municipio()">Listado de municipio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="contact" aria-selected="false">Actualizar municipio</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>
                        Municipio
                        <small>Agrovirtual</small>
                    </h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para generar un nuevo
                            municipio</h3>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="municipio_nombre">Nombre del municipio</label>
                                <input type="text" class="form-control" id="municipio_nombre"
                                       placeholder="Por favor ingrese el nombre del municipio">
                            </div>
                            <div class="form-group">
                                <label for="municipio_departamento">Por favor seleccione el departamento del
                                    municipio </label>
                                <select class="form-control" id="municipio_departamento">
                                    <option value="Valle del cauca">Valle del cauca</option>
                                    <option value="Antioquia">Antioquia</option>
                                    <option value="Arauca">Arauca</option>
                                    <option value="Atlantico">Atlantico</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="crear_municipio()">Crear municipio
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nombre municipio</th>
                        <th>Departamento municipio</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody id="respuesta_municipio_eliminar">

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>
                        Municipio
                        <small>Agrovirtual</small>
                    </h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para actualizar el
                            municipio</h3>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-9">
                                    <label for="municipio_nombre_respuesta">Nombre del municipio</label>
                                    <input type="text" class="form-control" id="municipio_nombre_respuesta"
                                           placeholder="Por favor realice la búsqueda para poder actualizar el nombre del municipio"
                                           disabled="true">
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
                                        <div class="modal-dialog" role="document">
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
                                                               id="municipio_nombre_busqueda"
                                                               placeholder="Por favor ingrese el nombre del municipio"
                                                               onkeyup="actualizar_municipio()">
                                                    </div>
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Municipios</th>
                                                            <th>Departamento</th>
                                                            <th>Selección a actualizar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="respuesta_municipio_actualizar">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-9 d-none" id="oculto_1">
                                    <label for="municipio_nombre_enviado">Nuevo nombre del municipio</label>
                                    <input type="text" class="form-control" id="municipio_nombre_enviado"
                                           placeholder="Por favor ingrese el nuevo nombre del municipio">
                                </div>
                                <div class="form-group col-9">
                                    <input type="hidden" class="form-control" id="llave_secreta">
                                </div>
                                <div class="form-group col-9 ">
                                    <label for="municipio_departamento_respuesta">Departamento</label>
                                    <input type="text" class="form-control" id="municipio_departamento_respuesta"
                                           placeholder="Por favor realice la búsqueda para poder actualizar el departamento"
                                           disabled="true">
                                </div>
                                <div class="form-group col-9 d-none" id="oculto_2">
                                    <label for="municipio_departamento_enviado">Nuevo departamento</label>
                                    <select class="form-control" id="municipio_departamento_enviado">
                                        <option value="Valle del cauca">Valle del cauca</option>
                                        <option value="Antioquia">Antioquia</option>
                                        <option value="Arauca">Arauca</option>
                                        <option value="Atlantico">Atlantico</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="datos_actualizar_municipio()">Actualizar
                                municipio
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
<?php require RUTA_APP . './views/plantilla/footer.php'; ?>
<!-- Fin contenedor del footer -->
