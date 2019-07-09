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
                                    <p><!--<a href="#" onclick="readComments(${result.dataset.IdArticulos})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Comentarios"><i class="material-icons">list</i></a>-->
                                    <a href="#" onclick="readRatings(${result.dataset.IdArticulos})" class="waves-effect waves-grey btn orange tooltipped" data-tooltip="Puntuaciones"><i class="material-icons">star</i></a>
                                    <!--<a href="#" onclick="modalCommentary(${result.dataset.IdArticulos})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Agregar comentario"><i class="material-icons">add</i></a>-->
                                    <a href="#" onclick="modalPunctuation(${result.dataset.IdArticulos})" class="waves-effect waves-grey btn orange tooltipped" data-tooltip="Agregar puntuacion"><i class="material-icons">add_star</i></a>
                                    </p>
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

//funcion para abrir modal de agregar comentario 
function modalPunctuation(id)
{
    $.ajax({
        url: apiCatalogo + 'get',
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
                $('#form-valoracion')[0].reset();
                $('#IdArticulos').val(result.dataset.IdArticulos);                           
                M.updateTextFields();
                $('#modalPuntuacion').modal('open');
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

//Función para realizar puntuacion
$('#form-valoracion').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCatalogo + 'rating',
        type: 'post',
        data: new FormData($('#form-valoracion')[0]),
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
                $('#form-valoracion')[0].reset();
                $('#modalPuntuacion').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Calificación registrada con exito', null);
                } else {
                    sweetAlert(3, 'Calificación registrada. ' + result.exception, null);
                }             
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

function fillCardsValuations(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){       
        content += `
        <div class="col s12 m6 l4">
            <div class="card white">              
                <div class="card-content white-text hoverable">
                    <p class="black-text">
                        <strong class="blue-text">Producto:</strong> ${row.articulo}</p>
                    <p class="black-text">
                        <strong class="blue-text">Cliente:</strong> ${row.cliente}</p>                   
                    <p class="black-text">                   
                        <strong class="blue-text">Puntuacion:</strong> ${row.Calificacion}</p>
                        <p class="black-text">                                  
                </div>
            </div>
        </div>    
        `;
    });
    $('#modal-content').html(content);
    $('select').formSelect();
    $('.tooltipped').tooltip();   
    $('.materialboxed').materialbox();
}

//funcion para leer los comentarios
function readRatings(id)
{
    $.ajax({
        url: apiCatalogo + 'getRatings',
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
                fillCardsValuations(result.dataset);         
                $('#modalP').modal('open');                        
            } else {
                sweetAlert(2, 'Este producto no tiene calificaciones', null);
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