
wow = new WOW(
    {
    mobile:       false,       // default
  }
  )
wow.init();

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


  $(window).scroll(function(){
    var sticky = $('.header'),
        scroll = $(window).scrollTop();

    if (scroll >= 1) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
  });



  $(".team__search-select").on("change", function(){

    let selectVal = `${$('.select-practices').val()} ${$('.select-industries').val()}`;

    $('.search-hiden-input').val(selectVal);
  });

});