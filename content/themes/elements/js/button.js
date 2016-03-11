(function($) {

  var buttons = $('.button');

  for(i = 0; i < buttons.length; i++){
    var button_text = $(buttons[i]).text();
    $(buttons[i]).html('<span>' + button_text + '</span><span>' + button_text + '</span>');
  }

}( jQuery ));