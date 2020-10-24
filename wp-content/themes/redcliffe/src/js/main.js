$(function () {

  $('.burger-content').on('click', function () {
    $('.header__menu').addClass('active');
    $('body').addClass('overflowHidden');
  });

  $('.mobile-menu-close').on('click', function () {
    $('.header__menu').removeClass('active');
    $('body').removeClass('overflowHidden');
  });


  $(".tabs-js").on("click", "div:not(.active)", function(e) {
    $(this)

    .addClass("active")
    .siblings()
    .removeClass("active")
    .parents(".tabs-info-js")
    .find(".team-content__tabs-wrap-content")
    .children()
    .hide()
    .eq($(this).index())
    .fadeIn(300);

    e.preventDefault();

  });
});
