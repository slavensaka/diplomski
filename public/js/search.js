$(document).ready(function() {
$("#searchform").submit(function(e){
  e.preventDefault();
  // alert("Lorem");
 save();
  });
function save(){         
    $.ajax({
      url: "../"+"search",
      type: "post",  
      data: {'query':$("input#query").val(), '_token': $('input[name=_token]').val()},
      success: function(data){
        var get = JSON.parse(data);
      
        $('div.result').empty();
          if($.isEmptyObject(get)){
        $("div.result").html("No test found");
      }
        jQuery.each( get, function( i, val ) {
          $("<a href="+"take"+"/"+val.id+">"+val.test_name+"</a><br>").appendTo("div.result")
          .on('click', function(){
            if(!confirm('Are you sure you want to take this test?')) return false;
          });
        });      
      }
    });      
}
}); // end document.ready jquery
// "Favorite beverage: " + data["favorite_beverage"] + "<br />Favorite 
// restaurant: " + data["favorite_restaurant"] 
// + "<br />Gender: " + data["gender"] + "<br />JSON: " + data["json"]
//popularnim