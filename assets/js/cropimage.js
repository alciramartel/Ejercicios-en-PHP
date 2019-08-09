$(window).load(function () { 
	 leerImagenes();
});
$(document).ready(function(){
	var imgw = 0, imgh = 0, tmpw = 150, tmph = 150, file = undefined;
	
	window.leerImagenes = function(){
		try {
			$.ajax({
	            data: '',
	            type: "POST",
	            url: "cropimage/readImages",
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
		    		var table = $("#recortes tbody");
		    		
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

		    		$(".eliminar").click(function(e){
						confirm("¿Desea eliminar la imagen?");
						var xhttp = new XMLHttpRequest();
						xhttp.open("POST", "cropimage/deleteImage" , true);
						var Datos = "file=" + $(this).attr("id");
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.onreadystatechange = function() {
						    if (xhttp.readyState == 4 && xhttp.status == 200) {
						      	alert(xhttp.responseText);
						      	leerImagenes();
						    }
						};
						xhttp.send(Datos);
						e.preventDefault();
					});
	            }
	        });
		} catch (ex) {
		 	alert(ex);   
		}
	}
	
	function preview(img, selection) { 
        var scaleX = tmpw / selection.width; 
        var scaleY = tmph / selection.height; 
        
        $('#rimagen').css({ 
            width: Math.round(scaleX * imgw) + 'px', 
            height: Math.round(scaleY * imgh) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
        });
        $('#x1').val(selection.x1);
        $('#y1').val(selection.y1);
        $('#x2').val(selection.x2);
        $('#y2').val(selection.y2);
        $('#w').val(selection.width);
        $('#h').val(selection.height);
    }
    
    $('#imagen').imgAreaSelect({
        aspectRatio: '1:' + tmph/tmpw, 
        onSelectChange: preview 
    }); 

    $("#file").change(function(e){
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('imagen');
          var output2 = document.getElementById('rimagen');
          output.src = reader.result;
          output2.src = reader.result;
          //$(output).css("display", "none");
          $(output2).css("display", "block");
        };
        
        file = event.target.files[0];
        imgh = file.height;
        imgw = file.width;
        reader.readAsDataURL(event.target.files[0]);
        //console.log(imgt);
    });

    $("#subir").click(function(e){
		//var file = document.getElementById('file').files[0];
		if (file != undefined) {
			var Datos = {
	            "file": $("#imagen").attr("src").split("base64,")[1],
	            "name": file.name,
	            "type": file.type,
	            "size": file.size
	        };
	        
	        $.ajax({
	            data: Datos,
	            type: "POST",
	            url: "cropimage/uploadImage",
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
	            	try {
					    var resp = JSON.parse(response);
					    console.log(resp);
					    if(resp.Codigo != 200){
		                	alert(resp.Mensaje);
		                }
		                else{
		                	$("#rimagen").attr("src", resp.Imagen);
		                	$("#imagen").attr("src", resp.Imagen);
		                	$("#imagen").css({
		                		"display": "block",
		                		"width": resp.width,
		                		"height": resp.height
		                	});
		                	$("#rimagen").css("display","block");
		                	imgw = resp.Width;
		                	imgh = resp.Height;
		                }
					} catch (ex) {
					 	alert(ex);   
					}
	            }
	        });
    	}
		e.preventDefault();
	});

	$("#guardar").click(function(e){
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		//var file = document.getElementById('file').files[0];
		//console.log("guardar clicked");
		//console.log(file);
		if(file == undefined) return false;
		
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Premero debe de selecionar el área.");
			return false;
		}
		
		var Datos = {
            "file": $("#rimagen").attr("src").split("base64,")[1],
            "name": file.name,
            "type": file.type,
            "size": file.size,
            "x1": x1,
            "y1": y1,
            "x2": x2,
            "y2": y2,
            "w": w,
            "h": h
        };
        
        //console.log("Sending to server.");
        $.ajax({
            data: Datos,
            type: "POST",
            url: "cropimage/cropImage",
            error: function (jqXHR, textStatus, errorThrown) {
               alert(errorThrown);
            },
            success: function (response) {
            	try {
            		console.log("imge sended.");
            		console.log(response);
				    var resp = JSON.parse(response);
				    console.log(resp);
				    if(resp.Codigo != 200){
	                	alert(resp.Mensaje);
	                }
	                else{
	                	$("#rimagen").attr("src", resp.Imagen);
	                	$("#imagen").attr("src", resp.Imagen);
	                	$("#imagen").css({
	                		"display": "block",
	                		"width": resp.width,
	                		"height": resp.height
	                	});
	                	$("#rimagen").css("display","block");
	                	imgw = resp.Width;
	                	imgh = resp.Height;
	                	leerImagenes();
	                }
				} catch (ex) {
				 	alert(ex);   
				}
            }
        });
        //console.log("process completed.");
		e.preventDefault();
	});
});