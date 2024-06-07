const RUTA_URL = "http://localhost:8080/agrovirtual/Municipio/";

var listarMunicipios = function () {
    var tabla = $("#mitablamunic").DataTable({
      ajax: {
        url: RUTA_URL + "llenarTablaMunicipios",
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
          data: "id_municipio",
        },
        {
          data: "nombre",
        },
        {
          data: "departamento",
        },
        {
          data: "estado",
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
        {
          width: "5%",
          targets: 3,
        },
      ],
    });
    editar("#mitablamunic tbody", tabla);
    eliminar("#mitablamunic tbody", tabla);
  };
  
  var nuevo = function () {
    $("#nuevomunicipio").on("click", function () {
      limpiar();
      mostrarForm(true);
    });
  };
  
  var editar = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
      var dato = table.row($(this).parents("tr")).data();
      mostrarForm(true);
      var id = $("#idmuni").val(dato.id_municipio)
      var nombre = $("#nombre_municipio").val(dato.nombre);
      var depar = $("#departamento").val(dato.departamento);
      
    });
  };
  
  var guardar = function () {
    $("form").on("submit", function (e) {
      e.preventDefault();
      var datos = new FormData($("form")[0]);
      $.ajax({
        method: "POST",
        url: RUTA_URL + "registrarmunicipios",
        data: datos,
        processData: false,
        contentType: false,
      })
        .done(function (data) {
          alert(data);
          mostrarForm(false);
          $("#mitablamunic").DataTable().ajax.reload();
        })
        .fail(function (data) {
          alert(data);
          mostrarForm(false);
        });
    });
  };
  
  var limpiar = function () {
    $("#idmuni").val("");
    $("#nombre_municipio").val("");
    $("#departamento").val("");
    
  };
  
  var cancelar = function () {
    $("#cancelar").on("click", function () {
      limpiar();
      mostrarForm(false);
      $("#mitablamunic").DataTable().ajax.reload();
    });
  };
  
  var mostrarForm = function (estado) {
    if (estado) {
      $("#formulariomunicipio").show();
      $("#tablamunici").hide();
    } else {
      $("#formulariomunicipio").hide();
      $("#tablamunici").show();
    }
  };
  
  var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
      var dato = table.row($(this).parents("tr")).data();
      var respuesta = confirm(
        "Seguro que desea eliminar : " +
          dato.id_municipio 
          
      );
      if (respuesta) {
        $.ajax({
          method: "POST",
          url: RUTA_URL + "eliminarmunicipio",
          data: { id: dato.id_municipio },
        })
          .done(function (data) {
            alert(data);
            $("#mitablamunic").DataTable().ajax.reload();
  
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
    
    listarMunicipios();
    mostrarForm(false);
    nuevo();
    editar();
    eliminar();
    guardar();
    cancelar();
    limpiar();
    
  });
  