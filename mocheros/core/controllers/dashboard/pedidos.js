$(document).ready(function()
{
    //inicializacion de la funcion para mostrar datos en la tabla
    showTablePedidos(); 
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiPedidos = '../../core/api/pedidos.php?site=public&action=';

//Función para llenar tabla con los datos de los registros
function fillTablePedidos(rows)
{    
    let content= '';
    rows.forEach(function(row){

        content +=`
            <tr>
                <td>${row.Nombre}, ${row.Apellido}</td>
                <td>${row.Fecha}</td>                
                <td>${row.TipoEstado}</td>                                                                  
                <td><a href="#" onclick="modalDetalles(${row.IdEncabezado})" class="waves-effect waves-light btn grey tooltipped" data-tooltip="Detalle"><i class="material-icons">list</i></a></td>                
            </tr>
        `;
    });
    //Se envía el parámetro al cuerpo de la tabla que queremos llenar 
    $('#tbody-read-pedidos').html(content);
    //Método para crear paginación, búsqueda y que las títulos sean en español
    initTable('pedidos-table');
}

function showSelectEstados(idSelect, value)
{
    $.ajax({
        url: apiProductos + 'readEstadoPedidos',
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
                        content += `<option value="${row.IdEstadoPedido}">${row.TipoEstado}</option>`;
                    } else {
                        content += `<option value="${row.IdEstadoPedido}" selected>${row.TipoEstado}</option>`;
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

function showTablePedidos(){
    $.ajax({
        url: apiPedidos + 'readPedidosTable',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            console.log(result);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                fillTablePedidos(result.dataset);
            } else {
                alert(result.dataset)
                sweetAlert(2, 'Error al llenar la tabla', result.exception);
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

//Funcion para mostrar la tabla con los detalles de la compra
function fillTableDetalle(rows)
{   
    let content= '';
    let label = '';
    let totalVenta = 0;
    rows.forEach(function(row){ 
        var subtotal=parseFloat(row.Total).toFixed(2);
        console.log(subtotal);       
        content +=`
            <tr>
                <td>${row.idDetalle}</td>
                <td>${row.nombre}</td>
                <td>${row.cantidad}</td>
                <td>${row.precio}</td>
                <td>${subtotal}</td>                                                               
            </tr>
        `;
        totalVenta= parseFloat(subtotal)+ parseFloat(totalVenta);
        
    });
    label = `<h5 id="labelTotal">Total: $${parseFloat(totalVenta).toFixed(2)}</h5>`;     
    $('#detalle').html(content);
    $('#total').html(label);    
    console.log(totalVenta);

}

function modalDetalles(id)
{
    $.ajax({
        url: apiPedidos + 'detalle',
        type: 'post',
        data:{
            idVenta: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#idVenta').val(result.dataset.idVenta);
                fillTableDetalle(result.dataset);
                $('#modalDetalle').modal('open');
                $(document).ready(function()
                {  
                    showTable(); 
                })
                

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