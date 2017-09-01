$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
$(document).ready(function() {
  $('input[name=star]').on('change', function(){
        $('form[name=starRating]').submit();
   });
 });
