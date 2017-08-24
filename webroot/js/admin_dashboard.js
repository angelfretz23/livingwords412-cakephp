
function bunFunction() {
    alert('clicked');
}

$('.checkbox_cls').on('click', function() {

    $.ajax({
        type: "POST",
        url: "/admin/users/ban",
        data: {query: this.value},
        cache: false,
//      dataType:'JSON';
        success: function (html) {

        }
    });

    
});


$('.checkbox_cls_o').on('click', function() {

    $.ajax({
        type: "POST",
        url: "/admin/users/content-owner",
        data: {query: this.value},
        cache: false,
//      dataType:'JSON';
        success: function (html) {

        }
    });


});
function addField(){
      $("div#add_field_area").append("<div  class='add'> <div class='input-group'> <input type='text' style='margin-bottom: 10px' class='form-control' id='usr' name='newTags[]' value=''> <span class='input-group-btn'> <button onclick='deleteField();' style='margin-bottom: 10px' type='button' class='btn btn-danger'> <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button> </span> </div> </div>");
}

function addFieldFile(){
    $("div#newFile").append("<input name='newFile' type='file' >");
    $("#addFileButton").hide();
}

function deleteField(id, typeTag) {
    var element = document.getElementById(id);

    $.ajax({
        type: "POST",
        url: "/admin/delete-tag",
        data: {tagId: id, typeTag: typeTag},
        cache: false,
        success: function () {
            element.remove();
        }
    });
    element.remove();
}

function deleteFile(id, typeMedia, verseID) {
    var element = document.getElementById(id);
    let idArray = id.split("-");
    let idServer = idArray[0];

    $.ajax({
        type: "POST",
        url: "/admin/delete_file",
        data: {fileTypeId: idServer, typeMedia: typeMedia, verseID: verseID},
        cache: false,
        success: function () {
            element.remove();
        }
    });
    element.remove();
    addFieldFile();
}

$( "#bookSelect" )
    .change(function() {
        $('#preloader').addClass('is-active');

        let str = "";
        $( "select option:selected" ).each(function() {
            str += $( this ).data('book') + " ";
        });
        $("#formVerse").hide();
        if(str){
            $.ajax({
                type: "POST",
                url: "/admin/choosechapterAjax",
                data: {bookIDString: str},
                cache: false,
                success: function (data) {
                    console.log(data);
                    $('#chapterSelect').empty();
                    data.forEach(function (value) {
                        $('#chapterSelect')
                            .append($('<option data-chapter="'+value.id+'">').text("Chapter: " + value.chapter));
                    });
                    $('.selectpicker').selectpicker('refresh');
                    $('#preloader').removeClass('is-active');
                }
            });
        }else {
            $('#chapterSelect').empty();
            $('.selectpicker').selectpicker('refresh');
        }
    })
    .trigger( "change" );

$( "#chapterSelect" )
    .change(function() {
        $('#preloader').addClass('is-active');

        let chapter = "";
        $( "select option:selected" ).each(function() {
            chapter += $( this ).data('chapter') + " ";
        });

        if(chapter){
            $.ajax({
                type: "POST",
                url: "/admin/chooseversusAjax",
                data: {chapterIDString: chapter},
                cache: false,
                success: function (data) {
                    console.log(data);
                    $("#formVerse").show();
                    $("#selectAllInChapterButton").show();
                    $("#table  tr").remove();
                    data.forEach(function (value) {
                        $('#table > tbody:last').append("<tr><td>"+value.verse+"</td> <td> <input class='checkBoxClass' type='checkbox' name='arrayOfVerseIds[]' value='"+value.id+"'><br> </td> <td style='text-align: center;color: #0000FF'><a href='/admin/see-versus-content/"+value.id+"'><i style='color: gray' class='fa fa-folder' aria-hidden='true'></i></i></a></td> </tr>");
                    });
                    $('#preloader').removeClass('is-active');
                },
                error: function (error) {
                    $("#table  tr").remove();
                    $("#formVerse").hide();
                    $('#preloader').removeClass('is-active');
                }
            });
        }else {
            $("#table  tr").remove();
        }
    });

$('#saveVerseIdButton').click( function() {
    $('#preloader').addClass('is-active');
    $.ajax({
        url: '/admin/save-chosen-verses',
        type: 'post',
        dataType: 'json',
        data: $('#userform').serialize(),
        success: function(data) {
            $('#preloader').removeClass('is-active');
            alert('Have saved! Choose other!');
        }
    });
});

