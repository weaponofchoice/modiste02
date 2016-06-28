$(document).ready(function(){

  if( $('body.single-product').length > 0 ){
    if( $('.thumbnails a').length > 1 ){

      var container = $('.images');
      var thumbnails = $('.thumbnails');

      // Add container class
      container.addClass('slider');

      // Add slider controls
      container.append('<div class="slider-controls"></div>');
      $('.product .slider-controls').append('<a class="slider-prev"></a>');
      $('.product .slider-controls').append('<a class="slider-next"></a>');

      // Add slider class
      thumbnails.addClass('slider-images');

      // Add slider id
      $(thumbnails).attr('id', 'productImages');

      // Select the target node
      var target = document.querySelector('#productImages');

      // Create an observer instance
      var observer = new MutationObserver(function(mutations) {

        var initProductSlider = function() {
          mutations.forEach(function(mutation) {
            var target = mutation.target;

            if( $(target).find('li').length < 1 ){
              contents = $(target).find('a');

              // Prevent opening image in new tab
              contents.click( function(e){
                e.preventDefault();
              });

              // Wrap items in li tags
              contents.wrap('<li></li>');

              $('.single-product .images').slider({
                lightbox: false,
                bullets: false
              });
            }
          });
        }

        initProductSlider();
      });

      // Configuration of the observer:
      var config = { attributes: true, childList: true, characterData: true };

      // Pass in the target node, as well as the observer options
      observer.observe(target, config);
    }
  }
});