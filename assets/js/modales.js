/*
 * jQuery Create Modals plugin 1.0.0
 * 
 * Tic Consultores S.A de C.V
 *
 * DOM:
 * <div id="modalQuestion">
 * </div>
 * 
 *
 * se puede establecer cualquier identificador definido
 * por el usuario. Pero tiene como predeterminado "modalQuestion"
 *
 * Uso 1 Estandar:
 * 
 * Se usa con el Dom mencionado anteriormente
 * ejemplo:
 *
 * $(document).ready(function () {
 * 		$(document).Modales({ Tipo: "Exito"});
 * });
 *
 * Uso 2 Presonalizando:
 *
 * se usa con la misma estructura del dom, solo se pasa los valores 
 * personalizadas, ejemplo:
 *
 * $(document).ready(function () {
 *     $(document).Modales({
 *		DivId: "modalQuestion",
 *		Tipo: "Confirmar",
 *		Titulo: "Confirmar Eliminación",
 *		Mensaje: "Se eliminara el elemento seleccionado. ¿Desea continuar?",
 *		UrlRegresar: "",
 *		UrlContinuar: "http://localhost:9090/miaplicacion/modulo/eliminar.php",
 *       zindex: "9999"
 *	  });
 * });
 *
 *Los tipos de modl que se pueden mostrar son:
 *Exito, Advertencia, Info, Error, Confirmar, ExitoAccion
 *
 *
 */
