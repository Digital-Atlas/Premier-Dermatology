"use strict";

/*! 
* jQuery Double Tap To Go - v1.0.0 - 2015-04-20
* http://github.com/zenopopovici/DoubleTapToGo
* Copyright (c) 2015 Graffino
*/
!function ($, window, document, undefined) {
  $.fn.doubleTapToGo = function (action) {
    return "ontouchstart" in window || navigator.msMaxTouchPoints || navigator.userAgent.toLowerCase().match(/windows phone os 7/i) ? (this.each("unbind" === action ? function () {
      $(this).off(), $(document).off("click touchstart MSPointerDown", handleTouch);
    } : function () {
      function handleTouch(e) {
        for (var resetItem = !0, parents = $(e.target).parents(), i = 0; i < parents.length; i++) {
          parents[i] == curItem[0] && (resetItem = !1);
        }resetItem && (curItem = !1);
      }var curItem = !1;$(this).on("click", function (e) {
        var item = $(this);item[0] != curItem[0] && (e.preventDefault(), curItem = item);
      }), $(document).on("click touchstart MSPointerDown", handleTouch);
    }), this) : !1;
  };
}(jQuery, window, document);
"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*!
 * jQuery Smooth Scroll - v2.1.2 - 2017-01-19
 * https://github.com/kswedberg/jquery-smooth-scroll
 * Copyright (c) 2017 Karl Swedberg
 * Licensed MIT
 */

