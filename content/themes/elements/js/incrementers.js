$(document).ready( function() {

  var inputs = $('input[type="number"]');
  var object;

  for(i = 0; i < inputs.length; i++){
    object = $(inputs[i]);

    // Wrap input in container
    object.wrap('<div class="incrementer"></div>');

    // Add controls
    object.parent().prepend('<span class="min">-</span>');
    object.parent().append('<span class="plus">+</span>');

    // Get controls
    var min = object.parent().find('.min');
    var plus = object.parent().find('.plus');

    min.click( function() {
      // Get current value
      var value = $(this).parent().find('input').attr('value');

      // Decrement value with 1 unless value is 0
      if( value > 0 ){
        value = parseFloat(value) - 1;
      }

      // Give new value back to input
      $(this).parent().find('input').attr('value', value);
    });

    plus.click( function() {
      // Get current value
      var value = $(this).parent().find('input').attr('value');

      // Increment value with 1
      value = parseFloat(value) + 1;

      // Give new value back to input
      $(this).parent().find('input').attr('value', value);
    });
  }

});