(function($) {
    $.fn.Modales = function(opciones) {
        var predetermindado = {
            //DivId        : 'modalQuestion',
            Tipo: 'Confirmar',
            Titulo: '',
            Mensaje: '',
            UrlRegresar: "#",
            UrlContinuar: "#",
            zindex: '9999',
            Textobtn1: "Aceptar",
            Textobtn2: "Cancelar"
        }
        var configuraciones = $.extend(predetermindado, opciones);
        return this.each(function() {
            _Modal(configuraciones);
        });

        function _Modal(config) {
            //console.log(config);
            var estilo = "",
                clase = "",
                boton1 = "",
                boton2 = "",
                visiblebtn1 = "",
                visiblebtn2 = "",
                textobtn1 = config.Textobtn1,
                textobtn2 = config.Textobtn2,
                txtStyle = "";

            switch (config.Tipo) {
                case "Error":
                    estilo = "color: #fff; background-color: #d9534f; border-color: #d43f3a;";
                    clase = "fa fa-times-circle fa-2x";
                    boton1 = "btn-danger";
                    boton2 = "btn-default";
                    txtStyle = "text-danger";
                    visiblebtn2 = "display: none;";
                    if (config.Titulo == '') config.Titulo = "Error";
                    if (config.Mensaje == '') config.Mensaje = "¡Ocurrio un problema al procesar la solicitud!";
                    break;
                case "Info":
                    estilo = "color: #fff; background-color: #5bc0de; border-color: #46b8da;";
                    clase = "fa fa-exclamation-circle fa-2x";
                    boton1 = "btn-info";
                    boton2 = "btn-default";
                    txtStyle = "text-info";
                    visiblebtn2 = "display: none;";
                    if (config.Titulo == '') config.Titulo = "Información";
                    if (config.Mensaje == '') config.Mensaje = "";
                    break;
                case "Advertencia":
                    estilo = " color: #fff; background-color: #f0ad4e; border-color: #eea236;";
                    clase = "fa fa-exclamation-triangle fa-2x";
                    boton1 = "btn-warning";
                    boton2 = "btn-default";
                    txtStyle = "text-warning";
                    visiblebtn2 = "display: none;";
                    if (config.Titulo == '') config.Titulo = "Advertencia";
                    if (config.Mensaje == '') config.Mensaje = "";
                    break;
                case "Exito":
                    estilo = "color: #fff; background-color: #5cb85c; border-color: #4cae4c;";
                    clase = "fa fa-check-circle fa-2x";
                    boton1 = "btn-success";
                    boton2 = "btn-default";
                    txtStyle = "text-success";
                    visiblebtn2 = "display: none;";
                    if (config.Titulo == '') config.Titulo = "Éxito";
                    if (config.Mensaje == '') config.Mensaje = "¡Se realizó la operacion con éxito!";
                    break;
                case "ExitoAccion":
                    estilo = "color: #fff; background-color: #5cb85c; border-color: #4cae4c;";
                    clase = "fa fa-check-circle fa-2x";
                    boton1 = "btn-success";
                    boton2 = "btn-primary";
                    txtStyle = "text-success";
                    if (config.Titulo == '') config.Titulo = "Éxito";
                    if (config.Mensaje == '') config.Mensaje = "¡Se realizó la operacion con éxito!";
                    if (textobtn2 == 'Cancelar' || textobtn2 == '') textobtn2 = "Regresar";
                    if (textobtn1 == 'Aceptar' || textobtn1 == '') textobtn1 = "Nuevo";
                    break;
                default:
                    estilo = "color: #fff; background-color: #0B486B;";
                    clase = "fa fa-exclamation-circle fa-2x";
                    boton1 = "btn-primary";
                    boton2 = "btn-danger";
                    if (config.Titulo == '') config.Titulo = 'Confirmar Eliminación';
                    if (config.Mensaje == '') config.Mensaje = 'Se eliminara el elemento seleccionado. ¿Desea continuar?';
                    break;
            }

            var idMod = $('body').find("div#modalDialog").attr("id");
            if (!idMod)
                $('body').append('<div id="modalDialog"></div>');

            var modal = $("#modalDialog");

            if (modal.hasClass("in")) {
                $("MensajeQuestion").append(config.Mensaje);
            } else {
                modal.attr("class", "modal fade");
                modal.attr("tabindex", "-1");
                modal.attr("role", "dialog");
                modal.attr("aria-labelledby", "exampleModalLabel");
                modal.attr('z-index', config.zindex);
                modal.html('<div class="modal-dialog modal-md" role="document">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header" style="' + estilo + 'padding-top:10px;padding-bottom:10px;">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none;">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '<h4 class="modal-title" id="QuestionTitle">' + config.Titulo + '</h4>' +
                    '</div>' +
                    '<div class="modal-body">' +
                    '<div class="row">' +
                    '<div class="col-md-1 text-center"><span class="' + clase + ' ' + txtStyle + '"></span></div>' +
                    '<div class="col-md-11 text-mensaje-modal" style="text-align:justify; padding-left: 0px;">' +
                    '<p class="' + txtStyle + '" id="MensajeQuestion">' + config.Mensaje + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="modal-footer" style="padding-top:10px;padding-bottom:10px;>' +
                    '<div class="row">' +
                    '<div class="col-md-3 col-sm-3 col-xs-6 col-md-offset-6 col-sm-offset-6">' +
                    '<a class="btn ' + boton2 + ' btn-sm btn-block" style="' + visiblebtn2 + '" id="btnNo">' + textobtn2 + '</a>' +
                    '</div>' +
                    '<div class="col-md-3 col-sm-3 col-xs-6">' +
                    '<a class="btn ' + boton1 + ' btn-sm btn-block" style="' + visiblebtn1 + '" id="btnSi">' + textobtn1 + '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
                //<button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" id="btnNo">Cancelar</button>
                //modal.mensaje.html('');//<button type="button" class="btn btn-default btn-modal btn-sm btn-block" id="btnSi">Aceptar</button>
                //alert(config.Ruta);
                //$(".liga").attr("href", config.Ruta);
                if (config.UrlContinuar == "#") $("#btnSi").attr("data-dismiss", "modal");
                else if (config.UrlContinuar.indexOf("fn") != -1) {
                    $("#btnSi").on("click", function(e) {
                        eval(config.UrlContinuar);
                        fn();
                        modal.modal("hide");
                    });
                } else $("#btnSi").attr("href", config.UrlContinuar); //.attr("onclick","");

                if (config.UrlRegresar == "#") $("#btnNo").attr("data-dismiss", "modal");
                else if (config.UrlRegresar.indexOf("fn") != -1) {
                    $("#btnNo").on("click", function(e) {
                        eval(config.UrlRegresar);
                        fn();
                        modal.modal("hide");
                    });
                } else $("#btnNo").attr("href", config.UrlRegresar);

                modal.modal({
                    show: true,
                    backdrop: 'static'
                });

                var dialog = $(modal).find('.modal-dialog');
                dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 4));
                //modal.css("overflow-y", "auto");
            }
        }
    }
})(jQuery);

$(document).ready(function($) {
    window.VerMensajes = function(tipo, titulo, mensaje, accion1, accion2) {
        if (tipo == '') return;
        if (accion1 == '') accion1 = "#";
        if (accion2 == '') accion2 = "#";
        if (titulo == '') titulo = "Titulo";
        if (mensaje == '') mensaje = "Mensaje";

        $(document).Modales({
            Tipo: tipo,
            Titulo: titulo,
            Mensaje: mensaje,
            UrlContinuar: accion1,
            UrlRegresar: accion2,
            zindex: "999999"
        });
    }
});