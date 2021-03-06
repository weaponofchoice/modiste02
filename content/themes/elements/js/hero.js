(function($) {

  function initHero(){
    // Get main hero elements
    var hero = $('.hero');
    var hero_banner = $('.hero-banner');
    var hero_content = $('.hero .section-body');

    // Fade Content on scroll
    if( hero_content.length > 0 ){
      hero_content.addClass('is-visible-0.7s');

      var waypoint = new Waypoint({
        element: hero_content,
        offset: '10%',
        handler: function() {
          hero_content.toggleClass('is-visible-0.7s');
          hero_content.toggleClass('is-hidden-0.7s');
        }
      });
    }

    // Scroll arrow
    var trigger = $('.arrow-scroll');
    var header = $('body > header');

    trigger.click( function() {
      $('body').animate({
        scrollTop: hero.height()
      }, 500);
    });
  };

  if($('section.hero').length > 0) {
    initHero();

    $(window).on("resize", function() {
      initHero();
    });
  }

}( jQuery ));