/**
 @global El uso de RUTA_URL como variable global es poder centralizar todas las peticiones
 que van dirigidas hacia el controlador principal, que se encarga de gestionar
 y validar todos los datos que son enviados de forma asincrona y RUTA_IMAGENES
 es la encargada de recortar la ruta para mostrar las imagenes que llegan desde
 la base de datos
 */

RUTA_URL = "http://localhost:8080/agrovirtual/";
/* RUTA_URL = "http://www.agrovirtual.org/Enrutador/"; */
RUTA_IMAGENES = "http://www.agrovirtual.org/fotos/";
RUTA_IMG_PERSONAL_UP =
  "/home/agrovi/public_html/public/fotos/logo/FOTOPERSONALUP/";
RUTA_IMG_LOGO_UP = "/home/agrovi/public_html/public/fotos/logo/";
RUTA_PRODUCTOS_VINCULADOS =
  "http://www.agrovirtual.org/fotos/PRODUCTOSVINCULADOS/";

/**
 @param integer
 @return void evento que pausa la ejecución del DOOM cuando no se digita un numero
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example El usuario solo puede ingresar numeros en el cuadro de texto, porque cuando este ejecuta alguna tecla que no
 corresponda a un valor numerico se bloqueara automaticamente su ejecución, esto principalmente sirve para validar los
 campos numericos y evitar errores del usuario.
 @uses La referencia al elemento asociado es el cuadro de texto que detecta la presión de la tecla
 * */
function validar_numeros(e) {
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}

/**
 @param void
 @return void redirige el rol del usuario hacia el controlador solicitado
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example El usuario digita sus credenciales dentro del cuadro de texto indicado, y por medio de esto ejecuta la acción
 de envío de los datos, los cuales realizan una petición asincrona para el controlador que gestiona el inicio de sesión
 se envian estos datos en formato JSON y posteriormente se valida en la bd si existe ese usuario y se activa una variable
 de sesión, se regresa una respuesta de texto a la petición con nombres como emprendedor, cuando llega al condicional
 se verifica si el nombre coincide con el condicional o cual vista se solicito, ya sea la del usuario o administrador,
 se dirige con un hreft hacia ese controlador y antes de mostrarla se valida la sesión si esta no fue iniciada antes del
 proceso regresara a la vista del login.
 @throws En la petición creamos un throw que verifica si el envio por el url no fue correcto, esto devuelve un
 estado 200 en el navegador si se realizo correctamente o un 404 si no se encuentra la ruta especificada
 para el envio de estos datos, tambien en los condicionales esperamos la respuesta de un texto, si antes del
 envío algún dato falta por ser escrito, regresara false1, false2, false3 en formato de texto, y cada uno de estos
 tiene su propio error designado desde el controlador y desde esta función para ser mostrados como una alerta.
 @uses la referencia al elemento asociado es el botón que gestiona el inicio de sesión.
 * */

function iniciar_sesion() {
  window.location.href = RUTA_URL + "inicio";
  /*  let usuario = document.getElementById("usuario").value;
  let usuario_contrasena = document.getElementById("contrasena_usuario").value;
  if (usuario === "" || usuario_contrasena === "") {
    alert("Alguno de los campos se encuentra vacío");
  } else {
    let objeto = {
      usuario: usuario,
      usuario_contrasena: usuario_contrasena,
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "validar_login", { method: "POST", body: formData })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        if (json == "admin") {
          window.location.href = RUTA_URL + "admin";
        } else if (json == "emprendedor") {
          window.location.href = RUTA_URL + "emprendedor";
        } else if (json == "cliente") {
          window.location.href = RUTA_URL + "cliente";
        } else if (json == "false1") {
          alert(
            "Los campos se encuentran vacios porfavor reviselo y intentelo nuevamente"
          );
        } else if (json == "false2") {
          alert("El usuario ingresado en el sistema no existe");
        } else if (json == "false3") {
          alert("La contraseña es incorrecta, por favor vuelva a intentarlo");
        } else if (json == "false4") {
          alert("El usuario y la contraseña no coinciden");
        } else {
          alert(
            "Hubo un error en el ingreso del sistema por favor recargue la pagina"
          );
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  } */
}

/**
 @param void
 @return void un mensaje de alerta que verifica que se registra correctamente en el sistema
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 @example El usuario ingresa sus datos en el formulario de registro y envia los datos por medio de una petición
 asincrona con estos mismos en formato JSON, los datos llegan al controlador especificado y posteriormente
 se validan, si alguno de los datos se encuentra vacio o no conincide con el tipo especificado por el sistema,
 se retorna un error en una alerta y si se realiza correctamente la inserción del usuario se cierra la ventana
 modal vinculada con su id, cuando salga satisfactoriamente.
 @throws Los errores que se mostrarán al usuario serán en formato de alertas las cuales serán identificadas cada vez con
 su respectivo codigo de error desde el controlador y tambien están descritos estos errores en los condicionales
 cada uno de estos ejemplo: false1 corresponde a un mensaje de error diferente, por cada condición.
 @uses la referencia del elemento asociado es el botón que registra al usuario en la interfaz del login.
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 * */
function registrar_usuarios() {
  let usuario_documento = document.getElementById("usuario_documento").value;
  let usuario_nombre = document.getElementById("usuario_nombre").value;
  let usuario_apellido = document.getElementById("usuario_apellido").value;
  let usuario_telefono = document.getElementById("usuario_telefono").value;
  let usuario_direccion = document.getElementById("usuario_direccion").value;
  let usuario_correo = document.getElementById("usuario_correo").value;
  let usuario_usuario = document.getElementById("usuario_usuario").value;
  let usuario_clave = document.getElementById("usuario_clave").value;
  let usuario_clave2 = document.getElementById("usuario_clave2").value;
  if (
    usuario_documento === "" ||
    usuario_nombre === "" ||
    usuario_apellido === "" ||
    usuario_telefono === "" ||
    usuario_direccion === "" ||
    usuario_correo === "" ||
    usuario_usuario === "" ||
    usuario_clave === "" ||
    usuario_clave2 === ""
  ) {
    alert("Alguno de los campos se encuentra vació");
  } else {
    if (usuario_clave === usuario_clave2) {
      let xhr = new XMLHttpRequest();
      let objeto = {
        usuario_documento: parseInt(usuario_documento),
        usuario_nombre: usuario_nombre,
        usuario_apellido: usuario_apellido,
        usuario_telefono: parseInt(usuario_telefono),
        usuario_direccion: usuario_direccion,
        usuario_correo: usuario_correo,
        usuario_usuario: usuario_usuario,
        usuario_clave: usuario_clave,
        usuario_clave2: usuario_clave2,
      };
      xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          console.log(this.responseText);
          if (this.responseText === "false1") {
            alert(
              "Alguno de los campos falto para ser procesado por favor recargue la pagina e ingrese nuevamente"
            );
          } else if (this.responseText === "false2") {
            alert(
              "Algún dato fue vulnerado y no coincide con el tipo especificado en el formulario recargue la pagina e ingrese nuevamente"
            );
          } else if (this.responseText === "false3") {
            alert("Por favor ingrese un numero en el campo de teléfono");
          } else if (this.responseText === "false4") {
            alert(
              "Por favor ingrese un correo electrónico valido en el campo de correo"
            );
          } else if (this.responseText === "false5") {
            alert(
              "El usuario anterior ya se encuentra registrado en la base de datos"
            );
          } else if (this.responseText === "false6") {
            alert(
              "Alguna de las contraseñas ingresadas no coincide con la otra"
            );
          } else if (this.responseText === "false7") {
            alert(
              "Por favor ingrese un numero valido en el campo del documento"
            );
          } else if (this.responseText === "false8") {
            alert(
              "La cédula ingresada ya se encuentra registrada en el sistema"
            );
          } else if (this.responseText === "false9") {
            alert(
              "El ingreso de los datos en el sistema fallo, por favor recargue la pagina y inténtelo nuevamente"
            );
          } else if (this.responseText === "true") {
            for (
              let i = 0;
              i < document.getElementsByTagName("input").length;
              i++
            ) {
              document.getElementsByTagName("input")[i].value = "";
            }
            alert(
              "Se realizo correctamente el ingreso de la información al sistema"
            );
            const elemento = document.getElementById("registrar");
            const instancia = M.Modal.init(elemento, { dismissible: false });
            instancia.close();
          }
        }
      };
      let parametros = JSON.stringify(objeto);
      xhr.open("POST", RUTA_URL + "registrar_usuario", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("datos=" + parametros);
    } else {
      alert("No es igual la contraseña");
    }
  }
}

/**
 @param void
 @return void un mensaje de alerta y crea la categoria y retorna si se creo correctamente
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 @example El usuario ingresa los datos en el formulario para crear la categoria en la bd, este
 envio de dicha información se realiza en formato JSON, cuando se realiza la inserción de los
 datos se limpian los cuadros de texto y se muestra una alerta descriptiva para el administrador
 para que se de cuenta de que sucedio en el sistema.
 @throws  Los errores mostrados seran cuando la respuesta desde el controlador, no coincida con true
 y en este caso estarán siendo ubicados como false1, false2 etc, desde el controlador
 @todo falta validar en este lugar los campos cuando se regresan en formato del false
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 @uses La referencia del elemento asociado es el botón que crea la categoria
 * */
