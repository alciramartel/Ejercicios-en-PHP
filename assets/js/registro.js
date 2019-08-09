$(document).ready(function($){
	$(document).on("click", "#btnPerfil", function(e){
		var msj = validateForm();
		if(msj.length > 0){
			$(document).Modales({
	            Tipo: "Error",
	            Titulo: "Error",
	            Mensaje: msj,
	            UrlContinuar: "#",
	            zindex: "9999"
	        });
	        e.preventDefault();
	        return;
		}

		var file = document.getElementById('perfil').files[0];

		var Datos = {
            "Matricula": $("#matricula").val(),
            "Nombre": $("#nombre").val(),
            "Apellido": $("#apellido").val(),
            "Password":$("#password").val(),
            "Correo": $("#correo").val(),
            "Sitio": $("#website").val(),
            "Descripcion": $("#descripcion").val(),
            "file": $("#avatar").attr("src").split("base64,")[1],
            "filename": file.name
        };
        
        $.ajax({
            data: Datos,
            type: "POST",
            url: "registro/guardar",
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
                alert(response);
            }
        });
		e.preventDefault();
	});
	function validateForm(){
		var msj = "";
		if($("#matricula").val().length == 0) msj += 'Ingrese Matricula<br/>';
		if($("#nombre").val().length == 0) msj += 'Ingrese Nombre<br/>';
		if($("#apellido").val().length == 0) msj += 'Ingrese Apellido<br/>';
		if($("#password").val().length == 0) msj += 'Ingrese Contraseña<br/>';
		else if($("#password").val() != $("#cnfmpwd").val()) msj += 'La conformación de contraseña no coincide<br/>';
		if($("#correo").val().length == 0) msj += 'Ingrese Correo<br/>';
		else if(!validateEmail($("#correo").val())) msj += 'Ingrese correo válido<br/>';
		else if($("#correo").val() != $("#cnfmcorreo").val()) msj += 'La confirmación de correo no coincide<br/>';
		return msj;
	}
	
	function validateEmail(email) {
    	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	return re.test(String(email).toLowerCase());
	}
	$(document).on("change", "input:file", function(e){
		var reader = new FileReader();
		if(reader == null ||  reader == undefined) return;
	    reader.onload = function(){
	      var output = document.getElementById('avatar');
	      output.src = reader.result;
	    };
	    reader.readAsDataURL(event.target.files[0]);
	});
});