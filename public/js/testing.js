$(document).ready(function() {
    var myArray = [];
    $('input:checkbox').each(function() {
        myArray.push($(this).attr('name'));
        myArray = jQuery.unique(myArray);
    });
$('input.btn btn-danger').click(createCallback(myArray));
});

function createCallback(myArray) {
    return function() {
        var result = 0;
        var my = [];
        my.push(myArray);
        myArray.map(function(item) {
            if ($("input[name=" + item + "]:checked").val() == 1) {
                result = result + 1;
                console.log(result);
            }
        });
        if (result >= 2) {
            $('#divCheckbox').show().append(' Error! Izabrali ste više od 1 kao točne odgovore');
            return false;
        } else if (result == 0) {
            $('#divCheckbox').show().append(' Niste izabrali niti jedan odgovor kao točan');
            return false;
        } else {
            return true;
        }
    }
}