$(document).ready(function(){
	$("#login-email,#login-rest-email,#regist-email").blur(function(e){ValCorreos(e,this);});
	$('#login-pass,#regist-nomb,#regist-apel,#regist-pass,#regist-pass-conf').bind("keydown blur",function(e){ValCampos(e,this);});
	$("#login-from-rest,#login-rest-pass,#regist-enviar").hide();
	
	$(".msj-notif").click(function(){
		$("#login-from-rest,#login-rest-pass,#regist-enviar").hide();
		$("#login-form,#login-acc").show("slow");
		//$("#login-acc").show("show");
	});
	
	//LOGIN
	$("#tab-1").click(function(){
		$("#login-rest-atras,#login-from-rest,#login-rest-pass,#regist-enviar").hide();
		$("#login-rest,#login-form,#login-acc").show("slow");
	});
	$('#login-email,#login-pass').keydown(function(e){
		if(e.keyCode == 13){
			Login();
		}
	});
	$("#login-acc").click(function(){Login();});
	
	function Login(){
		var login_email	= $("#login-email").val(),
			login_pass	= $("#login-pass").val();
		
			if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(login_email))){
				$("#login-email").css('border','2px solid red');
				$("#login-email").focus();
				return false;
			}		
			if(login_pass==""){
				$("#login-pass").css('border','2px solid red');
				$("#login-pass").focus();
				return false;
			}else{
				$("#login-pass").css('border','1px solid #e0e0e0');
			}
		$("#login-msjresp").html("<img src='../img/ajax-loader.GIF' style='margin-top:50px;'/>");
		$("#login-msjresp").show();
   		//$('#login-form').submit();
        $.ajax({
            type:"POST",
            url:'login_proc.php',
            async:true,
            cache:false,
            beforeSend: function(){
                $("#login-msjresp").html("<img src='../img/ajax-loader.GIF' style='margin-top:50px;'/>");
                $("#login-msjresp").show();
            },
            data: {login_email: login_email, login_pass: login_pass},
            success:function(result){
				$("#login-msjresp").css({ "background-color": "#ffe", "border": "1px solid #ccc", "cursor": "pointer" });
				if(result){
					setCookie('login',result);
					$("#login-msjresp").css({"color": "green"}).html("Se autentico correctamente.");
                    $("#login-msjresp").show();
                    $("#login-msjresp").click(function(){
                        $("#login-msjresp").hide();
                        $("#simplemodal-container").hide();
                    });
                    setTimeout(function(){
                        $("#simplemodal-container").fadeOut(1000);
                    },5000);
				}else{
					$("#login-msjresp").css({"color": "red"}).html("Usuario o clave incorrecta.");
                    $("#login-msjresp").show();
                    $("#login-msjresp").click(function(){
                        //$("#login-msjresp,#login-from-rest").hide();
                        $("#login-msjresp").hide();
                        $("#login-rest-email").val('');
                        $("#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
                    });
                    setTimeout(function(){
                        $("#login-msjresp").fadeOut(1000);
                        //$("#login-msjresp,#login-from-rest").hide();
                        $("#login-rest-email").val('');
                    },5000);
				}
            },
            error: function(result){
                $("#torn-msjresp").html("<div class='notif_error'>Ocurrio un Error recargue el navegador y vuelva a intentar</div>");
                $("#torn-msjresp").show();
            }
        }); // FIN AJAX
	}

	//OLVIDAR CONTRASEÑA
	$("#login-rest,#login-rest-atras").click(function(){
		$("#login-rest,#login-rest-atras,#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
		//$("#login-form,#login-acc").hide();
		//$("#login-from-rest,#login-rest-pass").show("slow");
	});	
	$("#login-rest-pass").click(function(){	
		var _email = $("#login-rest-email").val();
		var _from = $("#from").val();	
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(_email))){
			$("#login-rest-email").css('border','2px solid red');
			$("#login-rest-email").focus();
			return false;
		}								
		//$('#login-from-rest').submit();		
		$.ajax({
				type:"POST",
				url:'password_reset.php',
				async:true,
				cache:false,
				beforeSend: function(){						
					$("#login-msjresp").html("<img src='../img/ajax-loader.GIF' style='margin-top:50px;'/>");
					$("#login-msjresp").show();								
				},
				data: ({login_rest_email:_email}),				
				success:function(result){
						$("#login-msjresp").html(result);							
						$("#login-msjresp").show();
						setTimeout(function(){
							$("#login-msjresp").fadeOut(1000);
							//$("#login-msjresp,#login-from-rest").hide();
							$("#login-rest-email").val('');
							$("#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
						},50000);
						$("#login-msjresp").click(function(){
							//$("#login-msjresp,#login-from-rest").hide();
							$("#login-msjresp").hide();
							$("#login-rest-email").val('');
							$("#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
						});
				},			
				error: function(result){						
					$("#torn-msjresp").html("<div class='notif_error'>Ocurrio un Error recargue el navegador y vuelva a intentar</div>");
					$("#torn-msjresp").show();
				}		
		}); // FIN AJAX
	});
	
	//REGISTRAR
	$("#tab-2").click(function(){
		$("#login-acc,#login-rest-pass").hide();
		$("#regist-enviar").show("show");
	});	
	$("#regist-enviar").click(function(){					
		var cont=0;
		$("#regist-nomb,#regist-apel,#regist-email,#regist-pass,#regist-pass-conf").each(function(e){
				if($(this).val()==''){
					$(this).css('border','2px solid red');
					//$(this).focus();
				}else{
					$(this).css('border','none');
					if($(this).attr('name')== 'regist-email'){
						if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()))){
							$(this).css('border','2px solid red');
							$(this).focus();
							$("#login-msjresp").html("<div class='notif_alerta'>Correo NO Validado</div>");
							$("#login-msjresp").show();
							setTimeout(function(){$("#login-msjresp").fadeOut(1000);},4000);
							return false;
						}
					}
					if($(this).attr('name')=='regist-pass-conf'){
						if($('#regist-pass').val() != $('#regist-pass-conf').val()){
							$(this).css('border','2px solid red');
							$(this).focus();
							$(this).val('');
							$("#login-msjresp").html("<div class='notif_alerta'>La ContraseÃ±a es Diferente</div>");
							$("#login-msjresp").show();
							setTimeout(function(){$("#login-msjresp").fadeOut(1000);},4000);																
							return false;
						}
					}
					cont++;
				}							
				if(cont==5){
					$("#login-msjresp").html("<img src='../img/ajax-loader.GIF' style='margin-top:50px;'/>");
					$("#login-msjresp").show();
					$('#regist-form').submit();
				}
			});			
	});
});
function ValCampos(e,t){ 
	setTimeout(function(){	
		if($(t).val()==''){
			$(t).css('border','2px solid red');
		}else{
			$(t).css('border','none');			
		}	
	},1000);
}
function ValCorreos(e,t){
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(t).val()))){
			$(t).css('border','2px solid red');			
		}else{
			$(t).css('border','none');
		}
}
function setCookie(n, v) {
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var cookie = n + "=" + escape(v) + "; expires=" + d.toGMTString() + "; path=/; ";
    if (location.hostname != "localhost") {
        cookie += "domain=.neotienda.com;"
    }
    document.cookie = cookie
}