function crear_categoria() {
  let categoria_nombre = document.getElementById("categoria_nombre").value;
  let categoria_descripcion = document.getElementById("categoria_descripcion")
    .value;

  if (categoria_nombre === "" || categoria_descripcion === "") {
    alert("Alguno de los campos se encuentra vació");
  } else {
    let xhr = new XMLHttpRequest();
    let objeto = {
      categoria_nombre: categoria_nombre,
      categoria_descripcion: categoria_descripcion,
    };
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText);
        if (this.responseText === "true") {
          for (
            let i = 0;
            i < document.getElementsByTagName("input").length;
            i++
          ) {
            document.getElementsByTagName("input")[i].value = "";
          }
          alert("Se realizo correctamente la creación de la categoría");
        } else {
          alert("No se pudo realizar la creación de la categoria");
        }
      }
    };
    let parametros = JSON.stringify(objeto);
    xhr.open("POST", RUTA_URL + "crear_categoria", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("datos=" + parametros);
  }
}

/**
 @param void
 @return void busca la categoria seleccionada y la muestra en una tabla para ser actualizada posteriormente
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 @example El usuario busca el nombre de la categoria, para posteriormente mostrarle los resultados de forma
 dinamica por medio de un buscador asincrono, el cual por cada tecla presionada realizara una
 petición en el controlador buscando las coincidencias de caracteres que exista con la palabra
 escrita, estos datos se enviarán en formato JSON y se generara dinamicamente la tabla en una ventana
 modal con estas coincidencias y a su vez cuando se presiona el boton actualizar dentro de las coincidencias,
 se envia dicha información a otra funcíon que inyecta los datos en el formulario para ser mas descriptivos.
 @uses La referencia del elemento asociado es el texto que detecta cada tecla presionada,
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 * */
function actualizar_categoria() {
  let categoria_nombre_busqueda = document.getElementById(
    "categoria_nombre_busqueda"
  ).value;
  let xhr = new XMLHttpRequest();
  let objeto = {
    categoria_nombre_busqueda: categoria_nombre_busqueda,
  };
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      console.log(this.responseText);
      let datos = JSON.parse(this.responseText);
      if (Object.entries(datos).length) {
        let tabla = document.querySelector("#respuesta_categoria_actualizar");
        tabla.innerHTML = "";
        for (let dato of datos) {
          tabla.innerHTML += ` 
                         <tr>
                            <td>${dato.nombre}</td>
                            <td>${dato.descripcion}</td>
                            <td><button type="button" class="btn btn-primary" onclick="capturar_categoria(${dato.id_categoria}, '${dato.nombre}', '${dato.descripcion}')">Actualizar</button></td>
                         </tr>`;
        }
      }
    }
  };
  let parametros = JSON.stringify(objeto);
  xhr.open("POST", RUTA_URL + "buscar_categoria", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("datos=" + parametros);
}

/**
 @param JSON
 @return void deshabilita y pasa los valores recibidos en los formularios para proceder posteriormente a actualizar
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función es la encargada de pasar los valores recibidos por la tabla dinamica de actualizar categoría al
 formulario para posteriormente describirle mas facil que es lo que va a actualizar
 * */
function capturar_categoria(id_categoria, nombre, descripcion) {
  document.getElementById("llave_secreta").value = id_categoria;
  document.getElementById("categoria_nombre_respuesta").value = nombre;
  document.getElementById(
    "categoria_descripcion_respuesta"
  ).value = descripcion;
  document.getElementById("oculto_1").classList.remove("d-none");
  document.getElementById("oculto_2").classList.remove("d-none");
  alert(
    "Por favor cierre la ventana de busqueda y ingrese el cambio a actualizar en los campos desbloquedados"
  );
}

/**
 @param void
 @return void envia los datos nuevos para actualizar en formato de JSON y muestra un alerta si falla o si realiza la inserción
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example El administrador ingresa los nuevos datos en el formulario, posteriormente envia una petición asincrona hacia el
 controlador, estos datos quedan en formato de JSON y se validan tanto en el controlador, como desde este archivo
 cuando la petición se realiza correctamente se recibe true en cadena de texto y entra al condicional que verifica
 cada respuesta para mostrarla posteriormente en una alerta, debemos tener en cuenta que mandamos el id oculto
 desde el HTML para que cuando llegue al controlador se logre indentificar que categoría se desea actualizar
 @uses La referencia del elemento asociado es el botón que permite realizar el envío de los datos.
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 @throws Los errores mostrados al administrador se harán en forma de alertas las cuales, trabajarán de la forma mas
 descriptiva, recordar que cada error como false1, false2, false3, tiene vinculado un error diferente que
 se lo identifica desde el controlador del backend y desde las peticiones de este archivo.
 * */
function datos_actualizar_categoria() {
  let categoria_nombre_envio = document.getElementById("categoria_nombre_envio")
    .value;
  let llave_secreta = document.getElementById("llave_secreta").value;
  let categoria_descripcion_envio = document.getElementById(
    "categoria_descripcion_envio"
  ).value;
  if (
    categoria_nombre_envio === "" ||
    llave_secreta === "" ||
    categoria_descripcion_envio === ""
  ) {
    alert("No puedes continuar con esta acción sin haber buscado la categoria");
  } else {
    let xhr = new XMLHttpRequest();
    let objeto = {
      categoria_nombre: categoria_nombre_envio,
      categoria_id: parseInt(llave_secreta),
      categoria_descripcion: categoria_descripcion_envio,
    };
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText);
        if (this.responseText === "true") {
          alert("Se realizo correctamente la actualización de la categoria");
          let tabla = document.querySelector("#respuesta_categoria_actualizar");
          tabla.innerHTML = "";
          for (
            let i = 0;
            i < document.getElementsByTagName("input").length;
            i++
          ) {
            document.getElementsByTagName("input")[i].value = "";
          }
        } else if (this.responseText === "false") {
          alert("No se logro realizar la actualización de la categoria");
        } else if (this.responseText === "false1") {
          alert("Alguno de los datos no coincide con el tipo especificado");
        } else if (this.responseText === "false2") {
          alert(
            "Los valores ingresados, posiblemente han sido alterados por favor recargue la pagina"
          );
        } else {
          alert("Ocurrio algun otro error");
        }
      }
    };
    let parametros = JSON.stringify(objeto);
    xhr.open("POST", RUTA_URL + "actualizar_categoria", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("datos=" + parametros);
  }
}

/**
 @param void
 @return void envia los datos nuevos para actualizar en formato de JSON y muestra un alerta si falla o si realiza la inserción
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función permite validar por medio de una alerta si se desea eliminar un elemento mandando su id, o en caso
 contrario bloqueando la utilización si comete algún error el usuario
 @uses La referencia de este elemento pueden ser hipervinculos o botones mayormente con acciones como la de eliminar
 * */
function eliminar(e) {
  if (!confirm("¿Esta seguro de que desea eliminar la categoria?")) {
    e.preventDefault();
  }
}

/**
 @param void
 @return void envia los datos nuevos para crear un municipio en formato de JSON y muestra un alerta si falla o si realiza la inserción
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example El administrador ingresa los nuevos datos del municipio para poder crearlo en la base de datos, se toman todos los
 datos de los formularios al realizar la acción de envio desde el botón, posteriormente se verifica que ninguno se
 encuentre vacío, y se toma la llave secreta que identifica al departamento del municipio para poder ingresarlo en su
 correspondiente tabla, se realiza la petición asincrona en formato JSON, y se verifica desde el controlador para esperar
 la respuesta si coinciden los datos con el tipo especificado, si sale bien despliega una alerta para ser descriptivos
 y sino envia una alerta con el error que ocurrio.
 @uses la referencia del elemento asociado es el boton que realiza la creación del nuevo municipio
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 @throws Cuando el sistema falla devuelve un texto, false1, false2 etc, cada uno de estos errores se mostrara con una alerta
 y por medio de esto se le describe que error esta ocurriendo en el sistema o en los datos ingresados
 * */
function crear_municipio() {
  let municipio_nombre = document.getElementById("municipio_nombre").value;
  let llave_secreta = document.getElementById("llave_secreta").value;
  let municipio_departamento = document.getElementById("municipio_departamento")
    .value;

  if (municipio_nombre === "" || municipio_departamento === "") {
    alert("Alguno de los campos se encuentra vació");
  } else {
    let xhr = new XMLHttpRequest();
    let objeto = {
      municipio_nombre: municipio_nombre,
      llave_secreta: llave_secreta,
      municipio_departamento: municipio_departamento,
    };
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText);
        if (this.responseText === "true") {
          alert("Se realizo correctamente la creación de los municipios");
          for (
            let i = 0;
            i < document.getElementsByTagName("input").length;
            i++
          ) {
            document.getElementsByTagName("input")[i].value = "";
          }
        } else if (this.responseText === "false") {
          alert("No se realizo correctamente la inserción de los datos");
        } else {
          alert("Fallo algo en el sistema");
        }
      }
    };
    let parametros = JSON.stringify(objeto);
    xhr.open("POST", RUTA_URL + "crear_municipio", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("datos=" + parametros);
  }
}

