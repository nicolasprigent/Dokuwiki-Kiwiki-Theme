(function ($) {
  "use strict";
  $(document).on("click", function (event) {
    var trigger = $("nav.tools>div");
    var search = $("div#open-search");
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

    if ($(event.target).is(menu)) {
      $(menu).parent().toggleClass("open");
    }
  });

  $('label[for="tpl____kiwiki_color__"]')
    .parent()
    .parent()
    .html('<td colspan="2" class="kiwiki-styles"><h3>Kiwiki</h3></td>');
})(jQuery);
