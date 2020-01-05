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

function createPostForm(){
    $('.modal-body').html("");
    $('#modalTitle').text('Modifica post');
    $('.modal-body').append("<div class='row form-group'></div>");
    $('.modal-body .row').append("<label for='title'>Titolo</label>");
    $('.modal-body .row').append("<input class='form-control' type='text' name='title'>");
    $('.modal-body').append("<div class='row form-group'></div>");
    $('.modal-body .row:nth-child(2)').append("<label for='content'>Contenuto</label>");
    $('.modal-body .row:nth-child(2)').append("<textarea class=''form-control' cols='30' rows='10 name='content'></textarea>");
}

function editPost(title, content){
    createPostForm();
    $('input[name="title"]').attr('value', title);
    $('textarea').text(content);
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

    $('form').submit(validate);

    $('.edit').on('click', function () {
        if($(this).hasClass('post')){
            editPost($(this).parents().siblings('.col-11').children('h3').text(),
            $(this).parents('article').children('p').text());
        }
    });
});