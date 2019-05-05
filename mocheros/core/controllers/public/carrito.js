$('.product-form').submit(function(e){
    var form_data = $(this).serialize();
    var button_content = $(this).find('button[type=submit]');
    button_content.html('Agregando...');
    $.ajax({
        url: 'carrito.php',
        type: 'POST',
        dataType: 'json',
        data: form_data
    })
    .done(function(data){
        $('#card-container').html(data.products);
        button_content.html('Agregar al carrito');
    })
    e.preventDefault();
})