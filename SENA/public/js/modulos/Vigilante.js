const RUTA_URL = "http://localhost/SENA/ContVigilante/";
var listarVigilante = function () {
    var tabla = $("#MiTablita").DataTable({
        ajax: {
            url: RUTA_URL + "LlenarVigilante",
            dataSrc: "",
        },
        columns: [
            { data: "Cedula_Vigilante"},
            { data: "Nombre"},
            { data: "Apellido"},
            { data: "Turno"},
            { defaultContent: "<button type='button' class='editar btn btn-primary'> <i class='material-icons'> edit </i></button>" },
            { defaultContent: "<button type='button' class='eliminar btn btn-danger'> <i class='material-icons'> delete </i></button>"},
        ],
    });
    editar("#MiTablita tbody", tabla);
    eliminar("#MiTablita tbody", tabla);

};

var Crear = function () {
    $("#RegistrarVigilante").on("click", function () {
        mostrarForm(true);
    });
};

var mostrarForm = function (estado) {
    if (estado) {
        $("#formulario").show();
        $("#TablitaVigilante").hide();
        $("#formularioEditar").hide();

    } else {
        $("#formulario").hide();
        $("#TablitaVigilante").show();
        $("#formularioEditar").hide();

    }
};
var mostrarFormEditar = function (estado) {
  if (estado) {
      $("#formulario").hide();
      $("#TablitaVigilante").hide();
      $("#formularioEditar").show();

  } else {
      $("#formulario").hide();
      $("#TablitaVigilante").show();
      $("#formularioEditar").hide();

  }
};

var cancelar = function () {
    $("#cancelar").on("click", function () {
        limpiar();
        mostrarForm(false);

        $("#MiTablita").DataTable().ajax.reload();
    });
};

var limpiar = function () {
    $("#idvigilante").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#turno").val("");
};
var guardar = function(){
    $("#formRegistrar").on("submit", function(e){
        e.preventDefault();
        var formulario = $('#formRegistrar')[0];
        var datos = new FormData(formulario);
        $.ajax({
            url: RUTA_URL + "RegistrarVigilante",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Vigilante agregado");
                $('#formulario').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaVigilante').show();
                console.log(data);

            })
            .fail(function(data){
                alert("Error ");
            });
    });
};

var guardarEditar = function(){
    $("#formEditar").on("submit", function(e){
        e.preventDefault();
        var formularioEditar = $('#formEditar')[0];
        var datos = new FormData(formularioEditar);
        $.ajax({
            url: RUTA_URL + "EditarVigilante",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Vigilante Editado");
                $('#formularioEditar').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaVigilante').show();
                console.log(data);

            })
            .fail(function(data){
                alert("Error ");
            });
    });
};
var editar = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {

        var datos = table.row($(this).parents("tr")).data();
        mostrarFormEditar(true);
        $("#idvigilante2").val(datos.Cedula_Vigilante);
        $("#nombre2").val(datos.Nombre);
        $("#apellido2").val(datos.Apellido);
        $("#turno2").val(datos.Turno);
    });
};
var cancelarEditar = function () {
    $("#cancelarEditar").on("click", function () {
        limpiarEditar();
        mostrarForm(false);
        $("#MiTablita").DataTable().ajax.reload();
    });
};

var limpiarEditar = function () {
    $("#idvigilante2").val("");
    $("#nombre2").val("");
    $("#apellido2").val("");
    $("#turno2").val("");

};

var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
        var data = table.row($(this).parents("tr")).data();
        var respuesta = confirm("Seguro que desea eliminar el vigilante : " + data.Nombre+" "+data.Apellido+ " Con la identificacion de: "+ data.Cedula_Vigilante);
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "BorrarVigilante",
                data: { idvigilante: data.Cedula_Vigilante},
            })
                .done(function (data) {
                    alert("Accion Realizada con exito !");
                    $("#MiTablita").DataTable().ajax.reload();
                })
                .fail(function (data) {
                    alert("operacion fallida !");
                });
        } else {
            alert("Operacion cancelada por el usuario");
        }
    });
};
$(document).ready(function () {
    listarVigilante();
    Crear();
    cancelar();
    cancelarEditar();
    guardar();
    editar();
    limpiar();
    guardarEditar();
    limpiarEditar();
    eliminar();
    mostrarForm(false);
    mostrarFormEditar(false);
});