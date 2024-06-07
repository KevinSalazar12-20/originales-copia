<!-- Contenedor del header -->
<?php require(RUTA_APP . '/vistas/plantilla/header.php'); ?>
<!-- Fin contenedor del header -->

<!-- Contenedor global -->
<div class="content-wrapper p-1">

    <!-- Contenedor titulo -->
    <section class="content-header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Ficha comercial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false">Ficha técnica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="contact" aria-selected="false">Actualizar producto</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>
                        Productos
                        <small>Agrovirtual</small>
                    </h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para generar un producto</h3>
                    </div>
                    <form role="form" id="producto_ficha_comercial">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="producto_documento_emprendedor">Documento del emprendedor</label>
                                <input type="text" class="form-control" id="producto_documento_emprendedor"
                                       name="producto_documento_emprendedor"
                                       placeholder="Por favor digite el documento del emprendedor" onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="producto_nombre">Nombre del producto</label>
                                <input type="text" class="form-control" id="producto_nombre"
                                       name="producto_nombre"
                                       placeholder="Por favor digite el nombre del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_nombre_contacto_up">Nombre de contacto UP</label>
                                <input type="text" class="form-control" id="producto_nombre_contacto_up"
                                       name="producto_nombre_contacto_up"
                                       placeholder="Por favor digite el nombre del contacto de la unidad productiva">
                            </div>
                            <div class="form-group">
                                <label for="producto_direccion_up">Dirección</label>
                                <input type="text" class="form-control" id="producto_direccion_up"
                                       name="producto_direccion_up"
                                       placeholder="Por favor digite la dirección de la unidad productiva">
                            </div>
                            <div class="form-group">
                                <label for="producto_telefono_1">Teléfono 1</label>
                                <input type="text" class="form-control" id="producto_telefono_1"
                                       name="producto_telefono_1"
                                       placeholder="Por favor digite el primer teléfono de contacto" onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="producto_telefono_2">Teléfono 2</label>
                                <input type="text" class="form-control" id="producto_telefono_2"
                                       name="producto_telefono_2"
                                       placeholder="Por favor digite el segundo teléfono de contacto" onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="producto_caracteristicas_producto">Características del producto</label>
                                <textarea class="form-control" name="producto_caracteristicas_producto"
                                          id="producto_caracteristicas_producto"
                                          placeholder="Por favor digite las características del producto" cols="30"
                                          rows="4"></textarea>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="producto_peso">Peso del producto</label>
                                    <input type="number" class="form-control" id="producto_peso"
                                           name="producto_peso"
                                           placeholder="Por favor digite el peso del producto y seleccione la unidad de medida" onkeypress="validar_numeros(event)">
                                </div>
                                <div class="col form-group">
                                    <label for="producto_peso_unidad_medida">Unidad de medida del producto</label>
                                    <select class="form-control" id="producto_peso_unidad_medida"
                                            name="producto_peso_unidad_medida">
                                        <option value="1">Tonelada</option>
                                        <option value="2">Kilogramo</option>
                                        <option value="3">Gramo</option>
                                        <option value="4">Milígramo</option>
                                        <option value="5">libra</option>
                                        <option value="6">Mililitros</option>
                                        <option value="7">No aplica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="producto_precio">Precio del producto</label>
                                <input type="number" class="form-control" id="producto_precio"
                                       name="producto_precio"
                                       placeholder="Por favor digite el precio del producto" onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="producto_ingredientes">Ingredientes del producto</label>
                                <textarea class="form-control" name="producto_ingredientes"
                                          id="producto_ingredientes"
                                          placeholder="Por favor digite los ingredientes del producto" cols="30"
                                          rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_descripcion">Descripción del producto</label>
                                <textarea class="form-control" name="producto_descripcion"
                                          id="producto_descripcion"
                                          placeholder="Por favor digite la descripción del producto" cols="30"
                                          rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_fotografia_principal">Fotografía principal del producto</label>
                                <input type="file" class="form-control" id="producto_fotografia_principal"
                                       name="producto_fotografia_principal">
                            </div>
                            <div class="form-group">
                                <label for="producto_fotografia_1">Foto producto 1</label>
                                <input type="file" class="form-control" id="producto_fotografia_1"
                                       name="producto_fotografia_1">
                            </div>
                            <div class="form-group">
                                <label for="producto_fotografia_2">Foto producto 2</label>
                                <input type="file" class="form-control" id="producto_fotografia_2"
                                       name="producto_fotografia_2">
                            </div>
                            <div class="form-group">
                                <label for="producto_fotografia_3">Foto producto 3</label>
                                <input type="file" class="form-control" id="producto_fotografia_3"
                                       name="producto_fotografia_3">
                            </div>
                            <div class="form-group">
                                <label for="producto_fotografia_4">Foto producto 4</label>
                                <input type="file" class="form-control" id="producto_fotografia_4"
                                       name="producto_fotografia_4">
                            </div>
                            <div class="form-group">
                                <label for="producto_categoria">Nombre de la categoría producto</label>
                                <select class="form-control" id="producto_categoria" name="producto_categoria">
                                    <?php foreach ($datos as $dato): ?>
                                        <option value="<?php echo $dato->id_categoria; ?>"><?php echo $dato->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="crear_producto()">Crear producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="box box-primary col-md-6 offset-md-3">
                    <h1>
                        Productos
                        <small>Agrovirtual</small>
                    </h1>
                    <div class="box-header with-border">
                        <h3 class="box-title">Por favor diligencie los siguientes campos para generar un producto</h3>
                    </div>
                    <form role="form" id="producto_ficha_tecnica">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="producto_tipo_presentacion">Tipo de presentación del producto</label>
                                <textarea class="form-control" id="producto_tipo_presentacion"
                                          name="producto_tipo_presentacion" rows="1"
                                          placeholder="Por favor ingrese una breve descripción del tipo de presentación"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_contenido_presentacion">Contenido de la presentación del
                                    producto</label>
                                <textarea class="form-control" id="producto_contenido_presentacion"
                                          name="producto_contenido_presentacion" rows="1"
                                          placeholder="Por favor ingrese una breve descripción de la presentación del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_tipos_presentacion">Contenido de los tipos de presentaciones del
                                    producto</label>
                                <textarea class="form-control" id="producto_tipos_presentacion"
                                          name="producto_tipos_presentacion" rows="1"
                                          placeholder="Por favor ingrese una breve descripción de los tipos presentaciones del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_costo">Precio del producto</label>
                                <input type="text" class="form-control" id="producto_costo" name="producto_costo"
                                       placeholder="Por favor ingrese el costo del producto"
                                       onkeypress="validar_numeros(event)">
                            </div>
                            <div class="form-group">
                                <label for="producto_nombre_tecnico">Nombre del producto técnico</label>
                                <input type="text" class="form-control" id="producto_nombre_tecnico"
                                       name="producto_nombre_tecnico"
                                       placeholder="Por favor ingrese el nombre del producto técnico">
                            </div>
                            <div class="form-group">
                                <label for="producto_volumen_produccion">Cantidad volumen de la producción del
                                    producto</label>
                                <input type="text" class="form-control" id="producto_volumen_produccion"
                                       name="producto_volumen_produccion"
                                       placeholder="Por favor ingrese el volumen de la producción del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_variedad">Variedad del producto</label>
                                <textarea class="form-control" id="producto_variedad" name="producto_variedad" rows="1"
                                          placeholder="Por favor ingrese una breve descripción de la variedad del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_nombre_cientifico">Nombre científico</label>
                                <input type="text" class="form-control" id="producto_nombre_cientifico"
                                       name="producto_nombre_cientifico"
                                       placeholder="Por favor ingrese el nombre científico del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_fotografia_cultivo">Nombre científico</label>
                                <input type="file" class="form-control" id="producto_fotografia_cultivo"
                                       name="producto_fotografia_cultivo"
                                       placeholder="Por favor ingrese el nombre científico del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_temperatura_requerida_envio">Temperatura requerida para el
                                    envió</label>
                                <input type="text" class="form-control" id="producto_temperatura_requerida_envio"
                                       name="producto_temperatura_requerida_envio"
                                       placeholder="Por favor ingrese la temperatura requerida del envió">
                            </div>
                            <div class="form-group">
                                <label for="producto_ntc_relacionada">Ntc relacionada</label>
                                <textarea class="form-control" id="producto_ntc_relacionada"
                                          name="producto_ntc_relacionada"
                                          rows="1"
                                          placeholder="Por favor ingrese la ntc relacionada con el producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_normas_vinculadas">Normas vinculadas producto</label>
                                <textarea class="form-control" id="producto_normas_vinculadas"
                                          name="producto_normas_vinculadas" rows="1"
                                          placeholder="Por favor ingrese las normas vinculadas del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_lotes_promocion">Lotes en promoción</label>
                                <input type="text" class="form-control" id="producto_lotes_promocion"
                                       name="producto_lotes_promocion"
                                       placeholder="Por favor ingrese los lotes de la promoción del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_caracteristicas_propias">Normas vinculadas producto</label>
                                <textarea class="form-control" id="producto_caracteristicas_propias"
                                          name="producto_caracteristicas_propias" rows="1"
                                          placeholder="Por favor ingrese las características propias del producto"></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="atras_formulario()">Atrás</button>
                            <button type="button" class="btn btn-primary" onclick="crear_producto()">Crear producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col">
                        <form class="form-inline mt-3">
                            <div class="form-group">
                                <input type="search" class="form-control" id="producto_busqueda"
                                       placeholder="Buscar emprendedor">
                            </div>
                            <div class="form-group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal" onclick="buscar_producto()">
                                    Buscar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Selecciona el producto a
                                                    actualizar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="respuesta_busqueda">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                        id="btn_ficha_comercial" disabled="true"
                                        onclick="enviar_codigo_producto(event)">
                                    Ficha comercial
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">

                                <form role="form" id="formulario_ficha_comercial">
                                    <input type="hidden" id="codigo_producto_ficha_comercial"
                                           name="codigo_producto_ficha_comercial">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="producto_documento_emprendedor_actualizar">Actualizar documento del
                                                emprendedor</label>
                                            <input type="text" class="form-control" id="producto_documento_emprendedor_actualizar"
                                                   name="producto_documento_emprendedor_actualizar"
                                                   placeholder="Por favor digite el documento del emprendedor">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_nombre_actualizar">Actualizar nombre del producto</label>
                                            <input type="text" class="form-control" id="producto_nombre_actualizar"
                                                   name="producto_nombre_actualizar"
                                                   placeholder="Por favor digite el nombre del producto">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_nombre_contacto_up_actualizar">Actualizar nombre de contacto UP</label>
                                            <input type="text" class="form-control" id="producto_nombre_contacto_up_actualizar"
                                                   name="producto_nombre_contacto_up_actualizar"
                                                   placeholder="Por favor digite el nombre del contacto de la unidad productiva">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_direccion_up_actualizar">Actualizar dirección</label>
                                            <input type="text" class="form-control" id="producto_direccion_up_actualizar"
                                                   name="producto_direccion_up_actualizar"
                                                   placeholder="Por favor digite la dirección de la unidad productiva">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_telefono_1_actualizar">Actualizar teléfono 1</label>
                                            <input type="text" class="form-control" id="producto_telefono_1_actualizar"
                                                   name="producto_telefono_1_actualizar"
                                                   placeholder="Por favor digite el primer teléfono de contacto">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_telefono_2_actualizar">Actualizar teléfono 2</label>
                                            <input type="text" class="form-control" id="producto_telefono_2_actualizar"
                                                   name="producto_telefono_2_actualizar"
                                                   placeholder="Por favor digite el segundo teléfono de contacto">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_caracteristicas_actualizar">Actualizar características del
                                                producto</label>
                                            <textarea class="form-control" name="producto_caracteristicas_actualizar"
                                                      id="producto_caracteristicas_actualizar"
                                                      placeholder="Por favor digite las características del producto"
                                                      cols="30"
                                                      rows="4"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="producto_peso_actualizar">Actualizar peso del producto</label>
                                                <input type="number" class="form-control" id="producto_peso_actualizar"
                                                       name="producto_peso_actualizar"
                                                       placeholder="Por favor digite el peso del producto y seleccione la unidad de medida">
                                            </div>
                                            <div class="col form-group">
                                                <label for="producto_peso_unidad_medida_actualizar">Actualizar unidad de medida del
                                                    producto</label>
                                                <select class="form-control" id="producto_peso_unidad_medida_actualizar"
                                                        name="producto_peso_unidad_medida_actualizar">
                                                    <option value="1">Tonelada</option>
                                                    <option value="2">Kilogramo</option>
                                                    <option value="3">Gramo</option>
                                                    <option value="4">Milígramo</option>
                                                    <option value="5">libra</option>
                                                    <option value="6">No aplica</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_precio_actualizar">Actualizar precio del producto</label>
                                            <input type="number" class="form-control" id="producto_precio_actualizar"
                                                   name="producto_precio_actualizar"
                                                   placeholder="Por favor digite el precio del producto">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_ingredientes_actualizar">Actualizar ingredientes del producto</label>
                                            <textarea class="form-control" name="producto_ingredientes_actualizar"
                                                      id="producto_ingredientes_actualizar"
                                                      placeholder="Por favor digite los ingredientes del producto"
                                                      cols="30"
                                                      rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_descripcion_actualizar">Actualizar descripción del producto</label>
                                            <textarea class="form-control" name="producto_descripcion_actualizar"
                                                      id="producto_descripcion_actualizar"
                                                      placeholder="Por favor digite la descripción del producto"
                                                      cols="30"
                                                      rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="producto_fotografia_principal_actual">
                                            <img src="" id="imagen" height="100px">
                                            <label for="producto_fotografia_principal_actualizar">Fotografía principal del
                                                producto</label>
                                            <input type="file" class="form-control" id="producto_fotografia_principal_actualizar"
                                                   name="producto_fotografia_principal_actualizar">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="imagen_producto_1_actual">
                                            <img src="" id="imagen_producto_1" height="100px">
                                            <label for="producto_fotografia_1_actualizar">Foto producto 1</label>
                                            <input type="file" class="form-control" id="producto_fotografia_1_actualizar"
                                                   name="producto_fotografia_1_actualizar">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="imagen_producto_2_actual">
                                            <img src="" id="imagen_producto_2" height="100px">
                                            <label for="producto_fotografia_2_actualizar">Foto producto 2</label>
                                            <input type="file" class="form-control" id="producto_fotografia_2_actualizar"
                                                   name="producto_fotografia_2_actualizar">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="imagen_producto_3_actual">
                                            <img src="" id="imagen_producto_3" height="100px">
                                            <label for="producto_fotografia_3_actualizar">Foto producto 3</label>
                                            <input type="file" class="form-control" id="producto_fotografia_3_actualizar"
                                                   name="producto_fotografia_3_actualizar">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="imagen_producto_4_actual">
                                            <img src="" id="imagen_producto_4" height="100px">
                                            <label for="producto_fotografia_4_actualizar">Foto producto 4</label>
                                            <input type="file" class="form-control" id="producto_fotografia_4_actualizar"
                                                   name="producto_fotografia_4_actualizar">
                                        </div>
                                        <div class="form-group">
                                            <label for="producto_categoria_actualizar">Nombre de la categoría producto</label>
                                            <select class="form-control" id="producto_categoria_actualizar"
                                                    name="producto_categoria_actualizar">
                                                <?php foreach ($datos as $dato): ?>
                                                    <option  value="<?php echo $dato->id_categoria; ?>"><?php echo $dato->nombre; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="actualizar_ficha_comercial()">
                                    Actualizar ficha comercial
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                id="btn_ficha_tecnica" disabled="true" onclick="enviar_codigo_producto(event)">
                            Ficha técnica
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                     data-parent="#accordionExample">
                    <div class="card-body">
                        <form role="form" id="formulario_ficha_tecnica">
                            <input type="hidden" id="codigo_producto_ficha_tecnica"
                                   name="codigo_producto_ficha_tecnica">
                            <div class="form-group">
                                <label for="producto_tipo_presentacion_actualizar">Tipo de presentación del
                                    producto</label>
                                <textarea class="form-control" id="producto_tipo_presentacion_actualizar"
                                          name="producto_tipo_presentacion_actualizar" rows="1"
                                          placeholder="Por favor ingrese una breve descripción del tipo de presentación"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_contenido_presentacion_actualizar">Contenido de la presentación del
                                    producto</label>
                                <textarea class="form-control" id="producto_contenido_presentacion_actualizar"
                                          name="producto_contenido_presentacion_actualizar" rows="1"
                                          placeholder="Por favor ingrese una breve descripción de la presentación del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_tipos_presentacion_actualizar">Contenido de los tipos de
                                    presentaciones
                                    del
                                    producto</label>
                                <textarea class="form-control" id="producto_tipos_presentacion_actualizar"
                                          name="producto_tipos_presentacion_actualizar" rows="1"
                                          placeholder="Por favor ingrese una breve descripción de los tipos presentaciones del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_costo_actualizar">Precio del producto</label>
                                <input type="text" class="form-control" id="producto_costo_actualizar"
                                       name="producto_costo_actualizar"
                                       placeholder="Por favor ingrese el costo del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_nombre_tecnico_actualizar">Nombre del producto técnico</label>
                                <input type="text" class="form-control" id="producto_nombre_tecnico_actualizar"
                                       name="producto_nombre_tecnico_actualizar"
                                       placeholder="Por favor ingrese el nombre del producto técnico">
                            </div>
                            <div class="form-group">
                                <label for="producto_volumen_produccion_actualizar">Cantidad volumen de la producción
                                    del
                                    producto</label>
                                <input type="text" class="form-control" id="producto_volumen_produccion_actualizar"
                                       name="producto_volumen_produccion_actualizar"
                                       placeholder="Por favor ingrese el volumen de la producción del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_variedad_actualizar">Variedad del producto</label>
                                <textarea class="form-control" id="producto_variedad_actualizar"
                                          name="producto_variedad_actualizar" rows="1"
                                          placeholder="Por favor ingrese una breve descripción de la variedad del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_nombre_cientifico_actualizar">Nombre científico</label>
                                <input type="text" class="form-control" id="producto_nombre_cientifico_actualizar"
                                       name="producto_nombre_cientifico_actualizar"
                                       placeholder="Por favor ingrese el nombre científico del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_temperatura_requerida_envio_actualizar">Temperatura requerida para
                                    el
                                    envió</label>
                                <input type="text" class="form-control"
                                       id="producto_temperatura_requerida_envio_actualizar"
                                       name="producto_temperatura_requerida_envio_actualizar"
                                       placeholder="Por favor ingrese la temperatura requerida del envió">
                            </div>
                            <div class="form-group">
                                <label for="producto_ntc_relacionada_actualizar">Ntc relacionada</label>
                                <textarea class="form-control" id="producto_ntc_relacionada_actualizar"
                                          name="producto_ntc_relacionada_actualizar"
                                          rows="1"
                                          placeholder="Por favor ingrese la ntc relacionada con el producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_normas_vinculadas_actualizar">Normas vinculadas producto</label>
                                <textarea class="form-control" id="producto_normas_vinculadas_actualizar"
                                          name="producto_normas_vinculadas_actualizar" rows="1"
                                          placeholder="Por favor ingrese las normas vinculadas del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_lotes_promocion_actualizar">Lotes en promoción</label>
                                <input type="text" class="form-control" id="producto_lotes_promocion_actualizar"
                                       name="producto_lotes_promocion_actualizar"
                                       placeholder="Por favor ingrese los lotes de la promoción del producto">
                            </div>
                            <div class="form-group">
                                <label for="producto_caracteristicas_propias_actualizar">Normas vinculadas
                                    producto</label>
                                <textarea class="form-control" id="producto_caracteristicas_propias_actualizar"
                                          name="producto_caracteristicas_propias_actualizar" rows="1"
                                          placeholder="Por favor ingrese las características propias del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="producto_telefono_1_actualizar">Primer teléfono del emprendedor</label>
                                <input type="text" class="form-control" id="producto_telefono_1_actualizar"
                                       name="producto_telefono_1_actualizar"
                                       placeholder="Por favor ingrese su primer numero de teléfono">
                            </div>
                            <div class="form-group">
                                <label for="">Segundo teléfono del emprendedor</label>
                                <input type="text" class="form-control" id=""
                                       name=""
                                       placeholder="Por favor ingrese su segundo numero de teléfono">
                            </div>
                            <div class="form-group">
                                <label for="producto_direccion_actualizar">Dirección del emprendedor</label>
                                <input type="text" class="form-control" id="producto_direccion_actualizar"
                                       name="producto_direccion_actualizar"
                                       placeholder="Por favor ingrese la dirección del emprendedor">
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="actualizar_ficha_tecnica()">
                                    Actualizar ficha técnica
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
