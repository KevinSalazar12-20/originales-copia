<?php
//
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
// @resumen este archivo es el encargado de dirigir los datos por el camino exitoso para la culminación correcta
// de la ejecución del aplicativo
//
// @descripcion en este archivo pueden encontrar cada uno de los métodos encargados de
//
class Enrutador extends Controlador
{
//
//
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
// @Resumen Este fragmento de codigo es el encargado de la estancia cada uno de los modelos en el enrutador para hacer
//  uso de los métodos y tener acceso a todas la interacciones que se ejecutan dentro de ellas
//
// @example
// $this - es utilizado para realizar la estancia
// $nombreclave - es el encargado de almacenar el nombre clave que se utilizara para realizar la innovación de los métodos
// que contenga el modelo asignado al nombre clave
// después se le asignara el modelo que contendrá el nombre clave asignado anteriormente
// $this - es utilizado para realizar la estancia
// modelo - se indica este parámetro para indicar al código que la clase o archivo que se le va realizar la estancia se
// encuentra ubicado en el directorio modelo
//
//
    public function __construct()
    {
        $this->usuarioModelo = $this->modelo('Usuario');
        $this->sesionModelo = $this->modelo('Sesion');
        $this->validarModelo = $this->modelo('Validar');
        $this->clienteModelo = $this->modelo('Cliente');
        $this->encriptarModelo = $this->modelo('Encriptacion');
        $this->categoriaModelo = $this->modelo('Categoria');
        $this->municipioModelo = $this->modelo('Municipio');
        $this->emprendedorModelo = $this->modelo('Emprendedor');
        $this->productoModelo = $this->modelo('Producto');
        $this->fichaTecnicaModelo = $this->modelo('FichaTecnica');
        $this->fichaComercialModelo = $this->modelo('FichaComercial');

    }

//
//
// @param string  - $objeto->usuario  - es el encargado de contener el usuario que el cliente dígito para logearse
//        string - $objeto->usuario_contraseña es el encargado de almacenar la contraseña digitada por el usuario
// @throws En caso de que retorne un false se debería a la consecuencia de un dato no cumpla con los parámetros establecidos
// dentro del código
// @resumen este fragmento de código es el encargado de asegurarse de que el usuario y la contraseña sean los
// correctos para llevar a cabo su optima ejecución
// @descripcion lo primero que se realiza en el fragmento de código es recibir los datos
// despues validamos la informacion suministrada por el usuario que sea acorde con la que
// se encuentra en la base de datos creamos una session con el nombre de usuario y retornamos
// el rol al que corresponde
// @author Andres Felipe Florian Gonzalez
// @example Este es ejecutado cuando el usuario ingresa en el cuadro emergente del logeo su usuario
// y contraseña correspondiente
// @version  1.0
//
    public function validar_login()
    {
        //Este fragmento de código es el encargado de crear la variables de session para el login además validar los campos
        $objeto = json_decode($_POST['datos']);
        $objeto->usuario;
        $objeto->usuario_contrasena;
        if (isset($objeto->usuario) && isset($objeto->usuario_contrasena)) {
            $userForm = $this->usuarioModelo->limpiarDatos($objeto->usuario);
            $passForm = $this->usuarioModelo->limpiarDatos($objeto->usuario_contrasena);
            $pass = $this->usuarioModelo->contrasenaExiste($userForm);
            if (!empty($pass)) {
                $pass = $pass[0]->clave;
                if ($this->encriptarModelo->validar($passForm, $pass)) {
                    if ($user = $this->usuarioModelo->usuarioExiste($userForm, $pass)) {
                        $IdUser = $this->usuarioModelo->retornoID($userForm);
                        $this->sesionModelo->setCurrentUser($IdUser[0]->id_usuario); //Asigno el usuario a mi SESSIO
                        $userID = $this->sesionModelo->getCurrentUser();
                        $rol = $this->usuarioModelo->retornarPermiso($userID);
                        $rolsession = $this->sesionModelo->setPermission($rol);
                        if ($rol[0]->rol_idrol == "1") {
                            echo "admin";
                        } elseif ($rol[0]->rol_idrol == "2") {
                            echo "emprendedor";
                        } elseif ($rol[0]->rol_idrol == "3") {
                            echo "cliente";
                        }
                    } else {
                        //cuando el usuario y la contrasena no son las correctas aparecerá este error
                        echo "false4";
                    }
                } else {
                    //confirmamos que la contraseña sea igual a la que esta en la base de datos encriptada utilizando el argon
                    echo "false3";
                }
            } else {
                // cuando el usuario que se esta logiando no aparece el resultado de la contraseña es por que no existe
                echo "false2";
            }
        } else {
            // cuando los campos de usuario o contraseña esten vacios presentara este error
            echo "false1";
        }
    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar el conteo de todos los artículos existentes en la base de
// datos para poder realizar la filtración de estas por una cantidad de archivos limites que este caso es 6
// @descripcion se encarga de ir al modelo producto y contar cada uno de los productos para después enviar 6 productos
// y asi permitir seguir enviando los productos de a 6
//
    public function index()
    {
        $datos = $this->productoModelo->ListarProducto();
        $indice = count($datos);
        $indice = ceil($indice);
        $divisor = $indice / 6;
        $divisor = ceil($divisor);
        $data = [
            'inicio' => 0,
            'final' => 6
        ];
        $datos = $this->productoModelo->ListarProductoSelecionados($data);
        for ($i = 1; $i <= $divisor; $i++) {
            $divisores[] = $i;
        }
        if (empty($divisores)) {
            $divisores = 0;
        } else {
            $divisores = $divisores;
        }
        $datos = [
            'datos' => $datos,
            'divisor' => $divisores
        ];
        $this->vista('trastienda/inicio', $datos);
    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista admin
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista admin con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function admin()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/admin');
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista emprendedor
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista  emprendedor y además enviara la lista de municipios consultados en el modelo municipio
// con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function emprendedor()
    {
        if (isset($_SESSION['id'])) {
            $datos = $this->municipioModelo->MostrarMunicipio();
            $this->vista('trastienda/emprendedor', $datos);
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista cliente
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista cliente con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function cliente()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/cliente');
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista admin
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista producto además llevara consigo los datos correspondientes a lo que retorno el modelo categoría
// en el método ListarCategoria que contiene todas las categorías existentes con un óptimo rendimiento de la vista
// de lo contrario se redireccionará a la vista principal
//
    public function producto()
    {
        if (isset($_SESSION['id'])) {
            $datos = $this->categoriaModelo->ListarCategoria();
            $this->vista('trastienda/producto', $datos);
        } else {
            header('Location:' . RUTA_URL);
        }


    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista zona con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function zona()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/zona');
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista filtro_municipio con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function filtrar_municipio()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/filtro_municipio');
        } else {
            header('Location:' . RUTA_URL);
        }
    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista usuario con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function usuario()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/usuario');
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista categoria con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function categoria()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/categoria');
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param null
// @version  1.0
// @author Andres Felipe Florian Gonzalez
// @resumen este fragmento de código es el encargado de realizar la redirección a la vista
// @descripcion se encarga de comprobar si existe alguna variable de session activa en caso de que si exista podrá
// mostrar la vista municipio con un óptimo rendimiento de la vista de lo contrario se redireccionará a la vista principal
//
    public function municipio()
    {
        if (isset($_SESSION['id'])) {
            $this->vista('trastienda/municipio');
        } else {
            header('Location:' . RUTA_URL);
        }
    }

//
//
// @param json datos  - Contiene toda la información necesaria para registrar el usuario satisfactoria mente
// @return string este string trabaja como un boolean le permite a javascript darle la información al usuario de que
// su registro fue satisfactorio
// @throws  En caso de que exista alguna incoherencia de los datos suministrados por el usuario existen una serie de condiciones
// que funcionan como filtros para los datos para permitir tener mayor manejo de la información correcta cada uno de los false
// contienen la información por la cual han sido lanzados al usuario
// @resumen Este fragmento de código se encarga de realizar el registro de un usuario cliente
// @descripcion se encarga de  validar primero si existe una session activa luego se examinan si los datos contienen algo
//  después comprueba si el numero de teléfono es un entero se comprueba de que el email si sea un correo valido  se valida
// de que el usuario que quieran crear no exista se confirma de que las claves concidan por ultimo se crea un arreglo y si todos
// los parámetros exigidos están correctos saldría bien
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
    public function registrar_usuario()
    {
        $objeto = json_decode($_POST['datos']);
        if (!empty($objeto->usuario_nombre)
            && !empty($objeto->usuario_apellido)
            && !empty($objeto->usuario_telefono)
            && !empty($objeto->usuario_direccion)
            && !empty($objeto->usuario_correo)
            && !empty($objeto->usuario_usuario)
            && !empty($objeto->usuario_clave)
        ) {
            switch ($objeto->usuario_nombre
                && $objeto->usuario_apellido
                && $objeto->usuario_direccion
                && $objeto->usuario_correo
                && $objeto->usuario_usuario
                && $objeto->usuario_clave
                && $objeto->usuario_clave2) {
                case 'string':
                    if ($this->validarModelo->ValidarInt($objeto->usuario_telefono)) {
                        $numero = $this->validarModelo->ValidarEntero($objeto->usuario_telefono);
                        if ($this->validarModelo->ValidarEmail($objeto->usuario_correo)) {
                            $usuario = $this->usuarioModelo->usuarioCreado($objeto->usuario_usuario);
                            if (empty($usuario)) {
                                if ($objeto->usuario_clave === $objeto->usuario_clave2) {
                                    $id = $this->usuarioModelo->ContadorUsuario();
                                    //la variable secret contiene el nombre clave para sacar el numero del contador
                                    if ($this->validarModelo->ValidarEntero($objeto->usuario_documento)) {
                                        $documento = $this->validarModelo->ValidarInt($objeto->usuario_documento);
                                        $documento = $this->clienteModelo->clienteCreado($objeto->usuario_documento);
                                        if (empty($documento[0]->cedula)) {
                                            $contrasena = filter_var(trim($objeto->usuario_clave), FILTER_SANITIZE_STRING);
                                            $contrasena = $this->encriptarModelo->encrytando($contrasena);
                                            $datos = [
                                                'id' => filter_var(trim($id[0]['count(id_usuario) + 1']), FILTER_SANITIZE_NUMBER_INT),
                                                'usuario' => filter_var(trim($objeto->usuario_usuario), FILTER_SANITIZE_STRING),
                                                'clave' => $contrasena,
                                                'nombre' => filter_var(trim($objeto->usuario_nombre), FILTER_SANITIZE_STRING),
                                                'apellidos' => filter_var(trim($objeto->usuario_apellido), FILTER_SANITIZE_STRING),
                                                'direccion' => filter_var($objeto->usuario_direccion, FILTER_SANITIZE_EMAIL),
                                                'cedula' => filter_var(trim($objeto->usuario_documento)),
                                                'telefono' => filter_var(trim($objeto->usuario_telefono)),
                                                'rol_idrol' => 3,
                                                'correo' => filter_var(trim($objeto->usuario_correo), FILTER_SANITIZE_STRING)
                                            ];
                                            if ($this->usuarioModelo->InsertarUsuario($datos) && $this->clienteModelo->InsertarCliente($datos)) {
                                                echo "true";
                                            } else {
                                                //este error es que la inserción tuvo un fallo
                                                echo "false9";
                                            }
                                        } else {
                                            //este error es que la cédula ya esta registrada en el sistema
                                            echo "false8";
                                        }
                                    } else {
                                        //este error es que la cédula debe ser solo numero
                                        echo "false7";
                                    }
                                } else {
                                    //este error es que las contraseñas no coinciden
                                    echo "false6";
                                }
                            } else {
                                //este error es que el usuario ya esta registrado en la base de datos
                                echo "false5";
                            }
                        } else {
                            //este error es que el correo no cumple con los parámetros
                            echo "false4";
                        }
                    } else {
                        //este error es que el teléfono debe ser un numero
                        echo "false3";
                    }
                    break;
                default:
                    //este error es que los datos no cuentan con el parámetro string
                    echo "false2";
                    break;
            }
        } else {
            //este error es que los datos no están completos
            echo "false1";
        }
    }

//
//
// @param json datos  - Contiene toda la información necesaria para crear una categoría satisfactoria mente
// @return string este string trabaja como un boolean le permite a javascript darle la información al usuario de que
// su categoría a sido creada satisfactoria mente
// @throws  En caso de que exista alguna incoherencia de los datos suministrados por el usuario existen una serie de condiciones
// que funcionan como filtros para los datos para permitir tener mayor manejo de la información correcta cada uno de los false
// contienen la información por la cual han sido lanzados al usuario
// @resumen Este fragmento de código se encarga de crear la categorías en la base de datos
// @descripcion lo primero es que nos aseguramos de que exista una session para permitir hacer los cambios luego validamos quue algunos
// campos sean string como se exigen para seguir el procedimiento por ultimo se crea un arreglo con los datos y se espera la
// respuesta que tenga el modelo para mostrar el resultado a la base de datos
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
    public function crear_categoria()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->categoria_nombre)
                && !empty($objeto->categoria_descripcion)
            ) {
                switch ($objeto->categoria_nombre
                    && $objeto->categoria_descripcion
                ) {
                    case 'string';
                        $id = $this->categoriaModelo->ContadorCategoria();
                        //la variable secret contiene el nombre clave para sacar el numero del contador


                        $id = $id[0]['count(id_categoria) + 1'];


                        $datos = [
                            'id_categoria' => $id,
                            'nombre' => filter_var(trim($objeto->categoria_nombre), FILTER_SANITIZE_STRING),
                            'descripcion' => filter_var(trim($objeto->categoria_descripcion), FILTER_SANITIZE_STRING),
                        ];
                        if ($this->categoriaModelo->InsertarCategoria($datos)) {
                            echo "true";
                        } else {
                            //si la inserción de la categoría llega a tener algún error
                            echo "false";
                        }
                        break;
                    default:
                        //en caso de que los para metros requeridos no cuenten como string
                        echo "false";
                        break;
                }
            } else {
                // no llegaron los campos requeridos
                echo "falsevacio";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param json datos  - Contiene toda la información necesaria para realizar una búsqueda en una categoría satisfactoria mente
// @return string este string retorna los datos encontrados referentes a esa categoría.
// @throws  En caso de que exista alguna incoherencia por los datos suministrados por el usuario o la búsqueda de los datos sea
// nula retornara un false para detallar al usuario lo sucedido
// @resumen Este fragmento de código se encarga de realizar la búsqueda de los producto
// @descripcion lo primero es que nos aseguramos de que exista una session para permitir realizar la búsqueda después de validar
// de que si haya llegado el dato del cliente lo limpiamos y lo enviamos al modelo comprobamos de que el modelo nos retorne datos
// de ser correcto le enviamos la respuesta con los datos al cliente
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
    public function buscar_categoria()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->categoria_nombre_busqueda)) {
                $nombre = $this->validarModelo->limpiarDatos($objeto->categoria_nombre_busqueda);
                $nombre = filter_var(trim($nombre), FILTER_SANITIZE_STRING);
                $datos = $this->categoriaModelo->BuscadorCategoria($nombre);
                if (!empty($datos)) {
                    echo json_encode($datos);
                } else {
                    echo "false";
                }
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }


    }

//
//
// @param json datos  - Contiene toda la información necesaria para realizar la actualización satisfactoria mente
// @return string este string trabaja como boolean para retornar al cliente si fue victoriosa o no .
// @throws  En caso de que exista alguna falencia en los  datos suministrador por el cliente tendrá dificultades
// al actualizarse y enviara un string informando de que fallo la actualización cada uno de los posibles
// errores están comentado
// @resumen Este fragmento de código se encarga de realizar la búsqueda de los producto
// @descripcion lo primero es que nos aseguramos de que exista una session para permitir realizar la búsqueda después de validar
// de que si haya llegado el dato del cliente lo limpiamos y lo enviamos al modelo comprobamos de que el modelo nos retorne datos
// de ser correcto le enviamos la respuesta con los datos al cliente
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
    public function actualizar_categoria()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->categoria_nombre)
                && !empty($objeto->categoria_descripcion)
                && !empty($objeto->categoria_id)
            ) {
                switch ($objeto->categoria_nombre
                    && $objeto->categoria_descripcion
                ) {
                    case 'string':
                        if ($this->validarModelo->ValidarInt($objeto->categoria_id)) {
                            $datos = [
                                'id_categoria' => filter_var(trim($objeto->categoria_id), FILTER_SANITIZE_NUMBER_INT),
                                'nombre' => filter_var(trim($objeto->categoria_nombre), FILTER_SANITIZE_STRING),
                                'descripcion' => filter_var(trim($objeto->categoria_descripcion), FILTER_SANITIZE_STRING),
                            ];
                            if ($this->categoriaModelo->ActualizarCategoria($datos)) {
                                echo "true";
                            } else {
                                //la actualización fallo
                                echo "false";
                            }
                        } else {
                            //Este error se origina cuando el id de la categoría no es de tipo integer
                            echo "false1";
                        }
                        break;
                    default:
                        //Este error se origina cuando el tipo de dato que llega de la petición no es un string
                        echo "false2";
                        break;
                }
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param json datos  - Contiene toda la información necesaria para realizar la búsqueda de una categoría en  especifico
// @return string este string trabaja retornando todos los datos de la categoría buscada en especifico.
// @throws  En caso de que exista alguna falencia en los datos suministrados se retornara un false indicando a que se debe el
// error respectivo.
// @resumen Este fragmento de código se encarga de realizar la búsqueda de la categoría
// @descripcion lo primero es que nos aseguramos de que exista una session para permitir realizar la búsqueda después se confirma
// de que si haya llegado un id para poder realizar la búsqueda confirmamos de que sea un entero y se realiza la búsqueda en el  modelo
// retorna la información de lo contrario se retorna false
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
    public function buscar_categoria_id()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->id)) {
                if ($this->validarModelo->ValidarInt($objeto->id)) {
                    $id = $this->validarModelo->ValidarEntero($objeto->id);
                    $id = filter_var(trim($id), FILTER_SANITIZE_NUMBER_INT);
                    $datos = $this->categoriaModelo->RespuestaCategoria($id);
                    if (!empty($datos)) {
                        echo json_encode($datos);
                    } else {
                        // no llegaron datos del modelo
                        echo "false";
                    }
                } else {
                    //no se pudo realizar la conversion a un entero
                    echo "false2";
                }
            } else {
                //el objeto id no existe
                echo "false1";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

//
//
// @param id contiene la información necesaria para eliminar la categoría
// @return json retornando todos los datos almacenados activos en la tabla categoría.
// @throws  En caso de que existan falencias en los datos suministrados por el cliente retornara un false
// @resumen Este fragmento de código se encarga de realizar la eliminación de la categoría
// @descripcion lo primero es que nos aseguramos de que exista una session para permitir realizar la validación de que la variable
// id  no contenga un valor nulo luego se comprueba de que no sea un valor integer por ultimo se agrega a un arreglo y se le retorna
// al cliente  todos los datos activos de la base de la tabla categorías
// @version  1.0
// @author Andres Felipe Florian Gonzalez
//
    public function eliminar_categoria()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->id_categoria)) {
                if ($this->validarModelo->ValidarInt($objeto->id_categoria)) {
                    $id = $this->validarModelo->ValidarEntero($objeto->id_categoria);
                    $datos = [
                        'id' => filter_var(trim($id), FILTER_SANITIZE_NUMBER_INT),
                        'estado' => 1,
                    ];
                    if ($this->categoriaModelo->EliminarCategoria($datos)) {
                        $datos = $this->categoriaModelo->ListarCategoria();
                        echo json_encode($datos);
                    } else {
                        echo "false";
                    }
                } else {
                    echo "false";
                }

            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function crear_municipio()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->municipio_nombre)
                && !empty($objeto->municipio_departamento)
            ) {
                switch ($objeto->municipio_nombre
                    && $objeto->municipio_departamento
                ) {
                    case 'string';
                        $id = $this->municipioModelo->ContadorMunicipio();
                        //la variable secret contiene el nombre clave para sacar el numero del contador
                        $id = $id[0]['count(id_municipio) + 1'];
                        $datos = [
                            'id_municipio' => $id,
                            'nombre' => filter_var(trim($objeto->municipio_nombre), FILTER_SANITIZE_STRING),
                            'departamento' => filter_var(trim($objeto->municipio_departamento), FILTER_SANITIZE_STRING),
                        ];

                        if ($this->municipioModelo->InsertarMunicipio($datos)) {
                            echo "true";
                        } else {
                            echo "false";
                        }
                        break;
                    default:
                        echo "false";
                        break;
                }
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function buscar_municipio()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->municipio_nombre_busqueda)) {
                $nombre = $this->validarModelo->limpiarDatos($objeto->municipio_nombre_busqueda);
                $nombre = filter_var(trim($nombre), FILTER_SANITIZE_STRING);
                $datos = $this->municipioModelo->BuscadorCategoria($nombre);
                if (!empty($datos)) {
                    echo json_encode($datos);
                } else {
                    echo "false";
                }
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function actualizar_municipio()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->municipio_nombre)
                && !empty($objeto->departamento)
                && !empty($objeto->id_municipio)
            ) {
                switch ($objeto->municipio_nombre
                    && $objeto->departamento
                ) {
                    case 'string':
                        if ($this->validarModelo->ValidarInt($objeto->id_municipio)) {
                            $datos = [
                                'id_municipio' => filter_var(trim($objeto->id_municipio), FILTER_SANITIZE_NUMBER_INT),
                                'nombre' => filter_var(trim($objeto->municipio_nombre), FILTER_SANITIZE_STRING),
                                'departamento' => filter_var(trim($objeto->departamento), FILTER_SANITIZE_STRING),
                            ];
                            if ($this->municipioModelo->ActualizarMunicipio($datos)) {
                                echo "true";
                            } else {
                                echo "false3";
                            }
                        } else {
                            echo "false2";
                        }
                        break;
                    default:
                        echo "false1";
                        break;
                }
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function eliminar_municipio()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->id_municipio)) {
                if ($this->validarModelo->ValidarInt($objeto->id_municipio)) {
                    $id = $this->validarModelo->ValidarEntero($objeto->id_municipio);
                    $datos = [
                        'id' => filter_var(trim($id), FILTER_SANITIZE_NUMBER_INT),
                        'estado' => 1,
                    ];
                    if ($this->municipioModelo->EliminarMunicipio($datos)) {
                        $datos = $this->municipioModelo->MostrarMunicipio();
                        echo json_encode($datos);
                    } else {
                        echo "false";
                    }
                } else {
                    echo "false";
                }
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function crear_emprendedor()
    {
        if (isset($_SESSION['id'])) {
            if (!empty($_POST['emprendedor_documento']) && !empty($_POST['emprendedor_usuario']) &&
                !empty($_POST['emprendedor_clave']) && !empty($_POST['emprendedor_clave2']) &&
                !empty($_POST['emprendedor_nombre']) && !empty($_POST['emprendedor_apellido']) &&
                !empty($_POST['emprendedor_fecha_nacimiento']) && !empty($_POST['emprendedor_direccion']) &&
                !empty($_POST['emprendedor_telefono']) && !empty($_POST['emprendedor_descripcion_up']) &&
                !empty($_POST['emprendedor_unidad_productiva']) && !empty($_POST['emprendedor_municipio'])) {
                switch ($_POST['emprendedor_usuario'] && $_POST['emprendedor_nombre'] &&
                    $_POST['emprendedor_apellido'] && $_POST['emprendedor_direccion'] &&
                    $_POST['emprendedor_descripcion_up'] && $_POST['emprendedor_unidad_productiva']) {
                    case 'string':
                        if ($this->validarModelo->ValidarInt($_POST['emprendedor_telefono'])) {
                            $numero = $this->validarModelo->ValidarEntero($_POST['emprendedor_telefono']);
                            $usuario = $this->usuarioModelo->usuarioCreado($_POST['emprendedor_usuario']);
                            if (empty($usuario)) {
                                if ($_POST['emprendedor_clave'] === $_POST['emprendedor_clave2']) {
                                    $id = $this->usuarioModelo->ContadorUsuario();
                                    //la variable secret contiene el nombre clave para sacar el numero del contador
                                    $id = $id[0]['count(id_usuario) + 1'];
                                    if ($this->validarModelo->ValidarCedula($_POST['emprendedor_documento'])) {
                                        if ($this->validarModelo->Numero($_POST['emprendedor_documento'])) {
                                            $documento = $this->emprendedorModelo->EmprendedorCreado($_POST['emprendedor_documento']);
                                            $documentousu = $this->usuarioModelo->EmprendedorUsuarioCreado($_POST['emprendedor_documento']);
                                            if (empty($documentousu)) {
                                                if (empty($documento)) {
                                                    $contrasena = filter_var(trim($_POST['emprendedor_clave']), FILTER_SANITIZE_STRING);
                                                    $contrasena = $this->encriptarModelo->encrytando($contrasena);

                                                    if (!empty($_POST['emprendedor_correo'])) {
                                                        if ($this->validarModelo->ValidarEmail($_POST['emprendedor_correo'])) {
                                                        } else {
                                                            // el correo no cumple
                                                            echo "false4";
                                                            die();
                                                        }
                                                    }
                                                    if (!empty($_FILES)) {

                                                        if ($_FILES["emprendedor_logo_up"]["type"] == "image/jpg" || $_FILES["emprendedor_logo_up"]["type"] == "image/JPG"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/png" || $_FILES["emprendedor_logo_up"]["type"] == "image/PNG"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/gif" || $_FILES["emprendedor_logo_up"]["type"] == "image/GIF"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/jpeg" || $_FILES["emprendedor_logo_up"]["type"] == "image/JPEG"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/tiff " || $_FILES["emprendedor_logo_up"]["type"] == "image/tiff"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/tif" || $_FILES["emprendedor_logo_up"]["type"] == "image/TIF"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/RAW" || $_FILES["emprendedor_logo_up"]["type"] == "image/raw"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/BMP" || $_FILES["emprendedor_logo_up"]["type"] == "image/bmp"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/psd" || $_FILES["emprendedor_logo_up"]["type"] == "image/eps"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/SVG" || $_FILES["emprendedor_logo_up"]["type"] == "image/svg"
                                                            || $_FILES["emprendedor_logo_up"]["type"] == "image/AI") {

                                                            if ($_FILES["emprendedor_foto_personal_up"]["type"] == "image/jpg" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/JPG"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/png" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/PNG"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/gif" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/GIF"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/jpeg" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/JPEG"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/tiff " || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/tiff"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/tif" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/TIF"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/RAW" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/raw"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/BMP" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/bmp"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/psd" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/eps"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/SVG" || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/svg"
                                                                || $_FILES["emprendedor_foto_personal_up"]["type"] == "image/AI") {


                                                                if ($_FILES['emprendedor_logo_up']['size'] < 10485760 && $_FILES['emprendedor_foto_personal_up']['size'] < 10485760) {

                                                                    $nombre = "logo" . $_POST['emprendedor_documento'];
                                                                    $pdf = $_FILES["emprendedor_logo_up"]["name"];
                                                                    $tipo = stristr($pdf, '.');
                                                                    $nombre_foto = $nombre . $tipo;
                                                                    $ubicacion = $_FILES["emprendedor_logo_up"]["tmp_name"];
                                                                    $destino = DIRECTORIOLOGO . $nombre_foto;
                                                                    move_uploaded_file($ubicacion, $destino);

                                                                    $nombrepersonal = "nombrepersonal" . $_POST['emprendedor_documento'];
                                                                    $pdf = $_FILES["emprendedor_foto_personal_up"]["name"];
                                                                    $tipo = stristr($pdf, '.');
                                                                    $nombre_personalup = $nombrepersonal . $tipo;
                                                                    $ubicacion = $_FILES["emprendedor_foto_personal_up"]["tmp_name"];
                                                                    $destino = DIRECTORIOPERSONALUP . $nombre_personalup;
                                                                    move_uploaded_file($ubicacion, $destino);


                                                                    $datos = [
                                                                        'id' => filter_var(trim($id), FILTER_SANITIZE_NUMBER_INT),
                                                                        'usuario' => filter_var(trim($_POST['emprendedor_usuario']), FILTER_SANITIZE_STRING),
                                                                        'clave' => $contrasena,
                                                                        'nombre' => filter_var(trim($_POST['emprendedor_nombre']), FILTER_SANITIZE_STRING),
                                                                        'apellidos' => filter_var(trim($_POST['emprendedor_apellido']), FILTER_SANITIZE_STRING),
                                                                        'correo' => filter_var(trim($_POST['emprendedor_correo']), FILTER_SANITIZE_EMAIL),
                                                                        'direccion' => filter_var($_POST['emprendedor_descripcion_up'], FILTER_SANITIZE_EMAIL),
                                                                        'cedula' => filter_var(trim($_POST['emprendedor_documento'])),
                                                                        'telefono' => filter_var(trim($_POST['emprendedor_telefono'])),
                                                                        'fecha_nacimiento' => filter_var(trim($_POST['emprendedor_fecha_nacimiento']), FILTER_SANITIZE_STRING),
                                                                        'municipio' => filter_var(trim($_POST['emprendedor_municipio']), FILTER_SANITIZE_STRING),
                                                                        'rol_idrol' => 2,
                                                                        'descripcion_unidadp' => filter_var($_POST['emprendedor_descripcion_up'], FILTER_SANITIZE_STRING),
                                                                        'nombre_unidadp' => filter_var($_POST['emprendedor_unidad_productiva'], FILTER_SANITIZE_STRING),
                                                                        'logo' => $nombre_foto,
                                                                        'foto_personal' => $nombre_personalup
                                                                    ];
                                                                    if ($this->usuarioModelo->InsertarUsuario($datos) && $this->emprendedorModelo->InsertarEmprendedor($datos)) {
                                                                        echo "true";
                                                                    } else {
                                                                        //este error es que la inserción tuvo un fallo
                                                                        echo "false9";
                                                                    }
                                                                } else {
                                                                    // la imagen pesa mucho
                                                                    echo "falsetamaño";
                                                                }
                                                            } else {
                                                                // imagen de personal no cuenta con la capacidad
                                                                echo "falseimage";
                                                            }
                                                        } else {
                                                            // la imagen no corresponde
                                                            echo "falseimage";
                                                        }
                                                        // final -------------------------------------------
                                                    } else {
                                                        //imagen vacía
                                                        echo "false8";
                                                    }
                                                } else {
                                                    // el documenta ya esta creado en usuario
                                                    echo "false7";
                                                }
                                            } else {
                                                // el documenta ya esta creado en emprendedor
                                                echo "false7";
                                            }
                                        } else {
                                            // la cedula no es un entero
                                            echo "falseint";
                                        }
                                    } else {
                                        // es muy largo la cedula
                                        echo "falselargo";
                                    }
                                } else {
                                    // contraseña no concide
                                    echo "false6";
                                }
                            } else {
                                //usuario repetido
                                echo "false5";
                            }

                        } else {
                            // el telefono no es un entero
                            echo "false3";
                        }
                        break;
                    default:
                        // no son string los campos requeridos
                        echo "false2";
                        break;
                }
            } else {
                //estan vacios los campos
                echo "false1";
            }
        } else {
            header('Location:' . RUTA_URL);
        }
    }

    public function actualizar_emprendedor()
    {
        if (isset($_SESSION['id'])) {
            if (!empty($_POST['emprendedor_documento_actualizar']) && !empty($_POST['emprendedor_usuario_actualizar']) &&
                !empty($_POST['emprendedor_nombre_actualizar']) && !empty($_POST['emprendedor_apellido_actualizar']) &&
                !empty($_POST['emprendedor_direccion_actualizar']) && !empty($_POST['emprendedor_telefono_actualizar']) &&
                !empty($_POST['emprendedor_fecha_nacimiento_actualizar']) && !empty($_POST['emprendedor_municipio_actualizar'])
                && !empty($_POST['emprendedor_descripcion_up_actualizar']) && !empty($_POST['emprendedor_unidad_productiva_actualizar'])
                && !empty($_POST['emprendedor_correo_actualizar'])
            ) {
                switch ($_POST['emprendedor_usuario_actualizar'] && $_POST['emprendedor_nombre_actualizar'] &&
                    $_POST['emprendedor_apellido_actualizar'] && $_POST['emprendedor_direccion_actualizar'] &&
                    $_POST['emprendedor_correo_actualizar'] && $_POST['emprendedor_descripcion_up_actualizar'] &&
                    $_POST['emprendedor_fecha_nacimiento_actualizar'] && $_POST['emprendedor_unidad_productiva_actualizar']
                    && $_POST['emprendedor_correo_actualizar']) {
                    case 'string':
                        if ($this->validarModelo->ValidarInt($_POST['emprendedor_telefono_actualizar'])) {
                            $numero = $this->validarModelo->ValidarEntero($_POST['emprendedor_telefono_actualizar']);
                            if ($this->validarModelo->ValidarEmail($_POST['emprendedor_correo_actualizar'])) {
                                if ($_FILES['emprendedor_logo_up_actualizar']['name'] != "" && $_FILES['emprendedor_foto_personal_up_actualizar']['name'] != "") {
                                    if ($_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/jpg" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/JPG"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/png" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/PNG"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/gif" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/GIF"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/jpeg" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/JPEG"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/tiff " || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/tiff"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/tif" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/TIF"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/RAW" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/raw"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/BMP" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/bmp"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/psd" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/eps"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/SVG" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/svg"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/AI"
                                    ) {
                                        if (
                                            $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/jpg" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/JPG"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/png" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/PNG"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/gif" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/GIF"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/jpeg" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/JPEG"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/tiff " || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/tiff"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/tif" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/TIF"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/RAW" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/raw"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/BMP" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/bmp"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/psd" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/eps"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/SVG" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/svg"
                                            || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/AI"
                                        ) {


                                            if ($_FILES['emprendedor_logo_up_actualizar']['size'] < 10485760 && $_FILES['emprendedor_foto_personal_up_actualizar']['size'] < 10485760) {
                                                //  cambiando la imagen logo
                                                $logo = $_POST['imagen_logo_actual'];
                                                $ubicacion = $_FILES["emprendedor_logo_up_actualizar"]["tmp_name"];
                                                $destino = DIRECTORIOPERSONALUP . $logo;
                                                move_uploaded_file($ubicacion, $destino);
                                                //  cambiando la imagen
                                                $personalup = $_POST['imagen_personal_up_actual'];
                                                $ubicacion = $_FILES["emprendedor_foto_personal_up_actualizar"]["tmp_name"];
                                                $destino = DIRECTORIOPERSONALUP . $logo;
                                                move_uploaded_file($ubicacion, $destino);
                                            } else {
                                                // tamaño muy grande para las imagenes
                                                echo "false12";
                                            }
                                        } else {
                                            //tipeo erroneo
                                            echo "false";
                                        }
                                    } else {
                                        //imagenes no cuentan con el tipeo especifico
                                        echo "false11";
                                    }
                                } else if ($_FILES['emprendedor_logo_up_actualizar']['name'] != "" && $_FILES['emprendedor_foto_personal_up_actualizar']['name'] == "") {
                                    if ($_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/jpg" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/JPG"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/png" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/PNG"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/gif" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/GIF"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/jpeg" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/JPEG"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/tiff " || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/tiff"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/tif" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/TIF"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/RAW" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/raw"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/BMP" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/bmp"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/psd" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/eps"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/SVG" || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/svg"
                                        || $_FILES["emprendedor_logo_up_actualizar"]["type"] == "image/AI") {

                                        if ($_FILES['emprendedor_logo_up_actualizar']['size'] < 10485760) {
                                            //  cambiando la imagen logo
                                            $logo = $_POST['imagen_logo_actual'];
                                            $ubicacion = $_FILES["emprendedor_logo_up_actualizar"]["tmp_name"];
                                            $destino = DIRECTORIOPERSONALUP . $logo;
                                            move_uploaded_file($ubicacion, $destino);
                                        } else {
                                            // tamaño demasiado grande
                                            echo "false10";
                                        }
                                    } else {
                                        // tipeo errroneo
                                        echo "false9";
                                    }
                                } else if ($_FILES['emprendedor_foto_personal_up_actualizar']['name'] == "" && $_FILES['emprendedor_foto_personal_up_actualizar']['name'] != "") {
                                    if ($_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/jpg" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/JPG"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/png" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/PNG"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/gif" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/GIF"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/jpeg" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/JPEG"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/tiff " || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/tiff"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/tif" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/TIF"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/RAW" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/raw"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/BMP" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/bmp"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/psd" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/eps"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/SVG" || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/svg"
                                        || $_FILES["emprendedor_foto_personal_up_actualizar"]["type"] == "image/AI") {

                                        if ($_FILES['emprendedor_foto_personal_up_actualizar']['size'] < 10485760) {
                                            //  cambiando la imagen logo
                                            $personalup = $_POST['imagen_logo_actual'];
                                            $ubicacion = $_FILES["emprendedor_foto_personal_up_actualizar"]["tmp_name"];
                                            $destino = DIRECTORIOPERSONALUP . $personalup;
                                            move_uploaded_file($ubicacion, $destino);
                                        } else {
                                            // tamaño demasiado grande
                                            echo "false8";
                                        }
                                    } else {
                                        // tipeo errroneo
                                        echo "false7";
                                    }
                                }
                                if ($_POST['emprendedor_clave_actual'] != "" && $_POST['emprendedor_clave_actualizar'] != "" && $_POST['emprendedor_clave_confirmar'] != "") {
                                    //sql con contraseña
                                    if ($_POST['emprendedor_clave_actualizar'] === $_POST['emprendedor_clave_confirmar']) {
                                        $pass = $this->usuarioModelo->contrasenaExiste($_POST['emprendedor_usuario_actualizar']);
                                        $pass = $pass[0]->clave;
                                        if ($this->encriptarModelo->validar($_POST['emprendedor_clave_actual'], $pass)) {
                                            // aqui va el array para el update
                                            $contrasena = $this->encriptarModelo->encrytando($_POST['emprendedor_clave_confirmar']);
                                            $datos = [
                                                'clave' => $contrasena,
                                                'nombre' => filter_var(trim($_POST['emprendedor_nombre_actualizar']), FILTER_SANITIZE_STRING),
                                                'apellidos' => filter_var(trim($_POST['emprendedor_apellido_actualizar']), FILTER_SANITIZE_STRING),
                                                'correo' => filter_var(trim($_POST['emprendedor_correo_actualizar']), FILTER_SANITIZE_EMAIL),
                                                'direccion' => filter_var($_POST['emprendedor_direccion_actualizar'], FILTER_SANITIZE_EMAIL),
                                                'cedula' => filter_var(trim($_POST['emprendedor_documento_actualizar'])),
                                                'telefono' => filter_var(trim($_POST['emprendedor_telefono_actualizar'])),
                                                'fecha_nacimiento' => filter_var(trim($_POST['emprendedor_fecha_nacimiento_actualizar']), FILTER_SANITIZE_STRING),
                                                'municipio' => filter_var(trim($_POST['emprendedor_municipio_actualizar']), FILTER_SANITIZE_STRING),
                                                'descripcion_unidadp' => filter_var(trim($_POST['emprendedor_descripcion_up_actualizar']), FILTER_SANITIZE_STRING),
                                                'nombre_unidadp' => filter_var(trim($_POST['emprendedor_unidad_productiva_actualizar']), FILTER_SANITIZE_STRING)
                                            ];
                                            if ($this->emprendedorModelo->ActualizarEmprendedor($datos) || $this->usuarioModelo->ActualizarUsuario($datos)) {
                                                echo "true";
                                            } else {
                                                echo "false";
                                            }
                                        } else {
                                            //contraseña actual no concide
                                            echo "false6";
                                        }

                                    } else {
                                        //contraseñas no conciden
                                        echo "false5";
                                    }
                                } else if ($_POST['emprendedor_clave_actual'] == "" && $_POST['emprendedor_clave_actualizar'] == "" && $_POST['emprendedor_clave_confirmar'] == "") {
                                    // aqui se va hacer un sql sin contraseña
                                    $datos = [
                                        'nombre' => filter_var(trim($_POST['emprendedor_nombre_actualizar']), FILTER_SANITIZE_STRING),
                                        'apellidos' => filter_var(trim($_POST['emprendedor_apellido_actualizar']), FILTER_SANITIZE_STRING),
                                        'correo' => filter_var(trim($_POST['emprendedor_correo_actualizar']), FILTER_SANITIZE_EMAIL),
                                        'direccion' => filter_var($_POST['emprendedor_direccion_actualizar'], FILTER_SANITIZE_EMAIL),
                                        'cedula' => filter_var(trim($_POST['emprendedor_documento_actualizar'])),
                                        'telefono' => filter_var(trim($_POST['emprendedor_telefono_actualizar'])),
                                        'fecha_nacimiento' => filter_var(trim($_POST['emprendedor_fecha_nacimiento_actualizar']), FILTER_SANITIZE_STRING),
                                        'municipio' => filter_var(trim($_POST['emprendedor_municipio_actualizar']), FILTER_SANITIZE_STRING),
                                        'descripcion_unidadp' => filter_var($_POST['emprendedor_descripcion_up_actualizar'], FILTER_SANITIZE_STRING),
                                        'nombre_unidadp' => filter_var(trim($_POST['emprendedor_unidad_productiva_actualizar']), FILTER_SANITIZE_STRING)
                                    ];
                                    if ($this->emprendedorModelo->ActualizarEmprendedor($datos)) {
                                        if ($this->usuarioModelo->ActualizarUsuarioSinContraseña($datos)) {
                                            echo "true";
                                        } else {
                                            echo "true";
                                        }
                                    } else {
                                        echo "falseac";
                                    }
                                }
                            } else {
                                // el correo no cuenta con el formato estandar
                                echo "false4";
                            }
                        } else {
                            // el telefono no es un entero
                            echo "false3";
                        }
                        break;
                    default:
                        // error algunos no son string
                        echo "false";
                        break;
                }
            } else {
                // no pueden estar vaciós los campos
                echo "false1";
            }

        } else {
            header('Location:' . RUTA_URL);
        }
    }

    public function crear_producto()
    {
       if (isset($_SESSION['id'])) {
            if (!empty($_POST['producto_documento_emprendedor']) && !empty($_POST['producto_nombre']) &&
                !empty($_POST['producto_nombre_contacto_up']) && !empty($_POST['producto_direccion_up']) &&
                !empty($_POST['producto_telefono_1']) && !empty($_POST['producto_telefono_2']) &&
                !empty($_POST['producto_precio']) && !empty($_POST['producto_categoria']) &&
                !empty($_POST['producto_peso_unidad_medida'])) {
                switch ($_POST['producto_nombre'] && $_POST['producto_nombre_contacto_up'] &&
                    $_POST['producto_direccion_up'] && $_POST['producto_peso_unidad_medida']) {
                    case 'string':
                        if ($this->validarModelo->ValidarCedula($_POST['producto_documento_emprendedor'])) {
                            if ($this->validarModelo->Numero($_POST['producto_documento_emprendedor'])) {
                                $cedula = $this->validarModelo->ValidarEntero($_POST['producto_documento_emprendedor']);
                                $emprendedor = $this->emprendedorModelo->EmprendedorCreado($_POST['producto_documento_emprendedor']);
                                if (!empty($emprendedor)) {
                                    if ($this->validarModelo->ValidarInt($_POST['producto_categoria'])) {
                                        $categoria = $this->validarModelo->ValidarEntero($_POST['producto_categoria']);
                                        if ($this->validarModelo->ValidarInt($_POST['producto_telefono_1'])) {
                                            $telefono1 = $this->validarModelo->ValidarEntero($_POST['producto_telefono_1']);
                                            if ($this->validarModelo->ValidarInt($_POST['producto_telefono_2'])) {
                                                $telefono2 = $this->validarModelo->ValidarEntero($_POST['producto_telefono_2']);
                                                // ----------------------- Imagen Almacenar ------------------------------
                                                $cod_producto = $this->productoModelo->ContadorProducto();
                                                $cod_producto = $cod_producto[0]['count(cod_producto) + 1'];
                                                if (!empty($_FILES)) {
                                                    $archivo = $this->productoModelo->Archivo($cedula);
                                                    $archivo = $archivo[0]['count(cod_producto) + 1'];;
                                                    if ($_FILES["producto_fotografia_principal"]["type"] == "image/jpg" || $_FILES["producto_fotografia_principal"]["type"] == "image/JPG"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/png" || $_FILES["producto_fotografia_principal"]["type"] == "image/PNG"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/gif" || $_FILES["producto_fotografia_principal"]["type"] == "image/GIF"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_principal"]["type"] == "image/JPEG"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/tiff " || $_FILES["producto_fotografia_principal"]["type"] == "image/tiff"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/tif" || $_FILES["producto_fotografia_principal"]["type"] == "image/TIF"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/RAW" || $_FILES["producto_fotografia_principal"]["type"] == "image/raw"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/BMP" || $_FILES["producto_fotografia_principal"]["type"] == "image/bmp"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/psd" || $_FILES["producto_fotografia_principal"]["type"] == "image/eps"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/SVG" || $_FILES["producto_fotografia_principal"]["type"] == "image/svg"
                                                        || $_FILES["producto_fotografia_principal"]["type"] == "image/AI"
                                                    ) {
                                                        if ($_FILES['producto_fotografia_principal']['size'] < 10485760) {
                                                            $nombre = $cedula . $archivo;
                                                            $pdf = $_FILES["producto_fotografia_principal"]["name"];
                                                            $tipo = stristr($pdf, '.');
                                                            $nombre_foto = $nombre . $tipo;
                                                            $ubicacion = $_FILES["producto_fotografia_principal"]["tmp_name"];
                                                            $destino = DIRECTORIO . $nombre_foto;
                                                            move_uploaded_file($ubicacion, $destino);
                                                            //imagen numero 1 funcionalidad
                                                            if ($_FILES['producto_fotografia_1']['name'] != "") {
                                                                if ($_FILES["producto_fotografia_1"]["type"] == "image/jpg" || $_FILES["producto_fotografia_1"]["type"] == "image/JPG"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/png" || $_FILES["producto_fotografia_1"]["type"] == "image/PNG"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/gif" || $_FILES["producto_fotografia_1"]["type"] == "image/GIF"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_1"]["type"] == "image/JPEG"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/tiff " || $_FILES["producto_fotografia_1"]["type"] == "image/tiff"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/tif" || $_FILES["producto_fotografia_1"]["type"] == "image/TIF"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/RAW" || $_FILES["producto_fotografia_1"]["type"] == "image/raw"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/BMP" || $_FILES["producto_fotografia_1"]["type"] == "image/bmp"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/psd" || $_FILES["producto_fotografia_1"]["type"] == "image/eps"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/SVG" || $_FILES["producto_fotografia_1"]["type"] == "image/svg"
                                                                    || $_FILES["producto_fotografia_1"]["type"] == "image/AI") {
                                                                    if ($_FILES['producto_fotografia_1']['size'] < 10485760) {
                                                                        //producto foto 1
                                                                        $pdf = $_FILES["producto_fotografia_1"]["name"];
                                                                        $tipo = stristr($pdf, '.');
                                                                        $nombre_foto1 = "agro" . $cedula . 1 . $archivo . $tipo;
                                                                        $ubicacion = $_FILES["producto_fotografia_1"]["tmp_name"];
                                                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $nombre_foto1;
                                                                        move_uploaded_file($ubicacion, $destino);
                                                                    } else {
                                                                        // son demasiado grande las imagenes
                                                                        echo "false25";
                                                                    }
                                                                } else {
                                                                    //imagen 1 y 4 no cuenta con el tipeo requerido
                                                                    echo "false24";
                                                                }
                                                            } else {
                                                                $nombre_foto1 = "";
                                                            }
                                                            //funcionalidad imagen 2
                                                            if ($_FILES['producto_fotografia_2']['name'] != "") {
                                                                if ($_FILES["producto_fotografia_2"]["type"] == "image/jpg" || $_FILES["producto_fotografia_2"]["type"] == "image/JPG"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/png" || $_FILES["producto_fotografia_2"]["type"] == "image/PNG"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/gif" || $_FILES["producto_fotografia_2"]["type"] == "image/GIF"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_2"]["type"] == "image/JPEG"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/tiff " || $_FILES["producto_fotografia_2"]["type"] == "image/tiff"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/tif" || $_FILES["producto_fotografia_2"]["type"] == "image/TIF"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/RAW" || $_FILES["producto_fotografia_2"]["type"] == "image/raw"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/BMP" || $_FILES["producto_fotografia_2"]["type"] == "image/bmp"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/psd" || $_FILES["producto_fotografia_2"]["type"] == "image/eps"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/SVG" || $_FILES["producto_fotografia_2"]["type"] == "image/svg"
                                                                    || $_FILES["producto_fotografia_2"]["type"] == "image/AI") {
                                                                    if ($_FILES['producto_fotografia_2']['size'] < 10485760) {
                                                                        //producto foto 2
                                                                        $pdf = $_FILES["producto_fotografia_2"]["name"];
                                                                        $tipo = stristr($pdf, '.');
                                                                        $nombre_foto2 = "agro" . $cedula . 2 . $archivo . $tipo;
                                                                        $ubicacion = $_FILES["producto_fotografia_2"]["tmp_name"];
                                                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $nombre_foto2;
                                                                        move_uploaded_file($ubicacion, $destino);
                                                                    } else {
                                                                        // son demasiado grande las imagenes
                                                                        echo "false27";
                                                                    }
                                                                } else {
                                                                    //imagen 2
                                                                    echo "false26";
                                                                }
                                                            } else {
                                                                $nombre_foto2 = "";
                                                            }
                                                            if ($_FILES['producto_fotografia_3']['name'] != "") {
                                                                if ($_FILES["producto_fotografia_3"]["type"] == "image/jpg" || $_FILES["producto_fotografia_3"]["type"] == "image/JPG"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/png" || $_FILES["producto_fotografia_3"]["type"] == "image/PNG"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/gif" || $_FILES["producto_fotografia_3"]["type"] == "image/GIF"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_3"]["type"] == "image/JPEG"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/tiff " || $_FILES["producto_fotografia_3"]["type"] == "image/tiff"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/tif" || $_FILES["producto_fotografia_3"]["type"] == "image/TIF"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/RAW" || $_FILES["producto_fotografia_3"]["type"] == "image/raw"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/BMP" || $_FILES["producto_fotografia_3"]["type"] == "image/bmp"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/psd" || $_FILES["producto_fotografia_3"]["type"] == "image/eps"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/SVG" || $_FILES["producto_fotografia_3"]["type"] == "image/svg"
                                                                    || $_FILES["producto_fotografia_3"]["type"] == "image/AI") {
                                                                    if ($_FILES['producto_fotografia_3']['size'] < 10485760) {
                                                                        //producto foto 3
                                                                        $pdf = $_FILES["producto_fotografia_3"]["name"];
                                                                        $tipo = stristr($pdf, '.');
                                                                        $nombre_foto3 = "agro" . $cedula . 3 . $archivo . $tipo;
                                                                        $ubicacion = $_FILES["producto_fotografia_3"]["tmp_name"];
                                                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $nombre_foto3;
                                                                        move_uploaded_file($ubicacion, $destino);
                                                                    } else {
                                                                        // son demasiado grande las imagenes
                                                                        echo "false29";
                                                                    }
                                                                } else {
                                                                    //imagen 3
                                                                    echo "false28";
                                                                }
                                                            } else {
                                                                $nombre_foto3 = "";
                                                            }
                                                            if ($_FILES['producto_fotografia_4']['name'] != "") {
                                                                if ($_FILES["producto_fotografia_4"]["type"] == "image/jpg" || $_FILES["producto_fotografia_4"]["type"] == "image/JPG"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/png" || $_FILES["producto_fotografia_4"]["type"] == "image/PNG"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/gif" || $_FILES["producto_fotografia_4"]["type"] == "image/GIF"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_4"]["type"] == "image/JPEG"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/tiff " || $_FILES["producto_fotografia_4"]["type"] == "image/tiff"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/tif" || $_FILES["producto_fotografia_4"]["type"] == "image/TIF"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/RAW" || $_FILES["producto_fotografia_4"]["type"] == "image/raw"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/BMP" || $_FILES["producto_fotografia_4"]["type"] == "image/bmp"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/psd" || $_FILES["producto_fotografia_4"]["type"] == "image/eps"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/SVG" || $_FILES["producto_fotografia_4"]["type"] == "image/svg"
                                                                    || $_FILES["producto_fotografia_4"]["type"] == "image/AI") {
                                                                    if ($_FILES['producto_fotografia_4']['size'] < 10485760) {
                                                                        //producto foto 4
                                                                        $pdf = $_FILES["producto_fotografia_4"]["name"];
                                                                        $tipo = stristr($pdf, '.');
                                                                        $nombre_foto4 = "agro" . $cedula . 4 . $archivo . $tipo;
                                                                        $ubicacion = $_FILES["producto_fotografia_4"]["tmp_name"];
                                                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $nombre_foto4;
                                                                        move_uploaded_file($ubicacion, $destino);
                                                                    } else {
                                                                        // son demasiado grande las imagenes
                                                                        echo "false31";
                                                                    }
                                                                } else {
                                                                    //imagen 3
                                                                    echo "false30";
                                                                }
                                                            } else {
                                                                $nombre_foto4 = "";
                                                            }
                                                            $datos = [
                                                                'cod_producto' => filter_var(trim($cod_producto), FILTER_SANITIZE_NUMBER_INT),
                                                                'producto' => filter_var(trim($_POST['producto_nombre']), FILTER_SANITIZE_STRING),
                                                                'promocion_cod_descuento' => 1,
                                                                'emprendedor_cedula' => $cedula,
                                                                'categorias_id_categorias' => $categoria,
                                                                'estado' => 0,
                                                                'nombre_contacto' => filter_var(trim($_POST['producto_nombre_contacto_up']), FILTER_SANITIZE_STRING),
                                                                'direccion' => filter_var($_POST['producto_direccion_up'], FILTER_SANITIZE_STRING),
                                                                'telefono1' => $telefono1,
                                                                'telefono2' => $telefono2,
                                                                'caracteristicas_producto' => filter_var($_POST['producto_caracteristicas_producto'], FILTER_SANITIZE_STRING),
                                                                'producto_peso' => filter_var(trim($_POST['producto_peso']), FILTER_SANITIZE_NUMBER_INT),
                                                                'producto_peso_unidad_medida' => filter_var(trim($_POST['producto_peso_unidad_medida']), FILTER_SANITIZE_STRING),
                                                                'producto_precio' => filter_var(trim($_POST['producto_precio']), FILTER_SANITIZE_NUMBER_INT),
                                                                'producto_ingredientes' => filter_var(trim($_POST['producto_ingredientes']), FILTER_SANITIZE_STRING),
                                                                'producto_descripcion' => filter_var(trim($_POST['producto_descripcion']), FILTER_SANITIZE_STRING),
                                                                'unidad_medida' => filter_var(trim($_POST['producto_peso_unidad_medida']), FILTER_SANITIZE_STRING),
                                                                'fotografia' => $nombre_foto,
                                                                'foto1' => $nombre_foto1,
                                                                'foto2' => $nombre_foto2,
                                                                'foto3' => $nombre_foto3,
                                                                'foto4' => $nombre_foto4,
                                                            ];
                                                            if ($this->productoModelo->InsertarProducto($datos) && $this->fichaComercialModelo->InsertarFichaComercial($datos)) {
                                                                echo "true";
                                                            } else {
                                                                //fallo la inserción
                                                                echo "false9";
                                                            }
                                                    } else {
                                                        // tamaño imagen principal
                                                        echo "false11";
                                                    }
                                                } else {
                                                    // imagen pricipal
                                                    echo "false10";
                                                }
                                            } else {
                                                //files vacio
                                                echo "false9";
                                            }
                                        } else {
                                            //telefono2
                                            echo "false8";
                                        }
                                    } else {
                                        //error telefono1
                                        echo "false7";
                                    }
                                }else {
                                    //producto categoria
                                    echo "false6";
                                }
                            }else {
                                //documento emprendedor
                            echo "false5";
                            }
                        } else {
                            //la cedula no es un entero
                            echo "false4";
                        }
                        }else {
                                // error la cedula es demasiado larga
                                echo "false3";
                            }
                break;
            default:
                echo "false";
                break;
        }
            }else {
                //los campos obligatorios se encuentran vacíos
                echo "false1";
            }
                }else {
                    header('Location:' . RUTA_URL);
     
           }

    }

    public function listar_municipio()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->secret)) {
                $datos = $this->municipioModelo->MostrarMunicipio();
                echo json_encode($datos);
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function listar_categoria()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->secret)) {
                $datos = $this->categoriaModelo->ListarCategoria();
                echo json_encode($datos);
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function identificar_paginacion()
    {

        $objeto = json_decode($_POST['datos']);
        if (!empty($objeto->paginacion)) {
            $final = $objeto->paginacion;
            $inicio = $objeto->paginacion - 6;
            $datos = [
                'inicio' => $inicio,
                'final' => $final
            ];
            $datos = $this->productoModelo->ListarProductoSelecionados($datos);
            echo json_encode($datos);
        } else {
            echo "false";
        }


    }

    public function identificar_categorias_dinamicas()
    {
        $objeto = json_decode($_POST['datos']);
        if (!empty($objeto->secret)) {
            if ($objeto->secret == 1) {
                //es igual a municipios
                $datos = $this->municipioModelo->ListarMunicipio();
                echo json_encode($datos);
            } elseif ($objeto->secret == 2) {
                //es igual a categorias
                $datos = $this->categoriaModelo->ListarCategoria();
                echo json_encode($datos);
            }
        } else {
            echo "false";
        }
    }

    public function cargar_peticion_menu()
    {
        $objeto = json_decode($_POST['datos']);
        if (!empty($objeto->clave) && !empty($objeto->id)) {
            // clave  1 es igual a municipios
            // clave  2 es igual a categorias
            if ($objeto->clave == 1) {
                $indice = $this->productoModelo->ContarProductosMunicipios($objeto->id);

                if ($indice[0]['count(producto.cod_producto)'] > 0) {
                    $divisor = $indice[0]['count(producto.cod_producto)'] / 6;
                    $divisor = ceil($divisor);
                    $data = [
                        'municipios' => $objeto->id,
                        'inicio' => 0,
                        'final' => 6
                    ];
                    $datos = $this->productoModelo->ListarProductosMunicipios($data);
                    for ($i = 1; $i <= $divisor; $i++) {
                        $divisores[] = $i;
                    }
                    $datos = [
                        'datos' => $datos,
                        'divisor' => $divisores,
                        'id_municipio' => $objeto->id
                    ];

                    echo json_encode($datos);
                } else {
                    echo "false";
                }


            } else if ($objeto->clave == 2) {
                $indice = $this->productoModelo->ContarProductosCategorias($objeto->id);
                if ($indice[0]['count(cod_producto)'] > 0) {
                    $divisor = $indice[0]['count(cod_producto)'] / 6;
                    $divisor = ceil($divisor);
                    $data = [
                        'categorias' => $objeto->id,
                        'inicio' => 0,
                        'final' => 6
                    ];
                    $datos = $this->productoModelo->ListarProductosCategoria($data);
                    for ($i = 1; $i <= $divisor;) {
                        $divisores[] = $i;
                        $i++;
                    }

                    $datos = [
                        'datos' => $datos,
                        'divisor' => $divisores,
                        'id_categoria' => $objeto->id
                    ];

                    echo json_encode($datos);
                } else {
                    echo "false";
                }
            }
        } else {
            echo "false;";
        }
    }

    public function filtrar_municipios_menu()
    {
        $objeto = json_decode($_POST['datos']);
        if (!empty($objeto->paginacion) && !empty($objeto->id_municipio)) {
            $final = $objeto->paginacion;
            $inicio = $objeto->paginacion - 6;

            $data = [
                'municipios' => $objeto->id_municipio,
                'inicio' => $inicio,
                'final' => $final
            ];
            $datos = $this->productoModelo->ListarProductosMunicipios($data);
            echo json_encode($datos);
        } else {
            echo "false";
        }
    }

    public function filtar_categorias_menu()
    {
        $objeto = json_decode($_POST['datos']);
        if (isset($_SESSION['id'])) {
            if (!empty($objeto->paginacion) && !empty($objeto->id_categoria)) {
                $final = $objeto->paginacion;
                $inicio = $objeto->paginacion - 6;

                $data = [
                    'categorias' => $objeto->id_categoria,
                    'inicio' => $inicio,
                    'final' => $final
                ];
                $datos = $this->productoModelo->ListarProductosCategoria($data);
                echo json_encode($datos);
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }


    }

    public function descripcion_producto($id)
    {
        if (!empty($id)) {
            $producto = $this->fichaComercialModelo->ImprimirProductoModal($id);
            $this->vista('trastienda/descripcion_producto', $producto);
        } else {
            // el id esta vacio
            echo "false";
        }
    }

    public function filtrar_emprendedor()
    {
        if (isset($_SESSION['id'])) {
            if (isset($_SESSION['id'])) {
                $objeto = json_decode($_POST['datos']);
                if (!empty($objeto->cedula_emprendedor_busqueda)) {
                    if ($this->validarModelo->ValidarInt($objeto->cedula_emprendedor_busqueda)) {
                        $datos = $this->emprendedorModelo->ListadoEmprededor($objeto->cedula_emprendedor_busqueda);
                        echo json_encode($datos);
                    } else {
                        echo "false2";
                    }
                } else {
                    echo "false1";
                }
            } else {
                header('Location:' . RUTA_URL);
            }

        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function eliminar_emprendedor()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->cedula_emprendedor)) {
                if ($this->validarModelo->ValidarInt($objeto->cedula_emprendedor)) {
                    if ($this->emprendedorModelo->EliminarEmprendedor($objeto->cedula_emprendedor)) {
                        echo "true";
                    } else {
                        echo "false";
                    }
                } else {
                    echo "false2";
                }

            } else {
                echo "false3";
            }
        } else {
            header('Location:' . RUTA_URL);
        }


    }

    public function retornar_emprendedor_busqueda()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->documento_emprendedor_busqueda)) {
                if ($this->validarModelo->ValidarInt($objeto->documento_emprendedor_busqueda)) {
                    $emprendedor = $this->emprendedorModelo->MostrarEmprendedor($objeto->documento_emprendedor_busqueda);
                    $municipios = $this->municipioModelo->ListarMunicipio();
                    $datos = [
                        'emprendedor' => $emprendedor,
                        'municipios' => $municipios
                    ];

                    echo json_encode($datos);
                } else {
                    echo "false";
                }
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function retornar_producto_busqueda()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->cedula)) {
                if ($this->validarModelo->ValidarEntero($objeto->cedula)) {
                    $datos = $this->productoModelo->ListarProductosEmprendedor($objeto->cedula);
                    echo json_encode($datos);
                } else {
                    echo "false";
                }
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function retornar_producto_seleccionado()
    {
        if (isset($_SESSION['id'])) {
            $objeto = json_decode($_POST['datos']);
            if (!empty($objeto->codigo_producto && $objeto->ficha)) {
                if ($objeto->ficha == 1) {//es igual a ficha comercial
                    $comercial = $this->fichaComercialModelo->MostrarActualizarFichaComercial($objeto->codigo_producto);
                    $categoria = $this->categoriaModelo->ListarCategoria();
                    $datos = [
                        'comercial' => $comercial,
                        'categoria' => $categoria

                    ];
                    echo json_encode($datos);
                } elseif ($objeto->ficha == 2) {//es igual a ficha tecnica
                    $comercial = $this->fichaTecnicaModelo->MostrarActualizarFichaTecnica($objeto->codigo_producto);
                    $categoria = $this->categoriaModelo->ListarCategoria();
                    $datos = [
                        'comercial' => $comercial,
                        'categoria' => $categoria

                    ];
                    echo json_encode($datos);
                }
            } else {
                echo "false";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function actualizar_ficha_comercial()
    {
        if (isset($_SESSION['id'])) {
            if (!empty($_POST['codigo_producto_ficha_comercial']) && !empty($_POST['producto_documento_emprendedor_actualizar']) &&
                !empty($_POST['producto_nombre_actualizar']) && !empty($_POST['producto_nombre_contacto_up_actualizar']) &&
                !empty($_POST['producto_direccion_up_actualizar']) && !empty($_POST['producto_telefono_1_actualizar']) &&
                !empty($_POST['producto_telefono_2_actualizar']) && !empty($_POST['producto_caracteristicas_actualizar']) &&
                !empty($_POST['producto_peso_actualizar']) && !empty($_POST['producto_peso_unidad_medida_actualizar']) &&
                !empty($_POST['producto_precio_actualizar']) && !empty($_POST['producto_ingredientes_actualizar']) &&
                !empty($_POST['producto_descripcion_actualizar']) && !empty($_POST['producto_categoria_actualizar'])) {

                if ($this->validarModelo->ValidarCedula($_POST['producto_documento_emprendedor_actualizar'])) {

                    if ($this->validarModelo->Numero($_POST['producto_documento_emprendedor_actualizar'])) {
                        $cedula = $this->validarModelo->ValidarEntero($_POST['producto_documento_emprendedor_actualizar']);
                        if ($this->validarModelo->ValidarInt($_POST['producto_categoria_actualizar'])) {
                            $categoria = $this->validarModelo->ValidarEntero($_POST['producto_categoria_actualizar']);
                            if ($this->validarModelo->ValidarInt($_POST['producto_telefono_1_actualizar'])) {
                                $telefono1 = $this->validarModelo->ValidarEntero($_POST['producto_telefono_1_actualizar']);
                                if ($this->validarModelo->ValidarInt($_POST['producto_telefono_2_actualizar'])) {
                                    $telefono2 = $this->validarModelo->ValidarEntero($_POST['producto_telefono_2_actualizar']);
                                    if ($_FILES['producto_fotografia_principal_actualizar']['name'] != "") {
                                        if ($_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/jpg" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/JPG"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/png" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/PNG"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/gif" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/GIF"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/JPEG"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/tiff " || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/tiff"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/tif" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/TIF"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/RAW" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/raw"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/BMP" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/bmp"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/psd" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/eps"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/SVG" || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/svg"
                                            || $_FILES["producto_fotografia_principal_actualizar"]["type"] == "image/AI"
                                        ) {

                                            if ($_FILES['producto_fotografia_principal_actualizar']['size'] < 10485760) {
                                                $principal = 1;
                                            } else {
                                                //demasiado grande la imagen
                                                echo "false16";
                                                die();
                                            }
                                        } else {
                                            // la imagen principal no tipo correcto
                                            echo "false15";
                                            die();
                                        }
                                    }

                                    if ($_FILES['producto_fotografia_1_actualizar']['name'] != "") {
                                        if ($_FILES["producto_fotografia_1_actualizar"]["type"] == "image/jpg" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/JPG"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/png" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/PNG"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/gif" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/GIF"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/JPEG"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/tiff " || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/tiff"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/tif" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/TIF"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/RAW" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/raw"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/BMP" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/bmp"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/psd" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/eps"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/SVG" || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/svg"
                                            || $_FILES["producto_fotografia_1_actualizar"]["type"] == "image/AI"
                                        ) {
                                            if ($_FILES['producto_fotografia_1_actualizar']['size'] < 10485760) {
                                                $img1 = 1;
                                            } else {
                                                //la imagen 1 esta demasiado grande
                                                echo "false14";
                                                die();
                                            }
                                        } else {
                                            // la imagen principal no tipo correcto
                                            echo "false13";
                                            die();
                                        }
                                    }
                                    if ($_FILES['producto_fotografia_2_actualizar']['name'] != "") {
                                        if ($_FILES["producto_fotografia_2_actualizar"]["type"] == "image/jpg" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/JPG"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/png" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/PNG"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/gif" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/GIF"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/JPEG"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/tiff " || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/tiff"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/tif" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/TIF"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/RAW" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/raw"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/BMP" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/bmp"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/psd" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/eps"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/SVG" || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/svg"
                                            || $_FILES["producto_fotografia_2_actualizar"]["type"] == "image/AI"
                                        ) {
                                            if ($_FILES['producto_fotografia_2_actualizar']['size'] < 10485760) {
                                                $img2 = 1;
                                            } else {
                                                //la imagen 1 esta demasiado grande
                                                echo "false12";
                                                die();
                                            }
                                        } else {
                                            // la imagen principal no tipo correcto
                                            echo "false11";
                                            die();
                                        }
                                    }
                                    if ($_FILES['producto_fotografia_3_actualizar']['name'] != "") {
                                        if ($_FILES["producto_fotografia_3_actualizar"]["type"] == "image/jpg" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/JPG"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/png" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/PNG"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/gif" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/GIF"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/JPEG"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/tiff " || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/tiff"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/tif" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/TIF"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/RAW" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/raw"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/BMP" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/bmp"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/psd" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/eps"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/SVG" || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/svg"
                                            || $_FILES["producto_fotografia_3_actualizar"]["type"] == "image/AI"
                                        ) {
                                            if ($_FILES['producto_fotografia_3_actualizar']['size'] < 10485760) {
                                                $img3 = 1;
                                            } else {
                                                //la imagen 1 esta demasiado grande
                                                echo "false10";
                                                die();
                                            }
                                        } else {
                                            // la imagen principal no tipo correcto
                                            echo "false9";
                                            die();
                                        }
                                    }
                                    if ($_FILES['producto_fotografia_4_actualizar']['name'] != "") {
                                        if ($_FILES["producto_fotografia_4_actualizar"]["type"] == "image/jpg" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/JPG"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/png" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/PNG"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/gif" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/GIF"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/jpeg" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/JPEG"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/tiff " || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/tiff"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/tif" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/TIF"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/RAW" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/raw"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/BMP" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/bmp"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/psd" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/eps"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/SVG" || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/svg"
                                            || $_FILES["producto_fotografia_4_actualizar"]["type"] == "image/AI"
                                        ) {
                                            if ($_FILES['producto_fotografia_4_actualizar']['size'] < 10485760) {
                                                $img4 = 1;
                                            } else {
                                                //la imagen 1 esta demasiado grande
                                                echo "false8";
                                                die();
                                            }
                                        } else {
                                            // la imagen principal no tipo correcto
                                            echo "false7";
                                            die();
                                        }
                                    }
                                    //1 puede insertar - 2 no puede insertar
                                    if ($principal == 1) {
                                        $imagenprincipal = $_POST['imagen_logo_actual'];//falta_principal
                                        $ubicacion = $_FILES["producto_fotografia_principal_actualizar"]["tmp_name"];
                                        $destino = DIRECTORIO . $imagenprincipal;
                                        move_uploaded_file($ubicacion, $destino);
                                    }
                                    if ($img1 == 1) {
                                        $foto1 = $_POST['imagen_logo_actual'];//falta_principal
                                        $ubicacion = $_FILES["producto_fotografia_1_actualizar"]["tmp_name"];
                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $foto1;
                                        move_uploaded_file($ubicacion, $destino);
                                    }
                                    if ($img2 == 2) {
                                        $foto2 = $_POST['imagen_logo_actual'];//falta_principal
                                        $ubicacion = $_FILES["producto_fotografia_2_actualizar"]["tmp_name"];
                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $foto2;
                                        move_uploaded_file($ubicacion, $destino);
                                    }
                                    if ($img3 == 1) {
                                        $foto3 = $_POST['imagen_logo_actual'];//falta_principal
                                        $ubicacion = $_FILES["producto_fotografia_3_actualizar"]["tmp_name"];
                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $foto3;
                                        move_uploaded_file($ubicacion, $destino);
                                    }
                                    if ($img4 == 1) {
                                        $foto4 = $_POST['imagen_logo_actual'];//falta_principal
                                        $ubicacion = $_FILES["producto_fotografia_4_actualizar"]["tmp_name"];
                                        $destino = DIRECTORIOPRODUCTOSVINCULADOS . $foto4;
                                        move_uploaded_file($ubicacion, $destino);
                                    }
                                    $datos = [
                                        'cod_producto' => filter_var(trim($_POST['codigo_producto_ficha_comercial']), FILTER_SANITIZE_NUMBER_INT),
                                        'producto' => filter_var(trim($_POST['producto_nombre_actualizar']), FILTER_SANITIZE_STRING),
                                        'emprendedor_cedula' => $cedula,
                                        'categorias_id_categorias' => $categoria,
                                        'nombre_contacto' => filter_var($_POST['producto_nombre_contacto_up_actualizar'], FILTER_SANITIZE_STRING),
                                        'direccion' => filter_var($_POST['producto_direccion_up_actualizar'], FILTER_SANITIZE_STRING),
                                        'telefono1' => $telefono1,
                                        'telefono2' => $telefono2,
                                        'caracteristicas_producto' => filter_var($_POST['producto_caracteristicas_actualizar'], FILTER_SANITIZE_STRING),
                                        'producto_peso' => filter_var(trim($_POST['producto_peso_actualizar']), FILTER_SANITIZE_NUMBER_INT),
                                        'producto_peso_unidad_medida' => filter_var(trim($_POST['producto_peso_unidad_medida_actualizar']), FILTER_SANITIZE_STRING),
                                        'producto_precio' => filter_var(trim($_POST['producto_precio_actualizar']), FILTER_SANITIZE_NUMBER_INT),
                                        'producto_ingredientes' => filter_var($_POST['producto_ingredientes_actualizar'], FILTER_SANITIZE_STRING),
                                        'producto_descripcion' => filter_var(trim($_POST['producto_descripcion_actualizar']), FILTER_SANITIZE_STRING),
                                        'unidad_medida' => filter_var(trim($_POST['producto_peso_unidad_medida_actualizar']), FILTER_SANITIZE_STRING),
                                    ];
                                    if ($this->fichaComercialModelo->ActualizarFichaComercial($datos)) {
                                        if ($this->productoModelo->ActualizarProducto()) {
                                            echo "true2";
                                        } else {
                                            echo "true1";
                                        }
                                    } else {
                                        //error insert
                                        echo "false19";
                                    }
                                } else {
                                    //telefono 2 no es un entero
                                    echo "false6";
                                }
                            } else {
                                //telefono 1 no es un entero
                                echo "false5";
                            }
                        } else {
                            //el producto no es un numero
                            echo "false4";
                        }

                    } else {
                        // cedula no es un entero
                        echo "false3";
                    }

                } else {
                    //cedula mala muy larga
                    echo "false2";
                }

            } else {
                //campos obligatorios vacios
                echo "false1";
            }
        } else {
            header('Location:' . RUTA_URL);
        }
    }


    public function actualizar_ficha_tecnica()
    {
        if (isset($_SESSION['id'])) {
            if (!empty($_POST['codigo_producto_ficha_tecnica'])//
                && !empty($_POST['producto_tipo_presentacion_actualizar'])//
                && !empty($_POST['producto_contenido_presentacion_actualizar'])//
                && !empty($_POST['producto_tipos_presentacion_actualizar'])//
                && !empty($_POST['producto_costo_actualizar'])//
                && !empty($_POST['producto_nombre_tecnico_actualizar'])//
                && !empty($_POST['producto_volumen_produccion_actualizar'])//
                && !empty($_POST['producto_variedad_actualizar'])//
                && !empty($_POST['producto_nombre_cientifico_actualizar'])//
                && !empty($_POST['producto_temperatura_requerida_envio_actualizar'])//
                && !empty($_POST['producto_ntc_relacionada_actualizar'])//
                && !empty($_POST['producto_normas_vinculadas_actualizar'])//
                && !empty($_POST['producto_lotes_promocion_actualizar'])//
                && !empty($_POST['producto_caracteristicas_propias_actualizar'])//
                && !empty($_POST['producto_telefono_1_actualizar'])//
                && !empty($_POST['producto_direccion_actualizar'])
            ) {
                switch ($_POST['producto_tipo_presentacion_actualizar'] && $_POST['producto_contenido_presentacion_actualizar']
                    && $_POST['producto_tipos_presentacion_actualizar'] && $_POST['producto_nombre_tecnico_actualizar']
                    && $_POST['producto_tipos_presentacion_actualizar']
                    && $_POST['producto_volumen_produccion_actualizar'] && $_POST['producto_variedad_actualizar']
                    && $_POST['producto_nombre_cientifico_actualizar'] && $_POST['producto_temperatura_requerida_envio_actualizar']
                    && $_POST['producto_ntc_relacionada_actualizar'] && $_POST['producto_normas_vinculadas_actualizar']
                    && $_POST['producto_lotes_promocion_actualizar'] && $_POST['producto_caracteristicas_propias_actualizar']
                ) {
                    case 'string':
                        if ($this->validarModelo->ValidarInt($_POST['codigo_producto_ficha_tecnica'])) {
                            $cod_producto = $this->validarModelo->ValidarEntero($_POST['codigo_producto_ficha_tecnica']);
                            if ($this->validarModelo->ValidarInt($_POST['producto_costo_actualizar'])) {
                                $costo = $this->validarModelo->ValidarEntero($_POST['producto_costo_actualizar']);
                                if ($this->validarModelo->ValidarInt($_POST['producto_telefono_1_actualizar'])) {
                                    $numero = $this->validarModelo->ValidarEntero($_POST['producto_telefono_1_actualizar']);
                                    $datos = [
                                        'cod_producto' => $cod_producto,
                                        'producto' => filter_var(trim($_POST['producto_nombre_tecnico_actualizar']), FILTER_SANITIZE_STRING),
                                        'tipo_presentacion' => filter_var(trim($_POST['producto_tipo_presentacion_actualizar']), FILTER_SANITIZE_STRING),
                                        'contenido_presentacion' => filter_var(trim($_POST['producto_contenido_presentacion_actualizar']), FILTER_SANITIZE_STRING),
                                        'tipos_presentaciones' => filter_var(trim($_POST['producto_tipos_presentacion_actualizar']), FILTER_SANITIZE_STRING),
                                        'costo' => $costo,
                                        'nombre_producto' => filter_var(trim($_POST['producto_nombre_tecnico_actualizar']), FILTER_SANITIZE_STRING),
                                        'volumen_produccion' => filter_var(trim($_POST['producto_volumen_produccion_actualizar']), FILTER_SANITIZE_STRING),
                                        'variedad_producto' => filter_var(trim($_POST['producto_variedad_actualizar']), FILTER_SANITIZE_STRING),
                                        'nombre_cientifico' => filter_var(trim($_POST['producto_nombre_cientifico_actualizar']), FILTER_SANITIZE_STRING),
                                        'temperatura_requerida_envio' => filter_var(trim($_POST['producto_temperatura_requerida_envio_actualizar']), FILTER_SANITIZE_STRING),
                                        'ntc_relacionada' => filter_var(trim($_POST['producto_ntc_relacionada_actualizar']), FILTER_SANITIZE_STRING),
                                        'normas_vinculadas' => filter_var(trim($_POST['producto_normas_vinculadas_actualizar']), FILTER_SANITIZE_STRING),
                                        'lotes_promocion' => filter_var(trim($_POST['producto_lotes_promocion_actualizar']), FILTER_SANITIZE_STRING),
                                        'caracteristicas_propias' => filter_var(trim($_POST['producto_caracteristicas_propias_actualizar']), FILTER_SANITIZE_STRING),
                                        'telefono1' => $numero,
                                        'telefono2' => filter_var(trim($_POST['producto_telefono_2_actualizar'])),
                                        'direccion' => filter_var($_POST['producto_direccion_actualizar']),
                                    ];
                                    $tecnica = $this->fichaTecnicaModelo->ListarFichaTecnicaReferenciada($cod_producto);
                                    if ($tecnica[0]->nombre == $datos['producto'] && $tecnica[0]->tipo_presentacion == $datos['tipo_presentacion']
                                        && $tecnica[0]->contenido_presentacion == $datos['contenido_presentacion'] && $tecnica[0]->contenido_presentacion == $datos['contenido_presentacion']
                                        && $tecnica[0]->tipos_presentaciones == $datos['tipos_presentaciones'] && $tecnica[0]->costo == $datos['costo']
                                        && $tecnica[0]->nombre_producto == $datos['nombre_producto'] && $tecnica[0]->volumen_produccion == $datos['volumen_produccion']
                                        && $tecnica[0]->variedad_producto == $datos['variedad_producto'] && $tecnica[0]->nombre_cientifico == $datos['nombre_cientifico']
                                        && $tecnica[0]->temperatura_requerida_envio == $datos['temperatura_requerida_envio'] && $tecnica[0]->ntc_relacionada == $datos['ntc_relacionada']
                                        && $tecnica[0]->normas_vinculadas == $datos['normas_vinculadas'] && $tecnica[0]->lotes_promocion == $datos['lotes_promocion']
                                        && $tecnica[0]->caracteristicas_propias == $datos['caracteristicas_propias'] && $tecnica[0]->telefono1 == $datos['telefono1']
                                        && $tecnica[0]->telefono2 == $datos['telefono2'] && $tecnica[0]->direccion == $datos['direccion']
                                    ) {
                                        if ($this->fichaTecnicaModelo->ActualizarFichaTecnica($datos)) {
                                            echo "true";
                                        } else {
                                            //error a hacer el insert
                                            echo "false7";
                                        }
                                    } else {
                                        //no hay nada que modificar
                                        echo "true";
                                    }
                                } else {
                                    //telefono 1 no es un numero
                                    echo "false5";
                                }


                            } else {
                                //costo vulnerado
                                echo "false4";
                            }
                        } else {
                            //codigo del producto vulnerado
                            echo "false3";
                        }


                        break;
                    default:
                        echo "false2";
                        break;

                }
            } else {
                //faltan algunos numeros
                echo "false1";
            }
        } else {
            header('Location:' . RUTA_URL);
        }

    }

    public function cerrar_sesion()
    {
        $this->sesionModelo->closeSession();
        header('Location:' . RUTA_URL); //Aqui redirijo porque no existe la session
    }

    public function regresar_inicio()
    {
        header('Location:' . RUTA_URL);
    }
}
