/**************************************************************

 @Name：layer v1.8.2 弹层组件压缩版
 @Author：贤心
 @Date：2014-05-27
 @Blog：http://sentsin.com
 @QQ群：78803422 (layer组件群3)
 @Copyright：Sentsin Xu(贤心)
 @官网：http://sentsin.com/jquery/layer
 @授权：http://url.cn/RAejZY
        
 *************************************************************/

!
function(a, b) {
	"use strict";
	var e, f, h, i, c = !0,
	//是否采用自动获取绝对路径。!1：将采用下述变量中的配置
	d = "/lily/lib/layer/",
	//上述变量为!1才有效，当前layerjs所在目录(不用填写host，相对站点的根目录即可)。
	g = {
		host: "http://" + location.host,
		getPath: function() {
			var a = document.scripts,
			b = a[a.length - 1].src;
			return c ? b.substring(0, b.lastIndexOf("/") + 1) : this.host + d
		}
	};
	a.layer = {
		v: "1.8.2",
		ie6: !-[1, ] && !a.XMLHttpRequest,
		index: 0,
		path: g.getPath(),
		use: function(a, b) {
			var f, g, h, d = e("head")[0];
			a = a.replace(/\s/g, ""),
			f = /\.css$/.test(a),
			g = document.createElement(f ? "link": "script"),
			h = a.replace(/\.|\//g, ""),
			f && (g.type = "text/css", g.rel = "stylesheet"),
			g[f ? "href": "src"] = /^http:\/\//.test(a) ? a: layer.path + a,
			g.id = h,
			e("#" + h)[0] || d.appendChild(g),
			b && (document.all ? e(g).ready(b) : e(g).load(b))
		},
		ready: function(a) {
			layer.use("skin/layer.css", a)
		},
		alert: function(a, b, c, d) {
			var f = "function" == typeof c,
			g = {
				dialog: {
					msg: a,
					type: b,
					yes: f ? c: d
				},
				area: ["auto", "auto"]
			};
			return f || (g.title = c),
			e.layer(g)
		},
		confirm: function(a, b, c, d) {
			var f = "function" == typeof c,
			g = {
				dialog: {
					msg: a,
					type: 4,
					btns: 2,
					yes: b,
					no: f ? c: d
				}
			};
			return f || (g.title = c),
			e.layer(g)
		},
		msg: function(a, c, d, f) {
			var g = {
				title: !1,
				closeBtn: !1,
				time: c === b ? 2 : c,
				dialog: {
					msg: "" === a || a === b ? "&nbsp;": a
				},
				end: f
			};
			return "object" == typeof d ? (g.dialog.type = d.type, g.shade = d.shade, g.success = function() {
				layer.shift(d.rate)
			}) : "function" == typeof d ? g.end = d: g.dialog.type = d,
			e.layer(g)
		},
		load: function(a, b) {
			return "string" == typeof a ? this.msg(a, b || 0, 16) : e.layer({
				time: a,
				loading: {
					type: b
				},
				bgcolor: b ? "#fff": "",
				shade: b ? [.1, "#000"] : [0],
				border: 3 !== b && b ? [6, .3, "#000"] : !1,
				type: 3,
				title: ["", !1],
				closeBtn: [0, !1]
			})
		},
		tips: function(a, b, c, d, f, g) {
			var h = {
				type: 4,
				shade: !1,
				success: function(a) {
					
					this.closeBtn || a.find(".xubox_tips").css({
						"padding-right": 10
					})
				},
				bgcolor: "",
				tips: {
					msg: a,
					follow: b
				}
			};
			return c = c || {},
			h.time = c.time || c,
			h.closeBtn = c.closeBtn || !1,
			h.maxWidth = c.maxWidth || d,
			h.tips.guide = c.guide || f,
			h.tips.style = c.style || g,
			e.layer(h)
		}
	},
	h = function(a) {
		var b = this.config;
		layer.index++,
		this.index = layer.index,
		this.config = e.extend({},
		b, a),
		this.config.dialog = e.extend({},
		b.dialog, a.dialog),
		this.config.page = e.extend({},
		b.page, a.page),
		this.config.iframe = e.extend({},
		b.iframe, a.iframe),
		this.config.loading = e.extend({},
		b.loading, a.loading),
		this.config.tips = e.extend({},
		b.tips, a.tips),
		this.creat()
	},
	h.pt = h.prototype,
	h.pt.config = layer.config || {
		type: 0,
		shade: [.3, "#000"],
		shadeClose: !1,
		fix: !0,
		move: ".xubox_title",
		moveOut: !1,
		title: ["信息", !0],
		offset: ["200px", "50%"],
		area: ["310px", "auto"],
		closeBtn: [0, !0],
		time: 0,
		bgcolor: "#fff",
		border: [6, .3, "#000"],
		zIndex: 19891014,
		maxWidth: 400,
		dialog: {
			btns: 1,
			btn: ["确定", "取消"],
			type: 3,
			msg: "",
			yes: function(a) {
				layer.close(a)
			},
			no: function(a) {
				layer.close(a)
			}
		},
		page: {
			dom: "#xulayer",
			html: "",
			url: ""
		},
		iframe: {
			src: "http://sentsin.com",
			scrolling: "auto"
		},
		loading: {
			type: 0
		},
		tips: {
			msg: "",
			follow: "",
			guide: 0,
			isGuide: 0,
			style: ["background-color:#FF9900; color:#fff;", "#FF9900"]
		},
		success: function() {},
		close: function(a) {
			layer.close(a)
		},
		end: function() {}
	},
	h.pt.type = ["dialog", "page", "iframe", "loading", "tips"],
	h.pt.space = function(a) {
		var b, c, d, e, f, g, h, i, j, k, l, m, n;
		return a = a || "",
		b = this.index,
		c = this.config,
		d = c.dialog,
		e = this.dom,
		f = -1 === d.type ? "": '<span class="xubox_msg xulayer_png32 xubox_msgico xubox_msgtype' + d.type + '"></span>',
		g = ['<div class="xubox_dialog">' + f + '<span class="xubox_msg xubox_text" style="' + (f ? "": "padding-left:20px") + '">' + d.msg + "</span></div>", '<div class="xubox_page">' + a + "</div>", '<iframe scrolling="' + c.iframe.scrolling + '" allowtransparency="true" id="' + e.ifr + b + '" name="' + e.ifr + b + '" onload="$(this).removeClass(\'xubox_load\');" class="' + e.ifr + '" frameborder="0" src="' + c.iframe.src + '"></iframe>', '<span class="xubox_loading xubox_loading_' + c.loading.type + '"></span>', '<div class="xubox_tips" style="' + c.tips.style[0] + '"><div class="xubox_tipsMsg">' + c.tips.msg + '</div><i class="layerTipsG"></i></div>'],
		h = "",
		i = "",
		j = c.zIndex + b,
		k = "z-index:" + j + "; background-color:" + c.shade[1] + "; opacity:" + c.shade[0] + "; filter:alpha(opacity=" + 100 * c.shade[0] + ");",
		c.shade[0] && (h = '<div times="' + b + '" id="xubox_shade' + b + '" class="xubox_shade" style="' + k + '"></div>'),
		c.zIndex = j,
		l = "",
		m = "",
		n = "z-index:" + (j - 1) + ";  background-color: " + c.border[2] + "; opacity:" + c.border[1] + "; filter:alpha(opacity=" + 100 * c.border[1] + "); top:-" + c.border[0] + "px; left:-" + c.border[0] + "px;",
		c.border[0] && (i = '<div id="xubox_border' + b + '" class="xubox_border" style="' + n + '"></div>'),
		!c.maxmin || 1 !== c.type && 2 !== c.type || /^\d+%$/.test(c.area[0]) && /^\d+%$/.test(c.area[1]) || (m = '<a class="xubox_min" href="javascript:;"><cite></cite></a><a class="xubox_max xulayer_png32" href="javascript:;"></a>'),
		c.closeBtn[1] && (m += '<a class="xubox_close xulayer_png32 xubox_close' + c.closeBtn[0] + '" href="javascript:;" style="' + (4 === c.type ? "position:absolute; right:-3px; _right:7px; top:-4px;": "") + '"></a>'),
		c.title[1] && (l = '<div class="xubox_title"><em>' + c.title[0] + "</em></div>"),
		[h, '<div times="' + b + '" showtime="' + c.time + '" style="z-index:' + j + '" id="' + e.lay + b + '" class="' + e.lay + '">' + '<div style="background-color:' + c.bgcolor + "; z-index:" + j + '" class="xubox_main">' + g[c.type] + l + '<span class="xubox_setwin">' + m + "</span>" + '<span class="xubox_botton"></span>' + "</div>" + i + "</div>"]
	},
	g.dom = h.pt.dom = {
		lay: "xubox_layer",
		ifr: "xubox_iframe",
		title: ".xubox_title",
		text: ".xubox_text",
		page: ".xubox_page"
	},
	h.pt.creat = function() {
		var l, m, n, a = this,
		b = "",
		c = a.config,
		d = c.dialog,
		g = a.dom,
		h = a.index,
		i = c.page,
		j = e("body"),
		k = function(c) {
			var c = c || "";
			b = a.space(c),
			j.append(e(b[0]))
		};
		switch (c.title === !1 ? c.title = [] : "string" == typeof c.title && (c.title = [c.title, !0]), c.type) {
		case 0:
			c.title[1] || (c.area = ["auto", "auto"]),
			e(".xubox_dialog")[0] && layer.close(e(".xubox_dialog").parents("." + g.lay).attr("times"));
			break;
		case 1:
			if ("" !== i.html) k('<div class="xuboxPageHtml">' + i.html + "</div>"),
			j.append(e(b[1]));
			else if ("" !== i.url) k('<div class="xuboxPageHtml" id="xuboxPageHtml' + h + '">' + i.html + "</div>"),
			j.append(e(b[1])),
			e.get(i.url,
			function(a) {
				e("#xuboxPageHtml" + h).html(a.toString()),
				i.ok && i.ok(a)
			});
			else {
				if (0 != e(i.dom).parents(g.page).length) return;
				k(),
				e(i.dom).show().wrap(e(b[1]))
			}
			break;
		case 3:
			c.title = [],
			c.area = ["auto", "auto"],
			c.closeBtn = ["", !1],
			e(".xubox_loading")[0] && layer.close(e(".xubox_loading").parents("." + g.lay).attr("times"));
			break;
		case 4:
			c.title = [],
			c.area = ["auto", "auto"],
			c.fix = !1,
			c.border = [0],
			e(".xubox_tips")[0] && layer.close(e(".xubox_tips").parents("." + g.lay).attr("times"))
		}
		if (1 !== c.type && (k(), j.append(e(b[1]))), l = a.layerE = e("#" + g.lay + h), a.offsetTop = -1 != c.offset[0].indexOf("px") ? parseFloat(c.offset[0]) : parseFloat(c.offset[0]) / 100 * f.height(), a.offsetTop = a.offsetTop + c.border[0] + (c.fix ? 0 : f.scrollTop()), -1 != c.offset[1].indexOf("px") ? a.offsetLeft = parseFloat(c.offset[1]) + c.border[0] : (c.offset[1] = "" === c.offset[1] ? "50%": c.offset[1], a.offsetLeft = "50%" === c.offset[1] ? c.offset[1] : parseFloat(c.offset[1]) / 100 * f.width() + c.border[0]), l.css({
			left: a.offsetLeft,
			top: a.offsetTop,
			width: c.area[0],
			height: c.area[1]
		}), c.fix || l.css({
			position: "absolute"
		}), c.title[1] && (3 !== c.type || 4 !== c.type)) switch (m = 0 === c.type ? d: c, n = l.find(".xubox_botton"), m.btn = c.btn || d.btn, m.btns) {
		case 0:
			n.html("").hide();
			break;
		case 1:
			n.html('<a href="javascript:;" class="xubox_yes xubox_botton1">' + m.btn[0] + "</a>");
			break;
		case 2:
			n.html('<a href="javascript:;" class="xubox_yes xubox_botton2">' + m.btn[0] + "</a>" + '<a href="javascript:;" class="xubox_no xubox_botton3">' + m.btn[1] + "</a>")
		}
		"auto" === l.css("left") ? (l.hide(), setTimeout(function() {
			l.show(),
			a.set(h)
		},
		500)) : a.set(h),
		c.time <= 0 || a.autoclose(),
		a.callback()
	},
	h.pt.set = function(a) {
		var l, m, n, o, p, q, b = this,
		c = b.dom,
		d = b.layerE,
		g = d.find(c.title),
		h = b.config,
		j = (h.dialog, h.page);
		switch (h.loading, b.autoArea(a), h.title[1] ? 0 === h.type && layer.ie6 && g.css({
			width: d.outerWidth()
		}) : 4 != h.type && d.find(".xubox_close").addClass("xubox_close1"), d.attr({
			type: b.type[h.type]
		}), h.type) {
		case 0:
			d.find(".xubox_main").css({
				"background-color":
				"#fff"
			}),
			h.title[1] ? d.find(c.text).css({
				paddingTop: 18 + g.outerHeight()
			}) : (d.find(".xubox_msgico").css({
				top: 8
			}), d.find(c.text).css({
				marginTop: 11
			}));
			break;
		case 1:
			d.find(j.dom).addClass("layer_pageContent"),
			h.shade[0] && d.css({
				zIndex: h.zIndex + 1
			}),
			h.title[1] && d.find(c.page).css({
				top: g.outerHeight()
			});
			break;
		case 2:
			l = d.find("." + c.ifr),
			m = d.height(),
			l.addClass("xubox_load").css({
				width: d.width()
			}),
			h.title[1] ? l.css({
				top: g.height(),
				height: m - g.height()
			}) : l.css({
				top: 0,
				height: m
			}),
			layer.ie6 && l.attr("src", h.iframe.src);
			break;
		case 4:
			n = [0, d.outerHeight()],
			o = e(h.tips.follow),
			p = {
				width: o.outerWidth(),
				height: o.outerHeight(),
				top: o.offset().top,
				left: o.offset().left
			},
			q = d.find(".layerTipsG"),
			h.tips.isGuide || q.remove(),
			d.outerWidth() > h.maxWidth && d.width(h.maxWidth),
			p.tipColor = h.tips.style[1],
			n[0] = d.outerWidth(),
			p.where = [function() {
				p.tipLeft = p.left,
				p.tipTop = p.top - n[1] - 10,
				q.removeClass("layerTipsB").addClass("layerTipsT").css({
					"border-right-color": p.tipColor
				})
			},
			function() {
				p.tipLeft = p.left + p.width + 10,
				p.tipTop = p.top,
				q.removeClass("layerTipsL").addClass("layerTipsR").css({
					"border-bottom-color": p.tipColor
				})
			},
			function() {
				p.tipLeft = p.left,
				p.tipTop = p.top + p.height + 10,
				q.removeClass("layerTipsT").addClass("layerTipsB").css({
					"border-right-color": p.tipColor
				})
			},
			function() {
				p.tipLeft = p.left - n[0] + 10,
				p.tipTop = p.top,
				q.removeClass("layerTipsR").addClass("layerTipsL").css({
					"border-bottom-color": p.tipColor
				})
			}],
			p.where[h.tips.guide](),
			0 === h.tips.guide ? p.top - (f.scrollTop() + n[1] + 16) < 0 && p.where[2]() : 1 === h.tips.guide ? f.width() - (p.left + p.width + n[0] + 16) > 0 || p.where[3]() : 2 === h.tips.guide ? p.top - f.scrollTop() + p.height + n[1] + 16 - f.height() > 0 && p.where[0]() : 3 === h.tips.guide && n[0] + 16 - p.left > 0 && p.where[1](),
			d.css({
				left: p.tipLeft,
				top: p.tipTop
			})
		}
		h.fadeIn && d.css({
			opacity: 0
		}).animate({
			opacity: 1
		},
		h.fadeIn),
		b.move()
	},
	h.pt.autoArea = function(a) {
		var c, d, f, g, h, i, k, j, l, m, n, o, b = this;
		switch (a = a || b.index, c = b.dom, d = b.config, f = d.page, g = e("#" + c.lay + a), h = g.find(c.title), i = g.find(".xubox_main"), j = d.title[1] ? h.innerHeight() : 0, l = 0, "auto" === d.area[0] && i.outerWidth() >= d.maxWidth && g.css({
			width: d.maxWidth
		}), d.type) {
		case 0:
			m = g.find(".xubox_botton>a"),
			k = g.find(c.text).outerHeight() + 20,
			m.length > 0 && (l = m.outerHeight() + 20);
			break;
		case 1:
			n = g.find(c.page),
			k = e(f.dom).outerHeight(),
			"auto" === d.area[0] && g.css({
				width: n.outerWidth()
			}),
			("" !== f.html || "" !== f.url) && (k = n.outerHeight());
			break;
		case 2:
			g.find("iframe").css({
				width:
				g.outerWidth(),
				height: g.outerHeight() - (d.title[1] ? h.innerHeight() : 0)
			});
			break;
		case 3:
			o = g.find(".xubox_loading"),
			k = o.outerHeight(),
			i.css({
				width: o.width()
			})
		}
		"auto" === d.area[1] && i.css({
			height: j + k + l
		}),
		e("#xubox_border" + a).css({
			width: g.outerWidth() + 2 * d.border[0],
			height: g.outerHeight() + 2 * d.border[0]
		}),
		layer.ie6 && "auto" !== d.area[0] && i.css({
			width: g.outerWidth()
		}),
		"50%" !== d.offset[1] && "" != d.offset[1] || 4 === d.type ? g.css({
			marginLeft: 0
		}) : g.css({
			marginLeft: -g.outerWidth() / 2
		})
	},
	h.pt.move = function() {
		var a = this,
		b = this.config,
		c = a.dom,
		d = {
			setY: 0,
			moveLayer: function() {
				var a;
				a = 0 == parseInt(d.layerE.css("margin-left")) ? parseInt(d.move.css("left")) : parseInt(d.move.css("left")) + -parseInt(d.layerE.css("margin-left")),
				"fixed" !== d.layerE.css("position") && (a -= d.layerE.parent().offset().left, d.setY = 0),
				d.layerE.css({
					left: a,
					top: parseInt(d.move.css("top")) - d.setY
				})
			}
		};
		b.move && a.layerE.find(b.move).attr("move", "ok"),
		b.move ? a.layerE.find(b.move).css({
			cursor: "move"
		}) : a.layerE.find(b.move).css({
			cursor: "auto"
		}),
		e(b.move).on("mousedown",
		function(a) {
			if (a.preventDefault(), "ok" === e(this).attr("move")) {
				d.ismove = !0,
				d.layerE = e(this).parents("." + c.lay);
				var g = d.layerE.offset().left,
				h = d.layerE.offset().top,
				i = d.layerE.width() - 6,
				j = d.layerE.height() - 6;
				e("#xubox_moves")[0] || e("body").append('<div id="xubox_moves" class="xubox_moves" style="left:' + g + "px; top:" + h + "px; width:" + i + "px; height:" + j + 'px; z-index:2147483584"></div>'),
				d.move = e("#xubox_moves"),
				b.moveType && d.move.css({
					opacity: 0
				}),
				d.moveX = a.pageX - d.move.position().left,
				d.moveY = a.pageY - d.move.position().top,
				"fixed" !== d.layerE.css("position") || (d.setY = f.scrollTop())
			}
		}),
		e(document).mousemove(function(a) {
			var c, e, g, h;
			d.ismove && (c = a.pageX - d.moveX, e = a.pageY - d.moveY, a.preventDefault(), b.moveOut || (d.setY = f.scrollTop(), g = f.width() - d.move.outerWidth() - b.border[0], h = b.border[0] + d.setY, c < b.border[0] && (c = b.border[0]), c > g && (c = g), h > e && (e = h), e > f.height() - d.move.outerHeight() - b.border[0] + d.setY && (e = f.height() - d.move.outerHeight() - b.border[0] + d.setY)), d.move.css({
				left: c,
				top: e
			}), b.moveType && d.moveLayer(), c = null, e = null, g = null, h = null)
		}).mouseup(function() {
			try {
				d.ismove && (d.moveLayer(), d.move.remove()),
				d.ismove = !1
			} catch(a) {
				d.ismove = !1
			}
			b.moveEnd && b.moveEnd()
		})
	},
	h.pt.autoclose = function() {
		var a = this,
		b = this.config.time,
		c = function() {
			b--,
			0 === b && (layer.close(a.index), clearInterval(a.autotime))
		};
		this.autotime = setInterval(c, 1e3)
	},
	g.config = {
		end: {}
	},
	h.pt.callback = function() {
		var a = this,
		b = a.layerE,
		c = a.config,
		d = c.dialog;
		a.openLayer(),
		a.config.success(b),
		layer.ie6 && a.IE6(b),
		b.find(".xubox_close").on("click",
		function() {
			c.close(a.index),
			layer.close(a.index)
		}),
		b.find(".xubox_yes").on("click",
		function() {
			c.yes ? c.yes(a.index) : d.yes(a.index)
		}),
		b.find(".xubox_no").on("click",
		function() {
			c.no ? c.no(a.index) : d.no(a.index),
			layer.close(a.index)
		}),
		a.config.shadeClose && e("#xubox_shade" + a.index).on("click",
		function() {
			layer.close(a.index)
		}),
		b.find(".xubox_min").on("click",
		function() {
			layer.min(a.index, c),
			c.min && c.min(b)
		}),
		b.find(".xubox_max").on("click",
		function() {
			e(this).hasClass("xubox_maxmin") ? (layer.restore(a.index), c.restore && c.restore(b)) : (layer.full(a.index, c), c.full && c.full(b))
		}),
		g.config.end[a.index] = c.end
	},
	h.pt.IE6 = function(a) {
		var h, b = this,
		c = e("select"),
		d = b.dom,
		g = a.offset().top;
		h = b.config.fix ?
		function() {
			a.css({
				top: f.scrollTop() + g
			})
		}: function() {
			a.css({
				top: g
			})
		},
		h(),
		f.scroll(h),
		e.each(c,
		function() {
			var c = e(this);
			c.parents("." + d.lay)[0] || "none" == c.css("display") || c.attr({
				layer: "1"
			}).hide(),
			c = null
		}),
		b.reselect = function() {
			e.each(c,
			function() {
				var c = e(this);
				c.parents("." + d.lay)[0] || 1 == c.attr("layer") && e("." + d.lay).length < 1 && c.removeAttr("layer").show(),
				c = null
			})
		}
	},
	h.pt.openLayer = function() {
		var a = this,
		b = a.dom,
		c = {};
		b.html = e("html"),
		layer.autoArea = function(b) {
			return a.autoArea(b)
		},
		layer.getIndex = function(a) {
			return e(a).parents("." + b.lay).attr("times")
		},
		layer.getChildFrame = function(a, c) {
			return c = c || e("." + b.ifr).parents("." + b.lay).attr("times"),
			e("#" + b.lay + c).find("." + b.ifr).contents().find(a)
		},
		layer.getFrameIndex = function(a) {
			return e(a ? "#" + a: "." + b.ifr).parents("." + b.lay).attr("times")
		},
		layer.iframeAuto = function(a) {
			var c, d, f, g, h;
			a = a || e("." + b.ifr).parents("." + b.lay).attr("times"),
			c = this.getChildFrame("body", a).outerHeight(),
			d = e("#" + b.lay + a),
			f = d.find(b.title),
			g = 0,
			f && (g = f.height()),
			d.css({
				height: c + g
			}),
			h = -parseInt(e("#xubox_border" + a).css("top")),
			e("#xubox_border" + a).css({
				height: c + 2 * h + g
			}),
			e("#" + b.ifr + a).css({
				height: c
			})
		},
		c.isauto = function(a, b, c) {
			"auto" === b.area[0] && (b.area[0] = a.outerWidth()),
			"auto" === b.area[1] && (b.area[1] = a.outerHeight()),
			a.attr({
				area: b.area + "," + c
			}),
			a.find(".xubox_max").addClass("xubox_maxmin")
		},
		c.rescollbar = function(a) {
			b.html.attr("layer-full") == a && (b.html[0].style.removeProperty ? b.html[0].style.removeProperty("overflow") : b.html[0].style.removeAttribute("overflow"), b.html.removeAttr("layer-full"))
		},
		layer.min = function(a, d) {
			var f = e("#" + b.lay + a),
			g = [f.position().top, f.position().left + parseFloat(f.css("margin-left"))];
			c.isauto(f, d, g),
			layer.area(a, {
				width: 180,
				height: 35
			}),
			f.find(".xubox_min").hide(),
			"page" === f.attr("type") && f.find(b.page).hide(),
			c.rescollbar(a)
		},
		layer.restore = function(a) {
			var d = e("#" + b.lay + a),
			f = d.attr("area").split(",");
			d.attr("type"),
			layer.area(a, {
				width: parseFloat(f[0]),
				height: parseFloat(f[1]),
				top: parseFloat(f[2]),
				left: parseFloat(f[3])
			}),
			d.find(".xubox_max").removeClass("xubox_maxmin"),
			d.find(".xubox_min").show(),
			"page" === d.attr("type") && d.find(b.page).show(),
			c.rescollbar(a)
		},
		layer.full = function(a, d) {
			var i, g = e("#" + b.lay + a),
			h = 2 * d.border[0],
			j = [g.position().top, g.position().left + parseFloat(g.css("margin-left"))];
			c.isauto(g, d, j),
			b.html.attr("layer-full") || b.html.css("overflow", "hidden").attr("layer-full", a),
			clearTimeout(i),
			i = setTimeout(function() {
				layer.area(a, {
					top: "fixed" === g.css("position") ? 0 : f.scrollTop(),
					left: "fixed" === g.css("position") ? 0 : f.scrollLeft(),
					width: f.width() - h,
					height: f.height() - h
				})
			},
			100)
		},
		layer.close = function(d) {
			var j, f = e("#" + b.lay + d),
			h = f.attr("type"),
			i = e("#xubox_moves, #xubox_shade" + d);
			if (f[0]) {
				if (h == a.type[1]) if (f.find(".xuboxPageHtml")[0]) f[0].innerHTML = "",
				f.remove();
				else for (f.find(".xubox_setwin,.xubox_close,.xubox_botton,.xubox_title,.xubox_border").remove(), j = 0; 3 > j; j++) f.find(".layer_pageContent").unwrap().hide();
				else f[0].innerHTML = "",
				f.remove();
				i.remove(),
				layer.ie6 && a.reselect(),
				c.rescollbar(d),
				"function" == typeof g.config.end[d] && g.config.end[d](),
				delete g.config.end[d]
			}
		},
		layer.closeLoad = function() {
			var a = e(".xubox_loading").parents("." + b.lay),
			c = a.attr("times");
			layer.close(c)
		},
		layer.shift = function(b, c, d) {
			var e, g, h, i, j, k;
			if (!layer.ie6) switch (e = a.config, g = a.layerE, h = 0, i = f.width(), j = f.height() + (e.fix ? 0 : f.scrollTop()), h = "50%" == e.offset[1] || "" == e.offset[1] ? g.outerWidth() / 2 : g.outerWidth(), k = {
				t: {
					top: a.offsetTop
				},
				b: {
					top: j - g.outerHeight() - e.border[0]
				},
				cl: h + e.border[0],
				ct: -g.outerHeight(),
				cr: i - h - e.border[0]
			},
			b) {
			case "left-top":
				g.css({
					left:
					k.cl,
					top: k.ct
				}).animate(k.t, c);
				break;
			case "top":
				g.css({
					top:
					k.ct
				}).animate(k.t, c);
				break;
			case "right-top":
				g.css({
					left:
					k.cr,
					top: k.ct
				}).animate(k.t, c);
				break;
			case "right-bottom":
				g.css({
					left:
					k.cr,
					top: j
				}).animate(d ? k.t: k.b, c);
				break;
			case "bottom":
				g.css({
					top:
					j
				}).animate(d ? k.t: k.b, c);
				break;
			case "left-bottom":
				g.css({
					left:
					k.cl,
					top: j
				}).animate(d ? k.t: k.b, c);
				break;
			case "left":
				g.css({
					left:
					-g.outerWidth()
				}).animate({
					left: a.offsetLeft
				},
				c)
			}
		},
		layer.setMove = function() {
			return a.move()
		},
		layer.area = function(c, d) {
			var j, f = [e("#" + b.lay + c), e("#xubox_border" + c)],
			g = f[0].attr("type"),
			h = f[0].find(".xubox_main"),
			i = f[0].find(b.title); (g === a.type[1] || g === a.type[2]) && (f[0].css(d), h.css({
				width: d.width,
				height: d.height
			}), g === a.type[2] && (j = f[0].find("iframe"), j.css({
				width: d.width,
				height: i ? d.height - i.innerHeight() : d.height
			})), "0px" !== f[0].css("margin-left") && (d.hasOwnProperty("top") && f[0].css({
				top: d.top - (f[1][0] && parseFloat(f[1].css("top")))
			}), d.hasOwnProperty("left") && f[0].css({
				left: d.left + f[0].outerWidth() / 2 - (f[1][0] && parseFloat(f[1].css("left")))
			}), f[0].css({
				marginLeft: -f[0].outerWidth() / 2
			})), f[1][0] && f[1].css({
				width: parseFloat(d.width) - 2 * parseFloat(f[1].css("left")),
				height: parseFloat(d.height) - 2 * parseFloat(f[1].css("top"))
			}))
		},
		layer.iframeSrc = function(a, c) {
			e("#" + b.lay + a).find("iframe").attr("src", c)
		},
		layer.zIndex = a.config.zIndex,
		layer.setTop = function(a) {
			var b = function() {
				layer.zIndex++,
				a.css("z-index", layer.zIndex + 1)
			};
			return layer.zIndex = parseInt(a[0].style.zIndex),
			a.on("mousedown", b),
			layer.zIndex
		}
	},
	layer.closeTips = function() {
		var a = e(".xubox_tips");
		a[0] && layer.close(a.parents(".xubox_layer").attr("times"))
	},
	layer.closeAll = function() {
		var a = e("." + g.dom.lay);
		e.each(a,
		function() {
			var a = e(this).attr("times");
			layer.close(a)
		})
	},
	g.run = function() {
		e = jQuery,
		f = e(a),
		layer.use("skin/layer.css"),
		e.layer = function(a) {
			var b = new h(a);
			return b.index
		},
		(new Image).src = layer.path + "skin/default/xubox_ico0.png"
	},
	i = "../../init/jquery",
	a.seajs ? define([i],
	function(b, c) {
		g.run(),
		c.layer = [a.layer, a.$.layer]
	}) : g.run()
} (window);