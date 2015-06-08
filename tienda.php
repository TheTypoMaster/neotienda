<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 18/03/2015
 * Time: 09:04 PM
 */
?>

<?php
session_start();
global $smarty;
require(dirname(__FILE__).'/config/config.inc.php');
include_once( 'header.php' );
?>
    <link rel="stylesheet" type="text/css" href="neo_exchanges/index-menu.css">
    <link rel="stylesheet" type="text/css" href="neo_exchanges/home.css">
    <!-- Fancybox CSS files -->
    <link rel="stylesheet" type="text/css" href="neo_exchanges/jquery.fancybox.css" media="screen">
    <!-- Tooltips -->
    <link rel="stylesheet" type="text/css" href="neo_exchanges/tooltipster.css">
    <link rel="stylesheet" type="text/css" href="neo_exchanges/tooltipster-red.css">
    <link rel="stylesheet" type="text/css" href="neo_exchanges/intercambio_usados.css">

    <script type="text/javascript" src="neo_exchanges/jquery.1.7.1.js"></script>
    <script type="text/javascript" src="neo_exchanges/jquery.ui.1.8.16.js"></script>
    <script type="text/javascript">
        var path = '/';
        var pais = 've';
    </script>
    <script type="text/javascript" src="neo_exchanges/respond.min.js"></script>
    <script type="text/javascript" src="neo_exchanges/linker.js"></script>
    <style id="css-ddslick" type="text/css">
        /*.select-bandera-content{float: right}
        p.text-selec-pais{float: right; margin: 0 0 0 5px; color: #000000;}
        .dd-select{border:none; position:relative; cursor:pointer; color:#f6f6f6; font-family: Rockwell, Noto Sans; margin: 0 30%; }
        .dd-desc {color:#aaa; display:block; overflow: hidden; font-weight:normal; line-height: 1.4em !important;}
        .dd-selected{float:left; font-size: 10px !important; overflow:hidden; display:block; padding:3px; hight:auto;}
        .dd-pointer{width:0; height:0; position:absolute; top:50%; margin-top:7px;}
        .dd-pointer-down{ border:solid 5px transparent; border-top:solid 5px #000;}
        .dd-pointer-up{border:solid 5px transparent !important; border-bottom:solid 5px #000 !important; margin-top:-8px;}
        .dd-options{border:solid 1px #ccc; border-top:none; list-style:none; box-shadow:0px 1px 5px #ddd; display:none; position:absolute; z-index:2000; margin:0 2%; padding:0;background:#fff; overflow:auto;}
        .dd-option{font-size: 10px !important; padding:3px; display:block; border-bottom:solid 1px #ddd; overflow:hidden; text-decoration:none; color:#333 !important; cursor:pointer;-webkit-transition: all 0.25s ease-in-out; -moz-transition: all 0.25s ease-in-out;-o-transition: all 0.25s ease-in-out;-ms-transition: all 0.25s ease-in-out;}
        .dd-options > li:last-child > .dd-option{border-bottom:none;}
        .dd-option:hover{background:red; color:#000;}
        .dd-selected-description-truncated {text-overflow: ellipsis; white-space:nowrap;}
        .dd-option-selected {background:#f6f6f6;}
        .dd-option-image, .dd-selected-image { vertical-align:middle; float:left; margin-right:5px; max-width:64px; width:25px; margin-top: 0px;}
        .dd-image-right {float:right; margin-right:15px; margin-left:5px; margin-top:0px;}
        .dd-container{margin: 0 auto;}
        .dd-selected-text {float:left;}
        .dd-selected:hover{color: red;transition: background-color 100ms ease-in-out; -webkit-transition: background-color 100ms ease-in-out;}
        @media only screen and (max-width: 680px){
            .dd-option-image, .dd-selected-image{margin-top: 1px;}
            .dd-pointer{margin-top: 8px;}
        }
        @media only screen and (max-width: 480px){
            p.text-selec-pais, .dd-select{color:#000; font-size:10px;}
            .select-bandera-content{margin-left:3px;}
        }*/
    </style>
    <script type="text/javascript" src="neo_exchanges/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="neo_exchanges/home.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Document is ready
            //$('#nento').modal();

             /*$('#pepe').click(function(){
                alert('co;o');
                //$('#nento').modal.close();
            });*/

            /*$("#pepepe").click(function() {
                alert( "Handler for .click() called." );
                $.modal.close();
            });*/
        });
    </script>
    <script type="text/javascript">
        setCookie("login",0);
    </script>
    <!-- Fancybox JS files-->
    <script type="text/javascript" src="neo_exchanges/jquery.fancybox.js"></script>
    <!-- Tooltips -->
    <script type="text/javascript" src="neo_exchanges/jquery.tooltipster.min.js"></script>
    <style>
        /*.header-min{
            width: 100%;
            background-position: center top;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #cecece;
            height: 85px;
        }
        .header-content-min{
            min-height: 20px;
        }
        .menu-tienda {
            background: none repeat scroll 0 0 #000;
            display: none;
            margin-top: 8px;
            position: relative;
            text-align: right;
            width: 165px;
            z-index: 10000;
        }
        .menu-tienda ul {
            display: table;
            padding: 0;
            margin: 0;
            background: #000;
        }
        .menu-tienda li {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
            height: 25px !important;
            padding-bottom: 5px;
            padding-left: 15px !important;
            padding-right: 0;
            padding-top: 5px;
            text-align: left !important;
            width: 100%;
        }
        .menu-tienda li:hover {
            background: none repeat scroll 0 0 #fff !important;
            color: #000000 !important;
        }
        li:hover > div {
            display:block;
            position: absolute;
        }
        .menu-tienda a {
            color: #ffffff;
            font-family: "Helvetica Neue","Arial";
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .menu-tienda a:hover {
            color: #000;
            text-decoration: none !important;
        }*/
    </style>
