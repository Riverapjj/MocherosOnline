$(document).ready(function () {
    readCategorias();
})

//Constante para establecer la ruta y los parámetros de comunicación con la API
const apiCatalogo = '../../core/api/articulos.php?site=publicHelper&action=';

//Función para obtener y mostrar las categorías de los productos
function readCategorias() {
    $.ajax({
        url: apiCatalogo + 'readCategorias',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    result.dataset.forEach(function (row) {
                        content += `
                    <div class="col s12 m6 l4">
                        <div class="card hoverable">
                            <div class="card-content">
                                <span class="card-title activator">${row.NomCategoria}<i class="material-icons"></i></span>
                                <p class="center"><a href="#" onclick="readProductosCategoria(${row.IdCategoria}, '${row.NomCategoria}')" class="tooltipped" data-tooltip="Ver más"><i class="material-icons small">more_horiz</i></a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title">${row.NomCategoria}<i class="material-icons right">close</i></span>
                            </div>
                        </div>
                    </div>
                    `;
                    });
                    $('#title').text('Nuestros productos');
                    $('#catalogo').html(content);
                    $('.tooltipped').tooltip();
                } else {
                    $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

//Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada
function readProductosCategoria(id, categoria) {
    $.ajax({
        url: apiCatalogo + 'readProductos',
        type: 'post',
        data: {
            IdCategoria: id
        },
        datatype: 'json'
    })
        .done(function (response) {
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                if (result.status) {
                    let content = '';
                    result.dataset.forEach(function (row) {
                        content += `
                    <div class="col s12 m6 l3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img src="../../resources/img/articulos/${row.Foto}" class="materialboxed">               
                                <a href="#" onclick="getProducto(${row.IdArticulos})" class="btn-floating halfway-fab waves-effect waves-light orange tooltipped" data-tooltip="Ver producto"><i class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">${row.NomArticulo}</span>
                                <p><b>$${row.PrecioUnitario}</b></p>
                            </div>
                        </div>
                    </div>
                    `;
                    });
                    $('#title').text(categoria);
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
        .fail(function (jqXHR) {
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

//Función para obtener y mostrar los datos del producto seleccionado
function getProducto(id) {
    $.ajax({
        url: apiCatalogo + 'detailProducto',
        type: 'post',
        data: {
            IdArticulos: id
        },
        datatype: 'json'
    })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = `
                    <div class="container">
                        <div class="card horizontal">
                            <div class="card-image">
                                <img src="../../resources/img/productos/${result.dataset.Foto}">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <h3 class="header">${result.dataset.NomArticulo}</h3>
                                    <p>${result.dataset.DescripcionArt}</p>
                                    <p>Existencias disponibles: ${result.dataset.Cantidad}</p>
                                    <p><b>$${result.dataset.PrecioUnitario}</b></p>
                                    <div class="ec-stars-wrapper">
                                        <a href="#" data-value="1" title="Votar con 1 estrella">&#9733;</a>
                                        <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                        <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                        <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                        <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <form method="post" id="form-preDetalle">
                                        <div class="row center">                                    
                                            <div class="input-field col s12 m6">
                                            <input id="cantidadBD" type="hidden" name="cantidadBD" value="${result.dataset.Cantidad}">
                                            <input id="idProducto3" type="hidden" name="idProducto3" value="${result.dataset.IdArticulos}">
                                                <i class="material-icons prefix">list</i>
                                                <input id="cantidad" type="number" name="cantidad" min="1" class="validate" required>
                                                <label for="cantidad">Cantidad</label>
                                            </div> 
                                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"  onclick="agregarCarrito()"><i class="material-icons">add_shopping_cart</i></button>
                                        </div>                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                `;
                    $('#title').text('Detalle del artículo');
                    $('#catalogo').html(content);
                    $('.tooltipped').tooltip();
                } else {
                    $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

//Función para el buscador
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCatalogo + 'searchProducto',
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
                let content = '';
                result.dataset.forEach(function (row) {
                    content += `
                <div class="col s12 m6 l3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="../../resources/img/articulos/${row.Foto}" class="materialboxed">               
                            <a href="#" onclick="getProducto(${row.IdArticulos})" class="btn-floating halfway-fab waves-effect waves-light orange tooltipped" data-tooltip="Ver producto"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">${row.NomArticulo}</span>
                            <p><b>$${row.PrecioUnitario}</b></p>
                        </div>
                    </div>
                </div>
                `;
                });
                $('#titulo').text('Resultado de la busqueda');
                $('#resultado').html(content);
                $('.materialboxed').materialbox();
                $('.tooltipped').tooltip();
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

//funcion para agregar al preDetalle
function agregarCarrito(){
    
    event.preventDefault();
    $.ajax({
        url: apiCatalogo + 'preDetalle',
        type: 'post',
        data: new FormData($('#form-preDetalle')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const result= JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if(result.status){
                $('#form-preDetalle')[0].reset();                
                if(result.status==1){
                    sweetAlert(1, 'Articulo añadido correctamente', null);
                }else{
                    sweetAlert(3,'Articulo añadido. ' +result.exception, null);
                }              
            }else{
                sweetAlert(4, result.exception, null);
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' +jqXHR.status+ ' ' +jqXHR.statusText);
    })
} 