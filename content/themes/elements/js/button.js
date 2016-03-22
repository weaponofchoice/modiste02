$(document).ready( function() {

  var buttons = $('.button');

  for(i = 0; i < buttons.length; i++){
    // If button is input and type="submit"
    if( $(buttons[i]).attr('type') == 'submit' && buttons[i].tagName == 'INPUT' ){
      // Get button text first from input value
      var button_text = $(buttons[i]).attr('value');

      // Replace input tag with button tag
      $(buttons[i]).replaceWith( function() {
        return $('<button>', {
          'type': 'submit',
          'class': this.className,
          'name': this.name,
          'value': this.value
        });
      });

      // Fill button with spans of button_text
      $('button[value="' + button_text + '"]').html('<span>' + button_text + '</span><span>' + button_text + '</span>');

    // If button is anything other than an input tag
    } else {
      // Get button text from button's html
      var button_text = $(buttons[i]).text();

      // Replace it with a double span
      $(buttons[i]).html('<span>' + button_text + '</span><span>' + button_text + '</span>');
    }
  }

});