function editBio(){
    $('#modalTitle').text('Bio');
    $("input[type='hidden']").attr('value', 'bio');
    $('.modal-body').html("<textarea name='bio' cols='30' rows='10'></textarea>");
    $('textarea[name="bio"]').text($('#temp-bio').text());
}

function returnMark(original_mark, mark) {
    if(mark==original_mark)
    return "selected";
    else return "";
}

function fillOptions(skills={"Listening": "", "Reading": "", "Writing": "", "Speaking": ""}){
    marks=["A1", "A2", "B1", "B2", "C1", "C2"];
    string="<div class='row'>";
    for(skill in skills){
        string+="<div class='col'><label>"+skill+"<select name="+skill+">";
        for(mark of marks)
        {
            string+='<option value='+ mark +' '+ returnMark(skills[skill], mark)+'>'+mark+'</option>';
        }
        string+="</select></label></div>";
    }
    string+='</div>';
    return string;
}

function createLanguageForm(){
    string=fillOptions();
    $('.modal-body').html(string);
}

function addLanguage() {
    createLanguageForm();
    $('#modalTitle').text("Aggiungi una lingua");
    $('.modal-body .row').before('<div><label for "lang">Lingua</label><input type="text" name="lang"></div>');
}

function editLanguage(column){
    lang=$(column).data('lang');
    $('#modalTitle').text(lang);
    $("input[type='hidden']").attr('name', 'lang: ');
    skills={ "Listening": $(column).siblings('.Listening').text(), 
             "Reading": $(column).siblings('.Reading').text(),
             "Writing": $(column).siblings('.Writing').text(),
             "Speaking": $(column).siblings('.Speaking').text()
            };
    $('.modal-footer').append('<input type="hidden" name"lang" value='+lang+">");
    createLanguageForm();
}


function createPicForm(){
    $('.modal-body').html("");
    $('.modal-body').append("<div class='row'>");
    $('.modal-body .row').append('<div class="col-6 col-title">');
    $('.col-title').append("<label for='title'>Titolo</label>");
    $('.col-title').append("<input type='text' name='title'>");
    $('.modal-body .row').append("</div>");
    $('.modal-body').append("</div>");
    $('.modal-body').append("<div class='row'>");
    $('.modal-body').append("<label for='caption'>Caption</label>");
    $('.modal-body').append("<textarea cols='20' rows='5' name='caption'></textarea>");
    $('.modal-body').append("</div>");
}

function addPic(){
    createPicForm();
    $('#modalTitle').text("Aggiungi una foto");
    $('.col-title').after('<div class="col-6"><input type="file" name="pic" accept="image/*"></div>');
    $("input[type='hidden']").attr('value', 'add-pic');
}


function editPic(image){
    createPicForm();
    $('#modalTitle').text($(image).siblings('img').attr('src'));
    $("input[type='hidden']").attr('value', 'edit-pic');
    title=$(image).find('h5');
    title=title.text();
    caption=$(image).children('p').text();
    $('input[name="title"]').attr('value', title);
    $('textarea[name="caption"]').text(caption);
}

function handlerIn(){
    
    $("#overlay").fadeIn();
    $("#picform a").fadeIn();
    $("#picform label").fadeIn();
    
}

function handlerOut(){
    
    $( "#overlay").fadeOut();
    $("#picform a").fadeOut();
    $( "#picform label").fadeOut();
    
}

$(window).on('load', function(){
    $('.edit').on('click', function(){
        if($(this).hasClass('bio'))
            editBio();

        if($(this).hasClass('lang'))
            editLanguage($(this).parent());

        if($(this).hasClass('pic'))
            editPic($(this).parents('.carousel-caption'));
    });

    $('.add').on('click', function(){
        if($(this).hasClass('lang'))
            addLanguage();
        if($(this).hasClass('pic'))
            addPic();
    });

    $('#propic').change(function () {
        $('#picform').submit();
    });
        
    
    $('#overlay').hide();
    $('#picform label').hide();
    $('#picform a').hide();
    $('#picform').hover(handlerIn, handlerOut);
});