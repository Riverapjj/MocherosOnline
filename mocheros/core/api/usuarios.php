<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/usuarios.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '', 'dataset' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (/*  isset($_SESSION['idUsuario']) &&  */ $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/dashboard/');
                } else {
                    header('location: ../../views/dashboard/dashboard.php');
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['profile_nombres'])) {
                            if ($usuario->setApellidos($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setAlias($_POST['profile_alias'])) {
                                        if ($usuario->updateUsuario()) {
                                            $_SESSION['aliasUsuario'] = $_POST['profile_alias'];
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($usuario->setIdUsuario($_SESSION['idUsuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $usuario->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNomUsuario($_POST['create-username'])){
                if ($usuario->setNombre($_POST['create-name'])) {
                    if ($usuario->setApellido($_POST['create-lastname'])) {
                        if ($usuario->setIdRol($_POST['create-rol-name'])){
                        if ($usuario->setEmail($_POST['create-email'])) {
                            if ($usuario->setTelefono($_POST['create-telf'])) {
                                if ($usuario->setIdEstado(isset($_POST['create-status-name']) ? 1 : 2)){
                                if ($_POST['create-pass-name'] == $_POST['create-confirm-pass-name']) {
                                    if ($usuario->setClave($_POST['create-pass-name'])) {
                                        if ($usuario->setDireccion($_POST['create-address-name'])){
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                     } else{
                                         $result['exception'] = 'Dirección incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                             } else{
                                $result['exception'] = 'Estado incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Telefono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                     } else{
                         $result['exception'] = 'Rol incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
            }else{
                $result['exception'] = 'Nombre de usuario incorrecto';
            }
                break;
            case 'get':
                if ($usuario->setIdUsuario($_POST['IdUsuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setIdUsuario($_POST['IdUsuario'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombre($_POST['update-name-name'])) {
                            if ($usuario->setApellido($_POST['update-lastname-name'])) {
                                if ($usuario->setEmail($_POST['update-email-name'])) {
                                    if ($usuario->setTelefono($_POST['update-telf-name'])){
                                        if ($usuario->setDireccion($_POST['update-address-name'])){
                                            if ($usuario->setIdRol($_POST['update-rol-name'])) {
                                                if ($usuario->setIdEstado(isset($_POST['update-status-name']) ? 1 : 2)){
                                    if ($usuario->setNomUsuario($_POST['update-username-name'])) {
                                        if ($usuario->updateUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else{
                                    $result['exception'] = 'Estado incorrecto';
                                    }
                                }  else{
                                    $result['exception'] = 'Rol incorrecto';
                                    }
                                } else{
                                    $result['exception'] = 'Dirección incorrecto';
                                    }
                                  }  else{
                                    $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readRoles':
                if ($result['dataset'] = $usuario->readRoles()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay roles registrados';
                }
                break;
            case 'delete':
                if ($_POST['IdUsuario'] != $_SESSION['idUsuario']) {
                    if ($usuario->setIdUsuario($_POST['IdUsuario'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'read':
                if ($usuario->readUsuarios()) {
                    $result['status'] = 1;
                    $result['exception'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombres'])) {
                    if ($usuario->setApellido($_POST['apellidos'])) {
                        if ($usuario->setEmail($_POST['correo'])) {
                            if ($usuario->setNomUsuario($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
             //   print_r($_POST);
                if ($usuario->setNomUsuario($_POST['log-username-name'])) {
                    if ($usuario->checkNomUsuario()) {
                        if ($usuario->setClave($_POST['log-pass-name'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['IdUsuario'] = $usuario->getIdUsuario();
                                $_SESSION['NomUsuario'] = $usuario->getNomUsuario();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Alias inexistente';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        //echo json_encode($result);
    } else {
        exit('Acceso no disponible 2');
    }
    echo json_encode($result);

} else {
	exit('Recurso denegado');
}
?>
