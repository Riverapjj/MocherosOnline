<?php
    require('../../core/helpers/publicHelper.php');
    publicHelper::header('Carrito');
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
                <p>Los siguientes términos y condiciones (los "Términos y Condiciones") rigen el uso que usted le dé a
                    este sitio web y a cualquiera de los contenidos disponibles por o a través de este sitio web,
                    incluyendo
                    cualquier contenido derivado del mismo (el "Sitio Web"). Time Inc. ("Time Inc." o "nosotros") ha
                    puesto a su disposición el Sitio Web. Podemos cambiar los Términos y Condiciones de vez en cuando,
                    en cualquier momento sin ninguna notificación, sólo publicando los cambios en el Sitio Web. AL USAR
                    EL SITIO WEB, USTED ACEPTA Y ESTÉ DE ACUERDO CON ESTOS TÉRMINOS Y CONDICIONES EN LO QUE SE REFIERE
                    A SU USO DEL SITIO WEB. Si usted no está de acuerdo con estos Términos y Condiciones, no puede tener
                    acceso al mismo ni usar el Sitio Web de ninguna otra manera.
                    1. Derechos de Propiedad. Entre usted y Time Inc., Time Inc. es dueño único y exclusivo, de todos
                    los derechos, título e intereses en y del Sitio Web, de todo el contenido (incluyendo, por ejemplo,
                    audio, fotografías, ilustraciones, gráficos, otros medios visuales, videos, copias, textos,
                    software, títulos, archivos de Onda de choque, etc.), códigos, datos y materiales del mismo,
                    el aspecto y el ambiente, el diseño y la organización del Sitio Web y la compilación de los
                    contenidos, códigos, datos y los materiales en el Sitio Web, incluyendo pero no limitado a,
                    cualesquiera derechos de autor, derechos de marca, derechos de patente, derechos de base de datos,
                    derechos morales, derechos sui generis y otras propiedades intelectuales y derechos patrimoniales
                    del mismo. Su uso del Sitio Web no le otorga propiedad de ninguno de los contenidos, códigos, datos
                    o materiales a los que pueda acceder en o a través del Sitio Web.</p>
            </div>
            <div class="modal-footer">
                <a href="#modal2"
                    class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat ">Aceptar</a>
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
                                <a class=" modal-trigger modal-action modal-close " href="#modal3">Al darle registrse
                                    acepto términos y condiciones de kidszone</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#"
                    class=" modal-trigger modal-action modal-close waves-effect waves-cyan btn-flat">Registrarse</a>
            </div>
        </div>
        <!--Apartado para el carrito de compras(donde puede visualizar los productos que desea
                <img class="responsive-img animated pulse" src="../web/images/productos/banner9.png"> -->
        <!--Tabla para visualizar productos agregados en el carrito-->
        <div class="container">
            <table class=" highlight">
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
                        <td><img class="responsive-img" src="../../resources/img/mochila3.jpg"></td>
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
                        <td><img class="responsive-img" src="../../resources/img/accesorios1.jpg"></td>
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
                            <br><b>TOTAL </b> $67.50
                        </div>
                    </div>
                    <a href="#modal1" class="modal-trigger waves-effect waves-light btn-large amber darken-2">Realizar
                        compra</a>
                </div>
            </div>
        </div>
<?php
    publicHelper::footer();
?>