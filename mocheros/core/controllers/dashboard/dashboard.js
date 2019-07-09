$(document).ready(function()
{
    showGreeting();
    chartProductosCategorias();
    chartCategorias();
    chartEstadoPedidos();
    chartProductosVendidos();
    chartProductosCalificacion();
    
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCat = '../../core/api/categorias.php?site=dashboard&action=';
const apiPedidos = '../../core/api/pedidos.php?site=dashboard&action=';
const apiArticulos = '../../core/api/articulos.php?site=dashboard&action=';

//Función para mostrar un saludo dependiendo de la hora del cliente
function showGreeting()
{
    let today = new Date();
	let hour = today.getHours();
    if (hour < 12) {
        greeting = 'Buenos días';
    } else if (hour < 19) {
        greeting = 'Buenas tardes';
    } else if (hour <= 23) {
        greeting = 'Buenas noches';
    }
    $('#greeting').text(greeting);
}

//Función para crear gráficos en página de inicio
function chartProductosCategorias(){

    $.ajax({
        url: apiCat + 'productosCategorias',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let categorias = [];
                let cantidad = [];
                

                result.dataset.forEach(function(row){
                    categorias.push(row.NomCategoria);
                    cantidad.push(row.Cantidad);

                });

                barGraph('chartProductosCat', categorias, cantidad, 'Existencias', 'Existencias de productos por categorias')
                
            }else{
                $('#chartProductosCat').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartCategorias(){

    $.ajax({
        url: apiCat + 'categoriasCantidad',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let nombre = [];
                let encabezados = [];
                

                result.dataset.forEach(function(row){
                    nombre.push(row.Nombre);
                    encabezados.push(row.Encabezados);

                });

                doughnutGraph('chartCategoriasCantidad', nombre, encabezados, 'Cantidad ventas', 'Clientes con más compras')
                
            }else{
                $('#chartCategoriasCantidad').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}


function chartEstadoPedidos(){

    $.ajax({
        url: apiPedidos + 'readCountEstadosChart',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let tipoestado = [];
                let cantidad = [];
                

                result.dataset.forEach(function(row){
                    tipoestado.push(row.TipoEstado);
                    cantidad.push(row.Estado);

                });

                pieGraph('chartEstadosPedidos', tipoestado, cantidad, 'Cantidad', 'Cantidad de estados de facturas')
                
            }else{
                $('#chartEstadosPedidos').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartProductosVendidos(){

    $.ajax({
        url: apiArticulos + 'productosVendidos',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let nomarticulo = [];
                let cantidadarticulos = [];
                

                result.dataset.forEach(function(row){
                    nomarticulo.push(row.NomArticulo);
                    cantidadarticulos.push(row.CantidadArticulos);

                });

                horizontalGraph('chartProductosVendidos', nomarticulo, cantidadarticulos, 'Cantidad', 'Producto más vendido')
                
            }else{
                $('#chartProductosVendidos').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartProductosCalificacion(){

    $.ajax({
        url: apiArticulos + 'productoCalificacion',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let nomarticulo = [];
                let calificacion = [];
                

                result.dataset.forEach(function(row){
                    nomarticulo.push(row.NomArticulo);
                    calificacion.push(row.Promedio);

                });

                polarAreaGraph('chartProductosCalificaciones', nomarticulo, calificacion, 'Cantidad', 'Producto mejor calificado')
                
            }else{
                $('#chartProductosCalificaciones').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}
