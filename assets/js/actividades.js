$(document).ready(function () {
    //console.log(window.location.href);
    validarPagina();
    function validarPagina() {
        var pags = window.location.href.split('/');
        pags = jQuery.grep(pags, function (n) { return (n); });
        var pg = (pags[pags.length - 1]).replace("#", "");
        $(".menuprincipal ul li a").removeClass("activo");
        $("#" + pg +" a").addClass("activo");
        if(pg == "uploadfile"){
            ListarArchivos();
        }
    }

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        //dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        yearRange: "-100:+0"
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    $('.fecha').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy"
    });

    $(document).on("click", ".MostrarCalendario", function () {
        var cajaTexto = $(this).closest('.input-group').find('input[type=text]').attr('id');
        //console.log(cajaTexto);
        $('#' + cajaTexto).datepicker('show', {
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        });
    });

    function ListarArchivos(){
        try {
            $.ajax({
                data: '',
                type: "POST",
                url: "uploadfile/readFiles",
                error: function (jqXHR, textStatus, errorThrown) {
                    $(document).Modales({
                        Tipo: "Error",
                        Titulo: "Error",
                        Mensaje: errorThrown,
                        UrlContinuar: "#",
                        zindex: "9999"
                    });
                },
                success: function (response) {
                    //console.log(response);
                    var resp = JSON.parse(response);
                    var table = $("#tblArchivos tbody");
                    
                    if(resp.length == 0){
                        table.html('<tr><td colspan="3" style="text-align:center;">NO EXISTE INFORMACIÓN PARA MOSTRAR</td></tr>');
                        return;    
                    }
                    
                    table.html('');
                    $(resp).each(function(i, item){
                        //console.log(item);
                        var row = '<tr>';
                        row += '<td>'+ (i + 1) +'</td>';
                        row += '<td>'+ item.Nombre +'</td>';
                        row += '<td><a href="'+ item.Url +
                               '" download class="fa fa-download fa-lg descargar"></a>'+
                               '<a href="#" data-url="" class="fa fa-trash-o fa-lg eliminar" id="'+ item.Nombre +'"></a></td>';
                        row += '</tr>';
                        table.append(row);
                    });
                }
            });
        } catch (ex) {
            alert(ex);   
        }
    }

    $(document).on("click", ".eliminar", function(e){
        confirm("¿Desea eliminar la imagen?");
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "uploadfile/deleteFile" , true);
        var Datos = "file=" + $(this).attr("id");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                alert(xhttp.responseText);
                ListarArchivos();
            }
        };
        xhttp.send(Datos);
        e.preventDefault();
    });

    $(document).on("change", "input:file", function(e){
        try{
            /*var files = new Array();
            $(event.target.files).each(function(i, file){
                var reader = new FileReader();
                reader.onload = function(){
                    var archivo = new Object()
                    archivo.name = file.name;
                    archivo.type = file.type;
                    archivo.file = reader.result.split("base64,")[1];
                    archivo.size = file.size;
                    //console.log(JSON.stringify(archivo));
                    files.push(archivo);
                };
                reader.readAsDataURL(file);
            });
            console.log(files);
            var jsonArray = JSON.stringify(files);
            console.log(jsonArray);*/
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(){
                var archivo = new Object()
                archivo.name = file.name;
                archivo.type = file.type;
                archivo.file = reader.result.split("base64,")[1];
                archivo.size = file.size;
                $("#files").val(JSON.stringify(archivo));
            };
            reader.readAsDataURL(file);
        }
        catch(ex){
            alert(ex);
        }
    });

    $(document).on("click", "#btnSubir", function(e){
        try {
            var Datos = JSON.parse($("#files").val());
            console.log(Datos);
            $.ajax({
                data: Datos,
                type: "POST",
                url: "uploadfile/uploadFiles",
                error: function (jqXHR, textStatus, errorThrown) {
                    $(document).Modales({
                        Tipo: "Error",
                        Titulo: "Error",
                        Mensaje: errorThrown,
                        UrlContinuar: "#",
                        zindex: "9999"
                    });
                },
                success: function (response) {
                    console.log(response);
                    ListarArchivos();
                }
            });
        } catch (ex) {
            alert(ex);   
        }
        e.preventDefault();
    });
});