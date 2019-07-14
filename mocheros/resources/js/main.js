$( document ).ready(function(){
    $(".button-collapse").sidenav();
    $('.collapsible').collapsible();
    $('.modal').modal();
    $('.trigger-modal').modal();
    $('.tooltipped').tooltip();
    $('.slider').slider();
    $('.slider').slider({indicators: false});
    $('.tabs').tabs();
    $('.datepicker').datepicker();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('input#input_text, textarea#textarea1').characterCounter();  
    $('.dropdown-trigger').dropdown();
})