$('#clearVersesButton').click( function() {
    $.ajax({
        url: '/admin/clear-selected-verses',
        type: 'post',
        dataType: 'json',
        data: 'clear',
        success: function(data) {
            $("#selectedVersesTable > tbody tr").remove();
            $("#selectedVersesTableDiv").hide();
            alert('All verses that you have selected before was cleaned!');
        }
    });
});

$('#submitMultiplyVerses').click( function() {
    $('#preloader').addClass('is-active');

    $.ajax({
        url: '/admin/saveseversus',
        type: 'post',
        dataType: 'json',
        data: {},
        success: function(data) {
            window.opener.$("#selectedVersesTable > tbody tr").remove();
            window.opener.$("#selectedVersesTableDiv").show();
            for(let i = 0; i < data['selectedVerses'].length; i++ ){
                let verse = data['selectedVerses'][i][0].verse;
                let verseTags = data['verseTag'][i];
                let verseTag = Object.keys(verseTags).map((k) => verseTags[k]);

                /*let tagsArrayBook = data['dataBooks'][i];
                let tagsArrayMovie = data['dataMovie'][i];
                let tagsArrayMusics = data['dataMusics'][i];
                let tagsArraySermons= data['dataSermons'][i];*/

                let sourceString = `
                        <tr>
                        <td>${verse}</td>
                        <td>
                    `;

                for(let j = 0; j < verseTag.length; j++){
                    sourceString += `${verseTag[j]} <br>`
                }

                /*for(let j = 0; j < tagsArrayBook.length; j++){
                    sourceString += `${tagsArrayBook[j]['tag']} <br>`
                }

                for(let j = 0; j < tagsArrayMovie.length; j++){
                    sourceString += `${tagsArrayMovie[j]['tag']} <br>`
                }

                for(let j = 0; j < tagsArrayMusics.length; j++){
                    sourceString += `${tagsArrayMusics[j]['tag']} <br>`
                }

                for(let j = 0; j < tagsArraySermons.length; j++){
                    sourceString += `${tagsArraySermons[j]['tag']} <br>`
                }*/

                sourceString += `
                        <td>
                            <textarea type="text" class="form-control" id="usr" name="VerseTags[]" ></textarea>
                            <input type="hidden" class="form-control" id="usr" name="VerseID[]" value="<?= $selectedVerses[$i][0]->id?>">
                        </td>
                `;

                sourceString += `</td></tr>`;

                window.opener.$("#selectedVersesTable > tbody:last").append(sourceString);

            }
            $('#preloader').removeClass('is-active');
            window.close();
        }
    });
});

let isChecked = false;
$('#selectAllInChapterButton').click( function() {
    if(isChecked){
        $(".checkBoxClass").prop('checked', false);
        isChecked = false;
    }else {
        $(".checkBoxClass").prop('checked', true);
        isChecked = true;
    }
});


$('#selectAllInBookButton').click( function() {
    $('#preloader').addClass('is-active');

    let str = "";
    $( "select option:selected" ).each(function() {
        str += $( this ).data('book') + " ";
    });

    if(str){
        $.ajax({
            type: "POST",
            url: "/admin/choosechapterAjax",
            data: {bookIDString: str},
            cache: false,
            success: function (data) {
                console.log(data);
                $('#chapterSelect').empty();
                data.forEach(function (value) {
                    $('#chapterSelect')
                        .append($('<option selected data-chapter="'+value.id+'">').text("Chapter: " + value.chapter));
                });
                /*$( "#chapterSelect" ).trigger( "change" );*/
                $('.selectpicker').selectpicker('refresh');

                let chapter = "";
                $( "select option:selected" ).each(function() {
                    chapter += $( this ).data('chapter') + " ";
                });

                if(chapter){
                    $.ajax({
                        type: "POST",
                        url: "/admin/chooseversusAjax",
                        data: {chapterIDString: chapter},
                        cache: false,
                        success: function (data) {
                            console.log(data);
                            $("#formVerse").show();
                            $("#selectAllInChapterButton").show();
                            $("#table  tr").remove();
                            data.forEach(function (value) {
                                $('#table > tbody:last').append("<tr><td>"+value.verse+"</td> <td> <input class='checkBoxClass' checked type='checkbox' name='arrayOfVerseIds[]' value='"+value.id+"'><br> </td> <td style='text-align: center;color: #0000FF'><a href='/admin/see-versus-content/"+value.id+"'><i style='color: gray' class='fa fa-folder' aria-hidden='true'></i></i></a></td> </tr>");
                            });
                            isChecked = true;
                            $('#preloader').removeClass('is-active');
                        }
                    });
                }else {
                    $("#table  tr").remove();
                }

            }
        });
    }else {
        $('#chapterSelect').empty();
        $('.selectpicker').selectpicker('refresh');
    }


});