
const RUTA_URL = "http://localhost/SENA/ContVisitante/";
var listarVisitante = function () {
    var tabla = $("#MiTablita").DataTable({
        ajax: {
            url: RUTA_URL + "LlenarVisitante    ",
            dataSrc: "",
        },
        columns: [
            { data: "Cedula_Visitante"},
            { data: "Nombre"},
            { data: "Apellido"},
            { defaultContent: "<button type='button' class='editar btn btn-primary'> <i class='material-icons'> edit </i></button>" },
            { defaultContent: "<button type='button' class='eliminar btn btn-danger'> <i class='material-icons'> delete </i></button>"},
        ],
    });
    editar("#MiTablita tbody", tabla);
    eliminar("#MiTablita tbody", tabla);

};

var Crear = function () {
    $("#RegistrarVisitante").on("click", function () {
        mostrarForm(true);
    });
};

var mostrarForm = function (estado) {
    if (estado) {
        $("#formulario").show();
        $("#TablitaVisitante").hide();
        $("#formularioEditar").hide();

    } else {
        $("#formulario").hide();
        $("#TablitaVisitante").show();
        $("#formularioEditar").hide();

    }
};
var mostrarFormEditar = function (estado) {
  if (estado) {
      $("#formulario").hide();
      $("#TablitaVisitante").hide();
      $("#formularioEditar").show();

  } else {
      $("#formulario").hide();
      $("#TablitaVisitante").show();
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
    $("#idvisitante").val("");
    $("#nombre").val("");
    $("#apellido").val("");
};
var guardar = function(){
    $("#formRegistrar").on("submit", function(e){
        e.preventDefault();
        var formulario = $('#formRegistrar')[0];
        var datos = new FormData(formulario);
        $.ajax({
            url: RUTA_URL + "RegistrarVisitante",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Visitante agregado");
                $('#formulario').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaVisitante').show();
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
            url: RUTA_URL + "EditarVisitante",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Visitante Editado");
                $('#formularioEditar').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaVisitante').show();
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
        $("#idvisitante2").val(datos.Cedula_Visitante);
        $("#nombre2").val(datos.Nombre);
        $("#apellido2").val(datos.Apellido);
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
    $("#idvisitante2").val("");
    $("#nombre2").val("");
    $("#apellido2").val("");
};

var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
        var data = table.row($(this).parents("tr")).data();
        var respuesta = confirm("Seguro que desea eliminar el Visitante : " + data.Nombre+" "+data.Apellido+ " Con la identificacion de: "+ data.Cedula_Visitante);
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "BorrarVisitante",
                data: { idvisitante: data.Cedula_Visitante},
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
    listarVisitante();
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