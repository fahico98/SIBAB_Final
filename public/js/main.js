(function($) {
    var form = $("#signup-form");
    form.validate({errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    },
    rules: {
        primer_nombre: {
            required: true,
            lettersonly: true,
        },
        segundo_nombre: {
            lettersonly: true,
        },
        primer_apellido: {
            required: true,
            lettersonly: true,
        },
        segundo_apellido: {
            lettersonly: true,
        },
        documento_identidad: {
            required: true,
            integer: true,
            number: true,
            min: 1,
        },
        expiry_date: {
            required: true,
        },
        expiry_month: {
            required: true,
        },
        expiry_year: {
            required: true,
        },
        Dia_fele: {
            required: true,
        },
        Mes_fele: {
            required: true,
        },
        year_fele: {
            required: true,
        },
        Dia_fech: {
            required: true,
        },
        Mes_fech: {
            required: true,
        },
        year_fech: {
            required: true,
        },
        celular: {
            required: true,
            integer: true,
            number: true,
            min: 1,
        },
        telefono_fijo: {
            integer: true,
            number: true,
            min: 1,
        },
        direccion: {
            required: true,
        },
        estrato: {
            required:true,
        },
        lugar_nacimiento: {
            required: true,
        },
        centro_formacion: {
            required: true,
        },
        lugar_expedicion: {
            required: true,
        },
        id_tipo_documento: {
            required: true,
        },
        id_genero: {
            required: true,
        },
        estado_civil: {
            required: true,
        },
        area: {
            required: true,
        },
        barrio: {
            required: true,
            letterswithbasicpunc: true,
        },
        id_municipios: {
            required: true,
        },
        email: {
            email: true,
            required: true,
        },
        nombre_contacto: {
            required: true,
            letterswithbasicpunc: true,
        },
        telefono_contacto: {
            required: true,
            integer: true,
            number: true,
            min: 1,
        },
        nombre_programa: {
            required: true,
            letterswithbasicpunc: true,
        },
        numero_ficha: {
            required: true,
            integer: true,
            number: true,
            min: 1,
        },
        trimestre: {
            required: true,
        },
        instructor: {
            required: true,
            letterswithbasicpunc: true,
        },
        ocupacion: {
            required: true,
            letterswithbasicpunc: true,
        },
        cantidad: {
            required: true,
            number: true,
            min: 1,
            max: 70,
        },
        info_hijos: {
            required: true,
        },
        tipo_vivienda: {
            required: true,
            letterswithbasicpunc: true,
        },
        id_informacion_socioeconomica: {
            required: true,
        },
        eps: {
            required: true,
            letterswithbasicpunc: true,
        },
        id_tipo_eps: {
            required: true,
        },
        id_regimen: {
            required: true,
        },
        puntaje_sisben: {
            required: true,
            number: true,
            min: 1,
        },
        otros: {
            required: true,
            letterswithbasicpunc: true,
        },
        monitor: {
            required: true,
        },
        patrocinio: {
            required: true,
        },
        beneficio: {
            required: true,
        },
        proyecto_productivo: {
            required: true,
        },
        condicionamiento: {
            required: true,
        },
        uniparental: {
            required: true,
        },
        red_unidos: {
            required: true,
        },
        jovenes_en_accion: {
            required: true,
        },
        victima_conflicto: {
            required: true,
        },
        discapacitado: {
            required: true,
        },
        desplazado: {
            required: true,
        },
        km_desplazamiento: {
            required: true,
        },
        cabeza_familia: {
            required: true,
        },
        vocero: {
            required: true,
        },
        liderazgo_voluntariado: {
            required: true,
        },
        dedicacion_estudio: {
            required: true,
        },
        fecha_inicio: {
            required: true,
        },
        fecha_terminacion: {
            required: true,
        },
        jornada: {
            required: true,
        },
        horario_formacion: {
            required: true,
        },
        horas_centro_formacion: {
            required: true,
        },
        tipo_formacion: {
            required: true,
        },
        certificado_sofia: {
            required: true,
        },
        copia_documento: {
            required: true,
        },
        copia_servicio_publico: {
            required: true,
        },
    },
    messages : {
        primer_nombre: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            lettersonly: 'Solo letras y sin espacios <i class="zmdi zmdi-info"></i>'
        },
        segundo_nombre: {
            lettersonly: 'Solo letras y sin espacios <i class="zmdi zmdi-info"></i>',
        },
        primer_apellido: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            lettersonly: 'Solo letras y sin espacios <i class="zmdi zmdi-info"></i>'
        },
        segundo_apellido: {
            lettersonly: 'Solo letras y sin espacios <i class="zmdi zmdi-info"></i>',
        },
        documento_identidad: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            integer: 'Solo números enteros <i class="zmdi zmdi-info"></i>',
            number: 'Solo números <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 1 <i class="zmdi zmdi-info"></i>',
        },
        expiry_date: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        expiry_month: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        expiry_year: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        Dia_fele: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        Mes_fele: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        year_fele: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        Dia_fech: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        Mes_fech: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        year_fech: {
            required: '<br><i class="zmdi zmdi-info"></i>',
        },
        celular: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            integer: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            number: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 1 <i class="zmdi zmdi-info"></i>'
        },
        telefono_fijo: {
            integer: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            number: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 1 <i class="zmdi zmdi-info"></i>'
        },
        direccion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        estrato: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        lugar_nacimiento: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        centro_formacion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        lugar_expedicion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        id_tipo_documento: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        id_genero: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        estado_civil: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        area: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        barrio: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras <i class="zmdi zmdi-info"></i>'
        },
        id_municipios: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        email: {
            email: 'Por favor ingrese un correo valido <i class="zmdi zmdi-info"></i>',
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        nombre_contacto: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras <i class="zmdi zmdi-info"></i>'
        },
        telefono_contacto: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            integer: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            number: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 1 <i class="zmdi zmdi-info"></i>'
        },
        nombre_programa: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras <i class="zmdi zmdi-info"></i>'
        },
        numero_ficha: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            integer: 'Solo numeros enteros<i class="zmdi zmdi-info"></i>',
            number: 'Solo numeros enteros <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 1 <i class="zmdi zmdi-info"></i>'
        },
        trimestre: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        instructor: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras<i class="zmdi zmdi-info"></i>'
        },
        ocupacion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras<i class="zmdi zmdi-info"></i>'
        },
        cantidad: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            number: 'Solo numeros <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 0 <i class="zmdi zmdi-info"></i>',
            max: 'Ingrese un valor menor a 70 <i class="zmdi zmdi-info"></i>'
        },
        info_hijos: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        tipo_vivienda: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras <i class="zmdi zmdi-info"></i>'
        },
        id_informacion_socioeconomica: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        eps: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras <i class="zmdi zmdi-info"></i>'
        },
        id_tipo_eps: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        id_regimen: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        puntaje_sisben: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            number:  'Solo numeros <i class="zmdi zmdi-info"></i>',
            min: 'Ingrese un valor mayor a 1 <i class="zmdi zmdi-info"></i>'
        },
        otros: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
            letterswithbasicpunc: 'Solo letras <i class="zmdi zmdi-info"></i>'
        },
        monitor: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        patrocinio: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        beneficio: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        proyecto_productivo: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        condicionamiento: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        uniparental: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        red_unidos: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        jovenes_en_accion: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        victima_conflicto: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        discapacitado: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        desplazado: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        km_desplazamiento: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        cabeza_familia: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        vocero: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        liderazgo_voluntariado: {
            required: '<i class="zmdi zmdi-info"></i>'
        },
        dedicacion_estudio: {
            required: '<label style="position:absolute; color:red; font-size:11px; left:85px;">Llene el campo <i class="zmdi zmdi-info"></i></label>'
        },
        fecha_inicio: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>',
        },
        fecha_terminacion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        jornada: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        horario_formacion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        horas_centro_formacion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        tipo_formacion: {
            required: 'Llene el campo <i class="zmdi zmdi-info"></i>'
        },
        certificado_sofia: {
            required: '<div class="row" style="margin-left: -85px"><div style="padding-top: 20px; padding-right: 97px;">Seleccione un archivo <i class="zmdi zmdi-info"></div></i></div>'
        },
        copia_documento: {
            required: '<div class="row" style="margin-left: -85px"><div style="padding-top: 20px; padding-right: 97px;">Seleccione un archivo <i class="zmdi zmdi-info"></div></i></div>'
        },
        copia_servicio_publico: {
            required: '<div class="row" style="margin-left: -85px"><div style="padding-top: 20px; padding-right: 97px;">Seleccione un archivo <i class="zmdi zmdi-info"></div></i></div>'
        },

    },
    onfocusout: function(element) {
        $(element).valid();
    },
});
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    labels: {
        previous: 'Atras',
        next: 'Siguiente',
        finish: 'Enviar',
        current: ''
    },
    titleTemplate: '<div class="title"><span class="number">#index#</span>#title#</div>',
    onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
            // console.log(form.steps("getCurrentIndex"));
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.submit();
        },
        onFinished: function(event, currentIndex) {
            alert('Sumited');
        },
    });

