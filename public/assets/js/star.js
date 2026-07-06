!(function (t) {
    "use strict";
    "function" == typeof define && define.amd
        ? define(["jquery"], t)
        : "object" == typeof module && module.exports
        ? (module.exports = t(require("jquery")))
        : t(window.jQuery);
})(function (t) {
    "use strict";
    var e, a;
    (t.fn.ratingLocales = {}),
        (t.fn.ratingThemes = {}),
        (e = {
            NAMESPACE: ".rating",
            DEFAULT_MIN: 0,
            DEFAULT_MAX: 5,
            DEFAULT_STEP: 0.5,
            isEmpty: function (e, a) {
                return null == e || 0 === e.length || (a && "" === t.trim(e));
            },
            getCss: function (t, e) {
                return t ? " " + e : "";
            },
            addCss: function (t, e) {
                t.removeClass(e).addClass(e);
            },
            getDecimalPlaces: function (t) {
                var e = ("" + t).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                return e
                    ? Math.max(0, (e[1] ? e[1].length : 0) - (e[2] ? +e[2] : 0))
                    : 0;
            },
            applyPrecision: function (t, e) {
                return parseFloat(t.toFixed(e));
            },
            handler: function (t, a, i, n, r) {
                var s = r
                    ? a
                    : a.split(" ").join(e.NAMESPACE + " ") + e.NAMESPACE;
                n || t.off(s), t.on(s, i);
            },
        }),
        ((a = function (e, a) {
            var i = this;
            (i.$element = t(e)), i._init(a);
        }).prototype = {
            constructor: a,
            _parseAttr: function (t, a) {
                var i,
                    n,
                    r,
                    s,
                    l = this.$element,
                    o = l.attr("type");
                if ("range" === o || "number" === o) {
                    switch (((n = a[t] || l.data(t) || l.attr(t)), t)) {
                        case "min":
                            r = e.DEFAULT_MIN;
                            break;
                        case "max":
                            r = e.DEFAULT_MAX;
                            break;
                        default:
                            r = e.DEFAULT_STEP;
                    }
                    s = parseFloat((i = e.isEmpty(n) ? r : n));
                } else s = parseFloat(a[t]);
                return isNaN(s) ? r : s;
            },
            _parseValue: function (t) {
                var e = parseFloat(t);
                return (
                    isNaN(e) && (e = this.clearValue),
                    this.zeroAsNull && (0 === e || "0" === e) ? null : e
                );
            },
            _setDefault: function (t, a) {
                var i = this;
                e.isEmpty(i[t]) && (i[t] = a);
            },
            _initSlider: function (t) {
                var a = this,
                    i = a.$element.val();
                (a.initialValue = e.isEmpty(i) ? 0 : i),
                    a._setDefault("min", a._parseAttr("min", t)),
                    a._setDefault("max", a._parseAttr("max", t)),
                    a._setDefault("step", a._parseAttr("step", t)),
                    (isNaN(a.min) || e.isEmpty(a.min)) &&
                        (a.min = e.DEFAULT_MIN),
                    (isNaN(a.max) || e.isEmpty(a.max)) &&
                        (a.max = e.DEFAULT_MAX),
                    (isNaN(a.step) || e.isEmpty(a.step) || 0 === a.step) &&
                        (a.step = e.DEFAULT_STEP),
                    (a.diff = a.max - a.min);
            },
            _initHighlight: function (t) {
                var e,
                    a = this,
                    i = a._getCaption();
                t || (t = a.$element.val()),
                    (e = a.getWidthFromValue(t) + "%"),
                    a.$filledStars.width(e),
                    (a.cache = { caption: i, width: e, val: t });
            },
            _getContainerCss: function () {
                return (
                    "rating-container" +
                    e.getCss(this.theme, "theme-" + this.theme) +
                    e.getCss(this.rtl, "rating-rtl") +
                    e.getCss(this.size, "rating-" + this.size) +
                    e.getCss(this.animate, "rating-animate") +
                    e.getCss(
                        this.disabled || this.readonly,
                        "rating-disabled"
                    ) +
                    e.getCss(this.containerClass, this.containerClass)
                );
            },
            _checkDisabled: function () {
                var t = this,
                    e = t.$element,
                    a = t.options;
                (t.disabled =
                    void 0 === a.disabled
                        ? e.attr("disabled") || !1
                        : a.disabled),
                    (t.readonly =
                        void 0 === a.readonly
                            ? e.attr("readonly") || !1
                            : a.readonly),
                    (t.inactive = t.disabled || t.readonly),
                    e.attr({ disabled: t.disabled, readonly: t.readonly });
            },
            _addContent: function (t, e) {
                var a = this.$container,
                    i = "clear" === t;
                return this.rtl
                    ? i
                        ? a.append(e)
                        : a.prepend(e)
                    : i
                    ? a.prepend(e)
                    : a.append(e);
            },
            _generateRating: function () {
                var a,
                    i,
                    n,
                    r = this,
                    s = r.$element;
                (i = r.$container =
                    t(document.createElement("div")).insertBefore(s)),
                    e.addCss(i, r._getContainerCss()),
                    (r.$rating = a =
                        t(document.createElement("div"))
                            .attr("class", "rating-stars")
                            .appendTo(i)
                            .append(r._getStars("empty"))
                            .append(r._getStars("filled"))),
                    (r.$emptyStars = a.find(".empty-stars")),
                    (r.$filledStars = a.find(".filled-stars")),
                    r._renderCaption(),
                    r._renderClear(),
                    r._initHighlight(),
                    i.append(s),
                    r.rtl &&
                        ((n = Math.max(
                            r.$emptyStars.outerWidth(),
                            r.$filledStars.outerWidth()
                        )),
                        r.$emptyStars.width(n)),
                    s.appendTo(a);
            },
            _getCaption: function () {
                return this.$caption && this.$caption.length
                    ? this.$caption.html()
                    : this.defaultCaption;
            },
            _setCaption: function (t) {
                this.$caption && this.$caption.length && this.$caption.html(t);
            },
            _renderCaption: function () {
                var a,
                    i = this,
                    n = i.$element.val(),
                    r = i.captionElement ? t(i.captionElement) : "";
                if (i.showCaption) {
                    if (((a = i.fetchCaption(n)), r && r.length))
                        return (
                            e.addCss(r, "caption"),
                            r.html(a),
                            void (i.$caption = r)
                        );
                    i._addContent(
                        "caption",
                        '<div class="caption">' + a + "</div>"
                    ),
                        (i.$caption = i.$container.find(".caption"));
                }
            },
            _renderClear: function () {
                var a,
                    i = this,
                    n = i.clearElement ? t(i.clearElement) : "";
                if (i.showClear) {
                    if (((a = i._getClearClass()), n.length))
                        return (
                            e.addCss(n, a),
                            n
                                .attr({ title: i.clearButtonTitle })
                                .html(i.clearButton),
                            void (i.$clear = n)
                        );
                    i._addContent(
                        "clear",
                        '<div class="' +
                            a +
                            '" title="' +
                            i.clearButtonTitle +
                            '">' +
                            i.clearButton +
                            "</div>"
                    ),
                        (i.$clear = i.$container.find(
                            "." + i.clearButtonBaseClass
                        ));
                }
            },
            _getClearClass: function () {
                return (
                    this.clearButtonBaseClass +
                    " " +
                    (this.inactive ? "" : this.clearButtonActiveClass)
                );
            },
            _toggleHover: function (t) {
                var e, a, i;
                t &&
                    (this.hoverChangeStars &&
                        ((e = this.getWidthFromValue(this.clearValue)),
                        (a = t.val <= this.clearValue ? e + "%" : t.width),
                        this.$filledStars.css("width", a)),
                    this.hoverChangeCaption &&
                        (i =
                            t.val <= this.clearValue
                                ? this.fetchCaption(this.clearValue)
                                : t.caption) &&
                        this._setCaption(i + ""));
            },
            _init: function (e) {
                var a,
                    i = this,
                    n = i.$element.addClass("rating-input");
                return (
                    (i.options = e),
                    t.each(e, function (t, e) {
                        i[t] = e;
                    }),
                    (i.rtl || "rtl" === n.attr("dir")) &&
                        ((i.rtl = !0), n.attr("dir", "rtl")),
                    (i.starClicked = !1),
                    (i.clearClicked = !1),
                    i._initSlider(e),
                    i._checkDisabled(),
                    i.displayOnly &&
                        ((i.inactive = !0),
                        (i.showClear = !1),
                        (i.showCaption = !1)),
                    i._generateRating(),
                    i._initEvents(),
                    i._listen(),
                    (a = i._parseValue(n.val())),
                    n.val(a),
                    n.removeClass("rating-loading")
                );
            },
            _initEvents: function () {
                var t = this;
                t.events = {
                    _getTouchPosition: function (a) {
                        return (
                            (e.isEmpty(a.pageX)
                                ? a.originalEvent.touches[0].pageX
                                : a.pageX) - t.$rating.offset().left
                        );
                    },
                    _listenClick: function (t, e) {
                        return (
                            t.stopPropagation(),
                            t.preventDefault(),
                            !0 !== t.handled && (e(t), void (t.handled = !0))
                        );
                    },
                    _noMouseAction: function (e) {
                        return (
                            !t.hoverEnabled ||
                            t.inactive ||
                            (e && e.isDefaultPrevented())
                        );
                    },
                    initTouch: function (a) {
                        var i,
                            n,
                            r,
                            s,
                            l,
                            o,
                            c,
                            h,
                            u = t.clearValue || 0;
                        ("ontouchstart" in window ||
                            (window.DocumentTouch &&
                                document instanceof window.DocumentTouch)) &&
                            !t.inactive &&
                            ((i = a.originalEvent),
                            (n = e.isEmpty(i.touches)
                                ? i.changedTouches
                                : i.touches),
                            (r = t.events._getTouchPosition(n[0])),
                            "touchend" === a.type
                                ? (t._setStars(r),
                                  (h = [t.$element.val(), t._getCaption()]),
                                  t.$element
                                      .trigger("change")
                                      .trigger("rating.change", h),
                                  (t.starClicked = !0))
                                : ((l =
                                      (s = t.calculate(r)).val <= u
                                          ? t.fetchCaption(u)
                                          : s.caption),
                                  (o = t.getWidthFromValue(u)),
                                  (c = s.val <= u ? o + "%" : s.width),
                                  t._setCaption(l),
                                  t.$filledStars.css("width", c)));
                    },
                    starClick: function (e) {
                        var a, i;
                        t.events._listenClick(e, function (e) {
                            return (
                                !t.inactive &&
                                ((a = t.events._getTouchPosition(e)),
                                t._setStars(a),
                                (i = [t.$element.val(), t._getCaption()]),
                                t.$element
                                    .trigger("change")
                                    .trigger("rating.change", i),
                                void (t.starClicked = !0))
                            );
                        });
                    },
                    clearClick: function (e) {
                        t.events._listenClick(e, function () {
                            t.inactive || (t.clear(), (t.clearClicked = !0));
                        });
                    },
                    starMouseMove: function (e) {
                        var a, i;
                        t.events._noMouseAction(e) ||
                            ((t.starClicked = !1),
                            (a = t.events._getTouchPosition(e)),
                            (i = t.calculate(a)),
                            t._toggleHover(i),
                            t.$element.trigger("rating.hover", [
                                i.val,
                                i.caption,
                                "stars",
                            ]));
                    },
                    starMouseLeave: function (e) {
                        var a;
                        t.events._noMouseAction(e) ||
                            t.starClicked ||
                            ((a = t.cache),
                            t._toggleHover(a),
                            t.$element.trigger("rating.hoverleave", ["stars"]));
                    },
                    clearMouseMove: function (e) {
                        var a, i, n, r;
                        !t.events._noMouseAction(e) &&
                            t.hoverOnClear &&
                            ((t.clearClicked = !1),
                            (a =
                                '<span class="' +
                                t.clearCaptionClass +
                                '">' +
                                t.clearCaption +
                                "</span>"),
                            (i = t.clearValue),
                            (r = {
                                caption: a,
                                width: (n = t.getWidthFromValue(i) || 0),
                                val: i,
                            }),
                            t._toggleHover(r),
                            t.$element.trigger("rating.hover", [
                                i,
                                a,
                                "clear",
                            ]));
                    },
                    clearMouseLeave: function (e) {
                        var a;
                        t.events._noMouseAction(e) ||
                            t.clearClicked ||
                            !t.hoverOnClear ||
                            ((a = t.cache),
                            t._toggleHover(a),
                            t.$element.trigger("rating.hoverleave", ["clear"]));
                    },
                    resetForm: function (e) {
                        (e && e.isDefaultPrevented()) ||
                            t.inactive ||
                            t.reset();
                    },
                };
            },
            _listen: function () {
                var a = this.$element,
                    i = a.closest("form"),
                    n = this.$rating,
                    r = this.$clear,
                    s = this.events;
                return (
                    e.handler(
                        n,
                        "touchstart touchmove touchend",
                        t.proxy(s.initTouch, this)
                    ),
                    e.handler(
                        n,
                        "click touchstart",
                        t.proxy(s.starClick, this)
                    ),
                    e.handler(n, "mousemove", t.proxy(s.starMouseMove, this)),
                    e.handler(n, "mouseleave", t.proxy(s.starMouseLeave, this)),
                    this.showClear &&
                        r.length &&
                        (e.handler(
                            r,
                            "click touchstart",
                            t.proxy(s.clearClick, this)
                        ),
                        e.handler(
                            r,
                            "mousemove",
                            t.proxy(s.clearMouseMove, this)
                        ),
                        e.handler(
                            r,
                            "mouseleave",
                            t.proxy(s.clearMouseLeave, this)
                        )),
                    i.length &&
                        e.handler(i, "reset", t.proxy(s.resetForm, this), !0),
                    a
                );
            },
            _getStars: function (t) {
                var e,
                    a = '<span class="' + t + '-stars">';
                for (e = 1; e <= this.stars; e++)
                    a += '<span class="star">' + this[t + "Star"] + "</span>";
                return a + "</span>";
            },
            _setStars: function (t) {
                var e = this,
                    a = arguments.length ? e.calculate(t) : e.calculate(),
                    i = e.$element,
                    n = e._parseValue(a.val);
                return (
                    i.val(n),
                    e.$filledStars.css("width", a.width),
                    e._setCaption(a.caption),
                    (e.cache = a),
                    i
                );
            },
            showStars: function (t) {
                var e = this._parseValue(t);
                return this.$element.val(e), this._setStars();
            },
            calculate: function (t) {
                var a = e.isEmpty(this.$element.val())
                        ? 0
                        : this.$element.val(),
                    i = arguments.length ? this.getValueFromPosition(t) : a,
                    n = this.fetchCaption(i),
                    r = this.getWidthFromValue(i);
                return { caption: n, width: (r += "%"), val: i };
            },
            getValueFromPosition: function (t) {
                var a,
                    i,
                    n = e.getDecimalPlaces(this.step),
                    r = this.$rating.width();
                return (
                    (i = (this.diff * t) / (r * this.step)),
                    (i = this.rtl ? Math.floor(i) : Math.ceil(i)),
                    (a = Math.max(
                        Math.min(
                            (a = e.applyPrecision(
                                parseFloat(this.min + i * this.step),
                                n
                            )),
                            this.max
                        ),
                        this.min
                    )),
                    this.rtl ? this.max - a : a
                );
            },
            getWidthFromValue: function (t) {
                var e,
                    a,
                    i = this.min,
                    n = this.max,
                    r = this.$emptyStars;
                return !t || i >= t || i === n
                    ? 0
                    : ((e = (a = r.outerWidth()) ? r.width() / a : 1),
                      t >= n ? 100 : ((t - i) * e * 100) / (n - i));
            },
            fetchCaption: function (t) {
                var a,
                    i,
                    n,
                    r,
                    s,
                    l = parseFloat(t) || this.clearValue,
                    o = this.starCaptions,
                    c = this.starCaptionClasses;
                return (
                    l &&
                        l !== this.clearValue &&
                        (l = e.applyPrecision(
                            l,
                            e.getDecimalPlaces(this.step)
                        )),
                    (r = "function" == typeof c ? c(l) : c[l]),
                    (n = "function" == typeof o ? o(l) : o[l]),
                    (i = e.isEmpty(n)
                        ? this.defaultCaption.replace(/\{rating}/g, l)
                        : n),
                    '<span class="' +
                        (a = e.isEmpty(r) ? this.clearCaptionClass : r) +
                        '">' +
                        (s = l === this.clearValue ? this.clearCaption : i) +
                        "</span>"
                );
            },
            destroy: function () {
                var a = this.$element;
                return (
                    e.isEmpty(this.$container) ||
                        this.$container.before(a).remove(),
                    t.removeData(a.get(0)),
                    a.off("rating").removeClass("rating rating-input")
                );
            },
            create: function (t) {
                var e = t || this.options || {};
                return this.destroy().rating(e);
            },
            clear: function () {
                var t =
                    '<span class="' +
                    this.clearCaptionClass +
                    '">' +
                    this.clearCaption +
                    "</span>";
                return (
                    this.inactive || this._setCaption(t),
                    this.showStars(this.clearValue)
                        .trigger("change")
                        .trigger("rating.clear")
                );
            },
            reset: function () {
                return this.showStars(this.initialValue).trigger(
                    "rating.reset"
                );
            },
            update: function (t) {
                return arguments.length ? this.showStars(t) : this.$element;
            },
            refresh: function (e) {
                var a = this.$element;
                return e
                    ? this.destroy()
                          .rating(t.extend(!0, this.options, e))
                          .trigger("rating.refresh")
                    : a;
            },
        }),
        (t.fn.rating = function (i) {
            var n = Array.apply(null, arguments),
                r = [];
            switch (
                (n.shift(),
                this.each(function () {
                    var s,
                        l = t(this),
                        o = l.data("rating"),
                        c = "object" == typeof i && i,
                        h = c.theme || l.data("theme"),
                        u = c.language || l.data("language") || "en",
                        d = {},
                        p = {};
                    o ||
                        (h && (d = t.fn.ratingThemes[h] || {}),
                        "en" === u ||
                            e.isEmpty(t.fn.ratingLocales[u]) ||
                            (p = t.fn.ratingLocales[u]),
                        (s = t.extend(
                            !0,
                            {},
                            t.fn.rating.defaults,
                            d,
                            t.fn.ratingLocales.en,
                            p,
                            c,
                            l.data()
                        )),
                        (o = new a(this, s)),
                        l.data("rating", o)),
                        "string" == typeof i && r.push(o[i].apply(o, n));
                }),
                r.length)
            ) {
                case 0:
                    return this;
                case 1:
                    return void 0 === r[0] ? this : r[0];
                default:
                    return r;
            }
        }),
        (t.fn.rating.defaults = {
            theme: "",
            language: "en",
            stars: 5,
            filledStar: '<i class="fas fa-star"></i>',
            emptyStar: '<i class="fas fa-star empty-star"></i>',
            containerClass: "",
            size: "xs",
            animate: !0,
            displayOnly: !1,
            rtl: !1,
            showClear: !0,
            showCaption: !0,
            starCaptionClasses: {
                0.5: "label label-danger",
                1: "label label-danger",
                1.5: "label label-warning",
                2: "label label-warning",
                2.5: "label label-info",
                3: "label label-info",
                3.5: "label label-primary",
                4: "label label-primary",
                4.5: "label label-success",
                5: "label label-success",
            },
            clearButton: '<i class="fas fa-minus"></i>',
            clearButtonBaseClass: "clear-rating",
            clearButtonActiveClass: "clear-rating-active",
            clearCaptionClass: "label label-default",
            clearValue: null,
            captionElement: null,
            clearElement: null,
            hoverEnabled: !0,
            hoverChangeCaption: !0,
            hoverChangeStars: !0,
            hoverOnClear: !0,
            zeroAsNull: !0,
        }),
        (t.fn.ratingLocales.en = {
            defaultCaption: "({rating})",
            starCaptions: {
                0.5: "(0.5)",
                1: "(1)",
                1.5: "(1.5)",
                2: "(2)",
                2.5: "(2.5)",
                3: "(3)",
                3.5: "(3.5)",
                4: "(4)",
                4.5: "(4.5)",
                5: "(5)",
            },
            clearButtonTitle: "Clear",
            clearCaption: "Not Rated",
        }),
        (t.fn.rating.Constructor = a),
        t(document).ready(function () {
            var e = t("input.rating");
            e.length &&
                e
                    .removeClass("rating-loading")
                    .addClass("rating-loading")
                    .rating();
        });
});
