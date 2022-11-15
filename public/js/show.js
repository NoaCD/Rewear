$(document).ready(function () {
    $('#tabs-1').show();
    $('#tabs-2').hide();

    $('#ordenes').click(function () {
        $('#tabs-1').show();
        $('#tabs-2').hide();
    });

    $('#cuenta').click(function () {
        $('#tabs-1').hide();
        $('#tabs-2').show();
        $('#tabs-3').show();
    });

});

$(document).ready(function () {
    $('#f-emprendedor').show();
    $('#f-asociacion').hide();
    $('#f-distribuidor').hide();

    $('#emprendedor').click(function () {
        $('#f-emprendedor').show();
        $('#f-asociacion').hide();
        $('#f-distribuidor').hide();
    });

    $('#asociacion').click(function () {
        $('#f-emprendedor').hide();
        $('#f-asociacion').show();
        $('#f-distribuidor').hide();
    });

    $('#distribuidor').click(function () {
        $('#f-emprendedor').hide();
        $('#f-asociacion').hide();
        $('#f-distribuidor').show();
    });

    $('#btnSendEmail').click(function () {
         // Formar objeto
        let formulario = {
            'nombres': $("#nombres").val(),
            'apellidos': $("#apellidos").val(),
            'ciudad': $("#ciudad").val(),
            'correo': $("#email").val(),
            'telefono': $("#telefono").val(),
            'nombreEmpresa' : $("#nombreEmpresa").val() != '' ? $("#nombreEmpresa").val(): 'Sin empresa'
        };

        if ($("#f-emprendedor").is(":visible")) {
            // Inputs del esta seccion
            formulario.tipoFigura = 'emprendedor';
            formulario.giroProyecto = $("#emp_giroProyecto").val() != '' ? $("#emp_giroProyecto").val() : 'Sin respuesta';
            formulario.plan = $("#emp_plan").val() != '' ? $("#emp_plan").val() : 'Sin respuesta';
        }

        if ($("#f-asociacion").is(":visible")) { // Inputs del esta seccion
            formulario.tipoFigura = 'asociacion';
            formulario.dedicaAsociacion = $("#aso_dedicaAsociacion").val() != '' ? $("#aso_dedicaAsociacion").val()  : 'Sin respuesta';
            formulario.cantidadPersonas = $("#aso_cantidadPersonas").val() != '' ?  $("#aso_cantidadPersonas").val() : 'Sin respuesta';
            formulario.tipoApoyo = $("#aso_tipoApoyo").val() != '' ? $("#aso_tipoApoyo").val() : 'Sin respuesta';

        }

        if ($("#f-distribuidor").is(":visible")) { // Inputs del esta seccion
            formulario.tipoFigura = 'distribuidor';
            formulario.cantidadPlayeras = $("#dist_cantidadPlayeras").val() != '' ? $("#dist_cantidadPlayeras").val() : 'Sin respuesta';
            formulario.frecuenciaCompra = $("#dist_frecuenciaCompra").val() != '' ? $("#dist_frecuenciaCompra").val() : 'Sin respuesta';
            formulario.colorInteresado = $("#dist_colorInteresado").val()  != ''  ? $("#dist_colorInteresado").val()  : 'Sin respuesta';
        }


        if (validarObjeto(formulario)) {
            // Enviar info al controlador
            fetch("/api/v1/process-email", {
                method: "POST",
                body: JSON.stringify(formulario),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }
            })
            .then(response => response.json())
            .then(json => alert( json.response ) , vaciarCampos() );
        }

    });


    /**
     * Form formulario a validar
     */
    function validarObjeto(form = {}) {
        if (form.nombres.length === 0) {
            alert("El nombre es obligatorio")
            $("#nombres").focus();
            return;
        }
        if (form.apellidos.length === 0) {
            alert("El apellido es obligatorio")
            $("#apellidos").focus();
            return;
        }
        if (form.telefono.length === 0) {
            alert("El telefono es obligatorio")
            $("#telefono").focus();
            return;
        }
        if (form.ciudad.length === 0) {
            alert("La ciudad es obligatorio")
            $("#ciudad").focus();
            return;
        }
        if (form.correo.length === 0) {
            alert("El correo electronico es obligatorio")
            $("#email").focus();
            return;
        }
        return true;
    }

    //**Vacia los inpouts del formulario */
    function vaciarCampos(){
        $("#dist_colorInteresado").val('');
        $("#dist_frecuenciaCompra").val('');
        $("#dist_cantidadPlayeras").val('');
        $("#aso_tipoApoyo").val('');
        $("#aso_cantidadPersonas").val('');
        $("#aso_dedicaAsociacion").val('');
        $("#emp_plan").val('');
        $("#emp_giroProyecto").val('');
        $("#nombres").val('');
        $("#apellidos").val('');
        $("#ciudad").val('');
        $("#email").val('');
        $("#telefono").val('');
        $("#nombreEmpresa").val('');

    }


});
$(document).ready(function () {
    $('#mostrar-planes').hide();
    $('#cancelar-aumento').hide();

    $('#aumentar-planes').click(function () {
        $('#mostrar-planes').show();
        $('#cancelar-aumento').show();
    });

    $('#cancelar-aumento').click(function () {
        $('#mostrar-planes').hide();
        $('#cancelar-aumento').hide();
    });

});

