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