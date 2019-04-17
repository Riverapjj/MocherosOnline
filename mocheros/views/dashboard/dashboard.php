<?php
    require('../../core/helpers/navbar.php');
    Navbar::header('Inicio');
?>
<?php
     Navbar::dashNav();
?>
<div>
    <h1 id="titulo" class="cyan-text center">Bienvenido</h1>
    <br>

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
<?php
    Navbar::footer();
?>
<script>
    var ctx = $('#myChart');
    var ctx2 = $('#myChart2');


    makeChart(ctx);
    makeChart(ctx2);

    function makeChart(context) {

        var myChart = new Chart(context, {
            type: 'bar',
            data: {
                labels: ["", "", "", "", "", ""],
                datasets: [{
                    // label: 'Productos más vendidos',
                    data: [3, 2, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
</script>
</body>

</html>