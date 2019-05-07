<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/usuarios_public.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'publicHelper') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/public/');
                } else {
                    header('location: ../../views/public/registrarse.php');
                }
                break;
            case 'readProfile':
                if ($usuario->setIdUsuario($_SESSION['idUsuario'])) {
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
                if ($usuario->setIdUsuario($_SESSION['idUsuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNomUsuario($_POST['profile_usuario'])) {
                            if ($usuario->setNombre($_POST['profile_nombre'])) {
                                if ($usuario->setApellido($_POST['profile_apellido'])) {
                                    if ($usuario->setDireccion($_POST['profile_direccion'])) {
                                        if ($usuario->setTelefono($_POST['profile_telefono'])) {
                                            if ($usuario->setEmail($_POST['profile_correo'])) {
                                                if ($usuario->updateUsuario()) {
                                                    $_SESSION['nombreUsuario'] = $_POST['profile_usuario'];
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Ocurrió un error en la operación';
                                                }
                                            } else {
                                                $result['exception'] = 'Correo electrónico no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono no válido';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección no válida';
                                    }
                                } else {
                                    $result['exception'] = 'Apellidos no válidos';
                                }
                            } else {
                                $result['exception'] = 'Nombres no válidos';
                            }
                        } else {
                            $result['exception'] = 'Usuario no válido';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'Usuario inexistente';
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
                    if ($usuario->setNomUsuario($_POST['create_nomusuario'])) {
                        if ($usuario->setNombre($_POST['create_nombre'])) {
                            if ($usuario->setApellido($_POST['create_apellido'])) {
                                if ($usuario->setDireccion($_POST['create_direccion'])) {
                                    if ($usuario->setTelefono($_POST['create_telefono'])) {
                                        if ($usuario->setEmail($_POST['create_email'])) {
                                            if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                                if ($usuario->setClave($_POST['create_clave1'])) {
                                                    if ($usuario->createCliente()) {
                                                        $result['status'] = 1;
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Contraseña menor a 6 caracteres';
                                                }
                                            } else {
                                                $result['exception'] = 'Las claves no coinciden';
                                            }
                                        } else {
                                            $result['exception'] = 'El correo eléctronico no es válido';
                                        }
                                    } else {
                                        $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'La dirección ingresada no es válida';
                                }
                            } else {
                                $result['exception'] = 'El apellido ingresado no es válido';
                            }
                        } else {
                            $result['exception'] = 'El nombre ingresado no es válido';
                        }
                    } else {
                        $result['exception'] = 'El nombre de usuario ingresado no es válido';
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
                if ($usuario->setId($_POST['IdUsuario'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNomUsuario($_POST['update_usuario'])) {
                            if ($usuario->setNombre($_POST['update_nombre'])) {
                                if ($usuario->setApellido($_POST['update_apellido'])) {
                                    if ($usuario->setDireccion($_POST['update_direccion'])) {
                                        if ($usuario->setTelefono($_POST['update_telefono'])) {
                                            if ($usuario->setEmail($_POST['update_correo'])) {
                                                if ($usuario->updateUsuario()) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Correo no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono no válido';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección no válida';
                                    }
                                } else {
                                    $result['exception'] = 'Apellido no válido';
                                }
                            } else {
                                $result['exception'] = 'Nombre no válido';
                            }
                        } else {
                            $result['exception'] = 'Nombre de usuario no válido';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario no válido';
                }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['idUsuario']) {
                    if ($usuario->setId($_POST['IdUsuario'])) {
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
                exit('Acción no disponible 1');
        }
    } else if ($_GET['site'] == 'publicHelper') {
        switch ($_GET['action']) {
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNomUsuario($_POST['usuario'])) {
                            if ($usuario->setNombre($_POST['nombre'])) {
                                if ($usuario->setApellido($_POST['apellido'])) {
                                    if ($usuario->setDireccion($_POST['direccion'])) {
                                        if ($usuario->setTelefono($_POST['telefono'])) {
                                            if ($usuario->setEmail($_POST['correo'])) {
                                                if ($_POST['clave1'] == $_POST['clave2']) {
                                                    if ($usuario->setClave($_POST['clave1'])) {
                                                        if ($usuario->createCliente()) {
                                                            $result['status'] = 1;
                                                        } else {
                                                            $result['exception'] = 'Operación fallida';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Contraseña menor a 6 caracteres';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Las contraseñas no coinciden';
                                                }
                                            } else {
                                                $result['exception'] = 'Correo no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono no válido';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección no válida';
                                    }
                                } else {
                                    $result['exception'] = 'Apellido no válido';
                                }
                            } else { 
                                $result['exception'] = 'Nombre no válido';
                            }
                        } else {
                        $result['exception'] = 'Nombre de usuario no válido';
                        }
                break;
            case 'read':
                if ($usuario->readUsuarios()) {
                   // $result['status'] = 1;
                    //$result['exception'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNomUsuario($_POST['usuario'])) {
                    if ($usuario->checkUsuario()) {
                        if ($usuario->setClave($_POST['clave'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['idUsuario'] = $usuario->getIdUsuario();
                                $_SESSION['nombreUsuario'] = $usuario->getNomUsuario();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'El usuario no está registrado';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            default:
                exit('Acción no disponible 2');
        }
    } else {
        exit('Acceso no disponible 1');
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
