<?php
require_once('../../core/helpers/dashboardHelper.php');
DashboardHelper::headerTemplate('Bienvenido');
?>
<div class="row">
    <div class="col s12 m6">
        <canvas id="chart"></canvas>
    </div>
</div>
<script type="text/javascript" src="../../resources/js/Chart.js"></script>
<?php
DashboardHelper::footerTemplate('main.js');
?>