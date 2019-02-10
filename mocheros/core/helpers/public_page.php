<?php
class Public_page{
    public static function header($title){
        print('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.css">
                <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <title>'.$title.'</title>
            </head>
            <body>
                <header>
                    <div class="header">
                            <div class="row">
                            <div class="col col-sm-3 col-lg-3">
                                <img class="center col col-sm-12" src="../../resources/img/marca-mochilas.jpg">
                            </div>
                            <div class="col col-sm-12 col-lg-9 orange darken-2">
                                <h1> Mocheros </h1>
                                <h4> Tus compañeros en tus aventuras </h4>
                            </div>
                        </div>
                    </div>
                </header>
                <nav class="orange darken-2">
                    <div class="nav-wrapper">
                    <a href="#" class="brand-logo"></a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="#">Mochilas</a></li>
                        <li><a href="#">Locheras</a></li>
                        <li><a href="#">Accesorios</a></li>
                    </ul>
                    </div>
                </nav>
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="sass.html">Mocheros</a></li>
                    <hr>
                    <li><a href="badges.html">Mochilas</a></li>
                    <li><a href="badges.html">Loncheras</a></li>
                    <li><a href="collapsible.html">Accesorios</a></li>
                </ul>
            ');
        }

    public static function footer(){
        print('
               <footer class="page-footer">
                <div class="container">
                    <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                    </div>
                </div>
                </footer>
                <script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/public.js"></script>
            </body>
            </html>
        ');
    }
}
?>