$(document).ready(function()
{
    checkUsuarios();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/usuarios.php?site=dashboard&action=';


//Función para verificar si existen usuarios en el sitio privado
function checkUsuarios()
{
    $.ajax({
        url: apiSesion + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba que no hay usuarios registrados para redireccionar al registro del primer usuario
            if (dataset.status == 2) {
                sweetAlert(3, dataset.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para sumar intentos cada vez que exista un error al iniciar sesión
function sumandoIntentos(alias)
{   
    $.ajax({
        url: apiSesion + 'intentos',
        type: 'post',
        data: {
            NomUsuario: alias
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola

        if (isJSONString(response)) {
            const result = JSON.parse(response);
            sweetAlert(2, 'Tienes 3 intentos para iniciar sesión', null);
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}


//Función para cambiar estado del usuario al llegar a 3 intentos
function bloquearUsuario(alias)
{   
    $.ajax({
        url: apiSesion + 'bloquearUsuario',
        type: 'post',
        data: {
            NomUsuario: alias
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            sweetAlert(2, 'Su usuario ha sido bloqueado', null);
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para validar el usuario al momento de iniciar sesión
$('#form-sesion').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiSesion + 'login',
        type: 'post',
        data: $('#form-sesion').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola

        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (result.status) {
                sweetAlert(1, 'Autenticación correcta', 'dashboard.php');
            } else {
                sweetAlert(2, result.exception, null);
                let alias = $('#log-username').val();
                sumandoIntentos(alias);
                bloquearUsuario(alias); 
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

$('#form-email').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiSesion + 'enviarCorreo',
        type: 'post',
        data: $('#form-email').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola

        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (result.status) {
                sweetAlert(1, 'Correo enviado con éxito', 'contrasenas.php');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$('#form-recover').submit(function()
{   event.preventDefault();
    var token = getParameterByName('token');
    
    var newpwd = $('#recov-pass').val(), pwdconfirmed = $('#recov-pass2').val();
    $.ajax({
        url: apiSesion + 'recoverPassword',
        type: 'post',
        data: {
            token: token,
            new_pwd: newpwd,
            pwd_confirmed: pwdconfirmed
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (result.status) {
                console.log(token);
                sweetAlert(1, 'Se ha restaurado la contraseña exitosamente', 'index.php');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
