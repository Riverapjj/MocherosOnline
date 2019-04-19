$(document).ready(function()
{
    readProductos();
})

//Constante para establecer la ruta y los parámetros de comunicación con la API
const apiCatalogo = '../../core/api/articulos.php?site=publicHelper&action=';

//Función para obtener y mostrar las categorías de los productos
function readProductos()
{
    $.ajax({
        url: apiCatalogo + 'readProductos',
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
                result.dataset.forEach(function(row){
                    content += `
                    <div class="col s12 m6 l3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img src="../resources/img/articulos/${row.Foto}" class="materialboxed">
                                <a href="#" onclick="getProducto(${row.IdArticulos})" class="btn-floating halfway-fab waves-effect waves-light orange tooltipped" data-tooltip="Ver más"><i class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">${row.NomArticulo}</span>
                                <p>Precio: $ ${row.PrecioUnitario}</p>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#title').text(NomArticulo);
                $('#catalogo').html(content);
                $('.materialboxed').materialbox();
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
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

//Función para obtener y mostrar los datos del producto seleccionado
function getProducto(id)
{
    $.ajax({
        url: apiCatalogo + 'detailProducto',
        type: 'post',
        data:{
            id_producto: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = `
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="../../resources/img/productos/${result.dataset.Foto}">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3 class="header">${result.dataset.NomArticulo}</h3>
                                <p>${result.dataset.DescripcionArt}</p>
                                <p><b>Precio(US$) ${result.dataset.PrecioUnitario}</b></p>
                            </div>
                            <div class="card-action">
                                <form method="post" id="form-cantidad">
                                    <div class="row center">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">list</i>
                                            <input id="cantidad" type="number" name="cantidad" min="1" class="validate">
                                            <label for="cantidad">Cantidad</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <button type="submit" class="btn waves-effect waves-light blue tooltipped" data-tooltip="Agregar al carrito"><i class="material-icons">add_shopping_cart</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
                $('#title').text(NomArticulo);
                $('#catalogo').html(content);
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
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