$(document).ready(function(){
	$("#login-email,#login-rest-email,#regist-email").blur(function(e){ValCorreos(e,this);});
	$('#login-pass,#regist-nomb,#regist-apel,#regist-pass,#regist-pass-conf').bind("keydown blur",function(e){ValCampos(e,this);});
	$("#login-from-rest,#login-rest-pass,#regist-enviar").hide();

	$(".msj-notif").click(function(){
		$("#login-from-rest,#login-rest-pass,#regist-enviar").hide();
		$("#login-form,#login-acc").show("slow");
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
		var login_email	   = $("#login-email").val(),
			login_pass	   = $("#login-pass").val(),
            login_recordar = $("#login_recordar").val();

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
		$("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
		$("#login-msjresp").show();

        $.ajax({
            type:"POST",
            url:'login_proc.php',
            async:true,
            cache:false,
            beforeSend: function(){
                $("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
                $("#login-msjresp").show();
            },
            data: {opera: 'login', login_email: login_email, login_pass: login_pass, login_recordar: login_recordar},
            success:function(result){
				$("#login-msjresp").css({ "background-color": "#ffe", "border": "1px solid #ccc", "cursor": "pointer" });
				if(result){
					$("#login-msjresp").css({"color": "green"}).html("Se autentico correctamente.");
                    $("#login-msjresp").show();
                    $("#login-msjresp").click(function(){
                        $("#login-msjresp").hide();
                    });
                    setTimeout(function(){
                        $.modal.close();
                    },2500);
				}else{
					$("#login-msjresp").css({"color": "red"}).html("Usuario o clave incorrecta.");
                    $("#login-msjresp").show();
                    $("#login-msjresp").click(function(){
                        $("#login-msjresp").hide();
                        $("#login-rest-email").val('');
                        $("#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
                    });
                    setTimeout(function(){
                        $("#login-msjresp").fadeOut(1000);
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
	$("#login-rest").click(function(){
		//$("#login-from-rest,#login-rest-atras,#login-rest-pass,#login-form,#login-acc,#login-rest").toggle();
		$("#login-form,#login-acc,#login-rest").hide();
		$("#login-from-rest,#login-rest-pass,#login-rest-atras").show("slow");
	});
	$("#login-rest-atras").click(function(){
		//$("#login-from-rest,#login-rest-atras,#login-rest-pass,#login-form,#login-acc,#login-rest").toggle();
		$("#login-form,#login-acc,#login-rest").show("slow");
		$("#login-from-rest,#login-rest-pass,#login-rest-atras").hide();
	});

	$("#login-rest-pass").click(function(){
		var _email = $("#login-rest-email").val();
		var _from = $("#from").val();
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(_email))){
			$("#login-rest-email").css('border','2px solid red');
			$("#login-rest-email").focus();
			return false;
		}
		$.ajax({
				type:"POST",
				url:'neo_exchanges/password_reset.php',
				async:true,
				cache:false,
				beforeSend: function(){
					$("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
					$("#login-msjresp").show();
				},
				data: ({login_rest_email:_email}),
				success:function(result){
					$("#login-msjresp").css({ "background-color": "#ffe", "border": "1px solid #ccc", "cursor": "pointer" });
					$("#login-msjresp").css({"color": "red"}).html(result);
					$("#login-msjresp").show();
					setTimeout(function(){
						$("#login-msjresp").fadeOut(1000);
						$("#login-rest-email").val('');
						$("#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
					},2500);
					$("#login-msjresp").click(function(){
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
	$("#regist-enviar").click(function(e){
		var cont=0;
		$("#regist-nomb,#regist-apel,#regist-email,#regist-pass,#regist-pass-conf").each(function(e){
			if($(this).val()==''){
				$(this).css('border','2px solid red');
			}else{
				$(this).css('border','none');
				if($(this).attr('name')== 'regist-email'){
					if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()))){
						$(this).css('border','2px solid red');
						$(this).focus();
						$("#login-msjresp").css({"color": "red"}).html("<div class='notif_alerta'>Correo NO Validado</div>");
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
						$("#login-msjresp").css({"color": "red"}).html("<div class='notif_alerta'>La ContraseÃ±a es Diferente</div>");
						$("#login-msjresp").show();
						setTimeout(function(){$("#login-msjresp").fadeOut(1000);},4000);
						return false;
					}
				}
				cont++;
			}
		});
		if(cont==5){
			$("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
			$("#login-msjresp").show();
			$.ajax({
				type:"POST",
				url:'neo_exchanges/registrar_proc.php',
				async:true,
				cache:false,
				beforeSend: function(){
					$("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
					$("#login-msjresp").show();
				},
				data: ({
					regist_nomb: $('#regist-nomb').val(),
					regist_apel: $('#regist-apel').val(),
					regist_email: $('#regist-email').val(),
					regist_pass: $('#regist-pass').val()
				}),
				success:function(result){
					$("#login-msjresp").css({ "background-color": "#ffe", "border": "1px solid #ccc", "cursor": "pointer" });
					$("#login-msjresp").css({"color": "green"}).html(result);
					$("#login-msjresp").show();
					$('#regist-form').find("input").val("");
					setTimeout(function(){
						$("#login-msjresp").fadeOut(1000);
					},2500);
					$("#login-msjresp").click(function(){
						$("#login-msjresp").hide();
					});
				},
				error: function(result){
					$("#torn-msjresp").html("<div class='notif_error'>Ocurrio un Error recargue el navegador y vuelva a intentar</div>");
					$("#torn-msjresp").show();
				}
			}); // FIN AJAX
		}
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