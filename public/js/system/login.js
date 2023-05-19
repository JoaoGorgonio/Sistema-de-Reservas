document.addEventListener('DOMContentLoaded', function() {
    $('.login-form').validate({
        rules: {
            email: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
           email: {
                required: 'Informe seu email',
                email: 'Informe um email válido'
            },
            password: {
                required: 'Informe uma senha',
                minlength: 'A sua senha deve conter no mínimo 8 caracteres'
            }
        },
        submitHandler: function(form) {
            let data = $(form).serialize();
            $.ajax({
                type: 'POST',
                url: loginRoute,
                data: data,
                beforeSend: function()
                {
                    $('#error-message').text('');
                    $('.enviar-form').text("Enviando...");
                    $('.enviar-form').prop('disabled', true);
                    $("input").prop('disabled', true);
                },
                success: function() {
                    window.location.replace('/');
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        $('#error-message').text(xhr.responseJSON.message);
                    } else {
                        $('#error-message').text('Ocorreu um erro na comunicação com o servidor.');
                    }
                },
                complete: function() {
                    $('.enviar-form').text("Entrar");
                    $('.enviar-form').prop('disabled', false);
                    $("input").val("");
                    $("input").prop('disabled', false);
                }
            });
        }
    });

    $('.enviar-form').on('click', function() {
        $('#error-message').text('');
    });
});
