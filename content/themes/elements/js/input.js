$(document).ready( function() {

  var input = $('input');
  var inputName;

  for(i = 0; i < input.length; i++){
    inputName = $(input[i]).attr('name');
    inputName = inputName.replace(/_/g, " ");
    inputName = inputName.charAt(0).toUpperCase() + inputName.slice(1);

    $(input[i]).attr('placeholder', inputName);
  }

});