$("#form-cantidad").submit(function(e){
    var form_data = $(this).serialize();
    var button_content = $(this).find('button[type=submit]');
    button_content.html('Agregando...');
    $.ajax({
    url: "manage_cart.php",
    type: 'post',
    dataType: 'json',
    data: form_data
    }).done(function(data){
    $("#cart-container").html(data.products);
    button_content.html('Add to Cart');
    })
    e.preventDefault();
});

/*$(document).ready(function() 
{
    showCarrito();
})

const apiCarrito = '../../core/api/articulos.php?site=publicHelper&action=';

function showCarrito()
{
    $.ajax({
        url: apiCarrito + 'addToCart',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                result.dataset.forEach(function(row){
                    content +=`
                    `
                })
            }
        }
    })
}*/
/*$(".form-item").submit(function(e){ //user clicks form submit button
    var form_data = $(this).serialize(); //prepare form data for Ajax post
    var button_content = $(this).find('button[type=submit]'); //get clicked button info
    button_content.html('Adding...'); //Loading button text //change button text 

    $.ajax({ //make ajax request to cart_process.php
        url: "cart_process.php",
        type: "POST",
        dataType:"json", //expect json value from server
        data: form_data
    }).done(function(data){ //on Ajax success
        $("#cart-info").html(data.items); //total items count fetch in cart-info element
        button_content.html('Add to Cart'); //reset button text to original text
        alert("¡Articulo agregado al carrito!"); //alert user
        if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
            $(".cart-box").trigger( "click" ); //trigger click to update the cart box.
        }
    })
    e.preventDefault();
});

$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
    e.preventDefault(); 
    var pcode = $(this).attr("data-code"); //get product code
    $(this).parent().fadeOut(); //remove item element from box
    $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
        $("#cart-info").html(data.items); //update Item count in cart-info
        $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
    });
});*/