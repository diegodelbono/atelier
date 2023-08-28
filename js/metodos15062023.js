jQuery(document).ready(function () {

    // Accordion
    var panels = jQuery(".accordion__content").hide();

    jQuery(".accordion__header").click(function () {
        if (jQuery(this).hasClass("accordion__header--active")) {
            jQuery(this).removeClass("accordion__header--active");
            panels.slideUp();
        } else {
            panels.slideUp();
            jQuery(".accordion__header").removeClass("accordion__header--active");
            jQuery(this).addClass("accordion__header--active");
            jQuery(this).next(".accordion__content").slideDown();
        }
    });

    // Sub Accordion
    var panelsm = jQuery(".accordion-sm__content").hide();

    jQuery(".accordion-sm__header").click(function () {
        if (jQuery(this).hasClass("accordion-sm__header--active")) {
            jQuery(this).removeClass("accordion-sm__header--active");
            panelsm.slideUp();
        } else {
            panelsm.slideUp();
            jQuery(".accordion-sm__header").removeClass("accordion-sm__header--active");
            jQuery(this).addClass("accordion-sm__header--active");
            jQuery(this).next(".accordion-sm__content").slideDown();
        }
    });

    // FAQ
    if (window.location.hash != "") {
        var ref = window.location.hash;
        var header = ref + " .accordion__header";

        jQuery(header).addClass("accordion__header--active");
        jQuery(header).next(".accordion__content").slideDown();
    }

    // Carrusel
    jQuery("#owl__slide").owlCarousel({
        items: 1,
        nav: true,
        loop: true,
    });

    jQuery(".js-gallery").slick({
        infinite: true,
        centerPadding: 50,
        slidesToShow: 1,
        variableWidth: true,
        adaptiveHeight: false,
    });

    // Header
    var lastScrollTop = 0;
    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll > lastScrollTop) {
            jQuery(".header").removeClass("header--fixed");
        } else {
            jQuery(".header").addClass("header--fixed");
        }
        lastScrollTop = scroll;
        if (scroll <= 0) {
            jQuery(".header").removeClass("header--fixed");
        }
        toogleNav();
    });

    // Nav
    jQuery(".js-open-nav").click(function () {
        if (jQuery(".js-open-nav").hasClass("active")) {
            jQuery(".header").removeClass("header--fixed");
            jQuery(".js-nav").fadeOut();
        } else {
            jQuery(".header").addClass("header--fixed");
            jQuery(".js-nav").fadeIn();
        }
        jQuery(".js-open-nav").toggleClass("active");
    });

    function toogleNav() {
        if (jQuery(".js-open-nav").hasClass("active")) {
            jQuery(".js-nav").fadeOut();
            jQuery(".header").removeClass("header--fixed");
            jQuery(".js-open-nav").removeClass("active");
        }
    }

    // Search
    jQuery(".js-open-search").click(function () {
        jQuery(".js-search").fadeIn();
        jQuery(this).hide();
    });

    // Look
    jQuery(".js-product-cross").click(function () {
        jQuery(this).toggleClass("rotate");
        jQuery(this).next(".js-product-inner").toggleClass("active");
    });

    // Animate
    AOS.init();

    // Tabs

    var panelTabItem = jQuery(".js-tab-content");

    jQuery(".js-tab-item").click(function () {
        var tabActive = jQuery(this).attr("id");

        if (jQuery(this).hasClass("active")) {
            jQuery(this).removeClass("active");
            panelTabItem.slideUp();
        } else {
            jQuery(".js-tab-content").removeClass("active");
            jQuery(".js-tab-item").removeClass("active");
            jQuery(".js-tab-content").hide();
            jQuery(this).addClass("active");
            jQuery("#" + tabActive + "-content").slideDown().addClass("active");
        }
    });


    jQuery(".accordion-sm__header").click(function () {
        if (jQuery(this).hasClass("accordion-sm__header--active")) {
            jQuery(this).removeClass("accordion-sm__header--active");
            panelsm.slideUp();
        } else {
            panelsm.slideUp();
            jQuery(".accordion-sm__header").removeClass("accordion-sm__header--active");
            jQuery(this).addClass("accordion-sm__header--active");
            jQuery(this).next(".accordion-sm__content").slideDown();
        }
    });

    jQuery(".variable-items-wrapper").append("<div class='js-title-product'>" + "" + "</div>");

    jQuery(".variable-item").hover(
        function () {
            if (!jQuery(this).hasClass("selected")) {
                //jQuery(".js-title-product").remove();
                jQuery(this).parent().find(".js-title-product").text("");
                var title = jQuery(this).attr("title");
                jQuery(this).parent().find(".js-title-product").text(title);
            }
        },
        function () {
            if (!jQuery(this).hasClass("selected")) {
                jQuery(this).parent().find(".js-title-product").text("");
            }
        }
    );

    jQuery(".variable-item").click(function () {
        if (!jQuery(this).hasClass("selected")) {
            var title = jQuery(this).attr("title");
            jQuery(this).parent().find(".js-title-product").text(title);
        }
    });
});
