$(document).ready(function() {
    $('#form-register').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "http://localhost:8000/Register/registrar",
            data: $('#form-register').serialize(),
            dataType: 'json',
            success: function(data) {
                console.log('-----------------');
                console.log(JSON.stringify(data));
                console.log('------------------');
                if (data.status == 'success') {
                    console.log(data.mensagem);
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                } else {
                    alert(data.mensagem);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.log(textStatus);
                console.log(errorThrown);
                alert('Ocorreu um erro ao processar sua solicitação');
            }
        });
    });
});