<div id="mobile-menu" class="mobile-menu">
    <i class="icon-home icon-menu-mobile"><a href="#" id="pepe">asdfsdfsafasdfasd</a></i>
</div>
<div id="nento" style="height: 345px;padding: 0;width: 250px;background-color: #ffffff;display: none">
    <!--<link rel="stylesheet" type="text/css" href="neo_exchanges/style.css">
    <script type="text/javascript" src="neo_exchanges/jquery-2.js"></script>
    <script type="text/javascript" src="neo_exchanges/jquery.simplemodal.js"></script>-->
    <script type="text/javascript">
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
                $("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
                $("#login-msjresp").show();

                $.ajax({
                    type:"POST",
                    url:'neo_exchanges/login_proc.php',
                    async:true,
                    cache:false,
                    beforeSend: function(){
                        $("#login-msjresp").html("<img src='neo_exchanges/ajax-loader.GIF' style='margin-top:50px;'/>");
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
                            });
                            setTimeout(function() {
                                $.modal.close();
                            }, 5000);
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
                        $("#login-msjresp").html("<img src='ajax-loader.GIF' style='margin-top:50px;'/>");
                        $("#login-msjresp").show();
                    },
                    data: ({login_rest_email:_email}),
                    success:function(result){
                        $("#login-msjresp").html(result);
                        $("#login-msjresp").show();
                        setTimeout(function(){
                            $("#login-msjresp").fadeOut(1000);
                            $("#login-rest-email").val('');
                            $("#login-from-rest,#login-rest-pass,#login-form,#login-acc").toggle();
                        },50000);
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
            $("#regist-enviar").click(function(){
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
                        $("#login-msjresp").html("<img src='ajax-loader.GIF' style='margin-top:50px;'/>");
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
            if (location.hostname == "neotienda.dev") {
                cookie += "domain=.neotienda.dev;"
            }else{
                if (location.hostname != "localhost") {
                    cookie += "domain=.neotienda.com;"
                }
            }
            document.cookie = cookie
        }
    </script>
    <style type="text/css">
        .fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}
        .fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;_background-image:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif);cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent;_background-image:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_close_icon:active{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent;_background-image:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_loader{background-color:#f6f7f8;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #3a5795;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{max-height:590px;min-height:590px;max-width:500px;min-width:500px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;left:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #2f477a;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f8;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}
        .fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(http://z-1-static.xx.fbcdn.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}
    </style>
    <h3 style="margin: 5px 0px 0px;">¿Estas registrado?</h3>
    <section class="tabs">
        <input id="tab-1" name="radio-set" class="tab-selector-1" checked="checked" type="radio">
        <label for="tab-1" class="tab-label-1">Entrar</label>
        <input id="tab-2" name="radio-set" class="tab-selector-2" type="radio">
        <label for="tab-2" class="tab-label-2">Registrarse</label>
        <div class="clear-shadow"></div>
        <div class="content"> <!--height: 250px; -->
            <div class="content-1 login-content">
                <form id="login-form" method="POST" action="neo_exchanges/login_proc.php" autocomplete="on">
                    <input id="from" name="from" value="intercambia" type="hidden">
                    <p><input id="login-email" name="login-email" placeholder="Correo electrónico" title="Correo electrónico" required="" type="text"></p>
                    <p><input id="login-pass" name="login-pass" placeholder="Contraseña" title="Contraseña" autocomplete="off" required="" type="password"></p>
                    <p style="float: left;">
                        <input name="login-recordar" value="true" type="checkbox">
                        <span id="login-recordar">Recordar</span>
                    </p>
                </form>
                <form style="display: none;" id="login-from-rest" method="POST" action="neo_exchanges/login_proc.php" autocomplete="off">
                    <p><input id="login-rest-email" name="login-rest-email" placeholder="Correo electrónico" title="Correo electrónico" type="text"></p>
                </form>
                <span id="login-rest" style="float: right; margin-top: 10px;">Olvidé mi contraseña</span>
                <span id="login-rest-atras" style="float:right; margin-top:10px; display:none;">Volver</span>
            </div>
            <div class="content-2">
                <div id="regist-conten" class="regist-alquiler-conten">
                    <form id="regist-form" method="POST" action="neo_exchanges/registrar_proc.php" autocomplete="off">
                        <p><input id="regist-nomb" name="regist-nomb" placeholder="Nombre" title="Nombre" type="text"></p>
                        <p><input id="regist-apel" name="regist-apel" placeholder="Apellido" title="Apellido" type="text"></p>
                        <p><input id="regist-email" name="regist-email" placeholder="Dirección de email" title="Dirección de email" type="text"></p>
                        <p><input id="regist-pass" name="regist-pass" placeholder="Contraseña" title="Contraseña" type="password"></p>
                        <p><input id="regist-pass-conf" name="regist-pass-conf" placeholder="Confirmar Contraseña" title="Confirmar la Contraseña" type="password"></p>
                        <input name="regist-token" value="0c5c5e922ccc92529040f6ef5b8aeb7e" type="hidden">
                        <input id="from" name="from" value="intercambia" type="hidden">
                    </form>
                </div>
            </div>
            <div id="login-msjresp" class="msj-notif">
                <img src="neo_exchanges/ajax-loader.GIF" style="margin-top:50px;">
            </div>
        </div>
        <button type="button" id="login-acc" form="login-form" title="Entrar">Iniciar Sesión</button>
        <button style="display: none;" type="button" id="login-rest-pass" form="login-from-rest" title="Enviar">Enviar</button>
        <button style="display: none;" type="button" id="regist-enviar" form="regist-form" title="Enviar">Enviar</button>
    </section>
</div>
<script>
    $(document).ready(function() {
        //TOOLTIPS
        $('.tooltipster').tooltipster({
            animation: 'fade',
            delay: 200,
            theme: 'tooltipster-red',
            touchDevices: true,
            trigger: 'hover',
            maxWidth: 240,
            position: 'bottom'
        });
        //VIDEO PRUEBALO
        if (screen.width <= 360) {
            $(".video-pruebalo-princ").fancybox({
                fitToView	: false,
                width		: '90%',
                height		: '200',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'elastic',
                closeEffect	: 'elastic'
            });
        }else if (screen.width <= 640){
            $(".video-pruebalo-princ").fancybox({
                fitToView	: false,
                width		: '400',
                height		: '300',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'elastic',
                closeEffect	: 'elastic'
            });
        }else{
            $(".video-pruebalo-princ").fancybox({
                fitToView	: false,
                width		: '600',
                height		: '400',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'elastic',
                closeEffect	: 'elastic'
            });
        }
    });
</script>
<div id="main" class="main-content">
    <!-- PASO 1 -->
    <div class="section-int banners" id="paso-1">
        <div id="jquery-loader" class="blue-with-image-2 loader1" style="display: none;"></div>
        <section id="banners" class="section banners row span_12">
            <div class="col span_12 mb">
                <div class="col">
                    <ul id="order_step" class="step pasosPedido clearfix">
                        <li class="step_current op1 first">
                            <span><em>01.</em> Tus Video Juegos</span>
                        </li>
                        <li class="step_todo op2 second">
                            <span><em>02.</em> Intercambio</span>
                        </li>
                        <li class="step_todo op3 third">
                            <span><em>03.</em> Completado</span>
                        </li>
                    </ul>
                    <div class="subt">Encuentra tus video juegos a intercambiar.</div>
                </div>
            </div>
            <div class="col span_12 nota">
                Si no encuentras tu video juego haznolo saber enviando un correo a <a href="mailto:gcabrera@neotienda.com"><b>gcabrera@neotienda.com</b></a>.<br>
            </div>
            <!-- BUSCADOR -->
            <div class="col span_12">
                <div class="col span_2" id="margin-busc-1">&nbsp;</div>
                <div class="col span_8">
                    <div class="input-group-">
                        <span class="input-group-busc">
                            <select name="plataformas-int" class="col span_3" id="plataformas-int"></select>
                            <input type="text" class="col span_8 buscador-alquiler ui-autocomplete-input ui-corner-all" placeholder="Agrega tus juegos aquí" value="" id="nombre_juego" name="nombre_juego" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                            <button tabindex="-1" id="buscar-int" class="btn-alq btn-default col span_1" type="button"><img class="lupa-int" src="neo_exchanges/lupa.png"></button>
                        </span>
                    </div>
                </div>
                <div class="col span_2" id="margin-busc-3">&nbsp;</div>
            </div>
            <!-- FIN BUSCADOR -->
            <div class="col span_12">
                <div class="col span_3">&nbsp;</div>
                <div class="col span_6" id="display"></div>
                <div class="col span_3"></div>
            </div>
            <input type="hidden" id="cont_item" value="0" />
            <div class="col span_12">
                <div class="col span_1">&nbsp;</div>
                <div class="col span_10" id="intercambio_select" style="display: none;">
                    <div class="col span_12">
                        <p>-. El monto que te acreditamos por tus juegos usados está sujeto a variaciones.</p>
                        <div class="col span_4" style="float: right">
                            <div class="button-sig">
                                <a href="javascript:void(0)" id="paso-2-sig" class="paso-sig button btn btn-default standard-checkout button-medium">
                                    <span>SIGUIENTE<i class="icon-chevron-right right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col span_1">&nbsp;</div>
            </div>
            <div class="col span_12 resultado-intercambia" id="resultado-intercambia"></div>
            <div class="clear"></div>
            <div class="col span_12 nota-intercambia">
                <div class="alert-acept" style="display: none; margin: 0 auto; width: 40%;">
                    <img style="float: left; width: 8%; margin: 0%;" src="neo_exchanges/alerta.png">
                    <h3 style="font-size: 15px; color: #FF0000;">DEBES ACEPTAR LOS TÉRMINOS</h3>
                </div>
                <input type="checkbox" name="acepto" id="acepto" value="1" /> <b class="nota-int">Acepto que mis video juegos estan en perfecto estado de caja, manual y disco.</b>
            </div>
        </section>
    </div>
    <!-- PASO 2 -->
    <div class="section-int banners" id="paso-2" style="display: none;">
        <div id="jquery-loader2" class="blue-with-image-2 loader2" style="display: none;"></div>
        <section id="news" class="section news row">
            <div class="col span_12" style="margin-bottom: 30px;">
                <div class="col">
                    <h2 style="color: #000000">ESCOGE EL JUEGO QUE QUIERES COMPRAR</h2>
                    <ul id="order_step" class="step pasosPedido clearfix">
                        <li class="step_todo op1 first">
                            <span><em>01.</em> Tus Video Juegos</span>
                        </li>
                        <li class="step_current op2 second">
                            <span><em>02.</em> Intercambio</span>
                        </li>
                        <li class="step_todo op3 third">
                            <span><em>03.</em> Completado</span>
                        </li>
                    </ul>
                    <p class="titulo_intercambio">Confirma el juego que seleccionaste y busca el juego que quieres obtener a cambio.</p>
                </div>
            </div>
            <div class="col span_3">
                <div class="col gam_select">
                    <h3 class="small" style="margin: 10px;">TUS JUEGOS:</h3>
                    <div class="col span_12" id="juego_select">
                        <div class="bloque-int-2">
                            <div class="col span_12 det-int">
                                <div id="res_item"></div>
                                <div class="res_total">Total: <span id="res_item_total">0</span> Bs.</div>
                                <div class="col span_12" style="text-align: left; padding-left: 10px;">
                                    <button class="close-int">Editar</button>
                                    <img src="neo_exchanges/editar-int.png" class="img-edit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: both;display: none;" id="nuevo" class="col gam_select">
                    <div style="padding-left: 10px" class="col span_12 juego-nuevo">
                        <h2>Detalle del cambio:</h2>
                        <p style="font-size: 14px !important;font-weight:bold;color:#000000;margin-top:10px !important" class="detalle">
                            Precio total: Bs. <span id="precio-nuevo">0</span>
                        </p>
                        <p style="font-size:14px !important;font-weight:bold;color:#000000;margin-top:5px !important" class="detalle">
                            Diferencia a pagar: <br><span id="dif-nuevo">0</span>
                        </p>
                        <p style="font-size:14px !important;font-weight:bold;color:#000" class="ptos-favor">
                            Monto a favor: <span id="fav-nuevo">0</span>
                        </p>
                        <div id="div_forma" style="font-size:14px;font-weight:bold;color:#000;margin-top:5px !important">Indicar forma de pago:<br>
                            <select id="forma_pago" name="forma_pago">
                                <option value="">Seleccione</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="Depósito">Depósito</option>
                                <option value="Efectivo">Efectivo</option>
                            </select>
                        </div>
                    </div>
                    <div style="text-align:center; margin: 12px 0;" class="col span_12">
                        <a class="button btn btn-default standard-checkout button-medium intercambiar-nuevo" href="javascript:void(0)">
                            <span>INTERCAMBIAR<i class="icon-chevron-right right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col span_1">&nbsp;</div>
            <div class="col span_8 sec_buscador">
                <p style="font-weight: bold; font-size: 14px; margin: 0px; margin-bottom: 18px;">POR CUALES QUIERES INTERCAMBIAR...</p>
                <div class="col span_3 busc-dos">
                    <select id="plataformas-store" class="col span_12 plataformas-st" name="plataformas-2"></select>
                </div>
                <div class="col span_8 cbuscar">
                    <input type="text" name="nombre_juego_store" id="nombre_juego_store" value="" placeholder="Busca el juego que quieres comprar..." class="col span_12 ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                </div>
                <button class="btn-alq btn-default" style="padding: 8px 12px 8px 12px" id="buscar-store"><img src="neo_exchanges/lupa.png" class="lupa-int"></button>
                <input type="hidden" id="cont_item_inv" value="0" />
                <div id="solo-dinero">
                    <input type="checkbox" id="check-dinero" value="">No hay lo que busco, prefiero el dinero.
                </div>
                <div id="f2-continue" style="text-align:center; margin-top: 12px;" class="col span_12">
                    <a class="button btn btn-default standard-checkout button-medium intercambiar-continuar" href="javascript:void(0)">
                        <span>CONTINUAR<i class="icon-chevron-right right"></i></span>
                    </a>
                </div>
                <div class="col span_12">
                    <div class="col span_12" id="store_select" style="margin-top: 30px; display: none;">
                        <div id="intercambio_fase2" class="bloque-store" style="margin-bottom: 0px;">
                        </div>
                        <div class="alert-term" style="display: none; margin-top: 2%;">
                            <img style="float: left; width: 3%; margin-right: 1%;" src="neo_exchanges/alerta.png">
                            <h3 style="font-size: 15px; color: #FF0000;">DEBES ACEPTAR LOS TÉRMINOS Y CONDICIONES</h3>
                        </div>
                        <div class="check-term"><input type="checkbox" class="termycond" name="aceptar-termycond" value="">He leído y acepto los <a href="#">Términos y Condiciones</a></div>
                    </div>
                </div>
            </div>
            <div class="col span_8" id="resultado-store"></div>
        </section>
    </div>
    <!-- PASO 3 -->
    <div class="section-int banners" id="paso-3" style="display: none;">
        <section id="banners" class="section banners row span_12">
            <div class="contenedor">
                <div class="col span_12" style="margin-bottom: 30px;">
                    <div class="col">
                        <ul id="order_step" class="step pasosPedido clearfix">
                            <li class="step_todo op1 first">
                                <span><em>01.</em> Tus Video Juegos</span>
                            </li>
                            <li class="step_todo op2 second">
                                <span><em>02.</em> Intercambio</span>
                            </li>
                            <li class="step_current op3 third">
                                <span><em>03.</em> Completado</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col span_6"></div>
                </div>
                <br><br>

                <h1 class="enc">¡Solicitud Exitosa! <span id="usuario-ped"></span></h1>
                <h3>
                    <b style="font-size: 14px; color: #000000;">Tienes una solicitud en <span style="color:green">PROCESO</span></b> <span id="pedido"></span>
                </h3>
                <br>

                <div class="col span_12" style="margin-bottom: 20px">
                    <div class="col span_4">&nbsp;</div>
                    <div class="col span_4 inf ref">
                        <p>Total de tus Juegos: <span id="tus-juegos">0</span> Bs.</p>
                        <p>Total intercambio: <span id="total-inter">0</span> Bs.</p>
                        <p>Monto a pagar: <span id="dif-pago">0</span> Bs.</p>
                        <p>Monto a favor: <span id="dif-favor">0</span> Bs.</p>
                    </div>
                    <div class="col span_3">&nbsp;</div>
                </div>
                <br><br>
                <h3>
                    <b style="font-size: 14px; color: #000000;">Te hemos enviado un correo con los pasos a seguir para completar tu solicitud.</b>
                </h3>
                <br>
                <div class="col span_12" style="margin-top: 20px">
                    <div style="">
                        <a href="javascript:void(0)" id="finalizar-int" class="button btn btn-default standard-checkout button-medium">
                            Finalizar
                        </a>
                    </div>
                    <div id="status">procesando</div>
                </div>
                <br><br>
            </div>
        </section>
    </div>
</div>
<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 1; top: 0px; left: 0px; display: none;"></ul>
<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 1; top: 0px; left: 0px; display: none;"></ul>
<script type="text/javascript">
    Redimensionar('footer-head','.');
    function Redimensionar(caja, idclase){
        var heightBlockMax=0;
        $(''+idclase+''+caja+'').each(function (){
            var alto = $(this).height();
            if( alto > heightBlockMax ){
                heightBlockMax = alto;
            }
        });
        $(''+idclase+''+caja+'').height(heightBlockMax);
    }
</script>
<script type="text/javascript" src="neo_exchanges/calculadora.js"></script>
<script type="text/javascript" src="neo_exchanges/explorar.js"></script>
<script type="text/javascript" src="neo_exchanges/conversion.js"></script>
<?php
include_once( 'footer.php' );
?>