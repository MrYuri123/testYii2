
$('form').on('beforeSubmit', function(){
    var data = $(this).serialize();
    $.ajax({
        url: '/get-image',
        type: 'POST',
        data: data,
        success: function(res){
            $('.captcha-wrapper').replaceWith('<img src="' + res + '" width="150" height="90"></p>');
            $('.btn-submit').hide();
        },
        error: function(){
            alert('Error!');
        }
    });

    return false;
});