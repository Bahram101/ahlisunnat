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


    $("#mundarija").on('click', function(){
        console.log('clicked');
    });
});

window.addEventListener('keydown', checkKeyPress, false);
function checkKeyPress(e){
    if(e.keyCode == 27){
        // alert('asdf');
        $('#citySearch').addClass('none');
        $('#shahar').removeClass('none');
    }
}
