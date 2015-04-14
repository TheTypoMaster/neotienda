$.ajax({
    type: "POST",
    url: "getConsolas.php",
    success: function(result) {
        $("#plataformas-int").append(result);
        $("#plataformas-store").append(result);
    }
});

function Redimensionar(caja, idclase, padd) {
    var heightBlockMax = 0;
    $("" + idclase + "" + caja + "").each(function() {
        var alto = $(this).height();
        if (alto > heightBlockMax) {
            heightBlockMax = parseInt(alto) + parseInt(padd)
        }
    });
    $("" + idclase + "" + caja + "").height(heightBlockMax)
}
$("#nombre_juego").autocomplete({
    source: function(request, response) {
        $.ajax({
            type: "POST",
            url: "getVideoJuegosUsados.php",
            data: {
                store: "2",
                plataforma: $("#plataformas-int").val(),
                tipo: "buyback",
                titulo: request.term,
                pais: pais
            },
            dataType: "json",
            success: function(data) {
                response(
                    $.map(
                        data,
                        function(item) {
                            return {
                                id: item.id,
                                sku: item.sku,
                                label: item.label,
                                price: item.price,
                                imagen: item.imagen
                            }
                        }
                    )
                );
                $(document).keypress(
                    function(e) {
                        if (e.which == 13) {
                            $("ul.ui-autocomplete").css("display", "none !important")
                        }
                    }
                )
            },
            error: function(error) {
                alert(error)
            }
        })
    },
    minLength: 2,
    select: function(event, ui) {
        $("#nota-intercambia").hide();
        $(".footer").css("margin-top", "0");
        var id = ui.item.id;
        var sku = ui.item.sku;
        var titulo = ui.item.label;
        var puntos = ui.item.price;
        var imagen = ui.item.imagen;
        var bs = 1;
        var dolar = 1;
        var pesos = 1;
        var simb_bs = "Bs. ";
        var simb_dolar = "US$ ";
        var simb_pesos = "RD$ ";
        $("#intercambio_select").show();

        var ptos = 1;
        var precio_2 = (puntos * bs) / ptos;
        precio_2 = precio_2.toFixed(0);

        $('<div/>', {
            class: 'bloque-int',
            style: 'margin-bottom: 0px; border: 1px solid #ccc; margin-top: 50px;',
            id: 'item_'+id
        }).append(
            $('<i/>', { class: 'close', id: id }).append("X"),
            $('<img/>', { class: 'img-int', src: imagen, width: '120', height: '' }),
            $('<div/>', { class: 'col span_5' }).append(
                $('<div/>', { class: 'col span_9 info' }).append(
                    $('<p/>', { id: 'titulo-int' }).html(titulo),
                    $('<p/>', { class: 'puntos-int' }).append(
                        $('<span/>', { id: 'puntos-int' }).html(puntos),
                        'Puntos'
                    )
                ),
                $('<div/>', { class: 'col span_3 igual' }).append(
                    $('<img/>', { src: './Los Gamers Comunidad_files/igual.png' })
                )
            ),
            $('<div/>', {
                class: 'col span_5 equiv'
            }).append(
                $('<p/>').append(
                    'Equivale a...',
                    $('<br/>'),
                    $('<br/>'),
                    $('<span/>',{ id: 'equiv-int' }).html(simb_bs + precio_2 + ",00"),
                    $('<br/>'),
                    $('<br/>'),
                    $('<span/>',{ class: 'usar' }).append('...para usar en nuestra tienda.')
                )
            )
        ).appendTo('#intercambio_select');

        $("#resultado-intercambia").hide(500, "linear");
        var cont = Number($("#cont_item").val()) + Number(1);
        $("#cont_item").attr('value', cont);

        $("#img-int-2").attr("src", imagen);
        $("#sku-int-2").html(sku);
        $("#titulo-int-2").html(titulo);
        $("#puntos-int-2").html(puntos);
        if (pais == "ve") {
            var ptos = 1;
            var precio_2 = (puntos * bs) / ptos;
            $("#equiv-int-2").html(simb_bs + precio_2)
        } else {
            if (pais == "us") {
                var ptos = 100;
                var precio_2 = (puntos * dolar) / ptos;
                $("#equiv-int-2").html(simb_dolar + precio_2)
            } else {
                if (pais == "do") {
                    var ptos = 1.5;
                    var precio_2 = (puntos * pesos) / ptos;
                    precio_2 = Math.ceil(precio_2);
                    $("#equiv-int-2").html(simb_pesos + precio_2)
                }
            }
        }

        $(".close").click(function() {
            $("#item_"+this.id).hide(500, "linear");
            $("#item_"+this.id).remove();
            var cont = Number($("#cont_item").val()) - Number(1);
            $("#cont_item").attr('value', cont);
            if($("#cont_item").val()==0){
                $("#intercambio_select").hide(500, "linear");
                $("#resultado-intercambia").show(500, "linear");
                //buscador_intercambio()
            }
        })
    },
    open: function() {
        $(this).removeClass("ui-corner-all").addClass("ui-corner-top")
    },
    close: function() {
        $(this).removeClass("ui-corner-top").addClass("ui-corner-all")
    }
}).data("autocomplete")._renderItem = function(ul, item) {
    var display = $("#intercambio_select").css("display");
    if (display == "block") {
        $(".footer").css("margin-top", "0")
    } else {
        $(".footer").css("margin-top", "300px")
    }
    return $("<li>").data("item.autocomplete", item).append("<a style='height:60px'><img width='' height='50' id='img-result5' src='" + item.imagen + "' style='float:left'><span style='font-size:11px; font-family: Rockwell;'>&nbsp;" + item.label + "</span> <br />&nbsp;<span class='puntos-aut'> " + item.price + " Puntos</span></a>").appendTo(ul)
};
$("#nombre_juego_store").autocomplete({
    source: function(request, response) {
        if (pais == "ve") {
            var store = 3
        } else {
            if (pais == "us") {
                var store = 1
            } else {
                if (pais == "do") {
                    var store = 4
                }
            }
        }
        $.ajax({
            type: "POST",
            url: "getVideoJuegos.php",
            data: {
                store: store,
                plataforma: $("#plataformas-int").val(),
                tipo: "simple",
                titulo: request.term,
                pais: pais
            },
            dataType: "json",
            success: function(data) {
                response($.map(data, function(item) {
                    return {
                        sku: item.sku,
                        label: item.label,
                        price: item.price,
                        precio_usado: item.precio_usado,
                        imagen: item.imagen
                    }
                }));
                $(document).keypress(function(e) {
                    if (e.which == 13) {
                        $("ul.ui-autocomplete").css("display", "none !important")
                    }
                })
            },
            error: function(error) {
                alert(error)
            }
        })
    },
    minLength: 2,
    select: function(event, ui) {
        var sku_nuevo = ui.item.sku;
        var titulo_nuevo = ui.item.label;
        var precio_nuevo = ui.item.price;
        var precio_usado = ui.item.precio_usado;
        var imagen_nuevo = ui.item.imagen;
        var bs = 1;
        var dolar = 1;
        var simb_bs = "Bs. ";
        var simb_dolar = "US$ ";
        var simb_pesos = "RD$ ";
        if (pais == "ve") {
            var moneda = simb_bs
        } else {
            if (pais == "us") {
                var moneda = simb_dolar
            } else {
                if (pais == "do") {
                    var moneda = simb_pesos
                }
            }
        }
        $("#img-nuevo").attr("src", imagen_nuevo);
        $("#sku-nuevo").html(sku_nuevo);
        $("#titulo-nuevo").html(titulo_nuevo);
        $("#precio-nuevo").html(moneda + precio_nuevo);
        if (pais == "ve") {
            var ptos = 1;
            var puntos_nuevo = (precio_nuevo * ptos);
            puntos_nuevo = puntos_nuevo.toFixed(0);
            $("#puntos-nuevo").html(puntos_nuevo)
        } else {
            if (pais == "us") {
                var ptos = 100;
                var puntos_nuevo = (precio_nuevo * ptos);
                puntos_nuevo = puntos_nuevo.toFixed(0);
                $("#puntos-nuevo").html(puntos_nuevo)
            } else {
                if (pais == "do") {
                    var ptos = 1.5;
                    var puntos_nuevo = (precio_nuevo * ptos);
                    puntos_nuevo = puntos_nuevo.toFixed(0);
                    $("#puntos-nuevo").html(puntos_nuevo)
                }
            }
        }
        var ptos_int = parseInt($("#puntos-int-2").text());
        var ptos_nuevo = parseInt(puntos_nuevo);
        var dif = (ptos_nuevo - ptos_int);
        if (dif > 0) {
            if (pais == "ve") {
                var ptos = 1;
                var dif = (dif / ptos)
            } else {
                if (pais == "us") {
                    var ptos = 100;
                    var dif = (dif / ptos)
                } else {
                    if (pais == "do") {
                        var ptos = 1.5;
                        var dif = (dif / ptos);
                        dif = dif.toFixed(0)
                    }
                }
            }
            $("#dif-nuevo").html(moneda + " " + dif);
            $(".ptos-favor").css("display", "none")
        } else {
            $("#dif-nuevo").html("0");
            $(".ptos-favor").css("display", "block");
            $("#fav-nuevo").html(dif * -1)
        }
        if (pais == "us" || pais == "do") {
            $("div.bloque-store > div#usado").hide()
        }
        if (precio_usado > "0") {
            $("div.bloque-store > #usado").show();
            $("#img-usado").attr("src", imagen_nuevo);
            $("#sku-usado").html(sku_nuevo);
            $("#titulo-usado").html(titulo_nuevo);
            $("#precio-usado").html(moneda + precio_usado);
            if (pais == "ve") {
                var ptos = 1;
                var puntos_usado = (precio_usado * ptos);
                $("#puntos-usado").html(puntos_usado)
            } else {
                if (pais == "us") {
                    var ptos = 100;
                    var puntos_usado = (precio_usado * ptos);
                    $("#puntos-usado").html(puntos_usado)
                } else {
                    if (pais == "do") {
                        var ptos = 0.44;
                        var puntos_usado = (precio_usado * ptos);
                        puntos_usado = puntos_usado.toFixed(0);
                        $("#puntos-usado").html(puntos_usado)
                    }
                }
            }
            var ptos_usado = parseInt(puntos_usado);
            var dif = (ptos_usado - ptos_int);
            if (dif > 0) {
                if (pais == "ve") {
                    var ptos = 1;
                    var dif = (dif / ptos)
                } else {
                    if (pais == "us") {
                        var ptos = 100;
                        var dif = (dif / ptos)
                    } else {
                        if (pais == "do") {
                            var ptos = 1.5;
                            var dif = (dif / ptos);
                            dif = dif.toFixed(0)
                        }
                    }
                }
                $("#dif-usado").html(moneda + dif);
                $(".ptos-favor-u").css("display", "none")
            } else {
                $("#dif-usado").html(moneda + "0");
                $(".ptos-favor-u").css("display", "block");
                $("#fav-usado").html(dif * -1)
            }
        } else {
            $("div.bloque-store > #usado").hide()
        }
        $("#store_select").show();
        $("#resultado-store").hide(500, "linear");
        var id_usuario = getCookie("login");
        var sku_int = $("#sku-int-2").text();
        var pedidos_id = "";
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                id_usuario: id_usuario,
                sku_int: sku_int,
                sku_calc: sku_nuevo,
                pedidos_id: pedidos_id
            },
            url: "http://www.losgamers.com/intercambia/setCalculadora",
            async: true,
            success: function(result) {}
        });
        $(".close_store").click(function() {
            $("#store_select").hide(500, "linear");
            $("#resultado-store").show(500, "linear")
        });
        Redimensionar("bloque-nu", ".", "20")
    }
}).data("autocomplete")._renderItem = function(ul, item) {
    var display = $("#intercambio_select").css("display");
    if (display == "block") {
        $(".footer").css("margin-top", "0")
    } else {
        $(".footer").css("margin-top", "300px")
    }
    return $("<li>").data("item.autocomplete", item).append("<a style='height:60px'><img width='' height='50' id='img-result5' src='" + item.imagen + "' style='float:left'><span style='font-size:11px; font-family: Rockwell;'>&nbsp;" + item.label + "</span> <br />&nbsp;<span class='puntos-aut'> " + item.price + " Puntos</span></a>").appendTo(ul)
};
(function($) {
    $.get = function(key) {
        key = key.replace(/[\[]/, "\\[");
        key = key.replace(/[\]]/, "\\]");
        var pattern = "[\\?&]" + key + "=([^&#]*)";
        var regex = new RegExp(pattern);
        var url = unescape(window.location.href);
        var results = regex.exec(url);
        if (results === null) {
            return null
        } else {
            return results[1]
        }
    }
})(jQuery);
$("#paso-2").hide();
$("#paso-3").hide();
$(".intercambiar-usado").hide();
$("#jquery-loader").hide();
$("#jquery-loader2").hide();
$("#intercambio_select").hide();
$("#store_select").hide();
$("#nombre_juego").focus();
$(".op1").addClass("activo");
$("html, body").animate({
    scrollTop: $("#ancla-1").offset().top
});
$("#nombre_juego").keypress(function(e) {
    if (e.which == 13) {
        var juego = $("#nombre_juego").val();
        if (juego != "") {
            buscador_intercambio()
        }
    }
});
$("#buscar-int").click(function(e) {
    var juego = $("#nombre_juego").val();
    if (juego != "") {
        buscador_intercambio()
    }
});
$("#nombre_juego_store").keypress(function(e) {
    if (e.which == 13) {
        var juego = $("#nombre_juego_store").val();
        if (juego != "") {
            buscador_store()
        }
    }
});
$("#buscar-store").click(function(e) {
    var juego = $("#nombre_juego_store").val();
    if (juego != "") {
        buscador_store()
    }
});

