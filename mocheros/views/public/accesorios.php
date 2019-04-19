<?php
    require('../../core/helpers/publicHelper.php');
    publicHelper::header('Accesorios');
?>
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="cyan-text">Iniciar sesión</h4>
        <div class="row">
            <form>
                <div class="input-field col s12 ">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="user" type="text" class="validate">
                    <label for="user">Usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="passwordon" type="password" class="validate">
                    <label for="passwordon">Contraseña</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="../dashboard/index_dashboard.php"
            class="modal-action modal-close waves-effect waves-cyan btn-flat">Iniciar sesión</a>
    </div>
</div>
<!--Estructura de modal para términos y condiciones -->
<div id="modal3" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Términos y condiciones</h4>
        <p>Los siguientes términos y condiciones (los "Términos y Condiciones") rigen el uso que usted le dé a este
            sitio web y a cualquiera de los contenidos disponibles por o a través de este sitio web, incluyendo
            cualquier contenido derivado del mismo (el "Sitio Web"). Time Inc. ("Time Inc." o "nosotros") ha puesto
            a su disposición el Sitio Web. Podemos cambiar los Términos y Condiciones de vez en cuando,
            en cualquier momento sin ninguna notificación, sólo publicando los cambios en el Sitio Web. AL USAR EL
            SITIO WEB, USTED ACEPTA Y ESTÉ DE ACUERDO CON ESTOS TÉRMINOS Y CONDICIONES EN LO QUE SE REFIERE
            A SU USO DEL SITIO WEB. Si usted no está de acuerdo con estos Términos y Condiciones, no puede tener
            acceso al mismo ni usar el Sitio Web de ninguna otra manera.
            1. Derechos de Propiedad. Entre usted y Time Inc., Time Inc. es dueño único y exclusivo, de todos los
            derechos, título e intereses en y del Sitio Web, de todo el contenido (incluyendo, por ejemplo,
            audio, fotografías, ilustraciones, gráficos, otros medios visuales, videos, copias, textos, software,
            títulos, archivos de Onda de choque, etc.), códigos, datos y materiales del mismo,
            el aspecto y el ambiente, el diseño y la organización del Sitio Web y la compilación de los contenidos,
            códigos, datos y los materiales en el Sitio Web, incluyendo pero no limitado a,
            cualesquiera derechos de autor, derechos de marca, derechos de patente, derechos de base de datos,
            derechos morales, derechos sui generis y otras propiedades intelectuales y derechos patrimoniales
            del mismo. Su uso del Sitio Web no le otorga propiedad de ninguno de los contenidos, códigos, datos o
            materiales a los que pueda acceder en o a través del Sitio Web.</p>
    </div>
    <div class="modal-footer">
        <a href="#modal2" class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat ">Aceptar</a>
    </div>
</div>
<!--Estructura de modal para registrarse-->
<div id="modal2" class="modal  modal-fixed-footer">
    <div class="modal-content">
        <h4 class="cyan-text">Registrarse</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">call</i>
                        <input id="number" type="text" class="validate">
                        <label for="number">Teléfono</label>
                    </div>
                    <div class="input-field col s12 ">
                        <i class="material-icons prefix">contact_mail</i>
                        <input id="email" type="text" class="validate">
                        <label for="email">Correo electrónico</label>
                    </div>
                    <div class="input-field col s12 ">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" class="validate">
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="input-field col s12 ">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="confirmpass" type="password" class="validate">
                        <label for="confirmpass">Confirmacion Contraseña</label>
                        <a class=" modal-trigger modal-action modal-close " href="#modal3">Al darle registrse acepto
                            términos y condiciones de kidszone</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat">Registrarse</a>
    </div>
</div>
<div id="modal4" class="modal">
    <!-- Estructura de modal para informacaión detallada del juguete -->
    <div class="modal-content">
        <h4 class="orange-text">Estuche para lápices juvenil</h4>
        <div class="row">
            <div class="col s12 m6">
                <img class="responsive-img" src="../../resources/img/accesorios1.jpg">
            </div>
            <div class="col s12 m6">
                <p><b>Código Del Producto:</b> 87352214<br></p>
                <p><b> Precio Regular:</b>$22.50<br></p>
                <p><b>Descripción:</b></p>
                <p>Estuche para lápices con diseño creativo. Ideal para estudios y para la oficina.</p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
</div>
<div class="container-fluid grey lighten-2">
    <div class="row">
        <div class="col s12">
            <h1 class="caption center-align indigo-text text-darken-3">ACCESORIOS</h1>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios1.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 1</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios2.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 2</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios1.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 3</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios2.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 4</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios2.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 5</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios2.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 6</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios1.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 7</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/accesorios1.jpg">
                        <!--<a class="btn-floating halfway-fab waves-effect waves-cyan" onclick="Materialize.toast('Añadido al carrito', 4000)" title="Añadir al carrito">-->
                        <a class="btn-floating halfway-fab waves-effect waves-cyan"
                            onclick="M.toast({html: 'Añadido al carrito'})" title="Añadir al carrito">
                            <!--<a class="btn-floating" onclick="M.toast({html: 'Añadido al carrito'})">add</a>-->
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <p>Estuche 8</p>
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
                        <a class="modal-trigger orange-text" href="#modal4">Ver producto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    publicHelper::footer('catalogo.js');
?>