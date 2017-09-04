$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
$(document).ready(function() {
  $('input[name=star]').on('change', function(){
        $('form[name=starRating]').submit();
   });
 });

$(function(){
  var search= $('input[name="search"]');
  search.on("keyup", function(){
    var value = $(this).val().replace(" ", "-+_-");
    $(".prompt").load("http://localhost/cms/ajax/showresults/" + value.replace(" ", "-"));
  });
});
