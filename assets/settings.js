$(window).on('load', function () {
    if($('#modal').hasClass('no-password')){
    $('#modal').modal({
        backdrop: 'static',
        keyboard: false
        });

    $('button.close').html('');
    $('#modalTitle').text('Inserisci la password per sbloccare');
    $('#modal-form').append("<input class='form-control' type='password' name='old-password' required>");
    $('#modal-form').append("<div class='invalid-feedback'>Inserisci la password.</div>");

    $('#modal').modal('show');
    }
    
    $('a.delete').on('click', function(){
        confirm('Sei sicuro di volere eliminare l\'account? L\'azione sarà irreversibile.');
    })
});