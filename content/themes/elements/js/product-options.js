$(document).ready( function() {

  $('td.value div:not(.option-placeholder)').hide();

  var options = $('td.value');

  for(a = 0; a < options.length; a++){
    var defaultValue = $(options[a]).find('input[checked="checked"]')[0].value;

    if( defaultValue ){
      $(options[a]).prepend('<div class="option-placeholder">' + defaultValue + '</div>');
    } else {
      $(options[a]).prepend('<div class="option-placeholder">Choose option</div>');
    }

  }

  var label = $('label');

  label.click( function() {
    var parent = $(this).parents('td.value');
    var placeholder = parent.find('.option-placeholder');
    var value = $(this).text();

    placeholder.html(value);

    parent.find('.option-placeholder').show();
    parent.find('div:not(.option-placeholder)').hide();
  });

  var placeholder = $('.option-placeholder');

  placeholder.on( 'click', function() {
    var parent = $(this).parents('td.value');
    parent.find('.option-placeholder').hide();
    parent.find('div:not(.option-placeholder)').show();
  });

});