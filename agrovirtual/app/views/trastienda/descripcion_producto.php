<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $css = "public/css/producto.css";
    require(RUTA_APP . '/vistas/layout/head.php'); ?>
</head>

<body>
<div class="contenedor_global">
    <header>
        <?php require(RUTA_APP . '/vistas/layout/header.php'); ?>
    </header>
    <article class="z-depth-1">
        <div class="carousel carousel-slider">
            <?php foreach ($datos as $dato): ?>
                <a class="carousel-item" href="#one!"><img src="<?php echo RUTA_URL . '/public/fotos/PRODUCTOSVINCULADOS/' . $dato->foto1; ?>" class="n"></a>
                <a class="carousel-item" href="#two!"><img src="<?php echo RUTA_URL . '/public/fotos/PRODUCTOSVINCULADOS/' . $dato->foto2; ?>" class="n"></a>
                <a class="carousel-item" href="#three!"><img src="<?php echo RUTA_URL . '/public/fotos/PRODUCTOSVINCULADOS/' . $dato->foto3; ?>" class="n"></a>
                <a class="carousel-item" href="#three!"><img src="<?php echo RUTA_URL . '/public/fotos/PRODUCTOSVINCULADOS/' . $dato->foto4; ?>" class="n"></a>
            <?php endforeach; ?>
        </div>
    </article>
    <section class="z-depth-1">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">assignment</i>
                    Descripcion del producto
                </div>
                <div class="collapsible-body">
                    <?php foreach ($datos as $dato): ?>
                        <h5 class="center"><?php echo $dato->nombre_producto ?></h5>
                        <h6>Descripción del producto: <?php echo $dato->descripcion ?></h6>
                        <h6>Características del producto: <?php echo $dato->descripcion ?></h6>
                        <h6>Peso: <?php echo $dato->peso ?></h6>
                    <?php endforeach; ?>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">contacts</i>
                    Contactame
                </div>
                <div class="collapsible-body">
                    <?php foreach ($datos as $dato): ?>
                        <h5 class="center">Contacto unidad productiva</h5>
                        <h6>Nombre contacto: <?php echo $dato->nombre_contacto ?></h6>
                        <h6>Dirección: <?php echo $dato->direccion ?></h6>
                        <h6>Teléfono 1: <?php echo $dato->telefono1 ?> </h6>
                        <h6>Teléfono 2: <?php echo $dato->telefono2 ?> </h6>
                    <?php endforeach; ?>
                </div>
            </li>
        </ul>
        <?php foreach ($datos as $dato): ?>
            <em><h5 class="center titulo">PRECIO DEL PRODUCTO: $<?php echo $dato->precio ?></h5></em>
        <?php endforeach; ?>
    </section>
    <main class="z-depth-1">
        <a class="btn" href="<?php echo RUTA_URL . 'Enrutador/regresar_inicio/'; ?>">regresar al inicio</a>
    </main>
    <footer>
        <?php require(RUTA_APP . '/vistas/layout/footer.php'); ?>
    </footer>
</div>
<script src="<?php echo RUTA_URL . 'public/materialize/js/materialize.min.js'; ?>"></script>
<script>
    M.AutoInit();
    var elem = document.querySelector('.carousel');
    var instance = M.Carousel.init(elem, {
        indicators: true,
        duration: 400,
        fullWidth: true,
        indicators: true,
        duration: 400,
    });

    setInterval(() => {
        console.log(instance.pressed);
        if (!instance.pressed) {
            instance.next();
        }
    }, 6000);

</script>
</body>

</html>
