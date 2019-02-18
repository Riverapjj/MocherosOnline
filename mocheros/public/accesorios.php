<!DOCTYPE html>
<html>
<head>
    <?php
    require('../app/view/head.php');
    ?>
    <title>Accesorios</title>
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
    <div class="container-fluid grey lighten-2">
        <div class="row">
            <div class="col s12">
                <h1 class="caption center-align indigo-text text-darken-3">ACCESORIOS</h1>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../resources/img/accesorios1.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                <i class="material-icons">add</i>
                                </a>
                        </div>
                        <div class="card-content">
                            <p>Accesorio 1</p>
                            <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                        </div>
                        <div class="card-action">
                            <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                        </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios2.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 2</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios1.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 3</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios2.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 4</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios2.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 5</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios2.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 6</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios1.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 7</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="../resources/img/accesorios1.jpg">
                                <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                                <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                                <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>Accesorio 8</p>
                                <!--código para rating con estrellas
                                <div class="ec-stars-wrapper">
                                    <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                    <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                    <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                    <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                    <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                                </div>-->
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal1">Ver más</a>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger cyan-text" href="#modal2">Ver comentarios</a>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <footer>
        <?php
        require('../app/view/footer.php');
        ?>
    </footer>
</body>
</html>