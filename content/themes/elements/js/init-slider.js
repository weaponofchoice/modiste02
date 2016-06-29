(function($) {

  if ($('section.slider').length > 0) {
    var object = $('section.slider');

    object.slider({
      lightbox: false,
      keys: false
    });
  };

}( jQuery ));