function buscador_intercambio() {
    $("ul.ui-autocomplete").css("display", "none");
    var titulo_int = $("#nombre_juego").val();
    var titulo = titulo_int.split(" ").join("-");
    var plataforma_int = $("#plataformas-int").val();
    var plataforma = plataforma_int.split(" ").join("-");
    var store = 2;
    var tipo = "buyback";
    $("#resultado-intercambia").empty();
    $("#intercambio_select").hide(500, "linear");
    $("#paso-2").hide(500, "linear");
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {
            store: store,
            titulo: titulo,
            plataforma: plataforma,
            tipo: tipo,
            pais: pais
        },
        url: "http://www.losgamers.com/intercambia/getTitulos",
        async: true,
        beforeSend: function() {
            $("#msjresp").html('<img class="msjresp" src="img/ajax-loader.gif"/>');
            $("#msjresp").show()
        },
        cache: false,
        beforeSend: function() {
            $("#jquery-loader").show()
        },
        success: function(result) {
            $("ul.ui-autocomplete").css("display", "none");
            $("#jquery-loader").hide();
            $("#display").css("display", "none");
            $("#nombre_juego").val("");
            $("#nota-intercambia").hide();
            $("#resultado-intercambia").show();
            if (result.success) {
                var totalCount = result.totalCount;
                $("#resultado-intercambia").empty();
                if (totalCount == 0) {
                    $("#resultado-intercambia").html('<div style="text-align: center;"><img src="https://s3.amazonaws.com/comunidad.losgamers/pruebalo/alerta.png"/><h2 style="text-align:center; margin-top: 6px;">No encontramos resultados</h2><p style="font-size: 18px; margin: 0px;">¡Intenta realizar otra búsqueda!<br>o escríbenos a info@losgamers.com</p></div>')
                }
                var arreglo = result.resultado;
                var i = 0;
                $.each(arreglo, function(key, value) {
                    var datos = value;
                    var imagen = datos.image;
                    var sku = datos.sku;
                    var nombre = datos.name;
                    var precio = datos.price;
                    if (imagen != "http://www.losgamers.com/store/media/catalog/product") {
                        $("#resultado-intercambia").append("<div class='col span_3 titulos' id='bloque_" + i + "'><span id='sku-result" + i + "' style='display: none;'>" + sku + "</span><img src='" + datos.image + "' width='' height='150' id='img-result" + i + "' /><p class='nombre_titulo_int' id='titulo-result" + i + "'>" + nombre + "</p><span id='price-result" + i + "'> " + precio + " Puntos</span></div>")
                    } else {
                        $("#resultado-intercambia").append("<div class='col span_3 titulos' id='bloque_" + i + "'><span id='sku-result" + i + "' style='display: none;'>" + sku + "</span><img src='http://store.losgamers.com/media/catalog/product/3/-/3-plataformas.jpg' width='' height='150' id='img-result" + i + "' /><p class='nombre_titulo_int' id='titulo-result" + i + "'>" + nombre + "</p><span id='price-result" + i + "'>" + precio + "Puntos</span></div>")
                    }
                    i = i + 1
                });
                Redimensionar("nombre_titulo_int", ".", "5");
                var size = $(".titulos").size();
                if (size > 0) {
                    $(".titulos").click(function() {
                        var res = $(this).html();
                        var j = $(this).index();
                        var imagen = $("#img-result" + j).attr("src");
                        var titulo = $("#titulo-result" + j).html();
                        var sku = $("#sku-result" + j).html();
                        var puntos = parseInt($("#price-result" + j).text());
                        var bs = 1;
                        var dolar = 1;
                        var pesos = 1;
                        var simb_bs = "Bs. ";
                        var simb_dolar = "US$ ";
                        var simb_pesos = "RD$ ";
                        $("#intercambio_select").show();
                        $("#img-int").attr("src", imagen);
                        $("#titulo-int").html(titulo);
                        $("#puntos-int").html(puntos);
                        if (pais == "ve") {
                            var ptos = 1;
                            var precio_2 = (puntos * bs) / ptos;
                            $("#equiv-int").html(simb_bs + precio_2 + ",00")
                        } else {
                            if (pais == "us") {
                                var ptos = 100;
                                var precio_2 = (puntos * dolar) / ptos;
                                $("#equiv-int").html(simb_dolar + precio_2)
                            } else {
                                if (pais == "do") {
                                    var ptos = 1.5;
                                    var precio_2 = (puntos * pesos) / ptos;
                                    precio_2 = Math.ceil(precio_2);
                                    $("#equiv-int").html(simb_pesos + precio_2)
                                }
                            }
                        }
                        $("#resultado-intercambia").hide(500, "linear");
                        $("#img-int-2").attr("src", imagen);
                        $("#sku-int-2").html(sku);
                        $("#titulo-int-2").html(titulo);
                        $("#puntos-int-2").html(puntos);
                        if (pais == "ve") {
                            var ptos = 1;
                            var precio_2 = (puntos * bs) / ptos;
                            $("#equiv-int-2").html(simb_bs + precio_2)
                        } else {
                            if (pais == "us") {
                                var ptos = 100;
                                var precio_2 = (puntos * dolar) / ptos;
                                $("#equiv-int-2").html(simb_dolar + precio_2)
                            } else {
                                if (pais == "do") {
                                    var ptos = 1.5;
                                    var precio_2 = (puntos * pesos) / ptos;
                                    precio_2 = Math.ceil(precio_2);
                                    $("#equiv-int-2").html(simb_pesos + precio_2)
                                }
                            }
                        }
                        $(".close").click(function() {
                            $("#intercambio_select").hide(500, "linear");
                            $("#resultado-intercambia").show(500, "linear")
                        });
                        var ptos_nuevo = $("#puntos-nuevo").text();
                        var puntos_usado = $("#puntos-usado").text();
                        var ptos_int = parseInt($("#puntos-int-2").text());
                        var dif = (ptos_nuevo - ptos_int);
                        var dif_us = (puntos_usado - ptos_int);
                        if (dif > 0) {
                            if (pais == "ve") {
                                var moneda = "Bs. ";
                                var ptos = 1;
                                var dif = (dif / ptos);
                                var dif_us = (dif_us / ptos)
                            } else {
                                if (pais == "us") {
                                    var moneda = "US$ ";
                                    var ptos = 100;
                                    var dif = (dif / ptos);
                                    var dif_us = (dif_us / ptos)
                                } else {
                                    if (pais == "do") {
                                        var moneda = "RD$ ";
                                        var ptos = 1.5;
                                        var dif = (dif / ptos);
                                        var dif_us = (dif_us / ptos)
                                    }
                                }
                            }
                            $("#dif-nuevo").html(moneda + " " + dif);
                            $("#dif-usado").html(moneda + " " + dif_us);
                            $(".ptos-favor").css("display", "none");
                            $(".ptos-favor-u").css("display", "none")
                        } else {
                            $("#dif-nuevo").html("0");
                            $("#dif-usado").html("0");
                            $(".ptos-favor").css("display", "block");
                            $(".ptos-favor-u").css("display", "block");
                            $("#fav-nuevo").html(dif * -1);
                            $("#fav-usado").html(dif_us * -1)
                        }
                    })
                }
            } else {
                alert("falso")
            }
        },
        error: function(result) {
            $("#resultado-intercambia").html('<p align="center">Error al buscar el titulo</p>');
            $("#resultado-intercambia").show();
            $("#jquery-loader").hide()
        }
    })
}
$("#paso-2-sig").click(function() {
    var interc = $("#titulo-int").html();
    if (interc != "") {
        $("#paso-1").hide();
        $("#paso-2").show();
        $(".op1").removeClass("activo");
        $(".op2").addClass("activo");
        $("#nombre_juego_store").focus();
        $("html, body").stop().animate({
            scrollTop: $("#ancla-1").offset().top
        }, 1000)
    }
});
$(".op2").click(function() {
    var store = $("#titulo-int-2").html();
    if (store != "") {
        $("#paso-1").hide();
        $("#paso-2").show();
        $(".op1").removeClass("activo");
        $(".op2").addClass("activo");
        $("#nombre_juego_store").focus();
        $("html, body").stop().animate({
            scrollTop: $("#ancla-1").offset().top
        }, 1000)
    }
});
$(".close-int, .op1").click(function() {
    $("#paso-1").show();
    $("#paso-2").hide();
    $(".op2").removeClass("activo");
    $(".op1").addClass("activo");
    $("html, body").stop().animate({
        scrollTop: $("#ancla-1").offset().top
    }, 1000);
    $("#intercambio_select").hide(500, "linear");
    $("#resultado-intercambia").show(500, "linear")
});
$(".close-store").click(function() {
    $("#store_select").hide(500, "linear");
    $("#resultado-store").show(500, "linear")
});

