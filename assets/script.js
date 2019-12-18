function findTags(tagToFind, tags) {
    for(tag of tags)
        if(tag.text==tagToFind)
            return true;
    return false;
}

function filter(event) {
    event.preventDefault();
    tagToFind=event.target.text;
    $('h1').text('Post filtrati per tag #'+tagToFind);
    posts=document.querySelectorAll('article');
    for(post of posts){
        tags=post.querySelectorAll('.tag');
        if(tags.length==0 || !findTags(tagToFind, tags))
            post.innerHTML="";
        }
}

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

    $('.tag').on('click', filter);

    $("#login-button").on('click', function () {
        $('#login').modal('toggle')
    });

    $("#signup-button").on('click', function () {
        $('#signup').modal('toggle')
    });

    const forms = document.querySelectorAll('form');
    for (form of forms)
        form.addEventListener('submit', validate);
});