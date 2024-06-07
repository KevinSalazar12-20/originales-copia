
const RUTA_URL = "http://localhost/SENA/ContEquipo/";
var listarEquipos = function () {
    var tabla = $("#MiTablita").DataTable({
        ajax: {
            url: RUTA_URL + "LlenarEquipo",
            dataSrc: "",
        },
        columns: [
            { data: "idEquipo"},
            { data: "Serial_Equipo"},
            { data: "Hora_Entrada"},
            { data: "Hora_Salida"},
            { data: "Aprendiz_Cedula_Aprendiz"},
            { data: "Visitante_Cedula_Visitante"},
            { defaultContent: "<button type='button' class='editar btn btn-primary'> <i class='material-icons'> edit </i></button>" },
            { defaultContent: "<button type='button' class='eliminar btn btn-danger'> <i class='material-icons'> delete </i></button>"},
        ],
    });
    editar("#MiTablita tbody", tabla);
    eliminar("#MiTablita tbody", tabla);

};

var Crear = function () {
    $("#RegistrarEquipos").on("click", function () {
        mostrarForm(true);
    });
};

var mostrarForm = function (estado) {
    if (estado) {
        $("#formulario").show();
        $("#TablitaEquipos").hide();
        $("#formularioEditar").hide();

    } else {
        $("#formulario").hide();
        $("#TablitaEquipos").show();
        $("#formularioEditar").hide();

    }
};
var mostrarFormEditar = function (estado) {
  if (estado) {
      $("#formulario").hide();
      $("#TablitaEquipos").hide();
      $("#formularioEditar").show();

  } else {
      $("#formulario").hide();
      $("#TablitaEquipos").show();
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
    $("#idequipo").val("");
    $("#serial").val("");
    $("#horaentrada").val("");
    $("#horasalida").val("");
    $("#idaprendiz").val("");
    $("#idvisitante").val("");
};
var guardar = function(){
    $("#formRegistrar").on("submit", function(e){
        e.preventDefault();
        var formulario = $('#formRegistrar')[0];
        var datos = new FormData(formulario);
        $.ajax({
            url: RUTA_URL + "RegistrarEquipo",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Equipo agregado");
                $('#formulario').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaEquipos').show();
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
            url: RUTA_URL + "EditarEquipo",
            method: "POST",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function(data){
                alert("Equipo Editado");
                $('#formularioEditar').hide();
                $("#MiTablita").DataTable().ajax.reload();
                $('#TablitaEquipos').show();
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
        $("#idequipo2").val(datos.idEquipo);
        $("#serial2").val(datos.Serial_Equipo);
        $("#horaentrada2").val(datos.Hora_Entrada);
        $("#horasalida2").val(datos.Hora_Salida);
        $("#idaprendiz2").val(datos.Aprendiz_Cedula_Aprendiz);
        $("#idvisitante2").val(datos.Visitante_Cedula_Visitante);
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
    $("#idequipo2").val("");
    $("#serial2").val("");
    $("#horaentrada2").val("");
    $("#horasalida2").val("");
    $("#idaprendiz2").val("");
    $("#idvisitante2").val("");

};

var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
        var data = table.row($(this).parents("tr")).data();
        var respuesta = confirm("Seguro que desea eliminar el equipo : " + data.idEquipo+" Serial "+data.Serial_Equipo+ " Con la identificacion de: "+ data.Aprendiz_Cedula_Aprendiz);
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "BorrarEquipo",
                data: { idequipo: data.idEquipo},
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
    listarEquipos();
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