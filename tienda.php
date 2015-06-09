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

<div id="mobile-menu" class="mobile-menu">
    <i class="icon-home icon-menu-mobile"></i>
</div>
<div id="loginInter" style="height: 365px;width: 450px;margin: 5px auto;padding: 5px;background-color: #ffffff;display: none">
    <link rel="stylesheet" type="text/css" href="neo_exchanges/style.css">
    <script type="text/javascript" src="neo_exchanges/funciones.js"></script>
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