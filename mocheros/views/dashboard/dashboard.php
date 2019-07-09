<!-- Función de encabezado  -->
<?php
    require('../../core/helpers/dashboardHelper.php');
    DashboardHelper::headerTemplate('Inicio');
?>
<main>
    <div class="container">
        <h1 id="titulo" class="cyan-text center">Bienvenido</h1>
        <br>
        <h3 id="geeting" class="cyan-text center"></h3>
        <!-- Inicio de Grafico -->
        <div class="row center">
            <div class="col s12 m6 l12 card hoverable">
                <canvas id="chartProductosCat"></canvas>
            </div>
<br><br><br><br><br><br>
            <div class="col s12 m6 l12 card hoverable">
                <canvas id="chartCategoriasCantidad"></canvas>
            </div>
<br><br><br><br><br><br>
            <div class="col s12 m6 l12 card hoverable">
                <canvas id="chartEstadosPedidos"></canvas>
            </div>
<br><br><br><br><br><br>
            <div class="col s12 m6 l12 card hoverable">
                <canvas id="chartProductosVendidos"></canvas>
            </div>
<br><br><br><br><br><br>
            <div class="col s12 m6 l12 card hoverable">
                <canvas id="chartProductosCalificaciones"></canvas>
            </div>
        </div>
    </div>
</main>
<!-- Función de pie de página -->
<?php
    DashboardHelper::footer('dashboard.js',null);
?>
