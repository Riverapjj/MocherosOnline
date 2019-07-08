$(document).ready(function()
{
    checkUsuarios();
})

const apiSesion = '../../core/api/usuarios_public.php?site=publicHelper&action=';

//Función para verificar usuarios para el login
function checkUsuarios()
{
    $.ajax({
        url: apiSesion + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            if (dataset.status == 2) {
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

//Función para el login
$('#form-session').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiSesion + 'login',
        type: 'post',
        data: $('#form-session').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            if (dataset.status) {
                sweetAlert(1, 'Inicio de sesión correcto', 'index.php');
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