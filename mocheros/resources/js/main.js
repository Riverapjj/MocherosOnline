$( document ).ready(function(){
    $(".button-collapse").sidenav();
    $('.parallax').parallax();
    $('.modal').modal();
    $('.trigger-modal').modal();
    $('.slider').slider();
    $('.slider').slider({indicators: false});
    $('ul.tabs').tabs();
    $('.datepicker').datepicker();
    //$('select').material_select();
    $('input#input_text, textarea#textarea1').characterCounter();  
})

M.toast({html: 'Añadido al carrito'})