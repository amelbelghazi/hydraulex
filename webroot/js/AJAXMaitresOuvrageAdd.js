// *-*-*-*-*-*-*-*-*-*-*-*-
// Validation modal Add Category
// *-*-*-*-*-*-*-*-*-*-*-*-
$(document).on('click','#SubmitMaitresOuvrageNew', function(e){
  var formSerialize = $('#formMaitresOuvragesAdd').serialize();
 
  $.ajax({
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-CSRF-Token', csrf_token);
      $('#SubmitMaitresOuvragerNew').text('Saving...');
      $('#SubmitMaitresOuvrageNew').attr('disabled', true);
      $(".error-message").remove();
      $(".has-error").removeClass('has-error');
    },
    url: 'MaitresOuvrages/add/',
    data: formSerialize,
    type: "POST",
    dataType: "JSON",
    async: true,
    success: function (a){
      if (a.status === 'success'){
        $('#SubmitMaitresOuvrageNew').text('Submit');
        $('#SubmitMaitresOuvrageNew').attr('disabled', false);
        $('#dialogModalAddUsers').modal('hide');
      }
      if (a.status === 'error'){
        $('#SubmitMaitresOuvragerNew').text('Submit');
        $('#dialogModalAddMaitresOuvrages').attr('disabled', false);
        $.each(a.data, function(model, errors) {
          for (var fieldName in this) {
            var element = $("[name='"+fieldName+"']");
            $.each(this[fieldName], function(label, text){
              text_error = text ;
            });
            var create = $(document.createElement('span')).insertAfter(element);
            create.addClass('error-message help-block').text(text_error);
            create.parent().addClass('has-error');
          }
        });
      }
    }
  });
});