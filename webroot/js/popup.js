// *-*-*-*-*-*-*-*-*-*-*-*-
// Création modal Add Category
// *-*-*-*-*-*-*-*-*-*-*-*-
$(document).on("click", ".overlay-add-user", function(event){ //(1)
alert('clicked'); 
  event.preventDefault();
  $('.contentWrapAddMaitresOuvrages').load($(this).attr("href")); //(2)
  $('#dialogModalAddMaitresOuvrages').modal('show'); //(3)
});
