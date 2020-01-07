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

function createPostForm(){
    $('#modal-form').html("");
    $('#modalTitle').text('Modifica post');
    $('#modal-form').append("<div class='form-group'></div>");
    $('#modal-form').append("<div class='form-group'></div>");
    $('#modal-form').append("<div class='form-group'></div>");
    $('#modal-form .form-group:first-child').append("<label for='title'>Titolo</label>");
    $('#modal-form .form-group:first-child').append("<input class='form-control' type='text' name='title' required>");
    $('#modal-form .form-group:nth-child(2)').append("<label for='content'>Contenuto</label>");
    $('#modal-form .form-group:nth-child(2)').append("<textarea class='form-control' cols='30' rows='10' name='content' required></textarea>");
    $('#modal-form .form-group:last-child').append("<label for='tags'>Tags</label>");
    $('#modal-form .form-group:last-child').append("<input class='form-control' type='text' name='tags' placeholder='Ogni tag deve essere preceduto da #' pattern='(\\s*#[a-zA-Z0-9]+\\s*)+'>");
    $('#modal-form').append('<input type="hidden" name="creation_date">');
    
}

function getTags(post){
    tags=[];
    $(post).find('.tag').each(function(){
        tags.push('#'+$(this).text());
    });
    return tags.toString().replace(/,/g, ' ');
}

function editPost(title, post){
    createPostForm();
    $('input[name="type"]').attr('value', 'post');
    $('input[name="title"]').attr('value', title);
    $('textarea').text($(post).children('p').text());
    $('input[name="tags"]').attr('value', getTags(post))
    $('input[name="creation_date"]').attr('value', ($(post).children('small').text()));
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

$('.edit').on('click', function () {
    editPost(
        $(this).parents().siblings('.col-11').children('h3').text(),
        $(this).parents('article'));
    });
});
