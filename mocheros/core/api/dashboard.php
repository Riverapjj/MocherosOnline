<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/pedidos.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
	session_start();
	$pedidos = new Pedidos;
	$result = array('status' => 0, 'exception' => '', 'dataset' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'dashboard'){
		switch ($_GET['action']) {
			case 'selectEstadoPedidosReport':
				if ($result['dataset'] = $pedidos->selectEstadoPedidosReport()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay estados registrados';
				}
				break;
			default:
				exit('Acción no disponible');
		}
	} else {
		exit('Acceso no disponible');
	}
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>