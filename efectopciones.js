// JavaScript Document
//$(document).ready(function(){

/*FUNCION INSERTAR IMAGEN*/
function selFondo(a,idBa)
	{	
	var i=a; 
//	alert("Hola: "+a);
	$.post("insertarImagen.php",
    		{
				img: i,
				idBan:idBa,
				beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
			},function(data,status)
					{	
						$("#listar_datos").empty();
						$('#menImg').animate({height: 'show',opacity:'0.9'});
						//$("#menImg").css("color","green");
						$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
						$("#menImg").load("banner.php?varTit="+idBa);
					}									
		);/*FIN post*/
   }
   
function selFuente(a,b)
	{	


	$.post("insertarFuente.php",
    		{
				banner:a,
				fuente:b,
				beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
			},function(data,status)
					{	
						$("#listar_datos").empty();
						$('#menImg').animate({height: 'show',opacity:'0.9'});
						//$("#menImg").css("color","green");
						$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
						$("#menImg").load("banner.php?varTit="+a);
					}									
		);/*FIN post*/
   }
   
   /**SIRVE PARA CAMBIAR LA IMAGEN DEL CURSO*/
	function   selImgCur(id,ic)
	{	
	$.post("insertarImagenCurso.php", 
	{	   					
	   				idImg: id,
						idBan: ic,
						beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data,status)
								{	$("#listar_datos").empty();
									$('#menImg').animate({height: 'show',opacity:'0.9'});
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#menImg").load("banner.php?varTit="+ic);
								}									
					);/*FIN post*/
		}
		/*FIN SEL IMG CUR*/
		
		
	   /**SIRVE PARA CAMBIAR LA IMAGEN DE LA ETIQUETA*/
	function   Eti_selImg(id,ic)
	{	
	$.post("eti_insertarImagenCurso.php", 
	{	   					
	   				idImg: id,
						idBan: ic,
						beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						
						},function(data,status)
								{	$("#listar_datos").empty();
									$('#menImg').animate({height: 'show',opacity:'0.9'});
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#menImg").load("eti_banner.php?varTit="+ic);
									//
								}									
					);/*FIN post*/
		}
		/*FIN SEL IMG ETIQUETA*/
		
	/*SIRVE PARA CAMBIAR EL TITULO DEL BANNER*/
	function insTitulo(idba)
	{$.post("insertarTitulo.php",    				{
	   				txtTit: $("#txtTit").val(),
						idBan: idba,
						beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data,status)
								{	$("#listar_datos").empty();
									$('#menImg').animate({height: 'show',opacity:'0.9'});
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#menImg").load("banner.php?varTit="+idba);
								}									
					);/*FIN post*/
	}

	/*SIRVE PARA CAMBIAR EL TITULO DE LA ETIQUETA*/
	function eti_insTitulo(idba)
	{$.post("eti_insertarTitulo.php",    				{
	   				txtTit: $("#txtTit").val(),
						idBan: idba,
						beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data,status)
								{	$("#listar_datos").empty();
									$('#menImg').animate({height: 'show',opacity:'0.9'});
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#menImg").load("eti_banner.php?varTit="+idba);
								}									
					);/*FIN post*/
	}

	/*FUNCION PARA INSERTAR EL TITULO DE UN NUEVO BANNER*/
   function insertarTitulo()
	{$.post("nuevoTitulo.php",
	   				{	txtTit: $("#txtTitulo").val(),
							beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						},
						},function(data,status)
								{	$('#menImg').animate({height: 'show',opacity:'0.9'});
									//$("#menImg").css("color","green");
//									$("#menImg").css("display","block");
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
	//								$("#btn").css("display","none");
								}									
					);/*FIN post*/
	}
	
	/*FUNCION PARA BUSCAR LOS BANNERS*/
	function buscardatos(tabla)
		{$.post("procesar.php",
	   				{	txtBus: $("#txtBus").val(),
						txtTab: tabla,
							beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						},
						},function(data,status)
								{	$('#menImg').animate({height: 'show',opacity:'0.9'});
									//$("#menImg").css("color","green");
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#btn").css("display","none");
								}									
					);/*FIN post*/
	}
	/*FIN BUSCAR BANNERS*/
	
	
	/*FUNCION PARA BUSCAR LAS ETIQUETAS*/
	function eti_buscardatos(tabla)
		{$.post("eti_procesar.php",
	   				{	txtBus: $("#txtBus").val(),
						txtTab: tabla,
							beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						},
						},function(data,status)
								{	$('#menImg').animate({height: 'show',opacity:'0.9'});
									//$("#menImg").css("color","green");
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#btn").css("display","none");
								}									
					);/*FIN post*/
		}
	/*FIN BUSCAR BANNERS*/
	
	
	
		/*FUNCION VIENE DEL LISTAR TODOS LOS BANNER*/
	function eliminar(valor)
	{if(confirm("Realmente desea eliminar el registro..........."+valor))
		{
//		location.href="eliminarbanner.php?id="+valor;
				$.get("eliminarbanner.php",
	   			{	id: valor,
					beforeSend: function()
						{$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						 },
					},function(data,status)
						{	$('#limpiarbtnb').empty();
							$("#listar_datos").empty();
							$('#menImg').animate({height: 'show',opacity:'0.9'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);
							
						}									
					);/*FIN GET*/
		
		}/*FIN IF CONFIRM*/
	}
		/*FUNCION VIENE DEL LISTAR TODOS LOS BANNER y SIRVE PARA EDITAR EL BANNER*/
	function editar(valor)
	{if(confirm("se va a dirigir a editar este Banner..........."+valor))
		{
//		location.href="banner.php?varTit="+valor;
		$.get("banner.php",
	   			{	varTit: valor,
					beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
					},
					},function(data,status)
						{	
							$('#limpiarbtnb').empty();
							$("#listar_datos").empty();
							$('#menImg').animate({height: 'show',color:'blue'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);
							$("#menImg").load("banner.php?varTit="+valor);
						}									
					);/*FIN GET*/
		
		}
	}
	/*ELIMINAR IMAGEN CURSO*/
	function eliminarImgCurso(valor,nombre)
	{if(confirm("Realmente desea eliminar la imagen del curso : "+nombre+": "+valor))
		{
		//location.href="eliminarc.php?id="+valor+"&nom="+nombre;
		$.get("eliminarc.php",
	   			{	id: valor,
					nom: nombre,
					beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
					},
					},function(data,status)
						{	$('#limpiarbtnb').empty();
							$('#menImg').animate({height: 'show',opacity:'0.9'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);
							$("#menImg").load("leicursos.php");
						}									
					);/*FIN GET*/
		
		}
	}
	
	/*ELIMINAR IMAGEN FONDO*/
		function eliminarImgFondo(valor,nombre)
	{if(confirm("Realmente desea eliminar la imagen de fondo: "+nombre+": "+valor))
		{
		//location.href="eliminarf.php?id="+valor+"&nom="+nombre;
		
		$.get("eliminarf.php",
	   			{	id: valor,
					nom: nombre,
					beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
					},
					},function(data,status)
						{	$('#limpiarbtnb').empty();
							$('#menImg').animate({height: 'show',opacity:'0.9'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);
							$("#menImg").load("leifondos.php");
						}									
					);/*FIN GET*/
		
		}
	}
//});



/*TODO EL SIGUIENTE CODIGO ES PARA LAS ETIQUETAS*/


	/*FUNCION PARA INSERTAR EL TITULO DE UN NUEVO BANNER*/
   function insertarEtiqueta()
	{$.post("eti_nuevoTitulo.php",
	   				{	txtTit: $("#txtTitulo").val(),
							beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						},
						},function(data,status)
								{	$('#menImg').animate({height: 'show',opacity:'0.9'});
									//$("#menImg").css("color","green");
									$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
									$("#btn").css("display","none");
								}									
					);/*FIN post*/
	}
	
	
		/*ELIMINAR LA ETIQUETA*/
		/*FUNCION VIENE DEL LISTAR TODOS LOS B O ETIQUETAS*/
	function eliminarEtiqueta(valor)
	{if(confirm("Realmente desea eliminar el registro!!!..........."+valor))
		{
//		location.href="eti_eliminarbanner.php?id="+valor;
		$.get("eti_eliminarbanner.php",
	   			{	id: valor,
//					nom: nombre,
					beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
					},
					},function(data,status)
						{	$('#limpiarbtnb').empty();
							$("#listar_datos").empty();
							$('#menImg').animate({height: 'show',opacity:'0.9'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);	
//							$("#menImg").load("leifondos.php");
						}									
					);/*FIN GET*/
		
		}
	}
	
		/*FUNCION VIENE DEL LISTAR TODOS LOS B O ETIQUETAS*/
	function editarEtiqueta(valor)
	{if(confirm("se va a dirigir a editar este Banner..........."+valor))
		{	
		$.get("eti_banner.php",
	   			{	varTit: valor,
					beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
					},
					},function(data,status)
						{	$('#limpiarbtnb').empty();
							$("#listar_datos").empty();
							$('#menImg').animate({height: 'show',opacity:'0.9'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);
							$("#menImg").load("eti_banner.php?varTit="+valor);
						}									
					);/*FIN GET*/
		}
	}
	
	/*ELIMINAR IMAGEN FONDO DE ETIQUETA*/
	function eti_eliminarImgFondo(valor,nombre)
	{if(confirm("Realmente desea eliminar la imagen de fondo : "+nombre+": "+valor))
		{
//		location.href="eti_eliminarf.php?id="+valor+"&nom="+nombre;
		/////////////////////////////////////////////////////////////
		$.get("eti_eliminarf.php",
	   			{	id: valor,
					nom: nombre,
					beforeSend: function(){$("#menImg").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
					},
					},function(data,status)
						{	$('#limpiarbtnb').empty();
							$('#menImg').animate({height: 'show',opacity:'0.9'});
	  					    $("#menImg").html("Respuesta: "+status+" Servidor: "+data);	
//							$("#menImg").load("leifondos.php");
						}									
					);/*FIN GET*/
		
		}
	}
	
	/*FUNCION ELIMINAR USUARIO*/
	function eliminarUsuario(valor)
	{if(confirm("Realmente desea eliminar el registro..........."+valor))
		{
		location.href="eliminarusuario.php?id="+valor;
		}
	}
	/*FUNCION EDITAR USUARIO*/
	function editarUsuario(valor)
	{if(confirm("se va a dirigir a editar este registro..........."+valor))
		{
		location.href="editarusuario.php?varTit="+valor;
		}
	}
	
	/*FUNCION PARA EL LOGIN*/
	function registrar()
	{
	window.location="formulario.php";	
	}
	
	/*FUNCION PARA MODIFICAR LA CONSTRASEÑA*/	
	
	function actcon()
	{$.post("actcon.php",    				{
	   				conA: $("#txtConA").val(),
	   				con1: $("#txtCon1").val(),					
	   				con2: $("#txtCon2").val(),					
						beforeSend: function(){$("#respuesta").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data,status)
								{	$('#respuesta').animate({height: 'show',opacity:'0.9'});
//									$("#respuesta").css("margin","0 auto");
									$("#respuesta").html("Respuesta: "+status+" Servidor: "+data),
									$(":text").val('');
									$(":password").val('');
								}									
					);/*FIN post*/
	}
	
	function recordarcon()
	{$.post("recordarcon.php",    				{
	   				ced: $("#txtCed").val(),
	   				cor: $("#txtCor").val(),					

						beforeSend: function(){$("#respuesta").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data,status)
								{	$('#respuesta').animate({height: 'show',opacity:'0.9'});
//									$("#respuesta").css("margin","0 auto");
									$("#respuesta").html("Respuesta: "+status+" Servidor: "+data);
								}									
					);/*FIN post*/
	}
	
	/*RESET CONTRASENA*/
	
	/*cambiar pw cuando se olvida del all*/
	function restaurarcon(c,cn)
	{	//alert(c,cn);
		$.post("restaurarcon.php",    				{
	   				con1: c,
	   				con2: cn,					

						beforeSend: function(){$("#respuesta").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data,status)
								{	$('#respuesta').animate({height: 'show',opacity:'0.9'});
//									$("#respuesta").css("margin","0 auto");
									$("#respuesta").html("Respuesta: "+status+" Servidor: "+data);
								}									
					);/*FIN post*/
	}
	
    function cambiarfuente(id,idfuente,tamano)
	{

//alert(id,idfuente,tamano)
$.post("personalizacion.php",    				{
	   				idban: id,
	   				fuente: idfuente,
					tam:tamano,					

						beforeSend: function(){$("#camFuL").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
						},function(data)
								{	$('#camFuL').animate({height: 'show',opacity:'0.9'});
//									$("#camFuL").css("margin","0 auto");
									$("#camFuL").html(""+data);
								}									
					);/*FIN post*/
	
	}
	
    function actualizarcolorfuente(idbanner)
	{
	
	$.post("actualizarpersonalizacion.php",    				{
		  color: $("#pltcolor").val(),
		  tamano: $("#rango").val(),
		  idbanner:idbanner,
		  beforeSend: function(){$("#camFuL").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
		  },function(data)
				  {	/*$('#camFuL').animate({height: 'show',opacity:'0.9'});
//					$("#camFuL").css("margin","0 auto");
					$("#camFuL").html(""+data);*/
					
					$("#listar_datos").empty();
						$('#menImg').animate({height: 'show',opacity:'0.9'});
						//$("#menImg").css("color","green");
						$("#menImg").html("Respuesta: "+status+" Servidor: "+data);
						$("#menImg").load("banner.php?varTit="+idbanner);
					
					
				  }									
	  );/*FIN post*/

	}
