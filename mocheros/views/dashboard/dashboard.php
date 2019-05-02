<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::header('Inicio');
?>
<?php
     DashboardHelper::dashNav();
?>
<main>
    <div class="container">
        <h1 id="titulo" class="cyan-text center">Bienvenido</h1>
        <br>
        <h3 id="geeting" class="cyan-text center"></h3>
        <!-- Inicio de Grafico -->
        <div class="row center">
            <div class="col s12 m6 l4 offset-l1">
                <canvas id="myChart" class="r" width="100" height="40"></canvas>
                <h5 id="chart2" class="center"> Pedidos mensuales </h5>
            </div>

            <div class="col s12 m6 l4 offset-l2">
                <canvas id="myChart2" class="r" width="100" height="40"></canvas>
                <h5 id="chart2" class="center"> Productos más vendidos </h5>
            </div>
        </div>
    </div>
</main>
<?php
    DashboardHelper::footer('dashboard.js');
?>