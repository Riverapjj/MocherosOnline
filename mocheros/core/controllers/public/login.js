$(document).ready(function()
{
    checkUsuarios();
})

const apiSesion = '../../core/api/usuarios_public.php?site=publicHelper&action=';

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
                if (localStorage.getItem('languaje') == 'ES') {
                    sweetAlert(1, 'Inicio de sesión correcto', 'index.php');
                } else if (localStorage.getItem('languaje') == 'EN') {
                    sweetAlert(1, 'Log in successfully', 'index.php');
                }
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