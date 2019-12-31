function findTags(tagToFind, tags) {
    for(tag of tags)
        if(tag.text==tagToFind)
            return true;
    return false;
}

function filter(tagToFind) {
    $('h1').text('Post filtrati per tag #'+tagToFind);
    posts=document.querySelectorAll('article');
    
    for(post of posts){
        post.classList.remove("hidden");
        tags=post.querySelectorAll('.tag');
        if(tags.length==0 || !findTags(tagToFind, tags)){
            post.classList.add("hidden");
        }
    }
}

function checkPasswords(form) {  
    if(form.type.value=="signup"){
        if(form.password.value!=form.password_confirm.value)
            return false;
    }

    return true;
}

function validate(event) {
    if (!event.target.checkValidity() || !checkPasswords(event.target)){
        event.preventDefault();
    }

    event.target.classList.add('was-validated');
}

$(window).on("load", function () {

    $('#form-tag').on('submit', function(){
        event.preventDefault();
        filter(event.target.tag.value);
    });

    $('.tag').on('click', function () {
        event.preventDefault();
        filter(event.target.text);
    });

    const forms = document.querySelectorAll('form');
    for (form of forms)
        form.addEventListener('submit', validate);
});