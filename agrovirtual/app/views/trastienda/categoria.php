<!-- Contenedor del header -->
<?php require RUTA_APP . './views/plantilla/header.php'; ?>
<!-- Fin contenedor del header -->

<!-- Contenedor global -->
<div class="content-wrapper">
    <section class="content-header">
        <!-- Contenedor información campos del formulario -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Crear categoría</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false" onclick="listar_categoria()">Listado de categorías</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="contact" aria-selected="false">Actualizar categorías</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>Categorías <small>Agrovirtual</small></h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para generar una categoría</h3>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="categoria_nombre">Nombre categoría</label>
                                <input type="text" class="form-control" id="categoria_nombre"
                                       placeholder="Por favor ingrese el nombre de la categoria">
                            </div>
                            <div class="form-group">
                                <label for="categoria_descripcion">Descripción categoría</label>
                                <input type="text" class="form-control" id="categoria_descripcion"
                                       placeholder="Por favor ingrese una breve descripción de la categoria">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="crear_categoria()">Crear categoría
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody id="respuesta_categoria_eliminar">

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>Categorías <small>Agrovirtual</small></h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para generar una categoría</h3>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-9">
                                    <label for="categoria_nombre">Nombre categoría</label>
                                    <input type="text" class="form-control" id="categoria_nombre_respuesta"
                                           placeholder="Aquí se presentara la categoría que seleccione" disabled="true">

                                </div>
                                <div class="form-group col-9 d-none" id="oculto_1">
                                    <label for="categoria_nombre_envio">Nuevo nombre de la categoría</label>
                                    <input type="text" class="form-control" id="categoria_nombre_envio"
                                           placeholder="Por favor ingrese el nuevo nombre de la categoría de arriba">
                                    <input type="hidden" class="form-control" id="llave_secreta">
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Búsqueda de la categoría</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <input type="text" class="form-control"
                                                               id="categoria_nombre_busqueda"
                                                               placeholder="Por favor ingrese el nombre de la categoría"
                                                               onkeyup="actualizar_categoria()">
                                                    </div>
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Descripción</th>
                                                            <th>Selección a actualizar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="respuesta_categoria_actualizar">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-9">
                                    <label for="categoria_descripcion">Descripción categoría</label>
                                    <input type="text" class="form-control" id="categoria_descripcion_respuesta"
                                           placeholder="Aquí se presentara la descripción de la categoría que seleccione" disabled="true">
                                </div>
                                <div class="form-group col-9 d-none" id="oculto_2">
                                    <label for="categoria_descripcion_envio">Nueva Descripción categoría</label>
                                    <input type="text" class="form-control" id="categoria_descripcion_envio"
                                           placeholder="Por favor ingrese una nueva descripción de la categoría de arriba">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="datos_actualizar_categoria()">Actualizar categoría
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Fin contenedor información campos del formulario -->
    </section>
</div>
<!-- Contenedor global -->

<!-- Contenedor del footer -->
<?php require RUTA_APP . './views/plantilla/footer.php'; ?>
<!-- Fin contenedor del footer -->
