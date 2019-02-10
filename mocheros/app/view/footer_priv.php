<!--Estructura del footer-->
<footer class="page-footer orange darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Contáctanos</h5>
                <p class="grey-text text-lighten-4"><b>Técnicos de mantenimiento</b></p>
                <p class="grey-text text-lighten-4">Carlos Ramírez - Correo electrónico: federamirez_outlook.com</p>
                <p class="grey-text text-lighten-4">Josué Rivera - Correo electrónico: riverapj@gmail.com</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <p class="grey-text text-lighten-4"><b>Dirección</b></p>
                <p class="grey-text text-lighten-4">Calle El Mirador, Colonia Escalón, World Trade Center San Salvador San Salvador, El Salvador</p>
                <p class="grey-text text-lighten-4"><b>Correo eléctronico</b></p>
                <p class="grey-text text-lighten-4">mocheros@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2018 Derechos reservados a Mocheros S.A. de C.V.    
        </div>
        <div class="container">
            <a class="grey-text text-lighten-4 right" href="https://www.facebook.com"><i class="material-icons">language</i> Facebook&nbsp;&nbsp;&nbsp;</a>
            <a class="grey-text text-lighten-4 right" href="https://www.twitter.com"><i class="material-icons">favorite</i> Twitter&nbsp;&nbsp;&nbsp;</a>
            <a class="grey-text text-lighten-4 right" href="https://www.instagram.com"><i class="material-icons">photo_camera</i> Instagram&nbsp;&nbsp;&nbsp;</a>
            <a class="grey-text text-lighten-4 right" href="https://www.plus.google.com"><i class="material-icons">add</i> Google+&nbsp;&nbsp;&nbsp;</a>
        </div>
    </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../resources/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../resources/js/materialize.min.js"></script>
    <script type="text/javascript" src="../resources/js/main.js"></script>
    <script type="text/javascript" src="../resources/js/Chart.bundle.js"></script>
    <script type="text/javascript" src="../resources/js/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="../resources/js/Chart.js"></script>
    <script type="text/javascript" src="../resources/js/Chart.min.js"></script>
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