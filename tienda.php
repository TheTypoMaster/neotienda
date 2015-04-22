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

    <!--<link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/normalize.min.css">-->
    <link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/index-menu.css">
    <link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/home.css">
    <!-- Fancybox CSS files -->
    <link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/jquery.fancybox.css" media="screen">
    <!-- Tooltips -->
    <link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/tooltipster.css">
    <link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/tooltipster-red.css">

    <!--<script async="" charset="utf-8" src="./Los Gamers Comunidad_files/saved_resource" type="text/javascript"></script>-->
    <script type="text/javascript" src="./Los Gamers Comunidad_files/jquery.1.7.1.js"></script>
    <script type="text/javascript" src="./Los Gamers Comunidad_files/jquery.ui.1.8.16.js"></script>
    <script type="text/javascript">
        var path = '/';
        var pais = 've';
    </script>
    <!--<script type="text/javascript" src="./Los Gamers Comunidad_files/main.js"></script>-->
    <script type="text/javascript" src="./Los Gamers Comunidad_files/respond.min.js"></script>
    <script type="text/javascript" src="./Los Gamers Comunidad_files/linker.js"></script>
    <script type="text/javascript" src="./Los Gamers Comunidad_files/select_pais.js"></script>
    <style id="css-ddslick" type="text/css">.select-bandera-content{float: right}p.text-selec-pais{float: right; margin: 0 0 0 5px; color: #000000;}.dd-select{ border:none; position:relative; cursor:pointer; color:#f6f6f6; font-family: Rockwell, Noto Sans; margin: 0 30%; }.dd-desc { color:#aaa; display:block; overflow: hidden; font-weight:normal; line-height: 1.4em !important; }.dd-selected{ float:left; font-size: 10px !important; overflow:hidden; display:block; padding:3px; hight:auto;}.dd-pointer{ width:0; height:0; position:absolute; top:50%; margin-top:7px;}.dd-pointer-down{ border:solid 5px transparent; border-top:solid 5px #000; }.dd-pointer-up{border:solid 5px transparent !important; border-bottom:solid 5px #000 !important; margin-top:-8px;}.dd-options{ border:solid 1px #ccc; border-top:none; list-style:none; box-shadow:0px 1px 5px #ddd; display:none; position:absolute; z-index:2000; margin:0 2%; padding:0;background:#fff; overflow:auto;}.dd-option{ font-size: 10px !important; padding:3px; display:block; border-bottom:solid 1px #ddd; overflow:hidden; text-decoration:none; color:#333 !important; cursor:pointer;-webkit-transition: all 0.25s ease-in-out; -moz-transition: all 0.25s ease-in-out;-o-transition: all 0.25s ease-in-out;-ms-transition: all 0.25s ease-in-out; }.dd-options > li:last-child > .dd-option{ border-bottom:none;}.dd-option:hover{ background:red; color:#000;}.dd-selected-description-truncated { text-overflow: ellipsis; white-space:nowrap; }.dd-option-selected { background:#f6f6f6; }.dd-option-image, .dd-selected-image { vertical-align:middle; float:left; margin-right:5px; max-width:64px; width:25px; margin-top: 0px;}.dd-image-right { float:right; margin-right:15px; margin-left:5px; margin-top:0px;}.dd-container{ margin: 0 auto;} .dd-selected-text { float:left;}.dd-selected:hover{ color: red;transition: background-color 100ms ease-in-out; -webkit-transition: background-color 100ms ease-in-out;}@media only screen and (max-width: 680px){ .dd-option-image, .dd-selected-image{margin-top: 1px;} .dd-pointer{margin-top: 8px;}}@media only screen and (max-width: 480px){ p.text-selec-pais, .dd-select{color:#000; font-size:10px;} .select-bandera-content{margin-left:3px;}}</style>
    <script type="text/javascript" src="./Los Gamers Comunidad_files/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="./Los Gamers Comunidad_files/home.js"></script>
    <!-- Fancybox JS files-->
    <script type="text/javascript" src="./Los Gamers Comunidad_files/jquery.fancybox.js"></script>
    <!-- Tooltips -->
    <script type="text/javascript" src="./Los Gamers Comunidad_files/jquery.tooltipster.min.js"></script>

    <style>
        .header-min{
            width: 100%;
            *//* background-image: url('../img/header-bg-0.png'); *//*
            background-position: center top;
            background-size: cover 100%;
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
        }
    </style>

<div id="mobile-menu" class="mobile-menu">
    <i class="icon-home icon-menu-mobile"></i>
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
<link rel="stylesheet" type="text/css" href="./Los Gamers Comunidad_files/intercambio_usados.css">
<!-- <link rel="stylesheet" type="text/css" href="/themes/default/css/jquery.ui.css"/> -->

<!-- PASO 1 -->
<div class="section-int banners" id="paso-1">
    <div id="jquery-loader" class="blue-with-image-2 loader1" style="display: none;"></div>

    <section id="banners" class="section banners row span_12">
        <div class="col span_12 mb">
            <div class="col">
                <h2>INTERCAMBIA TUS VIDEO JUEGOS</h2>
                <ul class="pasosPedido">
                    <li class="arrow_box op1 activo" style="height: 40px; width: 32%">TUS VIDEO JUEGOS</li>
                    <li class="arrow_box op2" style="height: 40px; width: 32%">INTERCAMBIO</li>
                    <li class="arrow_box op3" style="height: 40px; width: 32%">COMPLETADO</li>
                </ul>
                <p class="subt">Encuentra tus video juegos a intercambiar.</p>
            </div>
        </div>

        <!-- BUSCADOR -->
        <div class="col span_12">
            <div class="col span_2" id="margin-busc-1">&nbsp;</div>
            <div class="col span_8">
                <div class="input-group-">
                    <span class="input-group-busc">
                        <select name="plataformas-int" class="col span_2" id="plataformas-int"></select>
                        <input type="text" class="col span_9 buscador-alquiler ui-autocomplete-input ui-corner-all" placeholder="Agrega tus juegos aquí" value="" id="nombre_juego" name="nombre_juego" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                        <button tabindex="-1" id="buscar-int" class="btn-alq btn-default col span_1" type="button"><img class="lupa-int" src="./Los Gamers Comunidad_files/lupa.png"></button>
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
                    <p>*El monto que te acreditamos por tus juegos usados está sujeto a variaciones.
                        <br>*Te garantizamos los puntos que esperas recibir sólo si la consulta y el envío son el mismo día.</p>
                    <div class="col span_4" style="float: right"><div class="button-sig"><button id="paso-2-sig" class="paso-sig">SIGUIENTE PASO</button></div></div>
                </div>
            </div>
            <div class="col span_1">&nbsp;</div>
        </div>
        <div class="col span_12 nota-intercambia" id="nota-intercambia">
            Si no encuentras tu video juego haznolo saber enviando un correo a <a href="mailto:gcabrera@neotienda.com"><b>gcabrera@neotienda.com</b></a>.
        </div>
        <div class="col span_12 resultado-intercambia" id="resultado-intercambia"></div>
        <div class="clear"></div>
        <div class="col span_12 nota-intercambia">
            <div class="alert-acept" style="display: none; margin: 0 auto; width: 40%;">
                <img style="float: left; width: 8%; margin: 0%;" src="./Los Gamers Comunidad_files/alerta.png">
                <h3 style="font-size: 15px; color: #FF0000;">DEBES ACEPTAR LOS TÉRMINOS</h3>
            </div>
            <input type="checkbox" name="acepto" id="acepto" value="1" /> <b class="nota-int">Acepto que mis video juegos estan en perfecto estado, caja, manual y disco.</b>
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
                <ul class="pasosPedido">
                    <li class="arrow_box op1 activo" style="height: 40px; width: 32%">TUS VIDEO JUEGOS</li>
                    <li class="arrow_box op2" style="height: 40px; width: 32%">INTERCAMBIO</li>
                    <li class="arrow_box op3" style="height: 40px; width: 32%">COMPLETADO</li>
                </ul>
                <p class="subt">Confirma el juego que seleccionaste y busca el juego que quieres obtener a cambio.</p>
            </div>
        </div>

        <div class="col span_3">
            <div class="col gam_select">
                <h3 class="small" style="margin: 10px;">TUS JUEGO:</h3>
                <div class="col span_12" id="juego_select">
                    <div class="bloque-int-2">
                        <div class="col span_12 det-int">
                            <div id="res_item"></div>
                            <div class="res_total">Total: <span id="res_item_total">0</span> Bs.</div>
                            <div class="col span_12" style="text-align: left; padding-left: 10px;">
                                <button class="close-int">Editar</button>
                                <img src="./Los Gamers Comunidad_files/editar-int.png" class="img-edit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="height: 213.399999976158px;clear: both;display: none;" id="nuevo" class="col gam_select">
                <div style="padding-left: 10px" class="col span_12 juego-nuevo">
                    <h2>Detalle del cambio:</h2>
                    <p style="font-size: 14px ! important; font-weight: bold; color: #000000; margin-top: 10px ! important;" class="detalle">
                        Precio total: Bs. <span id="precio-nuevo">0</span>
                    </p>
                    <p style="font-size: 14px ! important; font-weight: bold; color: #000000; margin-top: 10px ! important;" class="detalle">
                        Diferencia a pagar: <br><span id="dif-nuevo">0</span><span style="font-size: 14px"></span>
                    </p>
                    <p style="display: block;" class="ptos-favor">Monto a favor: <span id="fav-nuevo">0</span><span style="font-size: 14px"></span></p>
                </div>
                <div style="text-align:center; margin-top: 12px;" class="col span_12"><a class="btn btn-primary intercambiar-nuevo" href="javascript:void(0)">INTERCAMBIAR</a></div>
            </div>
        </div>

        <div class="col span_1">&nbsp;</div>
        <div class="col span_8 sec_buscador">
            <p style="font-weight: bold; font-size: 14px; margin: 0px; margin-bottom: 18px;">Y QUIERES COMPRAR...</p>
            <div class="col span_2 busc-dos">
                <select id="plataformas-store" class="col span_12 plataformas-st" name="plataformas-2"></select>
            </div>

            <div class="col span_9 cbuscar">
                <input type="text" name="nombre_juego_store" id="nombre_juego_store" value="" placeholder="Busca el juego que quieres comprar..." class="col span_12 ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
            </div>
            <button class="btn-alq btn-default" style="padding: 8px 12px 8px 12px" id="buscar-store"><img src="./Los Gamers Comunidad_files/lupa.png" class="lupa-int"></button>

            <input type="hidden" id="cont_item_inv" value="0" />
            <div class="col span_12">
                <div class="col span_12" id="store_select" style="margin-top: 30px; display: none;">
                    <div id="intercambio_fase2" class="bloque-store" style="margin-bottom: 0px;">

                    </div>
                    <div class="alert-term" style="display: none; margin-top: 2%;">
                        <img style="float: left; width: 3%; margin-right: 1%;" src="./Los Gamers Comunidad_files/alerta.png">
                        <h3 style="font-size: 15px; color: #FF0000;">DEBES ACEPTAR LOS TÉRMINOS Y CONDICIONES</h3>
                    </div>
                    <div class="check-term"><input type="checkbox" class="termycond" name="aceptar-termycond" value="">He leído y acepto los <a href="http://www.losgamers.com/intercambia/terminosycondiciones">Términos y Condiciones</a></div>
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
                    <h2>INTERCAMBIO FINALIZADO</h2>
                    <ul class="pasosPedido">
                        <li class="arrow_box op1 activo" style="height: 40px; width: 32%">TUS VIDEO JUEGOS</li>
                        <li class="arrow_box op2" style="height: 40px; width: 32%">INTERCAMBIO</li>
                        <li class="arrow_box op3" style="height: 40px; width: 32%">COMPLETADO</li>
                    </ul>
                </div>
                <div class="col span_6"></div>
            </div>
            <br><br>

            <h1 class="enc">!Bien Hecho! <span id="usuario-ped"></span></h1>
            <h3>
                <b style="font-size: 14px; color: #000000;">Tienes una operación de intercambio <span style="color:green">ACTIVA</span></b> <span id="pedido"></span>
            </h3>
            <br>

            <div class="col span_12">
                <div class="col span_3">&nbsp;</div>
                <div class="col span_6 inf">
                    <img src="" width="90" height="" align="left" id="imagen-ped">
                    <p id="titulo-ped"></p>
                    <p><span id="puntos-ped"></span> Puntos</p>
                    <p>Equivalente a: <span id="equiv-ped"></span></p>
                </div>
                <div class="col span_3">&nbsp;</div>
            </div>
            <br><br><br>

            <div class="col span_12"><h2 style="text-align: left; font-weight: bold;">PASOS A SEGUIR</h2></div>
            <div class="col span_12">
                <div class="col span_12 infografia">
                    <div class="col span_1">&nbsp;</div>
                    <div class="col span_3">
                        1) Envía tu juego por<br>
                        <b>ZOOM BRM 1436</b> o entrégalo<br>
                        en una de nuestras tiendas<br>
                        autorizadas<br><br>
                        <a href="http://ve.losgamers.com/store/tiendas-autorizadas.html" target="_blank"><img src="./Los Gamers Comunidad_files/tienda-autorizada.png" width="160" id="tienda-autorizada"></a>
                    </div>
                    <div class="col span_4">
                        2) Reporta tu envío<br>
                        <b>enviándonos el código</b> de<br>
                        confirmación a:<br>
                        <img src="./Los Gamers Comunidad_files/icon-email.png" id="icon-email">
                    </div>
                    <div class="col span_3">
                        3) Al confirmar tu juego te<br>
                        acreditamos tus puntos y puedes<br>
                        <b>usarlos en nuestra tienda.</b><br>
                        <img src="./Los Gamers Comunidad_files/puntos-cover.png" id="puntos-cover">
                    </div>
                    <p style="text-align: left; display: inline-block;">
                        Queremos brindarte el mejor servicio y siempre ser transparentes contigo, para que juntos hagamos crecer esta comunidad. Por eso queremos recordarte que <b>los precios de los títulos en LosGamers.com estarán sujetos a variaciones imprevistas</b> que dependen de varios factores entre esos la disponibilidad de existencia.
                    </p>
                </div>
                <div class="col span_12" style="font-size: 14px; font-weight: bold; margin-top: 25px;">Te enviaremos un correo con el detalle de la transacción</div>
            </div>
            <div class="col span_12">
                <div style="margin: 30px 0 20px 0">
                    <button id="finalizar-int">FINALIZAR</button>
                </div>
                <div id="status">procesando</div>
            </div>
            <br><br>
        </div>
    </section>
</div>
<script type="text/javascript" src="./Los Gamers Comunidad_files/calculadora.js"></script>
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
<script type="text/javascript" src="./Los Gamers Comunidad_files/explorar.js"></script>
<script type="text/javascript" src="./Los Gamers Comunidad_files/conversion.js"></script>

<?php
include_once( 'footer.php' );
?>