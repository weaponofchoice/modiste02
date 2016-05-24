$(document).ready( function() {

  $('td.value div:not(.option-placeholder)').hide();

  var options = $('td.value');

  for(a = 0; a < options.length; a++){
    if( $(options[a]).find('input[checked="checked"]').length > 0 ){
      var defaultValue = $(options[a]).find('input[checked="checked"]')[0].value.replace(/-/g, ' ');
      $(options[a]).prepend('<div class="option-placeholder">' + defaultValue + '</div>');
    } else {
      $(options[a]).prepend('<div class="option-placeholder">Choose option</div>');
    }

  }

  var label = $('label');

  label.on( 'click', function() {
    var parent = $(this).parents('tr');
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

  var inquiryBtn = $('.button#inquiry');

  inquiryBtn.on( 'click', function() {
    $('#product-inquiry').show();

    for(a = 0; a < options.length; a++){
      var value = $(options[a]).find('.option-placeholder').text();
      value = value.replace(/-/g, ' ');
      var label = $(options[a]).parent().find('.label label').attr('for').substring(3);

      $('.option-' + label + ' span').html(value);
    }
  });

});