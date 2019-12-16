function validate(event) {
    if (event.target.checkValidity() === false)
        event.preventDefault();
    event.target.classList.add('was-validated');
}

$(window).on("load", function () {
    if ($('#login').hasClass('failed'))
        $('#login').modal('show');

    if ($('#signup').hasClass('failed'))
        $('#signup').modal('show');

    $("#login-button").on('click', function () {
        $('#login').modal('toggle')
    });

    $("#signup-button").on('click', function () {
        $('#signup').modal('toggle')
    });

    const forms=document.querySelectorAll('form');
    for(form of forms)
    form.addEventListener('submit', validate);
});