!function (a) {
  "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports ? require("jquery") : jQuery);
}(function (a) {
  var b = "2.1.2",
      c = {},
      d = { exclude: [], excludeWithin: [], offset: 0, direction: "top", delegateSelector: null, scrollElement: null, scrollTarget: null, beforeScroll: function beforeScroll() {}, afterScroll: function afterScroll() {}, easing: "swing", speed: 400, autoCoefficient: 2, preventDefault: !0 },
      e = function e(b) {
    var c = [],
        d = !1,
        e = b.dir && "left" === b.dir ? "scrollLeft" : "scrollTop";return this.each(function () {
      var b = a(this);if (this !== document && this !== window) return !document.scrollingElement || this !== document.documentElement && this !== document.body ? void (b[e]() > 0 ? c.push(this) : (b[e](1), d = b[e]() > 0, d && c.push(this), b[e](0))) : (c.push(document.scrollingElement), !1);
    }), c.length || this.each(function () {
      this === document.documentElement && "smooth" === a(this).css("scrollBehavior") && (c = [this]), c.length || "BODY" !== this.nodeName || (c = [this]);
    }), "first" === b.el && c.length > 1 && (c = [c[0]]), c;
  },
      f = /^([\-\+]=)(\d+)/;a.fn.extend({ scrollable: function scrollable(a) {
      var b = e.call(this, { dir: a });return this.pushStack(b);
    }, firstScrollable: function firstScrollable(a) {
      var b = e.call(this, { el: "first", dir: a });return this.pushStack(b);
    }, smoothScroll: function smoothScroll(b, c) {
      if (b = b || {}, "options" === b) return c ? this.each(function () {
        var b = a(this),
            d = a.extend(b.data("ssOpts") || {}, c);a(this).data("ssOpts", d);
      }) : this.first().data("ssOpts");var d = a.extend({}, a.fn.smoothScroll.defaults, b),
          e = function e(b) {
        var c = function c(a) {
          return a.replace(/(:|\.|\/)/g, "\\$1");
        },
            e = this,
            f = a(this),
            g = a.extend({}, d, f.data("ssOpts") || {}),
            h = d.exclude,
            i = g.excludeWithin,
            j = 0,
            k = 0,
            l = !0,
            m = {},
            n = a.smoothScroll.filterPath(location.pathname),
            o = a.smoothScroll.filterPath(e.pathname),
            p = location.hostname === e.hostname || !e.hostname,
            q = g.scrollTarget || o === n,
            r = c(e.hash);if (r && !a(r).length && (l = !1), g.scrollTarget || p && q && r) {
          for (; l && j < h.length;) {
            f.is(c(h[j++])) && (l = !1);
          }for (; l && k < i.length;) {
            f.closest(i[k++]).length && (l = !1);
          }
        } else l = !1;l && (g.preventDefault && b.preventDefault(), a.extend(m, g, { scrollTarget: g.scrollTarget || r, link: e }), a.smoothScroll(m));
      };return null !== b.delegateSelector ? this.off("click.smoothscroll", b.delegateSelector).on("click.smoothscroll", b.delegateSelector, e) : this.off("click.smoothscroll").on("click.smoothscroll", e), this;
    } });var g = function g(a) {
    var b = { relative: "" },
        c = "string" == typeof a && f.exec(a);return "number" == typeof a ? b.px = a : c && (b.relative = c[1], b.px = parseFloat(c[2]) || 0), b;
  };a.smoothScroll = function (b, d) {
    if ("options" === b && "object" == (typeof d === "undefined" ? "undefined" : _typeof(d))) return a.extend(c, d);var e,
        f,
        h,
        i,
        j = g(b),
        k = {},
        l = 0,
        m = "offset",
        n = "scrollTop",
        o = {},
        p = {};j.px ? e = a.extend({ link: null }, a.fn.smoothScroll.defaults, c) : (e = a.extend({ link: null }, a.fn.smoothScroll.defaults, b || {}, c), e.scrollElement && (m = "position", "static" === e.scrollElement.css("position") && e.scrollElement.css("position", "relative")), d && (j = g(d))), n = "left" === e.direction ? "scrollLeft" : n, e.scrollElement ? (f = e.scrollElement, j.px || /^(?:HTML|BODY)$/.test(f[0].nodeName) || (l = f[n]())) : f = a("html, body").firstScrollable(e.direction), e.beforeScroll.call(f, e), k = j.px ? j : { relative: "", px: a(e.scrollTarget)[m]() && a(e.scrollTarget)[m]()[e.direction] || 0 }, o[n] = k.relative + (k.px + l + e.offset), h = e.speed, "auto" === h && (i = Math.abs(o[n] - f[n]()), h = i / e.autoCoefficient), p = { duration: h, easing: e.easing, complete: function complete() {
        e.afterScroll.call(e.link, e);
      } }, e.step && (p.step = e.step), f.length ? f.stop().animate(o, p) : e.afterScroll.call(e.link, e);
  }, a.smoothScroll.version = b, a.smoothScroll.filterPath = function (a) {
    return a = a || "", a.replace(/^\//, "").replace(/(?:index|default).[a-zA-Z]{3,4}$/, "").replace(/\/$/, "");
  }, a.fn.smoothScroll.defaults = d;
});
"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*! modernizr 3.3.1 (Custom Build) | MIT *
 * http://modernizr.com/download/?-cssanimations-csstransforms-csstransforms3d-csstransitions-flexbox-flexboxlegacy-touchevents-setclasses !*/
!function (e, n, t) {
  function s(e, n) {
    return (typeof e === "undefined" ? "undefined" : _typeof(e)) === n;
  }function r() {
    var e, n, t, r, o, i, a;for (var f in x) {
      if (x.hasOwnProperty(f)) {
        if (e = [], n = x[f], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) for (t = 0; t < n.options.aliases.length; t++) {
          e.push(n.options.aliases[t].toLowerCase());
        }for (r = s(n.fn, "function") ? n.fn() : n.fn, o = 0; o < e.length; o++) {
          i = e[o], a = i.split("."), 1 === a.length ? Modernizr[a[0]] = r : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = r), y.push((r ? "" : "no-") + a.join("-"));
        }
      }
    }
  }function o(e) {
    var n = w.className,
        t = Modernizr._config.classPrefix || "";if (S && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var s = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");n = n.replace(s, "$1" + t + "js$2");
    }Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t), S ? w.className.baseVal = n : w.className = n);
  }function i() {
    return "function" != typeof n.createElement ? n.createElement(arguments[0]) : S ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments);
  }function a() {
    var e = n.body;return e || (e = i(S ? "svg" : "body"), e.fake = !0), e;
  }function f(e, t, s, r) {
    var o,
        f,
        l,
        u,
        d = "modernizr",
        p = i("div"),
        c = a();if (parseInt(s, 10)) for (; s--;) {
      l = i("div"), l.id = r ? r[s] : d + (s + 1), p.appendChild(l);
    }return o = i("style"), o.type = "text/css", o.id = "s" + d, (c.fake ? c : p).appendChild(o), c.appendChild(p), o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(n.createTextNode(e)), p.id = d, c.fake && (c.style.background = "", c.style.overflow = "hidden", u = w.style.overflow, w.style.overflow = "hidden", w.appendChild(c)), f = t(p, e), c.fake ? (c.parentNode.removeChild(c), w.style.overflow = u, w.offsetHeight) : p.parentNode.removeChild(p), !!f;
  }function l(e, n) {
    return !!~("" + e).indexOf(n);
  }function u(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
      return n + t.toUpperCase();
    }).replace(/^-/, "");
  }function d(e, n) {
    return function () {
      return e.apply(n, arguments);
    };
  }function p(e, n, t) {
    var r;for (var o in e) {
      if (e[o] in n) return t === !1 ? e[o] : (r = n[e[o]], s(r, "function") ? d(r, t || n) : r);
    }return !1;
  }function c(e) {
    return e.replace(/([A-Z])/g, function (e, n) {
      return "-" + n.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }function m(n, s) {
    var r = n.length;if ("CSS" in e && "supports" in e.CSS) {
      for (; r--;) {
        if (e.CSS.supports(c(n[r]), s)) return !0;
      }return !1;
    }if ("CSSSupportsRule" in e) {
      for (var o = []; r--;) {
        o.push("(" + c(n[r]) + ":" + s + ")");
      }return o = o.join(" or "), f("@supports (" + o + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" == getComputedStyle(e, null).position;
      });
    }return t;
  }function h(e, n, r, o) {
    function a() {
      d && (delete N.style, delete N.modElem);
    }if (o = s(o, "undefined") ? !1 : o, !s(r, "undefined")) {
      var f = m(e, r);if (!s(f, "undefined")) return f;
    }for (var d, p, c, h, v, g = ["modernizr", "tspan"]; !N.style;) {
      d = !0, N.modElem = i(g.shift()), N.style = N.modElem.style;
    }for (c = e.length, p = 0; c > p; p++) {
      if (h = e[p], v = N.style[h], l(h, "-") && (h = u(h)), N.style[h] !== t) {
        if (o || s(r, "undefined")) return a(), "pfx" == n ? h : !0;try {
          N.style[h] = r;
        } catch (y) {}if (N.style[h] != v) return a(), "pfx" == n ? h : !0;
      }
    }return a(), !1;
  }function v(e, n, t, r, o) {
    var i = e.charAt(0).toUpperCase() + e.slice(1),
        a = (e + " " + z.join(i + " ") + i).split(" ");return s(n, "string") || s(n, "undefined") ? h(a, n, r, o) : (a = (e + " " + P.join(i + " ") + i).split(" "), p(a, n, t));
  }function g(e, n, s) {
    return v(e, t, t, n, s);
  }var y = [],
      x = [],
      C = { _version: "3.3.1", _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 }, _q: [], on: function on(e, n) {
      var t = this;setTimeout(function () {
        n(t[e]);
      }, 0);
    }, addTest: function addTest(e, n, t) {
      x.push({ name: e, fn: n, options: t });
    }, addAsyncTest: function addAsyncTest(e) {
      x.push({ name: null, fn: e });
    } },
      Modernizr = function Modernizr() {};Modernizr.prototype = C, Modernizr = new Modernizr();var w = n.documentElement,
      S = "svg" === w.nodeName.toLowerCase(),
      b = C._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];C._prefixes = b;var _ = C.testStyles = f;Modernizr.addTest("touchevents", function () {
    var t;if ("ontouchstart" in e || e.DocumentTouch && n instanceof DocumentTouch) t = !0;else {
      var s = ["@media (", b.join("touch-enabled),("), "heartz", ")", "{#modernizr{top:9px;position:absolute}}"].join("");_(s, function (e) {
        t = 9 === e.offsetTop;
      });
    }return t;
  });var T = "Moz O ms Webkit",
      z = C._config.usePrefixes ? T.split(" ") : [];C._cssomPrefixes = z;var P = C._config.usePrefixes ? T.toLowerCase().split(" ") : [];C._domPrefixes = P;var E = { elem: i("modernizr") };Modernizr._q.push(function () {
    delete E.elem;
  });var N = { style: E.elem.style };Modernizr._q.unshift(function () {
    delete N.style;
  }), C.testAllProps = v, C.testAllProps = g, Modernizr.addTest("cssanimations", g("animationName", "a", !0)), Modernizr.addTest("flexbox", g("flexBasis", "1px", !0)), Modernizr.addTest("flexboxlegacy", g("boxDirection", "reverse", !0)), Modernizr.addTest("csstransforms", function () {
    return -1 === navigator.userAgent.indexOf("Android 2.") && g("transform", "scale(1)", !0);
  }), Modernizr.addTest("csstransitions", g("transition", "all", !0));var j = "CSS" in e && "supports" in e.CSS,
      k = "supportsCSS" in e;Modernizr.addTest("supports", j || k), Modernizr.addTest("csstransforms3d", function () {
    var e = !!g("perspective", "1px", !0),
        n = Modernizr._config.usePrefixes;if (e && (!n || "webkitPerspective" in w.style)) {
      var t,
          s = "#modernizr{width:0;height:0}";Modernizr.supports ? t = "@supports (perspective: 1px)" : (t = "@media (transform-3d)", n && (t += ",(-webkit-transform-3d)")), t += "{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}", _(s + t, function (n) {
        e = 7 === n.offsetWidth && 18 === n.offsetHeight;
      });
    }return e;
  }), r(), o(y), delete C.addTest, delete C.addAsyncTest;for (var A = 0; A < Modernizr._q.length; A++) {
    Modernizr._q[A]();
  }e.Modernizr = Modernizr;
}(window, document);
"use strict";

