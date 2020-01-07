function checkPasswords(form) {  
    if(form.type.value=="signup" || form.type.value=="edit")
        if(form.password.value!=form.password_confirm.value)
            return false;
    return true;
}

function validate(event) {
    if (!event.target.checkValidity() || !checkPasswords(event.target)){
        event.preventDefault();
    }
    input=event.target.password_confirm;
    if(!checkPasswords(event.target)){
        input.classList.add('pseudo-invalid');
        input.nextElementSibling.style.display='inline';
    }
    else{
        input.classList.remove('pseudo-invalid');
        input.nextElementSibling.style.display='none';
    }
    event.target.classList.add('was-validated');
}

$(window).on("load", function () {
    $('form').submit(validate);
});