/**
 @param void
 @return void envia los datos nuevos para actualizar en formato de JSON y muestra un alerta si falla o si realiza la inserción
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example El administrador ingresa en el cuadro de texto el texto del municipio que desea actualizar, y por medio de esto, cada palabra
 que concuerde con el nombre del municipio se mostrara en la tabla dinámica de resultados, las cuales se utilizara de que el usuario
 de click en el boton actualizar en la tabla para pasar los datos al formulario abajo de la ventana modal y posteriormente se
 desbloquerán los cuadros de texto correspondientes para que sea mas descriptivo para el usuario realizar la actualización de
 estos mismos.
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 @uses La referencia del elemento asociado es el cuadro de texto, que captura cuando se digita en el los caracteres
 * */
function actualizar_municipio() {
  let municipio_nombre_busqueda = document.getElementById(
    "municipio_nombre_busqueda"
  ).value;
  let xhr = new XMLHttpRequest();
  let objeto = {
    municipio_nombre_busqueda: municipio_nombre_busqueda,
  };
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      console.log(this.responseText);
      let datos = JSON.parse(this.responseText);
      if (Object.entries(datos).length) {
        let tabla = document.querySelector("#respuesta_municipio_actualizar");
        tabla.innerHTML = "";
        for (let dato of datos) {
          tabla.innerHTML += ` 
                         <tr>
                            <td>${dato.nombre}</td>
                            <td>${dato.departamento}</td>
                            <td><button type="button" class="btn btn-primary" onclick="capturar_municipio(${dato.id_municipio}, '${dato.nombre}', '${dato.departamento}')">Actualizar</button></td>
                         </tr>`;
        }
      }
    }
  };
  let parametros = JSON.stringify(objeto);
  xhr.open("POST", RUTA_URL + "buscar_municipio", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("datos=" + parametros);
}

/**
 @param void
 @return void inyecta los datos previamente buscados dentro de la tabla dinamica al formulario para realizar actualización
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función es la encargada de capturar los datos accionados por el botón actualizar que se encuentra en la tabla dinámica
 que realiza las busquedas de los municipios, esta misma tiene la función de desbloquear y mostrar los inputs necesarios para realizar la
 actualizacíón y de esta misma forma inyectar el id dentro de un input de tipo hidden, para saber cual es el elemento que
 necesitamos para actualizar.
 * */
function capturar_municipio(id_municipio, nombre, departamento) {
  document.getElementById("llave_secreta").value = id_municipio;
  document.getElementById("municipio_nombre_respuesta").value = nombre;
  document.getElementById(
    "municipio_departamento_respuesta"
  ).value = departamento;
  document.getElementById("oculto_1").classList.remove("d-none");
  document.getElementById("oculto_2").classList.remove("d-none");
  alert(
    "Por favor cierre la ventana de busqueda y ingrese el cambio a actualizar en los campos desbloquedados"
  );
}

/**
 @param void
 @return void inyecta los datos previamente buscados dentro de la tabla dinamica al formulario para realizar actualización
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función es la encargada de enviar los nuevos datos para actualizar el municipio, se dirigen hacia el controlador
 y de esta manera poder validarlo desde el controlador del backend, como desde el controlador del frontend, que en este
 caso sería este archivo en que nos encontramos, cada error sera procesado por el controlador del backend y devolvera, el
 mismo esquema de trabajo de los erroes false1, false2, de esta misma forma se muestra en una alerta los errores
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 @uses La referencia del elemento asociado es el botón que realiza la acción de enviar los datos hacia el controlador, para posteriormente
 actualizar los datos.
 @throws Los errores que se vinculan son los que devuelve el controlador en formato de cadena, sea false1, false2, cada uno tiene
 su respectivo estado de error.
 * */
function datos_actualizar_municipio() {
  let municipio_nombre_enviado = document.getElementById(
    "municipio_nombre_enviado"
  ).value;
  let llave_secreta = document.getElementById("llave_secreta").value;
  let municipio_departamento_enviado = document.getElementById(
    "municipio_departamento_enviado"
  ).value;

  if (
    municipio_departamento_enviado === "" ||
    llave_secreta === "" ||
    municipio_departamento_enviado === ""
  ) {
    alert("No puedes continuar con esta acción sin haber buscado el municipio");
  } else {
    let xhr = new XMLHttpRequest();
    let objeto = {
      municipio_nombre: municipio_nombre_enviado,
      id_municipio: parseInt(llave_secreta),
      departamento: municipio_departamento_enviado,
    };
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText);
        if (this.responseText === "true") {
          alert("Se actualizo correctamente");
          let tabla = document.querySelector("#respuesta_municipio_actualizar");
          tabla.innerHTML = "";
          for (
            let i = 0;
            i < document.getElementsByTagName("input").length;
            i++
          ) {
            document.getElementsByTagName("input")[i].value = "";
          }
        } else if (this.responseText === "false") {
          alert("No se logro actualizar");
        } else {
          alert("Ocurrio algún otro error");
        }
      }
    };
    let parametros = JSON.stringify(objeto);
    xhr.open("POST", RUTA_URL + "actualizar_municipio", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("datos=" + parametros);
  }
}

/**
 @param void
 @return void alert con la respuesta
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder crear el emprendedor, se capturan los datos desde el formulario y por medio de
 esto se crea un objeto javascript para poder transformarlo y enviarlo en formato JSON por medio de una
 petición asincrona, se valida si no esta vacio ninguno de los campos, si se realiza la inserción correctamente
 devuelve un texto llamado true desde el controlador del backend, y si verifica en las condicionales else if
 para mostrarlo en una alert
 @deprecated El uso de XMLHttpRequest posee un amplio soporte actualmente, pero su uso puede dejar de tener soporte
 en un futuro siendo reemplazado por el nuevo estandar de peticiones fetch, si esto sucede consulte
 la documentación oficial del lenguaje e actualice el metodo de envío de datos.
 @uses La referencia del elemento asociado es la del botón que envia la petición desde html.
 @throws Los mensajes de error se mostraran en una alerta para poder describirle al usuario que es lo que esta fallando
 en el sistema, y cada error se representa como una cadena de texto en el controlador del backend, haciendo alusión
 a que cada uno de ellos corresponde a un error unico, ejemplo false1 para nosotros puede significar que llegarón
 datos vacios al controlador del backend
 * */
