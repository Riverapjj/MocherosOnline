$(document).ready(function()
{
    showTable();
    showSelectRoles('create-rol',  null);
    createPagination();

})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiUsuarios = '../../core/api/usuarios.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiUsuarios + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (!result.status) {
            console.log(result.exception)
        }
        //alert(JSON.parse(response));
        fillTable(result.dataset)
    } else {
        console.log(response);
    }
}

//Función para paginación de admin-table
function createPagination(){

    $('#pagination').pagination({
        dataSource: [1, 2, 3, 4, 5, 6, 7, 50],
        pageData: 10,
        showPageNumbers: false,
        showNavigator: true,
       /* callback: function(data, pagination) {
            // template method of yourself
            var html = template(data);
            dataContainer.html(html);
        }*/
    })


}

//Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    rows.forEach(function (row) {
        if (row.IdRol == 1){
            rol = 'Administrador';
        }else{
            if(row.IdRol == 2){
                rol = 'Empleado';
            }else{
                if (row.IdRol == 3){
                    rol = 'Gerente';
                }else{
                    if (row.IdRol == 6){
                        rol = 'Cliente';
                    }
                }
            }
        }
        (row.IdEstado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        content += `
        <tr class="hoverable">
            <td>${row.Nombre}</td>
            <td>${row.Apellido}</td>
            <td>${rol}</td>
            <td>${row.Telefono}</td>
            <td>${row.Email}</td>
            <td><i class="material-icons">${icon}</i></td>
            <td><i class="material-icons"><a class="modal-trigger" href="#modal-update-admin(${row.IdUsuario})">border_color</a></i></td>
            <td><i class="material-icons"><a class="modal-trigger" href="#modal-delete(${row.IdUsuario})">delete</a></i></td>
        </tr>
        `;
    });
    $('#tbody-read-admin').html(content);
    $('#admin-table').DataTable({
    });
    $('#admin-table').pageMe({
        pagerSelector:'#myPager',
        activeColor: 'blue',
        prevText:'Anterior',
        nextText:'Siguiente',
        showPrevNext:true,
        hidePageNumbers:false,
        perPage:10
      });
}


//Función para mostrar los resultados de una búsqueda
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiUsuarios + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);            
            
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                sweetAlert(4, 'Coincidencias: ' + result.dataset.length, null);
                fillTable(result.dataset);
            } else {
                sweetAlert(3, result.exception, null);
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

/*Función para crear un nuevo registro
$('#form-create-admin').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiUsuarios + 'create',
        type: 'post',
        data: $('#form-create-admin').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#form-create-admin')[0].reset();
                $('#modal-create-admin').modal('toggle');
                sweetAlert(1, 'Usuario creado correctamente', null);
                showTable();
            } else {
                sweetAlert(2, result.exception, null);
                console.log(result);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})*/


//Función para crear un nuevo registro
$('#form-create-admin').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiUsuarios + 'create',
        type: 'post',
        data: new FormData($('#form-create-admin')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
            $('#form-create-admin')[0].reset();
            $('#modal-create-admin').modal('close');
            sweetAlert(1, 'Usuario creado correctamente', null);
                showTable();
            } else {
                sweetAlert(2, result.exception, null);
        }
    } else {
        console.log(response)
    }
})

//Función para mostrar formulario con registro a modificar
function modalUpdate(idusuario)
{
    $.ajax({
        url: apiUsuarios + 'get',
        type: 'post',
        data:{
            IdUsuario: idusuario
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#form-update-admin')[0].reset();
                $('#IdUsuario').val(result.dataset.IdUsuario);
                $('#update-username').val(result.dataset.NomUsuario);
                $('#update-name').val(result.dataset.Nombre);
                $('#update-apellido').val(result.dataset.Apellido);
                $('#update-telef').val(result.dataset.Telefono);
                $('#update-email').val(result.dataset.Email);
                $('#update-address').val(result.dataset.Direccion);
                (result.dataset.IdEstado == 1) ? $('#update-status').prop('checked', true) : $('#update-status').prop('checked', false);
                showSelectRoles('update-rol', result.dataset.IdRol);
                M.updateTextFields();
                $('#modal-update-admin').modal('open');
            } else {
                sweetAlert(2, result.exception, null);
                console.log(result.exception);
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

//Función para modificar un registro seleccionado previamente
$('#form-update-admin').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiUsuarios + 'update',
        type: 'post',
        data: new FormData($('#form-update-admin')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modal-update-admin').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Producto modificado correctamente', null);
                    console.log(result.exception);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Producto modificado. ' + result.exception, null);
                    console.log(result.exception);
                } else if(result.status == 3) {
                    sweetAlert(1, 'Producto modificado. ' + result.exception, null);
                    console.log(result.exception);
                }
                showTable();
            } else {
                sweetAlert(2, result.exception, null);
                console.log(result.exception);
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

//Función para eliminar un registro seleccionado
function confirmDelete(idusuario)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el usuario?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiUsuarios + 'delete',
                type: 'post',
                data:{
                    IdUsuario: idusuario
                },
                datatype: 'json'
            })
            .done(function(response){
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        console.log(result.exception);
                        sweetAlert(1, 'Usuario eliminado correctamente', null);
                        showTable();
                    } else {
                        sweetAlert(2, result.exception, null);
                        console.log(result.exception);
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
    });
}



//Función para mostrar roles disponibles en un dropdown list
function showSelectRoles(idSelect, value)
{
    $.ajax({
        url: apiUsuarios + 'readRoles',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione una opción</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.IdRol != value) {
                        content += `<option value="${row.IdRol}">${row.TipoRol}</option>`;
                    } else {
                        content += `<option value="${row.IdRol}" selected>${row.TipoRol}</option>`;
                    }
                });
                $('#' + idSelect).html(content);
            } else {
                $('#' + idSelect).html('<option value="">No hay opciones</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
