function checkPasswords(form) {  
    if(form.type.value=="signup" || form.type.value=="account"){
        if(form.password.value!=form.password_confirm.value){
            input=form.password_confirm;
            input.classList.add('pseudo-invalid');
            input.nextElementSibling.style.display='inline';
            return false;
            }
        else{
            input.classList.remove('pseudo-invalid');
            input.nextElementSibling.style.display='none';
            }
        }  
    return true;
}

function validate(event) {
    if (!event.target.checkValidity() || !checkPasswords(event.target))
    event.preventDefault();

    event.target.classList.add('was-validated');
}

$(window).on("load", function () {
    $('form').submit(validate);
});