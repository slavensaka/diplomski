$(document).ready(function() {
  /**
    TODO:
    - Get the question_id from php code in testing1.blade.php into js
    - For must be question_id and loop instead on fix 23  
  **/
  
  // for(i=0;i<=23; i++){ // Take the question_id and loop in 23
  //  $("select[name=" + i + "]").not(':last').remove();
  // $('button.btn btn-info').click(function(){
  // if($('tr').hasClass('warning_session')) {
  //  location.reload(true);    
  // }
  // });
  // $(window).on('hashchange', function() {
  //   alert("Lorem");
  // });
window.onbeforeunload = function (e) {
            var e = e || window.event;
            var msg = "Do you really want to cancel test?"
            // For IE and Firefox
            if (e) {    
                e.returnValue = msg;
                return save();
            }
            // For Safari / chrome
            return save();   
         };

// window.onbeforeunload = function () {
//   return dwad;
// }
// Eliminate the default onbeforeunload on test_form button,
//So user can submit the test

document.getElementById("test_form").onsubmit = function(e) {
      window.onbeforeunload = null;
      return true;
    };

if (window.history && window.history.pushState ) {
        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];
          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
              // alert('Back button was pressed. Your cancelation will be saved in the database');
              // save();
                window.location='../../homepage';
                return false;
            }
          }
        });
        window.history.pushState('forward', null, './#forward');
}
user_id = $("div.user_id").text();
test_id = $("div.test_id").text();
test_res = $("div.test_res").text();  
type = $("div.type").text();  

function save(){         
    $.ajax({
      url: "../"+"testing1/"+ test_id,
      type: "post",
      data: {'user_id':$("div.user_id").text(), 'test_id':$("div.test_id").text(),
      'test_res':$("div.test_res").text(), "type": $("div.type").text(),
      '_token': $('input[name=_token]').val()},
      success: function(data){
        // alert(data);
        alert("Your attempt will be saved into the database");
      }
    });      
}

$( "div.user_id" ).hide();
$( "div.test_id" ).hide();
$( "div.test_res" ).hide();
$( "div.counter_time" ).hide();
$( "div.type" ).hide();

//Get the php value of counter_time in seconds
var counter_time = 0;
counter_time = $("div.counter_time").text();

if(counter_time == "0"){
 //No counter when 0 
} else {
//Simple timer
var timeout = counter_time; // in seconds
var msgContainer = 
$('<div />', {
        "class": 'alert alert-warning text-center',
        "role" : 'alert',
        })
.appendTo('div.counter'),
    msg = $('<h3 />').appendTo(msgContainer),
    dots = $('<span />').appendTo(msgContainer); 
var timeoutInterval = setInterval(function() {
   timeout--;
   var minutes = Math.floor(timeout / 60);
   var seconds = timeout - minutes * 60;
   msg.html('Test will finish in ' + minutes + ' minutes ' + ' and ' + seconds);
   if (timeout == 0) {
      clearInterval(timeoutInterval);
      redirect();
   } 
}, 1000);

setInterval(function() {
  if (dots.html().length == 3) {
      dots.html('');
  }
  // dots.html(function(i, oldHtml) { return oldHtml += '.' });
}, 500);
}

function redirect() {
    $('input.btn.btn-info.updated_answers').slideUp(800).delay( 800 );
    $('input.btn.btn-info.updated_answers').trigger('click');
}
}); // end document.ready jquery