function crear_emprendedor() {
  let emprendedor_documento = document.getElementById("emprendedor_documento")
    .value;
  let emprendedor_usuario = document.getElementById("emprendedor_usuario")
    .value;
  let emprendedor_clave = document.getElementById("emprendedor_clave").value;
  let emprendedor_clave2 = document.getElementById("emprendedor_clave2").value;
  let nombre_emprendedor = document.getElementById("emprendedor_nombre").value;
  let emprendedor_apellido = document.getElementById("emprendedor_apellido")
    .value;
  let emprendedor_fecha_nacimiento = document.getElementById(
    "emprendedor_fecha_nacimiento"
  ).value;
  let emprendedor_direccion = document.getElementById("emprendedor_direccion")
    .value;
  let emprendedor_correo = document.getElementById("emprendedor_correo").value;
  let emprendedor_telefono = document.getElementById("emprendedor_telefono")
    .value;
  let emprendedor_logo_up = document.getElementById("emprendedor_logo_up")
    .value;
  let emprendedor_descripcion_up = document.getElementById(
    "emprendedor_descripcion_up"
  ).value;
  let emprendedor_unidad_productiva = document.getElementById(
    "emprendedor_unidad_productiva"
  ).value;
  let emprendedor_municipio = document.getElementById("emprendedor_municipio")
    .value;
  let emprendedor_foto_personal_up = document.getElementById(
    "emprendedor_foto_personal_up"
  ).value;

  if (
    emprendedor_documento === "" ||
    emprendedor_usuario === "" ||
    emprendedor_clave === "" ||
    emprendedor_clave2 === "" ||
    nombre_emprendedor === "" ||
    emprendedor_apellido === "" ||
    emprendedor_fecha_nacimiento === "" ||
    emprendedor_direccion === "" ||
    emprendedor_telefono === "" ||
    emprendedor_logo_up === "" ||
    emprendedor_descripcion_up === "" ||
    emprendedor_unidad_productiva === "" ||
    emprendedor_municipio === "" ||
    emprendedor_foto_personal_up === ""
  ) {
    alert("Alguno de los campos importantes se encuentra vacio");
  } else {
    if (emprendedor_clave !== emprendedor_clave2) {
      alert("La clave ingresada no es igual a la de confirmación");
    } else {
      let archivo = document.getElementById("emprendedor_logo_up").files[0];
      if (archivo && archivo.size < 10485760) {
        let formulario_emprendedor = document.querySelector(
          "#formulario_emprendedor"
        );
        let formData = new FormData(formulario_emprendedor);
        fetch(RUTA_URL + "crear_emprendedor", {
          method: "POST",
          body: formData,
        })
          .then(function (respuesta) {
            if (respuesta.ok) {
              return respuesta.text();
            } else {
              throw "Error en el envió";
            }
          })
          .then(function (json) {
            console.log(json);
            if (json == "true") {
              alert("El emprendedor fue creado correctamente");
              for (
                let i = 0;
                i < document.getElementsByTagName("input").length;
                i++
              ) {
                document.getElementsByTagName("input")[i].value = "";
              }
              let emprendedor_descripcion_up = (document.getElementById(
                "emprendedor_descripcion_up"
              ).value = "");
            } else if (json == "false1") {
              alert(
                "Alguno de los campos se encuentra vacio por favor reviselos"
              );
            } else if (json == "false2") {
              alert(
                "Los campos que estan llegando no son del tipo solicitado por el sistema"
              );
            } else if (json == "false3") {
              alert(
                "El campo del teléfono no es del tipo especificado por el sistema"
              );
            } else if (json == "false4") {
              alert(
                "El campo del correo electronico no es del tipo especificado por el sistema"
              );
            } else if (json == "false5") {
              alert(
                "Ya se tiene asignado este mismo nombre de usuario para otra persona"
              );
            } else if (json == "false6") {
              alert("La cedula no es un numero valido por el sistema");
            } else if (json == "false7") {
              alert(
                "El documento del emprendedor ya se encuentra registrado en el sistema"
              );
            } else if (json == "false8") {
              alert("No se ha adjunto la imagen de la unidad productiva");
            } else if (json == "false9") {
              alert(
                "Hubo un fallo en la inserción de los datos del emprendedor"
              );
            } else if (json == "falseimage") {
              alert(
                "El archivo adjunto no corresponde a los formatos de imagen especificados"
              );
            } else if (json == "falsetamaño") {
              alert(
                "La imagen adjuntada tiene un tamaño muy grande para ser procesado por el sistema"
              );
            } else if (json == "falselargo") {
              alert(
                "La cedula ingresada supera el maximo de caracteres designado"
              );
            } else if (json == "falseint") {
              alert("La cedula ingresada no es un numero");
            } else {
              alert("Hubo un fallo en el sistema por favor recargue la pagina");
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      } else {
        alert("No se puede enviar un archivo tan pesado");
      }
    }
  }
}

/**
 @param void
 @return void alert con la respuesta si creo el producto o fallo la creación del mismo
 @version 1.0
 @author Jean Carlo Castaño Millan
 @uses La referencia del elemento asociado es el boton que permite crear el producto
 @example Esta función sirve para poder crear el producto, se capturan los datos en los formularios y por medio
 de esto mismo se convierte estos datos en un objeto javascript, posteriormente se convierten en un JSON
 para ser enviado por medio de una petición asincrona, antes del envio se valida que no esten vacios ningun
 campo y tambien se convierten a un formato integer los valores numericos para poder posteriormente validarlos
 en el controlador del backend, si la respuesta es correcta se manda un mensaje de que salio bien y se limpian
 todos los cuadros de texto para que pueda volver a crear un nuevo producto.
 @throws Los errores mostrados seran en formato de alerta en este caso como ya sabemos que los mensajes corresponden
 a cadenas de texto que especificamos en el controlador del backend para ser mas descriptivos cada uno con
 false1, false2 cada uno de estas cadenas tiene su propio significado en los errores del sistema
 * */
function crear_producto() {
  let documento_emprendedor = document.getElementById(
    "producto_documento_emprendedor"
  ).value;
  let nombre_producto = document.getElementById("producto_nombre").value;
  let nombre_contacto_up = document.getElementById(
    "producto_nombre_contacto_up"
  ).value;
  let direccion = document.getElementById("producto_direccion_up").value;
  let telefono_1 = document.getElementById("producto_telefono_1").value;
  let telefono_2 = document.getElementById("producto_telefono_2").value;
  let precio_producto = document.getElementById("producto_precio").value;
  let descripcion_producto = document.getElementById("producto_descripcion")
    .value;
  let fotografia_producto = document.getElementById(
    "producto_fotografia_principal"
  ).value;
  let categoria_producto = document.getElementById("producto_categoria").value;

  if (
    documento_emprendedor === "" ||
    nombre_producto === "" ||
    nombre_contacto_up === "" ||
    direccion === "" ||
    telefono_1 === "" ||
    telefono_2 === "" ||
    precio_producto === "" ||
    descripcion_producto === "" ||
    fotografia_producto === "" ||
    categoria_producto === ""
  ) {
    alert("Alguno de los campos importantes se encuentra vacío");
  } else {
    let archivo = document.getElementById("producto_fotografia_principal")
      .files[0];
    if (archivo && archivo.size < 10485760) {
      let formulario = document.querySelector("#producto_ficha_comercial");
      let formData = new FormData(formulario);
      fetch(RUTA_URL + "crear_producto", { method: "POST", body: formData })
        .then(function (respuesta) {
          if (respuesta.ok) {
            return respuesta.text();
          } else {
            throw "Error en el envió";
          }
        })
        .then(function (json) {
          console.log(json);
          if (json == "true") {
            alert("Se creo correctamente el producto");
          } else if (json == "false1") {
            alert("Aguno de los campos obligatorios se encuentra vacío");
          } else if (json == "false2") {
            alert(
              "Los campos ingresados en el formulario algunos no son textos validos"
            );
          } else if (json == "false3") {
            alert(
              "La cedula ingresada sobrepasa el numero de caracteres permitidos"
            );
          } else if (json == "false4") {
            alert("La cedula ingresada no coincide con el formato de numero");
          } else if (json == "false5") {
            alert("El documento del emprendedor se encuentra vacio");
          } else if (json == "false6") {
            alert(
              "La categoria no coincide con el formato necesario en el sistema"
            );
          } else if (json == "false7") {
            alert("El teléfono 1 no coincide con el formato de numero");
          } else if (json == "false8") {
            alert("El teléfono 2 no coincide con el formato de numero");
          } else if (json == "false9") {
            alert("Los archivos de las imagenes se encuentran vacíos");
          } else if (json == "false10") {
            alert(
              "La imagen principal no se encuentra con el formato especifico"
            );
          } else if (json == "false11") {
            alert("La imagen principal tiene demasiado peso para el sistema");
          } else if (json == "false12") {
            alert("Fallo la inserción en el sistema");
          } else if (json == "false13") {
            alert(
              "La imagen 4 principal no se encuentra con el formato especifico"
            );
          } else if (json == "false14") {
            alert("La imagen 4 principal tiene demasiado peso para el sistema");
          } else if (json == "false15") {
            alert(
              "La imagen 3 principal no se encuentra con el formato especifico"
            );
          } else if (json == "false16") {
            alert("La imagen 3 principal tiene demasiado peso para el sistema");
          } else if (json == "false17") {
            alert(
              "La imagen 2 principal no se encuentra con el formato especifico"
            );
          } else if (json == "false18") {
            alert("La imagen 2 principal tiene demasiado peso para el sistema");
          } else if (json == "false19") {
            alert(
              "La imagen 1 y 4 principal no se encuentra con el formato especifico"
            );
          } else if (json == "false20") {
            alert("La imagen 1 principal tiene demasiado peso para el sistema");
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    } else {
      alert("No se puede enviar un archivo tan pesado");
    }
  }
}

/**
 @param void
 @return void evento que acciona al nuevo menu simulando un clicks
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder simular un click en un menu especificado
 que permita ingresar a otra sección de la creación de un elemento. y
 mediante esto desbloqueamos antes el menu para poder darle click.
 @uses La referencia al elemento asociado es el boton que permite darle siguiente al elemento

 * */
function siguiente_formulario() {
  document.getElementById("profile-tab").classList.remove("disabled");
  document.getElementById("profile-tab").click();
}

/**
 @param void
 @return void evento que acciona al nuevo menu simulando un click
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder simular un click en un menu especificado
 que permita regresar al anterior elemento en un menu, es utilizado en los
 formularios largos permitiendo darle mas claridad al usuario de lo que se va
 a ingresar
 @uses La referencia al elemento asociado es el boton que permite darle atras al elemento
 * */
function atras_formulario() {
  document.getElementById("home-tab").click();
}

/**
 @param void
 @return void boton en el menu que envia la peticion esperando la respuesta de sus datos
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder mostrar dinamicamente todos los municipios cada vez que
 damos click en el menu para listar los municipios y poder eliminarlos a la vez, se manda
 un parametro secreto que en este caso es secret, que llega al controlador y se valida si
 si realmente tiene el valor que especificamos lo dejara pasar sino no podra mostrar los municipios
 para listarlos en la tabla, posterior a esto el backend si esta correcto nos retorna todos los datos
 en formato JSON para poder recorrerlos de manera dinamica en la tabla que tenemos creada en nuestro HTML.
 @uses La referencia al elemento asociado es el boton que permite mandar la peticion y esperar la respuesta de los datos.
 * */
function listar_municipio() {
  let objeto = {
    secret: 1,
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "listar_municipio", { method: "POST", body: formData })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tabla = document.querySelector("#respuesta_municipio_eliminar");
        tabla.innerHTML = "";
        for (let dato of datos) {
          tabla.innerHTML += ` 
                         <tr>
                            <td>${dato.nombre}</td>
                            <td>${dato.departamento}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_municipio(${dato.id_municipio}, event)">Eliminar</button></td>
                         </tr>`;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

/**
 @param void
 @return void boton en la tabla para generar la eliminación del municipio de manera dinámica
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder eliminar un elemento de manera lógica en nuestra base de datos del
 elemento que le damos click, cuando se presiona el botón le pregunta primero si realmente desea
 eliminar mandara la petición sino se cancelara el envío de esto en el DOOM, se captura el id
 del elemento a eliminar y por medio de este lo mandamos al controlador correspondiente en el backend
 para su eliminación y mediante este mismos metodo capturamos los nuevos datos de la tabla para
 que se muestre la actualizacion de manera asincrona , tener en cuenta que si se eliminan los datos la peticion
 llegara vacía entonces limpiaremos la tabla de cualquier posible dato que no halla sido actualizado
 @uses La referencia al elemento asociado es el boton que elimina el municipio.
 @throws El error presentado si falla la petición asincrona sería cuando no se realiza la petición con fetch
 @todo Hay que tener en cuenta que el metodo de eliminación por medio de los eventos, puede ser vulnerado por alguien que
 conosca mas a fondo la consola del navegador y la utilización de cambios en javascript, ya que al pasar los datos
 por debajo del sistema como parametros, se pueden visualizar en la estructura interna del HTML, mediante a esto buscar
 un nuevo esquema en el futuro para poder procesar y trabajar con estos datos, como recomendación futura observar la arquitectura
 del patrón de diseño redux para poder proteger nuestros datos de cualquier posible atacante.
 * */
function eliminar_municipio(id_municipio, e) {
  if (!confirm("¿Esta seguro de que desea eliminar el municipio?")) {
    e.preventDefault();
  } else {
    let objeto = {
      id_municipio: parseInt(id_municipio),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "eliminar_municipio", { method: "POST", body: formData })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        if (Object.entries(datos).length) {
          let tabla = document.querySelector("#respuesta_municipio");
          tabla.innerHTML = "";
          for (let dato of datos) {
            tabla.innerHTML += `
                             <tr>
                                <td>${dato.nombre}</td>
                                <td>${dato.departamento}</td>
                                <td><button type="button" class="btn btn-danger" onclick="eliminar_municipio(${dato.id_municipio}, event)">Eliminar</button></td>
                             </tr>
                        `;
          }
        } else {
          let tabla = document.querySelector("#respuesta_municipio_eliminar");
          tabla.innerHTML = "";
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

/**
 @param void
 @return void boton en el menu que envia la peticion esperando la respuesta de sus datos
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder mostrar dinamicamente todas las categorías cada vez que
 damos click en el menu para listar los categorías y poder eliminarlos a la vez, se manda
 un parametro secreto que en este caso es secret, que llega al controlador y se valida si
 si realmente tiene el valor que especificamos lo dejara pasar sino no podra mostrar las categorías
 para listarlos en la tabla, posterior a esto el backend si esta correcto nos retorna todos los datos
 en formato JSON para poder recorrerlos de manera dinamica en la tabla que tenemos creada en nuestro HTML.
 @todo Hay que tener en cuenta que el metodo de eliminación por medio de los eventos, puede ser vulnerado por alguien que
 conosca mas a fondo la consola del navegador y la utilización de cambios en javascript, ya que al pasar los datos
 por debajo del sistema como parametros, se pueden visualizar en la estructura interna del HTML, mediante a esto buscar
 un nuevo esquema en el futuro para poder procesar y trabajar con estos datos, como recomendación futura observar la arquitectura
 del patrón de diseño redux para poder proteger nuestros datos de cualquier posible atacante.
 * */
function listar_categoria() {
  let objeto = {
    secret: 1,
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "listar_categoria", { method: "POST", body: formData })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tabla = document.querySelector("#respuesta_categoria_eliminar");
        tabla.innerHTML = "";
        for (let dato of datos) {
          tabla.innerHTML += ` 
                         <tr>
                            <td>${dato.nombre}</td>
                            <td>${dato.descripcion}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_categoria(${dato.id_categoria}, event)">Eliminar</button></td>
                         </tr>`;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

/**
 @param void
 @return void boton en la tabla para generar la eliminación de la categoría de manera dinámica
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder eliminar un elemento de manera lógica en nuestra base de datos del
 elemento que le damos click, cuando se presiona el botón le pregunta primero si realmente desea
 eliminar mandara la petición sino se cancelara el envío de esto en el DOOM, se captura el id
 del elemento a eliminar y por medio de este lo mandamos al controlador correspondiente en el backend
 para su eliminación y mediante este mismos metodo capturamos los nuevos datos de la tabla para
 que se muestre la actualizacion de manera asincrona , tener en cuenta que si se eliminan los datos la peticion
 llegara vacía entonces limpiaremos la tabla de cualquier posible dato que no halla sido actualizado
 @uses La referencia al elemento asociado es el boton que elimina el municipio.
 @throws El error presentado si falla la petición asincrona sería cuando no se realiza la petición con fetch
 @todo Hay que tener en cuenta que el metodo de eliminación por medio de los eventos, puede ser vulnerado por alguien que
 conosca mas a fondo la consola del navegador y la utilización de cambios en javascript, ya que al pasar los datos
 por debajo del sistema como parametros, se pueden visualizar en la estructura interna del HTML, mediante a esto buscar
 un nuevo esquema en el futuro para poder procesar y trabajar con estos datos, como recomendación futura observar la arquitectura
 del patrón de diseño redux para poder proteger nuestros datos de cualquier posible atacante.
 * */
function eliminar_categoria(id_categoria, e) {
  if (!confirm("¿Esta seguro de que desea eliminar el municipio?")) {
    e.preventDefault();
  } else {
    let objeto = {
      id_categoria: parseInt(id_categoria),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "eliminar_categoria", { method: "POST", body: formData })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        let datos = JSON.parse(json);
        if (Object.entries(datos).length) {
          let tabla = document.querySelector("#respuesta_categoria_eliminar");
          tabla.innerHTML = "";
          for (let dato of datos) {
            tabla.innerHTML += `
                         <tr>
                            <td>${dato.nombre}</td>
                            <td>${dato.descripcion}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_categoria(${dato.id_categoria}, event)">Eliminar</button></td>
                         </tr>`;
          }
        } else {
          let tabla = document.querySelector("#respuesta_categoria_eliminar");
          tabla.innerHTML = "";
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

/**
 @param void
 @return void boton en la tabla para generar la eliminación de la categoría de manera dinámica
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder identificar la paginación que esta siendo seleccionada y por medio
 de un id que se crea dinamicamente al presionar el elemento se captura y se envia al backend que es el
 encargado de identificar cual es es el rango de los productos a mostrar según la paginación, este identificador
 se envia en formato JSON y me retorna la respuesta en formato tambien JSON con lo cual yo lo convierto en un
 objeto de javascript y comienzo a recorrerlos con el ciclo para ir generando las tarjetas dinamicamente
 @uses La referencia de la paginación necesaria para poder identificar los productos
 * */
function paginacion(e) {
  let objeto = {
    paginacion: parseInt(e.target.id),
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "identificar_paginacion", { method: "POST", body: formData })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tarjeta = document.querySelector("#respuesta_tarjeta");
        tarjeta.innerHTML = "";
        for (let dato of datos) {
          tarjeta.innerHTML += `
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="${
                                      RUTA_IMAGENES + dato.fotografia
                                    }" height="250px">
                                    <span class="card-title">${
                                      dato.producto
                                    }</span>
                                </div>
                                <div class="card-content">
                                    <h6 class="center">${dato.producto}</h6>
                                    <em>Precio del producto:</em>
                                    <h6 class="precio_producto">$${
                                      dato.precio
                                    }</h6>                  
                                </div>
                                <div class="card-action">
                                    <a href="${
                                      RUTA_URL +
                                      "descripcion_producto/" +
                                      dato.cod_producto
                                    }">Descripción detallada</a>
                                </div>  
                            </div>
                        </div>`;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

/**
 @param void
 @return void menu que genera dinamicamente la información correspondiente de las categorias en el inicio
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder identificar el menu seleccionado dentro de la vista de inicio
 lo cual mandara una petición al backend solicitando todas las categorias disponibles para ser
 mostradas dinamicamente en este caso se hace un condicional que identifica si el id del menu
 seleccionado es municipios, entonces se solicitara todos los municipios de la categoria municipios
 y si es seleccionado el menu de categoria se seleccionaran todas las categorias disponibles y se crearan
 dinamicamente por medio de javascript con su nombre e internamente con su ID de identificación.
 @uses La referencia del elemento asociado es el menú que se encarga de mostrar la categoria solicitada
 * */
function categorias_dinamicas(e) {
  if (e.target.id === "municipios") {
    let objeto = {
      secret: parseInt(1),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "identificar_categorias_dinamicas", {
      method: "POST",
      body: formData,
    })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        if (Object.entries(datos).length) {
          let menu = document.querySelector("#respuesta_municipios");
          menu.innerHTML = "";
          for (let dato of datos) {
            menu.innerHTML += `
                            <a href="#!" class="collection-item" onclick="categorias_peticion(event, '${dato.id_municipio}')" id="municipios">${dato.nombre}</a>
                        `;
          }
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  } else if (e.target.id === "categorias") {
    let objeto = {
      secret: parseInt(2),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "identificar_categorias_dinamicas", {
      method: "POST",
      body: formData,
    })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        if (Object.entries(datos).length) {
          let menu = document.querySelector("#respuesta_categorias");
          menu.innerHTML = "";
          for (let dato of datos) {
            menu.innerHTML += `
                            <a href="#!" class="collection-item" onclick="categorias_peticion(event, '${dato.id_categoria}')" id="categorias">${dato.nombre}</a>
                        `;
          }
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

/**
 @param void
 @return void función que crea las tarjetas dinamicamente de la categoria seleccionada.
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta funcion es la encargada de generar dinamicamente las categorias mandando primero que nada una
 clave secreta la cual se indentifica en el backend antes de proceder a generar la categoria solicitada,
 mediante esto podemos concluir de que por medio de la categoria seleccionada generamos las tarjetas
 correspondientes de la paginación y por medio de esto generaremos un identificador de la paginacion para
 con estos valores traer de 6 en 6 los registros solicitados por el usuario.
 * */

function categorias_peticion(e, id) {
  if (e.target.id === "categorias") {
    let objeto = {
      //categorias es equivalente a 2
      clave: "2",
      id: parseInt(id),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "cargar_peticion_menu", { method: "POST", body: formData })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        if (Object.entries(datos).length) {
          let tarjeta = document.querySelector("#respuesta_tarjeta");
          tarjeta.innerHTML = "";
          for (let dato of datos["datos"]) {
            tarjeta.innerHTML += `
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="${
                                      RUTA_IMAGENES + dato.fotografia
                                    }" height="250px">
                                    <span class="card-title">${
                                      dato.producto
                                    }</span>
                                </div>
                                <div class="card-content">
                                    <h6 class="center">${dato.producto}</h6>
                                    <em>Precio del producto:</em>
                                    <h6 class="precio_producto">$${
                                      dato.precio
                                    }</h6>    
                                </div>
                                <div class="card-action">
                                    <a href="${
                                      RUTA_URL +
                                      "descripcion_producto/" +
                                      dato.cod_producto
                                    }">Descripcion detallada</a>
                                </div>
                            </div>
                        </div>`;
          }
          let paginacion = document.querySelector("#paginacion");
          paginacion.innerHTML = "";
          let numero = 6;
          for (let dato of datos["divisor"]) {
            paginacion.innerHTML += `
                            <li class="active" >
                                <a href="#!" onclick="filtrar_municipios_menu(event, '${datos["id_municipio"]}')" id="${numero}">${dato}</a>
                            </li>`;
            numero = numero + 6;
          }
        } else if (json === "false") {
          let tarjeta = document.querySelector("#respuesta_tarjeta");
          tarjeta.innerHTML = "";
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  } else if (e.target.id === "municipios") {
    let objeto = {
      //municipios es equivalente a 1
      clave: "1",
      id: parseInt(id),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "cargar_peticion_menu", { method: "POST", body: formData })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        if (Object.entries(datos).length) {
          let tarjeta = document.querySelector("#respuesta_tarjeta");
          tarjeta.innerHTML = "";
          for (let dato of datos["datos"]) {
            tarjeta.innerHTML += `
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="${
                                      RUTA_IMAGENES + dato.fotografia
                                    }" height="250px">
                                    <span class="card-title">${
                                      dato.producto
                                    }</span>
                                </div>
                                <div class="card-content">
                                    <h6 class="center">${dato.producto}</h6>
                                    <em>Precio del producto:</em>
                                    <h6 class="precio_producto">$${
                                      dato.precio
                                    }</h6>    
                                </div>
                                <div class="card-action">
                                    <a href="${
                                      RUTA_URL +
                                      "descripcion_producto/" +
                                      dato.cod_producto
                                    }">Descripcion detallada</a>
                                </div>
                            </div>
                        </div>`;
          }
          let paginacion = document.querySelector("#paginacion");
          paginacion.innerHTML = "";
          let numero = 6;
          for (let dato of datos["divisor"]) {
            paginacion.innerHTML += `
                            <li class="active" >
                                <a href="#!" onclick="filtrar_municipios_menu(event, '${datos["id_municipio"]}')" id="${numero}">${dato}</a>
                            </li>`;
            numero = numero + 6;
          }
        } else if (json === "false") {
          let tarjeta = document.querySelector("#respuesta_tarjeta");
          tarjeta.innerHTML = "";
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

/**
 @param void
 @return void función que crea las tarjetas dinamicamente cuando son buscadas por municipio
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder hacer la petición, enviando el id del municipio  y
 el numero de la paginación solicitada para generar la paginación y crear tambien a su vez la
 la tarjeta dinamica
 * */
function filtrar_municipios_menu(e, id_municipio) {
  let objeto = {
    paginacion: parseInt(e.target.id),
    id_municipio: parseInt(id_municipio),
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "filtrar_municipios_menu", {
    method: "POST",
    body: formData,
  })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tarjeta = document.querySelector("#respuesta_tarjeta");
        tarjeta.innerHTML = "";
        for (let dato of datos) {
          tarjeta.innerHTML += `
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img src="${
                                  RUTA_IMAGENES + dato.fotografia
                                }" height="250px">
                                <span class="card-title">${dato.producto}</span>
                            </div>
                            <div class="card-content">
                               <h6 class="center">${dato.producto}</h6>
                               <em>Precio del producto:</em>
                               <h6 class="precio_producto">$${
                                 dato.precio
                               }</h6>    
                            </div>
                            <div class="card-action">
                                <a href="${
                                  RUTA_URL +
                                  "descripcion_producto/" +
                                  dato.cod_producto
                                }">Descripcion detallada</a>
                            </div>
                        </div>
                    </div>`;
        }
      } else if (json === "false") {
        let tarjeta = document.querySelector("#respuesta_tarjeta");
        tarjeta.innerHTML = "";
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

/**
 @param void
 @return void función que crea las tarjetas dinamicamente cuando son buscadas por municipio
 @version 1.0
 @author Jean Carlo Castaño Millan
 @example Esta función sirve para poder hacer la petición, enviando el id del municipio  y
 el numero de la paginación solicitada para generar la paginación y crear tambien a su vez la
 la tarjeta dinamica
 * */
function filtar_categorias_menu(e, id_categoria) {
  let objeto = {
    paginacion: parseInt(e.target.id),
    id_categoria: parseInt(id_categoria),
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "filtar_categorias_menu", { method: "POST", body: formData })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tarjeta = document.querySelector("#respuesta_tarjeta");
        tarjeta.innerHTML = "";
        for (let dato of datos) {
          tarjeta.innerHTML += `
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img src="${
                                  RUTA_IMAGENES + dato.fotografia
                                }" height="250px">
                                <span class="card-title">${dato.producto}</span>
                            </div>
                            <div class="card-content">
                                <h6 class="center">${dato.producto}</h6>
                               <em>Precio del producto:</em>
                               <h6 class="precio_producto">$${
                                 dato.precio
                               }</h6>    
                            </div>
                            <div class="card-action">
                                <a href="${
                                  RUTA_URL +
                                  "descripcion_producto/" +
                                  dato.cod_producto
                                }">This is a link</a>
                            </div>
                        </div>
                    </div>`;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

function listar_emprendedor() {
  let cedula_emprendedor_busqueda = document.getElementById(
    "emprendedor_busqueda"
  ).value;
  let objeto = {
    cedula_emprendedor_busqueda: parseInt(cedula_emprendedor_busqueda),
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "filtrar_emprendedor", { method: "POST", body: formData })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tarjeta = document.querySelector("#respuesta_emprendedor_eliminar");
        tarjeta.innerHTML = "";
        for (let dato of datos) {
          tarjeta.innerHTML += `
                        <tr>
                           <td>${dato.nombre}</td>
                           <td>${dato.apellidos}</td>
                           <td>${dato.direccion}</td>
                           <td>${dato.telefono}</td>
                           <td>${dato.fecha_nacimiento}</td>
                           <td><button type="button" class="btn btn-danger" onclick="eliminar_emprendedor(${dato.cedula}, event)">Eliminar</button></td>
                        </tr>`;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

function eliminar_emprendedor(cedula, e) {
  if (!confirm("¿Esta seguro de que desea eliminar la categoria?")) {
    e.preventDefault();
  } else {
    let objeto = {
      cedula_emprendedor: parseInt(cedula),
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "eliminar_emprendedor", { method: "POST", body: formData })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        if (json == "true") {
          alert("Se elimino correctamente la información del emprendedor");
          let tarjeta = document.querySelector(
            "#respuesta_emprendedor_eliminar"
          );
          tarjeta.innerHTML = "";
        } else if (json == "false") {
          alert(
            "No se logro realizar la eliminación de la información del emprendedor"
          );
        } else if (json == "false2") {
          alert(
            "El dato requerido en el sistema no coincide con el que llega por favor recargue la pagina"
          );
        } else if (json == "false3") {
          alert(
            "El sistema detecto que los datos estan llegando vacios por favor recargue la pagina"
          );
        } else {
          alert(
            "Ocurrio un error en la plataforma por favor contactese con el administrador"
          );
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

function captura_actualizar_emprendedor() {
  let documento_emprendedor_busqueda = document.getElementById(
    "documento_emprendedor_busqueda"
  ).value;
  let objeto = {
    documento_emprendedor_busqueda: parseInt(documento_emprendedor_busqueda),
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "retornar_emprendedor_busqueda", {
    method: "POST",
    body: formData,
  })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tabla = document.querySelector("#respuesta_emprendedor_actualizar");
        tabla.innerHTML = "";
        for (let dato of datos["emprendedor"]) {
          tabla.innerHTML += `
                        <tr>
                           <td>${dato.cedula}</td>
                           <td>${dato.nombre}</td>
                           <td>${dato.apellidos}</td>
                           <td>${dato.direccion}</td>
                           <td>${dato.telefono}</td>
                           <td>${dato.fecha_nacimiento}</td>
                           <td><button type="button" class="btn btn-primary" 
                           onclick="pasar_actualizar_emprendedor(${dato.cedula}, 
                                                                '${dato.nombre}', 
                                                                '${dato.apellidos}', 
                                                                '${dato.direccion}', 
                                                                '${dato.telefono}', 
                                                                '${dato.fecha_nacimiento}', 
                                                                '${dato.usuario}', 
                                                                '${dato.correo}', 
                                                                '${dato.descripcion_unidadp}',
                                                                '${dato.nombre_unidadp}',
                                                                '${dato.foto_personal}',
                                                                '${dato.logo}')">Actualizar</button></td>
                        </tr>`;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

function pasar_actualizar_emprendedor(
  documento,
  nombre,
  apellidos,
  direccion,
  telefono,
  fecha_nacimiento,
  usuario,
  correo,
  descripcion_up,
  nombre_up,
  foto_personal,
  logo
) {
  document.getElementById("emprendedor_documento_actualizar").value = documento;
  document.getElementById("emprendedor_nombre_actualizar").value = nombre;
  document.getElementById("emprendedor_apellido_actualizar").value = apellidos;
  document.getElementById("emprendedor_direccion_actualizar").value = direccion;
  document.getElementById("emprendedor_telefono_actualizar").value = telefono;
  document.getElementById(
    "emprendedor_fecha_nacimiento_actualizar"
  ).value = fecha_nacimiento;
  document.getElementById("emprendedor_usuario_actualizar").value = usuario;
  document.getElementById("emprendedor_correo_actualizar").value = correo;
  document.getElementById(
    "emprendedor_descripcion_up_actualizar"
  ).value = descripcion_up;
  document.getElementById(
    "emprendedor_unidad_productiva_actualizar"
  ).value = nombre_up;
  document.getElementById("imagen_logo_actual").value = logo;
  document.getElementById("imagen_personal_up_actual").value = foto_personal;
  let imagen_personal_up = document.getElementById("imagen_personal_up");
  imagen_personal_up.src = RUTA_IMG_PERSONAL_UP + foto_personal;
  let imagen_logo_up = document.getElementById("imagen_logo_up");
  imagen_logo_up.src = RUTA_IMG_LOGO_UP + logo;
  var inputs = document.getElementsByClassName("form-control");
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false;
  }
}

/**
 @param void
 @return envia datos para poder actualizar la información del emprendedor en formato JSON
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 * */
function envio_actualizar_emprendedor() {
  let documento_emprendedor = document.getElementById(
    "emprendedor_documento_actualizar"
  ).value;
  let nombres_emprendedor = document.getElementById(
    "emprendedor_nombre_actualizar"
  ).value;
  let apellidos_emprendedor = document.getElementById(
    "emprendedor_apellido_actualizar"
  ).value;
  let direccion_emprendedor = document.getElementById(
    "emprendedor_direccion_actualizar"
  ).value;
  let telefono_emprendedor = document.getElementById(
    "emprendedor_telefono_actualizar"
  ).value;
  let fecha_nacimiento_emprendedor = document.getElementById(
    "emprendedor_fecha_nacimiento_actualizar"
  ).value;
  let usuario_emprendedor = document.getElementById(
    "emprendedor_usuario_actualizar"
  ).value;
  let clave_actual_emprendedor = document.getElementById(
    "emprendedor_clave_actual"
  ).value;
  let clave_actualizada_emprendedor = document.getElementById(
    "emprendedor_clave_actualizar"
  ).value;
  let clave_confirmar_emprendedor = document.getElementById(
    "emprendedor_clave_confirmar"
  ).value;
  let municipio_emprendedor = document.getElementById(
    "emprendedor_municipio_actualizar"
  ).value;

  if (
    documento_emprendedor === "" ||
    nombres_emprendedor === "" ||
    apellidos_emprendedor === "" ||
    direccion_emprendedor === "" ||
    telefono_emprendedor === "" ||
    fecha_nacimiento_emprendedor === "" ||
    usuario_emprendedor === "" ||
    municipio_emprendedor === ""
  ) {
    alert("Alguno de los campos se encuentra vacio");
  } else {
    if (clave_actualizada_emprendedor !== clave_confirmar_emprendedor) {
      alert("Las claves no coinciden");
    } else {
      let emprendedor_actualizar = document.querySelector(
        "#formulario_emprendedor_actualizar"
      );
      let formData = new FormData(emprendedor_actualizar);
      fetch(RUTA_URL + "actualizar_emprendedor", {
        method: "POST",
        body: formData,
      })
        .then(function (respuesta) {
          if (respuesta.ok) {
            return respuesta.text();
          } else {
            throw "Error en el envió";
          }
        })
        .then(function (json) {
          if (json == "false1") {
            alert("Por favor revise que ningun campo se encuentre vacio");
          } else if (json == "false2") {
            alert(
              "Los datos que fueron enviados no coinciden con lo solicitado en el sistema"
            );
          } else if (json == "false3") {
            alert("El numero de telefono no coincide con un valor numerico");
          } else if (json == "false4") {
            alert("La cedula ingresada no coincide con un valor numerico");
          } else if (json == "false5") {
            alert(
              "La contraseña actual del usuario no coincide con la que se encuentra en la base de datos"
            );
          } else if (json == "false6") {
            alert(
              "No se logro actualizar correctamente la información en el sistema"
            );
          } else if (json == "true") {
            alert("Se realizo correctamente la actualización en el sistema");
            var inputs = document.getElementsByClassName(
              "emprendedor_actualizar"
            );
            for (var i = 0; i < inputs.length; i++) {
              inputs[i].disabled = true;
            }
            for (
              let i = 0;
              i < document.getElementsByTagName("input").length;
              i++
            ) {
              document.getElementsByTagName("input")[i].value = "";
            }
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  }
}

/**
 @param void
 @return JSON traspasa el valor del JSON recibido, para generar una tabla dinamica con los productos filtrados vinculados al emprendedor
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 * */
function buscar_producto() {
  let cedula = document.getElementById("producto_busqueda").value;
  let objeto = {
    cedula: parseInt(cedula),
  };
  let formData = new FormData();
  formData.append("datos", JSON.stringify(objeto));
  fetch(RUTA_URL + "retornar_producto_busqueda", {
    method: "POST",
    body: formData,
  })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
      let datos = JSON.parse(json);
      if (Object.entries(datos).length) {
        let tabla = document.querySelector("#respuesta_busqueda");
        tabla.innerHTML = "";
        for (let dato of datos) {
          tabla.innerHTML += `
                        <tr>
                           <td>${dato.producto}</td>   
                           <td><button type="button" class="btn btn-primary" onclick="pasar_actualizar_producto(${dato.cod_producto})">Actualizar</button></td>
                        </tr>`;
        }
        document.getElementById("btn_ficha_comercial").disabled = false;
        document.getElementById("btn_ficha_tecnica").disabled = false;
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

/**
 @param JSON
 @return void traspasa el valor del JSON recibido a los campos para poder identificar el producto seleccionado
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 * */
function pasar_actualizar_producto(cod_producto) {
  document.getElementById(
    "codigo_producto_ficha_comercial"
  ).value = cod_producto;
  document.getElementById("codigo_producto_ficha_tecnica").value = cod_producto;
}

/**
 @param evento
 @return JSON con los datos correspondientes del formulario seleccionado
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 * */
function enviar_codigo_producto(e) {
  let codigo_producto = document.getElementById(
    "codigo_producto_ficha_comercial"
  ).value;
  if (e.target.id == "btn_ficha_comercial") {
    let objeto = {
      codigo_producto: parseInt(codigo_producto),
      ficha: 1,
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "retornar_producto_seleccionado", {
      method: "POST",
      body: formData,
    })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        for (let dato of datos["comercial"]) {
          document.getElementById(
            "producto_documento_emprendedor_actualizar"
          ).value = dato.emprendedor_cedula;
          document.getElementById("producto_nombre_actualizar").value =
            dato.producto;
          document.getElementById(
            "producto_nombre_contacto_up_actualizar"
          ).value = dato.nombre_contacto;
          document.getElementById("producto_direccion_up_actualizar").value =
            dato.direccion;
          document.getElementById("producto_telefono_1_actualizar").value =
            dato.telefono1;
          document.getElementById("producto_telefono_2_actualizar").value =
            dato.telefono2;
          document.getElementById("producto_caracteristicas_actualizar").value =
            dato.caracteristicas_producto;
          document.getElementById("producto_peso_actualizar").value = dato.peso;
          document.getElementById(
            "producto_peso_unidad_medida_actualizar"
          ).value = dato.unidad_medida;
          document.getElementById("producto_precio_actualizar").value =
            dato.precio;
          document.getElementById("producto_ingredientes_actualizar").value =
            dato.Ingredientes;
          document.getElementById("producto_descripcion_actualizar").value =
            dato.descripcion;
          document.getElementById("producto_categoria_actualizar").value =
            dato.categorias_id_categorias;

          let imagen = document.getElementById("imagen");
          document.getElementById(
            "producto_fotografia_principal_actual"
          ).value = dato.fotografia;
          imagen.src = RUTA_IMAGENES + dato.fotografia;

          let imagen_producto_1 = document.getElementById("imagen_producto_1");
          document.getElementById("imagen_producto_1_actual").value =
            dato.foto1;
          imagen_producto_1.src = RUTA_PRODUCTOS_VINCULADOS + dato.foto1;

          let imagen_producto_2 = document.getElementById("imagen_producto_2");
          document.getElementById("imagen_producto_2_actual").value =
            dato.foto2;
          imagen_producto_2.src = RUTA_PRODUCTOS_VINCULADOS + dato.foto2;

          let imagen_producto_3 = document.getElementById("imagen_producto_3");
          document.getElementById("imagen_producto_3_actual").value =
            dato.foto3;
          imagen_producto_3.src = RUTA_PRODUCTOS_VINCULADOS + dato.foto3;

          let imagen_producto_4 = document.getElementById("imagen_producto_4");
          document.getElementById("imagen_producto_4_actual").value =
            dato.foto4;
          imagen_producto_4.src = RUTA_PRODUCTOS_VINCULADOS + dato.foto4;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  } else if (e.target.id == "btn_ficha_tecnica") {
    let objeto = {
      codigo_producto: parseInt(codigo_producto),
      ficha: 2,
    };
    let formData = new FormData();
    formData.append("datos", JSON.stringify(objeto));
    fetch(RUTA_URL + "retornar_producto_seleccionado", {
      method: "POST",
      body: formData,
    })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        let datos = JSON.parse(json);
        for (let dato of datos["comercial"]) {
          document.getElementById(
            "producto_tipo_presentacion_actualizar"
          ).value = dato.tipo_presentacion;
          document.getElementById(
            "producto_contenido_presentacion_actualizar"
          ).value = dato.contenido_presentacion;
          document.getElementById(
            "producto_tipos_presentacion_actualizar"
          ).value = dato.tipos_presentaciones;
          document.getElementById("producto_costo_actualizar").value =
            dato.costo;
          document.getElementById("producto_nombre_tecnico_actualizar").value =
            dato.nombre_producto;
          document.getElementById(
            "producto_volumen_produccion_actualizar"
          ).value = dato.volumen_produccion;
          document.getElementById("producto_variedad_actualizar").value =
            dato.variedad_producto;
          document.getElementById(
            "producto_nombre_cientifico_actualizar"
          ).value = dato.nombre_cientifico;
          document.getElementById(
            "producto_temperatura_requerida_envio_actualizar"
          ).value = dato.temperatura_requerida_envio;
          document.getElementById("producto_ntc_relacionada_actualizar").value =
            dato.ntc_relacionada;
          document.getElementById(
            "producto_normas_vinculadas_actualizar"
          ).value = dato.normas_vinculadas;
          document.getElementById("producto_lotes_promocion_actualizar").value =
            dato.lotes_promocion;
          document.getElementById(
            "producto_caracteristicas_propias_actualizar"
          ).value = dato.caracteristicas_propias;
          document.getElementById("producto_telefono_1_actualizar").value =
            dato.telefono1;
          document.getElementById("producto_telefono_2_actualizar").value =
            dato.telefono2;
          document.getElementById("producto_direccion_actualizar").value =
            dato.direccion;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

/**
 @param void
 @return void Envia los datos para que se actualizen los campos modificados de la ficha comercial
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 * */
function actualizar_ficha_comercial() {
  let formulario_emprendedor = document.querySelector(
    "#formulario_ficha_comercial"
  );
  let formData = new FormData(formulario_emprendedor);
  fetch(RUTA_URL + "actualizar_ficha_comercial", {
    method: "POST",
    body: formData,
  })
    .then(function (respuesta) {
      if (respuesta.ok) {
        return respuesta.text();
      } else {
        throw "Error en el envió";
      }
    })
    .then(function (json) {
      console.log(json);
    })
    .catch(function (error) {
      console.log(error);
    });
}

/**
 @param void
 @return void Envia los datos para que se actualizen los campos modificados de la ficha tecnica
 @version 1.0 septiembre
 @author Jean Carlo Castaño Millan
 * */
function actualizar_ficha_tecnica() {
  let producto_tipo_presentacion = document.getElementById(
    "producto_tipo_presentacion_actualizar"
  ).value;
  let producto_contenido_presentacion = document.getElementById(
    "producto_contenido_presentacion_actualizar"
  ).value;
  let producto_tipos_presentacion = document.getElementById(
    "producto_tipos_presentacion_actualizar"
  ).value;
  let producto_costo = document.getElementById("producto_costo_actualizar")
    .value;
  let producto_nombre_tecnico = document.getElementById(
    "producto_nombre_tecnico_actualizar"
  ).value;
  let producto_volumen_produccion = document.getElementById(
    "producto_volumen_produccion_actualizar"
  ).value;
  let producto_variedad = document.getElementById(
    "producto_variedad_actualizar"
  ).value;
  let producto_nombre_cientifico = document.getElementById(
    "producto_nombre_cientifico_actualizar"
  ).value;
  let producto_temperatura_requerida_envio = document.getElementById(
    "producto_temperatura_requerida_envio_actualizar"
  ).value;
  let producto_ntc_relacionada = document.getElementById(
    "producto_ntc_relacionada_actualizar"
  ).value;
  let producto_normas_vinculadas = document.getElementById(
    "producto_normas_vinculadas_actualizar"
  ).value;
  let producto_lotes_promocion = document.getElementById(
    "producto_lotes_promocion_actualizar"
  ).value;
  let producto_caracteristicas_propias = document.getElementById(
    "producto_caracteristicas_propias_actualizar"
  ).value;
  let producto_telefono_1 = document.getElementById(
    "producto_telefono_1_actualizar"
  ).value;
  let producto_telefono_2 = document.getElementById(
    "producto_telefono_2_actualizar"
  ).value;
  let producto_direccion = document.getElementById(
    "producto_direccion_actualizar"
  ).value;
  let formulario_tecnica = document.querySelector("#formulario_ficha_tecnica");

  if (
    producto_tipo_presentacion === "" ||
    producto_contenido_presentacion === "" ||
    producto_tipos_presentacion === "" ||
    producto_costo === "" ||
    producto_nombre_tecnico === "" ||
    producto_volumen_produccion === "" ||
    producto_variedad === "" ||
    producto_nombre_cientifico === "" ||
    producto_temperatura_requerida_envio === "" ||
    producto_ntc_relacionada === "" ||
    producto_normas_vinculadas === "" ||
    producto_lotes_promocion === "" ||
    producto_caracteristicas_propias === "" ||
    producto_telefono_1 === "" ||
    producto_telefono_2 === "" ||
    producto_direccion === ""
  ) {
    alert("Alguno de los campos se encuentra vacio por favor reviselos");
  } else {
    let formData = new FormData(formulario_tecnica);
    fetch(RUTA_URL + "actualizar_ficha_tecnica", {
      method: "POST",
      body: formData,
    })
      .then(function (respuesta) {
        if (respuesta.ok) {
          return respuesta.text();
        } else {
          throw "Error en el envió";
        }
      })
      .then(function (json) {
        console.log(json);
        if (json == "true") {
          document.getElementById("btn_ficha_tecnica").click();
          alert(
            "Se realizo correctamente la actualizacion de la ficha tecnica"
          );
          document.getElementById("btn_ficha_tecnica").disabled = true;
        } else if (json == "false1") {
          alert("Alguno de los datos se encuentra vacio");
        } else if (json == "false2") {
          alert(
            "Alguno de los datos no coincide con el tipo solicitado por el sistema"
          );
        } else if (json == "false3") {
          alert("El codigo del producto fue vulnerado");
        } else if (json == "false4") {
          alert("El Costo del producto fue vulnerado");
        } else if (json == "false5") {
          alert("El primer telefono no es un numero");
        } else if (json == "false7") {
          alert("Error al ingresar la información en el sistema");
        } else {
          alert("Ocurrio un error en el sistema por favor recargue la pagina");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