function buscador_store() {
    $("ul.ui-autocomplete").css("display", "none");
    var titulo_st = $("#nombre_juego_store").val();
    var titulo = titulo_st.split(" ").join("-");
    var plataforma_st = $("#plataformas-store").val();
    var plataforma = plataforma_st.split(" ").join("-");
    if (pais == "ve") {
        var store = 3
    } else {
        if (pais == "us") {
            var store = 1
        } else {
            if (pais == "do") {
                var store = 4
            }
        }
    }
    var tipo = "simple";
    $("#resultado-store").empty();
    $("#store_select").hide(500, "linear");
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {
            store: store,
            titulo: titulo,
            plataforma: plataforma,
            tipo: tipo,
            pais: pais
        },
        url: "http://www.losgamers.com/intercambia/getTitulos",
        async: true,
        beforeSend: function() {
            $("#msjresp").html('<img class="msjresp" src="img/ajax-loader.gif"/>');
            $("#msjresp").show()
        },
        cache: false,
        beforeSend: function() {
            $("#jquery-loader2").show()
        },
        success: function(result) {
            $("#jquery-loader2").hide();
            $("#resultado-store").show();
            if (result.success) {
                var arreglo = result.resultado;
                var i = 0;
                var totalCount = result.totalCount;
                $("#resultado-store").empty();
                if (totalCount == 0) {
                    $("#resultado-store").html('<div style="text-align: center;"><img src="https://s3.amazonaws.com/comunidad.losgamers/pruebalo/alerta.png"/><h2 style="text-align:center; margin-top: 6px;">No encontramos resultados</h2><p style="font-size: 18px; margin: 0px;">¡Intenta realizar otra búsqueda!<br>o escríbenos a info@losgamers.com</p></div>')
                }
                $.each(arreglo, function(key, value) {
                    var datos = value;
                    var imagen = datos.image;
                    var sku = datos.sku;
                    var nombre = datos.name;
                    var precio_usado = datos.precio_usado;
                    var simb_bs = "Bs. ";
                    var simb_dolar = "US$ ";
                    var simb_pesos = "RD$ ";
                    if (pais == "ve") {
                        var moneda = simb_bs;
                        var precio = datos.special_price
                    } else {
                        if (pais == "us") {
                            var moneda = simb_dolar;
                            var precio = datos.price
                        } else {
                            if (pais == "do") {
                                var moneda = simb_pesos;
                                var precio = datos.price
                            }
                        }
                    }
                    if (imagen != "http://www.losgamers.com/store/media/catalog/product") {
                        $("#resultado-store").append("<div class='col span_3 titulos_store' id='bloque_" + i + "'><span id='sku" + i + "' style='display: none;'>" + sku + "</span><span id='precio-usado" + i + "' class='precio-usado'>" + precio_usado + "</span><img src='" + datos.image + "' width='' height='100' id='img-store" + i + "' /><p class='nombre_titulo' id='titulo-store" + i + "'>" + nombre + "</p><span>" + moneda + "</span><span id='price-store" + i + "'> " + precio + "</span></div>")
                    } else {
                        $("#resultado-store").append("<div class='col span_3 titulos_store' id='bloque_" + i + "'><span id='sku" + i + "' style='display: none;'>" + sku + "</span><span id='precio-usado" + i + "' class='precio-usado'>" + precio_usado + "</span><img src='http://store.losgamers.com/media/catalog/product/3/-/3-plataformas.jpg' width='' height='100' id='img-store" + i + "' /><p class='nombre_titulo' id='titulo-store" + i + "'>" + nombre + "</p><span>" + moneda + "</span><span id='price-store" + i + "'> " + precio + "</span></div>")
                    }
                    i = i + 1
                });
                Redimensionar("nombre_titulo", ".", "5");
                var size = $(".titulos_store").size();
                if (size > 0) {
                    $(".titulos_store").click(function() {
                        var res = $(this).html();
                        var j = $(this).index();
                        var imagen_nuevo = $("#img-store" + j).attr("src");
                        var sku_nuevo = $("#sku" + j).html();
                        var titulo_nuevo = $("#titulo-store" + j).html();
                        var precio_nuevo = parseFloat($("#price-store" + j).text());
                        var precio_usado = parseFloat($("#precio-usado" + j).text());
                        var simb_bs = "Bs. ";
                        var simb_dolar = "US$ ";
                        var simb_pesos = "RD$ ";
                        if (pais == "ve") {
                            var moneda = simb_bs
                        } else {
                            if (pais == "us") {
                                var moneda = simb_dolar
                            } else {
                                if (pais == "do") {
                                    var moneda = simb_pesos
                                }
                            }
                        }
                        $("#img-nuevo").attr("src", imagen_nuevo);
                        $("#sku-nuevo").html(sku_nuevo);
                        $("#titulo-nuevo").html(titulo_nuevo);
                        $("#precio-nuevo").html(moneda + precio_nuevo);
                        if (pais == "ve") {
                            var ptos = 1;
                            var puntos_nuevo = (precio_nuevo * ptos);
                            puntos_nuevo = puntos_nuevo.toFixed(0);
                            $("#puntos-nuevo").html(puntos_nuevo)
                        } else {
                            if (pais == "us") {
                                var ptos = 100;
                                var puntos_nuevo = (precio_nuevo * ptos);
                                puntos_nuevo = puntos_nuevo.toFixed(0);
                                $("#puntos-nuevo").html(puntos_nuevo)
                            } else {
                                if (pais == "do") {
                                    var ptos = 1.5;
                                    var puntos_nuevo = (precio_nuevo * ptos);
                                    puntos_nuevo = puntos_nuevo.toFixed(0);
                                    $("#puntos-nuevo").html(puntos_nuevo)
                                }
                            }
                        }
                        var ptos_int = parseInt($("#puntos-int-2").text());
                        var ptos_nuevo = parseInt(puntos_nuevo);
                        var dif = (ptos_nuevo - ptos_int);
                        if (dif > 0) {
                            if (pais == "ve") {
                                var ptos = 1;
                                var dif = (dif / ptos)
                            } else {
                                if (pais == "us") {
                                    var ptos = 100;
                                    var dif = (dif / ptos)
                                } else {
                                    if (pais == "do") {
                                        var ptos = 1.5;
                                        var dif = (dif / ptos);
                                        dif = dif.toFixed(0)
                                    }
                                }
                            }
                            $("#dif-nuevo").html(moneda + " " + dif);
                            $(".ptos-favor").css("display", "none")
                        } else {
                            $("#dif-nuevo").html("0");
                            $(".ptos-favor").css("display", "block");
                            $("#fav-nuevo").html(dif * -1)
                        }
                        if (pais == "us") {
                            $("div.bloque-store > div#usado").hide()
                        }
                        if (precio_usado > "0") {
                            $("div.bloque-store > #usado").show();
                            $("#img-usado").attr("src", imagen_nuevo);
                            $("#sku-usado").html(sku_nuevo);
                            $("#titulo-usado").html(titulo_nuevo);
                            $("#precio-usado").html(moneda + precio_usado);
                            if (pais == "ve") {
                                var ptos = 1;
                                var puntos_usado = (precio_usado * ptos);
                                $("#puntos-usado").html(puntos_usado)
                            } else {
                                if (pais == "us") {
                                    var ptos = 100;
                                    var puntos_usado = (precio_usado * ptos);
                                    $("#puntos-usado").html(puntos_usado)
                                } else {
                                    if (pais == "do") {
                                        var ptos = 1.5;
                                        var puntos_usado = (precio_usado * ptos);
                                        puntos_usado = puntos_usado.toFixed(0);
                                        $("#puntos-usado").html(puntos_usado)
                                    }
                                }
                            }
                            var ptos_usado = parseInt(puntos_usado);
                            var dif = (ptos_usado - ptos_int);
                            if (dif > 0) {
                                if (pais == "ve") {
                                    var ptos = 1;
                                    var dif = (dif / ptos)
                                } else {
                                    if (pais == "us") {
                                        var ptos = 100;
                                        var dif = (dif / ptos)
                                    } else {
                                        if (pais == "do") {
                                            var ptos = 1.5;
                                            var dif = (dif / ptos);
                                            dif = dif.toFixed(0)
                                        }
                                    }
                                }
                                $("#dif-usado").html(moneda + dif);
                                $(".ptos-favor-u").css("display", "none")
                            } else {
                                $("#dif-usado").html(moneda + "0");
                                $(".ptos-favor-u").css("display", "block");
                                $("#fav-usado").html(dif * -1)
                            }
                        } else {
                            $("div.bloque-store > #usado").hide()
                        }
                        $("#store_select").show();
                        $("#resultado-store").hide(500, "linear");
                        var id_usuario = getCookie("login");
                        var sku_int = $("#sku-int-2").text();
                        var pedidos_id = "";
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            data: {
                                id_usuario: id_usuario,
                                sku_int: sku_int,
                                sku_calc: sku_nuevo,
                                pedidos_id: pedidos_id
                            },
                            url: "http://www.losgamers.com/intercambia/setCalculadora",
                            async: true,
                            success: function(result) {}
                        });
                        $(".close_store").click(function() {
                            $("#store_select").hide(500, "linear");
                            $("#resultado-store").show(500, "linear")
                        });
                        Redimensionar("bloque-nu", ".", "20")
                    })
                }
            } else {
                alert("falso")
            }
        },
        error: function(result) {
            $("#resultado-store").html('<p align="center">Error al buscar el titulo</p>');
            $("#resultado-store").show();
            $("#jquery-loader2").hide()
        }
    })
}
$(".termycond").click(function() {
    if ($(".termycond").is(":checked")) {
        if (!$(".alert-term").is(":hidden")) {
            $(".alert-term").css({
                display: "none"
            })
        }
    }
});
$(".intercambiar-nuevo").click(function() {
    if ($(".termycond").is(":checked")) {
        var id_usuario = getCookie("login");
        if (id_usuario != "0") {
            realizar_pedido_intercambia()
        } else {
            login("intercambia")
        }
    } else {
        $(".alert-term").css({
            display: "block"
        })
    }
});
$(".intercambiar-usado").click(function() {
    if ($(".termycond").is(":checked")) {
        var id_usuario = getCookie("login");
        if (id_usuario != null) {
            realizar_pedido_intercambia()
        } else {
            login("intercambia")
        }
    } else {
        $(".alert-term").css({
            display: "block"
        })
    }
});

