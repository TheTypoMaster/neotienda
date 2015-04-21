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
		$("#login-msjresp").html("<img src='img/ajax-loader.GIF' style='margin-top:50px;'/>");
		$("#login-msjresp").show();

   		//$('#login-form').submit();
        $.ajax({
            type:"POST",
            url:'login_proc.php',
            async:true,
            cache:false,
            beforeSend: function(){
                $("#login-msjresp").html("<img src='img/ajax-loader.GIF' style='margin-top:50px;'/>");
                $("#login-msjresp").show();
            },
            data: {login_email: login_email, login_pass: login_pass},
            success:function(result){
                setCookie('login',result);
                $("#login-msjresp").html("Se autentico correctamente.");
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
				url:'./password_reset.php',
				async:true,
				cache:false,
				beforeSend: function(){						
					$("#login-msjresp").html("<img src='img/ajax-loader.GIF' style='margin-top:50px;'/>");
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
					$("#login-msjresp").html("<img src='img/ajax-loader.GIF' style='margin-top:50px;'/>");
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

/****

		FACE
		
***/

var fb = {
  config :{
  // CONFIG VARS: 

    app_id : '1454333251498828', 

    use_xfbml : true,

    extendPermissions : 'publish_stream,email' , 
    // info: http://developers.facebook.com/docs/reference/api/permissions/

    locale : 'es_ES' 
    // all locales in: http://www.facebook.com/translations/FacebookLocales.xml

  // END CONFIG VARS
  },
  perms : [],
  hasPerm : function (perm) { for(var i=0, l=fb.perms.length; i<l; i++) { if(fb.perms[i] == perm) {return true;}} return false; },
  logged : false,
  user : false, // when login, is a user object: http://developers.facebook.com/docs/reference/api/user
  login : function (callback){
    FB.login(function(r) {
      if (r.status == 'connected') {
        FB.api('/me/permissions',function(perm){
          fb.logged = true;
		  fb.perms = [];
		  for(i in perm.data[0])
		  {
			if (perm.data[0][i] == 1)
			{
				fb.perms.push(i);
			}
		  }
        });	   
		fb.getUser(callback);
      } else {
        fb.logged = false;
        fb.perms = [];
		callback();
      }
    },{scope:fb.config.extendPermissions});
    return false;
  },
  syncLogin : function (callback){
    if (!callback) callback = function(){};
    FB.getLoginStatus(function(r) {
      if (r.status == 'connected' ) { 
        FB.api('/me/permissions',function(perm){
          fb.logged = true;
		  fb.perms = [];
		  for(i in perm.data[0])
		  {
			if (perm.data[0][i] == 1)
			{
				fb.perms.push(i);
			}
		  }
        });	   
        fb.getUser(callback);
        return true;
      } else {
        fb.logged = false;
        callback();
        return false;
      }
    });
  },
  logout : function(callback) {FB.logout(callback);},
  getUser : function(callback){
    FB.api('/me', function(r){
      var user = r;
      user.picture = "https://graph.facebook.com/"+user.id+"/picture";
      fb.user=user; callback(user); 
    }); 
  },
  publish : function (publishObj,callback,noReTry) {
  // publishObj: http://developers.facebook.com/docs/reference/api/post   
    if (fb.logged && fb.hasPerm('publish_stream'))
    { 
      FB.api('/me/feed', 'post', publishObj, function(response) {
      if (!response || response.error) {
        callback(false);
      } else {
        callback(true);
      }
      });
      return true;
    }
    else
    { 
      if (!noReTry)
      	return fb.login(function() { return fb.publish(publishObj,callback,1)});
      else
      {
        callback(false);
        return false;
      }
    }
  },
  readyFuncs : [],
  ready: function(func){fb.readyFuncs.push(func)},
  launchReadyFuncs : function () {for(var i=0,l=fb.readyFuncs.length;i<l;i++){fb.readyFuncs[i]();};}
}
window.fbAsyncInit = function() { 
  if (fb.config.app_id) FB.init({appId: fb.config.app_id, status: true, cookie: true, xfbml: fb.config.use_xfbml});
  fb.syncLogin(fb.launchReadyFuncs);
};
var oldload = window.onload;
window.onload = function() {
  var d = document.createElement('div'); d.id="fb-root"; document.getElementsByTagName('body')[0].appendChild(d);
  var e = document.createElement('script'); e.async = true; e.src = document.location.protocol + '//connect.facebook.net/'+fb.config.locale+'/all.js';
  document.getElementById('fb-root').appendChild(e);
  if (typeof oldload == 'function') oldload();
};


//SCRIPTS PROPIOS QUE USA ESTA PÃGINA



// FUNCION PARA PUBLICAR UN MENSAJE EN EL MURO
var publish = function () {
		fb.publish({
		 /* message : "La mejor Comunidad de Video Juegos. \r\n Entérate de los juegos más actuales, Participa por premios, Juegos al menor consto y mucho más.",*/
		  picture : "https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn2/1474617_1431613797056784_794208609_n.png",
		  link : "https://www.facebook.com/pages/Los-Gamers/1430865553798275?ref=hl",
		  name : "Los Gamers",
		  description : "La mejor Comunidad de Video Juegos. \r\n Entérate de los juegos más actuales, Participa por premios, Adquiere juegos al menor consto y mucho más."
		},function(published){ 
		  if (published)
		  var a= 'nada';
		  /* alert("publicado!");
		   
		   $("#msjresp").html("<div class='notif_alerta msjresp'>No es un Correo Electronico</div>");
		   
		   document.getElementById("msjresp").innerHTML = "<div class='notif_alerta msjresp'>No es un Correo Electronico</div>";
		   var el = document.getElementById("msjresp");
		   el.style.display = (el.style.display == 'block') ? 'block' : 'block';
		   }
		  else
		   alert("No publicado :(, seguramente porque no estas identificado o no diste permisos");*/
		});  
}


// CUANDO LA PAGINA CARGA MIRAMOS SI YA HAY UN USUARIO IDENTIFICADO.
/*fb.ready(function(){ 
		if (fb.logged){
			FBLogin(fb.user.id,fb.user.first_name,fb.user.last_name,fb.user.email,fb.user.picture);
			//publish();
		}
});*/


// FUNCION PARA LOGARSE CON FACEBOOK.
function FBConex(obj) {
	  fb.login(function(){ 
		if(fb.logged){
			if(obj=='login'){
				FBLogin(fb.user.first_name,fb.user.last_name,fb.user.email);
			}
			if(obj=='regist'){
				FBRegistro(fb.user.id,fb.user.first_name,fb.user.last_name,fb.user.email,fb.user.picture);
			}
		//publish();			
		}else{
		  //alert("No se pudo identificar al usuario");
			$('#login-email').focus();
			$("#login-msjresp").html("<div class='notif_alerta'>No se pudo Iniciar Sesión</div>");
			$("#login-msjresp").show();
			setTimeout(function(){$("#login-msjresp").fadeOut(1000);},4000);
			return false;
		}
	  })
};

function FBLogin(nomb,apel,email){
		$("#login-msjresp").html("<img src='img/ajax-loader.GIF' style='margin-top:50px;'/>");
		$("#login-msjresp").show();
		
		//alert('login echo '+fb.user.name);
		from = $("#from").val();		
		
		//$('#login-form').submit();			
		location.href = "login_social.php?nomb="+nomb+"&apel="+apel+"&email="+email+"&from="+from;
};
function FBRegistro(id,nomb,apel,email,img){
		$("#login-msjresp").html("<img src='img/ajax-loader.GIF' style='margin-top:50px;'/>");
		$("#login-msjresp").show();
		
		//alert('login echo '+fb.user.name);
		from = $("#from").val();		
		
		//$('#login-form').submit();			
		location.href = "registrar_proc.php?fb_id="+id+"&nomb="+nomb+"&apel="+apel+"&email="+email+"&img="+img+"&from="+from;
		//alert("login_social.php?id="+id+"&nomb="+nomb+"&apel="+apel+"&email="+email+"&img="+img+"&from="+from);
};