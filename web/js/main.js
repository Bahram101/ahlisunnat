$(document).ready(function(){
    $('#searchIcon').on('click', function(){
        $('#citySearch').removeClass('none');
        $('#shahar').addClass('none');
    });

    $('#ok').on('click',function(){
        $('#citySearch').addClass('none');
        $('#shahar').removeClass('none');
    });

    $('#shahar').on('click',function(){
        $('#citySearch').removeClass('none');
        $('#shahar').addClass('none');
    });

    $('#searchClose').on('click', function(){
        $('#citySearch').addClass('none');
        $('#shahar').removeClass('none');
    });

    var page = parseInt($("#quran-image").attr('data-id'));
    var downloadId = parseInt(page);
    $("#previous-page").on('click', function (e) {
        e.preventDefault();
        page = page-1;
        downloadId = downloadId-1;
        if(page > 0 && page < 10){
            page = page.toString();
            page = '00' + page;
        }else if(page >9 && page <100){
            page = page.toString();
            page = '0' + page;
        }
        /*$('#quran-image').fadeOut(200, function(){
            $('#quran-image').attr('src', '/images/quran/img/' + page + ".jpg").fadeIn();
        });*/
        $('#quran-image').attr('src', '/images/quran/img/' + page + ".jpg");
        $("#fancy").attr('href', '/images/quran/img/' + page + ".jpg");
        $("#sura-download").attr('href', '/quran/download/' + downloadId);

        refreshAudio();

    });

    $("#next-page").on('click', function (e) {
        e.preventDefault();
        page = parseInt(page)+1;
        downloadId = downloadId+1;
        if(page >= 1 && page <= 9){
            page = page.toString();
            page = '00' + page;
        }else if(page >= 10 && page <=99){
            page = page.toString();
            page = '0' + page;
        }
        /*$('#quran-image').fadeOut(200, function(){
            $('#quran-image').attr('src', '/images/quran/img/' + page  + ".jpg").fadeIn();
        });*/
        $('#quran-image').attr('src', '/images/quran/img/' + page + ".jpg");
        $("#fancy").attr('href', '/images/quran/img/' + page + ".jpg");
        $("#sura-download").attr('href', '/quran/download/' + downloadId);

        refreshAudio();
    });

    function refreshAudio(){
        $('#audio').remove();
        var audio = '<audio controls style="width=100%" id="audioNew" controlslist="nodownload"></audio>';
        $('#audioNew').remove();
        var source = '<source src="" id="srcnew" type="audio/mpeg">';
        $('#sura').append(audio);
        $('#audioNew').append(source);
        $('#srcnew').attr('src', '/images/quran/audio/' + page + ".mp3");
    }



});

window.addEventListener('keydown', checkKeyPress, false);
function checkKeyPress(e){
    if(e.keyCode == 27){
        // alert('asdf');
        $('#citySearch').addClass('none');
        $('#shahar').removeClass('none');
    }
}


