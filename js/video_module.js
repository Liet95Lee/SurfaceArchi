! function (l) {
    function v() {
        l(".ult-video").each(function () {
            this.nodeClass = "." + l(this).attr("id");
            var t = jQuery(this.nodeClass).find(".ultv-video__outer-wrap");
            t.off("click").on("click", function (t) {
                e(l(this).find(".ultv-video__play"))
            }), "1" != t.data("autoplay") && 1 != t.data("device") || e(jQuery(this.nodeClass).find(".ultv-video__play"))
        })
    }

    function e(t) {
        var e = l("<iframe/>"),
            i = t.data("src");
        0 == t.find("iframe").length && (e.attr("src", i), e.attr("frameborder", "0"), e.attr("allowfullscreen", "1"), e.attr("allow", "autoplay;encrypted-media;"), t.html(e)), t.closest(".ultv-video__outer-wrap").find(".ultv-vimeo-wrap").hide()
    }
    l(document).ready(function (t) {
        for (var e = l(".ult-video").map(function () {
                return l(this).attr("id")
            }).get(), i = l(".ultv-video__outer-wrap").map(function () {
                return l(this).attr("data-iconbg")
            }).get(), o = l(".ultv-video__outer-wrap").map(function () {
                return l(this).attr("data-overcolor")
            }).get(), a = l(".ultv-video__outer-wrap").map(function () {
                return l(this).attr("data-defaultbg")
            }).get(), u = l(".ultv-video__outer-wrap").map(function () {
                return l(this).attr("data-defaultplay")
            }).get(), r = l(".ultv-video").map(function () {
                return l(this).attr("data-videotype")
            }).get(), n = e.length - 1; 0 <= n; n--) {
            l("#" + e[n] + " .ultv-video").find(" .ultv-video__outer-wrap").css("color", i[n]), l("#" + e[n] + " .ultv-video").find(" .ultv-youtube-icon-bg").css({
                fill: a[n]
            }), l("#" + e[n] + " .ultv-video").find(" .ultv-vimeo-icon-bg").css({
                fill: a[n]
            }), document.head.appendChild(document.createElement("style")).innerHTML = "#" + e[n] + " .ultv-video .ultv-video__outer-wrap:before {background: " + o[n] + ";}"
        }
        for (var d = 0; d <= u.length - 1; d++) "icon" == u[d] ? l(".ultv-video").find(" .ultv-video__outer-wrap").hover(function () {
            var t = l(this);
            t.css("color", t.data("hoverbg"))
        }, function () {
            var t = l(this);
            t.css("color", t.data("iconbg"))
        }) : "defaulticon" == u[d] && ("uv_iframe" == r[d] ? l(".ultv-video").find(" .ultv-video__outer-wrap").hover(function () {
            var t = l(this);
            t.find(" .ultv-youtube-icon-bg").css({
                fill: t.data("defaulthoverbg")
            })
        }, function () {
            var t = l(this);
            t.find(" .ultv-youtube-icon-bg").css({
                fill: t.data("defaultbg")
            })
        }) : "vimeo_video" == r[d] && l(".ultv-video").find(" .ultv-video__outer-wrap").hover(function () {
            var t = l(this);
            t.find(" .ultv-vimeo-icon-bg").css({
                fill: t.data("defaulthoverbg")
            })
        }, function () {
            var t = l(this);
            t.find(" .ultv-vimeo-icon-bg").css({
                fill: t.data("defaultbg")
            })
        }));
        v(), l(window).resize(function (t) {
            v()
        })
    })
}(jQuery);