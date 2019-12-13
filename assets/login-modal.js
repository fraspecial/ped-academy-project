$(window).on("load", function(){
    if($('#login').hasClass('failed'))
        $('#login').modal('show');
    $("#login-button").on('click', function(){
    $('#login').modal('toggle')});

    $('form').on('submit', function(){
        const form=document.querySelector('form');
        if(form.checkValidity()===false)
            event.preventDefault();
        form.classList.add('was-validated');
    });
});