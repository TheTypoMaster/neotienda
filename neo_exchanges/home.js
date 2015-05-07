$(document).ready(function() {
    $("#video-header").click(function(e) {
        e.preventDefault();
        $("#video-header-cont").css("top", "3%");
        $("#video-header-cont").css("left", "50%");
        $("#video-header-cont").fadeIn(1000)
    });
    $(".video-header-cont-close").click(function(e) {
        e.preventDefault();
        $(".video-header-cont").hide()
    });
    var ddData = [{
        text: "VEN",
        value: "ve",
        selected: false,
        description: "",
        imageSrc: path + "themes/default/img/bandera-ven.png"
    }, {
        text: "DOM",
        value: "do",
        selected: false,
        description: "",
        imageSrc: path + "themes/default/img/bandera-dom.png"
    }];
    if (pais != "") {
        if (pais == "do") {
            $("#select_bandera").ddslick({
                data: ddData,
                imagePosition: "left",
                defaultSelectedIndex: 1
            })
        } else {
            if (pais == "ve") {
                $("#select_bandera").ddslick({
                    data: ddData,
                    imagePosition: "left",
                    defaultSelectedIndex: 0
                })
            }
        }
    } else {
        $("#select_bandera").ddslick({
            data: ddData,
            imagePosition: "left",
            defaultSelectedIndex: 0
        })
    }
    var ddData1 = $("#select_bandera").data("ddslick");
    var defecto = "";
    if (ddData1) {
        defecto = ddData1.selectedData.value
    }
    $("#select_bandera").on("click", function() {
        var ddData = $("#select_bandera").data("ddslick");
        if (defecto != ddData.selectedData.value) {
            defecto = ddData1.selectedData.value;
            setCookiePAIS("SELPAIS", ddData.selectedData.value)
        }
    });
    $("#dv_search").click(function(event) {
        if ($("#txt_searg").val().length > 0) {
            var game = $("#txt_searg").val();
            if ($("#var_ses").val() == "us") {
                window.open("http://store.losgamers.com/catalogsearch/result/?cat=0&q=" + game, "_self")
            } else {
                if ($("#var_ses").val() == "do") {
                    window.open("http://do.losgamers.com/store/catalogsearch/result/?cat=0&q=" + game, "_self")
                } else {
                    if ($("#var_ses").val() == "ve") {
                        window.open("http://ve.losgamers.com/store/catalogsearch/result/?cat=0&q=" + game, "_self")
                    }
                }
            }
        } else {
            if ($("#txt_searg").val().length < 1) {
                return false
            }
        }
    });
    $("#txt_searg").bind("keypress", function(event) {
        if ($("#txt_searg").val() == "") {
            $("#dv_search").unbind("keypress")
        } else {
            if (event.keyCode == "13") {
                var game = $("#txt_searg").val();
                if ($("#var_ses").val() == "us") {
                    window.open("http://store.losgamers.com/catalogsearch/result/?cat=0&q=" + game, "_self")
                } else {
                    if ($("#var_ses").val() == "do") {
                        window.open("http://do.losgamers.com/store/catalogsearch/result/?cat=0&q=" + game, "_self")
                    } else {
                        if ($("#var_ses").val() == "ve") {
                            window.open("http://ve.losgamers.com/store/catalogsearch/result/?cat=0&q=" + game, "_self")
                        }
                    }
                }
            }
        }
    });
    if (screen.width <= 360) {
        $(".fancybox").fancybox({
            fitToView: false,
            width: "90%",
            height: "200",
            autoSize: false,
            closeClick: false,
            openEffect: "elastic",
            closeEffect: "elastic"
        })
    } else {
        if (screen.width <= 640) {
            $(".fancybox").fancybox({
                fitToView: false,
                width: "400",
                height: "300",
                autoSize: false,
                closeClick: false,
                openEffect: "elastic",
                closeEffect: "elastic"
            })
        } else {
            $(".fancybox").fancybox({
                fitToView: false,
                width: "600",
                height: "400",
                autoSize: false,
                closeClick: false,
                openEffect: "elastic",
                closeEffect: "elastic"
            })
        }
    }
});

function setCookie(n, v) {
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var cookie = n + "=" + escape(v) + "; expires=" + d.toGMTString() + "; path=/; ";
    if (location.hostname != "localhost") {
        cookie += "domain=.neotienda.com;"
    }
    document.cookie = cookie
}

function setCookiePAIS(n, v) {
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var cookie = n + "=" + escape(v) + "; expires=" + d.toGMTString() + "; path=/;";
    if (location.hostname == "www.neotienda.com" || location.hostname == "pruebalo.neotienda.com") {
        cookie += " domain=.neotienda.com;"
    }
    document.cookie = cookie;
    location.reload()
}

function getCookie(e) {
    var cname = e + "=";
    var dc = document.cookie;
    if (dc.length > 0) {
        begin = dc.indexOf(cname);
        if (begin != -1) {
            begin += cname.length;
            end = dc.indexOf(";", begin);
            if (end == -1) {
                end = dc.length
            }
            return unescape(dc.substring(begin, end))
        }
    }
    return "0"
}
if (location.hostname == "www.losgamers.com") {
    var url_login = "prod_home/"
} else {
    if (location.hostname == "pruebalo.losgamers.com") {
        var url_login = "prod_pruebalo/"
    } else {
        if (location.hostname == "localhost") {
            var url_login = "localhost/"
        } else {
            var url_login = "pruebas/"
        }
    }
}

function login(from) {
    if (from) {
        var _from = "?from=" + from
    } else {
        var _from = ""
    }
    $.modal('<iframe src="neo_exchanges/login.php' + _from + '" frameborder="0"></iframe>', {
        containerCss: {
            height: 345,
            padding: 0,
            width: 250
        },
        overlayClose: true
    })
}

function logout() {
    $.modal('<iframe src="neo_exchanges/login_proc.php?logout=100" frameborder="0"></iframe>', {
        closeHTML: "<img src='" + path + "themes/default/img/ajax-loader.GIF'/>",
        containerCss: {
            height: 50,
            padding: 0,
            width: 50
        },
        overlayClose: true
    })
};