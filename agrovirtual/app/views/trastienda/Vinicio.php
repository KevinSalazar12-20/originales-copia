<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <?php $css = "public/css/inicio.css";
    require(RUTA_APP . '/views/layout/head.php'); ?>
</head>

<body>
<div class="contenedor_global">
    <main>
        <div class="carousel carousel-slider">
            <a class="carousel-item" href="#one!"><img src="<?php echo RUTA_URL . 'public/img/banner-1.png'?>" class="imagenes"></a>
            <a class="carousel-item" href="#two!"><img src="<?php echo RUTA_URL . 'public/img/banner-2.png'?>" class="imagenes"></a>
            <a class="carousel-item" href="#three!"><img src="<?php echo RUTA_URL . 'public/img/banner-3.png'?>" class="imagenes"></a>
        </div>
    </main>
    <header>
        <?php require(RUTA_APP . '/views/layout/header.php'); ?>
    </header>
    <section>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header" onclick="categorias_dinamicas(event)" id="municipios">
                    Municipios
                    <span class="badge"></span></div>
                <div class="collapsible-body">
                    <div class="collection" id="respuesta_municipios">

                    </div>
                </div>
            </li>
            <li>
                <div class="collapsible-header" onclick="categorias_dinamicas(event)" id="categorias">
                    Categorias
                    <span class="badge"></span></div>
                <div class="collapsible-body">
                    <div class="collection" id="respuesta_categorias">

                    </div>
                </div>
            </li>
        </ul>
    </section>
    <div class="z-depth-5 publicidad">
    </div>
    <article>
        <div class="row" id="respuesta_tarjeta">
            <?php foreach ($datos['datos'] as $dato): ?>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo  RUTA_URL.'fotos/' . $dato->fotografia ; ?>" height="250px">
                            <span class="card-title"><?php echo $dato->producto; ?></span>
                        </div>
                        <div class="card-content">
                            <h6 class="center"><?php echo $dato->producto; ?></h6>
                            <em>Precio del producto:</em>
                            <h6 class="precio_producto">$<?php echo $dato->precio; ?></h6>
                        </div>
                        <div class="card-action">
                            <a href="<?php echo RUTA_URL . 'Enrutador/descripcion_producto/' . $dato->cod_producto; ?>">Descripción detallada</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
    <div class="paginacion">
        <div class="row">
            <div class="col">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <div class="page" id="paginacion">
                        <?php $numero = 6; ?>

                        <?php foreach ($datos['divisor'] as $dato): ?>
                            
                            <li class="active">
                            <a href="#!" onclick="paginacion(event)"
                               id="<?php echo $numero; ?>"><?php echo $dato; ?></a>
                            </li><?php $numero = $numero + 6 ?>

                        <?php endforeach; ?>
                    </div>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <aside>

    </aside>
    <footer>
        <?php require(RUTA_APP . '/views/layout/footer.php'); ?>
    </footer>
</div>
<!-- <?php require(RUTA_APP . '/views/layout/script.php'); ?> -->
</body>

</html>
