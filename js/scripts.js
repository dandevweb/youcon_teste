
$('[name=phone]').mask('(99) 99999-9999');

//Upload de arquivo em tempo real
$('#upload').change( function (e) {
    var form_data = new FormData();
    form_data.append('file', $('#upload').prop('files')[0]);

    $.ajax({
        url: 'up.php',
        dataType: 'text', 
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,  
        type: 'post',
        success: function(data){
            $('#arquivo').val(data)
        }
    });
})

//Envio de formulário
$(function () {
    $('body').on('submit', 'form.ajax-form', function () {
        var form = $(this);
        $.ajax({
            beforeSend: function () {
                $('.overlay-loading').fadeIn();
            },
            url: form.attr("action"),
            method: 'post',
            dataType: 'json',
            data: form.serialize()
        }).done(function (data) {
            $('.overlay-loading').fadeOut()
            if (data.sucesso) {
                $('.sucesso').text(data.menssagem)
                $('.sucesso').fadeIn()
                setTimeout(function () {
                    $('.sucesso').fadeOut()
                }, 3000)
                
            } else {
                $('.erro').text(data.menssagem)
                $('.erro').fadeIn()
                setTimeout(function () {
                    $('.erro').fadeOut()
                }, 3000)
            }
        });
        return false;

    })

})
