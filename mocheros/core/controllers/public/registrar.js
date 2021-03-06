$(document).ready(function()
{
    checkUsuarios();
})

const apiRegistrar = '../../core/api/usuarios_public.php?site=publicHelper&action=';

//Función para verificar usuarios
function checkUsuarios()
{
    $.ajax({
        url: apiRegistrar + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            if (dataset.status == 1) {
                sweetAlert(3, dataset.exception, 'registrarse.php');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para registrarse
$('#form-register').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiRegistrar + 'register',
        type: 'post',
        data: $('#form-register').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            if (dataset.status) {
                sweetAlert(1, 'Usuario registrado correctamente', 'index.php');
            } else {
                sweetAlert(2, dataset.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})