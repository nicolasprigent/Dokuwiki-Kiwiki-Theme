(function ($) {
  "use strict";
  function _kiwikiChangeAdminLabels(label, level, title) {
    $(label)
      .parent()
      .parent()
      .html(
        '<td colspan="2" class="kiwiki-styles"><' +
          level +
          ">" +
          title +
          "</" +
          level +
          "></td>"
      );
  }

  var colorscheme = "lightmode";
  if (
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches
  ) {
    colorscheme = "darkmode";
    console.log(colorscheme);
  }
  $(document).on("click", function (event) {
    var trigger = $("nav.tools>div");
    var search = $("div#open-search");
    var thememode = $("div#theme-mode");
    var fullscreen = $("div#full-screen");

    var menu = $(
      "#kiwiki #dokuwiki__site #dokuwiki__content__wrapper #dokuwiki__aside .kiwiki-main-menu h3"
    );

    if ($(event.target).is(trigger)) {
      if (!$(event.target).hasClass("active")) {
        $(trigger).removeClass("active");
        $(event.target).addClass("active");
      }
    } else {
      $(trigger).removeClass("active");
    }

    if ($(event.target).is(search)) {
      $(
        "#dokuwiki__header > .dokuwiki__header__wrapper #dw__search"
      ).toggleClass("open");
    }
    if ($(event.target).is(fullscreen)) {
      $("body").toggleClass("fullscreen");
    }
    if ($(event.target).is(menu)) {
      $(menu).parent().toggleClass("open");
    }
    if ($(event.target).is(thememode)) {
      if (!!$.cookie("theme")) {
        if (!$("body").hasClass("darkmode")) {
          $("body").removeClass("lightmode");
          $("body").addClass("darkmode");
          document.cookie = "theme=darkmode";
        } else {
          $("body").removeClass("darkmode");
          $("body").addClass("lightmode");
          document.cookie = "theme=lightmode";
        }
      } else {
        if (colorscheme == "darkmode") {
          $("body").addClass("lightmode");
          document.cookie = "theme=lightmode";
        } else {
          $("body").addClass("darkmode");
          document.cookie = "theme=darkmode";
        }
      }

      /**/
    }
  });
  _kiwikiChangeAdminLabels(
    'label[for="tpl____kiwiki_color__"]',
    "h3",
    "Kiwiki"
  );
  _kiwikiChangeAdminLabels(
    'label[for="tpl____kiwiki_light_colors__"]',
    "h4",
    "Light mode colors"
  );
  _kiwikiChangeAdminLabels(
    'label[for="tpl____kiwiki_dark_colors__"]',
    "h4",
    "Dark mode colors"
  );
})(jQuery);
