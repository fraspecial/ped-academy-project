function editBio(){
    $('#modalTitle').text('Bio');
    $("input[name='type']").attr('value', 'bio');
    $('#modal-form').html("<textarea class='form-control'name='bio' cols='30' rows='10'></textarea>");
    $('textarea[name="bio"]').text($('#temp-bio').text());
}

function returnMark(original_mark, mark) {
    if(mark==original_mark)
    return "selected";
    else return "";
}

function fillOptions(skills){
    marks=["A1", "A2", "B1", "B2", "C1", "C2"];
    string="<div class='form-row '>";
    for(skill in skills){
        string+="<div class='col'><label>"+skill+"<select class='custom-select' name="+skill+">";
        for(mark of marks)
        {
            console.log(mark+":"+skills[skill]);
            string+='<option value='+ mark +' '+ returnMark(skills[skill], mark)+'>'+mark+'</option>';
        }
        string+="</select></label></div>";
    }
    string+='</div>';
    return string;
}

function createLanguageForm(skills={"Listening": "", "Reading": "", "Writing": "", "Speaking": ""}){
    string=fillOptions(skills);
    $('input[name="type"]').attr('value', 'lang');
    $('#modal-form').html(string);
}

function addLanguage() {
    createLanguageForm();
    $('#modalTitle').text("Aggiungi una lingua");
    $('#modal-form .form-row').before('<div class="form-row"><div class="col"><label for "lang">Lingua</label><input class="form-control" type="text" name="newlang" required pattern="([A-Za-z]\\s*)+"><div class="invalid-feedback">Sono permesse solo le lettere</div></div></div>');

}

function editLanguage(column){
    lang=$(column).data('lang');
    $('#modalTitle').text(lang);
    skills={ "Listening": $(column).siblings('.Listening').text(), 
             "Reading": $(column).siblings('.Reading').text(),
             "Writing": $(column).siblings('.Writing').text(),
             "Speaking": $(column).siblings('.Speaking').text()
            };
    createLanguageForm(skills);
    $('#modal-form').append('<input type="hidden" name="edit" value="'+lang+'>');
}


function createPicForm(){
    $('#modal-form').html("");
    $('input[name="type"]').attr('value', 'pic');
    $('#modal-form').append("<div class='form-row'></div>");
    $('#modal-form .form-row').append('<div class="col-6 col-title pl-0"></div>');
    $('.col-title').append("<label for='title'>Titolo</label>");
    $('.col-title').append("<input class='form-control' type='text' name='title'>");
    $('#modal-form').append("<div class='form-row'></div>");
    $('#modal-form .form-row:nth-child(2)').append("<label for='caption'>Caption</label>");
    $('#modal-form .form-row:nth-child(2)').append("<textarea class='form-control' cols='20' rows='5' name='caption'></textarea>");
}

function addPic(){
    createPicForm();
    $('#modal-form').attr('enctype', 'multipart/form-data');
    $('#modalTitle').text("Aggiungi una foto");
    $('.col-title').after('<div class="col-6 d-flex align-items-end"><input type="file" name="pic" accept="image/*"></div>');
}


function editPic(image){
    createPicForm();
    img_src=$(image).siblings('img').attr('src');
    $('#modalTitle').text(img_src);
    $('#modal-form').append('<input type="hidden" name="edit" value='+img_src+'>');
    title=$(image).find('h5');
    title=title.text();
    caption=$(image).children('p').text();
    $('input[name="title"]').attr('value', title);
    $('textarea[name="caption"]').text(caption);
}

function handlerPicformIn(){
    
    $("#overlay").fadeIn();
    $("#picform a").fadeIn();
    $("#picform label").fadeIn();
    
}

function handlerPicformOut(){
    
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
    $('#picform').hover(handlerPicformIn, handlerPicformOut);

    $('.carousel-caption').hide();

    $('#carouselExampleIndicators').hover(
        function(){
            $(this).find('.carousel-caption').slideDown('slow');
        },
        function(){
            $(this).find('.carousel-caption').slideUp('slow')
        });
});