$( document ).ready(function(){
    $(".button-collapse").sidenav();
    $('.parallax').parallax();
    $('.modal').modal();
    $('.slider').slider();
    $('.slider').slider({indicators: false});
    $('ul.tabs').tabs();
   // $('select').material_select();
    $('input#input_text, textarea#textarea1').characterCounter();  
})