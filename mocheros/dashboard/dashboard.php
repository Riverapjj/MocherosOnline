<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require('../app/view/head.php');
    ?>
<title> Dashboard  </title>

</head>
<body>
    <!--Creación de nuestra barra de navegación-->
    <header>
    <!--Creación de nuestra barra de navegación-->
    <?php
        require('../app/view/navbar.php');
        ?>
    </header>
        <main>
            <div>
                <h1 id="titulo" class="cyan-text center">Bienvenido</h1>
                <br>

                <!-- Inicio de Grafico -->
                <div class="row center">
                    <div class="col s12 m6 l4 offset-l1">
                    <canvas id="myChart" class="r"  width="100" height="40"></canvas>
                    <h5 id="chart2" class="center"> Pedidos mensuales </h5>
                    </div>
 
                    <div class="col s12 m6 l4 offset-l2">
                    <canvas id="myChart2" class="r"  width="100" height="40"></canvas>
                    <h5 id="chart2" class="center"> Productos más vendidos </h5>
                    </div>
                </div>
            </div>
        </main>
        <?php
        require('../app/view/footer_priv.php');
        ?>  
</body>
</html>