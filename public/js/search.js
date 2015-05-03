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
        $("div.result").append(data);
        
      }
    },"html");      
}
}); // end document.ready jquery