jQuery(document).ready(function($) {
    $('#g13').attr('placeholder', 'Name');
  $('#g13-1').attr('placeholder', 'Email');
  $('#g13-2').attr('placeholder', 'Subject');
  $('#contact-form-comment-g13-3').attr('placeholder', 'Message');
  $('.grunion-field-label').remove();
  
  // ADD ATTRIBUTE TO CONTACT - NAME AND EMAIL FIELDS
  $('#g13').parent().attr('id', 'nameInputDiv');
  $('#g13-1').parent().attr('id', 'emailInputDiv');
  $('#nameInputDiv,#emailInputDiv').wrapAll('<div id="multiInputSingleLine"></div>');
});