$(document).ready(function(){
    $("#cabType").change(function(){
        var cabType = $("#cabType").val();
        if (cabType == "CedMicro") {
            $("#luggage").hide();
        }
        else {
            $("#luggage").show();
        }
    });
    $('#bookNow').on("click", function(event) {
        event.preventDefault();
        var pickup = $("#pickup").val();
        var drop = $("#drop").val();
        var cabType = $("#cabType").val();
        var lug_weight = $("#weight").val();
        if (pickup == drop) {
            alert("Please select different pickup and destination location");
        }
        else if (cabType == "Drop down to select CAB Type") {
            alert("Please select any cab");
        }
        else {
            $.ajax({
                url: "addCab.php",
                type: "POST",
                dataType: "JSON",
                data: { pickup: pickup, drop: drop, cabType: cabType, lug_weight: lug_weight },
                success: function(result){
                    console.log(result);
                    var message = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>Your total amount is Rs. "+ result['total_price']+" for distance "+result['total_distance']+" km from "+result['pickup']+" to "+result['drop']+".<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span> </button></div>";
                    $("#message").html(message);
                    $('#pickup').attr('placeholder', 'Current Location'); 
                    $("#weight").val('');
                    if ($("#luggage:hidden")) {
                        $("#luggage").show();
                    }
                },
                error: function() {
                    alert('Error');
                }
            });
        }
    });
});