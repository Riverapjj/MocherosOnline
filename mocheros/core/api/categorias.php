<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/categorias.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
	session_start();
	$categoria = new Categorias;
	$result = array('status' => 0, 'exception' => '', 'dataset' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (/* isset($_SESSION['idUsuario']) && */ $_GET['site'] == 'dashboard'){
		switch ($_GET['action']) {
			case 'read':
				if ($result['dataset'] = $categoria->readCategorias()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay categorías registradas';
				}
				break;
			case 'search':
				$_POST = $categoria->validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $categoria->searchCategorias($_POST['busqueda'])) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
                break;
            case 'create':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setNomCategoria($_POST['create_nombre'])) {
                    if ($categoria->createCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Operación fallida';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'get':
                if ($categoria->setIdCategoria($_POST['IdCategoria'])) {
                    if ($result['dataset'] = $categoria->getCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'update':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setIdCategoria($_POST['IdCategoria'])) {
                    if ($categoria->getCategoria()) {
                        if ($categoria->setNomCategoria($_POST['update_nombre'])) {
                            if ($categoria->updateCategoria()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'delete':
                if ($categoria->setIdCategoria($_POST['IdCategoria'])) {
                    if ($categoria->getCategoria()) {
                        if ($categoria->deleteCategoria()) {
                                $result['status'] = 1;
                            } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
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