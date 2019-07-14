$(document).ready(function()
{
    showTableCategory();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCategorias = '../../core/api/categorias.php?site=dashboard&action=';

//Función para llenar tabla con los datos de los registros
function fillTableCategory(rows)
{
    let content = '';
    

    rows.forEach( (row) => {

        (row.IdEstado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        content += `
        <tr class="hoverable">
            <td>${row.NomCategoria}</td>
            <td>${row.Descripcion}</td>
            <td><i class="material-icons">${icon}</i></td>
            <td>
            <a href="#" onclick="modalUpdateCategory(${row.IdCategoria})" class="blue-text tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
            </td>
        </tr>
        `;
    });
    //Se envia el parámetro al id del cuerpo de la tabla que queremos llenar
    $('#tbody-category').html(content);
   //Método para crear paginación, búsqueda y que las títulos sean en español
    initTable('category-table');
}

//Función para obtener y mostrar los registros disponibles
function showTableCategory()
{
    $.ajax({
        url: apiCategorias + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
            //Se envía el parámetro para ejecutar el llenado de la tabla
            fillTableCategory(result.dataset);
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

/* //Función para mostrar los resultados de una búsqueda
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCategorias + 'search',
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
}) */

//Función para crear un nuevo registro
$('#form-create-category').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCategorias + 'create',
        type: 'post',
        data: new FormData($('#form-create-category')[0]),
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
                $('#form-create-category')[0].reset();
                $('#modal-create-category').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Categoría creada correctamente', null);
                } else if (result.status == 2) {
                    sweetAlert(3, 'Categoría creada. ' + result.exception, null);
                }
                showTableCategory();
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

//Función para mostrar formulario con registro a modificar
function modalUpdateCategory(id)
{
    event.preventDefault();
    $.ajax({
        url: apiCategorias + 'get',
        type: 'post',
        data:{
            IdCategoria: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {                
                $('#form-update-category')[0].reset();
                $('#modal-update-category').modal('open');
                $('#IdCategoria').val(result.dataset.IdCategoria);
                $('#name-category-update').val(result.dataset.NomCategoria);
                $('#update-descrip-category').val(result.dataset.Descripcion);
                (result.dataset.IdEstado == 1) ? $('#update-status').prop('checked', true) : $('#update-status').prop('checked', false);
                
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
$('#form-update-category').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCategorias + 'update',
        type: 'post',
        data: new FormData($('#form-update-category')[0]),
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
                $('#modal-update-category').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Categoría modificada correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Categoría modificada. ' + result.exception, null);
                } else if(result.status == 3) {
                    sweetAlert(1, 'Categoría modificada. ' + result.exception, null);
                }
                showTableCategory();
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

//Función para eliminar un registro seleccionado
function confirmDelete(id, file)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar la categoría?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiCategorias + 'delete',
                type: 'post',
                data:{
                    id_categoria: id,
                    imagen_categoria: file
                },
                datatype: 'json'
            })
            .done(function(response){
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        if (result.status == 1) {
                            sweetAlert(1, 'Categoría eliminada correctamente', null);
                        } else if(result.status == 2) {
                            sweetAlert(3, 'Categoría eliminada. ' + result.exception, null);
                        }
                        showTable();
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
        }
    });
}