function realizar_pedido_intercambia() {
    var calc = "";
    var sku_st = $("#sku-nuevo").text();
    var id_usuario = getCookie("login");
    if (pais == "ve") {
        var moneda = "VEF"
    } else {
        if (pais == "us") {
            var moneda = "USD"
        } else {
            if (pais == "do") {
                var moneda = "RD$"
            }
        }
    }
    var tipo = "Intercambio";
    var status = "P";
    var imagen = $("#img-int-2").attr("src");
    var sku = $("#sku-int-2").text();
    var titulo_int = $("#titulo-int-2").text();
    var precio = $("#puntos-int-2").text();
    var cantidad = "1";
    var total = precio * cantidad;
    if (sku != "") {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                id_usuario: id_usuario,
                moneda: moneda,
                tipo: tipo,
                status: status,
                imagen: imagen,
                sku: sku,
                titulo: titulo_int,
                precio: precio,
                cantidad: cantidad,
                total: total,
                sku_st: sku_st,
                calc: calc
            },
            url: "http://www.losgamers.com/intercambia/setPedidos",
            async: true,
            cache: false,
            beforeSend: function() {
                $("#jquery-loader2").show()
            },
            success: function(result) {
                $("#jquery-loader2").hide();
                if (result.success) {
                    var msg = result.msg;
                    var nombre = result.nombre;
                    nombre = nombre.split("-").join(" ");
                    $("#usuario-ped").html(nombre);
                    $("#pedido").html(result.pedido);
                    $("#titulo-ped").html(titulo_int);
                    $("#imagen-ped").attr("src", imagen);
                    $("#puntos-ped").html(precio);
                    $("#status").html("exitoso");
                    var simb_bs = "Bs. ";
                    var simb_dolar = "US$ ";
                    var simb_pesos = "RD$ ";
                    if (pais == "ve") {
                        var ptos = 1;
                        var equiv = (precio / ptos);
                        $("#equiv-ped").html(simb_bs + " " + equiv)
                    } else {
                        if (pais == "us") {
                            var ptos = 100;
                            var equiv = (precio / ptos);
                            $("#equiv-ped").html(simb_dolar + " " + equiv)
                        } else {
                            if (pais == "do") {
                                var ptos = 1.5;
                                var equiv = (precio / ptos);
                                equiv = equiv.toFixed(0);
                                $("#equiv-ped").html(simb_pesos + " " + equiv)
                            }
                        }
                    }
                    $("#login-cal-modal, .login-cal-content").hide();
                    $("#paso-2").hide();
                    $(".op2").removeClass("activo");
                    $(".op3").addClass("activo");
                    $("#store_select").hide();
                    $("#paso-3").show();
                    $(".op1, .op2, .op3").css("pointer-events", "none")
                } else {
                    alert(result.msg)
                }
            },
            error: function(result) {
                $("#resultado-pedido").html('<p align="center">Error al registrar el pedido</p>');
                $("#resultado-pedido").show();
                $("#jquery-loader").hide();
                alert("NO")
            }
        })
    }
}
$("#finalizar-int").click(function(event) {
    location.reload()
});