/*! 
* jQuery Double Tap To Go - v1.0.0 - 2015-04-20 - file
* http://github.com/zenopopovici/DoubleTapToGo
* Copyright (c) 2015 Graffino
*/
!function ($, window, document, undefined) {
  $.fn.doubleTapToGo = function (action) {
    return "ontouchstart" in window || navigator.msMaxTouchPoints || navigator.userAgent.toLowerCase().match(/windows phone os 7/i) ? (this.each("unbind" === action ? function () {
      $(this).off(), $(document).off("click touchstart MSPointerDown", handleTouch);
    } : function () {
      function handleTouch(e) {
        for (var resetItem = !0, parents = $(e.target).parents(), i = 0; i < parents.length; i++) {
          parents[i] == curItem[0] && (resetItem = !1);
        }resetItem && (curItem = !1);
      }var curItem = !1;$(this).on("click", function (e) {
        var item = $(this);item[0] != curItem[0] && (e.preventDefault(), curItem = item);
      }), $(document).on("click touchstart MSPointerDown", handleTouch);
    }), this) : !1;
  };
}(jQuery, window, document);
'use strict';

(function ($) {

	'use strict';

	// Load Foundation

	$(document).foundation();

	// Resize function
	$(window).on('load resize', function (e) {
		if ($(window).width() > 1024) {
			$('.nav-primary li:has(ul)').doubleTapToGo();
		} else {
			$('.nav-primary li:has(ul)').doubleTapToGo('unbind');
		}
	});

	var $all_oembed_videos = $("iframe[src*='youtube'], iframe[src*='vimeo']");

	$all_oembed_videos.each(function () {

		var _this = $(this);

		if (_this.parent('.embed-container').length === 0) {
			_this.wrap('<div class="embed-container"></div>');
		}

		_this.removeAttr('height').removeAttr('width');
	});

	// Open external links in new window (exclue mail and foobox)

	$('a').not('svg a, [href*="mailto:"], [class*="foobox"]').each(function () {
		var isInternalLink = new RegExp('/' + window.location.host + '/');
		if (!isInternalLink.test(this.href)) {
			$(this).attr('target', '_blank');
		}
	});

	// Down arrows


	$('.down-arrow').append('<span class="scroll-down scroll-arrow svg"><svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.679902627"><g id="HOME" transform="translate(-696.000000, -640.000000)" fill="#FFFFFF"><path d="M727.765922,662.678155 C728.096378,663.008611 728.261585,663.421671 728.261585,663.876094 C728.261585,664.330477 728.096378,664.743536 727.765922,665.074033 L716.860545,675.979329 C716.530089,676.309785 716.075747,676.475033 715.662647,676.475033 C715.208264,676.475033 714.795164,676.309785 714.464708,675.979329 C713.803796,675.318416 713.803796,674.244404 714.464708,673.583492 L724.172105,663.876094 L714.464708,654.168656 C713.803796,653.507744 713.803796,652.433731 714.464708,651.772778 C715.12562,651.111866 716.199633,651.111866 716.860545,651.772778 L727.765922,662.678155 Z M719.999979,684.612754 C708.640261,684.612754 699.387246,675.359739 699.387246,663.999979 C699.387246,652.640261 708.640261,643.387287 719.999979,643.387287 C731.359698,643.387287 740.612713,652.640261 740.612713,663.999979 C740.612713,675.359739 731.359698,684.612754 719.999979,684.612754 L719.999979,684.612754 Z M719.999979,640 C706.78141,640 696,650.78141 696,663.999979 C696,677.21859 706.78141,688 719.999979,688 C733.218549,688 743.999959,677.259912 743.999959,663.999979 C743.999959,650.740088 733.218549,640 719.999979,640 L719.999979,640 Z" id="next" transform="translate(719.999979, 664.000000) rotate(-270.000000) translate(-719.999979, -664.000000) "></path></g></g></svg></span>');

	$(window).scroll(function () {
		$('.section').each(function () {
			if ($(this).offset().top - $(window).scrollTop() < -150) {
				$(this).find('.scroll-down').stop().fadeTo(100, 0);
			} else {
				$(this).find('.scroll-down').stop().fadeTo('fast', 1);
			}
		});
	});

	$('.scroll-down').on('click', function () {

		var section = $(this).parent('.section').next('.section');

		$.smoothScroll({
			offset: 0,
			scrollTarget: section
		});
	});

	$('.home .hero a[href^=#]').on('click', function () {

		var section = $('#why-us');

		$.smoothScroll({
			offset: 0,
			scrollTarget: section
		});
	});
})(jQuery);
'use strict';

