<!DOCTYPE html>
<html>
<head>
    <?php
    require('../app/view/head.php');
    ?>
    <title>Mochilas</title>
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
            <h1 class="caption center-align indigo-text text-darken-3">MOCHILAS</h1>
            <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../resources/img/mochila3.jpg">
                            <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                            <a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div class="card-content">
                            <p>Mochila prueba
                                <img src="../web/images/categorias/new.png">
                            </p>
                            <!--código para rating con estrellas-->
                            <div class="ec-stars-wrapper">
                                <a href="#" data-value="1" title="Votar con 1 estrellas">★</a>
                                <a href="#" data-value="2" title="Votar con 2 estrellas">★</a>
                                <a href="#" data-value="3" title="Votar con 3 estrellas">★</a>
                                <a href="#" data-value="4" title="Votar con 4 estrellas">★</a>
                                <a href="#" data-value="5" title="Votar con 5 estrellas">★</a>
                            </div>
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
                        <img src="../resources/img/mochila3.jpg">
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
                        <img src="../resources/img/mochila3.jpg" class="responsive-img">
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
                        <img src="../resources/img/mochila4.jpg">
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
                        <img src="../resources/img/mochila4.jpg">
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
                        <img src="../resources/img/mochila4.jpg">
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
                        <img src="../resources/img/mochila4.jpg">
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
                        <img src="../resources/img/mochila3.jpg" class="responsive-img">
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
                        <img src="../resources/img/mochila3.jpg" class="responsive-img">
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
    <footer>
        <?php
        require('../app/view/footer.php');
        ?>
    </footer>
</body>
</html>