$(document).ready(function(){
    var displayVal = '';
    var previousValue = 0;
    var opt = '+';
    $('input.number').on('click',function(){
        displayVal += $(this).val();
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
                opt = result['operator'];
            },
            error: function() {
                alert('Error');
            }
        });
    });
    $('#clear').on('click',function(){
        $('#result').val('0');
        displayVal = '';
        opt = '+'; 
    });
});