// Responsive Menu

(function (document, $, undefined) {

	'use strict';

	$('body').addClass('js');

	var child_theme = {},
	    nav_menu = 'nav-primary',
	    mainMenuButtonClass = 'menu-toggle',
	    subMenuButtonClass = 'sub-menu-toggle';

	child_theme.init = function () {
		var toggleButtons = {
			menu: $('<button/>', {
				'class': mainMenuButtonClass,
				'aria-expanded': false,
				'aria-pressed': false,
				'role': 'button',
				'html': '<span class="screen-reader-text">Menu</span><span class="line"></span><span class="line"></span><span class="line"></span>'
			}).append(child_theme.params.mainMenu),
			submenu: $('<button />', {
				'class': subMenuButtonClass,
				'aria-expanded': false,
				'aria-pressed': false,
				'role': 'button'
			}).append($('<span />', {
				'class': 'screen-reader-text',
				text: child_theme.params.subMenu
			}))
		};
		$('.site-header .site-branding').append(toggleButtons.menu); // add the main nav buttons
		$('.' + nav_menu + ' .sub-menu').before(toggleButtons.submenu); // add the submenu nav buttons
		$('.' + mainMenuButtonClass).each(_addClassID);
		$(window).on('resize.child_theme', _doResize).triggerHandler('resize.child_theme');
		$('.' + mainMenuButtonClass).on('click.child_theme-mainbutton', _mainmenuToggle);
		$('.' + subMenuButtonClass).on('click.child_theme-subbutton', _submenuToggle);
	};

	// add nav class and ID to related button
	function _addClassID() {
		var $this = $(this),
		    nav = $this.parents('header').find('.' + nav_menu),

		//nav = $( '.' + nav_menu ),
		id = 'class';
		//$this.addClass( $( nav ).attr( 'class' ) );
		if ($(nav).attr('id')) {
			id = 'id';
		}
		$this.attr('id', 'mobile-' + $(nav).attr(id));
	}

	// Change Skiplinks and Superfish
	function _doResize() {
		var buttons = $('button[id^=mobile-]').attr('id');
		if (typeof buttons === 'undefined') {
			return;
		}
		_superfishToggle(buttons);
		_changeSkipLink(buttons);
		_maybeClose(buttons);
	}

	/**
  * action to happen when the main menu button is clicked
  */
	function _mainmenuToggle() {
		var $this = $(this);
		_toggleAria($this, 'aria-pressed');
		_toggleAria($this, 'aria-expanded');
		$this.toggleClass('activated');
		$('.' + nav_menu).slideToggle('fast'); //changed to .nav-primary since we're not toggling .nav-secondary
	}

	/**
  * action for submenu toggles
  */
	function _submenuToggle() {

		var $this = $(this),
		    others = $this.closest('.menu-item').siblings();
		_toggleAria($this, 'aria-pressed');
		_toggleAria($this, 'aria-expanded');
		$this.toggleClass('activated');
		$this.next('.sub-menu').slideToggle('fast');

		others.find('.' + subMenuButtonClass).removeClass('activated').attr('aria-pressed', 'false');
		others.find('.sub-menu').slideUp('fast');
	}

	/**
  * activate/deactivate superfish
  */
	function _superfishToggle(buttons) {
		if (typeof $('.js-superfish').superfish !== 'function') {
			return;
		}
		if ('none' === _getDisplayValue(buttons)) {
			$('.js-superfish').superfish({
				'delay': 100,
				'animation': { 'opacity': 'show', 'height': 'show' },
				'dropShadows': false
			});
		} else {
			$('.js-superfish').superfish('destroy');
		}
	}

	/**
  * modify skip links to match mobile buttons
  */
	function _changeSkipLink(buttons) {
		var startLink = 'genesis-nav',
		    endLink = 'mobile-genesis-nav';
		if ('none' === _getDisplayValue(buttons)) {
			startLink = 'mobile-genesis-nav';
			endLink = 'genesis-nav';
		}
		$('.genesis-skip-link a[href^="#' + startLink + '"]').each(function () {
			var link = $(this).attr('href');
			link = link.replace(startLink, endLink);
			$(this).attr('href', link);
		});
	}

	function _maybeClose(buttons) {
		if ('none' !== _getDisplayValue(buttons)) {
			return;
		}
		$('.menu-toggle, .sub-menu-toggle').removeClass('activated').attr('aria-expanded', false).attr('aria-pressed', false);
		$('nav, .sub-menu').attr('style', '');
	}

	/**
  * generic function to get the display value of an element
  * @param  {id} $id ID to check
  * @return {string}     CSS value of display property
  */
	function _getDisplayValue($id) {
		var element = document.getElementById($id),
		    style = window.getComputedStyle(element);
		return style.getPropertyValue('display');
	}

	/**
  * Toggle aria attributes
  * @param  {button} $this     passed through
  * @param  {aria-xx} attribute aria attribute to toggle
  * @return {bool}           from _ariaReturn
  */
	function _toggleAria($this, attribute) {
		$this.attr(attribute, function (index, value) {
			return 'false' === value;
		});
	}

	$(document).ready(function () {

		child_theme.params = typeof OMHL10n === 'undefined' ? '' : OMHL10n;

		if (typeof child_theme.params !== 'undefined') {
			child_theme.init();
		}
	});
})(document, jQuery);
//# sourceMappingURL=project.js.map
