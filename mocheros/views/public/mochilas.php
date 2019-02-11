<?php
include "../../core/helpers/public_page.php";
public_page::header("Mocheros");
?>
<div class="container-fluid grey lighten-2">
    <div class="row">
        <div class="col col-sm-12">
            <h1 class="caption center-align indigo-text text-darken-3">MOCHILAS</h1>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila3.jpg">
                    </div>
                    <div class="card-content">
                        <p>Mochila 1.</p>
                    </div>
                    <div class="card-action">
                    <a class="modal-trigger orange-text" href="#modal1">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila3.jpg" class="responsive-img">
                    </div>
                    <div class="card-content">
                        <p>Mochila 2.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila4.jpg">
                    </div>
                    <div class="card-content">
                            <p>Mochila 3.</p>
                    </div>
                    <div class="card-action">
                            <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila4.jpg">
                    </div>
                    <div class="card-content">
                        <p>Mochila 4.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila4.jpg">
                    </div>
                    <div class="card-content">
                        <p>Mochila 4.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila4.jpg">
                    </div>
                    <div class="card-content">
                        <p>Mochila 4.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila3.jpg" class="responsive-img">
                    </div>
                    <div class="card-content">
                        <p>Mochila 2.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/mochila3.jpg" class="responsive-img">
                    </div>
                    <div class="card-content">
                        <p>Mochila 2.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver producto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
                    <!-- Estructura de modal para informacaión detallada del juguete -->
                    <div class="modal-content">                   
                        <h4 class="cyan-text">Muñeca Sofi crece contigo</h4>
                            <div class="row">
                                <div class="col s12 m6">
                                    <img class = "responsive-img" src="../web/images/productos/1.jpg">
                                </div>    
                                <div class="col s12 m6">
                                        <p><b>Código Del Producto:</b> 97655<br></p> 
                                        <p><b>   Precio Regular:</b>$47.42<br></p>
                                        <p><b>Descripción:</b></p>
                                        <p>Podrás interactuar con ella, <br> darle de comer y escuchar todas las frases que tiene para ti, 
                                            se comporta como una niña grande y realmente crece</p>                                  
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="modal1" class="modal">
                    <!-- Estructura de modal para informacaión detallada del juguete -->
                    <div class="modal-content">                   
                        <h4 class="cyan-text">Muñeca Sofi crece contigo</h4>
                            <div class="row">
                                <div class="col s12 m6">
                                    <img class = "responsive-img" src="../resources/img/mochila3.jpg">
                                </div>    
                                <div class="col s12 m6">
                                        <p><b>Código Del Producto:</b> 97655<br></p> 
                                        <p><b>   Precio Regular:</b>$47.42<br></p>
                                        <p><b>Descripción:</b></p>
                                        <p>Podrás interactuar con ella, <br> darle de comer y escuchar todas las frases que tiene para ti, 
                                            se comporta como una niña grande y realmente crece</p>                                  
                                </div>
                        </div>
                    </div>
</div>
<?php
Public_page::footer();
?>