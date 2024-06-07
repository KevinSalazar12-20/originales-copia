const RUTA_URL = "http://localhost:8080/agrovirtual/Categoria/";

var listarCategorias = function () {
    var tabla = $("#mitablacateg").DataTable({
      ajax: {
        url: RUTA_URL + "llenarTablaCategoria",
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
          data: "id_categoria",
        },
        {
          data: "nombre",
        },
        {
          data: "descripcion",
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
          width: "5%",
          targets: 2,
        },
      ],
    });
    editar("#mitablacateg tbody", tabla);
    eliminar("#mitablacateg tbody", tabla);
  };
  
  var nuevo = function () {
    $("#nuevacategoria").on("click", function () {
      limpiar();
      mostrarForm(true);
    });
  };
  
  var editar = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
      var dato = table.row($(this).parents("tr")).data();
      mostrarForm(true);
      var id = $("#id_categorias").val(dato.id_categoria)
      var nombre = $("#nombre").val(dato.nombre);
      var descripcion = $("#descripcion").val(dato.descripcion);
    });
  };
  
  var guardar = function () {
    $("form").on("submit", function (e) {
      e.preventDefault();
      var datos = new FormData($("form")[0]);
      $.ajax({
        method: "POST",
        url: RUTA_URL + "nuevaCategoria",
        data: datos,
        processData: false,
        contentType: false,
      })
        .done(function (data) {
          alert("Accion Realizada con exito !");
          mostrarForm(false);
          $("#mitablacateg").DataTable().ajax.reload();
        })
        .fail(function (data) {
          alert("operacion fallida !");
          mostrarForm(false);
        });
    });
  };
  
  var limpiar = function () {
    $("#id_categoria").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
  };
  
  var cancelar = function () {
    $("#cancelar").on("click", function () {
      limpiar();
      mostrarForm(false);
      $("#mitablacateg").DataTable().ajax.reload();
    });
  };
  
  var mostrarForm = function (estado) {
    if (estado) {
      $("#crearcategoria").show();
      $("#tablacateg").hide();
    } else {
      $("#crearcategoria").hide();
      $("#tablacateg").show();
    }
  };
  
  var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
      var dato = table.row($(this).parents("tr")).data();
      var respuesta = confirm(
        "Seguro que desea eliminar la categoria: " +
          dato.id_categoria 
      );
      if (respuesta) {
        $.ajax({
          method: "POST",
          url: RUTA_URL + "eliminarCategoria",
          data: { id: dato.id_categoria },
        })
          .done(function (data) {
            alert("Accion Realizada con exito !");
            $("#mitablacateg").DataTable().ajax.reload();
  
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
    
    listarCategorias();
    mostrarForm(false);
    nuevo();
    editar();
    eliminar();
    guardar();
    cancelar();
    limpiar();
    
  });
  