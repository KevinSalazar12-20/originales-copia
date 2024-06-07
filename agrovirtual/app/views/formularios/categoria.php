<!-- Contenedor del header -->
<?php require RUTA_APP . './views/plantilla/HeaderN.php'; ?>
<!-- Fin contenedor del header -->

<!--Contenedor Global-->
<div class="content-wrapper">
    <!-- Inicio del Section-->
    <section class="content container-fluid">

        <div class="row">

            <div class="col-md-12">
                
                <div class="col-md-12" style="height:700px">
                    
                    <div class="card" id="tablacateg">
                    
                        <div class="card-header">

                            <b>Agregar Municipio</b> <button type="button" id="nuevomunicipio" class="btn btn-secondary" data-toggle='tooltip'
                            title=' Agregar un nuevo municipio'> <i class="icon-plus"></i> </button>

                            <button type="button" id="nuevacategoria" class="btn btn-secondary" data-toggle='tooltip'
                                title='Crear una nueva categoria'>
                                Crear Categoria
                            </button>

                        </div>

                        <div class="card-body">
                            <table id="mitablacateg" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Id Categoria</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>

                    </div>


                    <div class="card" id="crearcategoria" >
                        <div class="card-header">
                            <b>Categoria</b>
                        </div>
                        <div class="card-body">
                            <form class="formeditar" method="POST">
                                <div class="row">
                                    <div class="col-md-5">

                                        <label for="my-input">Id Categoria</label>
                                        <input id="id_categorias" class="form-control" type="text" name="id_categorias" readonly>

                                        <label for="categoria_nombre">Nombre categoría</label>
                                        <input type="text" name="nombre" class="form-control" id="nombre"
                                            placeholder="Por favor ingrese el nombre de la categoria" required>

                                        <label for="categoria_descripcion">Descripción categoría</label>
                                        <input type="text" name="descripcion" class="form-control" id="descripcion"
                                            placeholder="Por favor ingrese una breve descripción de la categoria" required>
                                            
                                    </div>
                                    <div class="col-md-5">
                                        
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
<script src="public/js/modulos/categoria.js"></script>

<!-- Contenedor del footer -->
<?php require RUTA_APP . './views/plantilla/FooterN.php'; ?>
<!-- Fin contenedor del footer -->