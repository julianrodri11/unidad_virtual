// JavaScript Document

$(document).ready(function(){
	/*EFECTO OPCIONES*/
/*  $("#opc").mouseenter(function(){$('#menu').toggle( "slow");});*/
	
	/*ABRIR EL DIV PARA EDICION DEL TITULO*/
	$("#open").click(function(){
		$('#contOpc').fadeIn("slow");
		$('#camTit').fadeIn('slow');
		$('#contOpc').css("background-color","#095EB8");
		$('#camImF').css("display","none");
		$('#camImC').css("display","none");
		$('#oculto').css("display","none");
		$('#camFuL').css("display","none");
	});
	
	/*PARA ABRIR EL DIV PARA EDICION DE LA ETIQUETA*/
	$("#eti_open").click(function(){
		$('#contOpc').fadeIn("slow");
		$('#camTit').fadeIn('slow');
		//$('#contOpc').css("background-color","#095EB8");
		$('#camImF').css("display","none");
		$('#camImC').css("display","none");
				$('#oculto').css("display","none");
	});
	
	/*ABRIR DIV PARA MODIFICAR LA IMAGEN */	
	$("#openFondo").click(function(){
		$('#contOpc').fadeIn("slow");
		$('#camImF').fadeIn('slow');
		$('#camTit').css("display","none");
		$('#camImC').css("display","none");
		$('#oculto').css("display","none");
		$('#camFuL').css("display","none");
	});
	

/*PARA ABR EL DIV DE CAMBIAR LA IMAGEN DE ETIQUETA*/
	$("#eti_openFondo").click(function(){
		$('#contOpc').fadeIn("slow");
		$('#camImF').fadeIn('slow');
		$('#camTit').css("display","none");
		$('#camImC').css("display","none");
		$('#oculto').css("display","none");
	});
	

	/*ABRIR DIV PARA MODIFICAR LA IMAGEN DEL FONDO */	
	$("#openCurso").click(function(){
		$('#contOpc').fadeIn("slow");
		$('#camImC').fadeIn('slow');
		$('#camTit').css("display","none");
		$('#camImF').css("display","none");
		$('#oculto').css("display","none");
		$('#camFuL').css("display","none");
	});
	
	$("#openTexto").click(function(){
		$('#contOpc').fadeIn("slow");
		$('#camFuL').fadeIn('slow');
		$('#camImC').css("display","none");
		$('#camTit').css("display","none");
		$('#camImF').css("display","none");
		$('#oculto').css("display","none");
	});

	
	
	/*PARA EL GENERADOR DE CODIGO EMBEBIDO*/
	$("#btn").click(function(){
		//$("#oculto").css("background-color","#FDDFAE")
		$("#oculto").toggle('slow');
		$('#contOpc').css("display","none");
		})
		
	/*PARA ABRIR LAS OPCIONES DEL INDEX  BANNERS*/		
	$("#menBann").mousedown(function(){
		$('#oculBan').toggle(500);
	
	});
	/**/
	
	/*PARA MENU DE OPCIONES ETIQUETAS*/
	$("#abrir").click(function(){
	$('.padre1').fadeIn("slow");		
	});
	
	$("#abrir2").mousedown(function(){
	$('.padre2').fadeIn("slow");
	});
	$("#abrirgal").mousedown(function(){
	$('#h1').fadeIn("slow");
	});
	$("#abrirdis").mousedown(function(){
	$('#h2').fadeIn("slow");
	});
	$("#abrirdise").mousedown(function(){
	$('#h3').fadeIn("slow");
	});
	
	/*OL UL LI*/
		$("#nb").click(function(evento){evento.preventDefault();
		$('#destino').empty();
		$('#destino').load("nuevobanner.php");	
		});

		$("#sc").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("cargarimagencurso.php");	
		});
		/*FALTA CORREGIR PARA ABAJO*/
		$("#ec").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("leicursos.php");	
		});
		
		$("#sd").click(function(evento){evento.preventDefault();	
		$('#destino').empty();							  
		$('#destino').load("cargarfondo.php");	
		});
		

		
		$("#ef").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("leifondos.php");	
		});

		$("#sb").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("index.php");	
		});
		
		$("#edb").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("listarbanners.php");	
		});

		$("#ne").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("eti_nuevobanner.php");	
		});
		
		$("#sfe").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("eti_cargarfondo.php");	
		});

		$("#efe").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("eti_leifondos.php");	
		});		
		
		$("#ede").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();
		$('#destino').load("eti_listarbanners.php");	
		});

		
		$("#tb").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("proyectosb.php");		
		});
		
		$("#te").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("proyectose.php");
		});
		
		$("#gd").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("mostrarcursos.php");
		});

		$("#gi").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("mostrarfondos.php");
		});
		
		$("#ge").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("eti_mostrarfondos.php");	
		});
		
		$("#datos").click(function(evento){evento.preventDefault();								  
		$('#destino').empty();		
		$('#destino').load("contrasmodifi.php");	
		});
});