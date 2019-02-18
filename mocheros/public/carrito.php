<!DOCTYPE html>     
<html>  
    <head>
        <?php
            require('../app/view/head.php');
        ?>
        <title> Carrito  </title>
    </head>
    <body>
        <header>
            <?php
                require('../app/view/header.php');
            ?>           
        </header>
        <nav>
            <?php
                require('../app/view/navbar_public.php');
            ?>
        </nav>
        <main>
            <!--Apartado para el carrito de compras(donde puede visualizar los productos que desea
                <img class="responsive-img animated pulse" src="../web/images/productos/banner9.png"> --> 
                <!--Tabla para visualizar productos agregados en el carrito-->
                <div class="container">
                    <table class=" highlight" >
                            <thead>
                              <tr>
                                  <th>Producto</th>
                                  <th>Nombre</th>
                                  <th>Cantidad</th>
                                  <th>Precio</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><img class="responsive-img" src="../resources/img/mochila3.jpg"></td>
                                <td>Mochila 1</td>
                                <td>
                                    <div class="row">  
                                        <div class="input-field col s6 m4 l4">
                                            <input type="number" id="stepper1" min="1" max="10 " value="1">
                                        </div>
                                    </div>
                                </td>
                                <td>$45.00</td>
                              </tr>
                              <tr>
                                    <td><img class="responsive-img" src="../resources/img/accesorios1.jpg"></td>
                                    <td>Accesorio 1</td>
                                    <td>
                                        <div class="row">  
                                            <div class="input-field col s6 m4 l4">
                                                <!--Se agrega un numeric steppper para seleccionar la catidad del producto que desea-->
                                                <input type="number" id="stepper1" min="1" max="10 " value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td>$22.50</td>
                              </tr>        
                          </table>
                    </div>
                    <!--Apartado donde aparece el total a apagar y la opción para pagar-->
                    <div class="container monto">
                        <div class="row">
                                <div class="col s12 m6 l12">
                                  <div class="card  grey lighten-3 ">
                                    <div class="card-content black-text">                                  
                                      <p><b>SUBTOTAL</b> $67.50 </p>
                                      <br><b>TOTAL  </b>  $67.50
                                    </div>                                   
                                  </div>
                                  <a href="#modal1"class="modal-trigger waves-effect waves-light btn-large amber darken-2">Realizar compra</a>
                                </div>
                        </div>                       
                    </div>                                   
            </main>
            <?php
            require('../app/view/footer.php');
        ?>    
</body>
</html>