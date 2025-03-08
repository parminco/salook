$('#close_modal').click(function (){
    $('#delay-modal').fadeOut(200);
    $('#dark').fadeOut(200);
    window.history.replaceState(null, null, window.location.pathname);

});

$('.close_modal').click(function (){

    window.history.replaceState(null, null, window.location.pathname);
    $('#modal-failed-login').fadeOut(200);


});