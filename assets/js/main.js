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
    var value = $(this).val().split(" ").join("-+_-");
    $(".prompt").load("http://localhost/cms/ajax/showresults/" + value);
  });
});

//add new book
$(function(){
  $('#title').on("keyup", function(event){
    event.preventDefault();
    if($(this).val().length < 50){
      var text = $(this).val().split(" ").join("-");
      text = text.split("ą").join("a");
      text = text.split("ś").join("s");
      text = text.split("ć").join("c");
      text = text.split("ż").join("z");
      text = text.split("ź").join("z");
      text = text.split("ń").join("n");
      text = text.split("ó").join("o");
      text = text.split("ł").join("l");
      text = text.split("ę").join("e");
      $('#prefix').val(text.toLowerCase());
    }
  })
});

$(function(){
  $("#activePrefix").on("change", function(){
    $('#prefix').attr('readonly', !$('#prefix').attr('readonly'));
  });
})
