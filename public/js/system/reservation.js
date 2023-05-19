document.addEventListener('DOMContentLoaded', function() {
    $(document).on('click', '.button-reservation', function() {
        const table = $(this).data('table');
        const date = $('input[name="date_reservation"]').val();
        const hour = $('select[name="hour_reservation"]').val();
        $(this).text('Reservando...');
        $.ajax({
            type: 'POST',
            url: storeReservation,
            data: {
                table: table,
                date: date,
                hour: hour
            },
            beforeSend: function() {

            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Reserva criada com sucesso!',
                    text: 'Aguardamos a sua presença em nosso restaurante.',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.isConfirmed)
                    {
                        window.location.reload();
                    }
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Não foi possível realizar a reserva.',
                    text: 'Ocorreu algum erro no servidor. Aguarde e tente novamente.',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.isConfirmed)
                    {
                        window.location.reload();
                    }
                });
            },
            complete: function() {
                $(this).text('Agendar Reserva');
            }
        });
    })

    $('form.form-reservation').on('submit', function(event) {
        event.preventDefault();

        let form = $(this);
        let url = form.attr('action');

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            dataType: 'html',
            beforeSend: function() {
                $('#available-tables').fadeOut(100);
            },
            success: function(response) {
                $('#available-tables').html($(response).find('#available-tables').html());
            },
            error: function(xhr) {

            },
            complete: function() {
                $('#available-tables').fadeIn('slow');
            }
        });
    });

    $('.swal2-confirm').on('click', function() {
        console.log('ola');

    });
});
