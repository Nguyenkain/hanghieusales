(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
	// smartresize
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');

function hideImage(e) {
    if (jQuery.browser.opera) {
        var t = jQuery(e).parent().parent().parent();
        t.height(t.height())
    }
    jQuery(e).animate({opacity: 0}, 150)
}
function showImage(e) {
    jQuery(e).animate({opacity: 1}, 150)
}
function showPopup() {
    html = '<div class="etheme-popup-overlay"></div><div class="etheme-popup"><div class="etheme-popup-content"></div></div>', jQuery("body").prepend(html), popupOverlay = jQuery(".etheme-popup-overlay"), popupWindow = jQuery(".etheme-popup"), popupOverlay.one("click", function () {
        hidePopup(popupOverlay, popupWindow)
    })
}
function hidePopup(e, t) {
    e.fadeOut(400), t.fadeOut(400).html("")
}
jQuery(window).load(function () {
    jQuery("#loader-status").fadeOut(), jQuery("#loader").delay(300).fadeOut("slow")
}), jQuery(document).ready(function () {
    function e() {
        jQuery(".switchToList").addClass(c), jQuery(".switchToGrid").removeClass(c), jQuery("#products-grid").fadeOut(300, function () {
            jQuery(this).removeClass(d).addClass(p).fadeIn(300), jQuery.cookie("products_page", "list")
        })
    }
    function t() {
        jQuery(".switchToGrid").addClass(c), jQuery(".switchToList").removeClass(c), jQuery("#products-grid").fadeOut(300, function () {
            jQuery(this).removeClass(p).addClass(d).fadeIn(300), jQuery.cookie("products_page", "grid")
        })
    }
    jQuery("form.variations_form").on("found_variation", function (e, t) {
        {
            var r = (jQuery(this), jQuery(this).closest(".product")), a = r.find("div.images img:eq(0)"), o = r.find("div.images a.zoom:eq(0)"), i = (a.attr("data-o_src"), a.attr("data-o_title"), o.attr("data-o_href"), t.image_src), n = t.image_link;
            t.image_title
        }
        console.log(i), "" != n && jQuery("a.main-zoom-image").attr("href", n), "" != i && jQuery("a.main-zoom-image img").attr("src", i)
    }).on("reset_image", function () {
        var e = jQuery(this).closest(".product"), t = e.find("div.images img:eq(0)"), r = e.find("div.images a.zoom:eq(0)"), a = t.attr("data-o_src"), o = r.attr("data-o_href");
        jQuery("a.main-zoom-image").attr("href", o), jQuery("a.main-zoom-image img").attr("src", a)
    });
    var r = jQuery("#main-nav > ul, div.menu > ul").clone(), a = '<span class="open-child">(open)</span>';
    r.removeClass("menu").addClass("et-mobile-menu"), r.before('<span class="et-menu-title">' + menuTitle + "</span>"), r.find("li:has(ul)", this).each(function () {
        jQuery(this).prepend(a)
    }), r.find(".open-child").toggle(function () {
        jQuery(this).parent().addClass("over").find(">ul").slideDown(200)
    }, function () {
        jQuery(this).parent().removeClass("over").find(">ul").slideUp(200)
    }), jQuery("#main-nav, div.menu").after(r).after('<span class="et-menu-title">' + menuTitle + "</span>"), jQuery(".et-menu-title").toggle(function () {
        jQuery(this).next().slideDown(200)
    }, function () {
        jQuery(this).next().slideUp(200)
    }), jQuery("#top-cart").hoverIntent(function () {
        jQuery(".cart-popup").stop().slideDown(100)
    }, function () {
        jQuery(".cart-popup").stop().slideUp(100)
    });
    {
        var o = jQuery(".tabs-nav"), i = o.children("li");
        jQuery(".tab-content")
    }
    o.each(function () {
        var e = jQuery(this);
        e.next().children(".tab-content").stop(!0, !0).hide().first().show(), e.children("li").first().addClass("active").stop(!0, !0).show()
    }), i.on("click", function (e) {
        var t = jQuery(this);
        t.siblings().removeClass("active").end().addClass("active"), t.parent().next().children(".tab-content").stop(!0, !0).hide().siblings(t.find("a").attr("href")).fadeIn(), e.preventDefault()
    });
    var n = jQuery(".acc-container"), u = jQuery(".acc-trigger");
    n.hide(), u.first().addClass("active").next().show();
    var s = n.outerWidth(!0);
    u.css("width", s), n.css("width", s), u.on("click", function (e) {
        jQuery(this).next().is(":hidden") && (u.removeClass("active").next().slideUp(300), jQuery(this).toggleClass("active").next().slideDown(300)), e.preventDefault()
    }), jQuery(window).on("resize", function () {
        s = n.outerWidth(!0), u.css("width", u.parent().width()), n.css("width", n.parent().width())
    }), jQuery("a#checkout-next").click(function () {
        jQuery("#shopping-cart-form").fadeIn();
        var e = jQuery("#shopping-cart").width() + 30;
        return jQuery("#checkout-bar-in").animate({width: "+=50%"}), jQuery("#checkout-slider").animate({marginLeft: "-=" + e}, 800, function () {
            jQuery("body,html").animate({scrollTop: 0}, 800)
        }), !1
    }), jQuery("a#checkout-back,a.checkout-back").click(function () {
        jQuery("#shopping-cart-form").fadeOut();
        var e = jQuery("#shopping-cart").width() + 30;
        return jQuery("#checkout-bar-in").animate({width: "-=50%"}), jQuery("#checkout-slider").animate({marginLeft: "+=" + e}, 800, function () {
            jQuery("body,html").animate({scrollTop: 0}, 800)
        }), !1
    });
    var c = "active_switcher", d = "products_grid", p = "products_list";
    jQuery(".switchToList").click(function () {
        jQuery.cookie("products_page") && "grid" != jQuery.cookie("products_page") || e()
    }), jQuery(".switchToGrid").click(function () {
        jQuery.cookie("products_page") && "list" != jQuery.cookie("products_page") || t()
    });
    var l, y = !1, m = jQuery("#back-to-top"), h = jQuery(window), f = jQuery(document.body).children(0).position().top;
    h.scroll(function () {
        window.clearTimeout(l), l = window.setTimeout(function () {
            h.scrollTop() <= f ? (y = !1, m.fadeOut(500)) : 0 == y && (y = !0, m.stop(!0, !0).fadeIn(500).click(function () {
                m.fadeOut(500)
            }))
        }, 400)
    }), jQuery("#top-link").click(function () {
        return jQuery("html, body").animate({scrollTop: 0}, "slow"), !1
    }), jQuery(function () {
        function e(e) {
            t(), e.parent().parent().addClass("opened"), e.parent().next().show(a)
        }
        function t() {
            jQuery(".categories-group.opened").removeClass("opened").find(".wpsc_top_level_categories").hide(a)
        }
        if (nav_accordion) {
            jQuery(".block.cats").addClass("acc_enabled"), jQuery(".categories-group").each(function () {
                jQuery(this).has(".wpsc_top_level_categories").addClass("has-subnav"), jQuery(this).has(".current-cat").addClass("current-parent opened")
            });
            var r = (jQuery(".categories-group .wpsc_top_level_categories"), jQuery(".categories-group .wpsc_category_title .btn-show ")), a = 150;
            r.click(function () {
                jQuery(this).parent().parent().hasClass("opened") ? t() : e(jQuery(this))
            }), jQuery(".categories-group.opened").length > 0 || jQuery(".categories-group.has-subnav:first").addClass("opened").find("ul").show()
        } else
            jQuery(".categories-group .wpsc_category_title .btn-show ").hide()
    });
    var j = jQuery("#ethemeContactForm"), Q = jQuery(".contactSpinner");
    jQuery(".required-field").focus(function () {
        jQuery(this).removeClass("validation-failed")
    }), j.find("button.button").click(function (e) {
        jQuery("#contactsMsgs").html(""), e.preventDefault(), Q.show();
        var t;
        t = "", j.find(".required-field").each(function () {
            "" == jQuery(this).val() && (t = isRequired, jQuery(this).addClass("validation-failed"))
        }), t ? (jQuery("#contactsMsgs").html('<p class="error">' + t + "</p>"), Q.hide()) : (url = j.attr("action"), data = j.serialize(), data += "&contactSubmit=true", jQuery.ajax({url: url, method: "GET", data: data, error: function () {
                jQuery("#contactsMsgs").html('<p class="error">' + someerrmsg + "</p>"), Q.hide()
            }, success: function () {
                jQuery("#contactsMsgs").html('<p class="success">' + succmsg + "</p>"), Q.hide(), j.find("input[type=text], textarea").val("")
            }}))
    }), $portfolio = jQuery(".portfolio"), jQuery(window).smartresize(function () {
        $portfolio.isotope({itemSelector: ".portfolio-item"})
    }), jQuery(".portfolio-filters a").click(function () {
        var e = jQuery(this).attr("data-filter");
        return jQuery(".portfolio-filters a").removeClass("selected"), jQuery(this).hasClass("selected") || jQuery(this).addClass("selected"), $portfolio.isotope({filter: e}), !1
    }), setTimeout(function () {
        jQuery(".portfolio").addClass("with-transition"), jQuery(".portfolio-item").addClass("with-transition")
    }, 500), jQuery(".qty.text[max]").change(function () {
        parseInt(jQuery(this).val()) > jQuery(this).attr("max") && jQuery(this).val(jQuery(this).attr("max"))
    }), jQuery(".etheme-simple-product").live("click", function () {
        var e = jQuery(this);
        if (e.is(".etheme-simple-product, .product_type_downloadable, .product_type_virtual")) {
            showPopup(), jQuery("#top-cart").addClass("updating"), popupOverlay = jQuery(".etheme-popup-overlay"), popupWindow = jQuery(".etheme-popup"), formAction = jQuery("#simple-product-form").attr("action");
            var t = {quantity: jQuery("input[name=quantity]").val(), "add-to-cart": jQuery("input[name=add-to-cart]").val()};
            return jQuery("body").trigger("adding_to_cart"), jQuery.ajax({url: formAction, data: t, method: "POST", timeout: 1e4, dataType: "text", success: function (e) {
                    jQuery("#top-cart").html(jQuery(e).find("#top-cart").html()), productImageSrc = jQuery(".main-image img").attr("src"), productImage = '<img width="72" src="' + productImageSrc + '" />', productName = jQuery(".product-shop > h1").text(), cartHref = jQuery("#top-cart > a").attr("href"), popupHtml = productImage + "<em>" + productName + "</em> " + successfullyAdded2, popupWindow.find(".etheme-popup-content").css("backgroundImage", "none").html(popupHtml), jQuery(".cont-shop").one("click", function () {
                        hidePopup(popupOverlay, popupWindow)
                    })
                }, error: function () {
                    popupWindow.find(".etheme-popup-content").css("backgroundImage", "none").text("Something wrong")
                }}), !1
        }
        return!0
    }), jQuery(document).on("click", ".etheme_add_to_cart_button", function () {
        var e = jQuery(this);
        if (e.is(".product_type_simple, .product_type_downloadable, .product_type_virtual")) {
            if (!e.attr("data-product_id"))
                return!0;
            e.removeClass("added"), e.addClass("loading");
            var t = {action: "woocommerce_add_to_cart", product_id: e.attr("data-product_id"), quantity: e.attr("data-quantity"), security: woocommerce_params.add_to_cart_nonce};
            return jQuery("body").trigger("adding_to_cart", [e, t]), jQuery.post(woocommerce_params.ajax_url, t, function (t) {
                if (t) {
                    var r = window.location.toString();
                    return r = r.replace("add-to-cart", "added-to-cart"), t.error && t.product_url ? void(window.location = t.product_url) : "yes" == woocommerce_params.cart_redirect_after_add ? void(window.location = woocommerce_params.cart_url) : (e.removeClass("loading"), fragments = t.fragments, cart_hash = t.cart_hash, fragments && jQuery.each(fragments, function (e) {
                        jQuery(e).addClass("updating")
                    }), jQuery(".shop_table.cart, .updating, .cart_totals").fadeTo("400", "0.6").block({message: null, overlayCSS: {background: "transparent url(" + woocommerce_params.ajax_loader_url + ") no-repeat center", backgroundSize: "16px 16px", opacity: .6}}), 0 == e.parent().find(".added_to_cart").size() && e.addClass("added").after(' <a href="' + woocommerce_params.cart_url + '" class="added_to_cart" title="' + woocommerce_params.i18n_view_cart + '">' + woocommerce_params.i18n_view_cart + "</a>"), fragments && jQuery.each(fragments, function (e, t) {
                        jQuery(e).replaceWith(t)
                    }), jQuery(".widget_shopping_cart, .updating").stop(!0).css("opacity", "1").unblock(), jQuery(".widget_shopping_cart").size() > 0 && jQuery(".widget_shopping_cart:eq(0)").load(r + " .widget_shopping_cart:eq(0) > *", function () {
                        fragments && jQuery.each(fragments, function (e, t) {
                            jQuery(e).replaceWith(t)
                        }), jQuery(".widget_shopping_cart, .updating").stop(!0).css("opacity", "1").unblock(), jQuery("body").trigger("cart_widget_refreshed")
                    }), jQuery(".shop_table.cart").load(r + " .shop_table.cart:eq(0) > *", function () {
                        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass("buttons_added").append('<input type="button" value="+" id="add1" class="plus" />').prepend('<input type="button" value="-" id="minus1" class="minus" />'), jQuery(".shop_table.cart").stop(!0).css("opacity", "1").unblock(), jQuery("body").trigger("cart_page_refreshed")
                    }), jQuery(".cart_totals").load(r + " .cart_totals:eq(0) > *", function () {
                        $(".cart_totals").stop(!0).css("opacity", "1").unblock()
                    }), jQuery("body").trigger("added_to_cart", [fragments, cart_hash]), void 0)
                }
            }), !1
        }
        return!0
    });
    var g = jQuery("#commentform");
    g.find("#submit").click(function (e) {
        jQuery("#commentsMsgs").html("");
        var t;
        t = "", g.find(".required-field").each(function () {
            "" == jQuery(this).val() && (t = isRequired, jQuery(this).addClass("validation-failed"))
        }), t && (e.preventDefault(), jQuery("#commentsMsgs").html('<p class="error">' + t + "</p>"))
    }), jQuery(".hideableHover").bind("mouseenter", function () {
        hideImage(this)
    }), jQuery(".hideableHover").bind("mouseleave", function () {
        showImage(this)
    })
});