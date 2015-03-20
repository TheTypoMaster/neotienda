(function($) {
    $.fn.ddslick = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1))
        } else {
            if (typeof method === "object" || !method) {
                return methods.init.apply(this, arguments)
            } else {
                $.error("Method " + method + " does not exists.")
            }
        }
    };
    var methods = {},
        defaults = {
            data: [],
            keepJSONItemsOnTop: false,
            width: 63,
            margin: "0 auto",
            height: null,
            background: "#000",
            selectText: "",
            defaultSelectedIndex: null,
            truncateDescription: true,
            imagePosition: "left",
            showSelectedHTML: true,
            clickOffToClose: true,
            onSelected: function() {}
        },
        ddSelectHtml = '<div class="dd-select"><input class="dd-selected-value" type="hidden" /><a class="dd-selected"></a><span class="dd-pointer dd-pointer-down"></span></div>',
        ddOptionsHtml = '<ul class="dd-options"></ul>',
        ddslickCSS = '<style id="css-ddslick" type="text/css">.select-bandera-content{float: right}p.text-selec-pais{float: right; margin: 0 0 0 5px; color: #000000;}.dd-select{ border:none; position:relative; cursor:pointer; color:#f6f6f6; font-family: Rockwell, Noto Sans; margin: 0 30%; }.dd-desc { color:#aaa; display:block; overflow: hidden; font-weight:normal; line-height: 1.4em !important; }.dd-selected{ float:left; font-size: 10px !important; overflow:hidden; display:block; padding:3px; hight:auto;}.dd-pointer{ width:0; height:0; position:absolute; top:50%; margin-top:7px;}.dd-pointer-down{ border:solid 5px transparent; border-top:solid 5px #000; }.dd-pointer-up{border:solid 5px transparent !important; border-bottom:solid 5px #000 !important; margin-top:-8px;}.dd-options{ border:solid 1px #ccc; border-top:none; list-style:none; box-shadow:0px 1px 5px #ddd; display:none; position:absolute; z-index:2000; margin:0 2%; padding:0;background:#fff; overflow:auto;}.dd-option{ font-size: 10px !important; padding:3px; display:block; border-bottom:solid 1px #ddd; overflow:hidden; text-decoration:none; color:#333 !important; cursor:pointer;-webkit-transition: all 0.25s ease-in-out; -moz-transition: all 0.25s ease-in-out;-o-transition: all 0.25s ease-in-out;-ms-transition: all 0.25s ease-in-out; }.dd-options > li:last-child > .dd-option{ border-bottom:none;}.dd-option:hover{ background:red; color:#000;}.dd-selected-description-truncated { text-overflow: ellipsis; white-space:nowrap; }.dd-option-selected { background:#f6f6f6; }.dd-option-image, .dd-selected-image { vertical-align:middle; float:left; margin-right:5px; max-width:64px; width:25px; margin-top: 0px;}.dd-image-right { float:right; margin-right:15px; margin-left:5px; margin-top:0px;}.dd-container{ margin: 0 auto;} .dd-selected-text { float:left;}.dd-selected:hover{ color: red;transition: background-color 100ms ease-in-out; -webkit-transition: background-color 100ms ease-in-out;}@media only screen and (max-width: 680px){ .dd-option-image, .dd-selected-image{margin-top: 1px;} .dd-pointer{margin-top: 8px;}}@media only screen and (max-width: 480px){ p.text-selec-pais, .dd-select{color:#000; font-size:10px;} .select-bandera-content{margin-left:3px;}}</style>';
    if ($("#css-ddslick").length <= 0) {
        $(ddslickCSS).appendTo("head")
    }
    methods.init = function(options) {
        var options = $.extend({}, defaults, options);
        return this.each(function() {
            var obj = $(this),
                data = obj.data("ddslick");
            if (!data) {
                var ddSelect = [],
                    ddJson = options.data;
                obj.find("option").each(function() {
                    var $this = $(this),
                        thisData = $this.data();
                    ddSelect.push({
                        text: $.trim($this.text()),
                        value: $this.val(),
                        selected: $this.is(":selected"),
                        description: thisData.description,
                        imageSrc: thisData.imagesrc
                    })
                });
                if (options.keepJSONItemsOnTop) {
                    $.merge(options.data, ddSelect)
                } else {
                    options.data = $.merge(ddSelect, options.data)
                }
                var original = obj,
                    placeholder = $('<div id="' + obj.attr("id") + '"></div>');
                obj.replaceWith(placeholder);
                obj = placeholder;
                obj.addClass("dd-container").append(ddSelectHtml).append(ddOptionsHtml);
                var ddSelect = obj.find(".dd-select"),
                    ddOptions = obj.find(".dd-options");
                ddOptions.css({
                    width: options.width
                });
                ddSelect.css({
                    width: options.width,
                    background: options.background
                });
                obj.css({
                    width: options.width
                });
                if (options.height != null) {
                    ddOptions.css({
                        height: options.height,
                        overflow: "auto"
                    })
                }
                $.each(options.data, function(index, item) {
                    if (item.selected) {
                        options.defaultSelectedIndex = index
                    }
                    ddOptions.append('<li style="line-height:10px !important;"><a class="dd-option">' + (item.value ? ' <input class="dd-option-value" type="hidden" value="' + item.value + '" />' : "") + (item.imageSrc ? ' <img class="dd-option-image' + (options.imagePosition == "right" ? " dd-image-right" : "") + '" src="' + item.imageSrc + '" />' : "") + (item.text ? ' <label class="dd-option-text">' + item.text + "</label>" : "") + (item.description ? ' <small class="dd-option-description dd-desc">' + item.description + "</small>" : "") + "</a></li>")
                });
                var pluginData = {
                    settings: options,
                    original: original,
                    selectedIndex: -1,
                    selectedItem: null,
                    selectedData: null
                };
                obj.data("ddslick", pluginData);
                if (options.selectText.length > 0 && options.defaultSelectedIndex == null) {
                    obj.find(".dd-selected").html(options.selectText)
                } else {
                    var index = (options.defaultSelectedIndex != null && options.defaultSelectedIndex >= 0 && options.defaultSelectedIndex < options.data.length) ? options.defaultSelectedIndex : 0;
                    selectIndex(obj, index)
                }
                obj.find(".dd-select").on("click.ddslick", function() {
                    open(obj)
                });
                obj.find(".dd-option").on("click.ddslick", function() {
                    selectIndex(obj, $(this).closest("li").index())
                });
                if (options.clickOffToClose) {
                    ddOptions.addClass("dd-click-off-close");
                    obj.on("click.ddslick", function(e) {
                        e.stopPropagation()
                    });
                    $("body").on("click", function() {
                        $(".dd-click-off-close").slideUp(50).siblings(".dd-select").find(".dd-pointer").removeClass("dd-pointer-up")
                    })
                }
            }
        })
    };
    methods.select = function(options) {
        return this.each(function() {
            if (options.index) {
                selectIndex($(this), options.index)
            }
        })
    };
    methods.open = function() {
        return this.each(function() {
            var $this = $(this),
                pluginData = $this.data("ddslick");
            if (pluginData) {
                open($this)
            }
        })
    };
    methods.close = function() {
        return this.each(function() {
            var $this = $(this),
                pluginData = $this.data("ddslick");
            if (pluginData) {
                close($this)
            }
        })
    };
    methods.destroy = function() {
        return this.each(function() {
            var $this = $(this),
                pluginData = $this.data("ddslick");
            if (pluginData) {
                var originalElement = pluginData.original;
                $this.removeData("ddslick").unbind(".ddslick").replaceWith(originalElement)
            }
        })
    };

    function selectIndex(obj, index) {
        var pluginData = obj.data("ddslick");
        var ddSelected = obj.find(".dd-selected"),
            ddSelectedValue = ddSelected.siblings(".dd-selected-value"),
            ddOptions = obj.find(".dd-options"),
            ddPointer = ddSelected.siblings(".dd-pointer"),
            selectedOption = obj.find(".dd-option").eq(index),
            selectedLiItem = selectedOption.closest("li"),
            settings = pluginData.settings,
            selectedData = pluginData.settings.data[index];
        obj.find(".dd-option").removeClass("dd-option-selected");
        selectedOption.addClass("dd-option-selected");
        pluginData.selectedIndex = index;
        pluginData.selectedItem = selectedLiItem;
        pluginData.selectedData = selectedData;
        if (settings.showSelectedHTML) {
            ddSelected.html((selectedData.imageSrc ? '<img class="dd-selected-image' + (settings.imagePosition == "right" ? " dd-image-right" : "") + '" src="' + selectedData.imageSrc + '" />' : "") + (selectedData.text ? '<label class="dd-selected-text">' + selectedData.text + "</label>" : "") + (selectedData.description ? '<small class="dd-selected-description dd-desc' + (settings.truncateDescription ? " dd-selected-description-truncated" : "") + '" >' + selectedData.description + "</small>" : ""))
        } else {
            ddSelected.html(selectedData.text)
        }
        ddSelectedValue.val(selectedData.value);
        pluginData.original.val(selectedData.value);
        obj.data("ddslick", pluginData);
        close(obj);
        adjustSelectedHeight(obj);
        if (typeof settings.onSelected == "function") {
            settings.onSelected.call(this, pluginData)
        }
    }

    function open(obj) {
        var $this = obj.find(".dd-select"),
            ddOptions = $this.siblings(".dd-options"),
            ddPointer = $this.find(".dd-pointer"),
            wasOpen = ddOptions.is(":visible");
        $(".dd-click-off-close").not(ddOptions).slideUp(50);
        $(".dd-pointer").removeClass("dd-pointer-up");
        if (wasOpen) {
            ddOptions.slideUp("fast");
            ddPointer.removeClass("dd-pointer-up")
        } else {
            ddOptions.slideDown("fast");
            ddPointer.addClass("dd-pointer-up")
        }
        adjustOptionsHeight(obj)
    }

    function close(obj) {
        obj.find(".dd-options").slideUp(50);
        obj.find(".dd-pointer").removeClass("dd-pointer-up").removeClass("dd-pointer-up")
    }

    function adjustSelectedHeight(obj) {
        var lSHeight = obj.find(".dd-select").css("height");
        var descriptionSelected = obj.find(".dd-selected-description");
        var imgSelected = obj.find(".dd-selected-image")
    }

    function adjustOptionsHeight(obj) {
        obj.find(".dd-option").each(function() {
            var $this = $(this);
            var lOHeight = $this.css("height");
            var descriptionOption = $this.find(".dd-option-description");
            var imgOption = obj.find(".dd-option-image");
            if (descriptionOption.length <= 0 && imgOption.length > 0) {
                $this.find(".dd-option-text").css("lineHeight", lOHeight)
            }
        })
    }
})(jQuery);