jQuery.extend(jQuery.validator.messages, {
    required: "",
    remote: "",
    url: "",
    date: "",
    dateISO: "",
    number: "",
    digits: "",
    creditcard: "",
    equalTo: ""
});

$.dobPicker({
    daySelector: '#expiry_date',
    monthSelector: '#expiry_month',
    yearSelector: '#expiry_year',
    dayDefault: 'DD',
    monthDefault: 'MM',
    yearDefault: 'YYYY',
    minimumAge: 14,
    maximumAge: 50,
});

$.dobPicker({
    daySelector: '#Dia_fele',
    monthSelector: '#Mes_fele',
    yearSelector: '#year_lec',
    dayDefault: 'DD',
    monthDefault: 'MM',
    yearDefault: 'YYYY',
    minimumAge: 0,
    maximumAge: 1,
});

$.dobPicker({
    daySelector: '#expiry_dat',
    monthSelector: '#expiry_mont',
    yearSelector: '#year_end',
    dayDefault: 'DD',
    monthDefault: 'MM',
    yearDefault: 'YYYY',
    minimumAge: -2,
    maximumAge: 2,
});

$('#button').click(function () {
    $('#certificado_sofia').trigger('click');
});

$('#certificado_sofia').change(function () {
    $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
});

$('#btn').click(function () {
    $('#copia_documento').trigger('click');
});

$('#copia_documento').change(function () {
    $('#valor').text(this.value.replace(/C:\\fakepath\\/i, ''))
});

$('#btncsp').click(function () {
    $('#copia_servicio_publico').trigger('click');
});

$('#copia_servicio_publico').change(function () {
    $('#valorcsp').text(this.value.replace(/C:\\fakepath\\/i, ''))
});

})(jQuery);