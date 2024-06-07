const RUTA_URL = "http://localhost:8080/agrovirtual/Emprendedor/";

var listarEmprendedores = function () {
    var tabla = $("#mitablaemp").DataTable({
      ajax: {
        url: RUTA_URL + "llenarTablaEmprendedores",
        dataSrc: "",
      },
      columns: [
        {
          defaultContent:
            "<button type='button' class ='editar btn btn-secundary' data-toggle='tooltip' data-placement='top' title='Edita un cliente'> <i class='icon-edit'></i></button>",
        },
        {
          defaultContent:
            "<button type='button' class ='eliminar btn btn-secondary' data-toggle='tooltip' data-placement='top' title='Elimina un cliente'> <i class='icon-trash'></i></button>",
        },
        {
          data: "nombre",
        },
        {
          data: "apellidos",
        },
        {
          data: "direccion",
        },
        {
          data: "telefono",
        },
        {
          data: "fecha_nacimiento",
        },
      ],
      columnDefs: [
        {
          width: "5%",
          targets: 0,
        },
        {
          width: "5%",
          targets: 1,
        },
        {
          width: "8%",
          targets: 2,
        },
        {
          width: "5%",
          targets: 3,
        },
        {
          width: "5%",
          targets: 4,
        },
        {
          width: "5%",
          targets: 5,
        },
      ],
    });
    editar("#mitablaemp tbody", tabla);
    eliminar("#mitablaemp tbody", tabla);
  };
  
  var nuevo = function () {
    $("#nuevoemprendedor").on("click", function () {
      limpiar();
      mostrarForm(true);
    });
  };
  
  var editar = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
      var dato = table.row($(this).parents("tr")).data();
      mostrarForm(true);
      var id = $("#idusuariosena").val(dato.idUsuarioSena)
      var dni = $("#TioCc").val(dato.Ti_o_Cc);
      var nombre = $("#nombre").val(dato.nombre);
      var apellido = $("#apellido").val(dato.apellido);
      var correo = $("#email").val(dato.correo);
      var telefono = $("#telefono").val(dato.telefono);
      var cargo = $("#cargo").val(dato.cargo);
    });
  };
  
  var guardar = function () {
    $("form").on("submit", function (e) {
      e.preventDefault();
      var datos = new FormData($("form")[0]);
      $.ajax({
        method: "POST",
        url: RUTA_URL + "crearUsuarioS",
        data: datos,
        processData: false,
        contentType: false,
      })
        .done(function (data) {
          alert("Accion Realizada con exito !");
          mostrarForm(false);
          $("#mitablaemp").DataTable().ajax.reload();
        })
        .fail(function (data) {
          alert("operacion fallida !");
          mostrarForm(false);
        });
    });
  };
  
  var limpiar = function () {
    $("#TioCc").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#cargo").val("");
  };
  
  var cancelar = function () {
    $("#cancelar").on("click", function () {
      limpiar();
      mostrarForm(false);
      $("#mitablaemp").DataTable().ajax.reload();
    });
  };
  
  var mostrarForm = function (estado) {
    if (estado) {
      $("#crearemprendedor").show();
      $("#tablaemp").hide();
    } else {
      $("#crearemprendedor").hide();
      $("#tablaemp").show();
    }
  };
  
  var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
      var dato = table.row($(this).parents("tr")).data();
      var respuesta = confirm(
        "Seguro que desea eliminar la cedula: " +
          dato.cedula
          
      );
      if (respuesta) {
        $.ajax({
          method: "POST",
          url: RUTA_URL + "eliminaremprendedor",
          data: { id: dato.cedula },
        })
          .done(function (data) {
            alert(data);
            $("#mitablaemp").DataTable().ajax.reload();
  
          })
          .fail(function (data) {
            alert("operacion fallida !");
          });
      } else {
        alert("Operacion cancelada por el usuario.");
      }
    });
  };
  
  $(document).ready(function () {
    
    listarEmprendedores();
    mostrarForm(false);
    nuevo();
    editar();
    eliminar();
    guardar();
    cancelar();
    limpiar();
    
  });
  