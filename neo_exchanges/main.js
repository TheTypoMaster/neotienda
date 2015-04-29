var sliderScroolLeft = 0;
var SCROLL_AMOUNT = 5;
var MAX_SCROLL = 895;
var scrollingInterval = 0;
var videosInterval = 0;
$(document).ready(function() {
    $(".menu li").mouseover(function() {
        if ($(document).width() > 485) {
            $(this).prev("li").find("a").css("border-right", "1px solid transparent");
            $(this).find("a").css("border-right", "1px solid transparent")
        }
    });
    $(".menu li").mouseout(function() {
        if ($(document).width() > 485) {
            $(this).prev("li").find("a").css("border-right", "1px solid #b3b3b3");
            $(this).find("a").css("border-right", "1px solid #b3b3b3")
        }
    });
    $(".icon-menu-mobile").click(function() {
        $(".menu-wrapper").toggle();
        $(this).toggleClass("close");
        $(this).parent().toggleClass("open")
    });
    $("#explore").mouseover(function() {
        ShowDropdownMenu()
    });
    $("#explore").click(function() {
        ToggleDropdownMenu()
    });
    $(document).mousemove(function() {
        if (!$("#explore-menu").is(":hover") && !$("#explore").is(":hover")) {
            HideDropdownMenu()
        }
    });
    $(window).resize(function() {
        if ($(document).width() > 485) {
            $(this).removeClass("close");
            $(this).parent().removeClass("open")
        } else {
            $(this).addClass("close");
            $(this).parent().addClass("open")
        }
        if ($(document).width() < 768) {
            $(".header-animation").hide()
        }
        SetSmallLinksVideos()
    });
    PickRandomBg();
    $("ul.bg-controls li").click(function() {
        var i = $(this).attr("data-index");
        PickBg(i)
    });
    SetSmallLinksVideos();
    $("#arrow-left").on("mouseover", function() {
        clearInterval(scrollingInterval);
        scrollingInterval = setInterval(function() {
            ScrollAmount(".game-slider-content", -1)
        }, 5)
    });
    $("#arrow-right").on("mouseover", function() {
        clearInterval(scrollingInterval);
        scrollingInterval = setInterval(function() {
            ScrollAmount(".game-slider-content", 1)
        }, 5)
    });
    $("#arrow-left").on("click", function() {
        clearInterval(scrollingInterval);
        ScrollAmountAnimate(".game-slider-content", -300)
    });
    $("#arrow-right").on("click", function() {
        clearInterval(scrollingInterval);
        ScrollAmountAnimate(".game-slider-content", 300)
    });
    $("#arrow-left").on("mouseout", function() {
        clearInterval(scrollingInterval)
    });
    $("#arrow-right").on("mouseout", function() {
        clearInterval(scrollingInterval)
    });
    $("#tv-left").on("mouseover", function() {
        clearInterval(scrollingInterval);
        scrollingInterval = setInterval(function() {
            ScrollAmount(".videos-threshold", -1)
        }, 5)
    });
    $("#tv-right").on("mouseover", function() {
        clearInterval(scrollingInterval);
        scrollingInterval = setInterval(function() {
            ScrollAmount(".videos-threshold", 1)
        }, 5)
    });
    $("#tv-left").on("click", function() {
        clearInterval(scrollingInterval);
        ScrollAmountAnimate(".videos-threshold", -300)
    });
    $("#tv-right").on("click", function() {
        clearInterval(scrollingInterval);
        ScrollAmountAnimate(".videos-threshold", 300)
    });
    $("#tv-left").on("mouseout", function() {
        clearInterval(scrollingInterval)
    });
    $("#tv-right").on("mouseout", function() {
        clearInterval(scrollingInterval)
    });
    $(".reviews-wrap").mousemove(function(e) {
        clearInterval(scrollingInterval);
        var xpos = e.pageX;
        if (xpos > $(document).width() / 2 + 100) {
            scrollingInterval = setInterval(function() {
                ScrollAmount(".reviews-wrap", 1)
            }, 5)
        } else {
            if (xpos < $(document).width() / 2 - 100) {
                scrollingInterval = setInterval(function() {
                    ScrollAmount(".reviews-wrap", -1)
                }, 5)
            }
        }
    });
    $(".reviews-wrap").mouseout(function() {
        clearInterval(scrollingInterval)
    });
    $(document).scroll(function() {
        var docTop = $(document).scrollTop();
        var winHeight = $(window).height();
        var thisTop = 0;
        if($(".swipe-help.first").length > 0){
            thisTop = $(".swipe-help.first").offset().top;
            if (docTop > thisTop - winHeight / 2) {
                $(".swipe-help.first").animate({
                    right: "50px",
                    opacity: 0
                }, 1000)
            }
        }
        if($(".swipe-help.second").length > 0){
            thisTop = $(".swipe-help.second").offset().top;
            if (docTop > thisTop - winHeight / 2) {
                $(".swipe-help.second").animate({
                    right: "50px",
                    opacity: 0
                }, 1000)
            }
        }
        if($(".swipe-help.third").length > 0){
            thisTop = $(".swipe-help.third").offset().top;
            if (docTop > thisTop - winHeight / 2) {
                $(".swipe-help.third").animate({
                    right: "50px",
                    opacity: 0
                }, 1000)
            }
        }
    })
});

function ScrollAmount(cssSel, amount) {
    var scroll = $(cssSel).scrollLeft();
    scroll += amount;
    $(cssSel).scrollLeft(scroll)
}

function ScrollAmountAnimate(cssSel, amount) {
    var scroll = $(cssSel).scrollLeft();
    scroll += amount;
    $(cssSel).animate({
        scrollLeft: scroll
    }, 300)
}

function SetSmallLinksVideos() {
    if ($(document).width() <= 560) {
        $("ul.videos li").click(function() {
            var videoLink = "http:" + $(this).find("iframe").attr("src");
            location.href = videoLink
        })
    }
}

function ShowDropdownMenu() {
    $("#explore-menu").show();
    $("#explore").addClass("active");
    $("#explore").find("span").addClass("active")
}

function HideDropdownMenu() {
    $("#explore-menu").hide();
    $("#explore").removeClass("active");
    $("#explore").find("span").removeClass("active")
}

function ToggleDropdownMenu() {
    $("#explore-menu").toggle();
    $("#explore").toggleClass("active");
    $("#explore").find("span").toggleClass("active")
}

function PickRandomBg() {
    var i = Math.round(Math.random() * (4));
    PickBg(i)
}

function PickBg(i) {
    /*$("#header").css("background-image", "url('https://s3.amazonaws.com/comunidad.losgamers/general/header-bg-" + i + ".png')");
    $("#footer").css("background-image", "url('https://s3.amazonaws.com/comunidad.losgamers/general/footer-bg-" + i + ".png')");
    $("ul.bg-controls li").removeClass("active");
    $("ul.bg-controls li[data-index=" + i + "]").addClass("active");
    $(".header-animation").hide();
    if ($(document).width() >= 768) {
        $(".animation-" + i).show()
    }*/
};