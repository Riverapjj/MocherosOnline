$(document).ready(function()
{
    showTableProducts();
    showSelectCategorias('create-category', null);
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/articulos.php?site=dashboard&action=';

//Función para llenar tabla con los datos de los registros
function fillTableProducts(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        (row.IdEstado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        
        content += `
            <tr class="hoverable">
                <td><img src="../../resources/img/${row.Foto}" class="materialboxed" height="100"></td>
                <td>${row.NomArticulo}</td>
                <td>${row.Cantidad}</td>
                <td>${row.NomCategoria}</td>
                <td>${row.PrecioUnitario}</td>
                <td>${row.DescripcionArt}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.IdArticulos})" class="blue-text tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.IdArticulos}, ${row.Foto})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    //Se envía el parámetro al cuerpo de la tabla que queremos llenar 
    $('#tbody-products').html(content);
    //Método para visualizar imágenes de los registros
    $('.materialboxed').materialbox();
    //Método para crear paginación, búsqueda y que las títulos sean en español
    initTable('products-table');
}

//Función para obtener y mostrar los registros disponibles
function showTableProducts()
{
    $.ajax({
        url: apiProductos + 'readProductos',
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
            fillTableProducts(result.dataset);
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}


//Función para cargar las categorías en el select del formulario
function showSelectCategorias(idSelect, value)
{
    $.ajax({
        url: apiProductos + 'readCategorias',
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
                    if (row.categoria != value) {
                        content += `<option value="${row.IdCategoria}">${row.NomCategoria}</option>`;
                    } else {
                        content += `<option value="${row.IdCategoria}" selected>${row.NomCategoria}</option>`;
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

//Función para crear un nuevo registro
$('#form-create-products').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiProductos + 'create',
        type: 'post',
        data: new FormData($('#form-create-products')[0]),
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
                $('#form-create-products')[0].reset();
                $('#modal-create-products').modal('close');
                console.log(result.status);
                if (result.status == 1) {
                    sweetAlert(1, 'Producto creado correctamente', null);
                } else if (result.status == 2) {
                    sweetAlert(3, 'Producto creado. ' + result.exception, null);
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
})

//Función para mostrar formulario con registro a modificar
function modalUpdate(id)
{
    $.ajax({
        url: apiProductos + 'get',
        type: 'post',
        data:{
            IdArticulos: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#form-update-products')[0].reset();
                $('#id-product').val(result.dataset.IdArticulos);
                $('#update-file').val(result.dataset.Foto);
                $('#update-name').val(result.dataset.NomArticulo);
                $('#update-price').val(result.dataset.PrecioUnitario);
                $('#update-descrip').val(result.dataset.DescripcionArt);
                (result.dataset.IdEstado == 1) ? $('#update-status').prop('checked', true) : $('#update-status').prop('checked', false);
                showSelectCategorias('update-category', result.dataset.IdCategoria);
                M.updateTextFields();
                $('#modal-update-products').modal('open');
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

//Función para modificar un registro seleccionado previamente
$('#form-update-products').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiProductos + 'update',
        type: 'post',
        data: new FormData($('#form-update-products')[0]),
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
                $('#modal-update-products').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Producto modificado correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Producto modificado. ' + result.exception, null);
                } else if(result.status == 3) {
                    sweetAlert(1, 'Producto modificado. ' + result.exception, null);
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
})

//Función para eliminar un registro seleccionado
function confirmDelete(id, file)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el producto?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiProductos + 'delete',
                type: 'post',
                data:{
                    IdArticulos: id,
                    Foto: file
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
                            sweetAlert(1, 'Producto eliminado correctamente', null);
                        } else if (result.status == 2) {
                            sweetAlert(3, 'Producto eliminado. ' + result.exception, null);
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

function modalTabs(){

    if($('tabs-products') == true){
        content = `
        
            
        `
    }

}
