    $( "#regForm" ).validate({
           rules: {
                  tituloProyecto: {
                           required: true,
                           minlength: 7,
                           maxlength: 40
                   },
                   nombreSolicitante: {
                           required: true,
                           minlength: 10,
                           maxlength: 40
                   },
                   localidadSolicitante: {
                           required: true,
                           maxlength: 40
                   },
                   agenciaProyecto: {
                           required: true,
                           minlength: 3,
                           maxlength: 40
                   },
                   montoSolicitado: {
                        required: true,
                        minStrict: 50000,
                        maxStrict: 125000,
                        number: true
                    },
                   descEmprendimiento: {
                           required: true,
                           minlength: 20,
                           maxlength: 254
                   },
                   nombreEmprendedor: {
                           required: true,
                           minlength: 7,
                           maxlength: 40
                   },
                   dniEmprendedor: {
                           required: true
                   },
                   localidadEmprendedor: {
                           required: true,
                           maxlength: 40
                   },
                   domicilioEmprendedor: {
                           required: true,
                           maxlength: 40
                   },
                   telefonoEmprendedor: {
                           required: true,
                           maxlength: 13
                   },
                   emailEmprendedor: {
                           required: true,
                           maxlength: 40
                   },
                   facebookEmprendedor: {
                           required: false,
                           maxlength: 40
                   },
                   gradoInstruccion: {
                           required: true
                   },
                   otraOcupacion: {
                           required: false,
                           maxlength: 40
                   },
                   ingresoMensual: {
                           required: false
                   },
                   deseoCapacitacion: {
                           required: false,
                           maxlength: 40
                   }
           },
           messages: {
                  tituloProyecto: {
                           //required: "Por favor, ingrese el título del proyecto.",
                           required: "",
                           minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   nombreSolicitante: {
                           required: "",
                           minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   localidadSolicitante: {
                           required: "",
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   agenciaProyecto: {
                           required: "",
                           minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   montoSolicitado: {
                           required: "",
                           minStrict: $.format("Se solicita un mínimo de ${0}"),
                           maxStrict: $.format("El monto máximo solicitado puede ser de ${0}")
                   },
                   descEmprendimiento: {
                           required: "Por favor, escriba una breve descripción sobre su proyecto.",
                           minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   nombreEmprendedor: {
                           required: "",
                           minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   dniEmprendedor: {
                           required: ""
                   },
                   localidadEmprendedor: {
                           required: "",
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   domicilioEmprendedor: {
                           required: "",
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   telefonoEmprendedor: {
                           required: "",
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   emailEmprendedor: {
                           required: "",
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   facebookEmprendedor: {
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   gradoInstruccion: {
                           required: "REQUERIDO"
                   },
                   otraOcupacion: {
                           maxlength: $.format("{0} caracteres son demasiados!")
                   },
                   deseoCapacitacion: {
                           maxlength: $.format("{0} caracteres son demasiados!")
                   }
           }
   });