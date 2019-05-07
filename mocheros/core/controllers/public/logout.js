const apiLogout = '../../core/api/usuarios_public.php?site=publicHelper&action=';

function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Quieres cerrar sesión?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            location.href = apiLogout + 'logout';
        } else {
            swal({
                title: 'Enhorabuena',
                text: 'Continue con la sesión',
                icon: 'info',
                button: 'Aceptar',
                closeOnClickOutside: false,
                closeOnEsc: false
            });
        }
    });
}

function modalProfile()
{
    $.ajax({
        url: apiLogout + 'readProfile',
        type: 'post',
        data: null,
        datatype: 'json',
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                $('#profile_usuario').val(result.dataset.NomUsuario);
                $('#profile_nombre').val(result.dataset.Nombre);
                $('#profile_apellido').val(result.dataset.Apellido);
                $('#profile_direccion').val(result.dataset.Direccion);
                $('#profile_telefono').val(result.dataset.Telefono);
                $('#profile_correo').val(result.dataset.Email);
                M.updateTextFields();
                $('#modal-profile').modal('open');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' +jqXHR.statusText);
    });
}

$('#form-profile').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiLogout + 'editProfile',
        type: 'post',
        data: $('#form-profile').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                $('#modal-profile').modal('close');
                sweetAlert(1, 'Perfil modificado exitosamente', 'index.php');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})