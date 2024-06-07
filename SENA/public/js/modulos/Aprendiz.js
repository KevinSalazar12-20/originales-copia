
const RUTA_URL = "http://localhost/SENA/ContAprendiz/";
var listarAprendiz = function () {
    var tabla = $("#MiTablita").DataTable({
        ajax: {
            url: RUTA_URL + "LlenarAprendiz",
            dataSrc: "",
        },
        columns: [
            { data: "Cedula_Aprendiz"},
            { data: "Nombre"},
            { data: "Apellido"},
            { data: "Ficha"},
            { defaultContent: "<button type='button' class='editar btn btn-primary'> <i class='material-icons'> edit </i></button>" },
            { defaultContent: "<button type='button' class='eliminar btn btn-danger'> <i class='material-icons'> delete </i></button>"},
        ],
    });
    editar("#MiTablita tbody", tabla);
    eliminar("#MiTablita tbody", tabla);

};

var Crear = function () {
    $("#RegistrarAprendiz").on("click", function () {
        mostrarForm(true);
    });
};

var mostrarForm = function (estado) {
    if (estado) {
        $("#formulario").show();
        $("#TablitaAprendiz").hide();
        $("#formularioEditar").hide();

    } else {
        $("#formulario").hide();
        $("#TablitaAprendiz").show();
        $("#formularioEditar").hide();

    }
};
var mostrarFormEditar = function (estado) {
  if (estado) {
      $("#formulario").hide();
      $("#TablitaAprendiz").hide();
      $("#formularioEditar").show();

  } else {
      $("#formulario").hide();
      $("#TablitaAprendiz").show();
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
    $("#id").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#ficha").val("");
    $("#cedvigilante").val("");
};
var guardar = function(){
    $("#formRegistrar").on("submit", function(e){
        e.preventDefault();
        var formulario = $('#formRegistrar')[0];
        var datos = new FormData(formulario);
        $.ajax({
            url: RUTA_URL + "RegistrarAprendiz",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Aprendiz agregado");
                $('#formulario').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaAprendiz').show();
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
            url: RUTA_URL + "EditarAprendiz",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Aprendiz Editado");
                $('#formularioEditar').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaAprendiz').show();
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
        $("#id2").val(datos.Cedula_Aprendiz);
        $("#nombre2").val(datos.Nombre);
        $("#apellido2").val(datos.Apellido);
        $("#ficha2").val(datos.Ficha);
        $("#cedvigilante2").val(datos.Vigilantes_Cedula_Vigilante);

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
    $("#id2").val("");
    $("#nombre2").val("");
    $("#apellido2").val("");
    $("#ficha2").val("");
    $("#cedvigilante2").val("");

};

var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
        var data = table.row($(this).parents("tr")).data();
        var respuesta = confirm("Seguro que desea eliminar el aprendiz : " + data.Nombre+" "+data.Apellido+ " Con la identificacion de: "+ data.Cedula_Aprendiz);
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "BorrarAprendiz",
                data: { id: data.Cedula_Aprendiz},
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
    listarAprendiz();
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