<nav class="z-depth-5">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><img src="<?php echo RUTA_URL.'public/img/sena2.png'; ?>"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger deep-purple darken-4"
               href="#iniciar">Iniciar sesion</a>

            <!-- Modal Structure -->
            <div id="iniciar" class="modal">
                <div class="modal-header">
                    <h3 class="black-text center">Ingresa a tu perfil</h3>
                </div>
                <div class="modal-content">
                    <form method="POST">
                        <div class="input-field">
                            <input id="usuario" type="text" name="usuario">
                            <label for="usuario">Ingrese su nombre de usuario</label>
                        </div>
                        <div class="input-field">
                            <input id="contrasena_usuario" type="password" name="contrasena_usuario">
                            <label for="contrasena_usuario">Ingrese su contraseña</label>
                        </div>
                        <button type="button" class="btn deep-purple darken-4" onclick="iniciar_sesion()">Ingresar</button>
                    </form>
                </div>
            </div>
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger deep-purple darken-4"
               href="#registrar">Registrarse</a>

            <!-- Modal Structure -->
            <div id="registrar" class="modal">
                <div class="modal-header">
                    <h3 class="black-text center">Regístrate</h3>
                </div>
                <div class="modal-content">
                    <form method="POST">
                        <div class="input-field">
                            <input id="usuario_documento" type="text" onkeypress="validar_numeros(event)">
                            <label for="usuario_documento">Digite su documento</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_nombre" type="text">
                            <label for="usuario_nombre">Digite sus nombres</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_apellido" type="text">
                            <label for="usuario_apellido">Digite sus apellidos</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_telefono" type="text" onkeypress="validar_numeros(event)">
                            <label for="usuario_telefono">Digite su numero de teléfono</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_direccion" type="text">
                            <label for="usuario_direccion">Digite su dirección</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_correo" type="text">
                            <label for="usuario_correo">Digite su correo electrónico</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_usuario" type="text">
                            <label for="usuario_usuario">Digite su usuario</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_clave" type="password">
                            <label for="usuario_clave">Digite su contraseña</label>
                        </div>
                        <div class="input-field">
                            <input id="usuario_clave2" type="password">
                            <label for="usuario_clave2">Digite nuevamente la contraseña</label>
                        </div>
                        <button type="button" class="btn deep-purple darken-4" onclick="registrar_usuarios()">Ingresar</button>
                    </form>
                </div>
            </div>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</>
    </li>
    <li><a href="mobile.html">Mobile</a></li>
</ul>
