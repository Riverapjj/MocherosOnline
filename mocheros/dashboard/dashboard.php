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

                <!-- Inicio de Grafico -->
                <div class="row">
                    <div class="col s6">
                    <canvas id="myChart" class="r"  width="200" height="60"></canvas>
                    <h5 id="chart2" class="center"> Pedidos mensuales </h5>
                    </div>
 
                    <div class="col s6">
                    <canvas id="myChart2" class="r"  width="200" height="60"></canvas>
                    <h5 id="chart2" class="center"> Productos más vendidos </h5>
                    </div>
                </div>
            </div>
        </main>
        <?php
        require('../app/view/footer_priv.php');
        ?>

<script>
var ctx = $('#myChart');
var ctx2 =  $('#myChart2');


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
                    beginAtZero:true
                }
            }]
        }
    }
});
}

//$("#titulo").click(function() {
//        $(".r").show();
//});
//    $(".r").click(function() {
//        $(this).hide();
//});


</script>
</body>
</html>