$(document).ready( function() {

  var nav = $('nav');
  var navOpen = $('.nav-open');
  var navClose = $('.nav-close');

  navOpen.click( function() {
    nav.addClass('is-active');
    $('body').append('<div class="overlay"></div>');

    navClose.click( function() {
      nav.removeClass('is-active');
      $('.overlay').remove();
    });

    $('.overlay').click( function() {
      nav.removeClass('is-active');
      $('.overlay').remove();
    });
  });

});