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

function deleteCookie(e){
    document.cookie = e + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
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