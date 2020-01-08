function start_sendig() {
    $('#responce').html("Sending to <span id='curent-number'></span>");
    var numbers = $('#numbers').val();
    var message = $('#message').val();
    var path_uri =  "multiple_number.php";
    var number = numbers.split('+');
    
    
    
    //radio button value
    var provider = $('input[name=radio-grp]:checked').val();
            
           
           
    
    $.ajax({
        type: "POST",
        url: path_uri,
        data: {
            numbers: number_loop(number),
            message: message,
            provider: provider
        },
        success: function (data) {
            
            
            console.log(data);
            
            
            var json = $.parseJSON(data);
            
            if (json.response == "success") {
                $('#responce').html("Message Sent Successfully to "+json.current+ " !!");
            } else {
                $('#responce').html("Error to Sent "+json.current+ " !!");
            }
        }
    });
}


var i = 0;
function number_loop(numbers) {
    var number = numbers[i];
    $("#curent-number").html(number);
    if (++i < numbers.length) {
        setTimeout(start_sendig, 1000);
    }
    return number;
}












