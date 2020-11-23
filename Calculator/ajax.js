$(document).ready(function(){
    var displayVal = 0;
    var previousValue = 0;
    var opt = '+';
    $('input.number').on('click',function(){
        if ($('#result').val() == 0) {
            displayVal = $(this).val();
        }
        else {
            console.log(displayVal);
            displayVal += $(this).val();
        }
        $('#result').val(displayVal);
    });
    $('.operator').on('click', function() {
        var operator = $(this).val();
        $.ajax({
            url: 'calculate.php',
            type: 'GET',
            dataType: 'JSON',
            data: { displayVal: displayVal, previousVal: previousValue, operator: operator, opt: opt },
            success: function(result){
                console.log(result);
                $('#result').val(result['result']);
                displayVal = '';
                previousValue = result['result'];
                if (previousValue == "infinite") {
                    alert("Number cannot be divided by 0");
                    $('#result').val('0');
                    displayVal = 0;
                    previousValue = 0;
                    opt = '+'; 
                }
                else {
                    opt = result['operator'];
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });
    $('#clear').on('click',function(){
        $('#result').val('0');
        displayVal = 0;
        previousValue = 0;
        opt = '+'; 
    });
});